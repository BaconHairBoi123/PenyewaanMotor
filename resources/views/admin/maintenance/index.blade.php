@extends('admin.layouts.app')

@section('content')

    <h1 class="text-2xl font-bold mb-4">Motor Needs Service</h1>

    @if($motorcycles->isEmpty())
        <div class="bg-white p-4 rounded shadow">No motorcycles require service right now.</div>
    @else
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Brand / Category</th>
                        <th class="px-4 py-2">License Plate</th>
                        <th class="px-4 py-2">Last Service Date</th>
                        <th class="px-4 py-2">Last Kilometer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motorcycles as $i => $motor)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3">{{ $motor->brand }} / {{ $motor->category }}</td>
                            <td class="px-4 py-3">{{ $motor->license_plate }}</td>
                            <td class="px-4 py-3">{{ $motor->last_service_date ? \Carbon\Carbon::parse($motor->last_service_date)->format('Y-m-d') : '-' }}</td>
                            <td class="px-4 py-3">{{ $motor->lastService->kilometer ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-8 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">GPS Maintenance & Relay Control</h2>

        @if($gpsDevices->isEmpty())
            <div class="bg-gray-50 p-4 rounded text-gray-600">Tidak ada device GPS yang terdaftar.</div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-3">Device Code</th>
                            <th class="px-4 py-3">Motor</th>
                            <th class="px-4 py-3">Relay Status</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gpsDevices as $device)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3 font-mono">{{ $device->device_code }}</td>
                                <td class="px-4 py-3">
                                    @if($device->motorcycle)
                                        <div>{{ $device->motorcycle->license_plate }}</div>
                                        <small class="text-gray-500">{{ $device->motorcycle->brand }} {{ $device->motorcycle->type }}</small>
                                    @else
                                        <span class="text-gray-400 italic">Belum terpasang ke motor</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded text-sm font-medium {{ $device->relay_status === 'OFF' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $device->relay_status ?? 'ON' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    @if($device->motorcycle)
                                        <form method="POST" action="{{ route('admin.devices.set_relay_status', $device->id) }}">
                                            @csrf
                                            <input type="hidden" name="relay_status" value="{{ $device->relay_status === 'OFF' ? 'ON' : 'OFF' }}">
                                            <button type="submit" class="px-3 py-2 rounded text-white font-semibold {{ $device->relay_status === 'OFF' ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }}">
                                                {{ $device->relay_status === 'OFF' ? 'Nyalakan Motor' : 'Matikan Motor' }}
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-500 text-sm">Tidak ada motor</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
