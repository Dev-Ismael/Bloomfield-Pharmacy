@extends('layouts.web')

@section('content')
    <div id="profile-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-id-card"></i> My Profile </h1>
            

            <div class="container rounded bg-white mt-5">
                <div class="row">
                    <div class="col-md-4 user-img mb-5">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img src="{{ asset("images/web/user-img.jpg") }}" class="user-img" alt="user-img">
                            <span class="font-weight-bold mt-3">John Doe</span>
                            <span class="text-black-50">john_doe2022@bbb.com</span>
                            <span>United States</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    <a href="{{ route("home") }}" class="text-dark"><h4>Back to home</h4></a>
                                </div>
                                <h4 class="text-right"> <i class="fa-solid fa-pen-to-square"></i> Edit Profile</h4>
                            </div>
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <label for="firstName" class="text-black"> <i class="fa-solid fa-file-signature"></i> First Name</label>
                                        <input type="text" class="form-control" id="firstName"  placeholder="Type First Name...">
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <label for="lastName" class="text-black"> <i class="fa-solid fa-file-signature"></i> Last Name</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="Type Last Name...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <label for="lastName" class="text-black"> <i class="fa-solid fa-phone-volume"></i> Phone </label>
                                        <input type="text" class="form-control" id="lastName" placeholder="Type Phone Number...">
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <label for="lastName" class="text-black"> <i class="fa-solid fa-phone-volume"></i> Second Phone (optional) </label>
                                        <input type="text" class="form-control" id="lastName" placeholder="Type Phone Number...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <label for="email2" class="text-black"> <i class="fa-solid fa-envelope"></i> Second Email (optional) </label>
                                        <input type="text" class="form-control" id="email2"  placeholder="Type Email Address...">
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <label for="state" class="text-black"> <i class="fa-solid fa-flag-usa"></i> State/Region </label>
                                        <input type="text" class="form-control" id="state"  placeholder="Type State/Region...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group text-left">
                                        <label for="address" class="text-black"> <i class="fa-solid fa-location-dot"></i> Address </label>
                                        <input type="text" class="form-control" id="address" placeholder="Type Address Details...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group text-left">
                                        <label for="address2" class="text-black"> <i class="fa-solid fa-location-dot"></i> Second Address (optional) </label>
                                        <input type="text" class="form-control" id="address2" placeholder="Type Address Details...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group text-left">
                                        <label for="address3" class="text-black"> <i class="fa-solid fa-location-dot"></i> Third Address (optional) </label>
                                        <input type="text" class="form-control" id="address3" placeholder="Type Address Details...">
                                    </div>
                                </div>
                                <div class="mt-5 text-right"><button class="btn btn-green" type="button"> <i class="fa-solid fa-floppy-disk"></i> Save Profile</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
