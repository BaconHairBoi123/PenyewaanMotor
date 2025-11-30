<x-admin-layout title="Users Management">

    <h1 class="text-3xl font-bold mb-6">Customer List</h1>

    @if(session('success'))
        <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-xl shadow">
        <table class="w-full table-auto">
            <thead>
                <tr class="text-left border-b">
                    <th class="py-2">Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr class="border-b">
                        <td class="py-2">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number ?? '-' }}</td>

                        <td class="text-right">
                            <a href="{{ route('admin.users.show', $user->id) }}"
                               class="text-blue-600 hover:underline">View</a>

                            <a href="{{ route('admin.users.edit', $user->id) }}"
                               class="text-yellow-600 hover:underline mx-2">Edit</a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}"
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline"
                                        onclick="return confirm('Delete this user?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

</x-admin-layout>
