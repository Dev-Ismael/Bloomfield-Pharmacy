@extends('layouts.web')

@section('content')
    <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
        <h1 class="title text-bloder"> <i class="fa-solid fa-magnifying-glass"></i> Search results... </h1>
        <div class="container-fluid content remove-padding">
            <div class="container remove-padding">



                <div class=" gategory-grids text-center remove-padding row">
                    <!-- filter -->
                    <div class=" col-xs-12  col-md-3 col-sm-4">

                        <div id="block-facetapi-apizx0dwq8pu7f530hjzuy2kolvt5gic"
                            class="col-xs-12 fillter-side-main remove-padding block block-facetapi block--ajax_facets">

                            <h3 class="slide-side-fillter">Filter by offer:</h3>
                            <div class="col-xs-12 remove-padding links-main-fillter-side" style="display: block;">
                                <div class="col-xs-12 remove-padding">

                                </div>
                            </div>
                        </div>

                        <div id="block-facetapi-diajxwumnecbl7lunq01rqxh6lygbpte"
                            class="col-xs-12 fillter-side-main remove-padding block block-facetapi block--ajax_facets">

                            <h3 class="slide-side-fillter links-colapsed">Filter by product type:</h3>
                            <div class="col-xs-12 remove-padding links-main-fillter-side" style="display: none;">
                                <div class="col-xs-12 remove-padding">

                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- End filter -->
                    <div class=" col-xs-12 col-md-9 col-sm-8 remove-padding">


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
