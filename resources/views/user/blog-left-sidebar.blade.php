@extends('user.layouts.app') 

@section('content')

        <!--Page Header Start -->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg);">
            </div>
            <div class="page-header__shape-1"
                style="background-image: url(assets/images/shapes/page-header-shape-1.png);"></div>
            <div class="container">
                <div class="page-header__inner">
                    <h3>Blog Left Sidebar</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>Blog Left Sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Blog Left Sidebar Start -->
        <section class="blog-left-sidebar">
            <div class="container">
                <div class="row">
                    <!--Start Sidebar-->
                    <div class="col-xl-4">
                        <div class="sidebar sidebar--two">
                            <!--Start Sidebar Single-->
                            <div class="sidebar__single sidebar__search wow fadeInUp" data-wow-delay=".1s">
                                <form action="#" class="sidebar__search-form">
                                    <input type="search" placeholder="Search...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!--End Sidebar Single-->


                            <!--Start Sidebar Single-->
                            <div class="sidebar__single sidebar__category wow fadeInUp" data-wow-delay=".1s">
                                <h3 class="sidebar__title">Categories</h3>
                                <ul class="sidebar__category-list list-unstyled">
                                    <li><a href="#">
                                            Corporate car rental <span>(12)</span></a></li>
                                    <li class="active"><a href="#">Parallax Effect
                                            <span>(15)</span></a></li>
                                    <li><a href="#">Car rental with driver <span>(08)</span></a></li>
                                    <li><a href="#">
                                            Airport transfer <span>(20)</span></a></li>
                                    <li><a href="#">
                                            Fleet leasing <span>(14)</span></a></li>
                                    <li><a href="#">
                                            Pick-Up Locations <span>(05)</span></a></li>
                                </ul>
                            </div>
                            <!--End Sidebar Single-->

                            <!--Start Sidebar Single-->
                            <div class="sidebar__single sidebar__post wow fadeInUp" data-wow-delay=".1s">
                                <h3 class="sidebar__title">Recent Post</h3>
                                <div class="sidebar__post-box">
                                    <div class="sidebar__post-single">
                                        <div class="sidebar-post__img">
                                            <img src="assets/images/blog/recent-post-img-1.jpg" alt="">
                                        </div>
                                        <div class="sidebar__post-content-box">
                                            <h3><a href="#">Regular maintenance cleaning or replacing air filters</a>
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="sidebar__post-single">
                                        <div class="sidebar-post__img">
                                            <img src="assets/images/blog/recent-post-img-2.jpg" alt="">
                                        </div>
                                        <div class="sidebar__post-content-box">
                                            <h3><a href="#">Water leakage can be due to a clogged drain line repaire</a>
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="sidebar__post-single">
                                        <div class="sidebar-post__img">
                                            <img src="assets/images/blog/recent-post-img-3.jpg" alt="">
                                        </div>
                                        <div class="sidebar__post-content-box">
                                            <h3><a href="#">Revitalising your people in to a retail downturn.</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Sidebar Single-->

                            <!--Start Sidebar Single-->
                            <div class="sidebar__single sidebar__tags wow fadeInUp" data-wow-delay=".1s">
                                <h3 class="sidebar__title">Tags Cloud</h3>
                                <ul class="sidebar__tags-list clearfix list-unstyled">
                                    <li><a href="#">Growth Accelerator</a></li>
                                    <li><a href="#">Management</a></li>
                                    <li><a href="#">Analysis</a></li>
                                    <li><a href="#">Planning</a></li>
                                    <li><a href="#">Solution</a></li>
                                    <li><a href="#">Advisory Service</a></li>
                                </ul>
                            </div>
                            <!--End Sidebar Single-->

                        </div>
                    </div>
                    <!--End Sidebar-->
                    <div class="col-xl-8">
                        <div class="row">
                            <!--Blog One Single Start-->
                            <div class="col-xl-6 col-lg-6">
                                <div class="blog-one__single">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="assets/images/blog/blog-1-1.jpg" alt="">
                                            <div class="blog-one__tags">
                                                <span>Car Showcase</span>
                                            </div>
                                        </div>
                                        <div class="blog-one__date">
                                            <p>10</p>
                                            <span>Nov</span>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <ul class="blog-one__meta list-unstyled">
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-user"></span>Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-comments"></span>Comment
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-one__title"><a href="blog-details.html">Documents required for
                                                car
                                                rental services</a></h3>
                                        <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers
                                            Find Lively
                                            Imaginative Tech.</p>
                                        <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--Blog One Single End-->
                            <!--Blog One Single Start-->
                            <div class="col-xl-6 col-lg-6">
                                <div class="blog-one__single">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="assets/images/blog/blog-1-2.jpg" alt="">
                                            <div class="blog-one__tags">
                                                <span>Car Showcase</span>
                                            </div>
                                        </div>
                                        <div class="blog-one__date">
                                            <p>10</p>
                                            <span>Nov</span>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <ul class="blog-one__meta list-unstyled">
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-user"></span>Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-comments"></span>Comment
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-one__title"><a href="blog-details.html">One of the most
                                                effective car
                                                rental
                                                blog topic</a></h3>
                                        <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers
                                            Find Lively
                                            Imaginative Tech.</p>
                                        <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--Blog One Single End-->
                            <!--Blog One Single Start-->
                            <div class="col-xl-6 col-lg-6">
                                <div class="blog-one__single">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="assets/images/blog/blog-1-3.jpg" alt="">
                                            <div class="blog-one__tags">
                                                <span>Car Showcase</span>
                                            </div>
                                        </div>
                                        <div class="blog-one__date">
                                            <p>10</p>
                                            <span>Nov</span>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <ul class="blog-one__meta list-unstyled">
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-user"></span>Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-comments"></span>Comment
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-one__title"><a href="blog-details.html">Rental cost of sport and
                                                other
                                                cars</a></h3>
                                        <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers
                                            Find Lively
                                            Imaginative Tech.</p>
                                        <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--Blog One Single End-->
                            <!--Blog One Single Start-->
                            <div class="col-xl-6 col-lg-6">
                                <div class="blog-one__single">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="assets/images/blog/blog-1-4.jpg" alt="">
                                            <div class="blog-one__tags">
                                                <span>Car Showcase</span>
                                            </div>
                                        </div>
                                        <div class="blog-one__date">
                                            <p>10</p>
                                            <span>Nov</span>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <ul class="blog-one__meta list-unstyled">
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-user"></span>Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-comments"></span>Comment
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-one__title"><a href="blog-details.html">Rental cars how to check
                                                driving
                                                fines?</a></h3>
                                        <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers
                                            Find Lively
                                            Imaginative Tech.</p>
                                        <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--Blog One Single End-->
                            <!--Blog One Single Start-->
                            <div class="col-xl-6 col-lg-6">
                                <div class="blog-one__single">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="assets/images/blog/blog-1-5.jpg" alt="">
                                            <div class="blog-one__tags">
                                                <span>Car Showcase</span>
                                            </div>
                                        </div>
                                        <div class="blog-one__date">
                                            <p>10</p>
                                            <span>Nov</span>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <ul class="blog-one__meta list-unstyled">
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-user"></span>Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-comments"></span>Comment
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-one__title"><a href="blog-details.html">How to Rent a Car at the
                                                Airport
                                                Terminal?</a></h3>
                                        <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers
                                            Find Lively
                                            Imaginative Tech.</p>
                                        <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--Blog One Single End-->
                            <!--Blog One Single Start-->
                            <div class="col-xl-6 col-lg-6">
                                <div class="blog-one__single">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="assets/images/blog/blog-1-6.jpg" alt="">
                                            <div class="blog-one__tags">
                                                <span>Car Showcase</span>
                                            </div>
                                        </div>
                                        <div class="blog-one__date">
                                            <p>10</p>
                                            <span>Nov</span>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <ul class="blog-one__meta list-unstyled">
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-user"></span>Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-comments"></span>Comment
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-one__title"><a href="blog-details.html">Penalties for violating
                                                the
                                                rules in rental cars</a></h3>
                                        <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers
                                            Find Lively
                                            Imaginative Tech.</p>
                                        <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--Blog One Single End-->
                            <!--Blog One Single Start-->
                            <div class="col-xl-6 col-lg-6">
                                <div class="blog-one__single">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="assets/images/blog/blog-1-1.jpg" alt="">
                                            <div class="blog-one__tags">
                                                <span>Car Showcase</span>
                                            </div>
                                        </div>
                                        <div class="blog-one__date">
                                            <p>10</p>
                                            <span>Nov</span>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <ul class="blog-one__meta list-unstyled">
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-user"></span>Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-comments"></span>Comment
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-one__title"><a href="blog-details.html">Documents required for
                                                car
                                                rental services</a></h3>
                                        <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers
                                            Find Lively
                                            Imaginative Tech.</p>
                                        <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--Blog One Single End-->
                            <!--Blog One Single Start-->
                            <div class="col-xl-6 col-lg-6">
                                <div class="blog-one__single">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="assets/images/blog/blog-1-2.jpg" alt="">
                                            <div class="blog-one__tags">
                                                <span>Car Showcase</span>
                                            </div>
                                        </div>
                                        <div class="blog-one__date">
                                            <p>10</p>
                                            <span>Nov</span>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <ul class="blog-one__meta list-unstyled">
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-user"></span>Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="fas fa-comments"></span>Comment
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-one__title"><a href="blog-details.html">One of the most
                                                effective car
                                                rental
                                                blog topic</a></h3>
                                        <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers
                                            Find Lively
                                            Imaginative Tech.</p>
                                        <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--Blog One Single End-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Left Sidebar End -->



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

@endsection