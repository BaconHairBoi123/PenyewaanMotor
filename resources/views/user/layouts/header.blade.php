<div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div>

<!--Start Preloader-->
<div class="loader js-preloader">
    <div></div>
    <div></div>
    <div></div>
</div>
<!--End Preloader-->

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
                        <div class="main-menu__right"> <a href="#" class="cart-drawer-toggler" style="display: flex; align-items: center;">
                        <i class="ri-shopping-cart-2-fill" style="font-size: 30px;"></i></a></div>

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

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const drawer = document.getElementById('cart-drawer');
        const togglers = document.querySelectorAll('.cart-drawer-toggler');
        const close = document.getElementById('close-cart-drawer');
        const content = document.getElementById('cart-drawer-content');

        togglers.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                drawer.style.right = '0';
                loadHistory();
            });
        });

        close.addEventListener('click', function() {
            drawer.style.right = '-400px';
        });

        function loadHistory() {
            fetch("{{ route('booking.history') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText + ' (' + response.status + ')');
                    }
                    return response.json();
                })
                .then(data => {
                    content.innerHTML = data.html;
                })
                .catch(err => {
                    console.error('Failed to load history:', err);
                    content.innerHTML = '<p class="text-danger text-center">Failed to load history. <br><small>Check console for details.</small></p>';
                });
        }
        
        // Expose for global use
        window.paySnap = function(token) {
             window.snap.pay(token, {
                onSuccess: function(result){
                    // Optimistically notify server that client completed payment, then reload
                    fetch("{{ route('payment.client_confirm') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            order_id: result.order_id || result.orderId || null,
                            transaction_status: result.transaction_status || result.transactionStatus || 'success'
                        })
                    }).finally(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Payment Successful!',
                            text: 'Your payment has been processed successfully.',
                            confirmButtonColor: '#28a745',
                            timer: 2000,
                            timerProgressBar: true
                        }).then(() => {
                            location.reload();
                        });
                    });
                },
                onPending: function(result){ 
                    Swal.fire({
                        icon: 'info',
                        title: 'Payment Pending',
                        text: 'Your payment is being processed. Please wait for confirmation.',
                        confirmButtonColor: '#007bff'
                    });
                    console.log(result); 
                },
                onError: function(result){ 
                    Swal.fire({
                        icon: 'error',
                        title: 'Payment Failed',
                        text: 'An error occurred during payment processing. Please try again.',
                        confirmButtonColor: '#d33'
                    });
                    console.log(result); 
                },
                onClose: function(){ console.log('customer closed the popup without finishing the payment'); }
            });
        }

        window.cancelBooking = function(orderId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to cancel this order? You can rent another motorcycle immediately after cancellation.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('booking.cancel') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            order_id: orderId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message && (data.message.includes('successfully') || data.message.includes('success'))) {
                            Swal.fire(
                                'Canceled!',
                                'Your order has been canceled.',
                                'success'
                            ).then(() => {
                                loadHistory(); // Reload the drawer content
                                // Optionally reload page if needed, but loadHistory should suffice for the drawer
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                data.message || 'Failed to cancel order.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                         Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                    });
                }
            })
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
