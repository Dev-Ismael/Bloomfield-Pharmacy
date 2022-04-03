@extends('layouts.web')

@section('content')
    <div id="shipping-page">
        <div class="section container remove-padding text-center faq-main margin-t-100 ">
            <h1 class="title text-bloder"> <i class="fa-solid fa-truck"></i> SHIPPING & DELIVARY </h1>
            <div class="row">

                <div class="col-xs-12 col-md-9 col-sm-8">



                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter">Shipping &amp; Delivery Coverage</h3>
                        <div class="col-xs-12 remove-padding links-main-fillter-side">
                            <div class="content col-xs-12 remove-padding" style="text-align: justify;">
                                <ul>
                                    <li>First Range: Cairo governorate &amp; some areas of Giza governorate.</li>
                                    <li>Second Range: all other governorates in Egypt.</li>
                                    <li>Third Range: international shipping.</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Shipping times</h3>
                        <div class="col-xs-12 remove-padding links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding" style="text-align: justify;">
                                <ul>
                                    <li>First Range:
                                        Fouda pharmacies deliver orders through the delivery team who is working in our
                                        diffuse branches within this range; and this process starts as soon as the order is
                                        submitted to our online portal, this process takes a time ranging from minutes to
                                        few hours usually during the same day except in some cases as follow:
                                        <ul>
                                            <li>When the order contain a requested quantity more than the normal quantities.
                                            </li>
                                            <li>When an item in the order is not available in the area near to the order
                                                address, in this case we will transfer the item from another area, and this
                                                process may take 1-3 days.</li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul>
                                    In all exceptional cases, we will notify the customer to ensure his approval for the
                                    delay.
                                    <li>Second Range:<br>
                                        Shipping to other governorates inside Egypt done through courier companies which
                                        contracted with us during the period ranging from 3-7 days according to the location
                                        and its distance from Cairo, note that the period is calculated beginning from the
                                        next day of payment receiving.</li>
                                    <li>Third Range: <br>
                                        Not activated yet.</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Shipping &amp; delivery charge</h3>
                        <div class="col-xs-12 remove-padding links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding" style="text-align: justify;">
                                <ul>
                                    <li>The shipping cost will be displayed before submitting the order, so the customer
                                        will be able to know the value of shipping charges before the completion of the
                                        purchase.
                                    </li>
                                    <li>Fouda pharmacies are keen to deliver the orders to you as soon as possible at the
                                        lowest cost and highest quality and therefore we rely on many policies and methods
                                        to achieve this goal as follows:
                                    </li>
                                </ul>
                                <li>First Range:<br>
                                    &nbsp;In order to deliver the orders at the lowest possible cost to the customers, we
                                    deliver the shipment directly from the branches which spread within the range instead of
                                    shipping from a central distribution unit to all areas so that the distance of delivery
                                    is close, the cost of delivery calculated on the basis of the distance from the customer
                                    address to the nearest branch and it is ranging from 5 <i class="fa-solid fa-dollar-sign"></i> to 50 <i class="fa-solid fa-dollar-sign"></i> according to the
                                    this distance.</li>
                                <li>Second Range:<br>
                                    We selected the best companies working in this field; The shipping cost is calculated
                                    according to the shipping price list of the courier company which will deliver the order
                                    to you, and we do not add any additional charges.</li>
                            </div>
                        </div>
                    </div>



                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Receipt of shipments</h3>
                        <div class="col-xs-12 remove-padding links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding" style="text-align: justify;">
                                <li>Fouda pharmacies are keen to deliver orders to customers at a time that suits them. We
                                    work 24 hours a day 7 days a week to provide the best service that suit your needs.</li>
                                <li>Fouda team will contact the customer prior to delivering the order to ensure that it
                                    will be delivered when the customer is available and ready to receive it.</li>
                                <ul> In case of shipping through a courier company</ul>
                                <li>The company will contact the customer to arrange the delivery time.</li>
                                <li>If the customer is not available when the order delivered, the company will make another
                                    trail after contacting the customer and ensure his availability.</li>
                                <li>if the company failed to deliver the order to the customer due to the unavailability of
                                    the customer or the customer didn't responded to the shipping trials; the company will
                                    return the order back to fouda and we will charge the customer the shipping fees only.
                                </li>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 fillter-side-main remove-padding">
                        <h3 class="slide-side-fillter links-colapsed">Products that not suitable for shipping</h3>
                        <div class="col-xs-12 remove-padding links-main-fillter-side" style="display: none">
                            <div class="content col-xs-12 remove-padding" style="text-align: justify;">
                                <li>Fouda pharmacy keen to deliver the products in the best condition, so we exclude some
                                    items which are not suitable for shipping conditions as:</li>
                                <ul>
                                    <li>Products which needs to be stored in the refrigerator.</li>
                                    <li>Products that can't be sold without delivering the original prescription (like
                                        insurance, and controlled medicines) </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    
                </div>


                <div class="col-xs-12 col-md-3 col-sm-4">
                    <div class="col-xs-12 remove-padding side-links-sub fillter-side-main">
                        <h5>OTHER LINKS </h5>
                        <a href="{{ route("about") }}">About Us</a>
                        <a href="{{ route("contact") }}">Contact Us</a>
                        <a href="/content/privacy-policy">Privacy Policy</a>
                        <a href="/content/terms-conditions">Terms &amp; Conditions</a>
                        <a href="/content/returns-exchange-policy">Return &amp; Exchange</a>
                        <a href="/faq">FAQS</a>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection
