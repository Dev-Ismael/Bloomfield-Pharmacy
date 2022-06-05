$(document).ready(function () {

    /*========================================================================
            ================= Delete Prescription ====================================
            =========================================================================*/
    $("#prescriptions-page .delete-prescription-btn").on('click', function (e) {

        e.preventDefault();
        var prescription_id = $(this).attr('prescription_id');

        // Sweet alert Confirm
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this prescription from your account!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do it!'
        }).then((result) => {
            // If confirm Yes
            if (result.isConfirmed) {

                $.ajax({
                    type: "POST",
                    url: '/delete_prescription/' + prescription_id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {

                        if (response.status == 'error') {
                            Swal.fire(response.status, response.msg, response.status)
                        }
                        else if (response.status == 'success') {
                            Swal.fire(response.status, response.msg, response.status)
                                .then((value) => {
                                    window.location.href = "/prescriptions";
                                });
                        }

                    },
                    error: function (response) {
                        alert("error at connection");
                    }
                });

            }
        });
    });

    /*========================================================================
    ================= Start Schedule time =========================================
    =========================================================================*/
    $("#prescriptions-page .schedule .toggle-btn input").on('click', function (e) {

        e.preventDefault();
        var schedule_status = $(this).attr('schedule_status');
        var prescription_id = $(this).attr('prescription_id');


        // Schedule Status Open
        if (schedule_status == "open") {


            // Sweet alert Confirm
            Swal.fire({
                title: 'Are you sure?',
                text: "Close Schedule Orders With this prescription period",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {
                // If confirm Yes
                if (result.isConfirmed) {

                    $.ajax({
                        type: "POST",
                        url: '/stop_prescription_schedule/' + prescription_id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {

                            if (response.status == 'error') {
                                Swal.fire(response.status, response.msg, response.status)
                            }
                            else if (response.status == 'success') {
                                $(this).parent('.toggle-btn').toggleClass("active");
                                Swal.fire(response.status, response.msg, response.status)
                                    .then((value) => {
                                        window.location.href = "/prescriptions";
                                    });
                            }

                        },
                        error: function (response) {
                            alert("error at connection");
                        }
                    });

                }
            });



        } else {

            // Sweet alert Confirm
            Swal.fire({
                title: 'Are you sure?',
                text: "Open Schedule Orders With this prescription period",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {
                // If confirm Yes
                if (result.isConfirmed) {

                    $.ajax({
                        type: "POST",
                        url: '/start_prescription_schedule/' + prescription_id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {

                            if (response.status == 'error') {
                                Swal.fire(response.status, response.msg, response.status)
                            }
                            else if (response.status == 'success') {
                                $(this).parent('.toggle-btn').toggleClass("active");
                                Swal.fire(response.status, response.msg, response.status)
                                    .then((value) => {
                                        window.location.href = "/prescriptions";
                                    });
                            }

                        },
                        error: function (response) {
                            alert("error at connection");
                        }
                    });

                }
            });




        }

    });


    /*========================================================================
    ================= create_prescription_orders ====================================
    =========================================================================*/
    $("#prescriptions-page .create_prescription_orders").on('click', function (e) {

        e.preventDefault();
        e.stopPropagation();

        var prescription_id = $(this).attr('prescription_id');
        var create_prescription_orders_btn = $(this);
        // Sweet alert Confirm
        Swal.fire({
            title: 'Are you sure?',
            text: "Create orders with contents of this prescription ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do it!'
        }).then((result) => {
            // If confirm Yes
            if (result.isConfirmed) {

                $.ajax({
                    type: "POST",
                    url: '/create_prescription_orders/' + prescription_id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {

                        if (response.status == 'error') {
                            Swal.fire(response.status, response.msg, response.status)
                        }
                        else if (response.status == 'success') {
                            Swal.fire(response.status, response.msg, response.status)
                            create_prescription_orders_btn.remove();
                        }

                    },
                    error: function (response) {
                        alert("error at connection");
                    }
                });

            }
        });
    });
});