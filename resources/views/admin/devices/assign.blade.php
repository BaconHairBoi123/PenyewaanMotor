<x-admin-layout title="Assign GPS Device to Motorcycle">

    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Assign GPS Device to Motor</h1>

        <div class="bg-white p-6 rounded shadow mb-6">
            <h2 class="text-lg font-bold mb-4">Motor Details</h2>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="text-gray-600 text-sm">License Plate</p>
                    <p class="font-bold text-lg">{{ $motorcycle->license_plate }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Brand</p>
                    <p class="font-bold">{{ $motorcycle->brand }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Type</p>
                    <p class="font-bold">{{ $motorcycle->type }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Current Device</p>
                    <p class="font-bold">
                        @if($motorcycle->device)
                            {{ $motorcycle->device->device_code }}
                        @else
                            <span class="text-red-500">Not Assigned</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        @if($availableDevices->isEmpty())
            <div class="bg-yellow-100 p-4 rounded mb-6 text-yellow-800">
                <p class="font-bold">⚠️ No Available Devices</p>
                <p>All GPS devices are currently in use. Please add more devices or wait until some are returned to available status.</p>
            </div>
        @else
            <form action="{{ route('admin.devices.save_assignment', $motorcycle->id) }}" method="POST" class="bg-white p-6 rounded shadow">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Select Available Device*</label>
                    <select name="device_id" class="w-full border p-3 rounded" required>
                        <option value="">-- Choose Device --</option>
                        @foreach($availableDevices as $device)
                            <option value="{{ $device->id }}">
                                {{ $device->device_code }} 
                                @if($device->device_name) - {{ $device->device_name }} @endif
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Assign Device
                    </button>
                    <a href="{{ route('admin.devices.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                        Cancel
                    </a>
                </div>
            </form>
        @endif

    </div>

</x-admin-layout>