<x-admin-layout title="Edit User">

    <h1 class="text-2xl font-bold mb-6">Edit User</h1>

    <div class="bg-white p-6 rounded-xl shadow w-full max-w-lg">

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-3">
                <span>Name</span>
                <input type="text" name="name" class="mt-1 w-full border rounded p-2"
                       value="{{ old('name', $user->name) }}">
            </label>

            <label class="block mb-3">
                <span>Email</span>
                <input type="email" name="email" class="mt-1 w-full border rounded p-2"
                       value="{{ old('email', $user->email) }}">
            </label>

            <label class="block mb-3">
                <span>Phone</span>
                <input type="text" name="phone_number" class="mt-1 w-full border rounded p-2"
                       value="{{ old('phone_number', $user->phone_number) }}">
            </label>

            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Changes
            </button>
        </form>
    </div>

</x-admin-layout>
