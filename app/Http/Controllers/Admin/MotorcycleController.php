<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'category' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'type' => 'required|in:small_matic,big_matic,manual',
            'cc' => 'required|integer',
            'fuel_configuration' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:2000',
            'transmission' => 'required|in:manual,automatic',
            'price' => 'required|numeric',
            'license_plate' => 'required|unique:motorcycles,license_plate',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // hasil: motorcycles/filename.jpg
            $data['image_path'] = $request->file('image')
                ->store('motorcycles', 'public');
        }

        Motorcycle::create($data);

        return redirect()
            ->route('admin.motorcycles.index')
            ->with('success', 'Motorcycle created successfully.');
    }

    public function edit(Motorcycle $motorcycle)
    {
        return view('admin.motorcycles.edit', compact('motorcycle'));
    }

    public function update(Request $request, Motorcycle $motorcycle)
    {
        $request->validate([
            'category' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'type' => 'required|in:small_matic,big_matic,manual',
            'cc' => 'required|integer',
            'fuel_configuration' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:2000',
            'transmission' => 'required|in:manual,automatic',
            'price' => 'required|numeric',
            'license_plate' => 'required|unique:motorcycles,license_plate,' . $motorcycle->id,
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada (untuk fungsi update)
            if (isset($motorcycle) && $motorcycle->image_path) {
                Storage::disk('public')->delete($motorcycle->image_path);
            }

            // Simpan file. Laravel otomatis membuat folder 'motorcycles' jika belum ada
            // store() akan mengembalikan path seperti: "motorcycles/AbCd123.jpg"
            $data['image_path'] = $request->file('image')->store('motorcycles', 'public');
        }

        $motorcycle->update($data);

        return redirect()
            ->route('admin.motorcycles.index')
            ->with('success', 'Motorcycle updated successfully.');
    }

    public function destroy(Motorcycle $motorcycle)
    {
        if ($motorcycle->image_path) {
            Storage::disk('public')->delete($motorcycle->image_path);
        }

        $motorcycle->delete();

        return back()->with('success', 'Motorcycle deleted.');
    }
}
