<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdditionalAccessories;

class AccessoryController extends Controller
{
    public function index()
    {
        $accessories = AdditionalAccessories::all();
        return view('admin.accessories.index', compact('accessories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'accessory_name' => 'required|string|max:100',
            'daily_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        AdditionalAccessories::create([
            'accessory_name' => $request->accessory_name,
            'daily_price' => $request->daily_price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.accessories')->with('success', 'Accessory added successfully.');
    }

    public function delete($id)
    {
        $accessory = AdditionalAccessories::findOrFail($id);
        $accessory->delete();

        return redirect()->route('admin.accessories')->with('success', 'Accessory deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'accessory_name' => 'required|string|max:100',
            'daily_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $accessory = AdditionalAccessories::findOrFail($id);
        $accessory->update([
            'accessory_name' => $request->accessory_name,
            'daily_price' => $request->daily_price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.accessories')->with('success', 'Accessory updated successfully.');
    }
}
