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

        // Hanya tampilkan motor dengan status 'available'
        $query->where('status', 'available');

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

        $motorcycles = $query->with('images')->latest()->get()->map(function ($motor) {
            $motor->image_url = $motor->image_path ? asset('storage/' . $motor->image_path) : null;
            if ($motor->images) {
                foreach ($motor->images as $img) {
                    $img->image_url = $img->image_path ? asset('storage/' . $img->image_path) : null;
                }
            }
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
        
        $gallery = \App\Models\MotorcycleImage::where('motorcycle_id', $id)->get()->map(function ($img) {
            $img->image_url = $img->image_path ? asset('storage/' . $img->image_path) : null;
            return $img;
        });
        
        $motorcycle->gallery = $gallery;

        return response()->json([
            'status' => 'success',
            'data' => $motorcycle
        ]);
    }

    /**
     * Tampilkan info service motor
     */
    public function services(Request $request)
    {
        $query = Motorcycle::query();

        if ($request->has('license_plate')) {
            $query->where('license_plate', 'like', '%' . $request->license_plate . '%');
        }

        $motorcycles = $query->with(['services'])->latest()->get()->map(function ($motor) {
            $motor->image_url = $motor->image_path ? asset('storage/' . $motor->image_path) : null;
            return $motor;
        });

        return response()->json([
            'status' => 'success',
            'data' => $motorcycles
        ]);
    }
}
