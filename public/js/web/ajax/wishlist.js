$(document).ready(function () {

    /*========================================================================
    ================= Add to withlist ========================================
    =========================================================================*/
    $(".product-item button.add-wishlist , #product-page button.add-wishlist").on('click', function (e) {
        e.preventDefault();
        var product_id = $(this).attr("product_id");
        var wishlistBtn = $(this);
        $.ajax({
            type: "POST",
            url: '/add_wishlist/' + product_id,
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
                    wishlistBtn.parent().append('<p> <i class="fa-solid fa-check"></i> Wishlist  </p>');
                    wishlistBtn.remove();

                }
            },
            error: function (response) {
                alert("error at connection");
            }
        });
    });
    /*========================================================================
    =================== Remove Wishlist ======================================
    =========================================================================*/


    $(".wishlist-products .fa-xmark").click(function () {
        e.preventDefault();

        var xmarkBtn = $(this);
        var productItem = xmarkBtn.parent().parent();
        var product_id = productItem.attr("product_id");

        $.ajax({
            type: "POST",
            url: '/remove_wishlist/' + product_id,
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
                                $(".wishlist-container").html(noProductContent);
                            }
                        });
                    }, 200);
                }
            },
            error: function (response) {
                alert("error at connection");
            }
        });
    });
});

