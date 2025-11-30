<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $motorcycles = DB::table('motorcycles')->get();
        $serviceTypes = DB::table('service_types')->get();

        $services = DB::table('motorcycle_services')
            ->join('motorcycles', 'motorcycle_services.motorcycle_id', '=', 'motorcycles.id')
            ->select(
                'motorcycle_services.*',
                'motorcycles.brand',
                'motorcycles.type',
                'motorcycles.license_plate'
            )
            ->orderBy('service_date', 'desc')
            ->get();

        return view('admin.services.index', compact('motorcycles', 'serviceTypes', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'motorcycle_id' => 'required',
            'service_date' => 'required|date',
            'kilometer' => 'required|numeric',
            'services' => 'required|array',   // ← MINIMAL 1 CENTANG
        ]);

        // 1. Simpan data servis dasar
        $serviceId = DB::table('motorcycle_services')->insertGetId([
            'motorcycle_id' => $request->motorcycle_id,
            'service_date' => $request->service_date,
            'kilometer' => $request->kilometer,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Simpan semua servis yang dicentang
        foreach ($request->services as $serviceTypeId) {
            DB::table('motorcycle_service_details')->insert([
                'service_id' => $serviceId,
                'service_type_id' => $serviceTypeId
            ]);
        }

        // 3. Update last_service_date
        DB::table('motorcycles')
            ->where('id', $request->motorcycle_id)
            ->update([
                'last_service_date' => $request->service_date
            ]);

        return back()->with('success', 'Service berhasil dicatat.');
    }
}
