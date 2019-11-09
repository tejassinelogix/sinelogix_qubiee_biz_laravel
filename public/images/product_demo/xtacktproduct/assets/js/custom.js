$(document).ready(function () {

    //zoom slider
    $('#etalage').etalage({
        thumb_image_width: 600,
        thumb_image_height: 350,
        show_hint: true,
        click_callback: function (image_anchor, instance_id) {
            alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
        }
    });
    // bhoechie-tab-menu
    $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

    //respMenu
    $(".respMenu").click(function () {
        $(".primaryMenu").slideToggle("fast");
    });

    //icons in dropdowm menu
    $(".primaryMenu > ul > li > .megamenu").parent().find("a:first").append(' <i class="fa fa-angle-down"></i>');
    $(".primaryMenu > ul > li > .megamenu > ul > li > ul").parent().find("a:first").append(' <i class="fa fa-angle-right pull-right"></i>');
    $(".primaryMenu > ul > li > .megamenu > ul > li > ul > li > ul").parent().find("a:first").append(' <i class="fa fa-angle-right pull-right"></i>');

    //bannerSlider
    $("#bannerSlider").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        pagination: false,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: 7000,
        navigationText: [
            "<i class='ion-ios-arrow-left'></i>",
            "<i class='ion-ios-arrow-right'></i>"
        ],
        transitionStyle: "fade",
        // transitionStyle: "fadeUp",
        // transitionStyle: "goDown",
        // transitionStyle: "backSlide",
    });

    //bannerSlider
    $("#testomonialSlider").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        pagination: true,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: 7000,
        navigationText: [
            "<i class='ion-ios-arrow-left'></i>",
            "<i class='ion-ios-arrow-right'></i>"
        ],
        transitionStyle: "fade",
        transitionStyle: "fadeUp",
                transitionStyle: "goDown",
                transitionStyle: "backSlide",
    });
    //parallax scrolling bg
    var $window = $(window); //You forgot this line in the above example

    $('section[data-type="background"]').each(function () {
        var $bgobj = $(this); // assigning the object
        $(window).scroll(function () {
            var yPos = -($window.scrollTop() / $bgobj.data('speed'));
            // Put together our final background position
            var coords = '100% ' + yPos + 'px';
            // Move the background
            $bgobj.css({
                backgroundPosition: coords
            });
        });
    });

    //positioned parallax element
    function parallax() {
        var scrolled = $(window).scrollTop();
        $('.parallax-shape1 img').css('top', -(scrolled * 0.55) + 'px');
    }
    $(window).scroll(function (e) {
        parallax();
    });

    //popularProductsSlider
    $("#newproductslider").owlCarousel({
        autoPlay: 4000, //Set AutoPlay to 3 seconds         
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 2],
        pagination: false,
        navigation: true,
        navigationText: [
            "<i class='ion-ios-arrow-left'></i>",
            "<i class='ion-ios-arrow-right'></i>"
        ]
    });


    //brandsSlider
    $("#brandsSlider").owlCarousel({
        autoPlay: 7500, //Set AutoPlay to 3 seconds         
        items: 6,
        itemsDesktop: [1199, 5],
        itemsDesktopSmall: [979, 4],
        pagination: false,
        navigation: true,
        navigationText: [
            "<i class='ion-ios-arrow-left'></i>",
            "<i class='ion-ios-arrow-right'></i>"
        ]
    });

    //target link slide on click
    $('.down-arrow-box a').click(function () {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 0
        }, 1000);
        return false;

    });
    //price range
    $("#pricerange1").ionRangeSlider({
        type: 'double',
        min: 500,
        max: 10000,
        from: 1500
    });
    //  middal menu
    $('.menuBtn').click(function () {
        event.preventDefault();
        $(".menuOverlay").fadeToggle("slow");
        $(".menuBtn > div").toggleClass("menuBtnAbsPosition");
        $(".menuSection").fadeToggle("slow");
    });

    //scrollUp

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
        if ($(this).scrollTop() > 100 && $(window).width() > 768) {
            $(".navigationBar").addClass("navigationBarFixed");
        } else {
            $(".navigationBar").removeClass("navigationBarFixed");
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    // spinner
    $('.spinner .btn:first-of-type').on('click', function () {
        $('.spinner input').val(parseInt($('.spinner input').val(), 10) + 1);
    });
    $('.spinner .btn:last-of-type').on('click', function () {
        $('.spinner input').val(parseInt($('.spinner input').val(), 10) - 1);
    });
    // dropdown menu hovers

    // $('.navbar-nav .dropdown').hover(function () {
    //   $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    // }, function () {
    //   $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
    // });


});