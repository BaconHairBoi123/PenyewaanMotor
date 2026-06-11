<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Motorcycle;

class DeviceController extends Controller
{
    /**
     * Menampilkan daftar devices (GPS)
     */
    public function index()
    {
        // Mengambil semua device dan semua motor untuk keperluan dropdown pairing
        $devices = Device::all();
        $motorcycles = Motorcycle::all();
        return view('admin.devices.index', compact('devices', 'motorcycles'));
    }

    /**
     * Menyimpan device baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'device_code' => 'required|string|unique:devices,device_code',
            'device_name' => 'nullable|string|max:100',
            'status' => 'required|in:available,active,maintenance',
        ]);

        Device::create([
            'device_code' => $request->device_code,
            'device_name' => $request->device_name,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.devices.index')->with('success', 'Device berhasil ditambahkan.');
    }

    /**
     * Update device
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'device_code' => 'required|string|unique:devices,device_code,' . $id,
            'device_name' => 'nullable|string|max:100',
            'status' => 'required|in:available,active,maintenance',
            'motorcycle_id' => 'nullable|exists:motorcycles,id',
        ]);

        $device = Device::findOrFail($id);
        $device->update([
            'device_code' => $request->device_code,
            'device_name' => $request->device_name,
            'status' => $request->status,
        ]);

        // Logika Re-pairing (Update Motor yang menggunakan device ini)
        
        // 1. Lepas device dari motor mana pun yang saat ini menggunakannya
        Motorcycle::where('device_id', $device->id)->update(['device_id' => null]);

        // 2. Jika ada motor baru yang dipilih untuk dipasangkan
        if ($request->filled('motorcycle_id')) {
            $motorcycle = Motorcycle::findOrFail($request->motorcycle_id);
            $motorcycle->update(['device_id' => $device->id]);

            // Jika dipasangkan ke motor, otomatis ubah status device menjadi active jika sebelumnya available
            if ($device->status === 'available') {
                $device->update(['status' => 'active']);
            }
        }

        return redirect()->route('admin.devices.index')->with('success', 'Device berhasil diperbarui.');
    }

    /**
     * Hapus device
     */
    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();

        return redirect()->route('admin.devices.index')->with('success', 'Device berhasil dihapus.');
    }

    /**
     * Halaman untuk memilih motor terlebih dahulu, baru pilih device
     */
    public function chooseMotorcycle()
    {
        return view('admin.devices.choose-motorcycle');
    }

    /**
     * Pairing device dengan motor
     * Menampilkan form untuk memilih device yang akan dipasang ke motor
     */
    public function assignToMotorcycle($motorcycle_id)
    {
        $motorcycle = Motorcycle::findOrFail($motorcycle_id);
        // Ambil hanya device yang status 'available' (belum terpasang)
        $availableDevices = Device::where('status', 'available')->get();

        return view('admin.devices.assign', compact('motorcycle', 'availableDevices'));
    }

    /**
     * Search motorcycle berdasarkan plat nomer atau brand/type
     * GET /admin/devices/search-motorcycle?q=B%201234%20AB
     */
    public function searchMotorcycle(Request $request)
    {
        $query = $request->input('q', '');

        if (strlen($query) < 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Query terlalu pendek'
            ], 400);
        }

        $motorcycles = Motorcycle::where('license_plate', 'LIKE', '%' . $query . '%')
            ->orWhere('brand', 'LIKE', '%' . $query . '%')
            ->orWhere('type', 'LIKE', '%' . $query . '%')
            ->select('id', 'license_plate', 'brand', 'type', 'device_id')
            ->limit(10)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $motorcycles->map(function ($m) {
                return [
                    'id' => $m->id,
                    'license_plate' => $m->license_plate,
                    'brand' => $m->brand,
                    'type' => $m->type,
                    'device_status' => $m->device_id ? '(Sudah Ada Device)' : '(Belum Ada Device)',
                    'display' => $m->license_plate . ' - ' . $m->brand . ' ' . $m->type
                ];
            })
        ]);
    }

    /**
     * Simpan hasil pairing device ke motor
     */
    /**
     * Simpan hasil pairing device ke motor
     */
    public function saveAssignment(Request $request, $motorcycle_id)
    {
        $request->validate([
            'device_id' => 'required|exists:devices,id',
        ]);

        $motorcycle = Motorcycle::findOrFail($motorcycle_id);
        $device = Device::findOrFail($request->device_id);

        // Update motor dengan device_id
        $motorcycle->update(['device_id' => $device->id]);

        // Update status device menjadi 'active'
        $device->update(['status' => 'active']);

        // --- DIUBAH: Mengarah ke index tabel GPS ---
        return redirect()->route('admin.devices.index')
            ->with('success', 'Device GPS berhasil dipasang ke motor.');
    }

    /**
     * Lepas device dari motor (UNPAIR)
     */
    public function removeFromMotorcycle($motorcycle_id)
    {
        $motorcycle = Motorcycle::findOrFail($motorcycle_id);
        
        if ($motorcycle->device) {
            // Update status device kembali menjadi 'available'
            $motorcycle->device->update(['status' => 'available']);
        }

        // Lepas device dari motor
        $motorcycle->update(['device_id' => null]);

        // --- DIUBAH: Mengarah ke index tabel GPS ---
        return redirect()->route('admin.devices.index')
            ->with('success', 'Device GPS berhasil dilepas dari motor.');
    }

    public function setRelayStatus(Request $request, Device $device)
    {
        $request->validate([
            'relay_status' => 'required|in:ON,OFF',
        ]);

        $device->update(['relay_status' => $request->relay_status]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Relay status updated successfully.',
                'data' => [
                    'device_code' => $device->device_code,
                    'relay_status' => $device->relay_status,
                ]
            ]);
        }

        return back()->with('success', 'Relay status updated to ' . $device->relay_status . '.');
    }
}