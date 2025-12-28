<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorcycle;

class MotorcycleController extends Controller
{
    //
    public function index()
{
    $motorcycles = Motorcycle::with('lastService')->get();

    return view('welcome', compact('motorcycles'));
}
public function imageManagement(Request $request)
{
    $search = $request->get('search');

    $motorcycles = Motorcycle::query()
        ->withCount('images') // Menghitung otomatis jumlah foto di tabel motorcycle_images
        ->when($search, function ($query) use ($search) {
            // Cari berdasarkan plat nomor (license_plate)
            return $query->where('license_plate', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

    return view('admin.images.index', compact('motorcycles'));
}
}
