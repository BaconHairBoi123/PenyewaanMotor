<x-admin-layout title="User Detail">

    <h1 class="text-2xl font-bold mb-4">Customer Detail</h1>

    <div class="bg-white p-6 rounded-xl shadow w-full max-w-lg">

        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone:</strong> {{ $user->phone_number ?? '-' }}</p>
        <p><strong>Registered:</strong> {{ $user->created_at->format('Y-m-d') }}</p>

        <a href="{{ route('admin.users.index') }}"
           class="mt-4 inline-block text-blue-600 hover:underline">
            ← Back to Users
        </a>
    </div>

</x-admin-layout>
