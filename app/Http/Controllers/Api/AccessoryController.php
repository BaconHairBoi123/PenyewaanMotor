<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdditionalAccessories;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    /**
     * Tampilkan daftar aksesoris tambahan
     */
    public function index()
    {
        $accessories = AdditionalAccessories::all()->map(function ($accessory) {
            $accessory->image_url = $accessory->image_path ? asset('storage/accessories/' . $accessory->image_path) : null;
            return $accessory;
        });

        return response()->json([
            'status' => 'success',
            'data' => $accessories
        ]);
    }
}
