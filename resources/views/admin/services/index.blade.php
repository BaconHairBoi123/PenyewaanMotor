<x-admin-layout title="Service & Maintenance">

<h1 class="text-2xl font-bold mb-4">Service & Maintenance</h1>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 rounded mb-3">
    {{ session('success') }}
</div>
@endif

{{-- FORM SERVIS --}}
<div class="bg-white p-4 rounded shadow mb-6">
<form method="POST" action="{{ route('admin.services.store') }}">
@csrf

<div class="grid grid-cols-4 gap-4 mb-4">
    <select name="motorcycle_id" required class="border p-2 rounded">
        <option value="">-- Pilih Motor --</option>
        @foreach($motorcycles as $m)
            <option value="{{ $m->id }}">
                {{ $m->brand }} {{ $m->type }} ({{ $m->license_plate }})
            </option>
        @endforeach
    </select>

    <input type="date" name="service_date" required class="border p-2 rounded">
    <input type="number" name="kilometer" required placeholder="Kilometer" class="border p-2 rounded">
</div>

<h2 class="font-semibold mb-2">Jenis Service:</h2>

<div class="grid grid-cols-3 gap-3">
    @foreach($serviceTypes as $st)
        <label class="flex items-center gap-2">
            <input type="checkbox" name="services[]" value="{{ $st->id }}">
            {{ $st->service_name }}
        </label>
    @endforeach
</div>

<button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
    Simpan Service
</button>

</form>
</div>

{{-- LIST RIWAYAT SERVIS --}}
<div class="bg-white shadow rounded overflow-x-auto">
<table class="w-full">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2">Motor</th>
            <th class="p-2">Service Types</th>
            <th class="p-2">Date</th>
            <th class="p-2">KM</th>
        </tr>
    </thead>
    <tbody>
    @foreach($services as $s)
        @php
            $detail = DB::table('motorcycle_service_details')
                ->join('service_types', 'motorcycle_service_details.service_type_id', '=', 'service_types.id')
                ->where('motorcycle_service_details.service_id', $s->id)
                ->pluck('service_name')
                ->toArray();
        @endphp

        <tr class="border-t text-center">
            <td class="p-2">
                {{ $s->brand }} {{ $s->type }} ({{ $s->license_plate }})
            </td>
            <td class="p-2">{{ implode(', ', $detail) }}</td>
            <td class="p-2">{{ $s->service_date }}</td>
            <td class="p-2">{{ $s->kilometer }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

</x-admin-layout>
