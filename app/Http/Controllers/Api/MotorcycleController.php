<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    /**
     * Tampilkan semua motor dengan info dasar
     */
    public function index(Request $request)
    {
        $query = Motorcycle::query();

        // Fitur pencarian dan filter sederhana
        if ($request->has('brand')) {
            $query->where('brand', 'like', '%' . $request->brand . '%');
        }
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }
        if ($request->has('search')) {
            $query->where('category', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Include gambar utama untuk list
        // Jika ada relasi image, misal dengan with('images')
        // Saat ini model Motorcycle memiliki 'image_path'
        $motorcycles = $query->latest()->get()->map(function ($motor) {
            $motor->image_url = $motor->image_path ? asset('storage/' . $motor->image_path) : null;
            return $motor;
        });

        return response()->json([
            'status' => 'success',
            'data' => $motorcycles
        ]);
    }

    /**
     * Tampilkan detail spesifik motor
     */
    public function show($id)
    {
        $motorcycle = Motorcycle::find($id);

        if (!$motorcycle) {
            return response()->json([
                'status' => 'error',
                'message' => 'Motorcycle not found'
            ], 404);
        }

        $motorcycle->image_url = $motorcycle->image_path ? asset('storage/' . $motorcycle->image_path) : null;
        
        // Ambil galeri gambar jika ada (Tabel motorcycle_images)
        // Kita asumsikan relasinya ada atau kita query manual
        $gallery = \App\Models\MotorcycleImage::where('motorcycle_id', $id)->get()->map(function ($img) {
            $img->image_url = asset('storage/motorcycle_galleries/' . $img->image_path);
            return $img;
        });
        
        $motorcycle->gallery = $gallery;

        return response()->json([
            'status' => 'success',
            'data' => $motorcycle
        ]);
    }
}
