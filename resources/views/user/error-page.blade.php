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
                    <h3>
                        404 Error</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>
                                404 Error</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Start Error Page-->
        <section class="error-page">
            <div class="container">
                <div class="error-page__inner text-center">
                    <div class="error-page__img float-bob-y">
                        <img src="assets/images/resources/error-page-img1.png" alt="">
                    </div>

                    <div class="error-page__content">
                        <h2>Oops! Page Not Found!</h2>
                        <p>The page you are looking for does not exist. It might have been moved or deleted.</p>
                        <div class="btn-box">
                            <a href="index.html" class="thm-btn">Back To Home <span class="fas fa-arrow-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Error Page-->


        @endsection