@extends('admin.layouts.app')

@section('title', 'Admin Account')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-xl">
    @if(session('success'))
        <p class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('admin.account.update') }}" method="POST">
        @csrf

        <label class="block mb-2">Name</label>
        <input type="text" name="name" class="w-full p-2 border rounded"
               value="{{ $admin->name }}">
        <div class="mb-3">

        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control w-full p-2 border rounded" 
                value="{{ $admin->username }}">
        </div class="mb-3">


        <label class="block mt-4 mb-2">Email</label>
        <input type="email" name="email" class="w-full p-2 border rounded"
               value="{{ $admin->email }}">

        <label class="block mt-4 mb-2">New Password (optional)</label>
        <input type="password" name="password" class="w-full p-2 border rounded">

        <button class="mt-6 bg-blue-600 text-white px-4 py-2 rounded">
            Update Account
        </button>
    </form>
</div>

@endsection
