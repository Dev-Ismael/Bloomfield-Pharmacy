

$(document).ready(function () {

    /*========================================================================
    ================= Add to Cart ========================================
    =========================================================================*/
    function increaseCartCount() {
        var nextCartCount = parseInt($(".head-icon-main a.cart-main span").text()) + 1;
        if (nextCartCount > 9) {
            $(".head-icon-main a.cart-main span").text('+9');
        } else {
            $(".head-icon-main a.cart-main span").text(nextCartCount);
        }
    }

    $(".product-item button.add-cart , article.product button.add-cart , #product-page button.add-cart").on('click', function (e) {
        e.preventDefault();
        var product_id = $(this).attr("product_id");
        var cartBtn = $(this);
        $.ajax({
            type: "POST",
            url: '/add_cart/' + product_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                if (response.status == 'error') {
                    Swal.fire({
                        position: 'top-end',
                        icon: response.status,
                        title: response.msg,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
                else if (response.status == 'success') {
                    Swal.fire({
                        position: 'top-end',
                        icon: response.status,
                        title: response.msg,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    cartBtn.parent().append('<p> <i class="fa-solid fa-check"></i> Cart  </p>');
                    cartBtn.remove();
                    increaseCartCount();
                }
            },
            error: function (response) {
                alert("error at connection");
            }
        });
    });

    /*========================================================================
    =================== Remove Cart ==========================================
    =========================================================================*/

    function decreaseCartCount() {
        var CartCount = $("article.product").length;
        if (CartCount > 9) {
            $(".head-icon-main a.cart-main span").text('+9');
        } else {
            $(".head-icon-main a.cart-main span").text(CartCount);
        }
    }

    $(".cart-products .fa-xmark").click(function () {
        e.preventDefault();
        var xmarkBtn = $(this);
        var productItem = xmarkBtn.parent().parent();
        var product_id = productItem.attr("product_id");
        $.ajax({
            type: "POST",
            url: '/remove_cart/' + product_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                if (response.status == 'error') {
                    Swal.fire({
                        position: 'top-end',
                        icon: response.status,
                        title: response.msg,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
                else if (response.status == 'success') {
                    productItem.addClass("removed");
                    window.setTimeout(function () {
                        productItem.slideUp('fast', function () {
                            productItem.remove();
                            if ($("article.product").length == 0) {
                                var noProductContent = `
                                        <div class="row no-data-section">
                                            <div class="col-md-8 offset-md-2">
                                                <img src="/images/no_products.png" class="no_products img-fluid"
                                                    alt="no_products">
                                                <p class="big-text"> You don't have products in your cart... </p>
                                            </div>
                                        </div>`;
                                $("#cart").html(noProductContent);
                            }
                            changeTotal();
                            decreaseCartCount();
                        });
                    }, 200);
                }
            },
            error: function (response) {
                alert("error at connection");
            }
        });
    });


    /*========================================================================
    =================== Calculate Cart =======================================
    =========================================================================*/


    var check = false;
    function changeVal(el) {
        var qt = parseFloat(el.parent().children(".qt").html());
        var price = parseFloat(el.parent().children(".price").html());
        var eq = Math.round(price * qt * 100) / 100;
        el.parent().children(".full-price").html(eq + "$");
        changeTotal();
    }
    // Change Total Price
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
    changeTotal();
    // At Click (+) Btn
    $(".qt-plus").click(function () {
        $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);
        $(this).parent().children("[name='quantity[]']").val(parseInt($(this).parent().children("[name='quantity[]']").val()) + 1);
        $(this).parent().children(".full-price").addClass("added");
        var el = $(this);
        window.setTimeout(function () { el.parent().children(".full-price").removeClass("added"); changeVal(el); }, 150);
    });
    // At Click (-) Btn
    $(".qt-minus").click(function () {
        // child = $(this).parent().children(".qt");
        if (parseInt($(this).parent().children(".qt").html()) > 1) {
            $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) - 1);
        }
        if (parseInt($(this).parent().children("[name='quantity[]']").val()) > 1) {
            $(this).parent().children("[name='quantity[]']").val(parseInt($(this).parent().children("[name='quantity[]']").val()) - 1);
        }
        $(this).parent().children(".full-price").addClass("minused");
        var el = $(this);
        window.setTimeout(function () { el.parent().children(".full-price").removeClass("minused"); changeVal(el); }, 150);
    });


    
});
