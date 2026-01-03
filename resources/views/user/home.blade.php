@extends('user.layouts.app') <!-- Menggunakan layout app.blade.php -->

@section('content')
    <!-- Bagian konten halaman home -->


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
                                <a href="{{ route('about') }}" class="thm-btn">Read More<span
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
                                <a href="{{ route('about') }}" class="thm-btn">Read More<span class="fas fa-arrow-right"></span></a>
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
                <div class="main-slider__bg" style="background-image: url('/assets/images/backgrounds/nmaxturbo.jpeg');">
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
                                <a href="{{ route('about') }}" class="thm-btn">Read More<span class="fas fa-arrow-right"></span></a>
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


    <!-- Services One Start -->
    <section class="services-one">
        <div class="services-one__shape-1"></div>
        <div class="services-one__shape-2"></div>
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape">
                        <img src="/assets/images/shapes/logo_BGT.png" alt="">
                    </div>
                    <span class="section-title__tagline">What We’re Offering</span>
                </div>
                <h2 class="section-title__title title-animation">Services We’re Provding <br> to Customers</h2>
            </div>
            <div class="row">
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                    <div class="services-one__single" style="height: 100%;">
                        <div class="services-one__single-shape-1"></div>
                        <div class="services-one__single-shape-2"></div>
                        <div class="services-one__single-shape-3"></div>
                        <div class="services-one__count"></div>
                        <div class="services-one__icon">
                            <!-- <span class="icon-car"></span> -->
                        </div>
                        <h3 class="services-one__title"><a href="{{ route('services') }}">Ride Nusa’s Most Luxurious
                                Motorcycles</a>
                        </h3>
                        <p class="services-one__text">We offer exclusive motorcycles that you can rent during your holiday
                            or stay in Bali.</p>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="services-one__single" style="height: 100%;">
                        <div class="services-one__single-shape-1"></div>
                        <div class="services-one__single-shape-2"></div>
                        <div class="services-one__single-shape-3"></div>
                        <div class="services-one__count"></div>
                        <div class="services-one__icon">
                            <!-- <span class="icon-taxi"></span> -->
                        </div>
                        <h3 class="services-one__title"><a href="{{ route('services') }}">Well-Maintained Motorcycles</a>
                        </h3>
                        <p class="services-one__text">We provide well-maintained and regularly serviced motorcycles to ensure safety and comfort during your ride.</p>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms" data-wow-duration="1500ms">
                    <div class="services-one__single" style="height: 100%;">
                        <div class="services-one__single-shape-1"></div>
                        <div class="services-one__single-shape-2"></div>
                        <div class="services-one__single-shape-3"></div>
                        <div class="services-one__count"></div>
                        <div class="services-one__icon">
                            <!-- <span class="icon-sport-car-1"></span> -->
                        </div>
                        <h3 class="services-one__title"><a href="{{ route('services') }}">Riding Class</a></h3>
                        <p class="services-one__text">We offer riding classes for travelers who are not yet confident or experienced in riding motorcycles.</p>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="700ms" data-wow-duration="1500ms">
                    <div class="services-one__single" style="height: 100%;">
                        <div class="services-one__single-shape-1"></div>
                        <div class="services-one__single-shape-2"></div>
                        <div class="services-one__single-shape-3"></div>
                        <div class="services-one__count"></div>
                        <div class="services-one__icon">
                            <!-- <span class="icon-car-insurance"></span> -->
                        </div>
                        <h3 class="services-one__title"><a href="{{ route('services') }}">Additional Accessories</a></h3>
                        <p class="services-one__text">We provide additional riding accessories to ensure a safe and comfortable riding experience.</p>
                    </div>
                </div>
                <!--Services One Single End-->
            </div>
        </div>
    </section>
    <!-- Services One End -->


    <!-- About One Start -->
    <section class="about-one about-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-one__img-box">
                            <div class="about-one__img">
                                <img src="/assets/images/resources/about-one-img-1.jpg" alt="">
                            </div>
                            <div class="about-one__shape-2 float-bob-y">
                                <img src="/assets/images/shapes/about-one-shape-2.png" alt="">
                            </div>
                            <div class="about-one__shape-1">
                                <img src="/assets/images/shapes/about-one-shape-1.png" alt="">
                            </div>
                            <div class="about-one__shape-4 float-bob-x">
                                <img src="/assets/images/shapes/about-one-shape-4.jpg" alt="">
                            </div>
                            <div class="about-one__shape-3 float-bob-x">
                                <img src="/assets/images/shapes/about-one-shape-3.png" alt="">
                            </div>
                            <div class="about-one__img-2">
                                <img src="/assets/images/resources/about-one-img-2.png" alt="">
                            </div>
                            <div class="about-one__experience">
                                <div class="about-one__experience-count">
                                    <h3 class="odometer">0</h3>
                                    <span>+</span>
                                </div>
                                <p class="about-one__experience-text">Years of <br>Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__right">
                        <div class="section-title text-left sec-title-animation animation-style1">
                            <div class="section-title__tagline-box">
                                <div class="section-title__tagline-shape">
                                    <img src="/assets/images/shapes/logo_BGT.png" alt="">
                                </div>
                                <span class="section-title__tagline">About Ride Nusa</span>
                            </div>
                            <h2 class="section-title__title title-animation">Premier Motorcycle Rentals for Your Island Adventure</h2>
                        </div>
                        <p class="about-one__text-1">Experience the ultimate freedom on two wheels. <br> We provide top-quality bikes and 24/7 support to ensure your journey is safe and unforgettable.
                        </p>
                        <p class="about-one__text-2">Ride Nusa is your trusted partner for premium transportation. We pride ourselves on delivering ultimate service through a well-maintained fleet, transparent pricing, and a seamless booking process designed for modern travelers.</p>
                        <ul class="about-one__progress-box list-unstyled">
                            <li>
                                <div class="about-one__progress">
                                    <h4 class="about-one__progress-title">On-Time Delivery</h4>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="98%">
                                            <div class="count-text">98%</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="about-one__progress">
                                    <h4 class="about-one__progress-title">Bike Maintenance</h4>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="100%">
                                            <div class="count-text">100%</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="about-one__btn-box-and-call-box">
                            <div class="about-one__btn-box">
                                <a href="{{ route('about') }}" class="about-one__btn thm-btn">Read More<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                            <div class="about-one__call-box">
                                <div class="about-one__call-box-icon">
                                    <span class="icon-call-2"></span>
                                </div>
                                <div class="about-one__call-box-content">
                                    <p>Call to Anytime</p>
                                    <h4><a href="tel:15502505260">+1 (550) 250 5260</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About One End -->

    <!-- Process One Start -->
    <section class="process-one">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style2">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape">
                        <img src="/assets/images/shapes/logo_BGT.png" alt="">
                    </div>
                    <span class="section-title__tagline">Steps</span>
                </div>
                <h2 class="section-title__title title-animation">Motorcycle Rental Process</h2>
            </div>
            <div class="row">
                <!-- Process One Single Start -->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                    <div class="process-one__single" style="height: 100%;">
                        <div class="process-one__single-bg"
                            style="background-image: url('/assets/images/backgrounds/300x268_process-single-bg1.jpg');">
                        </div>
                        <div class="process-one__icon-box">
                            <div class="process-one__icon-shape"></div>
                            <div class="process-one__icon">

                                <i class="ri-motorbike-fill" style="font-size: 32px; color: black;"></i>

                            </div>
                            <div class="process-one__count"></div>
                        </div>
                        <h3 class="process-one__title">Choose A Motorcycle</h3>
                        <p class="process-one__text">Choose a motorbike according to your criteria</p>
                    </div>
                </div>
                <!-- Process One Single End -->
                <!-- Process One Single Start -->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="process-one__single" style="height: 100%;">
                        <div class="process-one__single-bg"
                            style="background-image: url('/assets/images/backgrounds/300X268process-one-single-bg2.jpg');">
                        </div>
                        <div class="process-one__icon-box">
                            <div class="process-one__icon-shape"></div>
                            <div class="process-one__icon">
                                <i class="ri-customer-service-2-line" style="font-size: 32px; color: black;"></i>
                            </div>
                            <div class="process-one__count"></div>
                        </div>
                        <h3 class="process-one__title">Come In Contact</h3>
                        <p class="process-one__text">Contact us and we will deliver it</p>
                    </div>
                </div>
                <!-- Process One Single End -->
                <!-- Process One Single Start -->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms" data-wow-duration="1500ms">
                    <div class="process-one__single" style="height: 100%;">
                        <div class="process-one__single-bg"
                            style="background-image: url('/assets/images/backgrounds/300x268_process-single-bg3yangbaruu.jpeg');">
                        </div>
                        <div class="process-one__icon-box">
                            <div class="process-one__icon-shape"></div>
                            <div class="process-one__icon">

                                <i class="ri-map-pin-line" style="font-size: 32px; color: black;"></i>

                            </div>
                            <div class="process-one__count"></div>
                        </div>
                        <h3 class="process-one__title">Pick-Up Locations</h3>
                        <p class="process-one__text">You can pick it up at our office, or we can deliver it to your
                            requested location.</p>
                    </div>
                </div>
                <!-- Process One Single End -->
                <!-- Process One Single Start -->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="700ms" data-wow-duration="1500ms">
                    <div class="process-one__single" style="height: 100%;">
                        <div class="process-one__single-bg"
                            style="background-image: url('/assets/images/backgrounds/300x268_process-single-bg4yangbaru.jpg');">
                        </div>
                        <div class="process-one__icon-box">
                            <div class="process-one__icon-shape"></div>
                            <div class="process-one__icon">
                                <i class="ri-riding-fill" style="font-size: 32px; color: black;"></i>
                            </div>
                            <div class="process-one__count"></div>
                        </div>
                        <h3 class="process-one__title">Enjoy Driving</h3>
                        <p class="process-one__text"></p>Enjoy your trip and stay safe while driving, both for yourself and
                        those around you.</p>
                    </div>
                </div>
                <!-- Process One Single End -->
            </div>
        </div>
    </section>
    <!-- Process One End -->



    <!-- Why Choose One Start -->
    <section class="why-choose-one">
        <div class="why-choose-one__shape-1"></div>
        <div class="why-choose-one__shape-2"></div>
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style2">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape">
                        <img src="/assets/images/shapes/logo_BGT.png" alt="">
                    </div>
                    <span class="section-title__tagline">Why Choose Us</span>
                </div>
                <h2 class="section-title__title title-animation">We are innovative and passionate <br> about the
                    work we
                    do.</h2>
            </div>
            <div class="row">
                <!-- Why Choose One Single Start -->
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                    <div class="why-choose-one__single" style="height: 100%;">
                        <div class="why-choose-one__icon">
                            <span class="icon-range"></span>
                        </div>
                        <div class="why-choose-one__single-inner">
                            <h3 class="why-choose-one__title">Easy & Fast Booking</h3>
                            <p class="why-choose-one__text">Our booking process is simple and efficient, allowing you to
                                reserve your motorbike in just a few steps—quick, hassle-free, and convenient.
                            </p>
                        </div>
                        <div class="why-choose-one__btn-box">
                            <a href="{{ route('motorcycles.index') }}" class="thm-btn">Rent Now<span
                                    class="fas fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <!-- Why Choose One Single End -->
                <!-- Why Choose One Single Start -->
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="why-choose-one__single" style="height: 100%;">
                        <div class="why-choose-one__icon">

                            <i class="ri-map-pin-5-line" style="font-size: 32px; color: black;"></i>
                        </div>
                        <div class="why-choose-one__single-inner">
                            <h3 class="why-choose-one__title">Many Pickup Location</h3>
                            <p class="why-choose-one__text">We offer multiple pickup and delivery locations across Bali,
                                giving you flexibility and convenience wherever you stay.
                            </p>
                        </div>
                        <div class="why-choose-one__btn-box">
                            <a href="{{ route('motorcycles.index') }}" class="thm-btn">Rent Now<span
                                    class="fas fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <!-- Why Choose One Single End -->
                <!-- Why Choose One Single Start -->
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms" data-wow-duration="1500ms">
                    <div class="why-choose-one__single" style="height: 100%;">
                        <div class="why-choose-one__icon">
                            <span class="icon-rating"></span>
                        </div>
                        <div class="why-choose-one__single-inner">
                            <h3 class="why-choose-one__title">Customer Satisfaction</h3>
                            <p class="why-choose-one__text">Your satisfaction is our priority. We provide well-maintained
                                motorcycles, responsive support, and reliable service to ensure a comfortable and worry-free
                                ride.
                            </p>
                        </div>
                        <div class="why-choose-one__btn-box">
                            <a href="{{ route('motorcycles.index') }}" class="thm-btn">Rent Now<span
                                    class="fas fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <!-- Why Choose One Single End -->
            </div>
        </div>
    </section>
    <!-- Why Choose One End -->

    <!-- Counter One Start -->
    <section class="counter-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="counter-one__left">
                        <div class="section-title text-left sec-title-animation animation-style1">
                            <div class="section-title__tagline-box">
                                <div class="section-title__tagline-shape">
                                    <img src="/assets/images/shapes/logo_BGT.png" alt="">
                                </div>
                                <span class="section-title__tagline">fun facts</span>
                            </div>
                            <h2 class="section-title__title title-animation">experience freedom on
                                our Motorcycle booking service</h2>
                        </div>
                        <p class="counter-one__text">Enjoy the convenience of exploring every corner of the city with our top-tier motorcycle fleet. With a fast booking process, simple requirements, and friendly service, we are ready to accompany your journey in Bali.</p>
                        <div class="counter-one__main-content">
                            <ul class="list-unstyled counter-one__list">
                                <li class="wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="counter-one__single">
                                        <div class="counter-one__shape-1"></div>
                                        <div class="counter-one__shape-2"></div>
                                        <div class="counter-one__single-inner">
                                            <div class="counter-one__icon">
                                                <i class="ri-motorbike-fill" style="font-size: 32px; color: black;"></i>
                                            </div>
                                            <div class="counter-one__count-box">
                                                <h3 class="odometer" data-count="1000">00</h3>
                                                <span>+</span>
                                            </div>
                                            <p class="counter-one__count-text">Vehicle fleet</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="counter-one__single">
                                        <div class="counter-one__shape-1"></div>
                                        <div class="counter-one__shape-2"></div>
                                        <div class="counter-one__single-inner">
                                            <div class="counter-one__icon">
                                                <span class="icon-mileage"></span>
                                            </div>
                                            <div class="counter-one__count-box">
                                                <h3 class="odometer" data-count="10">00</h3>
                                                <span>M+</span>
                                            </div>
                                            <p class="counter-one__count-text">Miles of drive</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                                    <div class="counter-one__single">
                                        <div class="counter-one__shape-1"></div>
                                        <div class="counter-one__shape-2"></div>
                                        <div class="counter-one__single-inner">
                                            <div class="counter-one__icon">
                                                <span class="icon-range"></span>
                                            </div>
                                            <div class="counter-one__count-box">
                                                <h3 class="odometer" data-count="15">00</h3>
                                                <span>K+</span>
                                            </div>
                                            <p class="counter-one__count-text">Booking reserved</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="wow fadeInRight" data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <div class="counter-one__single">
                                        <div class="counter-one__shape-1"></div>
                                        <div class="counter-one__shape-2"></div>
                                        <div class="counter-one__single-inner">
                                            <div class="counter-one__icon">
                                                <span class="icon-pin-2"></span>
                                            </div>
                                            <div class="counter-one__count-box">
                                                <h3 class="odometer" data-count="50">00</h3>
                                                <span>K+</span>
                                            </div>
                                            <p class="counter-one__count-text">Pickup & drop</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="counter-one__right">
                        <div class="counter-one__img-box">
                            <div class="counter-one__img reveal">
                                <img src="{{ asset('assets/images/gallery/forza.jpg') }}" alt="">
                            </div>
                            <div class="counter-one__img-two reveal">
                                <img src="{{ asset('/assets/images/gallery/Tmax.jpg') }}" alt=""
                                    style="width: 600px; height: auto;">
                            </div>

                            <div class="counter-one__dot-1">
                                <img src="/assets/images/shapes/counter-one-dot-1.png" alt="">
                            </div>
                            <div class="counter-one__dot-2 float-bob-y">
                                <img src="/assets/images/shapes/counter-one-dot-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter One End -->
    <!-- Listing One Start -->
    <section class="listing-one">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape">
                        <img src="/assets/images/shapes/logo_BGT.png" alt="">
                    </div>
                    <span class="section-title__tagline">Checkout our new Motorcycle</span>
                </div>
                <h2 class="section-title__title title-animation">Explore Most Popular Motorcycle</h2>
            </div>
            <div class="listing-one__inner">
                <div class="listing-one__carousel owl-carousel owl-theme">
                    @forelse($motorcycles as $m)
                        <div class="item">
                            <div class="listing-one__single">
                                <div class="listing-one__img">
                                    @if ($m->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($m->image_path))
                                        {{-- Jika file benar-benar ada di storage/app/public --}}
                                        <img src="{{ asset('storage/' . $m->image_path) }}" alt="{{ $m->category }}">
                                    @else
                                        {{-- Placeholder jika gambar tidak ada --}}
                                        <img src="{{ asset('assets/images/resources/RIDEnotrasparan.png') }}"
                                            alt="No Image">
                                    @endif

                                    <div class="listing-one__brand-name">
                                        <p>{{ strtoupper($m->brand) }}</p>
                                    </div>
                                </div>

                                <div class="listing-one__content">

                                    <h3 class="listing-one__title">
                                        <a
                                            href="{{ route('motorcycles.show', ['id' => $m->id, 'slug' => \Illuminate\Support\Str::slug($m->brand . '-' . $m->type)]) }}">{{ $m->category }}</a>
                                    </h3>

                                    <div class="listing-one__meta-box-info">
                                        <ul class="list-unstyled listing-one__meta">
                                            {{-- Baris 1: Transmisi & Bahan Bakar --}}
                                            <li>
                                                <div class="icon"><span class="icon-manual"></span></div>
                                                <div class="text">
                                                    <p>{{ ucfirst($m->transmission) }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><span class="icon-fuel-type"></span></div>
                                                <div class="text">
                                                    <p>{{ $m->fuel_configuration }}</p>
                                                </div>
                                            </li>

                                            {{-- Baris 2: KM & CC --}}
                                            <li>
                                                <div class="icon"><span class="icon-mileage"></span></div>
                                                <div class="text">
                                                    <p>{{ $m->lastService->kilometer ?? 0 }} KM</p>
                                                </div>
                                            </li>
                                            {{-- <li>
                                                <div class="icon"><span class="icon-speedometer"></span></div>
                                                <div class="text">
                                                    <p>{{ $m->cc }} CC</p>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>

                                    <div class="listing-one__car-rent-box">
                                        <p class="listing-one__car-rent">Price
                                            {{-- number_format: Desimal=0, PemisahDesimal=',', PemisahRibuan='.' --}}
                                            <span>Rp {{ number_format($m->price, 0, ',', '.') }}</span>
                                        </p>
                                    </div>

                                    <div class="listing-one__btn-box">
                                        {{-- Perbaikan variabel: dari $mo ke $m --}}
                                        <a href="{{ route('motorcycles.show', ['id' => $m->id, 'slug' => \Illuminate\Support\Str::slug($m->brand . '-' . $m->type)]) }}"
                                            class="thm-btn">
                                            Details Now <span class="fas fa-arrow-right"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="item">
                            <p class="text-center">No motorcycles available at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- Listing One End -->


    <!--Call One Start -->
    <section class="call-one">
        <div class="container">
            <div class="call-one__inner wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="call-one__inner-content">
                    <div class="call-one__bg"
                        style="background-image: url('{{ asset('/assets/images/backgrounds/bg-01.jpg') }}');">
                    </div>
                    <div class="call-one__left">
                        <p class="call-one__sub-title">Available 24/7</p>
                        <h4 class="call-one__title">Call Any Time For Booking</h4>
                    </div>
                    <div class="call-one__details">
                        <div class="call-one__icon">
                            <span class="icon-call-2"></span>
                        </div>
                        <div class="call-one__content">
                            <p>Call Emergency</p>
                            <h4><a href="tel:+9288006780">+92 ( 8800 ) - 6780</a></h4>
                        </div>
                    </div>
                    <div class="call-one__btn-box">
                        <a href="{{ route('motorcycles.index') }}" class="thm-btn">Rent Now<span
                                class="fas fa-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Call One End -->



    <!--Faq One Start -->
    <section class="faq-one">
        <div class="faq-one__shape-1"></div>
        <div class="faq-one__shape-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5">
                    <div class="faq-one__left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <div class="section-title__tagline-shape">
                                    <img src="{{ asset('/assets/images/shapes/logo_BGT.png') }}" alt="">
                                </div>
                                <span class="section-title__tagline">Our Faqs</span>
                            </div>
                            <h2 class="section-title__title title-animation">Frequently Asking Any Question</h2>
                        </div>
                        <div class="faq-one__img-box">
                            <div class="faq-one__img reveal">
                               <img src="{{ asset('/assets/images/gallery/vespa.jpg') }}" 
     alt=""
     style="width: 300px; height: 200px;">

                            </div>
                            <div class="faq-one__experience-box">
                                <div class="faq-one__experience-year">
                                    <h2 class="odometer" data-count="55">00</h2>
                                </div>
                                <p class="faq-one__experience-text">Year of <br> experience</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="faq-one__right">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            <div class="accrodion wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="accrodion-title">
                                    <h4>How old do I need to be to rent a motorbike?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>You must be at least 18 years old to rent a motorbike. Some premium or
                                            high-capacity models may require a higher minimum age and riding experience.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion active wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                                <div class="accrodion-title">
                                    <h4>What documents do I need to rent a motorbike?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>You will need:</p>
                                        <ul style="list-style-type: disc; margin-left: 20px; color: var(--thm-gray);">
                                            <li>Valid Passport</li>
                                            <li>Valid Driving License</li>
                                            <li>ID for Verification</li>
                                        </ul>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="accrodion-title">
                                    <h4>What types of motorbikes are available for rent?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>We offer a variety of motorbikes to suit different riding need:</p>
                                        <ul style="list-style-type: disc; margin-left: 20px; color: var(--thm-gray);">
                                            <li>Small Automatic Scooters – ideal for city rides and beginners</li>
                                            <li>Large Automatic Scooters – comfortable and powerful for longer trips</li>
                                            <li>Sport Motorbikes – designed for experienced riders seeking performance and
                                                style</li>
                                        </ul>
                                    </div><!-- /.inner
                                        </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion wow fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="accrodion-title">
                                    <h4>Can I rent a motorbike without a license?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>For safety and legal reasons, a valid driving license is required. However, we
                                            also offer riding classes for beginners who want to improve their riding skills.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                                <div class="accrodion-title">
                                    <h4>What is your fuel policy?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>Motorbikes are delivered with a certain fuel level and should be returned at the
                                            same fuel level. Fuel costs during the rental period are the renter’s
                                            responsibility.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Faq One End -->

    <!--Lets Talk Start -->
    <section class="lets-talk">
        <div class="lets-talk__bg"
            style="background-image: url('{{ asset('/assets/images/backgrounds/1680x550_booking-one-bg.jpg') }}');"></div>
        <div class="container">
            <div class="lets-talk__inner">
                <div class="lets-talk__title">
                    <p>Rent Your Motorcycle</p>
                    <h2>Interested in Renting?</h2>
                </div>

            </div>
        </div>
    </section>
    <!--Lets Talk End -->

    

    </div><!-- /.page-wrapper -->
@endsection