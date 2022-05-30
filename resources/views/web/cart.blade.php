@extends('layouts.web')

@section('content')
    <div id="cart-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-cart-shopping"></i> Shipping Cart </h1>


                <div class="container">
                    <div class="row  cart-products">
                        <div class="col-lg-8 box-left">
                            <section id="cart">

                                <!--------------- Products ---------------->
                                @if ($user->cart_products->isEmpty())
                                    <div class="row no-data-section">
                                        <div class="col-md-8 offset-md-2">
                                            <img src="{{ asset('images/no_products.png') }}" class="no_products img-fluid"
                                                alt="no_products">
                                            <p class="big-text"> You don't have products in your cart... </p>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($user->cart_products as $product)
                                        <article class="product" product_id="{{ $product->id }}">
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
                                                <span class="qt-minus">-</span>
                                                <span class="qt">1</span>
                                                <span class="qt-plus">+</span>

                                                <h2 class="full-price">
                                                    {{ $product->final_price }}$
                                                </h2>

                                                <h2 class="price">
                                                    {{ $product->final_price }}$
                                                </h2>
                                            </footer>
                                        </article>
                                    @endforeach
                                    <!--------- Select Address -------->
                                    <div class="row additional_details text-left">

                                        @if( $user->address == null )
                                            <div class="col-md-8 form-group text-left">
                                                <label for="address" class="text-black"> <i class="fa-solid fa-location-dot"></i> Shipping Adress </label>
                                                <input type="text" class="form-control" id="address" placeholder="Type Address Details...">
                                            </div>
                                        @else

                                            <div class="additional_details text-left">
                                                <h5> <i class="fa-solid fa-address-card"></i> Shipping Adress</h5>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Default radio
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Default checked radio
                                                    </label>
                                                </div>
                                            </div> 

                                        @endif
                                    </div>
                                    <!--------- Select Phone -------->
                                    {{--
                                    <div class="additional_details text-left">
                                        <h4> <i class="fa-solid fa-phone"></i> Phone Number</h4>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>
                                    </div>
                                    --}}
                                    <div class="row additional_details text-left">
                                        <div class="col-md-8 form-group text-left">
                                            <label for="address" class="text-black"> <i class="fa-solid fa-phone"></i> Phone Number </label>
                                            <input type="text" class="form-control" id="address" placeholder="Type Phone Number...">
                                        </div>
                                    </div>
                                @endif
                            </section>
                        </div>


                        <div class="col-lg-4 box-right">
                            <footer id="site-footer">
                                <div class="text-left">
                                    <h2 class="subtotal">Subtotal: <span>0</span>$</h2>
                                    <h3 class="tax">Taxes (5%): <span>0</span>$</h3>
                                    <h3 class="shipping">Shipping: <span>5.00</span>$</h3>
                                    <h4><i class="fa-solid fa-circle-check" style="color: #2e8345"></i> Cash on Delivery
                                    </h4>
                                </div>
                                <div class="text-center">
                                    <h1 class="total">Total: <span>0</span>$</h1>
                                    <a class="btn"> <i class="fa-solid fa-basket-shopping"></i> Checkout </a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>




        </div>
    </div>
@endsection
