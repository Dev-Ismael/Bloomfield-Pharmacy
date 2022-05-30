@extends('layouts.web')

@section('content')
    <div id="profile-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-id-card"></i> My Profile </h1>


                <div class="container rounded bg-white mt-5">
                    <div class="row">
                        <div class="col-md-4 user-img mb-5">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img src="{{ asset('images/web/user-img.jpg') }}" class="user-img" alt="user-img">
                                <span class="font-weight-bold mt-3">{{ $user->name }}</span>
                                <span class="text-black-50">{{ $user->email }}</span>
                                <span>United States</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div class="d-flex flex-row align-items-center back"><i
                                            class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                        <a href="{{ route('home') }}" class="text-dark">
                                            <h4>Back to home</h4>
                                        </a>
                                    </div>
                                    <h4 class="text-right"> <i class="fa-solid fa-pen-to-square"></i> Edit Profile</h4>
                                </div>
                                <form id="update-profile" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 form-group text-left">
                                            <label for="firstName" class="text-black"> <i
                                                    class="fa-solid fa-file-signature"></i> First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="first_name"
                                                placeholder="Type First Name..." value="{{ $user->first_name }}"/>
                                            <small class="text-danger first_name"> </small>
                                        </div>
                                        <div class="col-md-6 form-group text-left">
                                            <label for="lastName" class="text-black"> <i
                                                    class="fa-solid fa-file-signature"></i> Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="last_name"
                                                placeholder="Type Last Name..." value="{{ $user->last_name }}"/>
                                            <small class="text-danger last_name"> </small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group text-left">
                                            <label for="phone_1" class="text-black"> <i
                                                    class="fa-solid fa-phone-volume"></i> Phone </label>
                                            <input type="text" name="phone[]" class="form-control" id="phone_1"
                                                placeholder="Type Phone Number..." value="{{ $user->phone[0] }}"/>
                                            <small class="text-danger phone_1"> </small>
                                        </div>
                                        <div class="col-md-6 form-group text-left">
                                            <label for="phone_2" class="text-black"> <i
                                                    class="fa-solid fa-phone-volume"></i> Second Phone (optional) </label>
                                            <input type="text" name="phone[]" class="form-control" id="phone_2"
                                                placeholder="Type Phone Number..." value="{{ $user->phone[1] }}"/>
                                            <small class="text-danger phone_2"> </small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group text-left">
                                            <label for="email_2" class="text-black"> <i class="fa-solid fa-envelope"></i>
                                                Second Email (optional) </label>
                                            <input type="text" name="email_2" class="form-control" id="email_2"
                                                placeholder="Type Email Address..." value="{{ $user->email_2 }}"/>
                                            <small class="text-danger email_2"> </small>
                                        </div>
                                        <div class="col-md-6 form-group text-left">
                                            <label for="state" class="text-black"> <i class="fa-solid fa-flag-usa"></i>
                                                State/Region </label>
                                            <input type="text"  name="state" class="form-control" id="state"
                                                placeholder="Type State/Region..." value="{{ $user->state }}"/>
                                            <small class="text-danger state"> </small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group text-left">
                                            <label for="address_1" class="text-black"> <i
                                                    class="fa-solid fa-location-dot"></i> Address </label>
                                            <input type="text"  name="address[]"  class="form-control" id="address_1"
                                                placeholder="Type Address Details..."  value="{{ $user->address[0] }}"/>
                                                <small class="text-danger address_1"> </small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group text-left">
                                            <label for="address_2" class="text-black"> <i
                                                    class="fa-solid fa-location-dot"></i> Second Address (optional) </label>
                                            <input type="text" name="address[]" class="form-control" id="address_2"
                                                placeholder="Type Address Details..."  value="{{ $user->address[1] }}"/>
                                                <small class="text-danger address_2"> </small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group text-left">
                                            <label for="address_3" class="text-black"> <i
                                                    class="fa-solid fa-location-dot"></i> Third Address (optional) </label>
                                            <input type="text" name="address[]" class="form-control" id="address_3"
                                                placeholder="Type Address Details..."  value="{{ $user->address[2] }}"/>
                                                <small class="text-danger address_3"> </small>
                                        </div>
                                    </div>
                                    <div class="mt-5 text-right">
                                        <button class="btn btn-green update-profile" type="button"> 
                                            <i class="fa-solid fa-floppy-disk"></i> Save Info
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </div>
@endsection
