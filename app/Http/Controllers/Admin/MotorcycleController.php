<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index()
    {
        return view('admin.motorcycles.index', [
            'motorcycles' => Motorcycle::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.motorcycles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'brand' => 'required|string',
            'type' => 'required|string',
            'cc' => 'required|integer',
            'fuel_configuration' => 'nullable|string',
            'price' => 'required|numeric',
            'license_plate' => 'required|unique:motorcycles',
            'image' => 'nullable|image'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('motorcycles', 'public');
        }

        Motorcycle::create($data);

        return redirect()->route('admin.motorcycles.index')
            ->with('success', 'Motorcycle created successfully.');
    }

    public function edit(Motorcycle $motorcycle)
    {
        return view('admin.motorcycles.edit', compact('motorcycle'));
    }

    public function update(Request $request, Motorcycle $motorcycle)
    {
        $request->validate([
            'category' => 'required|string',
            'brand' => 'required|string',
            'type' => 'required|string',
            'cc' => 'required|integer',
            'fuel_configuration' => 'nullable|string',
            'price' => 'required|numeric',
            'license_plate' => 'required|unique:motorcycles,license_plate,' . $motorcycle->id,
            'image' => 'nullable|image'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('motorcycles', 'public');
        }

        $motorcycle->update($data);

        return redirect()->route('admin.motorcycles.index')
            ->with('success', 'Motorcycle updated successfully.');
    }

    public function destroy(Motorcycle $motorcycle)
    {
        $motorcycle->delete();

        return back()->with('success', 'Motorcycle deleted.');
    }
}
