<div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div>

<!--Start Preloader-->
<div class="loader js-preloader">
    <div></div>
    <div></div>
    <div></div>
</div>
<!--End Preloader-->







<!-- Start sidebar widget content -->
<div class="xs-sidebar-group info-group info-sidebar">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">X</a>
            </div>
            <div class="sidebar-textwidget">
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img
                                    src="{{ asset('assets/images/resources/logo_ridenusa_head.png') }}" alt=""
                                    style="width: 200px;" /></a>
                        </div>
                        <div class="content-box">
                            <h4>About Us</h4>
                            <div class="inner-text">
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                    roots in a piece of classical Latin literature from 45 BC, making it over
                                    2000 years old.
                                </p>
                            </div>
                        </div>

                        <div class="form-inner">
                            <h4>Get a free quote</h4>
                            <form action="index.html" method="post">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Message..."></textarea>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="thm-btn form-inner__btn">Submit Now</button>
                                </div>
                            </form>
                        </div>

                        <div class="sidebar-contact-info">
                            <h4>Contact Info</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <span class="icon-pin"></span> 88 broklyn street, New York
                                </li>
                                <li>
                                    <span class="icon-call"></span>
                                    <a href="tel:123456789">+1 555-9990-153</a>
                                </li>
                                <li>
                                    <span class="icon-envelope"></span>
                                    <a href="mailto:info@example.com">info@example.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="thm-social-link1">
                            <ul class="social-box list-unstyled">
                                <li>
                                    <a href="#"><i class="icon-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-dribble-big-logo" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End sidebar widget content -->






<div class="page-wrapper">
    <header class="main-header">
        @include('user.layouts.topbar')
        <nav class="main-menu">
            <div class="main-menu__wrapper">
                <div class="main-menu__wrapper-inner">
                    <div class="main-menu__left">
                        <div class="main-menu__logo">
                            <a href="{{ url('/home') }}"><img src="{{ asset('assets/images/resources/logo_ridenusa_head.png') }}" alt=""style="width: 90px;"></a>
                        </div>
                    </div>
                    <div class="main-menu__middle-box">
                        <div class="main-menu__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li>
                                    <a href="{{ route('welcome') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('faq') }}">FAQ</a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}">Services</a>
                                </li>
                                <li>
                                    <a href="{{ route('motorcycles.index') }}">Motorcycles</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                                <li>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                        @csrf
                                    </form>
                                </li>     
                            </ul>
                        </div>
                    </div>
                    <div class="main-menu__right">
                        <div class="main-menu__right"> <a href="#" id="cart-drawer-toggle" style="display: flex; align-items: center;">
                        <i class="ri-shopping-cart-2-fill" style="font-size: 30px;"></i></a></div>
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

    <!-- Cart Drawer -->
    <div id="cart-drawer" style="position: fixed; top: 0; right: -400px; width: 400px; height: 100vh; background: #fff; box-shadow: -2px 0 5px rgba(0,0,0,0.1); z-index: 9999; transition: 0.3s; display: flex; flex-direction: column;">
        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
            <h4 class="m-0">Your Rentals</h4>
            <button id="close-cart-drawer" class="btn btn-sm btn-light">&times;</button>
        </div>
        <div class="p-3 flex-grow-1" style="overflow-y: auto;" id="cart-drawer-content">
            <div class="text-center mt-5"><div class="spinner-border text-primary" role="status"></div></div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const drawer = document.getElementById('cart-drawer');
        const toggle = document.getElementById('cart-drawer-toggle');
        const close = document.getElementById('close-cart-drawer');
        const content = document.getElementById('cart-drawer-content');

        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            drawer.style.right = '0';
            loadHistory();
        });

        close.addEventListener('click', function() {
            drawer.style.right = '-400px';
        });

        function loadHistory() {
            fetch("{{ route('booking.history') }}")
                .then(response => response.json())
                .then(data => {
                    content.innerHTML = data.html;
                })
                .catch(err => {
                    content.innerHTML = '<p class="text-danger text-center">Failed to load history.</p>';
                });
        }
        
        // Expose for global use
        window.paySnap = function(token) {
             window.snap.pay(token, {
                onSuccess: function(result){ alert("Payment success!"); location.reload(); },
                onPending: function(result){ alert("Waiting for payment!"); console.log(result); },
                onError: function(result){ alert("Payment failed!"); console.log(result); },
                onClose: function(){ console.log('customer closed the popup without finishing the payment'); }
            });
        }
    });
    </script>

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    <!--Mobile Nav-->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{ url('/') }}" aria-label="logo image"><img
                        src="{{ asset('assets/images/resources/logo_ridenusa_head.png') }}" width="140"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@gorent.com</a>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>
