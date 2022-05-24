@extends('layouts.web')

@section('content')
    <div id="category-page" class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
        <h4 class="title text-bloder d-flex justify-content-center align-items-center"> 
            <img src="{{ asset("images/categories/".$category->icon) }}" alt="category-icon">
            <p> {{ $category->title }} </p>
        </h1>
        <div class="container-fluid content remove-padding">
            <div class="container">



                <div class="gategory-grids remove-padding row">
                    <!-- filter -->
                    <div class=" col-xs-12  col-md-3 col-sm-4 text-left">
                        <div class="category-branches">
                            @foreach ( $category->subcategories as $key => $subcategory )
                                <a  
                                    href="{{ route('category' , [  $category->slug , $subcategory->slug ]) }}" 
                                    class=" {{ Request::is('category/'. $category->slug .'/'. $subcategory->slug) ? 'active' : '' }}">
                                    {{ $subcategory->title }}
                                </a> 
                            @endforeach
                        </div>
                    </div>
                    <!-- End filter -->
                    <div class="col-xs-12 col-md-9 col-sm-8">


                        <!--------------- Products ---------------->
                        <div class="row">

                            @if ($products->isEmpty())

                                <div class="col-md-8 offset-2">
                                    <p> Not products to show</p>
                                </div>
                                
                            @else
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
                                                <p>{{ $product->brand }}</p>
                                                <a href="{{ route('product',$product->slug) }}" tabindex="0">{{ $product->title }} </a>
                                                <h5>{{ $product->measurement }}</h5>
                                                <h3>
                                                    {{ $product->final_price }} $
                                                    
                                                    @if( $product->has_offer == '1')
                                                        <span class="uc-price">
                                                            {{ $product->price }}  $
                                                        </span> 
                                                    @endif
                                                </h3>
                                                <div class="col-xs-12 add-cart-main text-center">
                                                    <button href="#" > <i class="fa-solid fa-cart-shopping"></i> Cart </button>
                                                    <button href="#" > <i class="fa-solid fa-heart"></i> Wishlist </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            


                        </div>

                    </div>

                </div>

                <!-- /.section, /#content -->


            </div>
        </div>
    </div>
@endsection
