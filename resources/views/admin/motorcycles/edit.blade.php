<x-admin-layout title="Edit Motorcycle">

    <h1 class="text-2xl font-bold mb-6">Edit Motorcycle</h1>

    <form action="{{ route('admin.motorcycles.update', $motorcycle->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        @include('admin.motorcycles.partials.form')

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    </form>

</x-admin-layout>
