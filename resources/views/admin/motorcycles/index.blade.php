<x-admin-layout title="Motorcycles">

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Motorcycles</h1>

        <a href="{{ route('admin.motorcycles.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded">
           + Add Motorcycle
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <table class="w-full">
            <thead>
                <tr class="border-b text-left">
                    <th class="p-3">Image</th>
                    <th class="p-3">Brand</th>
                    <th class="p-3">Type</th>
                    <th class="p-3">Plate</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($motorcycles as $motor)
                <tr class="border-b">
                    <td class="p-3">
                        @if($motor->image_path)
                            <img src="{{ asset('storage/' . $motor->image_path) }}" class="h-16 rounded">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </td>
                    <td class="p-3">{{ $motor->brand }}</td>
                    <td class="p-3">{{ $motor->type }}</td>
                    <td class="p-3">{{ $motor->license_plate }}</td>
                    <td class="p-3">Rp {{ number_format($motor->price) }}</td>
                    <td class="p-3">{{ $motor->status }}</td>

                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.motorcycles.edit', $motor->id) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded">
                           Edit
                        </a>

                        <form action="{{ route('admin.motorcycles.destroy', $motor->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this motorcycle?');">

                            @csrf
                            @method('DELETE')

                            <button class="px-3 py-1 bg-red-600 text-white rounded">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $motorcycles->links() }}
        </div>
    </div>
</x-admin-layout>
