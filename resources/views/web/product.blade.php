@extends('layouts.web')

@section('content')
    <div id="product-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <div class="container-fluid content">
    
    
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

                            <hr>

                            <div class="col-xs-12 product-buttons d-flex justify-content-center align-content-center text-center">
                                @auth
                                    @php
                                        $wishlist = App\Models\Wishlist::where("user_id", Auth::id())->where("product_id", $product->id)->first();
                                        $cart     = App\Models\Cart::where("user_id", Auth::id())->where("product_id", $product->id)->first();
                                    @endphp
                                    <div class="cart">
                                        @if ( $cart != Null )
                                            <p> <i class="fa-solid fa-check"></i> Cart  </p>
                                        @else
                                            <button href="#" class="add-cart" product_id="{{ $product->id }}"> <i class="fa-solid fa-cart-shopping"></i> Cart </button>
                                        @endif
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <div class="wishlist">
                                        @if ( $wishlist != Null )
                                            <p> <i class="fa-solid fa-check"></i> Wishlist  </p>
                                        @else
                                            <button href="#" class="add-wishlist" product_id="{{ $product->id }}"> <i class="fa-solid fa-heart"></i> wishlist </button>
                                        @endif
                                    </div>
                                <!------ if guest -------->
                                @else
                                    <button href="#" data-toggle="modal" data-target="#login"> <i class="fa-solid fa-cart-shopping"></i> Cart </button>
                                    &nbsp;
                                    &nbsp;
                                    <button href="#" data-toggle="modal" data-target="#login" > <i class="fa-solid fa-heart"></i> Wishlist </button>
                                @endauth
                            </div>

                        </div>

                    </div>
                </div>
    
    
    
    
            </div>
        </div>
    </div>
@endsection
