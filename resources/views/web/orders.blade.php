@extends('layouts.web')

@section('content')
    <div id="orders-page">
        <div class="section container  text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-dolly"></i> My Orders </h1>



                <!--------------- Products ---------------->
                @if ($orders->isEmpty())
                    <div class="row no-data-section">
                        <div class="col-md-8 offset-md-2">
                            <img src="{{ asset('images/no_products.png') }}" class="no_products img-fluid"
                                alt="no_products">
                            <p class="big-text"> You don't have any orders yet... </p>
                        </div>
                    </div>
                @else
                    <div class="accordion" id="accordionExample">
                        @foreach ( $orders as $key => $order )
                            <div class="card mt-2">
                                <div class="card-header text-left" data-toggle="collapse" data-target="#collapse{{$key}}"
                                    aria-expanded="true">
                                    <span class="title text-left"> ORDER ID <span class="text-primary font-weight-bold">#{{ $order->id }}</span>
                                    </span>

                                    <span class="price">Total: {{ $order->total }}$</span>
                                    <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                                </div>
                                <div id="collapse{{$key}}" class="collapse {{ $key == 0 ? 'show' : '' }}" data-parent="#accordionExample">
                                    <div class="card-body">

                                        <section class="mb-5">
                                            <div class="p-5">
                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div class="col-12">
                                                        <div class="card card-stepper text-black" style="border-radius: 16px;">

                                                            <!-------- Products --------->
                                                            <div class="card-body p-5">
                                                                @foreach ( $order->cart as $product_id => $quantity )
                                                                    {{-- {{ $product_id }} --}}
                                                                    @php
                                                                        $product = App\Models\Product::find($product_id);
                                                                    @endphp
                                                                    <div class="product-ordered mb-5 text-left">
                                                                        <div class="media">
                                                                            <div class="sq align-self-center "> <img
                                                                                    class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0"
                                                                                    src="{{ asset('images/products/'.$product->img) }}"
                                                                                    width="135" height="135"> </div>
                                                                            <div class="media-body my-auto">
                                                                                <div class="row my-auto flex-column flex-md-row">
                                                                                    <div class="col my-auto">
                                                                                        <h6 class="mb-0">
                                                                                            {{$product->title}}
                                                                                        </h6>
                                                                                    </div>
                                                                                    <div class="col my-auto">
                                                                                        <small>
                                                                                            {{$product->final_price}}$
                                                                                        </small>
                                                                                    </div>
                                                                                    <div class="col my-auto">
                                                                                        <small>
                                                                                            Qty : {{$quantity}}
                                                                                        </small>
                                                                                    </div>
                                                                                    <div class="col my-auto">
                                                                                        <h6 class="mb-0">
                                                                                            Total Price : {{ ( $product->final_price * $quantity ) }}$
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            <!-------- Shipping Info --------->
                                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                                <div>
                                                                    <p class="mb-0">
                                                                        <span class="h4 font-weight-bold">
                                                                            <i class="fa-solid fa-location-dot"></i> Shipping Address:
                                                                        </span>
                                                                        <span class="pl-2">
                                                                            {{ $order->address }}
                                                                        </span>
                                                                    </p>
                                                                </div>

                                                                <div class="text-end">
                                                                    <p class="mb-0">
                                                                        <span class="h4 font-weight-bold">
                                                                            <i class="fa-solid fa-phone-volume"></i> Phone:
                                                                        </span>
                                                                        <span class="pl-2">
                                                                            {{ $order->phone }}
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <!-------- Order Setps --------->
                                                            <div class="order-setps">
                                                                <ul id="progressbar-2"
                                                                    class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                                                                    @php
                                                                        // convert orderStatus to intger 
                                                                        $orderStatus = (int)$order->status;
                                                                    @endphp
                                                                    <li class="step0 {{ $orderStatus >= 1 ? 'active text-center' : 'text-muted text-end' }} {{ $orderStatus == 1 ? 'last-setp' : '' }}" ></li>
                                                                    <li class="step0 {{ $orderStatus >= 2 ? 'active text-center' : 'text-muted text-end' }} {{ $orderStatus == 2 ? 'last-setp' : '' }}" ></li>
                                                                    <li class="step0 {{ $orderStatus >= 3 ? 'active text-center' : 'text-muted text-end' }} {{ $orderStatus == 3 ? 'last-setp' : '' }}" ></li>
                                                                    <li class="step0 {{ $orderStatus >= 4 ? 'active text-center' : 'text-muted text-end' }} {{ $orderStatus == 4 ? 'last-setp' : '' }}" ></li>
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
                                                                        <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0 pr-3"></i>
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
                        @endforeach
                    </div>
                @endif


        </div>

    </div>




@endsection
