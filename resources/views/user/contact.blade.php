@extends('user.layouts.app')

@section('content')
    <!-- Custom Styles for this Page -->
    <!-- Custom Styles for this Page -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom-contact.css') }}">


    <!--Page Header Start -->
    <section class="page-header">
        <div class="page-header__bg"
            style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg.jpg') }}');">
        </div>
        <div class="page-header__shape-1"
            style="background-image: url('{{ asset('assets/images/shapes/page-header-shape-1.png') }}');"></div>
        <div class="container">
            <div class="page-header__inner">
                <h3>Get in Touch</h3>
                <div class="thm-breadcrumb__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li><span class="icon-arrow-left"></span></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End -->

    <!-- Innovative Cards Section -->
    <section style="background: #f8f9fa;">
        <div class="container">
            <div class="innovation-grid">
                <!-- Card 1: WhatsApp (New Requirement) -->
                <div class="innovation-card whatsapp-card"
                    onclick="window.open('https://wa.me/6281234567890', '_blank')">
                    <div class="card-icon-wrapper">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h4 class="card-title">WhatsApp Us</h4>
                    <p class="card-info">Fastest response time.</p>
                    <div class="card-action">
                        <span style="color: #25D366; font-weight: bold;">Chat Now &rarr;</span>
                    </div>
                </div>

                <!-- Card 2: Call -->
                <div class="innovation-card call-card" onclick="window.location.href='tel:+558270575405'">
                    <div class="card-icon-wrapper">
                        <span class="icon-call"></span>
                    </div>
                    <h4 class="card-title">Call Us</h4>
                    <p class="card-info">+55 827 057 5405</p>
                    <div class="card-action">
                        <span style="color: var(--ride-orange); font-weight: bold;">Call Now &rarr;</span>
                    </div>
                </div>

                <!-- Card 3: Location -->
                <div class="innovation-card location-card" onclick="window.location.href='#map-section'">
                    <div class="card-icon-wrapper">
                        <span class="icon-location"></span>
                    </div>
                    <h4 class="card-title">Location</h4>
                    <p class="card-info">12 Green Road, Bali</p>
                    <div class="card-action">
                        <span style="color: var(--ride-green); font-weight: bold;">View Map &rarr;</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Split Section (Image + Form) -->
    <section class="split-section">
        <div class="container">
            <div class="split-container">
                <!-- Left: Placeholder Image -->
                <div class="split-image-box">
                    <!-- Placeholder URL as requested for user to replace -->
                    <img src="https://placehold.co/800x1000?text=Custom+Contact+Image" alt="Contact Visual">
                    <div class="image-overlay">
                        <h5>We're here for you</h5>
                        <p>Visit our office for a coffee and a chat about your next adventure.</p>
                    </div>
                </div>

                <!-- Right: Glass Form -->
                <div class="glass-form-box">
                    <div class="glass-header">
                        <p style="font-weight: 600; text-transform: uppercase;">Send a Message</p>
                        <h3>Ready to Ride?</h3>
                        <p style="color: #777; margin-bottom: 30px;">Fill out the form below and our team will get back to
                            you within hours.</p>
                    </div>

                    <form id="contact-form" class="custom-glass-form" action="assets/mail.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" class="custom-input" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="phone" class="custom-input" placeholder="Phone / WhatsApp"
                                    required>
                            </div>
                            <div class="col-12">
                                <input type="email" name="email" class="custom-input" placeholder="Email Address"
                                    required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="custom-input" rows="5" placeholder="Tell us what you need..."></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="send-btn-creative">
                                    Send Message <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="ajax-response mb-0 mt-3"></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section id="map-section" style="height: 400px; width: 100%; margin-bottom: -10px;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15777.067307040443!2d115.17078860000001!3d-8.66752715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240971e4063c5%3A0x5a1835359dd3058f!2sSeminyak%2C%20Badung%20Regency%2C%20Bali!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
            width="100%" height="100%" style="border:0; filter: grayscale(100%) invert(90%);" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>
@endsection