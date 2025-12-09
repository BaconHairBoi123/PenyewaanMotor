<header class="main-header">
    <div class="main-menu__top">
        <div class="main-menu__top-inner">
            <ul class="list-unstyled main-menu__contact-list">
                <li>
                    <div class="icon"><i class="icon-call-2"></i></div>
                    <div class="text">
                        <p><a href="tel:9288006780">+92 ( 8800 ) - 6780</a></p>
                    </div>
                </li>
                <li>
                    <div class="icon"><i class="icon-envelope-2"></i></div>
                    <div class="text">
                        <p><a href="mailto:support@gmail.com">support@gmail.com</a></p>
                    </div>
                </li>
                <li>
                    <div class="icon"><i class="icon-pin-2"></i></div>
                    <div class="text">
                        <p>55 Main Street, Malborne ,Australia</p>
                    </div>
                </li>
            </ul>

            <div class="main-menu__top-right">
                <div class="main-menu__top-login-reg-box">
                    @guest
                        <a href="{{ route('login') }}">Login</a>
                        <p>or</p>
                        <a href="{{ route('register') }}">Register</a>
                    @endguest

                    @auth
                        <a href="{{ route('user.dashboard') }}">Dashboard</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__left">
                    <div class="main-menu__logo">
                        <a href="{{ route('user.dashboard') }}">
                            <img src="{{ asset('assets/images/resources/logo-1.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>

                <div class="main-menu__middle-box">
                    <ul class="main-menu__list">
                        <li>
                            <a href="{{ route('user.dashboard') }}">Home</a>
                        </li>

                        <li>
                            <a href="#">About Us</a>
                        </li>

                        <li class="dropdown">
                            <a href="#">Pages</a>
                            <ul class="shadow-box">
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Drivers</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#">Cars</a>
                            <ul class="shadow-box">
                                <li><a href="#">Cars List</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#">Shop</a>
                            <ul class="shadow-box">
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Cart</a></li>
                                <li><a href="#">Checkout</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">Blog</a>
                        </li>

                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="main-menu__right">
                    <div class="main-menu__call">
                        <div class="main-menu__call-icon">
                            <i class="icon-call-3"></i>
                        </div>
                        <div class="main-menu__call-content">
                            <p class="main-menu__call-sub-title">Call Anytime</p>
                            <h5 class="main-menu__call-number">
                                <a href="tel:23645689622">+236 (456) 896 22</a>
                            </h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</header>
