

/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */


(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {

            //ADD REMOVE PADDING CLASS ON SCROLL
            $(window).scroll(function () {
                if ($(".navbar").offset().top >50) {
                    $(".navbar-fixed-top").addClass("navbar-pad-original");
                } else {
                    $(".navbar-fixed-top").removeClass("navbar-pad-original");
                }
            });
            //SLIDESHOW SCRIPT
            $('.carousel').carousel({
                interval: 1000 //TIME IN MILLI SECONDS
            })
            // PRETTYPHOTO FUNCTION 

            $("a.preview").prettyPhoto({
                social_tools: false
            });

       


            /*====================================
               WRITE YOUR SCRIPTS BELOW 
           ======================================*/


        },

        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));



