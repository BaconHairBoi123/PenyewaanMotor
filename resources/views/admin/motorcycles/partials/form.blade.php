{{-- General Validation Error Summary --}}
@if ($errors->any())
    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
        <div class="flex items-center gap-2 mb-2 text-red-700 font-semibold">
            <i class="ri-error-warning-line text-lg"></i>
            <span>Terdapat kesalahan pada form:</span>
        </div>
        <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label class="block">Name</label>
    <input type="text" name="category"
           value="{{ old('category', $motorcycle->category ?? '') }}"
           class="w-full p-2 border rounded" required>
</div>

<div>
    <label class="block">Brand</label>
    <input type="text" name="brand"
           value="{{ old('brand', $motorcycle->brand ?? '') }}"
           class="w-full p-2 border rounded" required>
</div>

<div>
    <label class="block">Type</label>
    <select name="type" class="w-full p-2 border rounded" required>
        <option value="">-- Select Type --</option>

        <option value="small_matic"
            {{ old('type', $motorcycle->type ?? '') === 'small_matic' ? 'selected' : '' }}>
            Small Automatic
        </option>

        <option value="big_matic"
            {{ old('type', $motorcycle->type ?? '') === 'big_matic' ? 'selected' : '' }}>
            Big Automatic
        </option>

        <option value="manual"
            {{ old('type', $motorcycle->type ?? '') === 'manual' ? 'selected' : '' }}>
            Manual
        </option>
    </select>
</div>

<div>
    <label class="block">CC</label>
    <input type="number" name="cc"
           value="{{ old('cc', $motorcycle->cc ?? '') }}"
           class="w-full p-2 border rounded" required>
</div>

<div>
    <label class="block">Transmission</label>
    <select name="transmission" class="w-full p-2 border rounded" required>
        <option value="">-- Select Transmission --</option>

        <option value="manual"
            {{ old('transmission', $motorcycle->transmission ?? '') === 'manual' ? 'selected' : '' }}>
            Manual
        </option>

        <option value="automatic"
            {{ old('transmission', $motorcycle->transmission ?? '') === 'automatic' ? 'selected' : '' }}>
            Automatic
        </option>
    </select>
</div>

<div>
    <label class="block">Fuel Configuration</label>
    <input type="text" name="fuel_configuration"
           value="{{ old('fuel_configuration', $motorcycle->fuel_configuration ?? '') }}"
           class="w-full p-2 border rounded">
</div>

<div>
    <label class="block">Price</label>
    <input type="number" name="price"
           value="{{ old('price', $motorcycle->price ?? '') }}"
           class="w-full p-2 border rounded" required>
</div>

<div>
    <label class="block font-medium mb-1">
        License Plate
        <span class="text-red-500">*</span>
    </label>
    <input type="text" name="license_plate"
           value="{{ old('license_plate', $motorcycle->license_plate ?? '') }}"
           class="w-full p-2 border rounded @error('license_plate') border-red-500 bg-red-50 @enderror"
           placeholder="Contoh: B 1234 XYZ"
           required>
    @error('license_plate')
        <div class="flex items-center gap-1 mt-1 text-sm text-red-600">
            <i class="ri-error-warning-fill"></i>
            <span>{{ $message }}</span>
        </div>
    @enderror
</div>

<div>
    <label class="block">Image</label>
    <input type="file" name="image" class="w-full p-2 border rounded">

    @if(isset($motorcycle) && $motorcycle->image_path)
        <img src="{{ asset('storage/motorcycles/' . $motorcycle->image_path) }}"
             class="h-24 mt-2 rounded">
    @endif
</div>

<div>
    <label class="block">Description</label>
    <textarea name="description" rows="4" class="w-full p-2 border rounded" placeholder="Short description about the motorcycle">{{ old('description', $motorcycle->description ?? '') }}</textarea>
</div>
