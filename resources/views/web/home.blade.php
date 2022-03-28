@extends('layouts.web')

@section('content')
    <!------ OUR SERVICES------>
    <div id="block-block-23" class="container section product-slider text-center remove-padding block block-block">

        <!-- <div class="content"> -->
        <div class="container remove-padding services-main section text-center">
            <p class="sub-title">our services</p>
            <h1 class="title">{{ config('app.name') }}</h1>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center service-item">
                <img src="{{ asset('images/web/Deliver-logo.png') }}">
                <h2>You Shop We Deliver</h2>
                <p>Now you can shop online, select all what you need from the pharmacy through our online store on web or on
                    mobile app <span id="dots">...</span><span id="more" class="d-none"> and we will deliver it to you directly from our
                        diffuse branches.<br>
                        Select products through the Shop menu or access one of the categories and then add the products to
                        the cart then follow the process.</span></p>
                <button id="myBtn">Read more</button></p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center service-item">
                <img src="{{ asset('images/web/Health-logo.png') }}">
                <h2>Health Indicator</h2>
                <p>Blood pressure, sugar, and weight… etc. results are important indicators on your health status and are
                    necessary when pursuing chronic<span id="dots">...</span><span id="more"  class="d-none"> treatment or go to a new
                        doctor or in cases of emergency or in diet programs!
                        Now you can track all your vital measurements and visualize their progress over specific time
                        periods through your profile! <br> Go to one of our branches-measure-and we will record the result
                        on your profile.
                    </span> </p>
                <button id="myBtn2">Read more</button></p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center service-item">
                <img src="{{ asset('images/web/Prescriptions-logo.png') }}">
                <h2>My Prescriptions</h2>
                <p>From now and then you will not lose a prescription again! , You can keep all your prescriptions <span
                        id="dots">...</span><span id="more"  class="d-none"> you ordered from Fouda pharmacies or through our website or
                        mobile app. with full details of all medications and dosages in your profile; This will make it
                        easier to re-order or share with your doctor or recall the dosage of the medication.<br>
                        Log in to "my profile" and click on "my prescriptions", and to view the medications of a
                        prescription click the link "view items" below it. </span></p>
                <button id="myBtn3">Read more</button></p>
            </div>
        </div>
        <!-- </div> -->
    </div>
@endsection
