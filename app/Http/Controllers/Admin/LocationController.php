<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locations;
use App\Models\Device;

class LocationController extends Controller
{
    public function index()
    {
        // Get all devices that have motorcycles (device_id not null)
        $devices = Device::has('motorcycle')
            ->with(['motorcycle', 'locations'])
            ->get()
            ->map(function($device) {
                return [
                    'id' => $device->id,
                    'device_code' => $device->device_code,
                    'device_name' => $device->device_name,
                    'motorcycle_plate' => $device->motorcycle?->license_plate ?? 'N/A',
                    'relay_status' => $device->relay_status ?? 'ON',
                    'latest_location' => $device->locations->sortByDesc('created_at')->first()
                ];
            });
        
        $locations = Locations::all();
        return view('admin.locations.index', compact('locations', 'devices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Locations::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('admin.locations.index')->with('success', 'Location added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $location = Locations::findOrFail($id);
        $location->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('admin.locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = Locations::findOrFail($id);
        $location->delete();

        return redirect()->route('admin.locations.index')->with('success', 'Location deleted successfully.');
    }
}
