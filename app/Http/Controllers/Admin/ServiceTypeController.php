<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $types = DB::table('service_types')->get();
        return view('admin.service_types.index', compact('types'));
    }

    public function store(Request $request)
{
    $request->validate([
        'service_name' => 'required|string|max:100'
    ]);

    DB::table('service_types')->insert([
        'service_name' => $request->service_name,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return back()->with('success', 'Jenis servis berhasil ditambahkan');
}


    public function destroy($id)
    {
        DB::table('service_types')->where('id', $id)->delete();
        return back()->with('success', 'Jenis servis berhasil dihapus');
    }
}
