@extends('user.layouts.app')
@section('content')
    <!--Page Header Start -->
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/cobacoba1.jpeg') }});">
        </div>
        <div class="page-header__shape-1"
            style="background-image: url({{ asset('assets/images/shapes/lambang_motor_gerak.png') }});"></div>
        <div class="container">
            <div class="page-header__inner">
                <h3>About Us</h3>
                <div class="thm-breadcrumb__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span class="icon-arrow-left"></span></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End -->

    <!-- About One Start -->
    <section class="about-one about-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-one__img-box">
                            <div class="about-one__img">
                                <img src="{{ asset('assets/images/resources/about-one-img-1.jpg') }}" alt="">
                            </div>
                            <div class="about-one__shape-2 float-bob-y">
                                <img src="{{ asset('assets/images/shapes/about-one-shape-2.png') }}" alt="">
                            </div>
                            <div class="about-one__shape-1">
                                <img src="{{ asset('assets/images/shapes/about-one-shape-1.png') }}" alt="">
                            </div>
                            <div class="about-one__shape-4 float-bob-x">
                                <img src="{{ asset('assets/images/shapes/about-one-shape-4.jpg') }}" alt="">
                            </div>
                            <div class="about-one__shape-3 float-bob-x">
                                <img src="{{ asset('assets/images/shapes/about-one-shape-3.png') }}" alt="">
                            </div>
                            <div class="about-one__img-2">
                                <img src="{{ asset('assets/images/resources/about-one-img-2.png') }}" alt="">
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
                                    <img src="{{ asset('assets/images/shapes/logo_BGT.png') }}" alt="">
                                </div>
                                <span class="section-title__tagline">About Ride Nusa</span>
                            </div>
                            <h2 class="section-title__title title-animation">Welcome to Ride Nusa
                                Motorcycle booking company</h2>
                        </div>
                        <p class="about-one__text-1">Committed to providing our customers with<br> ultimate service.
                        </p>
                        <p class="about-one__text-2">Lorem ipsum is simply ipun txns mane so dummy text of free
                            available in market the printing and typesetting industry has been the industry's
                            standard dummy text ever.</p>
                        <ul class="about-one__progress-box list-unstyled">
                            <li>
                                <div class="about-one__progress">
                                    <h4 class="about-one__progress-title">Time Awareness</h4>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="90%">
                                            <div class="count-text">90%</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="about-one__progress">
                                    <h4 class="about-one__progress-title">Driver Experience</h4>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="70%">
                                            <div class="count-text">70%</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="about-one__btn-box-and-call-box">
                            <div class="about-one__btn-box">
                                <a href="about.html" class="about-one__btn thm-btn">Read More<span
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

    <!-- Services One Start -->
    <section class="services-one">
        <div class="services-one__shape-1"></div>
        <div class="services-one__shape-2"></div>
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape">
                        <img src="{{ asset('assets/images/shapes/logo_BGT.png') }}" alt="">
                    </div>
                    <span class="section-title__tagline">What We’re Offering</span>
                </div>
                <h2 class="section-title__title title-animation">Services We’re Provding <br> to Customers</h2>
            </div>
            <div class="row">
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                    <div class="services-one__single">
                        <div class="services-one__single-shape-1"></div>
                        <div class="services-one__single-shape-2"></div>
                        <div class="services-one__single-shape-3"></div>
                        <div class="services-one__count"></div>
                        <div class="services-one__icon">
                            <!-- <span class="icon-car"></span> -->
                        </div>
                        <h3 class="services-one__title"><a href="services.html">motor termewah Ride Nusa</a>
                        </h3>
                        <p class="services-one__text">kita memiliki motor yang exclusive yang bisa anda sewa selama anda
                            liburan atau tinggal di bali</p>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="services-one__single">
                        <div class="services-one__single-shape-1"></div>
                        <div class="services-one__single-shape-2"></div>
                        <div class="services-one__single-shape-3"></div>
                        <div class="services-one__count"></div>
                        <div class="services-one__icon">
                            <!-- <span class="icon-taxi"></span> -->
                        </div>
                        <h3 class="services-one__title"><a href="services.html">Antar unit ke tempat penyewa</a>
                        </h3>
                        <p class="services-one__text">kita dengan gratis meghantarkan unit ke pengunna atau penyewa</p>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms"
                    data-wow-duration="1500ms">
                    <div class="services-one__single">
                        <div class="services-one__single-shape-1"></div>
                        <div class="services-one__single-shape-2"></div>
                        <div class="services-one__single-shape-3"></div>
                        <div class="services-one__count"></div>
                        <div class="services-one__icon">
                            <!-- <span class="icon-sport-car-1"></span> -->
                        </div>
                        <h3 class="services-one__title"><a href="services.html">Riding Class</a></h3>
                        <p class="services-one__text">kita memberikan kelas untuk wisatawan yang belum lihay menggunakan
                            motor</p>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="700ms"
                    data-wow-duration="1500ms">
                    <div class="services-one__single">
                        <div class="services-one__single-shape-1"></div>
                        <div class="services-one__single-shape-2"></div>
                        <div class="services-one__single-shape-3"></div>
                        <div class="services-one__count"></div>
                        <div class="services-one__icon">
                            <!-- <span class="icon-car-insurance"></span> -->
                        </div>
                        <h3 class="services-one__title"><a href="services.html">Aksesoris Tambahan</a></h3>
                        <p class="services-one__text">kita menyediakan aksesoris tambahan untuk kelengkapan berkendara si
                            pengguna</p>
                    </div>
                </div>
                <!--Services One Single End-->
            </div>
        </div>
    </section>
    <!-- Services One End -->



    <!-- Listing One Start -->
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
                            <div class="listing-one__carousel owl-carousel owl-theme">
                                @forelse($motorcycles as $m)
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                @php $path = 'storage/motorcycles/' . $m->image_path; @endphp
                                                @if ($m->image_path && file_exists(public_path($path)))
                                                    <img src="{{ asset($path) }}" alt="{{ $m->category }}">
                                                @else
                                                    <img src="{{ asset('assets/images/resources/RIDEnotrasparan.png') }}"
                                                        alt="No Image">
                                                @endif
                                                <div class="listing-one__brand-name">
                                                    <p>{{ strtoupper($m->brand) }}</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a
                                                        href="{{ route('motorcycles.show', ['id' => $m->id, 'slug' => \Illuminate\Support\Str::slug($m->brand . '-' . $m->type)]) }}">{{ $m->category }}</a>
                                                </h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta ">
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
                                                        <li>
                                                            <div class="icon"><span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>{{ str_replace('_', '', ucfirst($m->type)) }}</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><span class="icon-mileage"></span></div>
                                                            <div class="text">
                                                                <p>{{ $m->cc }} CC</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>{{ $m->lastService->kilometer ?? 0 }} KM
                                                                </p>
                                                            </div>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From <span>Rp
                                                            {{ number_format($m->price ?? 0, 0, ',', '.') }}/</span> Day
                                                    </p>
                                                </div>
                                                <div class="listing-one__btn-box"><a
                                                        href="{{ route('motorcycles.show', ['id' => $m->id, 'slug' => \Illuminate\Support\Str::slug($m->brand . '-' . $m->type)]) }}"
                                                        class="thm-btn">Details Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center">No motorcycles available.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    @foreach ($motorcycles->pluck('brand')->unique() as $brand)
                        <div class="p-tab" id="{{ Str::slug($brand) }}">
                            <div class="listing-one__inner">
                                <div class="listing-one__carousel owl-carousel owl-theme">
                                    @foreach ($motorcycles->where('brand', $brand) as $m)
                                        <div class="item">
                                            <div class="listing-one__single">
                                                <div class="listing-one__img">
                                                    @php $path = 'storage/motorcycles/' . $m->image_path; @endphp
                                                    @if ($m->image_path && file_exists(public_path($path)))
                                                        <img src="{{ asset($path) }}" alt="{{ $m->category }}">
                                                    @else
                                                        <img src="{{ asset('assets/images/resources/RIDEnotrasparan.png') }}"
                                                            alt="No Image">
                                                    @endif
                                                    <div class="listing-one__brand-name">
                                                        <p>{{ strtoupper($m->brand) }}</p>
                                                    </div>
                                                </div>
                                                <div class="listing-one__content">
                                                    <h3 class="listing-one__title"><a
                                                            href="{{ route('motorcycles.show', ['id' => $m->id, 'slug' => \Illuminate\Support\Str::slug($m->brand . '-' . $m->type)]) }}">{{ $m->category }}</a>
                                                    </h3>
                                                    <div class="listing-one__meta-box-info menu">
                                                        <ul class="list-unstyled listing-one__meta ">
                                                            <li>
                                                                <div class="icon"><span class="icon-manual"></span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>{{ ucfirst($m->transmission) }}</p>
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
                                                                <div class="icon"><span class="icon-test-drive"></span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>{{ str_replace('_', '', ucfirst($m->type)) }}</p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="icon"><span class="icon-mileage"></span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>{{ $m->cc }} CC</p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="icon"><span class="icon-mileage"></span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>{{ $m->lastService->kilometer ?? 0 }} KM
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="listing-one__car-rent-box">
                                                        <p class="listing-one__car-rent">Starting From <span>Rp
                                                                {{ number_format($m->price ?? 0, 0, ',', '.') }}/</span>
                                                            Day</p>
                                                    </div>
                                                    <div class="listing-one__btn-box"><a
                                                            href="{{ route('motorcycles.show', ['id' => $m->id, 'slug' => \Illuminate\Support\Str::slug($m->brand . '-' . $m->type)]) }}"
                                                            class="thm-btn">Details Now</a></div>
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
    <!-- Listing One End -->


    </div>
    </div>
    </section>
    <!-- Team Three End -->

    <!-- Testimonial Two Start -->
    <section class="testimonial-two">
        <div class="testimonial-two__shape-1 float-bob-y">
            <img src="assets/images/shapes/testimonial-two-shape-1.png" alt="">
        </div>
        <div class="testimonial-two__shape-2 float-bob-x">
            <img src="assets/images/shapes/testimonial-two-shape-2.png" alt="">
        </div>
        <div class="container">
            <div class="section-title text-left sec-title-animation animation-style2">
                <div class="section-title__tagline-box">
                    <div class="section-title__tagline-shape">
                        <img src="assets/images/shapes/logo_BGT.png" alt="">
                    </div>
                    <span class="section-title__tagline">Testimonials</span>
                </div>
                <h2 class="section-title__title title-animation">What Peoples Say <br>
                    about Ride Nusa</h2>
            </div>
            <div class="testimonial-two__carousel owl-carousel owl-theme">
                <!-- Testimonial Two Single Start -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__quote">
                            <span class="icon-quote"></span>
                        </div>
                        <div class="testimonial-two__img">
                            <img src="assets/images/testimonial/testimonial-2-1.jpg" alt="">
                        </div>
                        <p class="testimonial-two__text">A logistic service provider company plays a
                            pivotal role in the global
                            supply chain A logistic service provider companyA logistic service
                            provider company plays a pivotal role.</p>
                        <div class="testimonial-two__client-info">
                            <div class="testimonial-two__client-content">
                                <h4 class="testimonial-two__client-name"><a href="testimonials.html">Alisa Fox</a>
                                </h4>
                                <p class="testimonial-two__client-sub-title">Auto Dealer</p>
                            </div>
                            <div class="testimonial-two__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial Two Single End -->
                <!-- Testimonial Two Single Start -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__quote">
                            <span class="icon-quote"></span>
                        </div>
                        <div class="testimonial-two__img">
                            <img src="assets/images/testimonial/testimonial-2-2.jpg" alt="">
                        </div>
                        <p class="testimonial-two__text">A logistic service provider company plays a
                            pivotal role in the global
                            supply chain A logistic service provider companyA logistic service
                            provider company plays a pivotal role.</p>
                        <div class="testimonial-two__client-info">
                            <div class="testimonial-two__client-content">
                                <h4 class="testimonial-two__client-name"><a href="testimonials.html">Creas
                                        Jordan</a></h4>
                                <p class="testimonial-two__client-sub-title">Customer</p>
                            </div>
                            <div class="testimonial-two__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial Two Single End -->
                <!-- Testimonial Two Single Start -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__quote">
                            <span class="icon-quote"></span>
                        </div>
                        <div class="testimonial-two__img">
                            <img src="assets/images/testimonial/testimonial-2-3.jpg" alt="">
                        </div>
                        <p class="testimonial-two__text">A logistic service provider company plays a
                            pivotal role in the global
                            supply chain A logistic service provider companyA logistic service
                            provider company plays a pivotal role.</p>
                        <div class="testimonial-two__client-info">
                            <div class="testimonial-two__client-content">
                                <h4 class="testimonial-two__client-name"><a href="testimonials.html">Ass Lee</a>
                                </h4>
                                <p class="testimonial-two__client-sub-title">Senior Consultant</p>
                            </div>
                            <div class="testimonial-two__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial Two Single End -->
                <!-- Testimonial Two Single Start -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__quote">
                            <span class="icon-quote"></span>
                        </div>
                        <div class="testimonial-two__img">
                            <img src="assets/images/testimonial/testimonial-2-4.jpg" alt="">
                        </div>
                        <p class="testimonial-two__text">A logistic service provider company plays a
                            pivotal role in the global
                            supply chain A logistic service provider companyA logistic service
                            provider company plays a pivotal role.</p>
                        <div class="testimonial-two__client-info">
                            <div class="testimonial-two__client-content">
                                <h4 class="testimonial-two__client-name"><a href="testimonials.html">Creas
                                        Wokes</a></h4>
                                <p class="testimonial-two__client-sub-title">Managing Director</p>
                            </div>
                            <div class="testimonial-two__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial Two Single End -->
                <!-- Testimonial Two Single Start -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__quote">
                            <span class="icon-quote"></span>
                        </div>
                        <div class="testimonial-two__img">
                            <img src="assets/images/testimonial/testimonial-2-5.jpg" alt="">
                        </div>
                        <p class="testimonial-two__text">A logistic service provider company plays a
                            pivotal role in the global
                            supply chain A logistic service provider companyA logistic service
                            provider company plays a pivotal role.</p>
                        <div class="testimonial-two__client-info">
                            <div class="testimonial-two__client-content">
                                <h4 class="testimonial-two__client-name"><a href="testimonials.html">Alex
                                        Jordan</a></h4>
                                <p class="testimonial-two__client-sub-title">Customer</p>
                            </div>
                            <div class="testimonial-two__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial Two Single End -->
                <!-- Testimonial Two Single Start -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__quote">
                            <span class="icon-quote"></span>
                        </div>
                        <div class="testimonial-two__img">
                            <img src="assets/images/testimonial/testimonial-2-6.jpg" alt="">
                        </div>
                        <p class="testimonial-two__text">A logistic service provider company plays a
                            pivotal role in the global
                            supply chain A logistic service provider companyA logistic service
                            provider company plays a pivotal role.</p>
                        <div class="testimonial-two__client-info">
                            <div class="testimonial-two__client-content">
                                <h4 class="testimonial-two__client-name"><a href="testimonials.html">Janaton
                                        Trot</a></h4>
                                <p class="testimonial-two__client-sub-title">Auto Dealer</p>
                            </div>
                            <div class="testimonial-two__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial Two Single End -->
            </div>
        </div>
    </section>
    <!-- Testimonial Two End -->

    <!--Lets Talk Start -->
    <section class="lets-talk">
        <div class="lets-talk__bg"
            style="background-image: url('{{ asset('assets/images/backgrounds/bg-02.jpg') }}');"></div>
        <div class="container">
            <div class="lets-talk__inner">
                <div class="lets-talk__title">
                    <p>Rent Your Motorcycle</p>
                    <h2>Interested in Renting?</h2>
                </div>
                <div class="lets-talk__btn-boxes">
                    <div class="lets-talk__btn-1">
                        <a href="contact.html" class="thm-btn">Contact Us<span class="fas fa-arrow-right"></span></a>
                    </div>
                    <div class="lets-talk__btn-2">
                        <a href="car-list-v-1.html" class="thm-btn">Rent Now<span class="fas fa-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Lets Talk End -->

    <!--Gallery One Start -->
    <section class="gallery-one">
        <div class="gallery-one__carousel owl-theme owl-carousel">
            <!--Gallery One Single Start-->
            <div class="item">
                <div class="gallery-one__single">
                    <div class="gallery-one__img">
                        <img src="assets/images/gallery/gallery-1-1.jpg" alt="">
                        <a href="cars.html"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>
            <!--Gallery One Single End-->
            <!--Gallery One Single Start-->
            <div class="item">
                <div class="gallery-one__single">
                    <div class="gallery-one__img">
                        <img src="assets/images/gallery/gallery-1-2.jpg" alt="">
                        <a href="cars.html"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>
            <!--Gallery One Single End-->
            <!--Gallery One Single Start-->
            <div class="item">
                <div class="gallery-one__single">
                    <div class="gallery-one__img">
                        <img src="assets/images/gallery/gallery-1-3.jpg" alt="">
                        <a href="cart.html"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>
            <!--Gallery One Single End-->
            <!--Gallery One Single Start-->
            <div class="item">
                <div class="gallery-one__single">
                    <div class="gallery-one__img">
                        <img src="assets/images/gallery/gallery-1-4.jpg" alt="">
                        <a href="cart.html"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>
            <!--Gallery One Single End-->
            <!--Gallery One Single Start-->
            <div class="item">
                <div class="gallery-one__single">
                    <div class="gallery-one__img">
                        <img src="assets/images/gallery/gallery-1-5.jpg" alt="">
                        <a href="cart.html"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>
            <!--Gallery One Single End-->
            <!--Gallery One Single Start-->
            <div class="item">
                <div class="gallery-one__single">
                    <div class="gallery-one__img">
                        <img src="assets/images/gallery/gallery-1-6.jpg" alt="">
                        <a href="cart.html"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>
            <!--Gallery One Single End-->
        </div>
    </section>
    <!--Gallery One End -->





    </div><!-- /.page-wrapper -->
@endsection
