@extends('layouts.web')

@section('content')
    <div id="cart-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h1 class="title text-bloder"> <i class="fa-solid fa-cart-shopping"></i> Shipping Cart </h1>


            <div class="container">
                <div class="row">

                    <div class="col-lg-8 box-left">
                        <section id="cart">




                            <article class="product">
                                <header>
                                    <a href="{{ route("product") }}" class="product-link">
                                        <img src="{{ asset("images/products/product.png") }}"
                                            class="img-fluid" alt="">
        
                                        <h3><i class="fa-solid fa-eye"></i> Show </h3>
                                    </a>
                                </header>
        
                                <div class="content product-info">
                                    <h1> Newclav 642.9 Mg / 5 Ml 100 Ml suspension </h1>
                                    <span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis
                                        perspiciatis ea ad
                                        omnis provident laborum dolore in atque.
                                    </span>
                                </div>
                                <div class="icon-close">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <footer class="content">
                                    <span class="qt-minus">-</span>
                                    <span class="qt">2</span>
                                    <span class="qt-plus">+</span>
        
                                    <h2 class="full-price">
                                        20$
                                    </h2>
        
                                    <h2 class="price">
                                        10$
                                    </h2>
                                </footer>
                            </article>
        
        
        
        
                            <article class="product">
                                <header>
                                    <a href="{{ route("product") }}" class="product-link">
                                        <img src="{{ asset("images/products/product.png") }}"
                                            class="img-fluid" alt="">
        
                                        <h3><i class="fa-solid fa-eye"></i> Show </h3>
                                    </a>
                                </header>
        
                                
                                <div class="content product-info">
                                    <h1> Newclav 642.9 Mg / 5 Ml 100 Ml suspension </h1>
                                    <span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis
                                        perspiciatis ea ad
                                        omnis provident laborum dolore in atque.
                                    </span>
                                </div>
                                <div class="icon-close">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
        
                                <footer class="content">
        
                                    <span class="qt-minus">-</span>
                                    <span class="qt">1</span>
                                    <span class="qt-plus">+</span>
        
                                    <h2 class="full-price">
                                        30$
                                    </h2>
        
                                    <h2 class="price">
                                        30$
                                    </h2>
                                </footer>
                            </article>
        
        
        
        
                            <article class="product">
                                <header>
                                    <a href="{{ route("product") }}" class="product-link">
                                        <img src="{{ asset("images/products/product.png") }}"
                                            class="img-fluid" alt="">
        
                                        <h3><i class="fa-solid fa-eye"></i> Show </h3>
                                    </a>
                                </header>
        
                                
                                <div class="content product-info">
                                    <h1> Newclav 642.9 Mg / 5 Ml 100 Ml suspension </h1>
                                    <span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis
                                        perspiciatis ea ad
                                        omnis provident laborum dolore in atque.
                                    </span>
                                </div>
                                <div class="icon-close">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
        
                                <footer class="content">
        
                                    <span class="qt-minus">-</span>
                                    <span class="qt">10</span>
                                    <span class="qt-plus">+</span>
        
                                    <h2 class="full-price">
                                        200$
                                    </h2>
        
                                    <h2 class="price">
                                        20$
                                    </h2>
                                </footer>
                            </article>
        
        
        
        
                        </section>
                    </div>


                    <div class="col-lg-4 box-right">



                        <footer id="site-footer">
            
                                <div class="text-left">
                                    <h2 class="subtotal">Subtotal: <span>250</span>$</h2>
                                    <h3 class="tax">Taxes (5%): <span>12.5</span>$</h3>
                                    <h3 class="shipping">Shipping: <span>5.00</span>$</h3>
                                    <h4><i class="fa-solid fa-circle-check" style="color: #2e8345"></i> Cash on Delivery</h4>
                                </div>
                                <div class="text-center">
                                    <h1 class="total">Total: <span>267.5</span>$</h1>
                                    <a class="btn"> <i class="fa-solid fa-basket-shopping"></i> Checkout </a>
                                </div>
            
                        </footer>

                    </div>
                    
                </div>
            </div>




        </div>
    </div>
@endsection
