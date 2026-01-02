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
                        <li><a href="{{ route('welcome') }}">Home</a></li>
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
                        <p class="about-one__text-2">Ride Nusa is your trusted partner for motorcycle rentals in Bali. We focus on quality service, well-maintained vehicles, and customer satisfaction to ensure every journey is smooth, safe, and memorable. Whether you are traveling or exploring the island, Ride Nusa is ready to serve you.</p>
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
                        <p class="services-one__text">We offer exclusive motorcycles that you can rent during your holiday or stay in Bali.</p>
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
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms"
                    data-wow-duration="1500ms">
                    <div class="services-one__single" style="height: 100%;">
                        <div class="services-one__single-shape-1"></div>
                        <div class="services-one__single-shape-2"></div>
                        <div class="services-one__single-shape-3"></div>
                        <div class="services-one__count"></div>
                        <div class="services-one__icon">
                            <!-- <span class="icon-sport-car-1"></span> -->
                        </div>
                        <h3 class="services-one__title"><a href="{{ route('services') }}">Riding Class</a></h3>
                        <p class="services-one__text">We offer riding classes for travelers who are not yet 
                            confident or experienced in riding motorcycles.</p>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="700ms"
                    data-wow-duration="1500ms">
                    <div class="services-one__single"style="height: 100%;">
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
                                                @if ($m->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($m->image_path))
                                                    {{-- Jika file benar-benar ada di storage/app/public --}}
                                                    <img src="{{ asset('storage/' . $m->image_path) }}"
                                                        alt="{{ $m->category }}">
                                                @else
                                                    {{-- Jika database kosong ATAU file fisik tidak ditemukan --}}
                                                    <img src="{{ asset('assets/images/resources/RIDEnotrasparan.png') }}"
                                                        alt="No Image Available">
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
                                                    @if ($m->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($m->image_path))
                                                        {{-- Jika file benar-benar ada di storage/app/public --}}
                                                        <img src="{{ asset('storage/' . $m->image_path) }}"
                                                            alt="{{ $m->category }}">
                                                    @else
                                                        {{-- Jika database kosong ATAU file fisik tidak ditemukan --}}
                                                        <img src="{{ asset('assets/images/resources/RIDEnotrasparan.png') }}"
                                                            alt="No Image Available">
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


    <!--Lets Talk Start -->
    <section class="lets-talk">
        <div class="lets-talk__bg" style="background-image: url('{{ asset('assets/images/backgrounds/bg-02.jpg') }}');">
        </div>
        <div class="container">
            <div class="lets-talk__inner">
                <div class="lets-talk__title">
                    <p>Rent Your Motorcycle</p>
                    <h2>Interested in Renting?</h2>
                </div>
                <div class="lets-talk__btn-boxes">
                    <div class="lets-talk__btn-1">
                        <a href="{{ route('contact') }}" class="thm-btn">Contact Us<span class="fas fa-arrow-right"></span></a>
                    </div>
                    <div class="lets-talk__btn-2">
                        <a href="{{ route('motorcycles.index') }}" class="thm-btn">Rent Now<span class="fas fa-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Lets Talk End -->






    </div><!-- /.page-wrapper -->
@endsection
