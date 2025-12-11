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
                    <h3>Product Details</h3>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-left"></span></li>
                            <li>Product Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End -->

        <!--Start Product Details-->
        <section class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="product-details__left">
                            <div class="product-details__left-inner">
                                <div class="product-details__content-box">
                                    <div class="swiper-container" id="shop-details-one__carousel">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="product-details__img">
                                                    <img src="assets/images/shop/product-details-img-1.jpg" alt="">
                                                </div>
                                            </div><!-- /.swiper-slide -->
                                            <div class="swiper-slide">
                                                <div class="product-details__img">
                                                    <img src="assets/images/shop/product-details-img-2.jpg" alt="">
                                                </div>
                                            </div><!-- /.swiper-slide -->
                                            <div class="swiper-slide">
                                                <div class="product-details__img">
                                                    <img src="assets/images/shop/product-details-img-3.jpg" alt="">
                                                </div>
                                            </div><!-- /.swiper-slide -->
                                        </div>
                                    </div>
                                    <div class="product-details__nav">
                                        <div class="swiper-button-next" id="product-details__swiper-button-prev">
                                            <i class="fal fa-long-arrow-left"></i>
                                        </div>
                                        <div class="swiper-button-prev" id="product-details__swiper-button-next">
                                            <i class="fal fa-long-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details__thumb-box">
                                    <div class="swiper-container" id="shop-details-one__thumb">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="product-details__thumb-img">
                                                    <img src="assets/images/shop/product-details-thumb-img-1.jpg"
                                                        alt="">
                                                </div>
                                            </div><!-- /.swiper-slide -->
                                            <div class="swiper-slide">
                                                <div class="product-details__thumb-img">
                                                    <img src="assets/images/shop/product-details-thumb-img-2.jpg"
                                                        alt="">
                                                </div>
                                            </div><!-- /.swiper-slide -->
                                            <div class="swiper-slide">
                                                <div class="product-details__thumb-img">
                                                    <img src="assets/images/shop/product-details-thumb-img-3.jpg"
                                                        alt="">
                                                </div>
                                            </div><!-- /.swiper-slide -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-6">
                        <div class="product-details__right">
                            <div class="product-details__top">
                                <h3 class="product-details__title">
                                    Gree Air Conditioner <span>$86.00</span>
                                </h3>
                            </div>
                            <div class="product-details__reveiw">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span>55 customer reviews</span>
                            </div>
                            <div class="product-details__content">
                                <p class="product-details__content-text1">The power to be found between the pages of a
                                    book
                                    is formidable, indeed. And these 80 inspiring quotes about books and importance of
                                    reading are here to remind you of that. From beloved bestsellers to iconic
                                    celebrities,
                                    these quotes exemplify the benefits of reading and of a good books to comfort,
                                    challenge, and inspire you.</p>
                                <p class="product-details__content-text2">REF. 4231/406 <br>
                                    Available in store</p>
                            </div>
                            <div class="product-details__select">
                                <div class="product-details__select-size">
                                    <h3>Size:</h3>
                                    <ul class="list-unstyled">
                                        <li>
                                            <input type="radio" id="size1" name="rating" checked="checked">
                                            <label for="size1">
                                                <i></i>
                                                <span>XXL</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="size2" name="rating">
                                            <label for="size2">
                                                <i></i>
                                                <span>XL</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="size3" name="rating">
                                            <label for="size3">
                                                <i></i>
                                                <span>XS</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="size4" name="rating">
                                            <label for="size4">
                                                <i></i>
                                                <span>M</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="size5" name="rating">
                                            <label for="size5">
                                                <i></i>
                                                <span>L</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="size6" name="rating">
                                            <label for="size6">
                                                <i></i>
                                                <span>S</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details__inner">
                                <div class="product-details__quantity">
                                    <h3 class="product-details__quantity-title">Quantity</h3>
                                    <div class="quantity-box">
                                        <button type="button" class="sub"><i class="fa fa-minus"></i></button>
                                        <input type="number" id="1" value="1" />
                                        <button type="button" class="add"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="product-details__buttons-boxes">
                                    <div class="product-details__buttons-1">
                                        <a href="wishlist.html" class="thm-btn">Add to
                                            Wishlist <span class="fas fa-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="product-details__buttons-2">
                                        <a href="cart.html" class="thm-btn">Add to
                                            Cart <span class="fas fa-arrow-right"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details__social">
                                <div class="title">
                                    <h3>Share with friends:</h3>
                                </div>
                                <div class="product-details__social-link">
                                    <a href="#"><span class="fab fa-twitter"></span></a>
                                    <a href="#"><span class="fab fa-facebook"></span></a>
                                    <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                    <a href="#"><span class="fab fa-instagram"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Product Details-->


        <!--Shop Details Start-->
        <section class="product-description">
            <div class="container">
                <div class="product-details__description">
                    <div class="product-details__main-tab-box tabs-box">
                        <ul class="tab-buttons clearfix list-unstyled">
                            <li data-tab="#description" class="tab-btn active-btn"><span>Description</span></li>
                            <li data-tab="#additional-information" class="tab-btn"><span>Additional
                                    information</span></li>
                            <li data-tab="#reviews" class="tab-btn"><span>Reviews (1)</span></li>
                        </ul>
                        <div class="tabs-content">
                            <!--tab-->
                            <div class="tab active-tab" id="description">
                                <div class="product-details__tab-content-inner">
                                    <div class="product-details__description-content">
                                        <p class="product-details__description-text-1">I must explain to you how all
                                            this mistaken idea of denouncing pleasure and praising pain was born and
                                            I will give you a complete account of the system, and expound the actual
                                            teachings of the great explorer of the truth, the master-builder of
                                            human happiness. No one rejects, dislikes, or avoids pleasure itself,
                                            because it is pleasure, but because those who do not know how to pursue
                                            pleasure rationally encounter consequences</p>
                                        <div class="product-description__list">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <p><span class="fal fa-long-arrow-right"></span> Nam at elit nec
                                                        neque
                                                        suscipit gravida.</p>
                                                </li>
                                                <li>
                                                    <p><span class="fal fa-long-arrow-right"></span> Aenean egestas orci
                                                        eu
                                                        maximus tincidunt.</p>
                                                </li>
                                                <li>
                                                    <p><span class="fal fa-long-arrow-right"></span> Curabitur vel
                                                        turpis id
                                                        tellus cursus laoreet.
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="product-details__description-text-2">Quas molestias excepturi sint
                                            occaecati cupiditate non provident, similique sunt in culpa qui officia
                                            deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem
                                            rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta
                                            nobis est eligendi optio cumque nihil impedit quo</p>
                                    </div>
                                </div>
                            </div>
                            <!--tab-->
                            <div class="tab " id="additional-information">
                                <div class="product-details__tab-content-inner">
                                    <div class="product-details__additional-information-content">
                                        <p class="product-details__additional-information-text-1">Lorem ipsum dolor sit
                                            amet, cibo mundi ea duo, vim exerci phaedrum. There are many variations of
                                            passages of Lorem Ipsum available, but the majority have alteration in some
                                            injected or words which don't look even slightly believable. If you are
                                            going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                            anything embarrang hidden in the middle of text.</p>
                                        <p class="product-details__additional-information-text-2">Quas molestias
                                            excepturi sint occaecati cupiditate non provident, similique sunt in
                                            culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                                            fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam
                                            libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit
                                            quo</p>
                                    </div>
                                </div>
                            </div>
                            <!--tab-->
                            <div class="tab " id="reviews">
                                <div class="product-details__tab-content-inner">
                                    <!--Review One Start-->
                                    <div class="review-one">
                                        <div class="comments-area">
                                            <div class="review-one__title">
                                                <h3>2 Reviews</h3>
                                            </div>
                                            <!--Start Comment Box-->
                                            <div class="comment-box">
                                                <div class="comment">
                                                    <div class="author-thumb">
                                                        <figure class="thumb"><img
                                                                src="assets/images/shop/review-1-1.jpg" alt="">
                                                        </figure>
                                                    </div>

                                                    <div class="review-one__content">
                                                        <div class="review-one__content-top">
                                                            <div class="info">
                                                                <h2>Kevin martin <span>20 Oct, 2022 . 4:00
                                                                        pm</span></h2>
                                                            </div>
                                                            <div class="reply-btn">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>

                                                        <div class="review-one__content-bottom">
                                                            <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci
                                                                phaedrum. There are many variations of passages of Lorem
                                                                Ipsum available, but the majority have alteration in
                                                                some injected or words which don't look even slightly
                                                                believable. If you are going to use a passage of Lorem
                                                                Ipsum, you need to be sure there isn't anything
                                                                embarrang hidden in the middle of text.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Comment Box-->

                                            <!--Start Comment Box-->
                                            <div class="comment-box">
                                                <div class="comment">
                                                    <div class="author-thumb">
                                                        <figure class="thumb"><img
                                                                src="assets/images/shop/review-1-2.jpg" alt="">
                                                        </figure>
                                                    </div>

                                                    <div class="review-one__content">
                                                        <div class="review-one__content-top">
                                                            <div class="info">
                                                                <h2>Sarah albert <span>20 Oct, 2022 . 4:00
                                                                        pm</span></h2>
                                                            </div>
                                                            <div class="reply-btn">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>

                                                        <div class="review-one__content-bottom">
                                                            <p>It has survived not only five centuries, but also
                                                                the leap into electronic
                                                                typesetting unchanged. It was popularised in the
                                                                sheets containing lorem ipsum
                                                                is simply free text. Class aptent taciti
                                                                sociosqu ad litora torquent per conubia
                                                                nostra, per inceptos himenaeos. Vestibulum
                                                                sollicitudin varius mauris non
                                                                dignissim.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Comment Box-->
                                        </div>
                                    </div>
                                    <!--Review One End-->

                                    <!--Start Review Form-->
                                    <div class="review-form-one">
                                        <div class="review-form-one__inner">
                                            <h3 class="review-form-one__title">Add a review</h3>
                                            <div class="review-form-one__rate-box">
                                                <p class="review-form-one__rate-text">Rate this product?</p>
                                                <div class="review-form-one__rate">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <form action="assets/inc/sendemail.php"
                                                class="review-form-one__form contact-form-validated"
                                                novalidate="novalidate">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="review-form-one__input-box text-message-box">
                                                            <textarea name="message"
                                                                placeholder="Write a comment"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6">
                                                        <div class="review-form-one__input-box">
                                                            <input type="text" placeholder="Your name" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6">
                                                        <div class="review-form-one__input-box">
                                                            <input type="email" placeholder="Email address"
                                                                name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <button type="submit"
                                                            class="thm-btn review-form-one__btn">Submit a review <span
                                                                class="fas fa-arrow-right"></span></button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="result"></div>
                                        </div>
                                    </div>
                                    <!--End Review Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Shop Details End-->

        <!-- Start Related Products -->
        <section class="related-products">
            <div class="container">
                <div class="related-products__title">
                    <h3>Related Products</h3>
                    <p>Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                </div>
                <div class="row">
                    <div class="related-products__carousel owl-carousel owl-theme owl-dot-style1">
                        <!--Product All Single Start-->
                        <div class="single-product-style1 instyle--2">
                            <div class="single-product-style1__img">
                                <img src="assets/images/shop/shop-product-1-1.jpg" alt="">
                                <img src="assets/images/shop/shop-product-1-1.jpg" alt="">
                                <ul class="single-product-style1__overlay">
                                    <li>
                                        <p>New</p>
                                    </li>
                                </ul>
                                <ul class="single-product-style1__info">
                                    <li>
                                        <a href="#" title="Add to Wishlist">
                                            <i class="fa fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to cart">
                                            <i class="fa fa-solid fa-cart-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Quick View">
                                            <i class="fa fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Compare">
                                            <i class="fa fa-solid fa-repeat"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-product-style1__content">
                                <div class="single-product-style1__content-left">
                                    <h4>
                                        <a href="product-details.html">
                                            Gree Air Conditioner
                                        </a>
                                    </h4>
                                    <p>$33.00</p>
                                </div>
                                <div class="single-product-style1__content-right">
                                    <div class="single-product-style1__review">
                                        <i class="fa fa-star"></i>
                                        <p>4.9</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Product All Single End-->
                        <!--Product All Single Start-->
                        <div class="single-product-style1 instyle--2">
                            <div class="single-product-style1__img">
                                <img src="assets/images/shop/shop-product-1-2.jpg" alt="">
                                <img src="assets/images/shop/shop-product-1-2.jpg" alt="">
                                <ul class="single-product-style1__info">
                                    <li>
                                        <a href="#" title="Add to Wishlist">
                                            <i class="fa fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to cart">
                                            <i class="fa fa-solid fa-cart-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Quick View">
                                            <i class="fa fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Compare">
                                            <i class="fa fa-solid fa-repeat"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-product-style1__content">
                                <div class="single-product-style1__content-left">
                                    <h4>
                                        <a href="product-details.html">
                                            Pliers | Cutting, Gripping
                                        </a>
                                    </h4>
                                    <p>$50.00</p>
                                </div>
                                <div class="single-product-style1__content-right">
                                    <div class="single-product-style1__review">
                                        <i class="fa fa-star"></i>
                                        <p>5.0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Product All Single End-->
                        <!--Product All Single Start-->
                        <div class="single-product-style1 instyle--2">
                            <div class="single-product-style1__img">
                                <img src="assets/images/shop/shop-product-1-3.jpg" alt="">
                                <img src="assets/images/shop/shop-product-1-3.jpg" alt="">
                                <ul class="single-product-style1__overlay">
                                    <li>
                                        <p>5% Off</p>
                                    </li>
                                </ul>
                                <ul class="single-product-style1__info">
                                    <li>
                                        <a href="#" title="Add to Wishlist">
                                            <i class="fa fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to cart">
                                            <i class="fa fa-solid fa-cart-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Quick View">
                                            <i class="fa fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Compare">
                                            <i class="fa fa-solid fa-repeat"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-product-style1__content">
                                <div class="single-product-style1__content-left">
                                    <h4>
                                        <a href="product-details.html">
                                            Gear and wrench
                                        </a>
                                    </h4>
                                    <p><del>$33.00</del> $28.00</p>
                                </div>
                                <div class="single-product-style1__content-right">
                                    <div class="single-product-style1__review">
                                        <i class="fa fa-star"></i>
                                        <p>4.5</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Product All Single End-->
                        <!--Product All Single Start-->
                        <div class="single-product-style1 instyle--2">
                            <div class="single-product-style1__img">
                                <img src="assets/images/shop/shop-product-1-4.jpg" alt="">
                                <img src="assets/images/shop/shop-product-1-4.jpg" alt="">
                                <ul class="single-product-style1__info">
                                    <li>
                                        <a href="#" title="Add to Wishlist">
                                            <i class="fa fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to cart">
                                            <i class="fa fa-solid fa-cart-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Quick View">
                                            <i class="fa fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Compare">
                                            <i class="fa fa-solid fa-repeat"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-product-style1__content">
                                <div class="single-product-style1__content-left">
                                    <h4>
                                        <a href="product-details.html">
                                            Nut Driver
                                        </a>
                                    </h4>
                                    <p>$40.00</p>
                                </div>
                                <div class="single-product-style1__content-right">
                                    <div class="single-product-style1__review">
                                        <i class="fa fa-star"></i>
                                        <p>4.8</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Product All Single End-->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Related Products -->

        <!--Gallery One Start -->
        <section class="gallery-one">
            <div class="gallery-one__carousel owl-theme owl-carousel">
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-1.jpg" alt="">
                            <a href="cars.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-2.jpg" alt="">
                            <a href="cars.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-3.jpg" alt="">
                            <a href="cart.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-4.jpg" alt="">
                            <a href="cart.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-5.jpg" alt="">
                            <a href="cart.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-6.jpg" alt="">
                            <a href="cart.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
            </div>
        </section>
        <!--Gallery One End -->

        <!--Site Footer Start-->
        <footer class="site-footer">
            <div class="site-footer__bg" style="background-image: url('{{ asset('assets/images/backgrounds/site-footer-bg.jpg') }}');">
            </div>
            <div class="site-footer__top">
                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__about">
                                    <div class="footer-widget__about-logo">
                                        <a href="index.html"><img src="assets/images/resources/footer-logo.png"
                                                alt=""></a>
                                    </div>
                                    <p class="footer-widget__about-text">Car Is Where Early Adopters And Innovation
                                        Seekers Find Lively
                                        Imaginative Tech.</p>
                                    <form class="footer-widget__form">
                                        <div class="footer-widget__input">
                                            <input type="email" placeholder="Your Email">
                                        </div>
                                        <button type="submit" class="footer-widget__btn"><i
                                                class="icon-right-arrow"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                <div class="footer-widget__links">
                                    <h4 class="footer-widget__title">Quick links</h4>
                                    <ul class="footer-widget__links-list list-unstyled">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">Our Services</a></li>
                                        <li><a href="drivers.html">Our Drivers</a></li>
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                                <div class="footer-widget__services">
                                    <h4 class="footer-widget__title">Services</h4>
                                    <ul class="footer-widget__links-list list-unstyled">
                                        <li><a href="car-list-v-1.html">Your Reliable Ride</a></li>
                                        <li><a href="car-list-v-2.html">Express Shuttle</a></li>
                                        <li><a href="car-list-v-3.html">Travel in Style</a></li>
                                        <li><a href="cars.html">Rental List</a></li>
                                        <li><a href="listing-single.html">Dash Transport</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                                <div class="footer-widget__contact">
                                    <h3 class="footer-widget__title">Contact Us</h3>
                                    <ul class="footer-widget__contact-list list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-pin"></span>
                                            </div>
                                            <p>4140 Parker Rd. Allentown, New
                                                <br> Mexico 31134</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-call"></span>
                                            </div>
                                            <p><a href="tel:2195550114">(219) 555-0114</a></p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-envelope"></span>
                                            </div>
                                            <p><a href="mailto:gorent@gmail.com">gorent@gmail.com</a></p>
                                        </li>
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
                                    <p class="site-footer__copyright-text">© 2025 Gorent By <a
                                            href="https://themeforest.net/user/dreamlayout">Dreamlayout.</a> All
                                        Rights
                                        Reserved.</p>
                                </div>
                                <div class="site-footer__bottom-menu-box">
                                    <ul class="list-unstyled site-footer__bottom-menu">
                                        <li><a href="about.html">Terms of Service</a></li>
                                        <li><a href="about.html">Privacy policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->




    </div><!-- /.page-wrapper -->

@endsection