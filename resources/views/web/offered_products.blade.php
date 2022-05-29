@extends('layouts.web')

@section('content')
    <div id="offered-products">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-gift"></i> Latest Offers </h4>
            
            <div class="container-fluid content remove-padding">
                <div class="container">
    
    
    
                    <div class="gategory-grids remove-padding row">
                        <div class="col-xs-12">
    
    
                            <!--------------- Products ---------------->
                            @if ($products->isEmpty())
                            <div class="row no-data-section">
                                <div class="col-md-8 offset-md-2">
                                    <img src="{{ asset("images/no_products.png") }}" class="no_products img-fluid" alt="no_products">
                                    <p class="big-text"> Sorry we don't have any offers today.. </p>
                                </div>
                            </div>
                            @else
                                <div class="row">
                                    @foreach ( $products as $product )
                                        <div class="col-lg-3 col-md-6 product-container">
                                            <div class="col-xs-12">
                                                <div class="col-xs-12 remove-padding product-item">
                                                    <a href="{{ route('product',$product->slug) }}" class="item-img" tabindex="0">
                                                        <img  
                                                            src="{{ asset('images/products/'.$product->img) }}"
                                                            width="220" height="220" alt="">
                                                        @if( $product->has_offer == '1')
                                                            <span class="off-span">UP TO {{ $product->offer_percentage }} %</span>
                                                        @endif
                                                    </a>
                                                    <div class="product-txt-container"> <p> {{ $product->brand }} </p></div>
                                                    <div class="product-txt-container"><a href="{{ route("product", $product->slug ) }}" tabindex="0">  {{ $product->title }}  </a></div>
                                                    <div class="product-txt-container"> <p> {{ $product->measurement }} </p></div>
                                                    <div class="price">
                                                        {{ $product->final_price }}$
                                                        
                                                        @if( $product->has_offer == '1')
                                                            <span class="uc-price">
                                                                {{ $product->price }}$
                                                            </span> 
                                                        @endif
                                                    </div>
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
    
                                                            <div class="wishlist">
                                                                @if ( $wishlist != Null )
                                                                    <p> <i class="fa-solid fa-check"></i> wishlist  </p>
                                                                @else
                                                                    <button href="#" class="add-wishlist" product_id="{{ $product->id }}"> <i class="fa-solid fa-heart"></i> wishlist </button>
                                                                @endif
                                                            </div>
                                                        <!------ if guest -------->
                                                        @else
                                                            <button href="#" data-toggle="modal" data-target="#login"> <i class="fa-solid fa-cart-shopping"></i> Cart </button>
                                                            <button href="#" data-toggle="modal" data-target="#login" > <i class="fa-solid fa-heart"></i> Wishlist </button>
                                                        @endauth
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- Pagination --}}
                                <div class="d-flex justify-content-center">
                                    {{ $products->withQueryString()->onEachSide(0)->links() }}
                                </div>
                            @endif
    
                        </div>
    
                    </div>
    
                    <!-- /.section, /#content -->
    
    
                </div>
            </div>
        </div>
    </div>
@endsection
