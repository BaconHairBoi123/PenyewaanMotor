@props([
    'title' => 'Gorent'
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title }} || Gorent || Gorent HTML 5 Template</title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />
    <meta name="description" content="Gorent HTML 5 Template" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />

    {{-- CSS tambahan dari page --}}
    {{ $additionalCss ?? '' }}
</head>

<body class="custom-cursor">

    <div class="body-bg-shape"
        style="background-image: url({{ asset('assets/images/shapes/body-bg-shape.jpg') }});"></div>

    <!-- Preloader -->
    <div class="loader js-preloader">
        <div></div>
        <div></div>
        <div></div>
    </div>

    @include('user.components.sidebar')

    <div class="page-wrapper">
        @include('user.components.header')

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        {{-- === ISI HALAMAN === --}}
        {{ $slot }}

        @include('user.components.footer')
    </div>

    @include('user.components.mobile-nav')
    @include('user.components.search-popup')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    {{-- JS tambahan dari page --}}
    {{ $additionalJs ?? '' }}
</body>

</html>
