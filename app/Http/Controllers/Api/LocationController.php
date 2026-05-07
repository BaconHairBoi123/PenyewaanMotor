<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Locations;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Tampilkan daftar lokasi pengambilan/pengembalian
     */
    public function index()
    {
        $locations = Locations::all();

        return response()->json([
            'status' => 'success',
            'data' => $locations
        ]);
    }
}
