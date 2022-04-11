@extends('layouts.web')

@section('content')











    <!---------------------- Header ----------------------------->
    <div class="header owl-carousel owl-theme">
        <div class="slide slide-1">
            <div class="slide-content">
            </div>
        </div>
        <div class="slide slide-2">
            <div class="slide-content">
            </div>
        </div>
        <div class="slide slide-3">
            <div class="slide-content">
            </div>
        </div>
    </div>











    <!---------------------- OUR SERVICES ----------------------------->
    <div id="block-block-23" class="container section product-slider text-center remove-padding block block-block">

        <!-- <div class="content"> -->
        <div class="container services-main text-center">
            <p class="sub-title">our services</p>
            <h1 class="title text-bloder">{{ config('app.name') }}</h1>
            <div class="row">
                <div class="col-md-4 text-center service-item">
                    <img src="{{ asset('images/web/Deliver-logo.png') }}">
                    <h2>You Shop We Deliver</h2>
                    <p>Now you can shop online, select all what you need from the pharmacy through our online store on web
                        or on
                        mobile app <span id="dots">...</span><span id="more" class="d-none"> and we will deliver it
                            to
                            you directly from our
                            diffuse branches.<br>
                            Select products through the Shop menu or access one of the categories and then add the products
                            to
                            the cart then follow the process.</span></p>
                    <button id="myBtn">Read more</button></p>
                </div>
                <div class="col-md-4 text-center service-item">
                    <img src="{{ asset('images/web/Health-logo.png') }}">
                    <h2>Health Indicator</h2>
                    <p>Blood pressure, sugar, and weight… etc. results are important indicators on your health status and
                        are
                        necessary when pursuing chronic<span id="dots">...</span><span id="more" class="d-none">
                            treatment or go to a new
                            doctor or in cases of emergency or in diet programs!
                            Now you can track all your vital measurements and visualize their progress over specific time
                            periods through your profile! <br> Go to one of our branches-measure-and we will record the
                            result
                            on your profile.
                        </span> </p>
                    <button id="myBtn2">Read more</button></p>
                </div>
                <div class="col-md-4 text-center service-item">
                    <img src="{{ asset('images/web/Prescriptions-logo.png') }}">
                    <h2>My Prescriptions</h2>
                    <p>From now and then you will not lose a prescription again! , You can keep all your prescriptions <span
                            id="dots">...</span><span id="more" class="d-none"> you ordered from Fouda pharmacies or
                            through our website or
                            mobile app. with full details of all medications and dosages in your profile; This will make it
                            easier to re-order or share with your doctor or recall the dosage of the medication.<br>
                            Log in to "my profile" and click on "my prescriptions", and to view the medications of a
                            prescription click the link "view items" below it. </span></p>
                    <button id="myBtn3">Read more</button></p>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>








    <!---------------------- OUR CATEGORIES ----------------------------->
    <div id="block-block-22" class="container section product-slider text-center remove-padding block block-block">


        <!-- <div class="content"> -->
        <div class="container text-center">
            <p class="sub-title">Browse products by</p>
            <h1 class="title text-bloder">OUR CATEGORIES</h1>
            <div class="categories-main">
                <div class="categories-child">
                    <a href="fp/taxonomy/term/18671.html" class="child-1">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/medications.jpg') }}" class="g-bg">
                            <p>Medications</p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>
                <div class="categories-child">
                    <a href="fp/taxonomy/term/18672.html" class="child-10">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/supplements.jpg') }}" class="g-bg">
                            <p>Supplements / Vitamines</p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>

                <div class="categories-child">
                    <a href="fp/taxonomy/term/18675.html" class="child-3">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/skin-care.jpg') }}" class="g-bg">
                            <p>Skin Care</p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>

                <div class="categories-child">
                    <a href="fp/taxonomy/term/18676.html" class="child-4">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/hair-care.jpg') }}" class="g-bg">
                            <p>Hair Care</p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>

                <div class="categories-child">
                    <a href="fp/taxonomy/term/18674.html" class="child-5">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/beauty.jpg') }}" class="g-bg">
                            <p>Beauty</p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>

                <div class="categories-child">
                    <a href="fp/taxonomy/term/18677.html" class="child-9">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/body-personal-care.jpg') }}"
                                class="g-bg">
                            <p>Body / Personal Care</p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>

                <div class="categories-child">
                    <a href="fp/taxonomy/term/18679.html" class="child-6">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/perfumes.jpg') }}" class="g-bg">
                            <p>Perfumes </p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>

                <div class="categories-child">
                    <a href="fp/taxonomy/term/18678.html" class="child-7">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/mother-baby-care.jpg') }}" class="g-bg">
                            <p>Mother / Baby Care</p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>

                <div class="categories-child">
                    <a href="fp/taxonomy/term/18673.html" class="child-2">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/medical-supplies.jpg') }}" class="g-bg">
                            <p>Medical Supplies</p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>

                <div class="categories-child">
                    <a href="fp/taxonomy/term/18680.html" class="child-8">
                        <div class="category-main">
                            <img src="{{ asset('images/web/category-bg/general-hygiene.jpg') }}" class="g-bg">
                            <p>General Use</p><span class="v-g">Browse Products </span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>












    <!---------------------- ORDER YOUR ----------------------------->
    <div id="block-block-24" class="container-fluid remove-padding order-you-main block block-block">

        <img src="{{ asset('images/web/banner-2.jpg') }}">
        <div class="container text-center">
            <p>ORDER YOUR</p>
            <h1>PRESCRIPTION</h1>
            <h2>Now you can upload your prescription in here and it will<br> be translated items in your cart</h2>
            <a href="node/430435.html"><span>Order Now </span></a>
        </div>

    </div>











    <!---------------------- Latest Offers ----------------------------->
    <div class="container section product-slider text-center  remove-padding block block-views pt-4 pb-4">
        <p class="sub-title">DON'T MISS OUR</p>
        <h1 class="title text-bloder">Latest Offers</h1>


        <div class="container">
            <div class="row">
                <div class="product-container owl-carousel">


                    <!------------ Product Items ------------->
                    <div class="col-xs-12">
                        <div class="col-xs-12 remove-padding product-item">
                            <a href="/palmolive" class="item-img" tabindex="0">
                                <img  
                                    src="{{ asset('images/products/product.png') }}"
                                    width="220" height="220" alt="">
                                <span class="off-span">UP TO 70 %</span>
                            </a>
                            <p>Mup (Medical Union Pharma)</p>
                            <a href="/palmolive" tabindex="0">PALMOLIVE </a>
                            <h5>14 tab</h5>
                            <h3>105.00 <i class="fa-solid fa-dollar-sign"></i> <span class="uc-price">150.00 <i class="fa-solid fa-dollar-sign"></i></span> </h3>
                            <div class="col-xs-12 add-cart-main text-center">
                                <button href="#" > <i class="fa-solid fa-cart-shopping"></i> Cart </button>
                                &nbsp;
                                &nbsp;
                                <button href="#" > <i class="fa-solid fa-heart"></i> Wishlist </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <a href="/" class="all-btn mt-5">view all</a>





    </div>







@endsection
