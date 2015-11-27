(function($) {
    "use strict";

    $(window).on("load", function() {

        /***************** Loading Screen ******************/

        $('.loader').fadeOut('slow'); // End Loader
        $('body').addClass('auto-overflow')

    });

    /***************** Slider Revolution ******************/

    $('.tp-banner').revolution({
        delay:9000,
        startheight:616,
        navigationVAlign: "center",
        soloArrowLeftHOffset: 100,
        soloArrowLeftVOffset: 10,
        soloArrowRightHOffset: 100,
        soloArrowRightVOffset: 10,
        hideTimerBar: "on",
        hideArrowsOnMobile:"off",
        hideThumbs:0
    }); // Main Slider

    var tb_container = $('.tp-banner-container');

    $('.main-navigation').find('.courses-menu').hover(function(){
        tb_container.addClass('slider-overlay');
    }, function() {
        tb_container.removeClass('slider-overlay');
    });

    /***************** Flex Slider ******************/

    $('#courses-slider').flexslider({
        animation: "slide",
        prevText: "",
        nextText: "",
        itemWidth: 292,
        itemMargin: 0,
        move: 1
    }); // Courses Slider

    $('.basic-slider, #single-slider, #sidebar-tweets, .portfolio-slider').flexslider({
        animation: "slide",
        controlNav: false,
        prevText: "",
        nextText: "",
        slideshow: false
    }); // Basic Slider

    /***************** Animation ******************/

    $('.fadeInDown-animation').addClass('occult').viewportChecker({
        classToAdd: 'show animated fadeInDown',
        offset: 100
    });

    /***************** Tabs ******************/

    $('ul.tabs li').on("click", function() {        
        var tab_id = $(this).attr('data-tab');
        $('ul.tabs li').removeClass('active');
        $('.tab-content').removeClass('active');
        $(this).addClass('active');
        $("#"+tab_id).addClass('active');
    });

    /***************** Accordion ******************/

    $('.accordion-header').toggleClass('inactive-header');
    $('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
    $('.accordion-content').first().slideDown().toggleClass('open-content');
    $('.accordion-header').on("click", function() {
        if($(this).is('.inactive-header')) {
            $('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
            $(this).toggleClass('active-header').toggleClass('inactive-header');
            $(this).next().slideToggle().toggleClass('open-content');
        }
        else {
            $(this).toggleClass('active-header').toggleClass('inactive-header');
            $(this).next().slideToggle().toggleClass('open-content');
        }
    });

    /***************** Mobile Navigation ******************/

    $('.main-navigation').find('ul:first').clone().appendTo('.mobile-container');

    $('.mobile-navigation').find('.mobile-btn').on("click", function(event) {
        $('body').addClass('mobile_nav-open');
        $('.mobile-navigation').find('.mobile-container').slideToggle();
        $(this).toggleClass('show-menu');
        event.preventDefault();
    });

    $('.mobile-navigation').find('.haschild').each(function() {
        var mobile_submenu = $(this).find('ul:first');
        $(this).hover(function() { 
            mobile_submenu.stop().css({overflow:'hidden', height:'auto', display:'none', paddingTop:0}).slideDown(500, function() {
                $(this).css({overflow:'visible', height:'auto'});
            }); 
        },function() {
            mobile_submenu.stop().slideUp(500, function() {   
                $(this).css({overflow:'hidden', display:'none'});
            });
        }); 
    });

    $('.mobile-navigation').find('.haschild').children('a').one('click',function() {
        return false;
    }).on("click", function() {
        return true;
    });

    /***************** Smooth Scrolling ******************/

    $('a[href*=#]:not([href=#])').on("click", function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({scrollTop: target.offset().top}, 750);
                return false;
            }
        }
    });

    /***************** Change Page Action ******************/

    $(".page-actions-dropdown .dropdown-actions").on("change", function() {
        var u = $(this).val();
        var c = $( ".page-actions-dropdown .dropdown-actions option:selected" ).attr('confirm');
        if(c) {
            if (confirm(c)) {
                $('body').append('<form action="'+u+'" method="post" style="display:none;" id="confirm_delete"><input type="hidden" value="POST" name="_method"></form>');
                $('#confirm_delete').submit();
                $('.loader').fadeIn("slow");
            };
        } else if(u) {
            document.location.href = u;
        }
        return false;
    });

})(jQuery);