(function ($) {
    $(document).ready(function () {


        /*========================================================================
        ================= Add Active class =======================================
        =========================================================================*/
        $(".shop-icons-child:first-of-type").addClass("current");
        $(".tabs-main #tab-1").addClass("current");

        $(".shop-icons-child").on( "click" , function(){
            $(this).addClass('current').siblings().removeClass('current');

            var tab_id = $(this).attr('data-tab');
            $('.tabs-main .col-xs-12').removeClass('current');
            $("#" + tab_id).addClass('current');

        });

        
        /*========================================================================
        ================= Remove text danger Inputs ==============================
        =========================================================================*/
        function removeInValidClass() {
            $('form input , form textarea , form select , .upload-area').on("click", function(){
                // get Attr name=['']
                var attr_name = $(this).attr('name');
                // remove class is-invalid
                $(this).removeClass('is-invalid');
                // empty small danger text
                $("form small.text-danger." + attr_name ).text('');
            });
        }
        removeInValidClass();
        /*========================================================================
        ================= Register ===============================================
        =========================================================================*/
        $("form#user-register-form button#signup-btn").on( 'click' ,function (e){

            var btn = $(this);
            var loadingContent = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width:14px;height:14px;"></span> Loading...';
            var btnOriginalContent = $(this).html();
            var RegisterFormData = new FormData( $("form#user-register-form")[0] );


            $(this).html(loadingContent);
            e.preventDefault();


            $.ajax({
                type: "POST",
                url: "/register",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: RegisterFormData ,
                processData: false,
                contentType : false , 
                cache    : false,
                success: function ( response ) {
                    
                    btn.html(btnOriginalContent);
                    // console.log(response);
    
                    if( response.status == 'error' && response.msg == 'validation error' ){
                        $.each( response.errors , function( key , val ){
                            $("form#user-register-form small.text-danger." + key ).text(val[0]);
                            $('form#user-register-form input[name="'+ key +'"]').addClass("is-invalid");
                        });
                    }

    
                    if( response.status == 'error' && response.msg == 'SignUp operation failed' ){
                        Swal.fire( response.status , response.msg , response.status )
                        .then((value) => {
                            window.location.reload();
                        });
                    }
    

                    else if( response.status == 'success' ){
                        // Empty any input
                        removeInValidClass();
                        // Sweet Alert
                        Swal.fire( response.status , response.msg , response.status )
                        // Toggle Modals
                        $("#login").modal('show');
                        $('#register').modal('hide')
                    }
    
    
                },
                error: function(response){
                    alert("error at connection");
                }
            });



        });




        

        /*========================================================================
        ================= Login ==================================================
        =========================================================================*/
        $("form#user-login button#signup-in").on( 'click' ,function (e){

            var btn = $(this);
            var loadingContent = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width:14px;height:14px;"></span> Loading...';
            var btnOriginalContent = $(this).html();
            var loginFormData = new FormData( $("form#user-login")[0] );


            $(this).html(loadingContent);
            e.preventDefault();


            $.ajax({
                type: "POST",
                url: "/login",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: loginFormData ,
                processData: false,
                contentType : false , 
                cache    : false,
                success: function ( response ) {
                    
                    btn.html(btnOriginalContent);
                    // console.log(response);
    
                    if( response.status == 'error' && response.msg == 'validation error' ){
                        $.each( response.errors , function( key , val ){
                            $("form#user-login small.text-danger." + key ).text(val[0]);
                            $('form#user-login input[name="'+ key +'"]').addClass("is-invalid");
                        });
                    }

                    if( response.status == 'error' && response.msg == 'invalid credentials' ){
                        $("form#user-login small.text-danger.email").text(response.error);
                        $('form#user-login input[name="email"]').addClass("is-invalid");
                    }

                    else if( response.status == 'success' ){
                        // Empty any input
                        removeInValidClass();
                        // Reload
                        Swal.fire( response.status , response.msg , response.status )
                        .then((value) => {
                            window.location.reload();
                        });
                    }
    
    
                },
                error: function(response){
                    alert("error at connection");
                }
            });




        });

        /*========================================================================
        ================= Delete Prescription ====================================
        =========================================================================*/
        $("#prescriptions-page .delete-prescription-btn").on( 'click' ,function (e){

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
                        success: function ( response ) {
                            
                            if( response.status == 'error' ){
                                Swal.fire( response.status , response.msg , response.status )
                            }
                            else if( response.status == 'success' ){
                                Swal.fire( response.status , response.msg , response.status )
                                .then((value) => {
                                    window.location.href = "/prescriptions";
                                });
                            }
            
                        },
                        error: function(response){
                            alert("error at connection");
                        }
                    });

                }
            });
        });

        /*========================================================================
        ================= Start Schedule time =========================================
        =========================================================================*/
        $("#prescriptions-page .schedule .toggle-btn input").on( 'click' ,function (e){

            e.preventDefault();
            var schedule_status = $(this).attr('schedule_status');
            var prescription_id = $(this).attr('prescription_id');


            // Schedule Status Open
            if(schedule_status == "open"){


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
                            success: function ( response ) {
                                
                                if( response.status == 'error' ){
                                    Swal.fire( response.status , response.msg , response.status )
                                }
                                else if( response.status == 'success' ){
                                    $(this).parent('.toggle-btn').toggleClass("active");
                                    Swal.fire( response.status , response.msg , response.status )
                                    .then((value) => {
                                        window.location.href = "/prescriptions";
                                    });
                                }
                
                            },
                            error: function(response){
                                alert("error at connection");
                            }
                        });

                    }
                });



            }else{

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
                            success: function ( response ) {
                                
                                if( response.status == 'error' ){
                                    Swal.fire( response.status , response.msg , response.status )
                                }
                                else if( response.status == 'success' ){
                                    $(this).parent('.toggle-btn').toggleClass("active");
                                    Swal.fire( response.status , response.msg , response.status )
                                    .then((value) => {
                                        window.location.href = "/prescriptions";
                                    });
                                }
                
                            },
                            error: function(response){
                                alert("error at connection");
                            }
                        });

                    }
                });




            }
            
        });


        /*========================================================================
        ================= Add to withlist ========================================
        =========================================================================*/
        $(".product-item button.add-wishlist").on( 'click' ,function (e){
            var product_id = $(this).attr("product_id");
            var wishlistBtn = $(this);
            $.ajax({
                type: "POST",
                url: '/add_wishlist/' + product_id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function ( response ) {

                    if( response.status == 'error' ){
                        Swal.fire({
                            position: 'top-end',
                            icon: response.status ,
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000
                        });  
                    }
                    else if( response.status == 'success' ){
                        Swal.fire({
                            position: 'top-end',
                            icon: response.status ,
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        wishlistBtn.parent().append('<p> <i class="fa-solid fa-check"></i> Wishlist  </p>');
                        wishlistBtn.remove();

                    }
                },
                error: function(response){
                    alert("error at connection");
                }
            });
        });

        /*========================================================================
        ================= Add to Cart ========================================
        =========================================================================*/
        $(".product-item button.add-cart , article.product button.add-cart").on( 'click' ,function (e){
            var product_id = $(this).attr("product_id");
            var cartBtn = $(this);
            $.ajax({
                type: "POST",
                url: '/add_cart/' + product_id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function ( response ) {

                    if( response.status == 'error' ){
                        Swal.fire({
                            position: 'top-end',
                            icon: response.status ,
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000
                        });  
                    }
                    else if( response.status == 'success' ){
                        Swal.fire({
                            position: 'top-end',
                            icon: response.status ,
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        cartBtn.parent().append('<p> <i class="fa-solid fa-check"></i> Cart  </p>');
                        cartBtn.remove();
                    }
                },
                error: function(response){
                    alert("error at connection");
                }
            });
        });
        /*========================================================================
        ================= mobile menu ============================================
        =========================================================================*/


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


        // /*========================================================================
        // ================= Trun On / Off button  Switching ========================
        // =========================================================================*/
        // $('#prescriptions-page .cb-value').click(function(e) {
        //     e.stopPropagation();
        //     $(this).parent('.toggle-btn').toggleClass("active");
        // })

        /*========================================================================
        ================= Create Order Button By Prescription ====================
        =========================================================================*/
        $('#prescriptions-page .create-by-prescription').click(function(e) {
            e.stopPropagation();
        })

        /*========================================================================
        =================== Shipping & delivery ==================================
        =========================================================================*/


        $(".slide-side-fillter").click(function () {
            $(this).siblings('.links-main-fillter-side').slideToggle("fast");
            $(this).toggleClass('links-colapsed')
        });

        /*========================================================================
        =================== Header owl-carousel ==================================
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
        =================== Products owl-carousel ==================================
        =========================================================================*/

        $(".product-container.owl-carousel").owlCarousel({
            items: 4,
            loop: true,
            // dots: true,
            nav: true,
            // navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],

            margin:10,
            autoplay: true,
            autoplaySpeed: 1000,
            smartSpeed: 1500,
            autoplayHoverPause: true,
            responsive:{
                0:{
                    items:1
                },
                576:{
                    items:2
                },
                768:{
                    items:3
                },
                992:{
                    items:4
                }
            }
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
        =================== login - register =====================================
        =========================================================================*/


        $(".login-btn").on("click", function (event) {
            $("#login").modal();
        });

        $(".singup-btn").on("click", function (event) {
            $("#register").modal();
        });

        /*========================================================================
        =================== Order Prescription =====================================
        =========================================================================*/



            // Select Upload-Area
            const uploadArea = document.querySelector('#uploadArea')

            // Select Drop-Zoon Area
            const dropZoon = document.querySelector('#dropZoon');

            // Loading Text
            const loadingText = document.querySelector('#loadingText');

            // Slect File Input 
            const fileInput = document.querySelector('#prescriptionFile');

            // Select Preview Image
            const previewImage = document.querySelector('#previewImage');

            // File-Details Area
            const fileDetails = document.querySelector('#fileDetails');

            // Uploaded File
            const uploadedFile = document.querySelector('#uploadedFile');

            // Uploaded File Info
            const uploadedFileInfo = document.querySelector('#uploadedFileInfo');

            // Uploaded File  Name
            const uploadedFileName = document.querySelector('.uploaded-file__name');

            // Uploaded File Icon
            const uploadedFileIconText = document.querySelector('.uploaded-file__icon-text');

            // Uploaded File Counter
            const uploadedFileCounter = document.querySelector('.uploaded-file__counter');

            // ToolTip Data
            const toolTipData = document.querySelector('.upload-area__tooltip-data');

            // Images Types
            const imagesTypes = [
            "jpeg",
            "png",
            "svg",
            "gif"
            ];

            // Append Images Types Array Inisde Tooltip Data
            toolTipData.innerHTML = [...imagesTypes].join(', .');

            // When (drop-zoon) has (dragover) Event 
            dropZoon.addEventListener('dragover', function (event) {
            // Prevent Default Behavior 
            event.preventDefault();

            // Add Class (drop-zoon--over) On (drop-zoon)
            dropZoon.classList.add('drop-zoon--over');
            });

            // When (drop-zoon) has (dragleave) Event 
            dropZoon.addEventListener('dragleave', function (event) {
            // Remove Class (drop-zoon--over) from (drop-zoon)
            dropZoon.classList.remove('drop-zoon--over');
            });

            // When (drop-zoon) has (drop) Event 
            dropZoon.addEventListener('drop', function (event) {
            // Prevent Default Behavior 
            event.preventDefault();

            // Remove Class (drop-zoon--over) from (drop-zoon)
            dropZoon.classList.remove('drop-zoon--over');

            // Select The Dropped File
            const file = event.dataTransfer.files[0];

            // Call Function uploadFile(), And Send To Her The Dropped File :)
            uploadFile(file);
            });

            // When (drop-zoon) has (click) Event 
            dropZoon.addEventListener('click', function (event) {
            // Click The (fileInput)
            fileInput.click();
            });

            // When (fileInput) has (change) Event 
            fileInput.addEventListener('change', function (event) {
            // Select The Chosen File
            const file = event.target.files[0];

            // Call Function uploadFile(), And Send To Her The Chosen File :)
            uploadFile(file);
            });

            // Upload File Function
            function uploadFile(file) {
            // FileReader()
            const fileReader = new FileReader();
            // File Type 
            const fileType = file.type;
            // File Size 
            const fileSize = file.size;

            // If File Is Passed from the (File Validation) Function
            if (fileValidate(fileType, fileSize)) {
                // Add Class (drop-zoon--Uploaded) on (drop-zoon)
                dropZoon.classList.add('drop-zoon--Uploaded');

                // Show Loading-text
                loadingText.style.display = "block";
                // Hide Preview Image
                previewImage.style.display = 'none';

                // Remove Class (uploaded-file--open) From (uploadedFile)
                uploadedFile.classList.remove('uploaded-file--open');
                // Remove Class (uploaded-file__info--active) from (uploadedFileInfo)
                uploadedFileInfo.classList.remove('uploaded-file__info--active');

                // After File Reader Loaded 
                fileReader.addEventListener('load', function () {
                // After Half Second 
                setTimeout(function () {
                    // Add Class (upload-area--open) On (uploadArea)
                    uploadArea.classList.add('upload-area--open');

                    // Hide Loading-text (please-wait) Element
                    loadingText.style.display = "none";
                    // Show Preview Image
                    previewImage.style.display = 'block';

                    // Add Class (file-details--open) On (fileDetails)
                    fileDetails.classList.add('file-details--open');
                    // Add Class (uploaded-file--open) On (uploadedFile)
                    uploadedFile.classList.add('uploaded-file--open');
                    // Add Class (uploaded-file__info--active) On (uploadedFileInfo)
                    uploadedFileInfo.classList.add('uploaded-file__info--active');
                }, 500); // 0.5s

                // Add The (fileReader) Result Inside (previewImage) Source
                previewImage.setAttribute('src', fileReader.result);

                // Add File Name Inside Uploaded File Name
                uploadedFileName.innerHTML = file.name;

                // Call Function progressMove();
                progressMove();
                });

                // Read (file) As Data Url 
                fileReader.readAsDataURL(file);
            } else { // Else

                this; // (this) Represent The fileValidate(fileType, fileSize) Function

            };
            };

            // Progress Counter Increase Function
            function progressMove() {
            // Counter Start
            let counter = 0;

            // After 600ms 
            setTimeout(() => {
                // Every 100ms
                let counterIncrease = setInterval(() => {
                // If (counter) is equle 100 
                if (counter === 100) {
                    // Stop (Counter Increase)
                    clearInterval(counterIncrease);
                } else { // Else
                    // plus 10 on counter
                    counter = counter + 10;
                    // add (counter) vlaue inisde (uploadedFileCounter)
                    uploadedFileCounter.innerHTML = `${counter}%`
                }
                }, 100);
            }, 600);
            };


            // Simple File Validate Function
            function fileValidate(fileType, fileSize) {
            // File Type Validation
            let isImage = imagesTypes.filter((type) => fileType.indexOf(`image/${type}`) !== -1);

            // If The Uploaded File Type Is 'jpeg'
            if (isImage[0] === 'jpeg') {
                // Add Inisde (uploadedFileIconText) The (jpg) Value
                uploadedFileIconText.innerHTML = 'jpg';
            } else { // else
                // Add Inisde (uploadedFileIconText) The Uploaded File Type 
                uploadedFileIconText.innerHTML = isImage[0];
            };

            // If The Uploaded File Is An Image
            if (isImage.length !== 0) {
                // Check, If File Size Is 2MB or Less
                if (fileSize <= 2000000) { // 2MB :)
                return true;
                } else { // Else File Size
                return alert('Please Your File Should be 2 Megabytes or Less');
                };
            } else { // Else File Type 
                return alert('Please make sure to upload An Image File Type');
            };
            };

            // :)


        /*========================================================================
        ===================  Daynamic input Order Prescription ====================
        =========================================================================*/
        // remove field
        $(document).on("click", "button.add-field" , function() {
            var html = '';
            html += '<div id="inputFormRow">';
                html += '<div class="input-group">';
                    html += '<input type="text" name="medicine[]" class="form-control m-input" placeholder="Type Medicine..." autocomplete="off">';
                    html += '<div class="input-group-append">';
                        html += '<button type="button" class="btn btn-green add-field"> <i class="fa-solid fa-plus"></i> </button>';
                        html += '<button type="button" class="btn btn-green remove-field"> <i class="fa-solid fa-trash"></i> </button>';
                    html += '</div>';
                html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove field
        $(document).on('click', 'button.remove-field', function () {
            $(this).closest('#inputFormRow').remove();
        });
        /*========================================================================
        ================= gategory toggle  =======================================
        =========================================================================*/

        $(".more-less-btn").click(function () {

            $('.fillter-links').toggleClass("height-normal");
            $(".less").toggle();
            $(".more").toggle();

        });

        $(".fillter-links a, .fillter-side-main a").click(function () {

            $(this).toggleClass("active-fil");

        });




    });


}(jQuery));

