@extends('layouts.web')

@section('content')
    <div id="cart-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-heart"></i> My Wishlist </h1>

            <div class="container wishlist-container">



                <!--------------- Products ---------------->
                @if ($wishlist_products->isEmpty())
                    <div class="row no-data-section">
                        <div class="col-md-8 offset-md-2">
                            <img src="{{ asset('images/no_products.png') }}" class="no_products img-fluid"
                                alt="no_products">
                            <p class="big-text"> You don't have products in your wishlist... </p>
                        </div>
                    </div>
                @else
                    <div class="row wishlist-products">

                        <div class="col-lg-8 offset-lg-2 box-left">

                            @foreach ($wishlist_products as $product)
                                <article class="product" product_id="{{$product->id}}">
                                    <header>
                                        <a href="{{ route('product', $product->slug) }}" class="product-link">
                                            <img src="{{ asset('images/products/' . $product->img) }}"
                                                class="img-fluid" alt="">

                                            <h3><i class="fa-solid fa-eye"></i> Show </h3>
                                        </a>
                                    </header>
                                    <div class="content product-info">
                                        <h1> {{ $product->title }} </h1>
                                        <p> {{ $product->brand }} </p>
                                        <p> {{ $product->measurement }} </p>
                                    </div>
                                    <div class="icon-close">
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                                    <footer class="content">
                                        @php
                                            $cart = App\Models\Cart::where('user_id', Auth::id())
                                                ->where('product_id', $product->id)
                                                ->first();
                                        @endphp
                                        <div class="cart">
                                            @if ($cart != null)
                                                <p> <i class="fa-solid fa-check"></i> Cart </p>
                                            @else
                                                <button href="#" class="add-cart"
                                                    product_id="{{ $product->id }}"> <i class="fa-solid fa-cart-shopping"></i> Cart </button>
                                            @endif
                                        </div>
                                    </footer>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif



            </div>
        </div>
    </div>

    </div>
    </div>
@endsection
