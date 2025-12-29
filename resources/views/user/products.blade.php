@extends('user.layouts.app') 

@section('content')


        <!--Page Header Start -->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg.jpg') }}');">
            </div>
            <div class="page-header__shape-1"
                style="background-image: url('{{ asset('assets/images/shapes/page-header-shape-1.png') }}');"></div>
            <div class="container">
                <div class="page-header__inner">
                    <h3>Products</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Product Start-->
        <section class="product">
            <div class="container">
                <div class="row">


                    <div class="col-xl-9 col-lg-12">
                        <div class="product__items">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product__showing-result">
                                        <div class="product__showing-text-box">
                                            <p class="product__showing-text">Showing 1–12/14 of 14 results</p>
                                        </div>
                                        <div class="product__showing-sort">
                                            <div class="select-box">
                                                <select class="wide">
                                                    <option data-display="Sort by popular">Sort by popular</option>
                                                    <option value="1">Sort by popular</option>
                                                    <option value="2">Sort by Price</option>
                                                    <option value="3">Sort by Ratings</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product__all">
                                <div class="product__all-tab">
                                    <div class="product__all-tab-button">
                                        <ul class="tabs-button-box clearfix">
                                            <li data-tab="#grid" class="tab-btn-item active-btn-item">
                                                <div class="product__all-tab-button-icon one">
                                                    <i class="fa fa-solid fa-bars"></i>
                                                </div>
                                            </li>
                                            <li data-tab="#list" class="tab-btn-item">
                                                <div class="product__all-tab-button-icon">
                                                    <i class="fa fa-solid fa-list-ul"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <!--Start Tabs Content Box-->
                                    <div class="tabs-content-box">
                                        <!--Start Tab-->
                                        <div class="tab-content-box-item tab-content-box-item-active" id="grid">
                                            <div class="product__all-tab-content-box-item">
                                                <div class="product__all-tab-single">
                                                    <div class="row">

                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-1.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-1.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__overlay">
                                                                        <li>
                                                                            <p>New</p>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Gree Air Conditioner
                                                                            </a>
                                                                        </h4>
                                                                        <p>$33.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.9</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-2.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-2.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Pliers | Cutting, Gripping
                                                                            </a>
                                                                        </h4>
                                                                        <p>$50.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>5.0</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-3.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-3.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__overlay">
                                                                        <li>
                                                                            <p>5% Off</p>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Gear and wrench
                                                                            </a>
                                                                        </h4>
                                                                        <p><del>$33.00</del> $28.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.5</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-4.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-4.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Nut Driver
                                                                            </a>
                                                                        </h4>
                                                                        <p>$40.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.8</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-5.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-5.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__overlay">
                                                                        <li>
                                                                            <p>5% Off</p>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Screwdriver and wrench
                                                                            </a>
                                                                        </h4>
                                                                        <p><del>$25.00</del>$20.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.9</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-6.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-6.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Monitor Cable
                                                                            </a>
                                                                        </h4>
                                                                        <p>$35.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.7</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-7.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-7.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__overlay">
                                                                        <li>
                                                                            <p>New</p>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Fiber Optical Cable
                                                                            </a>
                                                                        </h4>
                                                                        <p>$27.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.6</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-8.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-8.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Electrical Wire
                                                                            </a>
                                                                        </h4>
                                                                        <p>$44.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>5.0</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-9.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-9.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__overlay">
                                                                        <li>
                                                                            <p>3% Off</p>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Computer power supply
                                                                            </a>
                                                                        </h4>
                                                                        <p><del>$49.00</del>$52.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.9</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-10.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-10.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Fite ON AC_DC Adapter
                                                                            </a>
                                                                        </h4>
                                                                        <p>$25.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.7</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-11.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-11.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__overlay">
                                                                        <li>
                                                                            <p>New</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>7% Off</p>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Wireless Mouse Keyboard
                                                                            </a>
                                                                        </h4>
                                                                        <p><del>$36.00</del>$43.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.9</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                            <div class="single-product-style1">
                                                                <div class="single-product-style1__img">
                                                                    <img src="assets/images/shop/shop-product-1-12.jpg"
                                                                        alt="">
                                                                    <img src="assets/images/shop/shop-product-1-12.jpg"
                                                                        alt="">
                                                                    <ul class="single-product-style1__info">
                                                                        <li>
                                                                            <a href="#" title="Add to Wishlist">
                                                                                <i class="fa fa-regular fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Add to cart">
                                                                                <i class="fa fa-solid fa-cart-plus"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Quick View">
                                                                                <i class="fa fa-regular fa-eye"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Compare">
                                                                                <i class="fa fa-solid fa-repeat"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="single-product-style1__content">
                                                                    <div class="single-product-style1__content-left">
                                                                        <h4>
                                                                            <a href="product-details.html">
                                                                                Gaming Headset
                                                                            </a>
                                                                        </h4>
                                                                        <p>$28.00</p>
                                                                    </div>
                                                                    <div class="single-product-style1__content-right">
                                                                        <div class="single-product-style1__review">
                                                                            <i class="fa fa-star"></i>
                                                                            <p>4.6</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single End-->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Tab-->
                                        <!--Start Tab-->
                                        <div class="tab-content-box-item" id="list">
                                            <div class="product__all-tab-content-box-item">
                                                <div class="product__all-tab-single">
                                                    <div class="row">

                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-1.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-1.jpg"
                                                                                alt="">
                                                                            <ul class="single-product-style1__overlay">
                                                                                <li>
                                                                                    <p>New</p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Gree Air Conditioner
                                                                                    </a>
                                                                                </h4>
                                                                                <p>$33.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-2.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-2.jpg"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Pliers | Cutting, Gripping
                                                                                    </a>
                                                                                </h4>
                                                                                <p>$50.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-3.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-3.jpg"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Gear and wrench
                                                                                    </a>
                                                                                </h4>
                                                                                <p>$40.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-4.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-4.jpg"
                                                                                alt="">
                                                                        </div>
                                                                        <ul class="single-product-style1__overlay">
                                                                            <li>
                                                                                <p>5% Off</p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Nut Driver
                                                                                    </a>
                                                                                </h4>
                                                                                <p><del>$33.00</del>$28.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-5.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-5.jpg"
                                                                                alt="">
                                                                        </div>
                                                                        <ul class="single-product-style1__overlay">
                                                                            <li>
                                                                                <p>5% Off</p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Screwdriver and wrench
                                                                                    </a>
                                                                                </h4>
                                                                                <p><del>$25.00</del>$20.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-6.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-6.jpg"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Monitor Cable
                                                                                    </a>
                                                                                </h4>
                                                                                <p>$35.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-7.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-7.jpg"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Fiber Optical Cable
                                                                                    </a>
                                                                                </h4>
                                                                                <p>$44.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-8.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-8.jpg"
                                                                                alt="">
                                                                            <ul class="single-product-style1__overlay">
                                                                                <li>
                                                                                    <p>New</p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Electrical Wire
                                                                                    </a>
                                                                                </h4>
                                                                                <p>$27.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-9.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-9.jpg"
                                                                                alt="">
                                                                            <ul class="single-product-style1__overlay">
                                                                                <li>
                                                                                    <p>3% Off</p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Computer power supply
                                                                                    </a>
                                                                                </h4>
                                                                                <p><del>$49.00</del>$52.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-10.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-10.jpg"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Fite ON AC_DC Adapter
                                                                                    </a>
                                                                                </h4>
                                                                                <p><del>$33.00</del>$28.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-11.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-11.jpg"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Wireless Mouse Keyboard
                                                                                    </a>
                                                                                </h4>
                                                                                <p>$40.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-12.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-12.jpg"
                                                                                alt="">
                                                                        </div>
                                                                        <ul class="single-product-style1__overlay">
                                                                            <li>
                                                                                <p>New</p>
                                                                            </li>
                                                                            <li>
                                                                                <p>7% Off</p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Gaming Headset
                                                                                    </a>
                                                                                </h4>
                                                                                <p><del>$36.00</del>$43.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-1.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-1.jpg"
                                                                                alt="">
                                                                            <ul class="single-product-style1__overlay">
                                                                                <li>
                                                                                    <p>New</p>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Gree Air Conditioner
                                                                                    </a>
                                                                                </h4>
                                                                                <p>$55.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->
                                                        <!--Product All Single Start-->
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="single-product-style2">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__img">
                                                                            <img src="assets/images/shop/shop-product-2-2.jpg"
                                                                                alt="">
                                                                            <img src="assets/images/shop/shop-product-2-2.jpg"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="single-product-style2__content">
                                                                            <div class="single-product-style2__review">
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </div>
                                                                            <div class="single-product-style2__text">
                                                                                <h4>
                                                                                    <a href="product-details.html">
                                                                                        Pliers | Cutting, Gripping
                                                                                    </a>
                                                                                </h4>
                                                                                <p>$80.00</p>
                                                                            </div>
                                                                            <ul class="single-product-style2__info">
                                                                                <li>
                                                                                    <a href="#" title="Add to Wishlist">
                                                                                        <i
                                                                                            class="fa fa-regular fa-heart">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Add to cart">
                                                                                        <i
                                                                                            class="fa fa-solid fa-cart-plus">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Quick View">
                                                                                        <i class="fa fa-regular fa-eye">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" title="Compare">
                                                                                        <i
                                                                                            class="fa fa-solid fa-repeat">
                                                                                        </i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Product All Single Start-->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Tab-->
                                    </div>
                                    <!--End Tabs Content Box-->
                                </div>
                                <ul class="styled-pagination text-center clearfix list-unstyled">
                                    <li class="arrow prev active">
                                        <a href="#">
                                            <span class="fas fa-angle-left"></span>
                                        </a>
                                    </li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="arrow next">
                                        <a href="#">
                                            <span class="fas fa-angle-right"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-12">
                        <div class="product__sidebar">
                            <div class="shop-search product__sidebar-single">
                                <form action="#">
                                    <input type="text" placeholder="Search">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="product__price-ranger product__sidebar-single">
                                <h3 class="product__sidebar-title">Price</h3>
                                <div class="price-ranger">
                                    <div id="slider-range"></div>
                                    <div class="ranger-min-max-block">
                                        <input type="text" readonly class="min">
                                        <span>-</span>
                                        <input type="text" readonly class="max">
                                        <input type="submit" value="Filter">
                                    </div>
                                </div>
                            </div>

                            <div class="shop-category product__sidebar-single">
                                <h3 class="product__sidebar-title">Categories</h3>
                                <ul class="list-unstyled">
                                    <li><a href="#">PC Repair</a></li>
                                    <li class="active"><a href="#">Phone Repair</a></li>
                                    <li><a href="#">A/C Installation</a></li>
                                    <li><a href="#">Electrical Wire</a></li>
                                    <li><a href="#">Laptop Repair</a></li>
                                </ul>
                            </div>

                            <div class="shop-product-recent-products product__sidebar-single">
                                <h3 class="product__sidebar-title">Recent Products</h3>
                                <ul class="clearfix list-unstyled">
                                    <li>
                                        <div class="img">
                                            <img src="assets/images/shop/product-thumb-1.jpg" alt="Product">
                                            <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="content">
                                            <div class="title">
                                                <h5><a href="#">Gree Air Conditioner</a></h5>
                                            </div>
                                            <div class="price">
                                                <p>$33.00</p>
                                            </div>
                                            <div class="review">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star color"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <img src="assets/images/shop/product-thumb-2.jpg" alt="Product">
                                            <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="content">
                                            <div class="title">
                                                <h5><a href="#">Pliers | Cutting, Gripping</a></h5>
                                            </div>
                                            <div class="price">
                                                <p>$39.00</p>
                                            </div>
                                            <div class="review">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star color"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <img src="assets/images/shop/product-thumb-3.jpg" alt="Product">
                                            <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="content">
                                            <div class="title">
                                                <h5><a href="#">Gear and wrench</a></h5>
                                            </div>
                                            <div class="price">
                                                <p>$54.00</p>
                                            </div>
                                            <div class="review">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star color"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <img src="assets/images/shop/product-thumb-4.jpg" alt="Product">
                                            <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="content">
                                            <div class="title">
                                                <h5><a href="#">Nut Driver</a></h5>
                                            </div>
                                            <div class="price">
                                                <p>$44.00</p>
                                            </div>
                                            <div class="review">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star color"></i>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="shop-product-tags product__sidebar-single">
                                <h3 class="product__sidebar-title">Product Tags</h3>
                                <div class="shop-product__tags-list">
                                    <a href="#">Repair</a>
                                    <a href="#">Technology</a>
                                    <a href="#">Business</a>
                                    <a href="#">Virus</a>
                                    <a href="#">Desktop</a>
                                    <a href="#">Laptop</a>
                                </div>
                            </div>

                            <!--Start Products Style1 Single Sidear -->
                            <div class="shop-product-tags product__sidebar-single style">
                                <h3 class="product__sidebar-title">Reviews</h3>
                                <div class="sidebar-rating-box sidebar-rating-box--style2">
                                    <ul class="list-unstyled">
                                        <li>
                                            <input type="radio" id="fivestar" name="rating" checked="checked">
                                            <label for="fivestar">
                                                <i></i>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="fourstar" name="rating">
                                            <label for="fourstar">
                                                <i></i>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star gray"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="threestar" name="rating">
                                            <label for="threestar">
                                                <i></i>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star gray"></span>
                                                <span class="fas fa-star gray"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="twostar" name="rating">
                                            <label for="twostar">
                                                <i></i>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star gray"></span>
                                                <span class="fas fa-star gray"></span>
                                                <span class="fas fa-star gray"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="onestar" name="rating">
                                            <label for="onestar">
                                                <i></i>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star gray"></span>
                                                <span class="fas fa-star gray"></span>
                                                <span class="fas fa-star gray"></span>
                                                <span class="fas fa-star gray"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--End Products Style1 Single Sidear -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Product End-->

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
            <div class="site-footer__bg" style="background-image: url('{{ asset('assets/images/backgrounds/site-footer-bg.jpg') }}');">
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
@endsection