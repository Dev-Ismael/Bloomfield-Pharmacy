(function($) {
    $(document).ready(function() {


        /*========================================================================
        =================== Service ==============================================
        =========================================================================*/
        $(".service-item button").on("click", function() {

            var btnTxt = $(this).text();
            $(this).siblings('p').find('span#more').toggleClass("d-none");
            $(this).siblings('p').find('span#dots').toggleClass("d-none");

            if (btnTxt == "Read more") {
                $(this).text("Read less");
            } else {
                $(this).text("Read more");
            }

        });






    });





}(jQuery));