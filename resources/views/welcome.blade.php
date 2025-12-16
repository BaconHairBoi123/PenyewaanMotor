
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
    <!-- <link rel="stylesheet" href="/assets/css/font-awesome-all.css" /> -->
    <link rel="stylesheet" href="/assets/css/jarallax.css" />
    <link rel="stylesheet" href="/assets/css/jquery.magnific-popup.css" />
    <!-- <link rel="stylesheet" href="/assets/css/flaticon.css" /> -->
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
        
        <div class="page-wrapper">
            <header class="main-header">
                <div class="container d-flex justify-content-between align-items-center py-3">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/assets/images/resources/logo_ridenusa_head.png" alt="Ride Nusa" style="height:40px;">
                    </a>
                    <div>
                        <a href="{{ route('login') }}"  class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">Login</a>
                        <a href="{{ route('register') }}"  class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Register</a>
                    </div>
                </div>
            </header>
        </div>

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
                            <h2 class="main-slider__title">Motorcyle <span>Rental</span></h2>
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
                        style="background-image: url(/assets/images/backgrounds/xsr155.jpeg);">
                    </div><!-- /.slider-one__bg -->
                    <div class="container">
                        <div class="main-slider__content">
                            <div class="main-slider__sub-title-box">
                                <p class="main-slider__sub-title">Your Best</p>
                            </div>
                            <h2 class="main-slider__title">Motorcyle<span>Booking</span></h2>
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
                            <h2 class="main-slider__title">Motorcyle<span>Choosing</span></h2>
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






        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">

            @foreach ($motorcycles as $m)
            {{-- Menggunakan rounded-3xl dan shadow-xl agar lebih tebal seperti di foto --}}
            <div class="bg-white p-4 rounded-3xl shadow-xl border border-gray-100">

                {{-- IMAGE --}}
                <div class="rounded-2xl overflow-hidden relative">
                    {{-- Sesuaikan tinggi gambar --}}
                    <img src="{{ asset('storage/motorcycles/' . $m->image_path) }}" 
                        class="w-full h-44 object-cover">

                    {{-- BRAND BADGE --}}
                    <span class="absolute top-3 left-3 bg-yellow-400 text-black px-3 py-1 rounded-md text-xs font-bold">
                        {{ strtoupper($m->brand) }}
                    </span>
                </div>

                {{-- TITLE --}}
                {{-- Menggunakan data $m->type dan menambahkan tahun 2025 (asumsi) --}}
                <h2 class="text-xl font-bold mt-2">{{ $m->type }} 2025</h2>

                <hr class="my-3 border-gray-200">

                {{-- DETAILS ROW - Penataan agar berpasangan dalam satu baris --}}
                <div class="flex flex-wrap gap-y-2 text-sm text-gray-700">

                    {{-- Transmission & Kilometer (Baris 1) --}}
                    <div class="flex w-1/2">
                        {{-- Ikon Transmission --}}
                        <span class="mr-2 text-gray-500">⚙</span>
                        <span class="font-semibold text-gray-800">{{ ucfirst($m->transmission) }}</span>
                    </div>

                    <div class="flex w-1/2">
                        {{-- Ikon Kilometer --}}
                        <span class="mr-2 text-gray-500">🛣</span>
                        {{-- Menggunakan data kilometer dari lastService atau 0 --}}
                        <span class="font-semibold text-gray-800">{{ $m->lastService->kilometer ?? 0 }} km</span>
                    </div>

                    {{-- Category & Age (Baris 2) --}}
                    <div class="flex w-1/2">
                        {{-- Ikon Category --}}
                        <span class="mr-2 text-gray-500">🏍</span>
                        {{-- Menggunakan data $m->category --}}
                        <span class="font-semibold text-gray-800">{{ $m->category }}</span>
                    </div>
                    
                    <div class="flex w-1/2">
                        {{-- Ikon Age --}}
                        <span class="mr-2 text-gray-500">👤</span>
                        {{-- Menggunakan data $m->age (asumsi field ini ada) --}}
                        <span class="font-semibold text-gray-800">{{ $m->age ?? 17 }} age</span>
                    </div>
                    
                    {{-- Fuel (Baris 3) --}}
                    <div class="flex w-full">
                        {{-- Ikon Fuel --}}
                        <span class="mr-2 text-gray-500">⛽</span>
                        {{-- Menggunakan data $m->fuel_configuration --}}
                        <span class="font-semibold text-gray-800">{{ $m->fuel_configuration }}</span>
                    </div>

                </div>

                {{-- PRICE --}}
                <div class="py-2 mt-4 text-sm">
                    <span class="text-gray-600">Starting From</span>
                    
                    {{-- Menggunakan data $m->price dan memformatnya, serta memisahkan / Day --}}
                    <span class="text-xl text-yellow-500 font-extrabold ml-1">
                        {{ number_format($m->price, 0, ',', '.') }}
                    </span>
                    <span class="text-sm text-gray-600 font-semibold">
                        / Day
                    </span>
                </div>

                {{-- BUTTON --}}
                <a href="{{ route('login') }}">
                    <button class="bg-yellow-400 hover:bg-yellow-500 w-full py-3 mt-4 rounded-lg font-bold text-sm">
                        Details Now →
                    </button>
                </a>

            </div>
            @endforeach
            
        </div>



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
