<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motorcycle;

class MaintenanceController extends Controller
{
    /**
     * Tampilkan daftar motor yang perlu servis (lebih dari 2 bulan sejak `last_service_date`).
     */
    public function index(Request $request)
    {
        // Ambil motor yang perlu servis sesuai logika notifikasi pada dashboard
        $motorcycles = Motorcycle::with('lastService')
            ->whereDate('last_service_date', '<=', now()->subMonths(2))
            ->orderBy('last_service_date', 'asc') // yang paling lama servisnya paling atas
            ->get();

        return view('admin.maintenance.index', compact('motorcycles'));
    }
}
