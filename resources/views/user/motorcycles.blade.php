@extends('user.layouts.app')

@section('content')
    <!--Page Header Start -->
    <section class="page-header">
        <div class="page-header__bg"
            style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg.jpg') }}');">
        </div>
        <div class="page-header__shape-1"
            style="background-image: url('{{ asset('assets/images/shapes/page-header-shape-1.png') }}');"></div>
        <div class="container">
            <div class="page-header__inner">
                <h3>Motorcycle List</h3>
                <div class="thm-breadcrumb__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li><span class="icon-arrow-left"></span></li>
                        <li>Motorcycle List</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End -->

    <!--Motorcycle Listing page One Start -->
    <!--Motorcycle Listing page One End -->
    <!--Motorcycle Listing page One End -->
    <!--Motorcycle Listing page baru Start -->


    <section class="car-listing-page-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="car-listing-page-one__left">
                        <div class="row">
                            @forelse ($motorcycles as $m)
                                <div class="col-xl-4 col-lg-4 col-md-6">
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
                                            <h3 class="listing-one__title">
                                                <a
                                                    href="{{ Auth::check() ? route('motorcycles.show', ['id' => $m->id, 'slug' => \Illuminate\Support\Str::slug($m->brand . ' ' . $m->type)]) : route('login') }}">{{ $m->category }}</a>
                                            </h3>
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
                                                        <div class="icon">
                                                            {{-- <span class="icon-test-drive"></span> --}}
                                                        </div>
                                                        <div class="text">
                                                            {{-- Mengubah 'big_matic' menjadi 'Big Matic' agar lebih rapi --}}
                                                            <p>{{ str_replace('_', '', ucfirst($m->type)) }}
                                                            </p>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="listing-one__car-rent-box">
                                                <p class="listing-one__car-rent">Price
                                                    <span>Rp {{ number_format($m->price, 0, ',', '.') }}</span>
                                                </p>
                                            </div>
                                            <div class="listing-one__btn-box">
                                                <a href="{{ Auth::check() ? route('motorcycles.show', ['id' => $m->id, 'slug' => \Illuminate\Support\Str::slug($m->brand . ' ' . $m->type)]) : route('login') }}"
                                                    class="thm-btn">Details Now
                                                    <span class="fas fa-arrow-right"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <p>No motorcycles found.</p>
                                </div>
                            @endforelse
                        </div>

                        <div class="car-listing__pagination">
                            {{ $motorcycles->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="car-listing-page-one__right">
                        <div class="car-listing__sidebar">

                            <form action="{{ route('motorcycles.index') }}" method="GET">

                                <div class="car-listing__search car-listing__sidebar-single">
                                    <h3 class="car-listing__sidebar-title">Search Category</h3>
                                    <div class="search-form">
                                        <input type="text" name="category" placeholder="Type category..."
                                            value="{{ request('category') }}">
                                        <button type="submit"><i class="fa fa-search"></i></button>

                                    </div>
                                </div>

                                <div class="car-listing__price-ranger car-listing__sidebar-single">
                                    <h3 class="car-listing__sidebar-title">Filter Price</h3>
                                    <div class="price-ranger">
                                        <div id="slider-range"></div>
                                        <div class="ranger-min-max-block">
                                            <input type="text" name="min_price" id="min_price" readonly class="min"
                                                value="{{ request('min_price', '0') }}">
                                            <span>-</span>
                                            <input type="text" name="max_price" id="max_price" readonly class="max"
                                                value="{{ request('max_price', '5000000') }}">
                                        </div>
                                        <button type="submit" class="thm-btn w-100 mt-2" style="padding: 5px;">Filter
                                            Price</button>
                                    </div>
                                </div>


                                <div class="car-listing__category car-listing__sidebar-single">
                                    <h3 class="car-listing__sidebar-title">Brand</h3>
                                    <ul class="list-unstyled">
                                        @foreach ($brands as $brand)
                                            <li>
                                                <div class="checked-box">
                                                    <input type="checkbox" name="brand[]" id="br-{{ $brand }}"
                                                        value="{{ $brand }}"
                                                        {{ is_array(request('brand')) && in_array($brand, request('brand')) ? 'checked' : '' }}
                                                        onchange="this.form.submit()">
                                                    <label
                                                        for="br-{{ $brand }}"><span></span>{{ strtoupper($brand) }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="car-listing__category car-listing__sidebar-single">
                                    <h3 class="car-listing__sidebar-title">Type</h3>
                                    <ul class="list-unstyled">
                                        @foreach ($types as $type)
                                            <li>
                                                <div class="checked-box">
                                                    <input type="checkbox" name="type[]" id="ty-{{ $type }}"
                                                        value="{{ $type }}"
                                                        {{ is_array(request('type')) && in_array($type, request('type')) ? 'checked' : '' }}
                                                        onchange="this.form.submit()">
                                                    <label
                                                        for="ty-{{ $type }}"><span></span>{{ ucfirst(str_replace('_', ' ', $type)) }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="car-listing__category car-listing__sidebar-single">
                                    <h3 class="car-listing__sidebar-title">Transmission</h3>
                                    <ul class="list-unstyled">
                                        @foreach ($transmissions as $trans)
                                            <li>
                                                <div class="checked-box">
                                                    <input type="checkbox" name="transmission[]"
                                                        id="tr-{{ $trans }}" value="{{ $trans }}"
                                                        {{ is_array(request('transmission')) && in_array($trans, request('transmission')) ? 'checked' : '' }}
                                                        onchange="this.form.submit()">
                                                    <label for="tr-{{ $trans }}">
                                                        <span></span>{{ ucfirst($trans) }}
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="car-listing__category car-listing__sidebar-single">
                                    <h3 class="car-listing__sidebar-title">Fuel Configuration</h3>
                                    <ul class="list-unstyled">
                                        @foreach ($fuels as $fuel)
                                            <li>
                                                <div class="checked-box">
                                                    <input type="checkbox" name="fuel[]" id="fu-{{ $fuel }}"
                                                        value="{{ $fuel }}"
                                                        {{ is_array(request('fuel')) && in_array($fuel, request('fuel')) ? 'checked' : '' }}
                                                        onchange="this.form.submit()">
                                                    <label for="fu-{{ $fuel }}">
                                                        <span></span>{{ ucfirst($fuel) }}
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <a href="{{ route('motorcycles.index') }}"
                                    class="btn btn-secondary btn-sm w-100 mt-3">Reset All
                                    Filters</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>










    </div><!-- /.page-wrapper -->
@endsection
