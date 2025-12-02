@extends('admin.layouts.app')

@section('title', 'Add Admin')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-2xl font-bold mb-5">Add New Admin</h1>

    <form action="{{ route('admin.admins.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Username</label>
            <input type="text" name="username" class="w-full border rounded p-2" required>
            @error('username') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
            @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Password</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
            @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Save
        </button>
        <a href="{{ route('admin.admins.index') }}" class="ml-3 text-gray-600 hover:underline">
            Cancel
        </a>
    </form>
</div>
@endsection
