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
    <link href="{{ asset('css/web/app.css') }}" rel="stylesheet">
    <!------------------- Theme Style ------------------->
    <link href="{{ asset('css/web/theme.css') }}" rel="stylesheet">
    <!------- Owl Carousel Style  ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!----------------- Sweet Alert Style  ------------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css"
        integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                                <div class="col-xs-12 search-main visible-xs">



                                    <form action="{{ route('search') }}" method="POST">
                                        <div>
                                            @csrf
                                            <input type="text" name="searchQuery" class="form-control @error('search') is-invalid @enderror" placeholder="Search Products..." autocomplete="off" minlength="3" maxlength="55"required/>
                                            <button type="submit" class="btn icon-search"></button>
                                        </div>
                                    </form>



                                </div>
                            </li>

                            <li><a href="#" class="mob-shop-link"> <i class="fa-solid fa-list-ul"></i> Shop </a>
                                <div class="mob-shop-drop-dowm">
                                    @php
                                        $categories = App\Models\Category::with('subcategories')->get();
                                    @endphp
                                    @foreach ( $categories as $key => $category )
                                        <div class="link-box d-flex">
                                            <span class="category-icon-sm" style="height: 30px ; background-image: url('/images/categories/{{$category->icon}}')">
                                            </span>
                                            @if ( isset( $category->subcategories[0] ) )
                                                <a href="{{ route('category',[ $category->slug , $category->subcategories[0]->slug ]) }}"> {{ $category->title }} </a>
                                                @else
                                                <a href="#"> {{ $category->title }} </a>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </li>

                            <li><a href="{{ route('about') }}"> About Us</a></li>
                            <li>
                                @auth
                                    <a href="{{ route('order_prescription') }}"> Order a Prescription </a>
                                @else
                                    <a href="#" data-toggle="modal" data-target="#login">Order a Prescription</a>
                                @endauth
                            </li>


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


                                <a href="{{ route('home') }}"><img class="logo-white hidden-xs"
                                        src="/images/logo-white.png"></a>
                                <a href="{{ route('home') }}"><img class="logo hidden-xs" src="/images/logo.png"></a>
                                <a href="{{ route('home') }}"><img class="visible-xs logo-min"
                                        src="/images/logo-white.png"></a>

                            </div>

                            <div class="col-md-4 col-xs-2 menu-cont ">

                                <ul class="menu-main">
                                    <li class="shop-btn"><a href="#" class="shop">Shop</a>
                                        <div class="container shop-down remove-padding">
                                            <div class="shop-down-main">

                                                <div class="container shop-icons-perant remove-padding">
                                                    @foreach ( $categories as $key => $category )
                                                        <div class="shop-icons-child  {{ $key == 0 ? 'current' : '' }}" data-tab="tab-{{$key + 1}}">
                                                            <span class="icon category-icon category-{{$key + 1}}"
                                                                style="background-image: url('/images/categories/{{$category->icon}}')">
                                                            </span>
                                                            <div class="icon-down-{{$key + 1}}">
                                                                <p>{{ $category->title }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="container remove-padding tabs-main">


                                                    @foreach ( $categories as $key => $category )
                                                        <div class="col-xs-12 remove-padding  {{ $key == 0 ? 'current' : '' }}" id="tab-{{$key + 1}}">
                                                            <div class="col-md-12 row">
                                                                @foreach ( $category->subcategories as $subcategory )
                                                                    <div class="col-md-6 col-lg-4">
                                                                        <a href="{{ route('category',[ $category->slug , $subcategory->slug ]) }}">
                                                                            <h2> {{ $subcategory->title }} </h2>
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        @auth
                                            <a href="{{ route('order_prescription') }}"> Order a Prescription </a>
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#login">Order a Prescription</a>
                                        @endauth
                                    </li>
                                    <li><a href="{{ route('about') }}"> About Us</a>
                                    </li>
                                </ul>


                            </div>

                            <div class="col-md-4 col-xs-2 remove-padding search-main ">



                                <form action="{{ route('search') }}" method="POST">
                                    <div>
                                        @csrf
                                        <input type="text" name="searchQuery" class="form-control @error('search') is-invalid @enderror" placeholder="Search Products..." autocomplete="off" minlength="3" maxlength="55"required/>
                                        <button type="submit" class="btn icon-search"></button>
                                    </div>
                                </form>


                            </div>

                            <div class="col-md-2 col-xs-4 head-icon-main">
                                <ul>
                                    <li> <a href="#" class="profile-main text-center pro-button" id="pro-button">
                                            @if (Auth::check())
                                                <p>{{ Str::ucfirst( Auth::user()->name ) }}</p>
                                            @else
                                                <p>LogIn/SignUp</p>
                                            @endif
                                        </a>
                                    </li>

                                    <li>
                                        @auth
                                            @php
                                                $user = App\Models\User::where('id' , Auth::id() )->with('cart_products')->first();
                                                $cart_products = count($user->cart_products);
                                                if( $cart_products > 9 ){
                                                    $cart_products = '+9';
                                                }
                                            @endphp
                                            <a href="{{ route('cart') }}" class="cart-main text-center" id="cart-button">
                                                <p>Cart</p>
                                                <span> {{ $cart_products }} </span>
                                            </a>
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#login" class="cart-main text-center" id="cart-button">
                                                <p>Cart</p>
                                                <span> 0 </span>
                                            </a>
                                        @endauth
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>








        <!----------------- SIDBAR LOGIN/SIGUP & --------------->
        <div id="hide-side-bar" class="hide-side-bar">
            <button class="click-me">x</button>
            <div class="col-xs-12  log-side-bar">
                @if (Auth::check())
                    <a class="signout-btn" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="#" class="login-btn" data-toggle="modal" data-target="#login">Log In</a>
                    <a href="#" class="singup-btn" data-toggle="modal" data-target="#register">Sign Up</a>
                @endif
            </div>
            @if (Auth::check())
                <div class="col-xs-12 pro-icons-main">
                    @if ( Auth::user()->role ==="1" )
                        <a href="{{ route('admin.dashboard') }}"> <i class="fa-solid fa-gauge-high"></i> Dashboard </a>
                    @endif
                    <a href="{{ route('profile') }}"> <i class="fa-solid fa-address-card"></i> My Profile </a>
                    <a href="{{ route('orders') }}"> <i class="fa-solid fa-list-check"></i> My Subscribed Orders </a>
                    <a href="{{ route('wishlist') }}"> <i class="fa-solid fa-heart"></i> My Wishlist </a>
                    <a href="{{ route('prescriptions') }}"> <i class="   fa-solid fa-file-prescription"></i> My Prescriptions </a>
                </div>
            @else
                <div class="col-xs-12 pro-icons-main disable-icons">
                    <a href="#"> <i class="fa-solid fa-address-card"></i> My Profile </a>
                    <a href="#"> <i class="fa-solid fa-list-check"></i> My Subscribed Orders </a>
                    <a href="#"> <i class="fa-solid fa-heart"></i> My Wishlist </a>
                    <a href="#"> <i class="   fa-solid fa-file-prescription"></i> My Prescriptions </a>
                </div>
            @endif
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
                                <form id="user-login">
                                    <div class="form-item form-type-textfield form-item-name">
                                        <label class="element-invisible" for="edit-name"> <i class="fa-solid fa-envelope"></i> Email <span
                                                class="form-required"></label>
                                        <input type="text" id="edit-name" name="email" class="form-text"  placeholder="Type Your Email..." />
                                        <small class="form-text text-danger p-0 border-0 email"> </small>

                                    </div>
                                    <div class="form-item form-type-password form-item-pass">
                                        <label class="element-invisible" for="edit-pass"> <i class="fa-solid fa-key"></i> Password <span
                                                class="form-required"></label>
                                        <input type="password" id="edit-pass" name="password" class="form-text " placeholder="Type Your Password..."/>
                                        <small class="form-text text-danger p-0 border-0 password"> </small>

                                    </div>

                                    <div class="form-actions form-wrapper text-left" id="edit-actions--26">

                                        <button id="signup-in" class="rounded">
                                            <i class="fa-solid fa-arrow-right-to-bracket"></i> LogIn </button>

                                    </div>
                                    <div class="col-xs-12 other-way-p">
                                        <span>OR</span>
                                    </div>
                                    <div class="hybridauth-widget-wrapper">
                                        <div class="item-list">
                                            <h3>Or log in with...</h3>
                                            <ul class="hybridauth-widget">
                                                <li>
                                                    <a href="{{ route("google.redirect") }}">
                                                        <img src="{{ asset("images/google.png") }}" alt="google">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset("images/facebook.png") }}" alt="facebook">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
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
                                id="user-register-form">
                                <div>
                                    <div class="ds-2col-stacked-fluid  ds-form clearfix">


                                        <div class="group-header">
                                            <div id="edit-account" class="form-wrapper">
                                                <div class="form-item form-type-textfield form-item-name">
                                                    <label for="edit-name--3"> <i class="fa-solid fa-user"></i> Username <span
                                                            class="form-required"></label>
                                                    <input class="username form-text required" type="text"
                                                        id="edit-name--3" name="name"  placeholder="Type Your Username..."  />
                                                    <small class="form-text text-danger p-0 border-0 name"> </small>

                                                </div>
                                                <div class="form-item form-type-textfield form-item-mail">
                                                    <label for="email"> <i class="fa-solid fa-envelope"></i> E-mail address <span
                                                            class="form-required"></label>
                                                    <input type="text"  name="email"
                                                        class="form-text required"  placeholder="Type Your Email..."  />
                                                    <small class="form-text text-danger p-0 border-0 email"> </small>

                                                </div>
                                                <div class="form-item form-type-textfield form-item-mail">
                                                    <label for="password"> <i class="fa-solid fa-key"></i> Password <span
                                                            class="form-required"></label>
                                                    <input type="password"  name="password"
                                                        class="form-text required"  placeholder="Type Password..." />
                                                    <small class="form-text text-danger p-0 border-0 password">
                                                    </small>

                                                </div>
                                                <div class="form-item form-type-textfield form-item-mail">
                                                    <label for="password_confirmation"> <i class="fa-solid fa-key"></i> Confirm Password <span
                                                            class="form-required"></label>
                                                    <input type="password"  name="password_confirmation"
                                                        class="form-text required" placeholder="Type Password Again..."  />
                                                    <small
                                                        class="form-text text-danger p-0 border-0 password_confirmation">
                                                    </small>


                                                </div>

                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-actions form-wrapper text-left" id="edit-actions--28">

                                        <button id="signup-btn" class="rounded">
                                            <i class="fa-solid fa-user-plus mr-2"></i> SignUp </button>

                                    </div>
                                    <div class="col-xs-12 other-way-p">
                                        <span>OR</span>
                                    </div>
                                    <div class="hybridauth-widget-wrapper">
                                        <div class="item-list">
                                            <h3>Or log in with...</h3>
                                            <ul class="hybridauth-widget">
                                                <li>
                                                    <a href="{{ route("google.redirect") }}">
                                                        <img src="{{ asset("images/google.png") }}" alt="google">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset("images/facebook.png") }}" alt="facebook">
                                                    </a>
                                                </li>
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
                    <li class="leaf"><a href="{{ route('returns') }}">RETURNS
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
                            <br>
                            <div id="subscribe"><button type="submit" id="edit-newsletter-submit" name="op"
                                    class="form-submit" >Subscribe</button></div>
                        </div>
                    </form>
                    <div class="suffix"></div>
                </div>


                <div class="clearfix"></div>


                <div class="col-md-4 col-xs-12 remove-padding text-left-md foot-foda-logo">
                    <img src="/images/logo-white.png">

                </div>

                <div class="col-md-4 offset-md-4 col-xs-12 remove-padding scial-fot">


                    <a href="" class="face-icon"><svg role="img" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" style="
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
    <script src="{{ asset('js/web/app.js') }}"></script>
    <!---------------- Owl Carousel -------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!---------------- Sweet Alert  -------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"
        integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!---------------- File.Js -------------------->
    <script src="{{ asset('js/web/file.js') }}"></script>
    <!---------------- Ajax -------------------->
    <script src="{{ asset('js/web/ajax/cart.js') }}"></script>
    <script src="{{ asset('js/web/ajax/wishlist.js') }}"></script>
    <script src="{{ asset('js/web/ajax/messege.js') }}"></script>
    <script src="{{ asset('js/web/ajax/order.js') }}"></script>
    <script src="{{ asset('js/web/ajax/prescription.js') }}"></script>
    <script src="{{ asset('js/web/ajax/profile.js') }}"></script>
    <script src="{{ asset('js/web/ajax/register.js') }}"></script>

</body>

</html>
