<x-admin-layout title="Accessories Management">

    <h1 class="text-xl font-bold mb-4">Accessories Management</h1>

    @if(session('success'))
    <div class="bg-green-200 p-2 mb-3">{{ session('success') }}</div>
    @endif

    <div class="bg-white p-4 rounded shadow mb-6">
        <h2 class="font-bold mb-2">Add New Accessory</h2>
        <form method="POST" action="{{ route('admin.accessories.store') }}" class="flex flex-wrap gap-2 items-end">
            @csrf
            <div>
                <label class="block text-sm text-gray-600">Name</label>
                <input type="text" name="accessory_name" placeholder="Helmet, Raincoat..." class="border p-2 rounded w-full" required>
            </div>
            <div>
                <label class="block text-sm text-gray-600">Price / Day</label>
                <input type="number" name="daily_price" placeholder="Rp 0" class="border p-2 rounded w-full" required>
            </div>
            <div>
                <label class="block text-sm text-gray-600">Stock</label>
                <input type="number" name="stock" placeholder="Qty" class="border p-2 rounded w-20" required value="10">
            </div>
            
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Add
            </button>
        </form>
    </div>

    <table class="w-full border bg-white shadow-sm">
        <tr class="bg-gray-100 text-left">
            <th class="border p-3">Name</th>
            <th class="border p-3">Price / Day</th>
            <th class="border p-3">Stock</th>
            <th class="border p-3">Actions</th>
        </tr>

        @forelse($accessories as $a)
        <tr class="hover:bg-gray-50">
            <form action="{{ route('admin.accessories.update', $a->id) }}" method="POST">
                @csrf
                @method('PUT')
                <td class="border p-3">
                    <input type="text" name="accessory_name" value="{{ $a->accessory_name }}" class="border p-1 rounded w-full">
                </td>
                <td class="border p-3">
                    <input type="number" name="daily_price" value="{{ $a->daily_price }}" class="border p-1 rounded w-full">
                </td>
                <td class="border p-3">
                    <input type="number" name="stock" value="{{ $a->stock }}" class="border p-1 rounded w-20">
                </td>
                <td class="border p-3 flex gap-2">
                    <button type="submit" class="text-blue-600 hover:text-blue-800 font-bold">Update</button>
            </form>
            <form action="{{ route('admin.accessories.delete', $a->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:text-red-700">Delete</button>
            </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="p-4 text-center text-gray-500">No accessories found.</td>
        </tr>
        @endforelse

    </table>

</x-admin-layout>
