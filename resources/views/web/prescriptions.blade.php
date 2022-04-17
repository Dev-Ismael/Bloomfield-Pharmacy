@extends('layouts.web')

@section('content')
    <div id="prescriptions-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h1 class="title text-bloder"> <i class="fa-solid fa-file-medical"></i> My Prescription </h1>



            <div class="accordion" id="accordionExample">



                <div class="card mt-2">
                    <div class="card-header text-left" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true">
                        <span class="title text-left"> PRESCRIPTION ID <span class="text-primary font-weight-bold">#95847635</span>
                        </span>

                            <div class="toggle-btn">
                                <input type="checkbox" class="cb-value"/>
                                <span class="round-btn"></span>
                            </div>
                            <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">

                            
                              

                        </div>
                    </div>
                </div>


                <div class="card mt-2">
                    <div class="card-header text-left" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true">
                        <span class="title text-left"> PRESCRIPTION ID <span class="text-primary font-weight-bold">#95847635</span>
                        </span>

                            <div class="toggle-btn">
                                <input type="checkbox" class="cb-value"/>
                                <span class="round-btn"></span>
                            </div>
                            <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                    </div>
                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">

                            
                              

                        </div>
                    </div>
                </div>


                
                



            </div>




        </div>
    </div>
@endsection
