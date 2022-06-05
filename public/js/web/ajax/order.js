$(document).ready(function () {

/*========================================================================
        =================== create order =======================================
        =========================================================================*/

        $("#cart-page a.create-order-btn").click(function () {

            var orderFormData = new FormData($("#cart-page form#create-order")[0]);
            $.ajax({
                type: "POST",
                url: '/create_order',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: orderFormData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {


                    if( response.status == 'error' && response.msg == 'validation error' ){
                        $.each( response.errors , function( key , val ){

                            $("form#create-order small.text-danger." + key ).text(val[0]);
                            $('form#create-order input[name='+ key +']').addClass("is-invalid");
                            $('form#create-order input[name=another_'+ key +']').addClass("is-invalid");

                            // another_address validation
                            if ( key == 'another_address' ){
                                $("form#create-order small.text-danger.address").text(val[0]);
                                $('form#create-order input[name="another_address"]').addClass("is-invalid");
                            }

                            // another_phone validation
                            if ( key == 'another_phone' ){
                                $("form#create-order small.text-danger.phone").text(val[0]);
                                $('form#create-order input[name="another_phone"]').addClass("is-invalid");
                            }

                        });
                    }else if( response.status == 'error' && response.msg == 'error at operation' ){
                        Swal.fire({
                            position: 'top-end',
                            icon: response.status,
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000
                        }).then((value) => {
                            window.location.reload();
                        });
                    }else if( response.status == 'success' ){
                        Swal.fire({
                            position: 'top-end',
                            icon: response.status,
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000
                        }).then((value) => {
                            window.location.href = "/orders";
                        });
                    }


                },
                error: function (response) {
                    alert("error at connection");
                }
            });
        });
    });