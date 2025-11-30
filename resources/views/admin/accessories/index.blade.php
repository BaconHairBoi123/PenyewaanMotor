<x-admin-layout title="Accessories Management">

<h1 class="text-xl font-bold mb-4">Accessories Management</h1>

@if(session('success'))
<div class="bg-green-200 p-2 mb-3">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('admin.accessories.store') }}" class="mb-4">
@csrf

<input type="text" name="accessory_name" placeholder="Nama Aksesoris" class="border p-2">
<input type="number" name="daily_price" placeholder="Harga / hari" class="border p-2">

<button class="bg-blue-600 text-white px-3 py-2">
Tambah
</button>
</form>

<table class="w-full border">
<tr class="bg-gray-100">
    <th class="border p-2">Nama</th>
    <th class="border p-2">Harga / Hari</th>
    <th class="border p-2">Aksi</th>
</tr>

@foreach($accessories as $a)
<tr>
    <td class="border p-2">{{ $a->accessory_name }}</td>
    <td class="border p-2">Rp {{ number_format($a->daily_price) }}</td>
    <td class="border p-2">
        <form action="{{ route('admin.accessories.delete', $a->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="text-red-500">Hapus</button>
        </form>
    </td>
</tr>
@endforeach

</table>

</x-admin-layout>
