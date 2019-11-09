
$(document).ready(function () {

    //banner-slider
    $("#banner-slider").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: 7000
                // transitionStyle: "fade"
                //transitionStyle: "fadeUp"
                //transitionStyle: "goDown"
                //transitionStyle: "backSlide"
    });

    //target link slide on click
    $('.down-arrow-box a').click(function () {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 0
        }, 1000);
        return false;
    });

    //flexslider
    $('.latest-arrival-slider').flexslider({
        animation: "slide"
    });

    //Parallax Background
    var $window = $(window); //You forgot this line in the above example
    $('section[data-type="background"]').each(function () {
        var $bgobj = $(this); // assigning the object
        $(window).scroll(function () {
            var yPos = -($window.scrollTop() / $bgobj.data('speed'));
            // Put together our final background position
            var coords = '100% ' + yPos + 'px';
            // Move the background
            $bgobj.css({backgroundPosition: coords
            });
        });
    });

    //active-sidebar-box
    $(".active-sidebar-box .sidebar-heading i").toggleClass("fa-minus");
    //$(".active-sidebar-box .sidebar-heading i").addClass("fa-minus");
    $(".active-sidebar-box > div").slideDown("medium");

    //sidebar-filter-box
    $(".sidebar-filter-box").each(function () {
        $(this).find("h4.sidebar-heading").click(function () {
            $(this).next("div").slideToggle("medium");
            $(this).find("i").toggleClass("fa-minus");
        });
    });

    //price range
//    $("#pricerange1").ionRangeSlider({
//        type: 'double',
//        min: 500,
//        max: 10000,
//        from: 1500
//    });

    //quantity spinner
    // This button will increment the value
    $('.qtyplus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });

    //image uploader with preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadImgPreviewDesign').attr('src', e.target.result);
                $('#uploadImgPreviewDesign').addClass("activeImg");
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#uploadImgLabel").change(function () {
        readURL(this);
    });// End of image uploader with preview

    //viewportchecker
    // jQuery('.col-md-12,.col-md-6,.col-ms-3,.col-md-4,.col-md-8,.workprocess,.navig ul li,.servicebox,.featured,.logobox').addClass("hidden_element").viewportChecker({
    //   classToAdd: 'visible_element animated fadeInUp', // Class to add to the elements when they are visible
    //   offset: 150
    // });

    // jQuery('').addClass("hidden_element").viewportChecker({
    //   classToAdd: 'visible_element animated flipInY', // Class to add to the elements when they are visible
    //   offset: 150
    // });

    //relatedProductsSlider
    $("#relatedProductsSlider").owlCarousel({
        autoPlay: 7000, //Set AutoPlay to 3 seconds         
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3]
    });

    $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

    //scrollUp
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });


    $(".butterfly-animation > div:gt(0)").hide();

    setInterval(function () {
        $('.butterfly-animation > div:first')
                .fadeOut(500)
                .next()
                .fadeIn(500)
                .end()
                .appendTo('.butterfly-animation');
    }, 300);

    //FancyBox
    /*
     *  Simple image gallery. Uses default settings
     */

    $('.fancybox').fancybox();

    /*
     *  Different effects
     */

    // Change title type, overlay closing speed
    $(".fancybox-effects-a").fancybox({
        helpers: {
            title: {
                type: 'outside'
            },
            overlay: {
                speedOut: 0
            }
        }
    });

    // Disable opening and closing animations, change title type
    $(".fancybox-effects-b").fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        helpers: {
            title: {
                type: 'over'
            }
        }
    });

    // Set custom style, close if clicked, change title type and overlay color
    $(".fancybox-effects-c").fancybox({
        wrapCSS: 'fancybox-custom',
        closeClick: true,
        openEffect: 'none',
        helpers: {
            title: {
                type: 'inside'
            },
            overlay: {
                css: {
                    'background': 'rgba(238,238,238,0.85)'
                }
            }
        }
    });

    // Remove padding, set opening and closing animations, close if clicked and disable overlay
    $(".fancybox-effects-d").fancybox({
        padding: 0,
        openEffect: 'elastic',
        openSpeed: 150,
        closeEffect: 'elastic',
        closeSpeed: 150,
        closeClick: true,
        helpers: {
            overlay: null
        }
    });

    /*
     *  Button helper. Disable animations, hide close button, change title type and content
     */

    $('.fancybox-buttons').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        prevEffect: 'none',
        nextEffect: 'none',
        closeBtn: false,
        helpers: {
            title: {
                type: 'inside'
            },
            buttons: {}
        },
        afterLoad: function () {
            this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
        }
    });


    /*
     *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
     */

    $('.fancybox-thumbs').fancybox({
        prevEffect: 'none',
        nextEffect: 'none',
        closeBtn: false,
        arrows: false,
        nextClick: true,
        helpers: {
            thumbs: {
                width: 50,
                height: 50
            }
        }
    });

    /*
     *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
     */
    $('.fancybox-media')
            .attr('rel', 'media-gallery')
            .fancybox({
                openEffect: 'none',
                closeEffect: 'none',
                prevEffect: 'none',
                nextEffect: 'none',
                arrows: false,
                helpers: {
                    media: {},
                    buttons: {}
                }
            });

    /*
     *  Open manually
     */

    $("#fancybox-manual-a").click(function () {
        $.fancybox.open('1_b.jpg');
    });

    $("#fancybox-manual-b").click(function () {
        $.fancybox.open({
            href: 'iframe.html',
            type: 'iframe',
            padding: 5
        });
    });

    $("#fancybox-manual-c").click(function () {
        $.fancybox.open([
            {
                href: '1_b.jpg',
                title: 'My title'
            }, {
                href: '2_b.jpg',
                title: '2nd title'
            }, {
                href: '3_b.jpg'
            }
        ], {
            helpers: {
                thumbs: {
                    width: 75,
                    height: 50
                }
            }
        });
    });

});