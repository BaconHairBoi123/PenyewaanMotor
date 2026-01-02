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
                    <h3>Login</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Start Login One-->
        <section class="login-one">
            <div class="container">
                <div class="login-one__form">
                    <div class="inner-title text-center">
                        <h2>Login Here</h2>
                    </div>
                    <form id="login-one__form" name="Login-one_form" action="#" method="post">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="email" name="form_email" id="formEmail" placeholder="Email..."
                                            required="" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="text" name="form_password" id="formPassword"
                                            placeholder="Password..." required="" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <button class="thm-btn" type="submit" data-loading-text="Please wait...">Login Here
                                        <span class="fas fa-arrow-right"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="remember-forget">
                                <div class="checked-box1">
                                    <input type="checkbox" name="saveMyInfo" id="saveinfo" checked="">
                                    <label for="saveinfo">
                                        <span></span>
                                        Remember me
                                    </label>
                                </div>
                                <div class="forget">
                                    <a href="#">Forget password?</a>
                                </div>
                            </div>

                            <div class="create-account text-center">
                                <p>Not registered yet? <a href="sign-up.html">Create an Account</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--End Login One-->

        <!--End Login One-->
        <!--Site Footer End-->




    </div><!-- /.page-wrapper -->
@endsection