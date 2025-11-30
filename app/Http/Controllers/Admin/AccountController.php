<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin; // Pastikan model Admin diimpor

class AccountController extends Controller
{
    public function index()
    {
        // Mengambil admin yang sedang login
        /** @var \App\Models\Admin|null $admin */
        $admin = Auth::guard('admin')->user();
        
        // Mengirimkan data admin ke view
        return view('admin.account.index', compact('admin'));
    }

    public function update(Request $request)
    {
        // Mendapatkan data admin yang sedang login
        /** @var \App\Models\Admin|null $admin */
        $admin = Auth::guard('admin')->user();

        if (! $admin) {
            return redirect()->back()->with('error', 'Admin tidak ditemukan atau belum login.');
        }

        // Validasi input yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:100',
            // sesuaikan unique dengan nama tabel dan primary key dari migration
            'username' => 'required|string|max:50|unique:admins,username,' . $admin->id . ',id', // Ganti admin menjadi admins dan id_admin menjadi id
            'email' => 'required|email|unique:admins,email,' . $admin->id . ',id', // Ganti admin menjadi admins dan id_admin menjadi id
            'password' => 'nullable|min:6|confirmed', // Hanya diperlukan jika user ingin mengubah password
        ]);

        // Update data admin
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;

        // Jika password diisi, hash password dan simpan
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        $admin->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Account berhasil diperbarui');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
