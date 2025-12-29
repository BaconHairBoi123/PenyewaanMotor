@extends('admin.layouts.app')

@section('content')
    <div class="p-6 bg-white min-h-screen">
        <a href="{{ route('admin.images_management') }}" class="inline-block mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>

        <div class="flex flex-col md:flex-row gap-8 mb-10">
            <div class="w-full md:w-1/2 h-80 bg-gray-200 rounded-3xl overflow-hidden shadow-lg border relative">
                @if ($motorcycle->image_path)
                    <img src="{{ asset('storage/' . $motorcycle->image_path) }}" class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4 bg-black/50 text-white px-3 py-1 rounded-full text-xs">Foto Utama
                    </div>
                @else
                    <div class="flex items-center justify-center h-full text-gray-400 font-bold text-2xl">IMG MAIN</div>
                @endif
            </div>

            <div class="flex-grow">
                <p class="text-xl text-gray-500 uppercase tracking-widest">{{ $motorcycle->category }}</p>
                <h1 class="text-4xl font-bold text-gray-900 my-2">{{ $motorcycle->brand }}</h1>
                <p class="text-2xl text-gray-600 mb-6">{{ $motorcycle->type }} - {{ $motorcycle->license_plate }}</p>

                <form action="{{ route('admin.images_management.upload', $motorcycle->id) }}" method="POST"
                    enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    {{-- Input file disembunyikan, akan dipicu oleh tombol --}}
                    <input type="file" name="photos[]" id="fileInput" multiple class="hidden"
                        onchange="this.form.submit()">

                    <button type="button" onclick="document.getElementById('fileInput').click()"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-8 py-3 rounded-xl font-bold transition">
                        + IMG
                    </button>
                </form>

                @if (session('success'))
                    <div class="mt-4 text-green-600 font-bold text-sm">{{ session('success') }}</div>
                @endif
            </div>
        </div>

        <hr class="border-gray-100 mb-10">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($motorcycle->images as $img)
                <div class="relative group">
                    <div class="aspect-video bg-gray-100 rounded-2xl overflow-hidden border">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover">
                    </div>

                    <form action="{{ route('admin.images_management.delete', $img->id) }}" method="POST"
                        onsubmit="return confirm('Hapus foto ini?')" class="absolute top-2 left-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-white/90 p-2 rounded-lg shadow-sm hover:text-red-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            @endforeach

            {{-- Box Kosong Jika Belum Ada Foto Tambahan --}}
            @if ($motorcycle->images->count() == 0)
                @for ($i = 0; $i < 4; $i++)
                    <div
                        class="aspect-video bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl flex items-center justify-center text-gray-300 font-bold uppercase">
                        IMG
                    </div>
                @endfor
            @endif
        </div>
    </div>
@endsection
