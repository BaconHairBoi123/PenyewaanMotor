<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ride Nusa')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="/assets/images/favicons/site.webmanifest" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">


    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/animate.min.css" />
    <link rel="stylesheet" href="/assets/css/custom-animate.css" />
    <link rel="stylesheet" href="/assets/css/swiper.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/font-awesome-all.css" />
    <link rel="stylesheet" href="/assets/css/jarallax.css" />
    <link rel="stylesheet" href="/assets/css/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="/assets/css/flaticon.css" />
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="/assets/css/nice-select.css" />
    <link rel="stylesheet" href="/assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="/assets/css/aos.css" />
    <link rel="stylesheet" href="/assets/css/odometer.min.css" />
    <link rel="stylesheet" href="/assets/css/timePicker.css" />

    <!-- Module CSS -->
    <link rel="stylesheet" href="/assets/css/module-css/slider.css" />
    <link rel="stylesheet" href="/assets/css/module-css/footer.css" />
    <link rel="stylesheet" href="/assets/css/module-css/sliding-text.css" />
    <link rel="stylesheet" href="/assets/css/module-css/services.css" />
    <link rel="stylesheet" href="/assets/css/module-css/about.css" />
    <link rel="stylesheet" href="/assets/css/module-css/booking.css" />
    <link rel="stylesheet" href="/assets/css/module-css/counter.css" />
    <link rel="stylesheet" href="/assets/css/module-css/listing.css" />
    <link rel="stylesheet" href="/assets/css/module-css/video.css" />
    <link rel="stylesheet" href="/assets/css/module-css/pricing.css" />
    <link rel="stylesheet" href="/assets/css/module-css/popular-car.css" />
    <link rel="stylesheet" href="/assets/css/module-css/testimonial.css" />
    <link rel="stylesheet" href="/assets/css/module-css/faq.css" />
    <link rel="stylesheet" href="/assets/css/module-css/team.css" />
    <link rel="stylesheet" href="/assets/css/module-css/call.css" />
    <link rel="stylesheet" href="/assets/css/module-css/download-app.css" />
    <link rel="stylesheet" href="/assets/css/module-css/brand.css" />
    <link rel="stylesheet" href="/assets/css/module-css/blog.css" />
    <link rel="stylesheet" href="/assets/css/module-css/lets-talk.css" />
    <link rel="stylesheet" href="/assets/css/module-css/process.css" />
    <link rel="stylesheet" href="/assets/css/module-css/why-choose.css" />
    <link rel="stylesheet" href="/assets/css/module-css/gallery.css" />
    <link rel="stylesheet" href="/assets/css/module-css/page-header.css" />
    <link rel="stylesheet" href="/assets/css/module-css/error.css" />
    <link rel="stylesheet" href="/assets/css/module-css/shop.css" />
    <link rel="stylesheet" href="/assets/css/module-css/contact.css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/responsive.css" />



</head>

