

$(document).ready(function () {


    /*========================================================================
    ================= Send Messege ========================================
    =========================================================================*/
    $("#messege-form .send-messege-btn").on('click', function (e) {
        e.preventDefault();
        var messegeFormData = new FormData($("form#messege-form")[0]);
        $.ajax({
            type: "POST",
            url: '/send_messege',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: messegeFormData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {

                if (response.status == 'error' && response.msg == 'validation error') {
                    $.each(response.errors, function (key, val) {
                        $("form#messege-form small.text-danger." + key).text(val[0]);
                        $('form#messege-form [class="form-control"][name="' + key + '"]').addClass("is-invalid");
                    });
                } else if (response.status == 'error' && response.msg == 'insert operation failed') {
                    Swal.fire({
                        position: 'top-end',
                        icon: response.status,
                        title: response.msg,
                        showConfirmButton: false,
                        timer: 2000
                    }).then((value) => {
                        window.location.reload();
                    });
                } else if (response.status == 'success') {
                    Swal.fire({
                        position: 'top-end',
                        icon: response.status,
                        title: response.msg,
                        showConfirmButton: false,
                        timer: 2000
                    }).then((value) => {
                        window.location.href = "/";
                    });
                }

            },
            error: function (response) {
                alert("error at connection");
            }
        });
    });
});