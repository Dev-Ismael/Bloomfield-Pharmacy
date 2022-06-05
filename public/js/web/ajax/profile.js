
$(document).ready(function () {

        /*========================================================================
        =================== Update Profile =======================================
        =========================================================================*/

        $("#profile-page button.update-profile").click(function () {

            e.preventDefault();
            var profileFormData = new FormData($("#profile-page form#update-profile")[0]);

            // alert("good");
            $.ajax({
                type: "POST",
                url: '/update_profile',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: profileFormData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {

                    if( response.status == 'error' && response.msg == 'validation error' ){
                        $.each( response.errors , function( key , val ){
                            $("form#update-profile small.text-danger." + key ).text(val[0]);
                            $('form#update-profile input[name="'+ key +'"]').addClass("is-invalid");
                            // Phone array validation
                            if ( key == 'phone.0' ){
                                $("form#update-profile small.text-danger.phone_1").text('phone is not valid');
                                $('form#update-profile input[id="phone_1"]').addClass("is-invalid");
                            }
                            if ( key == 'phone.1' ){
                                $("form#update-profile small.text-danger.phone_2").text('phone is not valid');
                                $('form#update-profile input[id="phone_2"]').addClass("is-invalid");
                            }
                            // Address array validation
                            if ( key == 'address.0' ){
                                $("form#update-profile small.text-danger.address_1").text('address is not valid');
                                $('form#update-profile input[id="address_1"]').addClass("is-invalid");
                            }else if ( key == 'address.1' ){
                                $("form#update-profile small.text-danger.address_2").text('address is not valid');
                                $('form#update-profile input[id="address_2"]').addClass("is-invalid");
                            }else if ( key == 'address.2' ){
                                $("form#update-profile small.text-danger.address_3").text('address is not valid');
                                $('form#update-profile input[id="address_3"]').addClass("is-invalid");
                            }
                        });
                    }
                    else if( response.status == 'error' ){
                        Swal.fire({
                            position: 'top-end',
                            icon: response.status,
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                    else if( response.status == 'success' ){
                        Swal.fire({
                            position: 'top-end',
                            icon: response.status,
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                error: function (response) {
                    alert("error at connection");
                }
            });
        });
        });
