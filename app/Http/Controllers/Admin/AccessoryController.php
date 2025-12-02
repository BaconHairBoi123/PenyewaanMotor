<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessoryController extends Controller
{
    public function index() {
        $accessories = DB::table('additional_accessories')->get();
        return view('admin.accessories.index', compact('accessories'));
    }

    public function store(Request $request) {
        $request->validate([
            'accessory_name' => 'required',
            'daily_price' => 'required|numeric'
        ]);

        DB::table('additional_accessories')->insert([
            'accessory_name' => $request->accessory_name,
            'daily_price' => $request->daily_price
        ]);

        return back()->with('success','Aksesoris berhasil ditambahkan');
    }

    public function delete($id) {
        DB::table('additional_accessories')->where('id',$id)->delete();
        return back()->with('success','Aksesoris berhasil dihapus');
    }
}
