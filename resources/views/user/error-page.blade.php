@extends('user.layouts.app') 

@section('content')

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
                            <a href="/home" class="thm-btn">Back To Home <span class="fas fa-arrow-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Error Page-->
