@extends('layouts.web')

@section('content')
    <div id="category-page" class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
        <h1 class="title text-bloder"> <i class="fa-solid fa-code-branch"></i> Category  </h1>
        <div class="container-fluid content remove-padding">
            <div class="container">



                <div class="gategory-grids remove-padding row">
                    <!-- filter -->
                    <div class=" col-xs-12  col-md-3 col-sm-4 text-left">
                        <div class="category-branches">
                            <a href="#">Hello</a> 
                            <a href="#" class="active">Hello</a> 
                            <a href="#">Hello</a> 
                            <a href="#">Hello</a> 
                            <a href="#">Hello</a> 
                            <a href="#">Hello</a> 
                            <a href="#">Hello</a> 
                            <a href="#">Hello</a> 
                            <a href="#">Hello</a> 
    
                        </div>
                    </div>
                    <!-- End filter -->
                    <div class=" col-xs-12 col-md-9 col-sm-8">


                        <!--------------- Products ---------------->
                        <div class="row">
                            
                            
                            <div class="col-md-4 col-sm-6">
                                <div class="col-xs-12 remove-padding product-item">
                                    <a href="/palmolive" class="item-img" tabindex="0">
                                        <img  
                                            src="{{ asset('images/products/product.png') }}"
                                            width="220" height="220" alt="">
                                        <span class="off-span">UP TO 70 %</span>
                                    </a>
                                    <p>Mup (Medical Union Pharma)</p>
                                    <a href="/palmolive" tabindex="0">PALMOLIVE </a>
                                    <h5>14 tab</h5>
                                    <h3>105.00 <i class="fa-solid fa-dollar-sign"></i> <span class="uc-price">150.00 <i class="fa-solid fa-dollar-sign"></i></span> </h3>
                                    <div class="clearfix"></div>
                                    <div class=" col-xs-12">
                                        <div class="col-xs-12 add-cart-main remove-padding">
                                            <div class="col-xs-7 remove-padding">
                                                <form action="/" method="post" 
                                                    class="uc-out-stock-processed">
                                                    <div>
                                                        <div class="form-actions form-wrapper" id="edit-actions--4"><input
                                                                class="list-add-to-cart form-submit ajax-processed" type="submit"
                                                                name="op" value="Add to cart" tabindex="0"
                                                                style="display: none;">
                                                            <div class="uc_out_of_stock_html">
                                                                <div style="height: 35px;"><span style="color: red;"> <i class="fa-solid fa-square-xmark"></i> Out of stock</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xs-5 remove-padding text-right">
                                                <i class="fa-solid fa-heart"></i>
                                                {{-- <i class="fa-solid fa-heart gray"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-6">
                                <div class="col-xs-12 remove-padding product-item">
                                    <a href="/palmolive" class="item-img" tabindex="0">
                                        <img  
                                            src="{{ asset('images/products/product.png') }}"
                                            width="220" height="220" alt="">
                                        <span class="off-span">UP TO 70 %</span>
                                    </a>
                                    <p>Mup (Medical Union Pharma)</p>
                                    <a href="/palmolive" tabindex="0">PALMOLIVE </a>
                                    <h5>14 tab</h5>
                                    <h3>105.00 <i class="fa-solid fa-dollar-sign"></i> <span class="uc-price">150.00 <i class="fa-solid fa-dollar-sign"></i></span> </h3>
                                    <div class="clearfix"></div>
                                    <div class=" col-xs-12">
                                        <div class="col-xs-12 add-cart-main remove-padding">
                                            <div class="col-xs-7 remove-padding">
                                                <form action="/" method="post" 
                                                    class="uc-out-stock-processed">
                                                    <div>
                                                        <div class="form-actions form-wrapper" id="edit-actions--4"><input
                                                                class="list-add-to-cart form-submit ajax-processed" type="submit"
                                                                name="op" value="Add to cart" tabindex="0"
                                                                style="display: none;">
                                                            <div class="uc_out_of_stock_html">
                                                                <div style="height: 35px;"><span style="color: red;"> <i class="fa-solid fa-square-xmark"></i> Out of stock</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xs-5 remove-padding text-right">
                                                <i class="fa-solid fa-heart"></i>
                                                {{-- <i class="fa-solid fa-heart gray"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-6">
                                <div class="col-xs-12 remove-padding product-item">
                                    <a href="/palmolive" class="item-img" tabindex="0">
                                        <img  
                                            src="{{ asset('images/products/product.png') }}"
                                            width="220" height="220" alt="">
                                        <span class="off-span">UP TO 70 %</span>
                                    </a>
                                    <p>Mup (Medical Union Pharma)</p>
                                    <a href="/palmolive" tabindex="0">PALMOLIVE </a>
                                    <h5>14 tab</h5>
                                    <h3>105.00 <i class="fa-solid fa-dollar-sign"></i> <span class="uc-price">150.00 <i class="fa-solid fa-dollar-sign"></i></span> </h3>
                                    <div class="clearfix"></div>
                                    <div class=" col-xs-12">
                                        <div class="col-xs-12 add-cart-main remove-padding">
                                            <div class="col-xs-7 remove-padding">
                                                <form action="/" method="post" 
                                                    class="uc-out-stock-processed">
                                                    <div>
                                                        <div class="form-actions form-wrapper" id="edit-actions--4"><input
                                                                class="list-add-to-cart form-submit ajax-processed" type="submit"
                                                                name="op" value="Add to cart" tabindex="0"
                                                                style="display: none;">
                                                            <div class="uc_out_of_stock_html">
                                                                <div style="height: 35px;"><span style="color: red;"> <i class="fa-solid fa-square-xmark"></i> Out of stock</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xs-5 remove-padding text-right">
                                                <i class="fa-solid fa-heart"></i>
                                                {{-- <i class="fa-solid fa-heart gray"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-6">
                                <div class="col-xs-12 remove-padding product-item">
                                    <a href="/palmolive" class="item-img" tabindex="0">
                                        <img  
                                            src="{{ asset('images/products/product.png') }}"
                                            width="220" height="220" alt="">
                                        <span class="off-span">UP TO 70 %</span>
                                    </a>
                                    <p>Mup (Medical Union Pharma)</p>
                                    <a href="/palmolive" tabindex="0">PALMOLIVE </a>
                                    <h5>14 tab</h5>
                                    <h3>105.00 <i class="fa-solid fa-dollar-sign"></i> <span class="uc-price">150.00 <i class="fa-solid fa-dollar-sign"></i></span> </h3>
                                    <div class="clearfix"></div>
                                    <div class=" col-xs-12">
                                        <div class="col-xs-12 add-cart-main remove-padding">
                                            <div class="col-xs-7 remove-padding">
                                                <form action="/" method="post" 
                                                    class="uc-out-stock-processed">
                                                    <div>
                                                        <div class="form-actions form-wrapper" id="edit-actions--4"><input
                                                                class="list-add-to-cart form-submit ajax-processed" type="submit"
                                                                name="op" value="Add to cart" tabindex="0"
                                                                style="display: none;">
                                                            <div class="uc_out_of_stock_html">
                                                                <div style="height: 35px;"><span style="color: red;"> <i class="fa-solid fa-square-xmark"></i> Out of stock</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xs-5 remove-padding text-right">
                                                <i class="fa-solid fa-heart"></i>
                                                {{-- <i class="fa-solid fa-heart gray"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-6">
                                <div class="col-xs-12 remove-padding product-item">
                                    <a href="/palmolive" class="item-img" tabindex="0">
                                        <img  
                                            src="{{ asset('images/products/product.png') }}"
                                            width="220" height="220" alt="">
                                        <span class="off-span">UP TO 70 %</span>
                                    </a>
                                    <p>Mup (Medical Union Pharma)</p>
                                    <a href="/palmolive" tabindex="0">PALMOLIVE </a>
                                    <h5>14 tab</h5>
                                    <h3>105.00 <i class="fa-solid fa-dollar-sign"></i> <span class="uc-price">150.00 <i class="fa-solid fa-dollar-sign"></i></span> </h3>
                                    <div class="clearfix"></div>
                                    <div class=" col-xs-12">
                                        <div class="col-xs-12 add-cart-main remove-padding">
                                            <div class="col-xs-7 remove-padding">
                                                <form action="/" method="post" 
                                                    class="uc-out-stock-processed">
                                                    <div>
                                                        <div class="form-actions form-wrapper" id="edit-actions--4"><input
                                                                class="list-add-to-cart form-submit ajax-processed" type="submit"
                                                                name="op" value="Add to cart" tabindex="0"
                                                                style="display: none;">
                                                            <div class="uc_out_of_stock_html">
                                                                <div style="height: 35px;"><span style="color: red;"> <i class="fa-solid fa-square-xmark"></i> Out of stock</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xs-5 remove-padding text-right">
                                                <i class="fa-solid fa-heart"></i>
                                                {{-- <i class="fa-solid fa-heart gray"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-6">
                                <div class="col-xs-12 remove-padding product-item">
                                    <a href="/palmolive" class="item-img" tabindex="0">
                                        <img  
                                            src="{{ asset('images/products/product.png') }}"
                                            width="220" height="220" alt="">
                                        <span class="off-span">UP TO 70 %</span>
                                    </a>
                                    <p>Mup (Medical Union Pharma)</p>
                                    <a href="/palmolive" tabindex="0">PALMOLIVE </a>
                                    <h5>14 tab</h5>
                                    <h3>105.00 <i class="fa-solid fa-dollar-sign"></i> <span class="uc-price">150.00 <i class="fa-solid fa-dollar-sign"></i></span> </h3>
                                    <div class="clearfix"></div>
                                    <div class=" col-xs-12">
                                        <div class="col-xs-12 add-cart-main remove-padding">
                                            <div class="col-xs-7 remove-padding">
                                                <form action="/" method="post" 
                                                    class="uc-out-stock-processed">
                                                    <div>
                                                        <div class="form-actions form-wrapper" id="edit-actions--4"><input
                                                                class="list-add-to-cart form-submit ajax-processed" type="submit"
                                                                name="op" value="Add to cart" tabindex="0"
                                                                style="display: none;">
                                                            <div class="uc_out_of_stock_html">
                                                                <div style="height: 35px;"><span style="color: red;"> <i class="fa-solid fa-square-xmark"></i> Out of stock</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xs-5 remove-padding text-right">
                                                <i class="fa-solid fa-heart"></i>
                                                {{-- <i class="fa-solid fa-heart gray"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- /.section, /#content -->


            </div>
        </div>
    </div>
@endsection
