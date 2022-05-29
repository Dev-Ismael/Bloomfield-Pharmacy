@extends('layouts.web')

@section('content')
    <div id="search-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-magnifying-glass"></i> Search results... </h1>
                <div class="container-fluid content remove-padding">
                    <div class="container ">



                        <div class=" gategory-grids text-center remove-padding row">
                            <!-- filter -->
                            <div class=" col-xs-12  col-md-3 col-sm-12">

                                <div id="block-facetapi-apizx0dwq8pu7f530hjzuy2kolvt5gic"
                                    class="col-xs-12 fillter-side-main remove-padding block block-facetapi block--ajax_facets">

                                    <h3 class="slide-side-fillter">Filter by offer:</h3>
                                    <div class="col-xs-12 remove-padding links-main-fillter-side" style="display: block;">
                                        <div class="col-xs-12 remove-padding">
                                            <form action="{{ route('search') }}" method="POST">
                                                @csrf
                                                <fieldset class="text-left">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="offer_filter"
                                                            id="all_products" value="0"  {{ $offer_filter == '0' ? "checked" : "" }}>
                                                        <label class="form-check-label" for="all_products">
                                                            All Product
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="offer_filter"
                                                            id="offer_products" value="1" {{ $offer_filter == '1' ? "checked" : "" }}>
                                                        <label class="form-check-label" for="offer_products">
                                                            Only Offered Products
                                                        </label>
                                                    </div>
                                                    <!-- End of Radio -->
                                                </fieldset>
                                                <input type="text" name="searchQuery" value="{{ $searchQuery }}" hidden/>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-green filter-btn"> <i class="fa-solid fa-magnifying-glass"></i> Go </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- End filter -->
                            <div class=" col-xs-12 col-md-9 col-sm-12">


                                <!--------------- Products ---------------->
                                @if ($products->isEmpty())
                                    <div class="row no-data-section">
                                        <div class="col-md-8 offset-md-2">
                                            <img src="{{ asset("images/no_results.jpg") }}" class="no_results img-fluid" alt="no_results">
                                            <p class="big-text"> We couldn’t find what you were looking for </p>
                                            <p class="small-text"> Keep calm and search again. We have SO many other products that you will like! </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        @foreach ($products as $product)
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
