@extends('layouts.web')

@section('content')
    <div id="offered-products">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-gift"></i> Latest Offers </h4>
            
            <div class="container-fluid content remove-padding">
                <div class="container">
    
    
    
                    <div class="gategory-grids remove-padding row">
                        <div class="col-xs-12 col-md-9 col-sm-8">
    
    
                            <!--------------- Products ---------------->
                            @if ($products->isEmpty())
                                <div class="col-md-8 offset-2">
                                    <p> Not products to show</p>
                                </div>
                            @else
                                <div class="row">
                                    @foreach ( $products as $product )
                                        <div class="col-lg-4 col-md-6 product-container">
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
                                                    <div class="col-xs-12 add-cart-main text-center">
                                                        <button href="#" > <i class="fa-solid fa-cart-shopping"></i> Cart </button>
                                                        <button href="#" > <i class="fa-solid fa-heart"></i> Wishlist </button>
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
