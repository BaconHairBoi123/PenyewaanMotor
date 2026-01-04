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

@endsection
