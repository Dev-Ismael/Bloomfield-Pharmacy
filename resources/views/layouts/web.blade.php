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
    <meta name="theme-color" content="#ffffff"> 

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    <!------- FontAwesome  ------->
    <script src="https://kit.fontawesome.com/bc98e6aa51.js" crossorigin="anonymous"></script>


    <!-- Scripts  (include Bootstrap & jquery)   -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles  (include Bootstrap)   -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/web/theme.css') }}" rel="stylesheet">

</head>
<body>
    <div id="web">
        



        <div class="container-fluid head-main green-bg green-bg">
            <div class="container remove-padding header-main-cont">
    
                <!-- mobile menu  -->
    
                <button class="js-menu menu visible-xs" type="button">
                    <span class="bar"></span>
                </button>
                <div class="menu-main-mob visible-xs">
    
                    <ul>
                        <li><a href="#" class="mob-shop-link">shop</a>
                            <div class="mob-shop-drop-dowm">
    
                                <a href="fp/taxonomy/term/18671.html" class="shop1">Medications</a> <a
                                    href="fp/taxonomy/term/18673.html" class="shop2">Medical Supplies</a> <a
                                    href="fp/taxonomy/term/18675.html" class="shop3">Skin Care</a> <a
                                    href="fp/taxonomy/term/18676.html" class="shop4">Hair Care</a> <a
                                    href="fp/taxonomy/term/18674.html" class="shop5">Beaut</a> <a
                                    href="fp/taxonomy/term/18679.html" class="shop6">Perfumes / Deodorants</a> <a
                                    href="fp/taxonomy/term/18678.html" class="shop7">Mother / Baby Care</a> <a
                                    href="fp/taxonomy/term/18680.html" class="shop8">General Use</a> <a
                                    href="fp/taxonomy/term/18677.html" class="shop9">Body / Personal Care</a> <a
                                    href="fp/taxonomy/term/18672.html" class="shop10">Supplements / Vitamines</a>
                            </div>
                        </li>
    
                        <li><a href="content/about-us.html"> <i class="fa-solid fa-circle-info"></i> About Us</a></li>
                        <li><a href="node/430435.html"> <i class="fa-solid fa-file-medical"></i> Order a Prescription</a></li>
    
    
    
                    </ul>
    
                    <div class="col-xs-12">
                        <div class="col-xs-12 remove-padding search-main visible-xs">
    
    
    
                            <form action="https://www.fouda.com/" method="post" id="search-block-form" accept-charset="UTF-8">
                                <div>
    
    
                                    <input type="text" id="edit-search-block-form--2" name="search_block_form"
                                        class="form-control" value="" placeholder="Search Products" size="15"
                                        maxlength="128" />
                                    <button class="btn icon-search" id="edit-submit--2" type="submit" />
                                    <input type="hidden" name="form_build_id"
                                        value="form-pVD6Ingwo5dkVKP4xGH_gZUl2WxIndgoQincWHFPVZc" />
                                    <input type="hidden" name="form_id" value="search_block_form" />
    
    
                                </div>
                            </form>
    
                        </div>
                    </div>
                </div>
    
                <!-- end mobile menu  -->
                <div class="col-md-2 col-sm-2 col-xs-4 logo-main">
    
    
                    <a href="index.html"><img class="logo-white hidden-xs"
                            src="sites/all/themes/custom/fp/img/logo-white.png"></a>
                    <a href="index.html"><img class="logo hidden-xs" src="sites/all/themes/custom/fp/img/logo.png"></a>
                    <a href="index.html"><img class="visible-xs" src="sites/all/themes/custom/fp/img/mob-logo.png"></a>
                </div>
    
                <div class="col-md-5 col-sm-5 menu-cont hidden-xs">
    
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
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18864.html">
                                                        <h2>BRAIN & NERVOUS SYSTEM</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18875.html">
                                                        <h2>EYE, EAR, AND NOSE</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18891.html">
                                                        <h2>MOUTH & THROAT</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18897.html">
                                                        <h2>RESPIRATORY SYSTEM</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18902.html">
                                                        <h2>HEART & BLOOD VESSELS</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18911.html">
                                                        <h2>LIVER & DIGESTIVE SYSTEM</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18922.html">
                                                        <h2>KIDNEY & URINARY SYSTEM</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18928.html">
                                                        <h2>SKIN</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18941.html">
                                                        <h2>PAIN, FEVER, INFLAMMATION, AND ALLERGY</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18947.html">
                                                        <h2>INFECTIONS</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18953.html">
                                                        <h2>HORMONES</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18957.html">
                                                        <h2>SPECIAL CASES</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18967.html">
                                                        <h2>MEN'S HEALTH</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18973.html">
                                                        <h2>WOMEN'S HEALTH</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18864.html">
                                                        <h2>LABORATORY PREPARATIONS & INFUSIONS</h2>
                                                    </a>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="col-xs-12 remove-padding" id="tab-2">
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19018.html">
                                                        <h2>Measuring & Testing Tools</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19024.html">
                                                        <h2>BODY SUPPORT</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19043.html">
                                                        <h2>COMPRESSION STOCKINGS</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19048.html">
                                                        <h2>FIRST AID</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19062.html">
                                                        <h2>MEDICATION DELIVERY TOOLS</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19068.html">
                                                        <h2>COMPRESSES</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19075.html">
                                                        <h2>MEDICAL SOAP</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19076.html">
                                                        <h2>MOVEMENT AID</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19080.html">
                                                        <h2>FRACTURES</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19084.html">
                                                        <h2>OTHER</h2>
                                                    </a>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="col-xs-12 remove-padding" id="tab-3">
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19115.html">
                                                        <h2>Eye Products</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19120.html">
                                                        <h2>Skin Cleansing</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19125.html">
                                                        <h2>skin wrinkles</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19122.html">
                                                        <h2>Skin Moisturizing</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19123.html">
                                                        <h2>Skin Nourishing</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19124.html">
                                                        <h2>Skin Peeling</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19121.html">
                                                        <h2>Skin Whitening</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19126.html">
                                                        <h2>Skin Refresh</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19127.html">
                                                        <h2>Sun Protection & Tanning</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19130.html">
                                                        <h2>Pimples Products</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19131.html">
                                                        <h2>Special Products</h2>
                                                    </a>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="col-xs-12 remove-padding" id="tab-4">
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19132.html">
                                                        <h2>Hair Washing</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19137.html">
                                                        <h2>Hair Styling</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19145.html">
                                                        <h2>Hair Nourishing</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19152.html">
                                                        <h2>Hair Coloring</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19153.html">
                                                        <h2>Hair Straightening</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19156.html">
                                                        <h2>Hair Treatments</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19163.html">
                                                        <h2>Hair Tools</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19166.html">
                                                        <h2>Hair Electric Devices</h2>
                                                    </a>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="col-xs-12 remove-padding" id="tab-5">
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19097.html">
                                                        <h2>Makeup</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19109.html">
                                                        <h2>Beauty Tools</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19111.html">
                                                        <h2>Eye Lashes</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19112.html">
                                                        <h2>Artificial Nails</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19113.html">
                                                        <h2>Nail Polish</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19114.html">
                                                        <h2>lenses</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
    
                                        </div>
                                        <div class="col-xs-12 remove-padding" id="tab-6">
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19206.html">
                                                        <h2>Men</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19207.html">
                                                        <h2>Women</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19208.html">
                                                        <h2>Kids</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19209.html">
                                                        <h2>Body Splash</h2>
                                                    </a>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="col-xs-12 remove-padding" id="tab-7">
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19199.html">
                                                        <h2>Pregnancy</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19200.html">
                                                        <h2>Breastfeeding</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19201.html">
                                                        <h2>Carriage Tools</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19202.html">
                                                        <h2>Grooming Products</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19203.html">
                                                        <h2>Milk & Food</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19204.html">
                                                        <h2>Feeding Tools</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19205.html">
                                                        <h2>General Tools & Devices</h2>
                                                    </a>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="col-xs-12 remove-padding" id="tab-8">
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19210.html">
                                                        <h2>Books & Magazines</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19211.html">
                                                        <h2>Eye Glasses</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19212.html">
                                                        <h2>Gums & Candy</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19213.html">
                                                        <h2>Toys</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19214.html">
                                                        <h2>Sports Products</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19215.html">
                                                        <h2>Sports Tools & devices</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19199.html">
                                                        <h2>Home Products</h2>
                                                    </a>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="col-xs-12 remove-padding" id="tab-9">
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19169.html">
                                                        <h2>Body Shaping</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19170.html">
                                                        <h2>body whitening</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19171.html">
                                                        <h2>Body Moisturizing</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19172.html">
                                                        <h2>Body Peeling</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19173.html">
                                                        <h2>Body Massage</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19174.html">
                                                        <h2>BODY CARE DEVICES</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19175.html">
                                                        <h2>Hand & Nail Care</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19176.html">
                                                        <h2>Foot Care</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19177.html">
                                                        <h2>Mouth & Dental Care</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19183.html">
                                                        <h2>Men Personal Care</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19185.html">
                                                        <h2>HAIR REMOVAL PRODUCTS</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19180.html">
                                                        <h2>Women Personal Care</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19188.html">
                                                        <h2>intimacy products</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19190.html">
                                                        <h2>HYGIENE PRODUCTS</h2>
                                                    </a>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="col-xs-12 remove-padding" id="tab-10">
                                            <div class="col-md-10 col-sm-3">
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18989.html">
                                                        <h2>VITAMINS</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/18996.html">
                                                        <h2>MINERALS</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19000.html">
                                                        <h2>VITAMINS & MINERALS</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19001.html">
                                                        <h2>MULTIVITAMINS</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19006.html">
                                                        <h2>NUTRITION SUPPLEMENTS</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19015.html">
                                                        <h2>HERBAL PRODUCTS</h2>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-3">
                                                    <a href="fp/taxonomy/term/19016.html">
                                                        <h2>GENERAL TONICS & STIMULANTS</h2>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 col-sm-3">
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
                        <li><a href="node/430435.html"> <i class="fa-solid fa-file-medical"></i> Order a Prescription</a></li>
                        <li><a href="content/about-us.html"> <i class="fa-solid fa-circle-info"></i> About Us</a></li>
                    </ul>
    
    
                </div>
    
    
                <div class="col-md-3 col-sm-3 remove-padding search-main hidden-xs">
    
    
                    <form action="https://www.fouda.com/" method="post" id="search-block-form" accept-charset="UTF-8">
                        <div>
    
    
                            <input type="text" id="edit-search-block-form--2" name="search_block_form" class="form-control"
                                value="" placeholder="Search Products" size="15" maxlength="128" />
                            <button class="btn icon-search" id="edit-submit--2" type="submit" />
                            <input type="hidden" name="form_build_id"
                                value="form-pVD6Ingwo5dkVKP4xGH_gZUl2WxIndgoQincWHFPVZc" />
                            <input type="hidden" name="form_id" value="search_block_form" />
    
    
                        </div>
                    </form>
    
                </div>
    
                <div class="col-md-2 col-sm-2 head-icon-main">
                    <ul>
    
    
    
                        <li> <a href="#" class="profile-main text-center pro-button" id="pro-button">
                                <p>LogIn/SignUp</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="myModule_ajax_load()" class="cart-main text-center" id="cart-button">
                                <p>Cart</p>
                                <span> 0 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>




        @yield('content')








    </div>
</body>
</html>
