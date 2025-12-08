@extends('user.layouts.app')

@section('title', 'Wishlist')

@section('content')










        <!--Page Header Start -->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});"></div>
            <div class="page-header__shape-1" style="background-image: url({{ asset('assets/images/shapes/page-header-shape-1.png') }});"></div>
            <div class="container">
                <div class="page-header__inner">
                    <h3>Wishlist</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Start Cart Page-->
        <section class="wishlist-page">
            <div class="container">
                <div class="table-responsive">
                    <table class="table wishlist-table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Stock Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($wishlists as $item)
                            <tr>
                                <td>
                                    <div class="product-box">
                                        <div class="cross-icon">
                                            <a href="javascript:void(0);" onclick="removeFromWishlist({{ $item->id }})">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </div>
                                        <div class="img-box">
                                            <img src="{{ asset($item->image ?? 'assets/images/shop/wishlist-page-img-1.jpg') }}" alt="{{ $item->name }}">
                                        </div>
                                        <h3><a href="{{ route('product-details', $item->id) }}">{{ $item->name }}</a></h3>
                                    </div>
                                </td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->stock_status ?? 'In Stock' }}</td>
                                <td>
                                    <div class="product-select">
                                        <a class="thm-btn wishlist-page__btn" href="{{ route('cart.add', $item->id) }}">
                                            Select Product <span class="fas fa-arrow-right"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <p class="mb-0">Wishlist Anda kosong</p>
                                    <a href="{{ route('products') }}" class="thm-btn mt-3">Lanjut Belanja</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="product-details__social two">
                    <div class="title">
                        <h3>Share with friends:</h3>
                    </div>
                    <div class="product-details__social-link">
                        <a href="#"><span class="fab fa-twitter"></span></a>
                        <a href="#"><span class="fab fa-facebook"></span></a>
                        <a href="#"><span class="fab fa-pinterest-p"></span></a>
                        <a href="#"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!--End Cart Page-->

        <!--Gallery One Start -->
        <section class="gallery-one">
            <div class="gallery-one__carousel owl-theme owl-carousel">
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{ asset('assets/images/gallery/gallery-1-1.jpg') }}" alt="">
                            <a href="{{ route('cars') }}"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{ asset('assets/images/gallery/gallery-1-2.jpg') }}" alt="">
                            <a href="{{ route('cars') }}"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{ asset('assets/images/gallery/gallery-1-3.jpg') }}" alt="">
                            <a href="{{ route('cart') }}"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{ asset('assets/images/gallery/gallery-1-4.jpg') }}" alt="">
                            <a href="{{ route('cart') }}"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{ asset('assets/images/gallery/gallery-1-5.jpg') }}" alt="">
                            <a href="{{ route('cart') }}"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{ asset('assets/images/gallery/gallery-1-6.jpg') }}" alt="">
                            <a href="{{ route('cart') }}"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
            </div>
        </section>
        <!--Gallery One End -->

@endsection