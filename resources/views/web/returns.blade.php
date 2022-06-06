@extends('layouts.web')

@section('content')
    <div id="returns-page">
        <div class="section container remove-padding text-center faq-main section-h2 margin-t-100 ">
            <h4 class="title text-bloder"> <i class="fa-solid fa-rotate-left"></i> RETURNS & EXCHANGE POLICY </h1>

            <div class="row">

                <div class="col-xs-12 col-md-9 col-sm-8">

                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Return the order:</h3>
                        <div class="content col-xs-12 remove-padding  links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding ">
                                <p> The customer may return the order fully or partially according to the return policy if
                                    the
                                    products are valid for return. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Products allowed for return:</h3>
                        <div class="content col-xs-12 remove-padding  links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding ">
                                <p> All products purchased through the Online service are allowed to be returned except for
                                    products that perishable or that may deteriorate, which altering its effectiveness such
                                    as:
                                    <br> - Products that are kept in the refrigerator.<br> - Children's milk.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed"> Return Acceptance Period: </h3>
                        <div class="content col-xs-12 remove-padding  links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding ">
                                <p> Returns are accepted within a period of 14 days from the date of receipt of the
                                    application.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Terms of Acceptance:</h3>
                        <div class="content col-xs-12 remove-padding  links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding ">
                                <p>In order to maintain the safety of products and their effectiveness, it is required that
                                    the
                                    products returned to fulfill the following conditions: <br>
                                    - The package and the product should be in good condition and identical to the condition
                                    in
                                    which it was received<br>
                                    - Non-decomposition of product package.<br>
                                    - The stickers or barcodes are not removed from the packages.<br>
                                    - The product not used or tried. <br>
                                    - commitment to the period of acceptance of the return <br>
                                    - providing the purchase invoice.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Return process:</h3>
                        <div class="content col-xs-12 remove-padding  links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding ">
                                <p>Bloomfiled Pharmacy  are keen to facilitate the return process and make it documented by time
                                    and
                                    date to protect the rights of customers. <br>
                                    If you want to make a return, please follow these steps: <br>
                                    1. The customer will enter the contact us page and specify a return request in the
                                    address
                                    of the message <br>
                                    2. Then the customer will fill out the personal data (address, phone and e-mail) <br>
                                    3. The customer will fill in the data of the return and then press Send. <br>
                                    The customer will then receive an e-mail message with details of the return process </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Place of returning the products and taking the refund:
                        </h3>
                        <div class="content col-xs-12 remove-padding  links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding ">
                                <p> The customer can deliver the orders or products that he wishes to return to the nearest
                                    branch of Bloomfiled Pharmacy , which located in Cairo and Giza. In this case, the return
                                    will
                                    be made immediately if the return complies with the conditions mentioned in the return
                                    policy without any fees. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Return from home:</h3>
                        <div class="content col-xs-12 remove-padding  links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding ">
                                <p>To facilitate for our customers; Bloomfiled Pharmacy  provide exceptional service, which is
                                    the
                                    possibility of receiving returns from home if the client wishes to do so, taking into
                                    consideration the following rules which applies only for return from home: <br>
                                    - The shipping agent role is limited to receiving the products only and has no right to
                                    accept the return. <br>
                                    - The return is accepted only after examination in the company or branch from which the
                                    order was delivered, and after confirmation that it meets the conditions of acceptance
                                    of
                                    products returned. <br>
                                    - The customer shall pay for the shipping charges for the return which are the same as
                                    the
                                    delivery charges and it will be deducted from the product price. <br>
                                    - If the product does not comply with the return conditions mentioned in the return
                                    policy,
                                    the return will not accepted and is charged again to the customer with the customer
                                    paying
                                    the return shipping charges. <br>
                                    - Refunds are paid in cash by placing them under the name of the customer in Fawry
                                    service,
                                    where the customer can receive the refund from any Fawry machine after receiving the
                                    reference number of the amount due. <br>
                                    - The amounts paid through credit cards are returned to the customer's bank account.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-xs-12 col-md-3 col-sm-4">
                    <div class="content col-xs-12 remove-padding  side-links-sub fillter-side-main p-5">
                        <h5>OTHER LINKS </h5>
                        <a href="{{ route("about") }}">About Us</a>
                        <a href="{{ route("contact") }}">Contact Us</a>
                        <a href="{{ route("privacy") }}">Privacy Policy</a>
                        <a href="{{ route("returns") }}">Return &amp; Exchange</a>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
