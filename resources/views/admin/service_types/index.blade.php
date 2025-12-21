<x-admin-layout title="Service Types">

    <h3 class="text-xl font-bold mb-4">Service Types</h3>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM TAMBAH --}}
    <form method="POST"
          action="{{ route('admin.service.types.store') }}"
          class="mb-4 flex gap-2">
        @csrf

        <input type="text"
               name="service_name"
               placeholder="Nama service..."
               class="border rounded p-2 flex-1"
               required>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah
        </button>
    </form>

    {{-- TABLE --}}
    <table class="w-full border-collapse border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2 w-16">No</th>
                <th class="border p-2">Nama Service</th>
                <th class="border p-2 w-24">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($types as $i => $type)
                <tr>
                    <td class="border p-2 text-center">{{ $i + 1 }}</td>
                    <td class="border p-2">{{ $type->service_name }}</td>
                    <td class="border p-2 text-center">
                        <form method="POST"
                              action="{{ route('admin.service.types.destroy', $type->id) }}"
                              onsubmit="return confirm('Hapus jenis servis ini?')">
                            @csrf
                            @method('DELETE')

                            <button
                                class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"
                        class="text-center p-3 text-gray-500">
                        Belum ada service type.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</x-admin-layout>
