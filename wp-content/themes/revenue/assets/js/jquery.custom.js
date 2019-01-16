
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        /*-----------------------------------------------------------------------------------*/
        /*  Superfish Menu
        /*-----------------------------------------------------------------------------------*/
        // initialise plugin
        var example = $('.sf-menu').superfish({
            //add options here if required
            delay:       100,
            speed:       'fast',
            autoArrows:  false  
        }); 

        /*-----------------------------------------------------------------------------------*/
        /*  bxSlider
        /*-----------------------------------------------------------------------------------*/
        $('.bxslider').show().bxSlider({
            auto: true,
            preloadImages: 'all',
            pause: '6000',
            autoHover: true,
            adaptiveHeight: true,
            mode: 'fade',
            onSliderLoad: function(){ 
                $(".bxslider").css("display", "block");
                $(".bxslider").css("visibility", "visible");  
                $('#featured-content .featured-slide .entry-header').fadeIn("100");
                $('#featured-content .featured-slide .gradient').fadeIn("100");                       
            }
        });
        /*-----------------------------------------------------------------------------------*/
        /*  Slick Mobile Menu
        /*-----------------------------------------------------------------------------------*/
        $('#primary-menu').slicknav({
            prependTo: '#slick-mobile-menu',
            allowParentLinks: true,
            label: 'Menu'            
        });                                    

        /*-----------------------------------------------------------------------------------*/
        /*  Mobile Menu & Search
        /*-----------------------------------------------------------------------------------*/

        /* Mobile Menu */
        $('.slicknav_btn').click(function(){

            $('.header-search').slideUp('fast', function() {});
            $('.search-icon > .genericon-search').removeClass('active');
            $('.search-icon > .genericon-close').removeClass('active');

        });

        /* Mobile Search */
        $('.search-icon > .genericon-search').click(function(){

            $('.header-search').slideDown('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

            $('.slicknav_btn').removeClass('slicknav_open');
            $('.slicknav_nav').addClass('slicknav_hidden');
            $('.slicknav_nav').css('display','none');

        });

        $('.search-icon > .genericon-close').click(function(){

            $('.header-search').slideUp('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

            $('.slicknav_btn').removeClass('slicknav_open');
            $('.slicknav_nav').addClass('slicknav_hidden');  
            $('.slicknav_nav').css('display','none');


        });          


    });

})(jQuery);