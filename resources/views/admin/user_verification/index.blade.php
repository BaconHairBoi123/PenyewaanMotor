<x-admin-layout title="User Verification">

    <h1 class="text-2xl font-bold mb-4">User Verification</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow rounded overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Username</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">License</th>
                    <th class="p-3 text-left">Face</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse($verifications as $v)
                    <tr class="border-t">
                        <td class="p-3">{{ $v->name }}</td>
                        <td class="p-3">{{ $v->username }}</td>
                        <td class="p-3">{{ $v->email }}</td>

                        <td class="p-3">
                            <img src="{{ asset($v->license_photo_path) }}" class="w-16 rounded">
                        </td>

                        <td class="p-3">
                            <img src="{{ asset($v->face_photo_path) }}" class="w-16 rounded">
                        </td>

                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-sm
                                {{ $v->status == 'verified' ? 'bg-green-200 text-green-700' : 'bg-yellow-200 text-yellow-700' }}">
                                {{ ucfirst($v->status) }}
                            </span>
                        </td>

                        <td class="p-3 text-center">
                            @if($v->status != 'verified')
                                <form action="{{ route('admin.user.verification.approve', $v->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button class="bg-green-600 text-white px-2 py-1 rounded">
                                        Approve
                                    </button>
                                </form>

                                <form action="{{ route('admin.user.verification.reject', $v->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button class="bg-red-600 text-white px-2 py-1 rounded">
                                        Reject
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-500">Approved</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center p-4 text-gray-500">
                            No verification data.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</x-admin-layout>
