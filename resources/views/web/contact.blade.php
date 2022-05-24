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


                    <form>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Full Name <span class="form-required" title="This field is required.">*</span> </label>
                            <input type="text" class="form-control" id="exampleInputPassword1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address <span class="form-required" title="This field is required.">*</span> </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Subject <span class="form-required" title="This field is required.">*</span> </label>
                            <input type="text" class="form-control" id="exampleInputPassword1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Messege <span class="form-required" title="This field is required.">*</span>  </label>
                            <textarea name="messege" class="form-control" cols="100" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-location-arrow"></i> Submit </button>
                    </form>

                </div>
            </div>




        </div>
    </div>
@endsection
