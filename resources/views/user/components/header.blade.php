<header class="main-header">
    <div class="main-menu__top">
        <div class="main-menu__top-inner">
            <ul class="list-unstyled main-menu__contact-list">
                <li>
                    <div class="icon">
                        <i class="icon-call-2"></i>
                    </div>
                    <div class="text">
                        <p><a href="tel:9288006780">+92 ( 8800 ) - 6780</a></p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <i class="icon-envelope-2"></i>
                    </div>
                    <div class="text">
                        <p><a href="mailto:support@gmail.com">support@gmail.com</a></p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <i class="icon-pin-2"></i>
                    </div>
                    <div class="text">
                        <p>55 Main Street, 2nd block, Malborne ,Australia</p>
                    </div>
                </li>
            </ul>
            <div class="main-menu__top-right">
                <div class="main-menu__top-login-reg-box">
                    <a href="{{ route('login') }}">Login</a>
                    <p>or</p>
                    <a href="{{ route('register') }}">Register</a>
                </div>
                <div class="main-menu__social">
                    <a href="#"><i class="icon-facebook"></i></a>
                    <a href="#"><i class="icon-twitter"></i></a>
                    <a href="#"><i class="icon-instagram"></i></a>
                    <a href="#"><i class="icon-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__left">
                    <div class="main-menu__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/resources/logo-1.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="main-menu__middle-box">
                    <div class="main-menu__main-menu-box">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li class="dropdown megamenu">
                                <a href="#">Home </a>
                                <ul>
                                    <li>
                                        <section class="home-showcase">
                                            <div class="container">
                                                <div class="home-showcase__inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="home-showcase__item">
                                                                <div class="home-showcase__image">
                                                                    <img src="{{ asset('assets/images/home-showcase/home-showcase-1-1.jpg') }}" alt="">
                                                                    <div class="home-showcase__buttons">
                                                                        <a href="{{ route('home') }}" class="thm-btn home-showcase__buttons__item">Multi Page <span class="fas fa-arrow-right"></span></a>
                                                                    </div>
                                                                </div>
                                                                <h3 class="home-showcase__title">Home Page 01</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="dropdown">
                                <a href="#">Pages</a>
                                <ul class="shadow-box">
                                    <li><a href="{{ route('services') }}">Services</a></li>
                                    <li><a href="{{ route('drivers') }}">Drivers</a></li>
                                    <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                                    <li><a href="{{ route('pricing') }}">Pricing</a></li>
                                    <li><a href="{{ route('faq') }}">FAQs</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Cars</a>
                                <ul class="shadow-box">
                                    <li><a href="{{ route('cars') }}">Cars</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Shop</a>
                                <ul class="shadow-box">
                                    <li><a href="{{ route('products') }}">Products</a></li>
                                    <li><a href="{{ route('product-details') }}">Product Details</a></li>
                                    <li><a href="{{ route('cart') }}">Cart</a></li>
                                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Blog</a>
                                <ul class="shadow-box">
                                    <li><a href="{{ route('blog') }}">Blog</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="main-menu__search-cart-box">
                        <div class="main-menu__search-box">
                            <a href="#" class="main-menu__search search-toggler icon-search"></a>
                        </div>
                        <div class="main-menu__cart-box">
                            <a href="{{ route('cart') }}" class="main-menu__cart">
                                <span class="far fa-shopping-cart"></span>
                                <span class="main-menu__cart-count">{{ $cartCount ?? 0 }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="main-menu__right">
                    <div class="main-menu__call">
                        <div class="main-menu__call-icon">
                            <i class="icon-call-3"></i>
                        </div>
                        <div class="main-menu__call-content">
                            <p class="main-menu__call-sub-title">Call Anytime</p>
                            <h5 class="main-menu__call-number"><a href="tel:23645689622">+236 (456) 896 22</a></h5>
                        </div>
                    </div>
                    <div class="main-menu__nav-sidebar-icon">
                        <a class="navSidebar-button" href="#">
                            <span class="icon-dots-menu-one"></span>
                            <span class="icon-dots-menu-two"></span>
                            <span class="icon-dots-menu-three"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
