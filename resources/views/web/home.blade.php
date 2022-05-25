@extends('layouts.web')

@section('content')
    <div id="home-page">


        
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
                <h4 class="title text-bloder">{{ config('app.name') }}</h1>
                <div class="row">
                    <div class="col-md-4 text-center service-item">
                        <img src="{{ asset('images/web/Deliver-logo.png') }}">
                        <h2>You Shop We Deliver</h2>
                        <p>Now you can shop online, select all what you need from the pharmacy through our online store on
                            web
                            or on
                            mobile app <span id="dots">...</span><span id="more" class="d-none"> and we will deliver
                                it
                                to
                                you directly from our
                                diffuse branches.<br>
                                Select products through the Shop menu or access one of the categories and then add the
                                products
                                to
                                the cart then follow the process.</span></p>
                        <button id="myBtn">Read more</button></p>
                    </div>
                    <div class="col-md-4 text-center service-item">
                        <img src="{{ asset('images/web/Health-logo.png') }}">
                        <h2>Health Indicator</h2>
                        <p>Blood pressure, sugar, and weight… etc. results are important indicators on your health status
                            and
                            are
                            necessary when pursuing chronic<span id="dots">...</span><span id="more" class="d-none">
                                treatment or go to a new
                                doctor or in cases of emergency or in diet programs!
                                Now you can track all your vital measurements and visualize their progress over specific
                                time
                                periods through your profile! <br> Go to one of our branches-measure-and we will record the
                                result
                                on your profile.
                            </span> </p>
                        <button id="myBtn2">Read more</button></p>
                    </div>
                    <div class="col-md-4 text-center service-item">
                        <img src="{{ asset('images/web/Prescriptions-logo.png') }}">
                        <h2>My Prescriptions</h2>
                        <p>From now and then you will not lose a prescription again! , You can keep all your prescriptions
                            <span id="dots">...</span><span id="more" class="d-none"> you ordered from Fouda
                                pharmacies or
                                through our website or
                                mobile app. with full details of all medications and dosages in your profile; This will make
                                it
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
        @if (!$categories->isEmpty())
            <div id="block-block-22" class="container section product-slider text-center remove-padding block block-block">
                <!-- <div class="content"> -->
                <div class="container text-center">
                    <p class="sub-title">Browse products by</p>
                    <h4 class="title text-bloder">OUR CATEGORIES</h1>
                    <div class="categories-main">
                        @foreach ( $categories as $key => $category )
                            <div class="categories-child">
                                @if ( !$category->subcategories->isEmpty() )
                                    <a href="{{ route("category", [ $category->slug , $category->subcategories[0]->slug ] ) }}" class="child-{{ $key + 1 }}">
                                        <div class="category-main">
                                            <img src="{{ asset('images/categories/'.$category->img) }}" class="g-bg">
                                            <p>{{ $category->title }}</p><span class="v-g">Browse Products </span>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif









        <!---------------------- ORDER YOUR ----------------------------->
        <div id="block-block-24" class="container-fluid remove-padding order-you-main block block-block">

            <img src="{{ asset('images/web/banner-2.jpg') }}">
            <div class="container text-center">
                <p>ORDER YOUR</p>
                <h1>PRESCRIPTION</h1>
                <h2>Now you can upload your prescription in here and it will<br> be translated items in your cart</h2>
                @auth
                    <a href="{{ route('order_prescription') }}"> <span>Order Now </span> </a>
                @else
                    <a href="#" data-toggle="modal" data-target="#login"><span>Order Now </span></a>
                @endauth
            </div>

        </div>










        <!---------------------- Latest Offers ----------------------------->
        @if (!$lastedOffers->isEmpty())
            <div class="container section product-slider text-center  remove-padding block block-views pt-4 pb-4">
                <p class="sub-title">DON'T MISS OUR</p>
                <h4 class="title text-bloder">Latest Offers</h1>
                <div class="container">
                    <div class="row">
                        <div class="product-container owl-carousel">

                            <!------------ Product Items ------------->
                            @foreach ( $lastedOffers as $product )
                                <div class="col-xs-12">
                                    <div class="col-xs-12 remove-padding product-item">
                                        <a href="{{ route("product", $product->slug ) }}" class="item-img" tabindex="0">
                                            <img src="{{ asset('images/products/'.$product->img) }}" width="220" height="220"
                                                alt="">
                                            <span class="off-span">UP TO {{ $product->offer_percentage }} %</span>
                                        </a>
                                        <div class="product-txt-container"> <p> {{ $product->brand }} </p></div>
                                        <div class="product-txt-container"><a href="{{ route("product", $product->slug ) }}" tabindex="0">  {{ $product->title }}  </a></div>
                                        <div class="product-txt-container"> <p> {{ $product->measurement }} </p></div>
                                        <div class="price">
                                            {{ $product->final_price }}$ 
                                            <span class="uc-price"> {{ $product->price }}$</span> 
                                        </div>
                                        <div class="col-xs-12 add-cart-main text-center">
                                            <button href="#" product_id="{{ $product->id }}"> <i class="fa-solid fa-cart-shopping"></i> Cart </button>
                                            &nbsp;
                                            &nbsp;
                                            <button href="#" product_id="{{ $product->id }}"> <i class="fa-solid fa-heart"></i> Wishlist </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <a href="{{ route("offered_products") }}" class="all-btn mt-5">view all</a>

                </div>
            </div>
        @endif













    </div>
@endsection
