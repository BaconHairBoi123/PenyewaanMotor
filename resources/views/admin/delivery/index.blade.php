<x-admin-layout title="Delivery & Pickup Today">

<h3 class="text-xl font-bold mb-4">Delivery & Pickup Today</h3>

<table class="w-full border">
<thead>
<tr class="bg-gray-200">
    <th>Tanggal</th>
    <th>Motor</th>
    <th>Plat</th>
    <th>Customer</th>
    <th>Tipe</th>
    <th>Alamat</th>
</tr>
</thead>

<tbody>
@forelse($deliveries as $d)
<tr class="border">
    <td class="p-2">{{ $d->start_date }}</td>
    <td class="p-2">{{ $d->brand }} {{ $d->type }}</td>
    <td class="p-2">{{ $d->license_plate }}</td>
    <td class="p-2">{{ $d->user_name }}</td>
    <td class="p-2 font-bold">
        {{ strtoupper($d->delivery_type) }}
    </td>
    <td class="p-2">
        {{ $d->delivery_address ?? '-' }}
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center">Tidak ada jadwal.</td>
</tr>
@endforelse
</tbody>
</table>

</x-admin-layout>
