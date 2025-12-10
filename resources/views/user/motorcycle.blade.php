
        <!--Page Header Start -->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg);">
            </div>
            <div class="page-header__shape-1"
                style="background-image: url(assets/images/shapes/page-header-shape-1.png);"></div>
            <div class="container">
                <div class="page-header__inner">
                    <h3>Cars</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>Cars</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Cars Page Start -->
        <section class="cars-page">
            <div class="container">
                <div class="row">
                    <!-- Services One Start -->
                    <section class="services-one">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title text-center">
                                        <p class="section-title__tagline">MotorList</p>
                                        <h2 class="section-title__title">Kendaraan</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @forelse($motorcycles as $motor)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="services-one__single">
                                            <div class="services-one__img">
                                                <img src="{{ asset($motor->image ?? 'assets/images/resources/default-bike.jpg') }}" alt="{{ $motor->name }}">
                                            </div>
                                            <div class="services-one__content">
                                                <h3 class="services-one__title">{{ $motor->name }}</h3>
                                                <p class="services-one__text">{{ Str::limit($motor->description ?? '-', 100) }}</p>
                                                <p class="services-one__text"><strong>Harga:</strong> Rp {{ number_format($motor->price_per_day ?? 0, 0, ',', '.') }} / hari</p>
                                                <a href="{{ url('motor/' . ($motor->id ?? $motor->id_motor ?? '')) }}" class="thm-btn services-one__btn">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-5">
                                        <p>Tidak ada motor tersedia saat ini. Silakan cek kembali nanti.</p>
                                    </div>
                                @endforelse
                            </div>

                            @if(method_exists($motorcycles, 'links'))
                                <div class="row mt-4">
                                    <div class="col-12 d-flex justify-content-center">
                                        {{ $motorcycles->links() }}
                                    </div>
                                </div>
                            @endif

                        </div>
                    </section>
                                            </div>
                                            <div class="text">
                                                <p>Basic</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-avatar"></span>
                                            </div>
                                            <div class="text">
                                                <p>Age 25</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-in-person"></span>
                                            </div>
                                            <div class="text">
                                                <p>5 Persons</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-one__car-rent-box">
                                    <p class="listing-one__car-rent">Starting From
                                        <span>$100/</span> Day</p>
                                </div>
                                <div class="listing-one__btn-box">
                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                            class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing One Single End -->
                    <!-- Listing One Single Start -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="listing-one__single">
                            <div class="listing-one__img">
                                <img src="assets/images/listing/listing-1-2.jpg" alt="">
                                <div class="listing-one__brand-name">
                                    <p>Kia Soul</p>
                                </div>
                            </div>
                            <div class="listing-one__content">
                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                        2025</a></h3>
                                <div class="listing-one__meta-box-info">
                                    <ul class="list-unstyled listing-one__meta">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-manual"></span>
                                            </div>
                                            <div class="text">
                                                <p>Manual</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-mileage"></span>
                                            </div>
                                            <div class="text">
                                                <p>25 KM</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-fuel-type"></span>
                                            </div>
                                            <div class="text">
                                                <p>Diesel</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-test-drive"></span>
                                            </div>
                                            <div class="text">
                                                <p>Basic</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-avatar"></span>
                                            </div>
                                            <div class="text">
                                                <p>Age 25</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-in-person"></span>
                                            </div>
                                            <div class="text">
                                                <p>5 Persons</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-one__car-rent-box">
                                    <p class="listing-one__car-rent">Starting From
                                        <span>$100/</span> Day</p>
                                </div>
                                <div class="listing-one__btn-box">
                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                            class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing One Single End -->
                    <!-- Listing One Single Start -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="listing-one__single">
                            <div class="listing-one__img">
                                <img src="assets/images/listing/listing-1-3.jpg" alt="">
                                <div class="listing-one__brand-name">
                                    <p>Audi</p>
                                </div>
                            </div>
                            <div class="listing-one__content">
                                <h3 class="listing-one__title"><a href="listing-single.html">Audi A3
                                        2025 New</a></h3>
                                <div class="listing-one__meta-box-info">
                                    <ul class="list-unstyled listing-one__meta">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-manual"></span>
                                            </div>
                                            <div class="text">
                                                <p>Manual</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-mileage"></span>
                                            </div>
                                            <div class="text">
                                                <p>25 KM</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-fuel-type"></span>
                                            </div>
                                            <div class="text">
                                                <p>Diesel</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-test-drive"></span>
                                            </div>
                                            <div class="text">
                                                <p>Basic</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-avatar"></span>
                                            </div>
                                            <div class="text">
                                                <p>Age 25</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-in-person"></span>
                                            </div>
                                            <div class="text">
                                                <p>5 Persons</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-one__car-rent-box">
                                    <p class="listing-one__car-rent">Starting From
                                        <span>$100/</span> Day</p>
                                </div>
                                <div class="listing-one__btn-box">
                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                            class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing One Single End -->
                    <!-- Listing One Single Start -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="listing-one__single">
                            <div class="listing-one__img">
                                <img src="assets/images/listing/listing-1-4.jpg" alt="">
                                <div class="listing-one__brand-name">
                                    <p>Audi</p>
                                </div>
                            </div>
                            <div class="listing-one__content">
                                <h3 class="listing-one__title"><a href="listing-single.html">Ferrari
                                        458 MM Speciale</a></h3>
                                <div class="listing-one__meta-box-info">
                                    <ul class="list-unstyled listing-one__meta">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-manual"></span>
                                            </div>
                                            <div class="text">
                                                <p>Manual</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-mileage"></span>
                                            </div>
                                            <div class="text">
                                                <p>25 KM</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-fuel-type"></span>
                                            </div>
                                            <div class="text">
                                                <p>Diesel</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-test-drive"></span>
                                            </div>
                                            <div class="text">
                                                <p>Basic</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-avatar"></span>
                                            </div>
                                            <div class="text">
                                                <p>Age 25</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-in-person"></span>
                                            </div>
                                            <div class="text">
                                                <p>5 Persons</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-one__car-rent-box">
                                    <p class="listing-one__car-rent">Starting From
                                        <span>$100/</span> Day</p>
                                </div>
                                <div class="listing-one__btn-box">
                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                            class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing One Single End -->
                    <!-- Listing One Single Start -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="listing-one__single">
                            <div class="listing-one__img">
                                <img src="assets/images/listing/listing-1-5.jpg" alt="">
                                <div class="listing-one__brand-name">
                                    <p>Acura</p>
                                </div>
                            </div>
                            <div class="listing-one__content">
                                <h3 class="listing-one__title"><a href="listing-single.html">Audi Sport
                                        Version</a></h3>
                                <div class="listing-one__meta-box-info">
                                    <ul class="list-unstyled listing-one__meta">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-manual"></span>
                                            </div>
                                            <div class="text">
                                                <p>Manual</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-mileage"></span>
                                            </div>
                                            <div class="text">
                                                <p>25 KM</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-fuel-type"></span>
                                            </div>
                                            <div class="text">
                                                <p>Diesel</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-test-drive"></span>
                                            </div>
                                            <div class="text">
                                                <p>Basic</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-avatar"></span>
                                            </div>
                                            <div class="text">
                                                <p>Age 25</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-in-person"></span>
                                            </div>
                                            <div class="text">
                                                <p>5 Persons</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-one__car-rent-box">
                                    <p class="listing-one__car-rent">Starting From
                                        <span>$100/</span> Day</p>
                                </div>
                                <div class="listing-one__btn-box">
                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                            class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing One Single End -->
                    <!-- Listing One Single Start -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="listing-one__single">
                            <div class="listing-one__img">
                                <img src="assets/images/listing/listing-1-6.jpg" alt="">
                                <div class="listing-one__brand-name">
                                    <p>Toyota</p>
                                </div>
                            </div>
                            <div class="listing-one__content">
                                <h3 class="listing-one__title"><a href="listing-single.html">Toyota
                                        Tacoma 4WD</a></h3>
                                <div class="listing-one__meta-box-info">
                                    <ul class="list-unstyled listing-one__meta">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-manual"></span>
                                            </div>
                                            <div class="text">
                                                <p>Manual</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-mileage"></span>
                                            </div>
                                            <div class="text">
                                                <p>25 KM</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-fuel-type"></span>
                                            </div>
                                            <div class="text">
                                                <p>Diesel</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-test-drive"></span>
                                            </div>
                                            <div class="text">
                                                <p>Basic</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-avatar"></span>
                                            </div>
                                            <div class="text">
                                                <p>Age 25</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-in-person"></span>
                                            </div>
                                            <div class="text">
                                                <p>5 Persons</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-one__car-rent-box">
                                    <p class="listing-one__car-rent">Starting From
                                        <span>$100/</span> Day</p>
                                </div>
                                <div class="listing-one__btn-box">
                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                            class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing One Single End -->
                    <!-- Listing One Single Start -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="listing-one__single">
                            <div class="listing-one__img">
                                <img src="assets/images/listing/listing-1-1.jpg" alt="">
                                <div class="listing-one__brand-name">
                                    <p>Acura</p>
                                </div>
                            </div>
                            <div class="listing-one__content">
                                <h3 class="listing-one__title"><a href="listing-single.html">Acura
                                        Sport Version</a></h3>
                                <div class="listing-one__meta-box-info">
                                    <ul class="list-unstyled listing-one__meta">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-manual"></span>
                                            </div>
                                            <div class="text">
                                                <p>Manual</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-mileage"></span>
                                            </div>
                                            <div class="text">
                                                <p>25 KM</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-fuel-type"></span>
                                            </div>
                                            <div class="text">
                                                <p>Diesel</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-test-drive"></span>
                                            </div>
                                            <div class="text">
                                                <p>Basic</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-avatar"></span>
                                            </div>
                                            <div class="text">
                                                <p>Age 25</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-in-person"></span>
                                            </div>
                                            <div class="text">
                                                <p>5 Persons</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-one__car-rent-box">
                                    <p class="listing-one__car-rent">Starting From
                                        <span>$100/</span> Day</p>
                                </div>
                                <div class="listing-one__btn-box">
                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                            class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing One Single End -->
                    <!-- Listing One Single Start -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="listing-one__single">
                            <div class="listing-one__img">
                                <img src="assets/images/listing/listing-1-2.jpg" alt="">
                                <div class="listing-one__brand-name">
                                    <p>Kia Soul</p>
                                </div>
                            </div>
                            <div class="listing-one__content">
                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                        2025</a></h3>
                                <div class="listing-one__meta-box-info">
                                    <ul class="list-unstyled listing-one__meta">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-manual"></span>
                                            </div>
                                            <div class="text">
                                                <p>Manual</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-mileage"></span>
                                            </div>
                                            <div class="text">
                                                <p>25 KM</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-fuel-type"></span>
                                            </div>
                                            <div class="text">
                                                <p>Diesel</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-test-drive"></span>
                                            </div>
                                            <div class="text">
                                                <p>Basic</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-avatar"></span>
                                            </div>
                                            <div class="text">
                                                <p>Age 25</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-in-person"></span>
                                            </div>
                                            <div class="text">
                                                <p>5 Persons</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-one__car-rent-box">
                                    <p class="listing-one__car-rent">Starting From
                                        <span>$100/</span> Day</p>
                                </div>
                                <div class="listing-one__btn-box">
                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                            class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing One Single End -->
                    <!-- Listing One Single Start -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="listing-one__single">
                            <div class="listing-one__img">
                                <img src="assets/images/listing/listing-1-3.jpg" alt="">
                                <div class="listing-one__brand-name">
                                    <p>Audi</p>
                                </div>
                            </div>
                            <div class="listing-one__content">
                                <h3 class="listing-one__title"><a href="listing-single.html">Audi A3
                                        2025 New</a></h3>
                                <div class="listing-one__meta-box-info">
                                    <ul class="list-unstyled listing-one__meta">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-manual"></span>
                                            </div>
                                            <div class="text">
                                                <p>Manual</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-mileage"></span>
                                            </div>
                                            <div class="text">
                                                <p>25 KM</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-fuel-type"></span>
                                            </div>
                                            <div class="text">
                                                <p>Diesel</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-test-drive"></span>
                                            </div>
                                            <div class="text">
                                                <p>Basic</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-avatar"></span>
                                            </div>
                                            <div class="text">
                                                <p>Age 25</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-in-person"></span>
                                            </div>
                                            <div class="text">
                                                <p>5 Persons</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-one__car-rent-box">
                                    <p class="listing-one__car-rent">Starting From
                                        <span>$100/</span> Day</p>
                                </div>
                                <div class="listing-one__btn-box">
                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                            class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Listing One Single End -->
                </div>
                <div class="car-listing__pagination">
                    <ul class="pg-pagination list-unstyled">
                        <li class="prev">
                            <a href="#" aria-label="prev"><i class="fas fa-angle-left"></i></a>
                        </li>
                        <li class="count active"><a href="#">1</a></li>
                        <li class="count"><a href="#">2</a></li>
                        <li class="count"><a href="#">3</a></li>
                        <li class="count"><a href="#">...</a></li>
                        <li class="next">
                            <a href="#" aria-label="Next"><i class="fas fa-angle-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Cars Page End -->

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

        <!--Site Footer Start-->
        <footer class="site-footer">
            <div class="site-footer__bg" style="background-image: url(assets/images/backgrounds/site-footer-bg.jpg);">
            </div>
            <div class="site-footer__top">
                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__about">
                                    <div class="footer-widget__about-logo">
                                        <a href="index.html"><img src="assets/images/resources/footer-logo.png"
                                                alt=""></a>
                                    </div>
                                    <p class="footer-widget__about-text">Car Is Where Early Adopters And Innovation
                                        Seekers Find Lively
                                        Imaginative Tech.</p>
                                    <form class="footer-widget__form">
                                        <div class="footer-widget__input">
                                            <input type="email" placeholder="Your Email">
                                        </div>
                                        <button type="submit" class="footer-widget__btn"><i
                                                class="icon-right-arrow"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                <div class="footer-widget__links">
                                    <h4 class="footer-widget__title">Quick links</h4>
                                    <ul class="footer-widget__links-list list-unstyled">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">Our Services</a></li>
                                        <li><a href="drivers.html">Our Drivers</a></li>
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                                <div class="footer-widget__services">
                                    <h4 class="footer-widget__title">Services</h4>
                                    <ul class="footer-widget__links-list list-unstyled">
                                        <li><a href="car-list-v-1.html">Your Reliable Ride</a></li>
                                        <li><a href="car-list-v-2.html">Express Shuttle</a></li>
                                        <li><a href="car-list-v-3.html">Travel in Style</a></li>
                                        <li><a href="cars.html">Rental List</a></li>
                                        <li><a href="listing-single.html">Dash Transport</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                                <div class="footer-widget__contact">
                                    <h3 class="footer-widget__title">Contact Us</h3>
                                    <ul class="footer-widget__contact-list list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-pin"></span>
                                            </div>
                                            <p>4140 Parker Rd. Allentown, New
                                                <br> Mexico 31134</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-call"></span>
                                            </div>
                                            <p><a href="tel:2195550114">(219) 555-0114</a></p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-envelope"></span>
                                            </div>
                                            <p><a href="mailto:gorent@gmail.com">gorent@gmail.com</a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer__bottom-inner">
                                <div class="site-footer__copyright">
                                    <p class="site-footer__copyright-text">© 2025 Gorent By <a
                                            href="https://themeforest.net/user/dreamlayout">Dreamlayout.</a> All
                                        Rights
                                        Reserved.</p>
                                </div>
                                <div class="site-footer__bottom-menu-box">
                                    <ul class="list-unstyled site-footer__bottom-menu">
                                        <li><a href="about.html">Terms of Service</a></li>
                                        <li><a href="about.html">Privacy policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->




    </div><!-- /.page-wrapper -->

