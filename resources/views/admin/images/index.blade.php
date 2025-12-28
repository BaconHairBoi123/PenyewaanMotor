@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Image Management</h1>

        <div class="mb-6">
            <input type="text" id="searchInput" placeholder="Cari Plat Nomor..."
                class="w-full p-3 border rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div id="motorcycleList" class="space-y-4">
            @include('admin.images._list') {{-- Kita pindahkan isi loop ke file terpisah --}}
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            let query = this.value;

            fetch("{{ route('admin.images_management') }}?search=" + query, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('motorcycleList').innerHTML = data;
            });
        });
    </script>
@endsection