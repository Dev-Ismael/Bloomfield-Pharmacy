@extends('layouts.web')

@section('content')
    <div id="prescriptions-page">
        <div class="section container text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-file-prescription"></i> My Prescriptions </h1>


            <!--------------- Session Alert ----------------->
            @if (session()->has('success'))
                <script>
                    window.addEventListener('load', (event) => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your Prescription Saved',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                </script>
            @elseif(session()->has('failed'))
                <script>
                    window.addEventListener('load', (event) => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error At Save Prescription',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                </script>
            @endif

            <!--------------- Prescriptions --------------->
            @if ($prescriptions->isEmpty())
                <div class="row no-data-section">
                    <div class="col-md-8 offset-md-2">
                        <img src="{{ asset("images/no_prescriptions.png") }}" class="no_prescriptions img-fluid" alt="no_prescriptions">
                        <p class="big-text"> You don't have any prescription yet... <a href="{{ route('order_prescription') }}">Upload Now!</a> </p>
                    </div>
                </div>
            @else
                <div class="accordion" id="accordionExample">


                    @foreach ( $prescriptions as $key => $prescription )

                        <div class="card mt-2">
                            <div class="card-header text-left" data-toggle="collapse" data-target="#collapse-{{$key}}"
                                aria-expanded="true">
                                <span class="title text-left"> PRESCRIPTION ID <span class="text-primary font-weight-bold">#{{ $prescription->id }}</span>
                                </span>

                                    <!--------- Check Prescription Valid/Pending ----------->
                                    @if ( $prescription->validation == '2' )
                                        <a href="#" class="btn btn-green create-by-prescription"> <i class="fa-solid fa-cart-shopping"></i> Order Products </a>
                                    @endif

                                    <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                            </div>
                            <div id="collapse-{{$key}}" class="collapse {{ $key == 0 ? 'show' : ''}}" data-parent="#accordionExample">
                                <div class="card-body row text-left">

                                    
                                    <div class="col-md-6 d-flex justify-content-center align-content-between">
                                        <img src="{{ asset("images/prescriptions/".$prescription->img) }}" class="prescription-img" class="img-fluid" alt="prescription-image">
                                    </div>
                                    
                                    <div class="col-md-6 prescriptions-info mt-5">

                                        <!-------------- description ----------------->
                                        <div class="description">
                                            <span class="title"> <i class="fa-solid fa-align-left"></i> Aditional Details :  </span>
                                            @if ( $prescription->additional_details != Null )
                                                <p> 
                                                    {{ $prescription->additional_details }} 
                                                </p>
                                            @else
                                               <span> <i class="fa-solid fa-circle-question"></i> </span> 
                                            @endif
                                        </div>
                                        <hr>

                                        <!-------------- Medicine ----------------->
                                        <div class="medicine">
                                            <span class="title"> <i class="fa-solid fa-capsules"></i> Prescription Medicine :  </span>
                                            @if ( $prescription->medicine != Null  )
                                                <ul>
                                                    @foreach ( $prescription->medicine as $medicine )
                                                            <li> {{ $medicine }} </li>
                                                    @endforeach
                                                </ul>

                                            @else
                                               <span> <i class="fa-solid fa-circle-question"></i> </span> 
                                            @endif
                                        </div>
                                        <hr>

                                        <!-------------- Age ----------------->
                                        <div class="age">
                                            <span class="title"> <i class="fa-solid fa-user"></i> Patient Age : </span>
                                            <span>  {{ $prescription->age }}  Years Old </span>
                                        </div>
                                        <hr>

                                        <!-------------- gender  ----------------->
                                        <div class="gender">
                                            <span class="title"> <i class="fa-solid fa-venus-mars"></i> Patient Gender  : </span>
                                            <span> {{ ucfirst($prescription->gender) }} </span>
                                        </div>
                                        <hr>

                                        <!-------------- Date ----------------->
                                        <div class="date">
                                            <span class="title"> <i class="fa-solid fa-clock d-inline"></i> Prescription Upload Date : </span>
                                            <span>  {{ $prescription->created_at->format('d M Y') }} </span>
                                        </div>
                                        <hr>

                                        <!-------------- Validation ----------------->
                                        <div class="validation">
                                            <span class="title"> <i class="fa-solid fa-list-check"></i> Prescription Validation : </span>
                                            @if ($prescription->validation == '0')
                                                <span class="not-valid"> <i class="fa-solid fa-xmark"></i> Not valid </span>
                                            @elseif($prescription->validation == '1' )
                                                <span class="pendding "> <i class="fa-solid fa-spinner"></i> Pendding </span>
                                            @elseif( $prescription->validation == '2' )
                                                <span class="valid"> <i class="fa-solid fa-check"></i> Valid </span>
                                            @endif
                                        </div>
                                        <hr>

                                        <!--------- Check Prescription Valid/Pending ----------->
                                        @if ( $prescription->validation == '2' )
                                            <!-------------- Schedule ----------------->
                                            <div class="schedule  d-flex align-items-center">
                                                <h4 class="title"> <i class="fa-solid fa-calendar"></i> Schedule Orders : </h4>
                                                <div class="toggle-btn {{ $prescription->schedule_orders == '1' ? 'active' : '' }}">
                                                    <input type="checkbox" class="cb-value" 
                                                        schedule_status="{{ $prescription->schedule_orders == '1' ? 'open' : 'close' }}"
                                                        prescription_id="{{ $prescription->id }}"/>
                                                    <span class="round-btn"></span>
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                        


                                        <!-------------- Buttons ----------------->
                                        <div class="buttons text-right">
                                            <a href="#" class="btn btn-danger delete-prescription-btn" prescription_id="{{ $prescription->id }}"> <i class="fa-solid fa-xmark"></i> Delete Prescription </a>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    
                </div>
            @endif



        </div>
    </div>
@endsection
