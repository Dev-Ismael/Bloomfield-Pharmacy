$(document).ready(function () {



    /*========================================================================
    ================= Register ===============================================
    =========================================================================*/
    $("form#user-register-form button#signup-btn").on('click', function (e) {
        var btn = $(this);
        var loadingContent = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width:14px;height:14px;"></span> Loading...';
        var btnOriginalContent = $(this).html();
        var RegisterFormData = new FormData($("form#user-register-form")[0]);


        $(this).html(loadingContent);
        e.preventDefault();


        $.ajax({
            type: "POST",
            url: "/register",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: RegisterFormData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {

                btn.html(btnOriginalContent);
                // console.log(response);

                if (response.status == 'error' && response.msg == 'validation error') {
                    $.each(response.errors, function (key, val) {
                        $("form#user-register-form small.text-danger." + key).text(val[0]);
                        $('form#user-register-form input[name="' + key + '"]').addClass("is-invalid");
                    });
                }


                if (response.status == 'error' && response.msg == 'SignUp operation failed') {
                    Swal.fire(response.status, response.msg, response.status)
                        .then((value) => {
                            window.location.reload();
                        });
                }


                else if (response.status == 'success') {
                    // remove class is-invalid
                    $('form#user-register-form input').removeClass('is-invalid');
                    // empty small danger text
                    $('form#user-register-form input').siblings('.text-danger').text('');



                    // Sweet Alert
                    Swal.fire(response.status, response.msg, response.status)
                    // Toggle Modals
                    $("#login").modal('show');
                    $('#register').modal('hide')
                }


            },
            error: function (response) {
                alert("error at connection");
            }
        });



    });






    /*========================================================================
    ================= Login ==================================================
    =========================================================================*/
    $("form#user-login button#signup-in").on('click', function (e) {

        var btn = $(this);
        var loadingContent = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width:14px;height:14px;"></span> Loading...';
        var btnOriginalContent = $(this).html();
        var loginFormData = new FormData($("form#user-login")[0]);


        $(this).html(loadingContent);
        e.preventDefault();


        $.ajax({
            type: "POST",
            url: "/login",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: loginFormData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {

                btn.html(btnOriginalContent);
                // console.log(response);

                if (response.status == 'error' && response.msg == 'validation error') {
                    $.each(response.errors, function (key, val) {
                        $("form#user-login small.text-danger." + key).text(val[0]);
                        $('form#user-login input[name="' + key + '"]').addClass("is-invalid");
                    });
                }

                if (response.status == 'error' && response.msg == 'invalid credentials') {
                    $("form#user-login small.text-danger.email").text(response.error);
                    $('form#user-login input[name="email"]').addClass("is-invalid");
                }

                else if (response.status == 'success') {
                    // remove class is-invalid
                    $('form#user-login input').removeClass('is-invalid');
                    // empty small danger text
                    $('form#user-login input').siblings('.text-danger').text('');

                    // Reload
                    Swal.fire(response.status, response.msg, response.status)
                        .then((value) => {
                            window.location.reload();
                        });
                }


            },
            error: function (response) {
                alert("error at connection");
            }
        });




    });
});