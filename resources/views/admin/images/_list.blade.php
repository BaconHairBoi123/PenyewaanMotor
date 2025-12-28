@foreach ($motorcycles as $motor)
    <div class="flex items-center bg-white p-4 rounded-xl shadow border">
        <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center">
            @if ($motor->image_path)
                <img src="{{ asset('storage/' . $motor->image_path) }}"
                    class="object-cover w-full h-full rounded">
            @else
                <span class="text-xs font-bold text-gray-400">IMG</span>
            @endif
        </div>
        <div class="ml-4 flex-grow">
            <h2 class="font-bold">{{ $motor->brand }}</h2>
            <p class="text-sm text-gray-500">{{ $motor->license_plate }}</p>
        </div>
        <div class="text-right flex items-center gap-4">
            <span class="px-3 py-1 bg-gray-100 rounded-full text-sm">
                IMG + {{ $motor->images_count }}
            </span>
            <a href="{{ route('admin.images_management.manage', $motor->id) }}"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                Manage
            </a>
        </div>
    </div>
@endforeach