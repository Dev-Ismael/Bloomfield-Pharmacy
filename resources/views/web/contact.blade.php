@extends('layouts.web')

@section('content')
    <div id="contact-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-message"></i> Contact </h1>

            <div class=" remove-padding contact-info">

                <div class="pb-5">
                    <div class="col-lg-4">
                        <i class="fa-solid fa-location-dot"></i>
                        20 wezaret El-Zeraa St, Mohandessin, Giza, Egypt.
                    </div>
                    <div class="col-lg-4">
                        <i class="fa-solid fa-phone"></i>
                        01118810412
                    </div>
                    <div class="col-lg-4">
                        <i class="fa-solid fa-envelope"></i>
                        Contact@bloomfield.com
                    </div>
                </div>


                <div class="personal-info remove-padding">


                    <form id="messege-form" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name <span class="form-required" >*</span> </label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Type Your Name..."
                                @auth
                                    value="{{ Auth::user()->name }}"
                                @endauth
                            />
                            <small class="text-danger text-left d-block name"> </small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address <span class="form-required" >*</span> </label>
                            <input type="email" name="email"  class="form-control" id="email" placeholder="Type Email Address..."
                                @auth
                                    value="{{ Auth::user()->email }}"
                                @endauth
                            />
                            <small class="text-danger text-left d-block email"> </small>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject <span class="form-required" >*</span> </label>
                            <input type="text" name="subject"  class="form-control" id="subject" placeholder="Type Messege Subject..."/>
                            <small class="text-danger text-left d-block  subject"> </small>
                        </div>
                        <div class="form-group">
                            <label for="messege"> Messege <span class="form-required" >*</span>  </label>
                            <textarea name="messege"  name="messege" class="form-control" cols="100" rows="10" placeholder="Type Messege Content..."></textarea>
                            <small class="text-danger text-left d-block messege"> </small>
                        </div>
                        <button type="submit" class="btn btn-primary send-messege-btn"> <i class="fa-solid fa-location-arrow"></i> Submit </button>
                    </form>

                </div>
            </div>




        </div>
    </div>
@endsection
