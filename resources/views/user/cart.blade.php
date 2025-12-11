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
                    <h3>Cart</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Start Cart Page-->
        <section class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="cart-page__left">
                            <div class="table-responsive">
                                <table class="table cart-table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="product-box">
                                                    <div class="img-box">
                                                        <img src="assets/images/shop/cart-page-img-1.jpg" alt="">
                                                    </div>
                                                    <h3><a href="product-details.html">Gree Air Conditioner</a></h3>
                                                </div>
                                            </td>
                                            <td>$10.99</td>
                                            <td>
                                                <div class="quantity-box">
                                                    <button type="button" class="sub"><i
                                                            class="fa fa-minus"></i></button>
                                                    <input type="number" id="product-1" value="1" />
                                                    <button type="button" class="add"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                $10.99
                                            </td>
                                            <td>
                                                <div class="cross-icon">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="product-box">
                                                    <div class="img-box">
                                                        <img src="assets/images/shop/cart-page-img-2.jpg" alt="">
                                                    </div>
                                                    <h3><a href="product-details.html">Pliers | Cutting, Gripping</a>
                                                    </h3>
                                                </div>
                                            </td>
                                            <td>$10.99</td>
                                            <td>
                                                <div class="quantity-box">
                                                    <button type="button" class="sub"><i
                                                            class="fa fa-minus"></i></button>
                                                    <input type="number" id="product-2" value="1" />
                                                    <button type="button" class="add"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                $10.99
                                            </td>
                                            <td>
                                                <div class="cross-icon">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="product-box">
                                                    <div class="img-box">
                                                        <img src="assets/images/shop/cart-page-img-3.jpg" alt="">
                                                    </div>
                                                    <h3><a href="product-details.html">Gear and wrench</a></h3>
                                                </div>
                                            </td>
                                            <td>$10.99</td>
                                            <td>
                                                <div class="quantity-box">
                                                    <button type="button" class="sub"><i
                                                            class="fa fa-minus"></i></button>
                                                    <input type="number" id="product-3" value="1" />
                                                    <button type="button" class="add"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                $10.99
                                            </td>
                                            <td>
                                                <div class="cross-icon">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="product-box">
                                                    <div class="img-box">
                                                        <img src="assets/images/shop/cart-page-img-4.jpg" alt="">
                                                    </div>
                                                    <h3><a href="product-details.html">Nut Driver</a></h3>
                                                </div>
                                            </td>
                                            <td>$10.99</td>
                                            <td>
                                                <div class="quantity-box">
                                                    <button type="button" class="sub"><i
                                                            class="fa fa-minus"></i></button>
                                                    <input type="number" id="product-4" value="1" />
                                                    <button type="button" class="add"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                $10.99
                                            </td>
                                            <td>
                                                <div class="cross-icon">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="cart-page__right">
                            <div class="cart-page__sidebar">
                                <div class="cart-page__shipping">
                                    <h3 class="cart-page__shipping-title">Calculated Shipping</h3>
                                    <form action="#" class="cart-page__shipping-form">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="cart-page__shipping-input-box">
                                                    <div class="select-box">
                                                        <select class="wide">
                                                            <option data-display="Country">Country</option>
                                                            <option value="1">Ban</option>
                                                            <option value="2">Ind</option>
                                                            <option value="3">Pak</option>
                                                            <option value="3">USA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="cart-page__shipping-input-box">
                                                    <div class="select-box">
                                                        <select class="wide">
                                                            <option data-display="State/City">State/City</option>
                                                            <option value="1">Ban</option>
                                                            <option value="2">Ind</option>
                                                            <option value="3">Pak</option>
                                                            <option value="3">USA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="cart-page__shipping-input-box">
                                                    <input type="text" placeholder="Zip Code">
                                                </div>
                                            </div>
                                            <div class="cart-page__btn-box">
                                                <button type="submit" class="thm-btn">
                                                    Update <span class="fas fa-arrow-right"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="cart-page__coupon-code">
                                    <h3 class="cart-page__coupon-code-title">Coupon Code</h3>
                                    <p class="cart-page__coupon-code-text">I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was born</p>
                                    <form action="#" class="default-form cart-page__coupon-code-form">
                                        <input type="text" placeholder="Enter Coupon Code">
                                        <button class="thm-btn" type="submit">
                                            Apply Coupon <span class="fas fa-arrow-right"></span>
                                        </button>
                                    </form>
                                </div>
                                <div class="cart-page__cart-total">
                                    <ul class="cart-total list-unstyled">
                                        <li>
                                            <span>Cart Subtotal</span>
                                            <span>$20.98 USD </span>
                                        </li>
                                        <li>
                                            <span>Shipping Cost</span>
                                            <span>-$40.00 USD</span>
                                        </li>
                                        <li>
                                            <span>Discount</span>
                                            <span>$0.00 USD</span>
                                        </li>
                                        <li>
                                            <span>Cart Total</span>
                                            <span class="cart-total-amount">$20.98 USD</span>
                                        </li>
                                    </ul>
                                    <div class="cart-page__buttons">
                                        <div class="cart-page__buttons-1">
                                            <a class="thm-btn" href="checkout.html">Update <span
                                                    class="fas fa-arrow-right"></span> </a>
                                        </div>
                                        <div class="cart-page__buttons-2">
                                            <a href="checkout.html" class="thm-btn">
                                                Checkout <span class="fas fa-arrow-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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