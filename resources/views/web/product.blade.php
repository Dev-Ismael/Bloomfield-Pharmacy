@extends('layouts.web')

@section('content')
    <div id="product-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <div class="container-fluid content remove-padding">
    
    
                <div class="row text-left">
                    <div class="col-md-6"> 
                        <div class="Product-img-box">
                            <img src="{{ asset("images/products/product.png") }}" alt="product-img" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6">


                        <div class="product-content product-d ">
                            <h3> Newclav 642.9 Mg / 5 Ml 100 Ml suspension </h3>
                            <p>Mup (Medical Union Pharma)</p>
                            <h4> 60.00 $ </h4>
                            <p class="description">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of 
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                            </p>
                        </div>

                    </div>
                </div>
    
    
    
    
            </div>
        </div>
    </div>
@endsection
