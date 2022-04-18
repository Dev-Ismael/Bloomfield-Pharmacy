@extends('layouts.web')

@section('content')
    <div id="prescriptions-page">
        <div class="section container text-center faq-main section-h2 margin-t-100 ">
            <h1 class="title text-bloder"> <i class="fa-solid fa-file-medical"></i> My Prescription </h1>



            <div class="accordion" id="accordionExample">



                <div class="card mt-2">
                    <div class="card-header text-left" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true">
                        <span class="title text-left"> PRESCRIPTION ID <span class="text-primary font-weight-bold">#264378</span>
                        </span>


                            <a href="#" class="btn btn-green create-by-prescription"> <i class="fa-solid fa-cart-shopping"></i> Order by prescription </a>

                            <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body row text-left">

                            
                            <div class="col-md-6 prescriptions-img">
                                <img src="{{ asset("images/prescriptions/prescription.jpg") }}" class="img-fluid" alt="prescription">
                            </div>
                            
                            <div class="col-md-6 prescriptions-info mt-5">
                                <div class="description">
                                    <span class="title"> <i class="fa-solid fa-align-left"></i> Prescription Description </span>
                                    <p> 
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem doloribus ea 
                                        earum ducimus neque debitis sapiente. Voluptatibus deleniti blanditiis aspernatur
                                        accusantium officiis dolor exercitationem, ratione corrupti odit, saepe voluptas numquam!
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem doloribus ea 
                                        earum ducimus neque debitis sapiente. Voluptatibus deleniti blanditiis aspernatur
                                        accusantium officiis dolor exercitationem, ratione corrupti odit, saepe voluptas numquam!
                                        earum ducimus neque debitis sapiente. Voluptatibus deleniti blanditiis aspernatur
                                        accusantium officiis dolor exercitationem, ratione corrupti odit, saepe voluptas numquam!
                                    </p>
                                </div>
                                <hr>
                                <div class="medicine">
                                    <span class="title"> <i class="fa-solid fa-capsules"></i> Prescription Medicine </span>
                                    <ul class = "list-unstyled">
                                        <li> <i class="fa-solid fa-circle"></i>  Ayahuasca </li>
                                        <li> <i class="fa-solid fa-circle"></i>  Cannabis (Marijuana/Pot/Weed) </li>
                                        <li> <i class="fa-solid fa-circle"></i> Panadol </li>
                                        <li> <i class="fa-solid fa-circle"></i> Cannabis (Marijuana/Pot/Weed) </li>
                                        <li> <i class="fa-solid fa-circle"></i> Cocaine (Coke/Crack) </li>
                                        <li> <i class="fa-solid fa-circle"></i> Hallucinogens </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="date  inline-flex">
                                     <i class="fa-solid fa-clock d-inline"></i> Prescription Upload Date : </span>
                                    <span>  1st Monday Aug 2021 </span>

                                </div>
                                <hr>
                                <div class="schedule d-flex align-items-center">
                                    <span class="title"> <i class="fa-solid fa-calendar"></i> Schedule Orders : </h4>
                                    <div class="toggle-btn">
                                        <input type="checkbox" class="cb-value"/>
                                        <span class="round-btn"></span>
                                    </div>
                                </div>
                                <hr>

                                <div class="buttons text-right">

                                    <a href="#" class="btn btn-close"> <i class="fa-solid fa-xmark"></i> Delete Prescription </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                

                <div class="card mt-2">
                    <div class="card-header text-left" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true">
                        <span class="title text-left"> PRESCRIPTION ID <span class="text-primary font-weight-bold">#895532</span>
                        </span>

                            <div class="toggle-btn">
                                <input type="checkbox" class="cb-value"/>
                                <span class="round-btn"></span>
                            </div>
                            <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                        <div class="card-body row text-left">

                            
                            <div class="col-md-6 prescriptions-img">
                                <img src="{{ asset("images/prescriptions/prescription.jpg") }}" class="img-fluid" alt="prescription">
                            </div>
                            
                            <div class="col-md-6 prescriptions-info mt-5">
                                <div class="description">
                                    <h4> <i class="fa-solid fa-align-left"></i> Prescription Description </h4>
                                    <p> 
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem doloribus ea 
                                        earum ducimus neque debitis sapiente. Voluptatibus deleniti blanditiis aspernatur
                                        accusantium officiis dolor exercitationem, ratione corrupti odit, saepe voluptas numquam!
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem doloribus ea 
                                        earum ducimus neque debitis sapiente. Voluptatibus deleniti blanditiis aspernatur
                                        accusantium officiis dolor exercitationem, ratione corrupti odit, saepe voluptas numquam!
                                    </p>
                                    <hr>
                                </div>
                                <div class="medicine">
                                    <h4> <i class="fa-solid fa-capsules"></i> Prescription Medicine </h4>
                                    <ul class = "list-unstyled">
                                        <li> <i class="fa-solid fa-circle"></i>  Ayahuasca </li>
                                        <li> <i class="fa-solid fa-circle"></i>  Cannabis (Marijuana/Pot/Weed) </li>
                                        <li> <i class="fa-solid fa-circle"></i> Panadol </li>
                                        <li> <i class="fa-solid fa-circle"></i> Cannabis (Marijuana/Pot/Weed) </li>
                                        <li> <i class="fa-solid fa-circle"></i> Cocaine (Coke/Crack) </li>
                                        <li> <i class="fa-solid fa-circle"></i> Hallucinogens </li>
                                    </ul>
                                    <hr>
                                </div>
                                <div class="date">
                                    <h4> <i class="fa-solid fa-clock"></i> Prescription Upload Date : </h4>
                                    <span>  1st Monday Aug 2021 </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                

                
                



            </div>




        </div>
    </div>
@endsection