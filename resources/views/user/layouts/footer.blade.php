<!-- resources/views/user/layouts/footer.blade.php -->
<footer class="site-footer">
    <div class="site-footer__bg" style="background-image: url('{{ asset('assets/images/backgrounds/honda forza250.jpg') }}');">
    </div>
    <div class="site-footer__top">
        <div class="container">
            <div class="site-footer__top-inner">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="footer-widget__about">
                            <div class="footer-widget__about-logo">
                                <a href="index.html"><img style="width: 200px;" src="{{ asset('assets/images/shapes/logo_ridenusa_white_BTG.png') }}" alt=""></a>
                            </div>
                            <p class="footer-widget__about-text">Ride Nusa: Your Trusted Motorcycle Rental Partner.</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-6">
                        <div class="footer-widget__links">
                            <h4 class="footer-widget__title">Quick links</h4>
                            <ul class="footer-widget__links-list list-unstyled">
                                <li><a href="{{ route('welcome') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('services') }}">Our Services</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="footer-widget__contact">
                            <h3 class="footer-widget__title">Contact Us</h3>
                            <ul class="footer-widget__contact-list list-unstyled">
                                <li><span class="icon-pin"></span>Kampus Bukit, Jimbaran, South Kuta, Badung Regency, Bali</li>
                                <li><span class="icon-call"></span><a href="tel:2195550114">(219) 555-0114</a></li>
                                <li><span class="icon-envelope"></span><a href="mailto:gorent@gmail.com">Ridenusaa@gmail.com</a></li>
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
                            <p class="site-footer__copyright-text">© 2025 Ride Nusa By <a href="https://themeforest.net/user/dreamlayout">Dreamlayout.</a> All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
