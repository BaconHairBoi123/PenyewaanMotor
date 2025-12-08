# Struktur Blade.php - PenyewaanMotor

## Perubahan yang Dilakukan

File `wishlist.blade.php` telah dikonversi dari HTML murni menjadi struktur Blade.php Laravel dengan pemisahan template dan komponen.

## Struktur File

### Layout Master
- **`resources/views/user/layouts/app.blade.php`** - Layout utama yang berisi:
  - Head (meta, CSS, favicons)
  - Body dengan preloader
  - Sidebar
  - Header/Navigation
  - Sticky header
  - Content area (@yield)
  - Footer
  - Mobile navigation
  - Search popup
  - Scripts
  - Additional CSS/JS sections

### Komponen (Components)
Semua file komponen terletak di `resources/views/user/components/`:

1. **`header.blade.php`** - Header utama dengan:
   - Top menu (contact info, login/register)
   - Main navigation menu
   - Search & cart box
   - Call to action

2. **`footer.blade.php`** - Footer dengan:
   - About section
   - Quick links
   - Services
   - Contact info
   - Copyright & legal links

3. **`sidebar.blade.php`** - Sidebar widget dengan:
   - Logo
   - About section
   - Contact form
   - Contact info
   - Social media links

4. **`mobile-nav.blade.php`** - Mobile navigation menu

5. **`search-popup.blade.php`** - Search popup modal

### Halaman Konten
- **`resources/views/user/wishlist.blade.php`** - Wishlist page yang extend layout

## Penggunaan Blade Directives

File sekarang menggunakan Blade directives dan helpers Laravel:

```blade
@extends('user.layouts.app')           // Extend dari layout master
@section('title', 'Wishlist')          // Set title
@section('content') ... @endsection    // Content area
@forelse($wishlists as $item)          // Loop dengan fallback
{{ asset('path/to/file') }}            // Asset helper
{{ route('route-name') }}              // Route helper
{{ $variable }}                        // Echo variable
{{ $item->property ?? 'default' }}     // Null coalescing
```

## Cara Menggunakan

### Untuk membuat halaman baru:
```blade
@extends('user.layouts.app')

@section('title', 'Nama Halaman')

@section('additional-css')
    {{-- CSS tambahan jika diperlukan --}}
@endsection

@section('content')
    {{-- Konten halaman di sini --}}
@endsection

@section('additional-js')
    {{-- JavaScript tambahan jika diperlukan --}}
@endsection
```

### Include komponen:
```blade
@include('user.components.header')
@include('user.components.footer')
```

## Keuntungan Struktur Baru

1. **Reusability** - Komponen dapat digunakan di multiple halaman
2. **Maintainability** - Lebih mudah untuk update dan debug
3. **DRY** - Don't Repeat Yourself - tidak perlu duplicate HTML
4. **Dynamic** - Menggunakan Laravel helpers dan variables
5. **Scalability** - Mudah menambah halaman/fitur baru
6. **Performance** - Layout dan komponen ter-cache dengan baik

## Database Integration

File `wishlist.blade.php` sudah siap untuk dynamic data:

```blade
@forelse($wishlists as $item)
    <!-- Loop melalui wishlist items dari database -->
@empty
    <!-- Tampilkan pesan jika wishlist kosong -->
@endforelse
```

Controller hanya perlu pass data:
```php
return view('user.wishlist', [
    'wishlists' => $wishlistItems
]);
```

## Next Steps

1. Update semua halaman user lainnya menggunakan struktur yang sama
2. Buat controller untuk handle dynamic data
3. Setup routes di `routes/web.php`
4. Test semua halaman untuk memastikan styling dan functionality berjalan dengan baik