<body>

    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <header class="main-header">
                    <div class="container d-flex justify-content-between align-items-center py-3">
                        <div class="main-menu__left">

                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="/assets/images/resources/logo_ridenusa_head.png" alt="Ride Nusa"
                                    style="height:40px;">
                            </a>
                        </div>
                        <div class="main-menu__middle-box">
                            <div class="main-menu__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">

                                    <li>

                                        <a href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}">Register</a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </nav>

    <!-- Main Slider Start -->
    <section class="main-slider">
        <div class="main-slider__carousel owl-carousel owl-theme">

            <div class="item">
                <div class="main-slider__bg"
                    style="background-image: url('/assets/images/backgrounds/1680x550_booking-one-bg.jpg');">
                </div><!-- /.slider-one__bg -->
                <div class="container">
                    <div class="main-slider__content">
                        <div class="main-slider__sub-title-box">
                            <p class="main-slider__sub-title">Your Best</p>
                        </div>
                        <h2 class="main-slider__title">Motorcycle <span>Rental</span></h2>
                        <p class="main-slider__sub-title-two">Experience</p>
                        <div class="main-slider__btn-and-video-box">
                            <div class="main-slider__btn-box">
                                <a href="about.html" class="thm-btn">Read More<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                            <div class="main-slider__video-link">
                                <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                    <div class="main-slider__video-icon">
                                        <span class="icon-play-2"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                                <h4 class="main-slider__video-title">Watch Video</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="main-slider__bg" style="background-image: url(/assets/images/backgrounds/xsr155.jpeg);">
                </div><!-- /.slider-one__bg -->
                <div class="container">
                    <div class="main-slider__content">
                        <div class="main-slider__sub-title-box">
                            <p class="main-slider__sub-title">Your Best</p>
                        </div>
                        <h2 class="main-slider__title">Motorcycle<span>Booking</span></h2>
                        <p class="main-slider__sub-title-two">Experience</p>
                        <div class="main-slider__btn-and-video-box">
                            <div class="main-slider__btn-box">
                                <a href="about.html" class="thm-btn">Read More<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                            <div class="main-slider__video-link">
                                <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                    <div class="main-slider__video-icon">
                                        <span class="icon-play-2"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                                <h4 class="main-slider__video-title">Watch Video</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="main-slider__bg"
                    style="background-image: url('/assets/images/backgrounds/nmaxturbo.jpeg');">
                </div><!-- /.slider-one__bg -->
                <div class="container">
                    <div class="main-slider__content">
                        <div class="main-slider__sub-title-box">
                            <p class="main-slider__sub-title">Your Best</p>
                        </div>
                        <h2 class="main-slider__title">Motorcycle<span>Choosing</span></h2>
                        <p class="main-slider__sub-title-two">Experience</p>
                        <div class="main-slider__btn-and-video-box">
                            <div class="main-slider__btn-box">
                                <a href="about.html" class="thm-btn">Read More<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                            <div class="main-slider__video-link">
                                <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                    <div class="main-slider__video-icon">
                                        <span class="icon-play-2"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                                <h4 class="main-slider__video-title">Watch Video</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>


    <!--Main Slider Start -->
    <section class="listing-one">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape">
                        <img src="{{ asset('assets/images/shapes/logo_BGT.png') }}" alt="">
                    </div>
                    <span class="section-title__tagline">Checkout our new Motorcycle</span>
                </div>
                <h2 class="section-title__title title-animation">Explore Most Popular Motorcycle</h2>
            </div>

            <div class="listing-one__tab-box listing-one-tabs-box">
                <ul class="listing-one-tab-buttons listing-one-tab-btns clearfix list-unstyled">
                    <li data-tab="#all" class="p-tab-btn active-btn"><span>All Brands</span></li>
                    @foreach ($motorcycles->pluck('brand')->unique() as $brand)
                        <li data-tab="#{{ Str::slug($brand) }}" class="p-tab-btn">
                            <span>{{ $brand }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="p-tabs-content">
                    <div class="p-tab active-tab" id="all">
                        <div class="listing-one__inner">
                            <div class="row">
                                @foreach ($motorcycles->shuffle()->take(6) as $m)
                                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                @if ($m->image_path && file_exists(public_path('storage/motorcycles/' . $m->image_path)))
                                                    <img src="{{ asset('storage/motorcycles/' . $m->image_path) }}"
                                                        alt="{{ $m->category }}">
                                                @else
                                                    <img src="{{ asset('assets/images/resources/RIDEnotrasparan.png') }}"
                                                        alt="No Image Available">
                                                @endif

                                                <div class="listing-one__brand-name">
                                                    <p>{{ strtoupper($m->brand) }}</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a
                                                        href="#">{{ $m->category }}</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon"><span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>{{ ucfirst($m->transmission) }}</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>{{ $m->lastService->kilometer ?? 0 }} KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                {{-- Mengubah 'big_matic' menjadi 'Big Matic' agar lebih rapi --}}
                                                                <p>{{ str_replace('_', '', ucfirst($m->type)) }}
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>{{ $m->fuel_configuration }}</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                {{-- Karena di tabel tidak ada kolom kilometer, kita tampilkan CC saja atau tgl service --}}
                                                                <p>{{ $m->cc }} CC</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                {{-- Jika ada data service, tampilkan kilometernya. Jika tidak ada, tampilkan 0 --}}
                                                                <p>{{ $m->lastService->kilometer ?? 0 }} KM</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From <span>Rp
                                                            {{ number_format($m->price, 0, ',', '.') }}/</span>
                                                        Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="{{ route('login') }}" class="thm-btn">Details
                                                        Now<span class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @foreach ($motorcycles->pluck('brand')->unique() as $brand)
                        <div class="p-tab" id="{{ Str::slug($brand) }}">
                            <div class="listing-one__inner">
                                <div class="row">
                                    @foreach ($motorcycles->where('brand', $brand) as $m)
                                        <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                            <div class="listing-one__single">
                                                <div class="listing-one__img">
                                                    @if ($m->image_path && file_exists(public_path('storage/motorcycles/' . $m->image_path)))
                                                        <img src="{{ asset('storage/motorcycles/' . $m->image_path) }}"
                                                            alt="{{ $m->category }}">
                                                    @else
                                                        <img src="{{ asset('assets/images/resources/RIDEnotrasparan.png') }}"
                                                            alt="No Image Available">
                                                    @endif

                                                    <div class="listing-one__brand-name">
                                                        <p>{{ strtoupper($m->brand) }}</p>
                                                    </div>
                                                </div>
                                                <div class="listing-one__content">
                                                    <h3 class="listing-one__title"><a
                                                            href="#">{{ $m->category }}</a></h3>
                                                    <div class="listing-one__meta-box-info">
                                                        <ul class="list-unstyled listing-one__meta">
                                                            <li>
                                                                <div class="icon"><span class="icon-manual"></span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>{{ ucfirst($m->transmission) }}</p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="icon"><span class="icon-mileage"></span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>{{ $m->lastService->kilometer ?? 0 }} KM</p>
                                                                </div>
                                                                <li>
                                                                    <div class="icon"><span
                                                                            class="icon-test-drive"></span>
                                                                    </div>
                                                                    <div class="text">
                                                                        {{-- Mengubah 'big_matic' menjadi 'Big Matic' agar lebih rapi --}}
                                                                        <p>{{ str_replace('_', ' ', ucfirst($m->type)) }}
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                            </li>
                                                            <li>
                                                                <div class="icon"><span
                                                                        class="icon-fuel-type"></span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>{{ $m->fuel_configuration }}</p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="icon"><span class="icon-mileage"></span>
                                                                </div>
                                                                <div class="text">
                                                                    {{-- Karena di tabel tidak ada kolom kilometer, kita tampilkan CC saja atau tgl service --}}
                                                                    <p>{{ $m->cc }} CC</p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="icon"><span class="icon-mileage"></span>
                                                                </div>
                                                                <div class="text">
                                                                    {{-- Jika ada data service, tampilkan kilometernya. Jika tidak ada, tampilkan 0 --}}
                                                                    <p>{{ $m->lastService->kilometer ?? 0 }} KM</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="listing-one__car-rent-box">
                                                        <p class="listing-one__car-rent">Starting From <span>Rp
                                                                {{ number_format($m->price, 0, ',', '.') }}/</span>
                                                            Day
                                                        </p>
                                                    </div>
                                                    <div class="listing-one__btn-box">
                                                        <a href="{{ route('login') }}" class="thm-btn">Details
                                                            Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>







    <!-- Script yang dibutuhkan -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/jarallax.min.js"></script>
    <script src="/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="/assets/js/jquery.appear.min.js"></script>
    <script src="/assets/js/swiper.min.js"></script>
    <script src="/assets/js/jquery.circle-progress.min.js"></script>
    <script src="/assets/js/knob.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script src="/assets/js/wNumb.min.js"></script>
    <script src="/assets/js/wow.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery-ui.js"></script>
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="/assets/js/jquery-sidebar-content.js"></script>
    <script src="/assets/js/gsap/gsap.js"></script>
    <script src="/assets/js/gsap/ScrollTrigger.js"></script>
    <script src="/assets/js/gsap/SplitText.js"></script>
    <script src="/assets/js/marquee.min.js"></script>
    <script src="/assets/js/odometer.min.js"></script>
    <script src="/assets/js/timePicker.js"></script>
    <script src="/assets/js/typed-2.0.11.js"></script>
    <script src="/assets/js/aos.js"></script>

    <!-- Template JS -->
    <script src="/assets/js/script.js"></script>

</body>

</html>
