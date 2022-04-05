<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!------- IE Compatibility Meta ------->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!---- Title ---->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!------- Theme Color meta ------->
    <meta name="theme-color" content="#2a8e82">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    <!------- FontAwesome  ------->
    <script src="https://kit.fontawesome.com/bc98e6aa51.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">




    <!------- App.css Style  ( Include Bootstrap )------->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!------------------- Theme Style ------------------->
    <link href="{{ asset('css/web/theme.css') }}" rel="stylesheet">
    <!------- Owl Carousel Style  ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!----------------- Custom Style  ------------------>
    <link href="{{ asset('css/web/custom.css') }}" rel="stylesheet">

</head>

<body>
    <div id="web">



        <!------------------------ NAVBAR -------------------->
        <div class="container-fluid head-main green-bg green-bg">
            <div class="container remove-padding header-main-cont">

                <!-- mobile menu  -->
                <div class="menu-main-mob visible-xs">

                    <div class="container">
                        <ul>
                            
                            <li>
                                <div class="col-xs-12 remove-padding search-main visible-xs">



                                    <form action="{{ route("search") }}" >
                                        <div>


                                            <input type="text"
                                                class="form-control" value="" placeholder="Search Products" size="15"
                                                maxlength="128" />
                                            <button class="btn icon-search"  />


                                        </div>
                                    </form>

                                </div>
                            </li>
                            
                            <li><a href="#" class="mob-shop-link"> <i class="fa-solid fa-list-ul"></i> Shop </a>
                                <div class="mob-shop-drop-dowm">

                                    <a href="fp/taxonomy/term/18671.html" class="shop1">Medications</a> <a
                                        href="fp/taxonomy/term/18673.html" class="shop2">Medical Supplies</a> <a
                                        href="fp/taxonomy/term/18675.html" class="shop3">Skin Care</a> <a
                                        href="fp/taxonomy/term/18676.html" class="shop4">Hair Care</a> <a
                                        href="fp/taxonomy/term/18674.html" class="shop5">Beaut</a> <a
                                        href="fp/taxonomy/term/18679.html" class="shop6">Perfumes /
                                        Deodorants</a>
                                    <a href="fp/taxonomy/term/18678.html" class="shop7">Mother / Baby Care</a>
                                    <a href="fp/taxonomy/term/18680.html" class="shop8">General Use</a> <a
                                        href="fp/taxonomy/term/18677.html" class="shop9">Body / Personal
                                        Care</a>
                                    <a href="fp/taxonomy/term/18672.html" class="shop10">Supplements /
                                        Vitamines</a>
                                </div>
                            </li>

                            <li><a href="{{ route("about") }}"> About Us</a></li>
                            <li><a href="node/430435.html"> Order a
                                    Prescription</a></li>


                        </ul>
                    </div>

                </div>
                <!-- navbar-content  -->
                <div id="navbar-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 logo-main">


                                <button class="js-menu menu visible-xs" type="button">
                                    <span class="bar"></span>
                                </button>


                                <a href="{{ route('home') }}"><img class="logo-white hidden-xs" src="/images/logo-white.png"></a>
                                <a href="{{ route('home') }}"><img class="logo hidden-xs" src="/images/logo.png"></a>
                                <a href="{{ route('home') }}"><img class="visible-xs logo-min" src="/images/logo-white.png"></a>

                            </div>

                            <div class="col-md-4 col-xs-2 menu-cont ">

                                <ul class="menu-main">
                                    <li class="shop-btn"><a href="#" class="shop">Shop</a>
                                        <div class="container shop-down remove-padding">
                                            <div class="shop-down-main">
                                                <div class="container shop-icons-perant remove-padding">
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-1 current" data-tab="tab-1">
                                                            <p>Medications</p>
                                                        </div>
                                                    </div>
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-2" data-tab="tab-2">
                                                            <p>Medical Supplies</p>
                                                        </div>
                                                    </div>
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-3" data-tab="tab-3">
                                                            <p>Skin Care</p>
                                                        </div>
                                                    </div>
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-4" data-tab="t</h2>ab-4">
                                                            <p>Hair Care</p>
                                                        </div>
                                                    </div>
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-5" data-tab="tab-5">
                                                            <p>Beauty</p>
                                                        </div>
                                                    </div>
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-6" data-tab="tab-6">
                                                            <p>Perfumes / Deodorants</p>
                                                        </div>
                                                    </div>
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-7" data-tab="tab-7">
                                                            <p>Mother / Baby Care</p>
                                                        </div>
                                                    </div>
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-8" data-tab="tab-8">
                                                            <p>General Use</p>
                                                        </div>
                                                    </div>
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-9" data-tab="tab-9">
                                                            <p>Body / Personal Care</p>
                                                        </div>
                                                    </div>
                                                    <div class="shop-icons-child">
                                                        <div class="icon-down-10" data-tab="tab-10">
                                                            <p>Supplements / Vitamines</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container remove-padding tabs-main">
                                                    <div class="col-xs-12 remove-padding current" id="tab-1">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18864.html">
                                                                    <h2>BRAIN & NERVOUS SYSTEM</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18875.html">
                                                                    <h2>EYE, EAR, AND NOSE</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18891.html">
                                                                    <h2>MOUTH & THROAT</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18897.html">
                                                                    <h2>RESPIRATORY SYSTEM</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18902.html">
                                                                    <h2>HEART & BLOOD VESSELS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18911.html">
                                                                    <h2>LIVER & DIGESTIVE SYSTEM</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18922.html">
                                                                    <h2>KIDNEY & URINARY SYSTEM</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18928.html">
                                                                    <h2>SKIN</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18941.html">
                                                                    <h2>PAIN, FEVER, INFLAMMATION, AND ALLERGY</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18947.html">
                                                                    <h2>INFECTIONS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18953.html">
                                                                    <h2>HORMONES</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18957.html">
                                                                    <h2>SPECIAL CASES</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18967.html">
                                                                    <h2>MEN'S HEALTH</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18973.html">
                                                                    <h2>WOMEN'S HEALTH</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18864.html">
                                                                    <h2>LABORATORY PREPARATIONS & INFUSIONS</h2>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 remove-padding" id="tab-2">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19018.html">
                                                                    <h2>Measuring & Testing Tools</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19024.html">
                                                                    <h2>BODY SUPPORT</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19043.html">
                                                                    <h2>COMPRESSION STOCKINGS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19048.html">
                                                                    <h2>FIRST AID</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19062.html">
                                                                    <h2>MEDICATION DELIVERY TOOLS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19068.html">
                                                                    <h2>COMPRESSES</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19075.html">
                                                                    <h2>MEDICAL SOAP</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19076.html">
                                                                    <h2>MOVEMENT AID</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19080.html">
                                                                    <h2>FRACTURES</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19084.html">
                                                                    <h2>OTHER</h2>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 remove-padding" id="tab-3">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19115.html">
                                                                    <h2>Eye Products</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19120.html">
                                                                    <h2>Skin Cleansing</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19125.html">
                                                                    <h2>skin wrinkles</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19122.html">
                                                                    <h2>Skin Moisturizing</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19123.html">
                                                                    <h2>Skin Nourishing</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19124.html">
                                                                    <h2>Skin Peeling</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19121.html">
                                                                    <h2>Skin Whitening</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19126.html">
                                                                    <h2>Skin Refresh</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19127.html">
                                                                    <h2>Sun Protection & Tanning</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19130.html">
                                                                    <h2>Pimples Products</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19131.html">
                                                                    <h2>Special Products</h2>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 remove-padding" id="tab-4">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19132.html">
                                                                    <h2>Hair Washing</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19137.html">
                                                                    <h2>Hair Styling</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19145.html">
                                                                    <h2>Hair Nourishing</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19152.html">
                                                                    <h2>Hair Coloring</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19153.html">
                                                                    <h2>Hair Straightening</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19156.html">
                                                                    <h2>Hair Treatments</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19163.html">
                                                                    <h2>Hair Tools</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19166.html">
                                                                    <h2>Hair Electric Devices</h2>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 remove-padding" id="tab-5">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19097.html">
                                                                    <h2>Makeup</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19109.html">
                                                                    <h2>Beauty Tools</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19111.html">
                                                                    <h2>Eye Lashes</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19112.html">
                                                                    <h2>Artificial Nails</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19113.html">
                                                                    <h2>Nail Polish</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19114.html">
                                                                    <h2>lenses</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 remove-padding" id="tab-6">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19206.html">
                                                                    <h2>Men</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19207.html">
                                                                    <h2>Women</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19208.html">
                                                                    <h2>Kids</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19209.html">
                                                                    <h2>Body Splash</h2>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 remove-padding" id="tab-7">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19199.html">
                                                                    <h2>Pregnancy</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19200.html">
                                                                    <h2>Breastfeeding</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19201.html">
                                                                    <h2>Carriage Tools</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19202.html">
                                                                    <h2>Grooming Products</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19203.html">
                                                                    <h2>Milk & Food</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19204.html">
                                                                    <h2>Feeding Tools</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19205.html">
                                                                    <h2>General Tools & Devices</h2>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 remove-padding" id="tab-8">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19210.html">
                                                                    <h2>Books & Magazines</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19211.html">
                                                                    <h2>Eye Glasses</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19212.html">
                                                                    <h2>Gums & Candy</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19213.html">
                                                                    <h2>Toys</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19214.html">
                                                                    <h2>Sports Products</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19215.html">
                                                                    <h2>Sports Tools & devices</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19199.html">
                                                                    <h2>Home Products</h2>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 remove-padding" id="tab-9">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19169.html">
                                                                    <h2>Body Shaping</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19170.html">
                                                                    <h2>body whitening</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19171.html">
                                                                    <h2>Body Moisturizing</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19172.html">
                                                                    <h2>Body Peeling</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19173.html">
                                                                    <h2>Body Massage</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19174.html">
                                                                    <h2>BODY CARE DEVICES</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19175.html">
                                                                    <h2>Hand & Nail Care</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19176.html">
                                                                    <h2>Foot Care</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19177.html">
                                                                    <h2>Mouth & Dental Care</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19183.html">
                                                                    <h2>Men Personal Care</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19185.html">
                                                                    <h2>HAIR REMOVAL PRODUCTS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19180.html">
                                                                    <h2>Women Personal Care</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19188.html">
                                                                    <h2>intimacy products</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19190.html">
                                                                    <h2>HYGIENE PRODUCTS</h2>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 remove-padding" id="tab-10">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18989.html">
                                                                    <h2>VITAMINS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/18996.html">
                                                                    <h2>MINERALS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19000.html">
                                                                    <h2>VITAMINS & MINERALS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19001.html">
                                                                    <h2>MULTIVITAMINS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19006.html">
                                                                    <h2>NUTRITION SUPPLEMENTS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19015.html">
                                                                    <h2>HERBAL PRODUCTS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19016.html">
                                                                    <h2>GENERAL TONICS & STIMULANTS</h2>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <a href="fp/taxonomy/term/19017.html">
                                                                    <h2>ANTI-OXIDANTS</h2>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="node/430435.html"> Order a
                                            Prescription</a></li>
                                    <li><a href="{{ route("about") }}"> About Us</a>
                                    </li>
                                </ul>


                            </div>

                            <div class="col-md-4 col-xs-2 remove-padding search-main ">


                                <form action="{{ route("search") }}" >
                                    <div>


                                        <input type="text"class="form-control" value="" placeholder="Search Products" size="15"
                                            maxlength="128" />
                                        <button class="btn icon-search"  />
                                        
                                        


                                    </div>
                                </form>

                            </div>

                            <div class="col-md-2 col-xs-4 head-icon-main">
                                <ul>



                                    <li> <a href="#" class="profile-main text-center pro-button" id="pro-button">
                                            <p>LogIn/SignUp</p>
                                        </a>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <a href="#" onclick="myModule_ajax_load()" class="cart-main text-center"
                                            id="cart-button">
                                            <p>Cart</p>
                                            <span> 0 </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>








        <!----------------- SIDBAR LOGIN/SIGUP  --------------->
        <div id="hide-side-bar" class="hide-side-bar">
            <button class="click-me">x</button>
            <div class="col-xs-12  log-side-bar">
                <a href="#" class="login-btn" data-toggle="modal" data-target="#login">log in</a>
                <a href="#" class="singup-btn" data-toggle="modal" data-target="#register">Sign Up</a>
            </div>
            <div class="col-xs-12 pro-icons-main disable-icons">
                <a href="#" class="orders-icon">My Orders</a>
                <a href="#" class="wishlist-icon">My Wishlist</a>
                <a href="#" class="subscribed-icon">My Subscribed Orders</a>
                <a href="#" class="indicator-icon">My Health Indicator</a>
                <a href="#" class="prescriptions-icon">My Prescriptions</a>
                <a href="#" class="addresses-icon">My Saved Addresses</a>
                <a href="#" class="articles-icon remove-border">My Saved Articles</a>
            </div>
        </div>








        <!----------------- SIDBAR LOGIN FORM --------------->
        <div class="modal" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-body row">
                        <div class="col-md-6 col-sm-12 form-main">
                            <h2>HAVE AN ACCOUNT</h2>
                            <p>Please log in to proceed to checkout</p>
                            <div class="col-xs-12 lgo-input-main">
                                <form method="post" id="user-login" accept-charset="UTF-8">
                                    <div>
                                        <div class="form-item form-type-textfield form-item-name">
                                            <label class="element-invisible" for="edit-name">Softic Code <span
                                                    class="form-required"
                                                    title="This field is required.">*</span></label>
                                            <input placeholder="Username" type="text" id="edit-name" name="name"
                                                value="" size="60" maxlength="60" class="form-text required" />
                                        </div>
                                        <div class="form-item form-type-password form-item-pass">
                                            <label class="element-invisible" for="edit-pass">Password <span
                                                    class="form-required"
                                                    title="This field is required.">*</span></label>
                                            <input placeholder="Password" type="password" id="edit-pass" name="pass"
                                                size="60" maxlength="128" class="form-text required" />
                                        </div>

                                        <div class="form-actions form-wrapper" id="edit-actions--26"><input
                                                type="submit" id="edit-submit" name="op" value="Log in"
                                                class="form-submit" /></div>
                                        <div class="hybridauth-widget-wrapper">
                                            <div class="item-list">
                                                <h3>Or log in with...</h3>
                                                <ul class="hybridauth-widget">
                                                    <li> <i class="fa-brands fa-google-plus"></i> </li>
                                                    <li> <i class="fa-brands fa-facebook-square"></i> </li>
                                                </ul>
                                            </div>
                                        </div>


                                        <input type="submit" id="edit-submit-google" name="op" value=""
                                            class="form-submit" />
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 link-main-reg">
                            <h2>NO ACCOUNT YET?!</h2>
                            <p>Create an account in order to checkout</p>
                            <a href="#" data-toggle="modal" data-target="#register" data-dismiss="modal">CREATE AN
                                ACCOUNT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!----------------- SIDBAR SignUp FORM --------------->


        <div class="modal" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <div class="modal-body row">
                        
                        <div class="col-md-6 col-sm-12 link-main-reg">
                            <h2>HAVE AN ACCOUNT!</h2>
                            <p>Please log in to proceed to checkout</p>
                            <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal">LOG IN &
                                CHECKOUT</a>

                        </div>


                        <div class="col-md-6 col-sm-12 form-main form-main2">
                            <h2>NO ACCOUNT YET</h2>
                            <p>Create an account in order to checkout</p>
                            <div class="col-xs-12 remove-padding other-way-login">
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                </div>
                            </div>


                            <form class="user-info-from-cookie ds-2col-stacked-fluid" enctype="multipart/form-data"
                                action="#" method="post" id="user-register-form"
                                accept-charset="UTF-8">
                                <div>
                                    <div class="ds-2col-stacked-fluid  ds-form clearfix">


                                        <div class="group-header">
                                            <div class="field-type-text field-name-field-mobile field-widget-text-textfield form-wrapper"
                                                id="edit-field-mobile">
                                                <div id="field-mobile-add-more-wrapper">
                                                    <div
                                                        class="form-item form-type-textfield form-item-field-mobile-und-0-value">
                                                        <label for="edit-field-mobile-und-0-value">Mobile <span
                                                                class="form-required"
                                                                title="This field is required.">*</span></label>
                                                        <input class="text-full form-text required" type="text"
                                                            id="edit-field-mobile-und-0-value"
                                                            name="field_mobile[und][0][value]" value="" size="60"
                                                            maxlength="255" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="edit-account" class="form-wrapper">
                                                <div class="form-item form-type-textfield form-item-name">
                                                    <label for="edit-name--3">Username <span class="form-required"
                                                            title="This field is required.">*</span></label>
                                                    <input class="username form-text required" type="text"
                                                        id="edit-name--3" name="name" value="" size="60"
                                                        maxlength="60" />
                                                   
                                                </div>
                                                <div class="form-item form-type-textfield form-item-mail">
                                                    <label for="edit-mail">E-mail address <span class="form-required"
                                                            title="This field is required.">*</span></label>
                                                    <input type="text" id="edit-mail" name="mail" value="" size="60"
                                                        maxlength="254" class="form-text required" />
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-actions form-wrapper" id="edit-actions--28"><input type="submit"
                                            id="edit-submit--3" name="op" value="Create new account"
                                            class="form-submit" /></div>
                                            <div class="hybridauth-widget-wrapper">
                                                <div class="item-list">
                                                    <h3>Or log in with...</h3>
                                                    <ul class="hybridauth-widget">
                                                        <li> <i class="fa-brands fa-google-plus"></i> </li>
                                                        <li> <i class="fa-brands fa-facebook-square"></i> </li>
                                                    </ul>
                                                </div>
                                            </div>


                                </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>














        @yield('content')






        <div class="container-fluid footer-main">
            <img src="{{ asset('images/transparent-logo.png') }}" class="foot-bg">
            <div class="container remove-padding">


                <ul class="fot-links col-sm-6 col-xs-12">

                    <li class="leaf "><a href="{{ route('contact') }}">CONTACT US</a></li>
                    <li class="leaf "><a href="{{ route('shipping') }}">SHIPPING
                            &amp; DELIVERY</a></li>
                    <li class="leaf"><a href="{{ route("returns") }}">RETURNS
                            &amp; EXCHANGE</a></li>
                    <li class="leaf"><a href="{{ route('privacy') }}">PRIVACY
                            POLICY</a></li>
                </ul>
                <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-2 news-letter-main">
                    <div class="prefix">Subscribe now for news letter and get notified
                        with the latest offers and featured products</div>
                    <form action="" method="post" id="newsletter-subscribe-form" accept-charset="UTF-8">
                        <div>
                            <div class="form-item form-type-textfield form-item-email">
                                <input type="text" id="edit-email" name="email" placeholder="user@example.com" size="20"
                                    maxlength="128" class="form-text required" />
                            </div>
                            <div id="newsletter-error"></div>
                            <div id="subscribe"><input type="submit" id="edit-newsletter-submit" name="op"
                                    value="Subscribe" class="form-submit" /></div>
                        </div>
                    </form>
                    <div class="suffix"></div>
                </div>


                <div class="clearfix"></div>


                <div class="col-md-4 col-xs-12 remove-padding text-left-md foot-foda-logo">
                    <img src="/images/logo-white.png">

                </div>

                <div class="col-md-4 offset-md-4 col-xs-12 remove-padding scial-fot">


                    <a href="" class="face-icon"><svg role="img"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="
                            border-radius: 5px;
                        ">
                            <path
                                d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294H9.689v-3.621h3.129V8.41c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63H16.56V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .593 23.408 0 22.676 0" />
                        </svg></a>
                    <a class="tweet-icon" href="#" style="border-radius: 5px"><svg role="img" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" style="border-radius: 5px">
                            <path
                                d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z" />
                        </svg></a>
                    <a href="#" class="insta-icon"><svg role="img" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                        </svg></a>
                    <a href="#" class="tube-icon" style="margin-bottom: 15px"><svg role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z" />
                        </svg></a>
                    <div class="clearfix"></div>
                    <p>
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        {{ config('app.name') }}
                    </p>

                </div>

            </div>
        </div>


















        <div class="scrollup">
            <a href="#"></a>
        </div>

    </div>




    <!---------------- Scripts ----------------------->
    <!------ App.js (include Bootstrap & jquery) ----->
    <script src="{{ asset('js/app.js') }}"></script>
    <!---------------- Owl Carousel -------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!---------------- File.Js -------------------->
    <script src="{{ asset('js/web/file.js') }}"></script>

</body>

</html>
