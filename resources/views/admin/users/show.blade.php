<x-admin-layout title="User Detail">

    <h1 class="text-2xl font-bold mb-4">Customer Detail</h1>

    <div class="bg-white p-6 rounded-xl shadow w-full max-w-lg space-y-2">

        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone:</strong> {{ $user->phone_number ?? '-' }}</p>
        <p><strong>Registered:</strong> {{ $user->created_at->format('Y-m-d') }}</p>

        <p>
            <strong>Verification Status:</strong>
            @if ($user->verification_status === 'verified')
                <span class="ml-2 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                    Verified
                </span>
            @else
                <span class="ml-2 px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                    Unverified
                </span>
            @endif
        </p>

        <a href="{{ route('admin.users.index') }}"
           class="mt-4 inline-block text-blue-600 hover:underline">
            ← Back to Users
        </a>
    </div>

</x-admin-layout>
