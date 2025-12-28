<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MotorcycleImage;

class ImageManagementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Query dasar untuk mengambil data motor dan jumlah fotonya
        $motorcycles = Motorcycle::query()
            ->withCount('images')
            ->when($search, function ($query) use ($search) {
                return $query->where('license_plate', 'like', "%{$search}%");
            })
            ->latest()
            ->get(); // Mengambil semua hasil pencarian

        // PENTING: Jika request datang dari JavaScript (AJAX), 
        // hanya kirimkan potongan HTML list-nya saja, jangan seluruh halaman.
        if ($request->ajax()) {
            return view('admin.images._list', compact('motorcycles'))->render();
        }

        // Jika dibuka normal (refresh halaman), tampilkan halaman penuh seperti biasa
        return view('admin.images.index', compact('motorcycles'));
    }
    public function manage($id)
    {
        // Mengambil motor dengan semua relasi fotonya
        $motorcycle = Motorcycle::with('images')->findOrFail($id);

        return view('admin.images.manage', compact('motorcycle'));
    }


    public function upload(Request $request, $id)
    {
        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                // Kita tentukan folder spesifiknya di sini: motorcycles/imgmotorcycles
                // Parameter kedua 'public' artinya masuk ke storage/app/public/
                $path = $photo->store('motorcycles/imgmotorcycles', 'public');

                // Simpan ke database
                MotorcycleImage::create([
                    'motorcycle_id' => $id,
                    'image_path'    => $path,
                    'is_primary'    => false
                ]);
            }
        }

        return back()->with('success', 'Foto berhasil disimpan ke folder imgmotorcycles!');
    }
    public function destroyImage($id)
    {
        $image = MotorcycleImage::findOrFail($id);

        // Hapus file fisik dari folder storage/app/public/motorcycles/imgmotorcycles
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Hapus data dari database
        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
