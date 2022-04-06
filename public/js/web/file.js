(function ($) {
    $(document).ready(function () {

        /*========================================================================
        =================== Shipping & delivery ========================================
        =========================================================================*/


        $(".slide-side-fillter").click(function () {
            $(this).siblings('.links-main-fillter-side').slideToggle("fast");
            $(this).toggleClass('links-colapsed')
        });

        /*========================================================================
        =================== Header ========================================
        =========================================================================*/

        $(".header.owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 1000,
            smartSpeed: 1500,
            autoplayHoverPause: true
        });



        /*========================================================================
        =================== Service ==============================================
        =========================================================================*/
        $(".service-item button").on("click", function () {

            var btnTxt = $(this).text();
            $(this).siblings('p').find('span#more').toggleClass("d-none");
            $(this).siblings('p').find('span#dots').toggleClass("d-none");

            if (btnTxt == "Read more") {
                $(this).text("Read less");
            } else {
                $(this).text("Read more");
            }

        });




        /*========================================================================
        =================== scroll Navbar ========================================
        =========================================================================*/

        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 10) {
                $(".head-main").addClass("white-bg");
                $(".logo").show();
                $(".logo-white").hide();
            } else {
                $(".head-main").removeClass("white-bg");
                $(".logo").hide();
                $(".logo-white").show();
            }
        });




        /*========================================================================
        =================== scroll to top ========================================
        =========================================================================*/

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
            return false;
        });




        /*========================================================================
        =================== NAVBAR Taps ========================================
        =========================================================================*/
        $('.shop-icons-child div').click(function () {
            var tab_id = $(this).attr('data-tab');
            $('.shop-icons-child div').removeClass('current');
            $('.tabs-main .col-xs-12').removeClass('current');
            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        });






        /*========================================================================
        =================== Right Sidebar ========================================
        =========================================================================*/


        $(".pagingInfo").show();
        // change header

        $(".head-icon-main a.profile-main").click(function (event) {
            event.preventDefault();
        });
        // end change header

        // profile-side-bar
        $('#pro-button').click(function (e) {
            e.stopPropagation();
            $('#hide-side-bar').toggleClass('show-side-bar');
            $('.body-bg').toggleClass('body-overlay');
            $('body').toggleClass('scroll-remove');
        });
        $('#hide-side-bar').click(function (e) {
            e.stopPropagation();
        });
        $('body,html, .click-me, .login-btn, .singup-btn').click(function (e) {
            $('#hide-side-bar').removeClass('show-side-bar');
            $('.body-bg').removeClass('body-overlay');
            $('body').removeClass('scroll-remove');
        });



        $('#hide-side-bar1, #hide-side-bar1-p').click(function (e) {
            e.stopPropagation();
        });




        $('body,html, .click-me1').click(function (e) {
            $('#hide-side-bar1, #hide-side-bar1-p').removeClass('show-side-bar1');
            $('.body-bg').removeClass('body-overlay');
            $('body').removeClass('scroll-remove');
        });



        /*========================================================================
        =================== Cart =================================================
        =========================================================================*/


            var check = false;

            function changeVal(el) {
                var qt = parseFloat(el.parent().children(".qt").html());
                var price = parseFloat(el.parent().children(".price").html());
                var eq = Math.round(price * qt * 100) / 100;
            
                el.parent().children(".full-price").html(eq + "$");
            
                changeTotal();
            }
            
            function changeTotal() {
            
                var price = 0;
            
                $(".full-price").each(function (index) {
                    price += parseFloat($(".full-price").eq(index).html());
                });
            
                price = Math.round(price * 100) / 100;
                var tax = Math.round(price * 0.05 * 100) / 100
                var shipping = parseFloat($(".shipping span").html());
                var fullPrice = Math.round((price + tax + shipping) * 100) / 100;
            
                if (price == 0) {
                    fullPrice = 0;
                }
            
                $(".subtotal span").html(price);
                $(".tax span").html(tax);
                $(".total span").html(fullPrice);
            }
            
            $(document).ready(function () {
            
                $(".remove").click(function () {
                    var el = $(this);
                    el.parent().parent().addClass("removed");
                    window.setTimeout(
                        function () {
                            el.parent().parent().slideUp('fast', function () {
                                el.parent().parent().remove();
                                if ($(".product").length == 0) {
                                    if (check) {
                                        $("#cart").html("<h1>The shop does not function, yet!</h1><p>If you liked my shopping cart, please take a second and heart this Pen on <a href='https://codepen.io/ziga-miklic/pen/xhpob'>CodePen</a>. Thank you!</p>");
                                    } else {
                                        $("#cart").html("<h1>No products!</h1>");
                                    }
                                }
                                changeTotal();
                            });
                        }, 200);
                });
            
                $(".qt-plus").click(function () {
                    $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);
            
                    $(this).parent().children(".full-price").addClass("added");
            
                    var el = $(this);
                    window.setTimeout(function () { el.parent().children(".full-price").removeClass("added"); changeVal(el); }, 150);
                });
            
                $(".qt-minus").click(function () {
            
                    child = $(this).parent().children(".qt");
            
                    if (parseInt(child.html()) > 1) {
                        child.html(parseInt(child.html()) - 1);
                    }
            
                    $(this).parent().children(".full-price").addClass("minused");
            
                    var el = $(this);
                    window.setTimeout(function () { el.parent().children(".full-price").removeClass("minused"); changeVal(el); }, 150);
                });
            
                window.setTimeout(function () { $(".is-open").removeClass("is-open") }, 1200);
            
                $(".btn").click(function () {
                    check = true;
                    $(".remove").click();
                });
            });
        


        /*========================================================================
        =================== login - register =====================================
        =========================================================================*/


        $(".login-btn").on("click", function (event) {
            $("#login").modal();
        });

        $(".singup-btn").on("click", function (event) {
            $("#register").modal();
        });


        // cart-cart-side-bar
        // mobile menu
        var isActive = false;
        $('.js-menu').on('click', function () {
            if (isActive) {
                $('.js-menu').removeClass('active');
                $('.menu-main-mob').removeClass('menu-open');
                $('body').removeClass('remove-scroll');
            } else {
                $('.js-menu').addClass('active');
                $('.menu-main-mob').addClass('menu-open');
                $('body').addClass('remove-scroll');
            }
            isActive = !isActive;
        });
        $(".mob-shop-link").click(function () {
            $(this).siblings('.mob-shop-drop-dowm').slideToggle("slow");
        });
        // end mob menu



        // inputs effects

        $(window).load(function () {
            $(".input-item input").val("");

            $(".input-effect input").focusout(function () {
                if ($(this).val() != "") {
                    $(this).addClass("has-content");
                } else {
                    $(this).removeClass("has-content");
                }
            })
        });

        // end inputs effects


        // gategory toggle


        $(".more-less-btn").click(function () {

            $('.fillter-links').toggleClass("height-normal");
            $(".less").toggle();
            $(".more").toggle();

        });


        $(".fillter-links a, .fillter-side-main a").click(function () {

            $(this).toggleClass("active-fil");


        });


        // end gategory toggle





        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 365) {
                $(".fillter-main-bar").addClass("make-fixed");
                $(".gategory-grids").addClass("grid-padding");

            } else {
                $(".fillter-main-bar").removeClass("make-fixed");
                $(".gategory-grids").removeClass("grid-padding");

            }
        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#pro-img').attr('src', e.target.result);
                    $('#pro-img').hide();
                    $('#pro-img').fadeIn(500);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function () {
            readURL(this);
        });


        // end upload img profile

        // show hide pass 


        $(".toggle-password").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        // end show hide pass  


        // show hide payment mathed

        $(function () {
            $("input[name='payment']").click(function () {
                if ($("#bank").is(":checked")) {
                    $(".bank-show").slideDown();

                } else {
                    $(".bank-show").slideUp();

                }
            });
        });




        // end show hide payment mathed


        $('#agree-whith').change(function () {
            if ($(this).is(':checked')) {
                $(".pro-save-btn").removeAttr("disabled");
            } else {
                $(".pro-save-btn").attr("disabled", "disabled");
            }
        });

        // remove card

        // $('[data-toggle=confirmation]').confirmation({
        //   rootSelector: '[data-toggle=confirmation]',
        //   container: 'body'
        // });

        // $( ".remove-card-bank" ).click(function() {
        // $(this).parent().hide();
        // });





        // end remove card


        // show hide payment mathed

        $(function () {
            $("input[name='payment']").click(function () {
                if ($("#bank").is(":checked")) {
                    $(".bank-show").slideDown();

                } else {
                    $(".bank-show").slideUp();

                }
            });
        });




        // end show hide payment mathed


        $('#agree-whith').change(function () {
            if ($(this).is(':checked')) {
                $(".pro-save-btn").removeAttr("disabled");
            } else {
                $(".pro-save-btn").attr("disabled", "disabled");
            }
        });

        // order tabs

        $('.order-link').click(function () {
            var tab_id = $(this).attr('data-tab');
            $('.order-link').removeClass('order-current');
            $('.order-tab').removeClass('order-tab-current');
            $(this).addClass('order-current');
            $("#" + tab_id).addClass('order-tab-current');
        });


        // offer fillter 



        // $( ".more-less-btn" ).click(function() {

        // $( '.fillter-links' ).toggleClass( "height-normal" );
        // $(".less").toggle();
        // $(".more").toggle();

        // });


        $(".fillter-links a").click(function () {

            $(this).toggleClass("active-fil");


        });













        // rate

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('.stars li').on('mouseover', function () {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function (e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });
        }).on('mouseout', function () {
            $(this).parent().children('li.star').each(function (e) {
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('.stars li').on('click', function () {
            var onStar = parseInt($(this).data('value'), 10), // The star currently selected
                stars = $(this).parent().children('li.star'),
                i = 0;

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }
        });


        $("li.good").click(function () {

            $('.rate-after').addClass("rate-active-bg");
            $('.rate-before').removeClass("rate-active-bg");

        });

        $("li.bad").click(function () {

            $('.rate-before').addClass("rate-active-bg");
            $('.rate-after').removeClass("rate-active-bg");

        });












































































    });


}(jQuery));

