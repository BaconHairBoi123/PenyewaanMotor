<x-admin-layout title="Device GPS Management">

    <h1 class="text-xl font-bold mb-4">Device GPS Management</h1>

    @if(session('success'))
    <div class="bg-green-200 p-2 mb-3 rounded">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="bg-red-200 p-2 mb-3 rounded">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('admin.devices.choose_motorcycle') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Pair Device to Motorcycle
        </a>
    </div>

    <div class="bg-white p-4 rounded shadow mb-6">
        <h2 class="font-bold mb-2">Add New Device GPS</h2>
        <form method="POST" action="{{ route('admin.devices.store') }}" class="flex flex-wrap gap-2 items-end">
            @csrf
            <div>
                <label class="block text-sm text-gray-600">Device Code*</label>
                <input type="text" name="device_code" placeholder="GPS001, GPS002, etc" class="border p-2 rounded w-full" required>
            </div>
            <div>
                <label class="block text-sm text-gray-600">Device Name</label>
                <input type="text" name="device_name" placeholder="e.g., GPS Cadangan A" class="border p-2 rounded w-full">
            </div>
            <div>
                <label class="block text-sm text-gray-600">Status</label>
                <select name="status" class="border p-2 rounded w-full">
                    <option value="available">Available</option>
                    <option value="active">Active</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>
            
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Add Device
            </button>
        </form>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="border p-3">Device Code</th>
                    <th class="border p-3">Device Name</th>
                    <th class="border p-3">Status</th>
                    <th class="border p-3">Paired Motor</th>
                    <th class="border p-3">Location Count</th>
                    <th class="border p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($devices as $device)
                <tr class="hover:bg-gray-50 border-b">
                    <td class="border p-3 font-mono">{{ $device->device_code }}</td>
                    <td class="border p-3">{{ $device->device_name ?? '-' }}</td>
                    <td class="border p-3">
                        <span class="px-2 py-1 rounded text-sm font-semibold
                            @if($device->status === 'available') bg-green-100 text-green-800
                            @elseif($device->status === 'active') bg-blue-100 text-blue-800
                            @else bg-yellow-100 text-yellow-800
                            @endif
                        ">
                            {{ ucfirst($device->status) }}
                        </span>
                    </td>
                    <td class="border p-3">
                        @if($device->motorcycle)
                            <div class="flex items-center justify-between gap-2 bg-blue-50 p-2 rounded border border-blue-100">
                                <div>
                                    <span class="font-bold text-blue-700 block text-sm">
                                        {{ $device->motorcycle->license_plate }}
                                    </span>
                                    <small class="text-gray-500 text-xs">{{ $device->motorcycle->brand }} {{ $device->motorcycle->type }}</small>
                                </div>
                                
                                <form action="{{ route('admin.devices.remove', $device->motorcycle->id) }}" method="POST" onsubmit="return confirm('Lepas kaitan GPS dari motor {{ $device->motorcycle->license_plate }}?');">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700 bg-white px-2 py-1 rounded border shadow-sm hover:bg-red-50 text-xs font-semibold">
                                        ❌ Unpair
                                    </button>
                                </form>
                            </div>
                        @else
                            <span class="text-gray-400 italic text-sm">Belum terpasang</span>
                        @endif
                    </td>
                    <td class="border p-3 text-center">
                        <span class="bg-gray-100 px-2 py-1 rounded">{{ $device->locations->count() }}</span>
                    </td>
                    <td class="border p-3 flex gap-2 items-center">
                        <form id="edit-form-{{ $device->id }}" action="{{ route('admin.devices.update', $device->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="device_code" value="{{ $device->device_code }}">
                            <input type="hidden" name="status" value="{{ $device->status }}">
                            <input type="hidden" name="device_name" id="device_name_input_{{ $device->id }}" value="{{ $device->device_name }}">
                            
                            <button type="button" onclick="editDeviceName('{{ $device->id }}', '{{ $device->device_name }}')" class="text-blue-600 hover:text-blue-800 text-sm font-semibold bg-blue-50 px-2 py-1 rounded border border-blue-200">
                                ✏️ Edit Nama
                            </button>
                        </form>
                        
                        <span class="text-gray-300">|</span>
                        
                        <form action="{{ route('admin.devices.destroy', $device->id) }}" method="POST" onsubmit="return confirm('Delete device?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-sm bg-red-50 px-2 py-1 rounded border border-red-200">
                                🗑️ Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">No devices found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>

<script>
    function editDeviceName(id, currentName) {
        let newName = prompt("Masukkan Nama Device GPS Baru:", currentName);
        
        if (newName !== null) {
            document.getElementById('device_name_input_' + id).value = newName;
            document.getElementById('edit-form-' + id).submit();
        }
    }
</script>