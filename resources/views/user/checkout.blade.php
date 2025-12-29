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
                    <h3>Checkout</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Start Checkout Page-->
        <section class="checkout-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-6">
                        <div class="billing_details">
                            <div class="billing_title">
                                <p>Returning Customer? <a href="#">Click here to Login</a></p>
                                <h2>Billing details</h2>
                            </div>
                            <form class="billing_details_form">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="billing_input_box">
                                            <div class="select-box">
                                                <select class="wide">
                                                    <option data-display="Select a country">Select a country</option>
                                                    <option value="1">Canada</option>
                                                    <option value="2">England</option>
                                                    <option value="3">Australia</option>
                                                    <option value="3">USA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bs-gutter-x-20">
                                    <div class="col-xl-6">
                                        <div class="billing_input_box">
                                            <input type="text" name="first_name" value="" placeholder="First name"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="billing_input_box">
                                            <input type="text" name="last_name" value="" placeholder="Last name"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="billing_input_box">
                                            <input type="text" name="company_name" value="" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="billing_input_box">
                                            <input type="text" name="Address" value="" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="billing_input_box">
                                            <input type="text" name="company_name" value=""
                                                placeholder="Appartment, unit, etc. (optional)">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="billing_input_box">
                                            <input type="text" name="Town/City" value="" placeholder="Town / City"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row bs-gutter-x-20">
                                    <div class="col-xl-6">
                                        <div class="billing_input_box">
                                            <input type="text" name="State" value="" placeholder="State" required="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="billing_input_box">
                                            <input name="form_zip" type="text" pattern="[0-9]*" placeholder="Zip code">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="billing_input_box">
                                            <input name="email" type="email" placeholder="Email address">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="billing_input_box">
                                            <input type="tel" name="form_phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                                required="" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="billing_input_box">
                                            <textarea placeholder="Type your note" name="form_order_notes"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="checked-box">
                                            <input type="checkbox" name="skipper1" id="skipper" checked="">
                                            <label for="skipper"><span></span>Create an account?</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="billing_details_form-btns">
                                            <div class="billing_details_form-btn-1">
                                                <button type="submit" class="thm-btn">Continue Shopping <span
                                                        class="fas fa-arrow-right"></span>
                                                </button>
                                            </div>
                                            <div class="billing_details_form-btn-2">
                                                <button type="submit" class="thm-btn">Return To Cart <span
                                                        class="fas fa-arrow-right"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6">
                        <div class="sidebar-order-summary">
                            <div class="title-box">
                                <h3>Your Order</h3>
                            </div>

                            <ul class="sidebar-order-summary__list list-unstyled">
                                <li>
                                    <div class="left-text">
                                        <p>Bolt Sweatshirt</p>
                                    </div>

                                    <div class="right-text">
                                        <p>$88.00</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="left-text">
                                        <p>Cock Kat Kitten <br> Milk X 02</p>
                                    </div>

                                    <div class="right-text">
                                        <p>$188.00</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="left-text">
                                        <p>Sub total</p>
                                    </div>

                                    <div class="right-text">
                                        <p>$288.00</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="left-text">
                                        <p>Shipping</p>
                                    </div>

                                    <div class="right-text">
                                        <ul>
                                            <li>
                                                <input type="radio" id="flat" name="rating" checked="checked">
                                                <label for="flat">
                                                    <i></i>
                                                    Flat Rate: $9.00
                                                </label>
                                            </li>

                                            <li>
                                                <input type="radio" id="free" name="rating">
                                                <label for="free">
                                                    <i></i>
                                                    Free Shipping
                                                </label>
                                            </li>

                                            <li>
                                                <input type="radio" id="local" name="rating">
                                                <label for="local">
                                                    <i></i>
                                                    Local Pickup
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class="left-text">
                                        <p>Total</p>
                                    </div>

                                    <div class="right-text">
                                        <p>$388.00</p>
                                    </div>
                                </li>
                            </ul>

                            <div class="sidebar-order-summary__Payment">
                                <div class="title-box">
                                    <h3>Payment Method</h3>
                                </div>

                                <div class="checkout__payment">
                                    <div class="checkout__payment__item checkout__payment__item--active">
                                        <h3 class="checkout__payment__title">Direct bank transfer</h3>
                                        <div class="checkout__payment__content">
                                            A Direct Bank Transfer is a method of sending money from one
                                            bank account to another without using cash, checks, or third-party payment
                                            services.
                                        </div>
                                    </div>
                                    <div class="checkout__payment__item">
                                        <h3 class="checkout__payment__title">Paypal payment</h3>
                                        <div class="checkout__payment__content">
                                            PayPal is an online payment system that allows users to send and receive
                                            money securely. It supports personal and business transactions, including
                                            shopping, invoicing, and international transfers.
                                        </div>
                                    </div>
                                    <div class="checkout__payment__item">
                                        <h3 class="checkout__payment__title">Cheque Payment</h3>
                                        <div class="checkout__payment__content">
                                            A cheque payment is a written, dated, and signed document that instructs a
                                            bank to pay a specific amount of money from the issuer’s account to the
                                            payee.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-order-summary__bottom">
                                <p class="text1">your personal data will be used to process your order your support
                                    experience throughout this website and for other purposes described in our <a
                                        href="#">privacy policy</a></p>

                                <div class="sidebar-order-summary__checked">
                                    <input type="checkbox" name="skipper1" id="skipper2" checked="">
                                    <label for="skipper2"><span></span>I have read and agree to the website <a
                                            href="#">terms and conditions</a></label>
                                </div>

                                <div class="sidebar-order-summary__btn">
                                    <a class="thm-btn" href="checkout.html">Place your order <span
                                            class="fas fa-arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Checkout Page-->

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