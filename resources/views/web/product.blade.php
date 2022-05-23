@extends('layouts.web')

@section('content')
    <div id="product-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <div class="container-fluid content remove-padding">
    
    
                <div class="row text-left">
                    <div class="col-md-6"> 
                        <div class="Product-img-box">
                            <img src="{{ asset("images/products/".$product->img) }}" alt="product-img" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6">


                        <div class="product-content product-d ">
                            
                            @if ($product->has_offer == '1')
                                <div class="product-offer"><p> UP TO {{ $product->offer_percentage }} % </p></div>
                            @endif
                            <h3 class="product-title">
                                {{ $product->title }} ( {{ $product->measurement }} )
                            </h3>
                            <p class="product-brand"> {{ $product->brand }}  </p>
                            <h4 class="price">
                                {{ $product->final_price }}$
                                @if ($product->has_offer == '1')
                                    <span class="uc-price"> {{ $product->price }}$ </span>
                                @endif
                            </h4>
                            <p>Remaining amount: <span class="quantity">{{  $product->quantity }}</span> item </p>
                            <p class="description"> {{ $product->description }} </p>

                            <div class="col-xs-12 add-cart-main text-center">
                                <button href="#" product_id="{{ $product->id }}"> <i class="fa-solid fa-cart-shopping"></i> Add To Cart </button>
                                &nbsp;
                                &nbsp;
                                <button href="#" product_id="{{ $product->id }}"> <i class="fa-solid fa-heart"></i> Wishlist </button>
                            </div>

                        </div>

                    </div>
                </div>
    
    
    
    
            </div>
        </div>
    </div>
@endsection
