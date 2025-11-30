<x-admin-layout title="Add Motorcycle">

    <h1 class="text-2xl font-bold mb-6">Add Motorcycle</h1>

    <form action="{{ route('admin.motorcycles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        @include('admin.motorcycles.partials.form')

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>

</x-admin-layout>