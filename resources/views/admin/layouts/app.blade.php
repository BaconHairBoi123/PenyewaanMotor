<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    <div class="flex-1 ml-64">

        {{-- Navbar --}}
        @include('admin.layouts.navbar')

        {{-- Content --}}
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">@yield('title')</h1>

            @yield('content')
        </div>
    </div>

</body>
</html>
