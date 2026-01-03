@extends('user.layouts.app') 

@section('content')


        <!--Page Header Start -->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url('{{ asset('assets/images/backgrounds/harley.jpg') }}');">
            </div>
            <div class="page-header__shape-1"
                style="background-image: url('{{ asset('assets/images/backgrounds/') }}');"></div>
            <div class="container">
                <div class="page-header__inner">
                    <h3>Our Faq</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>Faq</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Faq Page Start -->
        <div class="faq-one faq-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="faq-page__left">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>What requirements are needed to rent a motorcycle?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>You must hold a valid driver's license (SIM C for Indonesian citizens or a valid International Driving Permit for tourists) and a valid ID card (KTP) or Passport.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Do you offer delivery and pickup services?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we offer delivery and pickup services. Free delivery is available for specific zones (e.g., Kuta, Seminyak, Canggu). For other areas, a small delivery fee based on distance will apply.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What is included in the rental price?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>The rental price includes 2 SNI-standard helmets and 1 raincoat. Fuel is not included and the motorcycle should be returned with the same fuel level as when rented.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Can I rent a motorcycle without a license?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>No. For your safety and compliance with Indonesian traffic laws, we strictly require all riders to possess a valid motorcycle license. However, we offer riding courses if you wish to learn.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="faq-page__right">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What do I do in case of an accident or breakdown?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Please contact our support team immediately via WhatsApp or phone. We provide roadside assistance. If the breakdown is due to mechanical failure, we will provide a replacement bike. Damage caused by accidents is the renter's responsibility.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Can I take the motorcycle outside of Bali?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Our motorcycles are generally intended for use within Bali island only. If you plan to travel to neighboring islands (like Lombok or Nusa Penida), please inform us in advance as specific authorization is required.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What payment methods do you accept?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>We accept secure online payments via Midtrans (Credit Card, GoPay, Bank Transfer/Virtual Account) as well as cash payments for walk-in rentals.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Are there late return penalties?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, late returns may incur an hourly charge. If you exceed a certain number of hours, you may be charged for an additional full day rental.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Faq Page End -->

        




    </div><!-- /.page-wrapper -->

@endsection