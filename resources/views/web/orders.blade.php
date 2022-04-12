@extends('layouts.web')

@section('content')
    <div id="orders-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h1 class="title text-bloder"> <i class="fa-solid fa-dolly"></i> My Orders </h1>



            <div class="accordion" id="accordionExample">



                <div class="card mt-2">
                    <div class="card-header text-left" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true">
                        <span class="title text-left"> ORDER ID <span class="text-primary font-weight-bold">#95847635</span>
                        </span>

                        <span class="price">Total: 152$</span>
                        <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">

                            <section class="mb-5">
                                <div class="container">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <div class="col-12">
                                            <div class="card card-stepper text-black" style="border-radius: 16px;">

                                                <div class="card-body p-5">



                                                    <!-------- Products --------->
                                                        <div class="product-ordered mb-5 text-left">
                                                            <div class="media">
                                                                <div class="sq align-self-center "> <img
                                                                        class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0"
                                                                        src="{{ asset('images/products/product.png') }}"
                                                                        width="135" height="135"> </div>
                                                                <div class="media-body my-auto">
                                                                    <div
                                                                        class="row my-auto flex-column flex-md-row">
                                                                        <div class="col my-auto">
                                                                            <h6 class="mb-0">
                                                                                 Jack Jacs
                                                                            </h6>
                                                                        </div>
                                                                        <div class="col my-auto">
                                                                            <small>
                                                                                Golden Rim
                                                                            </small>
                                                                        </div>
                                                                        <div class="col my-auto"> 
                                                                            <small> 
                                                                                Qty : 1
                                                                            </small>
                                                                        </div>
                                                                        <div class="col my-auto">
                                                                            <h6 class="mb-0">
                                                                                Total Price : 92$
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-ordered mb-5 text-left">
                                                            <div class="media">
                                                                <div class="sq align-self-center "> <img
                                                                        class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0"
                                                                        src="{{ asset('images/products/product.png') }}"
                                                                        width="135" height="135"> </div>
                                                                <div class="media-body my-auto">
                                                                    <div
                                                                        class="row my-auto flex-column flex-md-row">
                                                                        <div class="col my-auto">
                                                                            <h6 class="mb-0">
                                                                                 Jack Jacs
                                                                            </h6>
                                                                        </div>
                                                                        <div class="col my-auto">
                                                                            <small>
                                                                                Golden Rim
                                                                            </small>
                                                                        </div>
                                                                        <div class="col my-auto"> 
                                                                            <small> 
                                                                                Qty : 1
                                                                            </small>
                                                                        </div>
                                                                        <div class="col my-auto">
                                                                            <h6 class="mb-0">
                                                                                Total Price : 92$
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-------- Products --------->
                                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                                        <div>
                                                            <p class="mb-0">
                                                                Address
                                                                <span class="pl-2 font-weight-bold">
                                                                    20 wezaret El-Zeraa St, Mohandessin, Giza, Egypt.
                                                                </span>
                                                            </p>
                                                        </div>

                                                        <div class="text-end">
                                                            <p class="mb-0">Expected Arrival <span
                                                                    class="pl-2 font-weight-bolder">01/08/2022</span></p>
                                                        </div>
                                                    </div>

                                                    <ul id="progressbar-2"
                                                        class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                                                        <li class="step0 active text-center" id="step1"></li>
                                                        <li class="step0 active text-center" id="step2"></li>
                                                        <li class="step0 active text-center" id="step3"></li>
                                                        <li class="step0 text-muted text-end" id="step4"></li>
                                                    </ul>

                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-lg-flex align-items-center process-info">
                                                            <i
                                                                class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0 pr-3"></i>
                                                            <div class="text-left text-dark">
                                                                <p class="font-weight-bold mb-1">Order</p>
                                                                <p class="font-weight-bold mb-0">Processed</p>
                                                            </div>
                                                        </div>

                                                        <div class="d-lg-flex align-items-center process-info ">
                                                            <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0 pr-3"></i>
                                                            <div class="text-left text-dark">
                                                                <p class="font-weight-bold mb-1">Order</p>
                                                                <p class="font-weight-bold mb-0">Shipped</p>
                                                            </div>
                                                        </div>

                                                        <div class="d-lg-flex align-items-center process-info">
                                                            <i
                                                                class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0 pr-3"></i>
                                                            <div class="text-left text-dark">
                                                                <p class="font-weight-bold mb-1">Order</p>
                                                                <p class="font-weight-bold mb-0">En Route</p>
                                                            </div>
                                                        </div>

                                                        <div class="d-lg-flex align-items-center process-info">
                                                            <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0 pr-3"></i>
                                                            <div class="text-left text-dark">
                                                                <p class="font-weight-bold mb-1">Order</p>
                                                                <p class="font-weight-bold mb-0">Arrived</p>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>
                    </div>
                </div>


                <div class="card mt-2">
                    <div class="card-header text-left collapsed" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false">
                        <span class="title text-left"> ORDER ID <span class="text-primary font-weight-bold">#95847635</span>
                        </span>
                        <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                            3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                            anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard
                            of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header text-left collapsed" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false">
                        <span class="title text-left"> ORDER ID <span class="text-primary font-weight-bold">#95847635</span>
                        </span>
                        <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                            3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                            anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard
                            of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>



            </div>




        </div>
    </div>
@endsection
