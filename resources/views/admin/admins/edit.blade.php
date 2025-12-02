@extends('admin.layouts.app')

@section('title', 'Edit Admin')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-2xl font-bold mb-5">Edit Admin</h1>

    <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Name</label>
            <input type="text" name="name" 
                   class="w-full border rounded p-2"
                   value="{{ $admin->name }}" required>
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Username</label>
            <input type="text" name="username" 
                   class="w-full border rounded p-2"
                   value="{{ $admin->username }}" required>
            @error('username') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" 
                   class="w-full border rounded p-2"
                   value="{{ $admin->email }}" required>
            @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">
                New Password (optional)
            </label>
            <input type="password" name="password" class="w-full border rounded p-2">
            <p class="text-gray-500 text-sm">Leave empty if you don't want to change it.</p>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Update
        </button>
        <a href="{{ route('admin.admins.index') }}" class="ml-3 text-gray-600 hover:underline">
            Cancel
        </a>
    </form>
</div>
@endsection
