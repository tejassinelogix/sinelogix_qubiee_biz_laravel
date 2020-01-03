$(document).ready(function () {
console.log('custom calls')
    //container replace
    /*$(".containerWrapper").addClass("container");
     $(".containerWrapper.container").removeClass("containerWrapper");*/

    //zoom slider
//    $('#etalage').etalage({
//
//      
//        show_hint: true,
//        click_callback: function (image_anchor, instance_id) {
//            alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
//        }
//    });
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
        autoPlay: 1000000, //Set AutoPlay to 3 seconds         
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 2],
        pagination: false,
        navigation: true,
        navigationText: [
            "<i class='ion-ios-arrow-left'></i>",
            "<i class='ion-ios-arrow-right'></i>"
        ]
    });

    //Offer Slider
    $("#offerslider").owlCarousel({
        autoPlay: 4000, //Set AutoPlay to 3 seconds         
        items: 4,
        itemsDesktop: [1199, 3],
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
    var writeResult = function () {
        filter_data_price(from, to)
        var result = "from: " + from + ", to: " + to;
        $result.html(result);
        $price_show.html(result);

    };
    var $range = $(".js-range-slider"),
            $result = $(".js-result"),
            $price_show = $("#price_show"),
            $getvalues = $(".js-get-values"),
            from = 0,
            to = 0;

    var saveResult = function (data) {
        from = data.from;
        to = data.to;
    };
    $("#pricerange1").ionRangeSlider({
        type: 'double',
        min: 0,
        max: 1000,
        from: 0,
        onStart: function (data) {
            saveResult(data);
            //writeResult();
        },
        onChange: saveResult,
        onFinish: saveResult
    });
    $getvalues.on("click", writeResult);
    //end slider filter price range
    //  middal menu
    $('.menuBtn').click(function (event) {
        event.preventDefault();
        $(".menuOverlay").fadeToggle("slow");
        $(".menuBtn > div").toggleClass("menuBtnAbsPosition");
//        $(".menuSection").fadeToggle("slow");
        $(".menuSection").toggleClass("meniSectionTable");
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
    if ($(window).width() < 991) {
        $(".dropdown >a").attr('data-toggle', 'dropdown').attr('aria-haspopup', 'true').attr('aria-expanded', 'true');
    }
    $('#finalResult').hide();

    $('#searchproduct').on('keyup', function () {
        $('#finalResult').empty();
        if ($("#searchproduct").val().length > 0) {
            $('#finalResult').show();
            var value = $(this).val();
            //$('#finalResult').empty();
            $.ajax({
                url: '/ajax',
                type: 'GET',
                data: {id: value},
                dataType: "JSON",
                success: function (response)
                {

                    // $('#something').html(response);
//                   var abc=response.length;
                    var guestfamilyName = response.product;
                    //alert(JSON.stringify(guestfamilyName));
                    if (response) {
                        $("#finalResult").empty();
                        // $("#finalResult").append('<a>Please Select</a>');
                        var guestfamilyName = response.product;
                        $.each(guestfamilyName, function (key, value) {
                            //alert(value.original_price);

                            if (value.discount == 0 || value.discount == "") {
                                $('#finalResult').append($('<div class="addtocart-btn-search-wrap"><a href="/productdetails/' + value.url + '"><strong>' + value.name + '</strong><span class="searchcategory">|' + value.category_name + '</span><span class="searchprice"> $ ' + value.original_price + '</span><a href="/product-add-to-cart/' + value.id + '" class="addtocart-btn addtocart-btn-search"><ion-icon name="cart"></ion-icon> Add<a></a></div>'));
                            } else {
                                $('#finalResult').append($('<div class="addtocart-btn-search-wrap"><a href="/productdetails/' + value.url + '"><strong>' + value.name + '</strong><span class="searchcategory">|' + value.category_name + '</span><span class="searchprice"> $ ' + value.price + '</span><span class="searchprice"><strike> $ ' + value.original_price + '</strike></span><a href="/product-add-to-cart/' + value.id + '" class="addtocart-btn addtocart-btn-search"><ion-icon name="cart"></ion-icon> Add<a></a></div>'));
                            }

                        });
                    } else {
                        $("#finalResult").empty();
                        // $("#finalResult").append('<option value="0">Please Select Category</option>');
                    }
                }
            });
        } else if ($("#searchproduct").val().length < 0) {
            $('#finalResult').hide();
            $('#finalResult').empty();
            // $('#country').empty();
//                               $('#state').empty();
//                                $("#Address input[type='text']").val("");
        }

    });
    function filter_data_price(minimum_price, maximum_price)
    {
        $('.filter_data').show();
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        // var minimum_price = $('#hidden_minimum_price').val();
        var categoryname = $('#cateoryname').val();
        var pagename = $('#pagename').val();
//       alert(categoryname);
//       alert(maximum_price);
//       alert(minimum_price);
        $.ajax({
            url: '/categoryfilterprice',
            type: "GET",
            data: {minimum_price: minimum_price, maximum_price: maximum_price, categoryname: categoryname, pagename: pagename},
            // data:{brand:brand},
            // dataType:"JSON",
            success: function (data) {

                var text = "";
                var valueid;
                //alert(JSON.parse(data));
                data = JSON.parse(data);
//             alert(data);
//             var myJSON = JSON.stringify(data);
//             alert(myJSON);
//             alert(data.success);
                if (data.success == "1") {

                    $.each(data.data, function (index, value) {
                        var valuediscount = value.discount;
                        $('.filter_data').show();
                        var hideclass
                        if (!valuediscount || value.discount == 0) {
                            // $('.discountoffer').hide();
                            hideclass = "display: none;";

                            // $('.orignalpricehide').show();
                        } else {
                            //  alert("call not empty");
                            hideclass = "display: block;";
                            //$('.orignalpricehide').hide();
                        }
                        $('.product-box-class').hide();


                        text += '<div class="col-sm-3 product-box-class filter">' +
                                '<div class="productBlock">' +
                                '<a href="/productdetails/' + value.url + '" class="productBlockImg">' +
                                '<div style="background: url(' + "/public/images/" + value.product_image + "" + ') no-repeat;"></div>' +
                                '</a>' +
                                '<span class="discountoffer" style="' + hideclass + '"> % Offer ' + value.discount + '</span>' +
                                '<div class="productBlockInfo">' +
                                '<h3 class="protitle">' + value.name + '</h3>' +
                                '<ul class="proRating">' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-half-o"></i></li>' +
                                '</ul>' +
                                '<div class="loaderWrapperAjax loader-wrapper' + value.id + '" style="display: none;"><img src="public/assets/images/ajax-loader.gif"></div>' +
                                '<div class="productInfoMsgAlert addtowishmessage' + value.id + '" ></div>' +
                                '<button  data-id="' + value.id + '" class="wishlist-btn addtowishlist">Add to Wishlist</button>' +
                                '<h2 class="propricing">$' + value.price +
                                '<small><strike>$' + value.original_price + '</strike></small></h2>' +
                                '</div>' +
                                '<div class="productBlockViewDtl">' +
                                '<a href="/productdetails/' + value.url + '" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>' +
                                '<a href="/add-to-cart/' + value.id + '" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';




//                    text +='<div class="col-md-4 col-sm-6">'+
//                            '<div class="product-box">'+
//                            '<a href="/productdetails/'+value.url+'" class="productImgBlock imglink">'+
//                            '<span>'+
//                            '<i class="fa fa-search"></i>'+
//                            '</span>';
//                    if(value.discount != null){
//                           text +='<span class="discountoffer">'+value.discount+'% Off</span>';
//                   
//                         }else{
//                            text +='<span class=""></span>';
//                         }
//                            //'<span class="discountoffer">'+value.discount+'% Off</span>'+
//                    text +='<div class="productImg" style="background: url('+"'/public/images/"+value.product_image+"') top no-repeat;"+'>'+
//                            '</div>'+
//                            '<div class="clear"></div></a>'+
//                            '<div class="productDisc">'+
//                            '<a href="/productdetails/'+value.url+'" class="titlelink">'+value.name+'</a>'+
//                            '<strong class="ServiceCost">'+
//                            '<strike>$'+value.original_price+'</strike></strong>'+
//                            '<h3>$'+value.price+'</h3>'+  
//                            '<span class="services-btns">'+
//                            '<a href="/productdetails/'+value.url+'" class="addtocart-btn"><ion-icon name="eye"></ion-icon>View Details</a>'+
//                            '<a class="addtocart-btn" href="/add-to-cart/'+value.id+'"><ion-icon name="cart"></ion-icon>Add To Cart</a>'+
//                            '</span>'+
//                            '</div>'+
//                            '</div>'+
//                            '</div>';

                        valueid = value.id;
                    });


//                    text += '<div id="remove-row">' +
//                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
//                            '</div>';
                    $('#remove-row').remove();
                    $('#postfilterdata').html(text);
                } else {

                    //$('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Added!</div>');
                }
            }
        });
    }
});

//Read More 
$(document).ready(function () {
    // Configure/customize these variables.
    var showChar = 100;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";


    $('.more').each(function () {
        var content = $(this).html();

        if (content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function () {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });


    function filter_data()
    {
        console.log('filter calls')
        $('.filter_data').show();
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');

        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url: '/categoryfilter',
            type: "GET",
//            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
            data: {brand: brand},
            // dataType:"JSON",
            success: function (data) {
                console.log('data')
                console.log(data)
//                 data = JSON.parse(data);
//                
//            var text = "";
//                 if (data.success == "1") {
//                      alert("call now function if");
//                $.each(data.data, function (index, value) {
//                    text += '<a href="#" class="imageSlideBlock preownedCarIcon" data-id="' + value.product_name + '">' +
//                            '<img src="' + value.product_name + '" alt="" />' +
//                            '<p><strong>' + value.product_name + '</strong></p>' +
//                            //'<small><i class="fa fa-rupee"></i>' + value.price + ' <i class="fa fa-tachometer"></i>' + value.kmDriven + '</small>' +
//                            '<small><i class="fa fa-rupee"></i>' + value.product_name + '</small>' +
//                            '</a>';
//                });
//                $('#filter_data').html(text);
//            } else if (data.success == "0")
//            {
//                $('#filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Cars Found</div>');
//            }
                var text = "";
                var valueid;
                //alert(JSON.parse(data));
                data = JSON.parse(data);
                // alert(data);
                if (data.success == 1) {
                    console.log('success')
                    $.each(data.data, function (index, value) {

                        $('.product-box-class').hide();
                        text += '<div class="col-sm-3 new_products_added">' +
                                '<div class="productBlock">' +
                                '<a href="/productdetails/' + value.url + '" class="productBlockImg">' +
//        '<div style="background: url('+"'/public/images/"+value.product_image+"') no-repeat;"+'></div>'+
                                '<div style="background: url(' + "/public/images/" + value.product_image + "" + ') no-repeat;"></div>' +
                                '</a>' +
                                '<div class="productBlockInfo">' +
                                '<h3 class="protitle">' + value.name + '</h3>' +
                                '<ul class="ratings">' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '</ul>' +
                                '<a href="/add-to-wishlist/' + value.id + '" class="wishlist-btn" title="wishlist">Add to Wishlist</a>' +
                                '<h2 class="propricing">$' + value.price +
                                '<small><strike> $' + value.original_price + '</strike></small></h2>' +
                                '</div>' +
                                '<div class="productBlockViewDtl">' +
                                '<a href="/productdetails/' + value.url + '" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>' +
                                '<a href="/add-to-cart/' + value.id + '" class="btn2">ADD TO CART <i class="fa fa-shopping-cart"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';












//                    text +='<div class="col-md-4 col-sm-6">'+
//                            '<div class="product-box">'+
//                            '<a href="/productdetails/'+value.url+'" class="productImgBlock imglink">'+
//                            '<span>'+
//                            '<i class="fa fa-search"></i>'+
//                            '</span>';
//                    //if(value.discount=='null'){
//                    if (value.discount != null){
//                      
//                             //alert("cal not emapty");
//                           text +='<span class="discountoffer">'+value.discount+'% Off</span>';
//                         }else{
//                             //alert("call emapty");
//                        text +='<span class=""></span>';
//                         }
//                    text += '<div class="productImg" style="background: url('+"'/public/images/"+value.product_image+"') top no-repeat;"+'></div>'+
//                            '<div class="clear"></div></a> '+
//                            '<div class="productDisc">'+
//                            '<a href="/productdetails/'+value.url+'" class="titlelink">'+value.name+'</a>'+
//                            '<strong class="ServiceCost">'+
//                            '<strike>$'+value.original_price+'</strike></strong>'+
//                            '<h3>$'+value.price+'</h3>'+  
//                            '<span class="services-btns">'+
//                            '<a href="/productdetails/'+value.url+'" class="addtocart-btn"><ion-icon name="eye"></ion-icon>View Details</a>'+
//                            '<a class="addtocart-btn" href="/add-to-cart/'+value.id+'"><ion-icon name="cart"></ion-icon>Add To Cart</a>'+
//                            '</span>'+
//                            '</div>'+
//                            '</div>'+
//                            '</div>';
                        valueid = value.id;
                    });
//                    text += '<div id="remove-row">' +
//                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
//                            '</div>';
                    $('#remove-row').remove();
                    $('.filter_data').html(text);
                } else {
                    console.log('else')
                    //$('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Added!</div>');
                }
            }
        });
    }
    function get_filter(class_name)
    {
        var filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }
    $('.common_selector').click(function () {
        //var a= $('input[name=chechkcategory]').attr('checked', true);
        var categorycheck = $('input[name=chechkcategory]').is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            filter_data();
        } else {
            $('.product-box-class').show();
            $('.filter_data').hide();
        }

    });
    //code for most selling

    function get_filter_sel(class_name)
    {
        var filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_seleing_selector').click(function () {
        //var a= $('input[name=chechkmostselling]').attr('checked', true);
        var categorycheck = $('input[name=chechkmostselling]').is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            filter_data_sel();
        } else {
            $('.product-box-class').show();
            $('.filter_data').hide();
        }

    });


    function filter_data_sel()
    {
        $('.filter_data').show();

        $('.filter_data').html('<div id="loading" style="" ></div>');

        var brand = get_filter_sel('brandseling');

        $.ajax({
            url: '/mostsellingfilter',
            type: "GET",
            data: {brand: brand},
            // dataType:"JSON",
            success: function (data) {

                var text = "";
                var valueid;
                //alert(JSON.parse(data));
                data = JSON.parse(data);
                // alert(data);
                if (data.success == "1") {

                    $.each(data.data, function (index, value) {
                        var valuediscount = value.discount;
//                        alert(value.discount);
                        var hideclass
                        if (!valuediscount || value.discount == 0) {
                            // $('.discountoffer').hide();
                            hideclass = "display: none;";

                            // $('.orignalpricehide').show();
                        } else {
                            //  alert("call not empty");
                            hideclass = "display: block;";
                            //$('.orignalpricehide').hide();
                        }
                        $('.product-box-class').hide();
                        text += '<div class="col-sm-3 product-box-class filter">' +
                                '<div class="productBlock">' +
                                '<a href="/productdetails/' + value.url + '" class="productBlockImg">' +
                                '<div style="background: url(' + "/public/images/" + value.product_image + "" + ') no-repeat;"></div>' +
                                '</a>' +
                                '<span class="discountoffer" style="' + hideclass + '"> % Offer ' + value.discount + '</span>' +
                                '<div class="productBlockInfo">' +
                                '<h3 class="protitle">' + value.name + '</h3>' +
                                '<ul class="proRating">' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-half-o"></i></li>' +
                                '</ul>' +
                                '<div class="loaderWrapperAjax loader-wrapper' + value.id + '" style="display: none;"><img src="public/assets/images/ajax-loader.gif"></div>' +
                                '<div class="productInfoMsgAlert addtowishmessage' + value.id + '" ></div>' +
                                '<button  data-id="' + value.id + '" class="wishlist-btn addtowishlist">Add to Wishlist</button>' +
                                '<h2 class="propricing">$' + value.price +
                                '<small><strike>$' + value.original_price + '</strike></small></h2>' +
                                '</div>' +
                                '<div class="productBlockViewDtl">' +
                                '<a href="/productdetails/' + value.url + '" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>' +
                                '<a href="/add-to-cart/' + value.id + '" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';


                        valueid = value.id;
                    });
//                text += '<div id="remove-row">' +
//                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
//                            '</div>';
                    $('#remove-row').remove();
                    $('#postfilterdata').html(text);
                } else {
                    $('#remove-row').remove();
                    // $('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Saled!</div>');
                }
            }
        });
    }


    // end code most selling
    $(document).on('click', '#btn-more', function () {
        var id = $(this).data('id');
        var categoryname = $('#cateoryname').val();

        // $("#btn-more").html("Loading....");
        $.ajax({
            //url : '{{ url("demos/loaddata") }}',
            url: '/loaddata',
            method: "get",
            data: {id: id, categoryname: categoryname},
            //dataType : "text",
            success: function (data)
            {
                var text = "";
                var valueid;

                //alert(JSON.parse(data));
                data = JSON.parse(data);
                //alert(data);
                if (data.success == "1") {

                    $.each(data.data, function (index, value) {
                        if (value.discount != null) {
                            $('.discountoffer').show();

                        } else {
                            //  alert("call not empty");
                            $('.discountoffer').hide();
                        }

                        text += '<div class="col-sm-3">' +
                                '<div class="productBlock">' +
                                '<a href="/productdetails/' + value.url + '" class="productBlockImg">' +
//        '<div style="background: url('+"'/public/images/"+value.product_image+"') no-repeat;"+'></div>'+
                                '<div style="background: url(' + "/public/images/" + value.product_image + "" + ') no-repeat;"></div>' +
                                '</a>' +
                                '<div class="productBlockInfo">' +
                                '<h3 class="protitle">' + value.name + '</h3>' +
                                '<ul class="proRating">' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-half-o"></i></li>' +
                                '</ul>' +
                                '<span class="discountoffer">&nbsp;</span>' +
                                '<h2 class="propricing">$' + value.price +
                                '<small><strike> $' + value.original_price + '</strike><small></h2>' +
                                '<p class="proinfo">Earliest Delivery: Today</p>' +
                                '</div>' +
                                '<div class="productBlockViewDtl">' +
                                '<a href="/productdetails/' + value.url + '" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>' +
                                '<a href="/add-to-cart/' + value.id + '" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';




                        // $('.product-box-class').hide();
//                    text +='<div class="col-md-4 col-sm-6">'+
//                            '<div class="product-box">'+
//                            '<a href="/productdetails/'+value.url+'" class="productImgBlock imglink">'+
//                            '<span>'+
//                            '<i class="fa fa-search"></i>'+
//                            '</span>';
//                    if(value.discount != null){
//                                text +='<span class="discountoffer">'+value.discount+'% Off</span>';
//                   
//                         }else{
//                              text +='<span class=""></span>';
//                 
//                         }
//                            //'<span class="discountoffer">'+value.discount+'% Off</span>'+
//                    text +='<div class="productImg" style="background: url('+"'/public/images/"+value.product_image+"') top no-repeat;"+'>'+
//                            '</div>'+
//                            '<div class="clear"></div></a>'+
//                            '<div class="productDisc">'+
//                            '<a href="/productdetails/'+value.url+'" class="titlelink">'+value.name+'</a>'+
//                            '<strong class="ServiceCost">'+
//                            '<strike>$'+value.original_price+'</strike></strong>'+
//                            '<h3>$'+value.price+'</h3>'+  
//                            '<span class="services-btns">'+
//                            '<a href="/productdetails/'+value.url+'" class="addtocart-btn"><ion-icon name="eye"></ion-icon>View Details</a>'+
//                            '<a class="addtocart-btn" href="/add-to-cart/'+value.id+'"><ion-icon name="cart"></ion-icon>Add To Cart</a>'+
//                            '</span>'+
//                            '</div>'+
//                            '</div>'+
//                            '</div>';


                        valueid = value.id;


                    });
//                    text += '<div id="remove-row">' +
//                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
//                            '</div>';
                    $('#remove-row').remove();
                    //$('.filter_data-ajax').append(text);
                    $('.filter_data').append(text);
                } else {
                    //$('.filter_data').append('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product !</div>');

                    //$('#btn-more').html("No Data");
                    $('#btn-more').prop("disabled", true);
                    $('#btn-more').hide();
                }
//              if(data != '') 
//              {
//                  $('#remove-row').remove();
//                  $('#filter_data').append(data);
//                  
//              }
//              else
//              {
//                  $('#btn-more').html("No Data");
//              }
            }
        });
    });
    //ajax load code here end
    //$('.product-box-class').show();
    $('#searchproduct').keypress(function (e) {
        if (e.which == 13) {//Enter key pressed
            $('.searchproduct').click();
        }
    });
    $('#password').keypress(function (e) {
        if (e.which == 13) {//Enter key pressed
            $('#loginuser').click();
        }
    });
    $("#ReviewOrderTab").attr("href", "#");
    $("#MakePaymentTab").attr("href", "#");
    $('#nextreview').attr("disabled", "disabled");
    $('#nextreviewnogift').attr("disabled", "disabled");
    var sendergiftmark = $("#sendergiftmark").val();
    var shippingmark = $("#shippingmark").val();

    if (sendergiftmark == 1 && shippingmark != 1) {

        event.preventDefault();
        jQuery.noConflict();
        $("#senderDetailsModalOpen").modal("show");
//       if(shippingmark !=1){
//           
//       }
        $(".ConfirmAddress").attr("href", "#");
    } else if (sendergiftmark == 1 && shippingmark == 1) {

        $(".ConfirmAddress").attr("href", "#ConfirmAddress");
    } else if (sendergiftmark == 0 && shippingmark == 0) {

        $(".ConfirmAddress").attr("href", "#ConfirmAddress");
    } else {

        $(".ConfirmAddress").attr("href", "#");
    }
//    $('.chb').click(function() { 
    $(".chb").click(function (e) {
        $('#nextreviewnogift').attr("enabled", "enabled");
        $("#nextreviewnogift").removeAttr("disabled");
        if ($(this).is(':checked') && $('.rdCheck').is(':checked')) {
            //alert("is checked");
            $('#nextreview').attr("enabled", "enabled");
            $("#nextreview").removeAttr("disabled");
            $(".ConfirmAddress").attr("href", "#ConfirmAddress");
            $("#ReviewOrderTab").attr("href", "#ReviewOrder");
            $("#MakePaymentTab").attr("href", "#MakePayment");
        } else {
            //alert("not checked");
            $('#nextreview').attr("disabled", "disabled");
            $("#nextreview").removeAttr("enabled");
            $("#ConfirmAddress").attr("href", "#");
            $("#ReviewOrderTab").attr("href", "#");
            $("#MakePaymentTab").attr("href", "#");
        }
    });
    $(".rdCheck").click(function (e) {
        if ($(this).is(':checked') && $('.chb').is(':checked')) {
            //alert("is checked");
            $('#nextreview').attr("enabled", "enabled");
            $("#nextreview").removeAttr("disabled");
            $(".ConfirmAddress").attr("href", "#ConfirmAddress");
            $("#ReviewOrderTab").attr("href", "#ReviewOrder");
            $("#MakePaymentTab").attr("href", "#MakePayment");
        } else {
            //alert("not checked");
            $('#nextreview').attr("disabled", "disabled");
            $("#nextreview").removeAttr("enabled");
            $("#ConfirmAddress").attr("href", "#");
            $("#ReviewOrderTab").attr("href", "#");
            $("#MakePaymentTab").attr("href", "#");
        }
    });
    $("#state,#country").keypress(function (event) {
        var inputValue = event.charCode;
        if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
            event.preventDefault();
        }
    });

    $(document).on('click', '.addtowishlist', function () {
        var id = $(this).data('id');

        jQuery('.loader-wrapper' + id).show();
        $.ajax({
            //url : '{{ url("demos/loaddata") }}',
            url: '/add-to-wishlist',
            method: "get",
            data: {id: id},
            //dataType : "text",
            success: function (data)
            { //alert(JSON.parse(data));
                jQuery('.loader-wrapper' + id).hide();
                data = JSON.parse(data);
                event.preventDefault();
                if (data.success == "1") {
                    jQuery.noConflict();
                    $("#myModalajax").modal("show");
                    $('.addtowishmessage' + id).html('<span class="addtoWishMsg">Product added in wishlist </span>');
                    $('.modal-body-addtowish').html('<span class="addtoWishMsg">Product added in wishlist <span>');
//                    $.each(data.data, function (index, value) {
//                        });
                } else if (data.success == "2") {

                    $('.addtowishmessage' + id).html('<span class="addtoWishMsg">Product already added in wishlist <span>');

                } else {
                    $('.addtowishmessage' + id).html('<span class="addtoWishMsgFiled">Product added in wishlist failed </span>');
                }

            },
            error: function () {
                jQuery('.loader-wrapper' + id).hide();
                $('.addtowishmessage' + id).html('<span class="addtoWishMsgLogin">Please login to check Wishlist<span>');

            }

        });
    });
    $('.common_seleing_selector-higher').click(function () {

        //var a= $('input[name=chechkmostselling]').attr('checked', true);
        var categorycheck = $('input[name=chechkhigherprice]').is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            filter_data_higher();
        } else {
            $('.product-box-class').show();
            $('.filter_data').hide();
        }

    });
    //start code for main category higher and lower filters
    function filter_data_higher()
    {

        $('.filter_data').show();

        $('.filter_data').html('<div id="loading" style="" ></div>');

        //var brand = get_filter_sel('brandseling');
        var brand = $('#cateoryname').val();
        $.ajax({
            url: '/higherpricefilter',
            type: "GET",
            data: {brand: brand},
            // dataType:"JSON",
            success: function (data) {

                var text = "";
                var valueid;
                //alert(JSON.parse(data));
                data = JSON.parse(data);
                // alert(data);
                if (data.success == "1") {

                    $.each(data.data, function (index, value) {
                        var valuediscount = value.discount;
//                        alert(value.discount);
                        var hideclass
                        if (!valuediscount || value.discount == 0) {
                            // $('.discountoffer').hide();
                            hideclass = "display: none;";

                            // $('.orignalpricehide').show();
                        } else {
                            //  alert("call not empty");
                            hideclass = "display: block;";
                            //$('.orignalpricehide').hide();
                        }
                        $('.product-box-class').hide();
                        text += '<div class="col-sm-3 product-box-class filter">' +
                                '<div class="productBlock">' +
                                '<a href="/productdetails/' + value.url + '" class="productBlockImg">' +
                                '<div style="background: url(' + "/public/images/" + value.product_image + "" + ') no-repeat;"></div>' +
                                '</a>' +
                                '<span class="discountoffer" style="' + hideclass + '"> % Offer ' + value.discount + '</span>' +
                                '<div class="productBlockInfo">' +
                                '<h3 class="protitle">' + value.name + '</h3>' +
                                '<ul class="proRating">' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-half-o"></i></li>' +
                                '</ul>' +
                                '<div class="loaderWrapperAjax loader-wrapper' + value.id + '" style="display: none;"><img src="public/assets/images/ajax-loader.gif"></div>' +
                                '<div class="productInfoMsgAlert addtowishmessage' + value.id + '" ></div>' +
                                '<button  data-id="' + value.id + '" class="wishlist-btn addtowishlist">Add to Wishlist</button>' +
                                '<h2 class="propricing">$' + value.price +
                                '<small><strike>$' + value.original_price + '</strike></small></h2>' +
                                '</div>' +
                                '<div class="productBlockViewDtl">' +
                                '<a href="/productdetails/' + value.url + '" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>' +
                                '<a href="/add-to-cart/' + value.id + '" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';


                        valueid = value.id;
                    });
//                text += '<div id="remove-row">' +
//                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
//                            '</div>';
                    $('#remove-row').remove();
                    $('#postfilterdata').html(text);
                } else {
                    $('#remove-row').remove();
                    // $('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Saled!</div>');
                }
            }
        });
    }
    $('.common_seleing_selector-lawer').click(function () {

        //var a= $('input[name=chechkmostselling]').attr('checked', true);
        var categorycheck = $('input[name=chechkhigherprice]').is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            filter_data_lower();
        } else {
            $('.product-box-class').show();
            $('.filter_data').hide();
        }

    });
    function filter_data_lower()
    {

        $('.filter_data').show();

        $('.filter_data').html('<div id="loading" style="" ></div>');

        //var brand = get_filter_sel('brandseling');
        var brand = $('#cateoryname').val();
        $.ajax({
            url: '/lowerpricefilter',
            type: "GET",
            data: {brand: brand},
            // dataType:"JSON",
            success: function (data) {

                var text = "";
                var valueid;
                //alert(JSON.parse(data));
                data = JSON.parse(data);
                // alert(data);
                if (data.success == "1") {

                    $.each(data.data, function (index, value) {
                        var valuediscount = value.discount;
//                        alert(value.discount);
                        var hideclass
                        if (!valuediscount || value.discount == 0) {
                            // $('.discountoffer').hide();
                            hideclass = "display: none;";

                            // $('.orignalpricehide').show();
                        } else {
                            //  alert("call not empty");
                            hideclass = "display: block;";
                            //$('.orignalpricehide').hide();
                        }
                        $('.product-box-class').hide();
                        text += '<div class="col-sm-3 product-box-class filter">' +
                                '<div class="productBlock">' +
                                '<a href="/productdetails/' + value.url + '" class="productBlockImg">' +
                                '<div style="background: url(' + "/public/images/" + value.product_image + "" + ') no-repeat;"></div>' +
                                '</a>' +
                                '<span class="discountoffer" style="' + hideclass + '"> % Offer ' + value.discount + '</span>' +
                                '<div class="productBlockInfo">' +
                                '<h3 class="protitle">' + value.name + '</h3>' +
                                '<ul class="proRating">' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-half-o"></i></li>' +
                                '</ul>' +
                                '<div class="loaderWrapperAjax loader-wrapper' + value.id + '" style="display: none;"><img src="public/assets/images/ajax-loader.gif"></div>' +
                                '<div class="productInfoMsgAlert addtowishmessage' + value.id + '" ></div>' +
                                '<button  data-id="' + value.id + '" class="wishlist-btn addtowishlist">Add to Wishlist</button>' +
                                '<h2 class="propricing">$' + value.price +
                                '<small><strike>$' + value.original_price + '</strike></small></h2>' +
                                '</div>' +
                                '<div class="productBlockViewDtl">' +
                                '<a href="/productdetails/' + value.url + '" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>' +
                                '<a href="/add-to-cart/' + value.id + '" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';


                        valueid = value.id;
                    });
//                text += '<div id="remove-row">' +
//                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
//                            '</div>';
                    $('#remove-row').remove();
                    $('#postfilterdata').html(text);
                } else {
                    $('#remove-row').remove();
                    // $('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Saled!</div>');
                }
            }
        });
    }
    //end code for main category higher and lower filters
    // start code for sub category higer and lower filters
    $('.common_sub_selector-lawer').click(function () {

        //var a= $('input[name=chechkmostselling]').attr('checked', true);
        var categorycheck = $('input[name=chechkhigherprice]').is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            filter_subdata_lower();
        } else {
            $('.product-box-class').show();
            $('.filter_data').hide();
        }

    });

    function filter_subdata_lower()
    {

        $('.filter_data').show();

        $('.filter_data').html('<div id="loading" style="" ></div>');

        //var brand = get_filter_sel('brandseling');
        var brand = $('#cateoryname').val();
        $.ajax({
            url: '/lowersubpricefilter',
            type: "GET",
            data: {brand: brand},
            // dataType:"JSON",
            success: function (data) {

                var text = "";
                var valueid;
                //alert(JSON.parse(data));
                data = JSON.parse(data);
                // alert(data);
                if (data.success == "1") {

                    $.each(data.data, function (index, value) {
                        var valuediscount = value.discount;
//                        alert(value.discount);
                        var hideclass
                        if (!valuediscount || value.discount == 0) {
                            // $('.discountoffer').hide();
                            hideclass = "display: none;";

                            // $('.orignalpricehide').show();
                        } else {
                            //  alert("call not empty");
                            hideclass = "display: block;";
                            //$('.orignalpricehide').hide();
                        }
                        $('.product-box-class').hide();
                        text += '<div class="col-sm-3 product-box-class filter">' +
                                '<div class="productBlock">' +
                                '<a href="/productdetails/' + value.url + '" class="productBlockImg">' +
                                '<div style="background: url(' + "/public/images/" + value.product_image + "" + ') no-repeat;"></div>' +
                                '</a>' +
                                '<span class="discountoffer" style="' + hideclass + '"> % Offer ' + value.discount + '</span>' +
                                '<div class="productBlockInfo">' +
                                '<h3 class="protitle">' + value.name + '</h3>' +
                                '<ul class="proRating">' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-half-o"></i></li>' +
                                '</ul>' +
                                '<div class="loaderWrapperAjax loader-wrapper' + value.id + '" style="display: none;"><img src="public/assets/images/ajax-loader.gif"></div>' +
                                '<div class="productInfoMsgAlert addtowishmessage' + value.id + '" ></div>' +
                                '<button  data-id="' + value.id + '" class="wishlist-btn addtowishlist">Add to Wishlist</button>' +
                                '<h2 class="propricing">$' + value.price +
                                '<small><strike>$' + value.original_price + '</strike></small></h2>' +
                                '</div>' +
                                '<div class="productBlockViewDtl">' +
                                '<a href="/productdetails/' + value.url + '" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>' +
                                '<a href="/add-to-cart/' + value.id + '" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';


                        valueid = value.id;
                    });
//                text += '<div id="remove-row">' +
//                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
//                            '</div>';
                    $('#remove-row').remove();
                    $('#postfilterdata').html(text);
                } else {
                    $('#remove-row').remove();
                    // $('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Saled!</div>');
                }
            }
        });
    }

    $('.common_sub_selector-higher').click(function () {

        //var a= $('input[name=chechkmostselling]').attr('checked', true);
        var categorycheck = $('input[name=chechkhigherprice]').is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            filter_subdata_higher();
        } else {
            $('.product-box-class').show();
            $('.filter_data').hide();
        }

    });

    function filter_subdata_higher()
    {

        $('.filter_data').show();

        $('.filter_data').html('<div id="loading" style="" ></div>');

        //var brand = get_filter_sel('brandseling');
        var brand = $('#cateoryname').val();
        $.ajax({
            url: '/highersubpricefilter',
            type: "GET",
            data: {brand: brand},
            // dataType:"JSON",
            success: function (data) {

                var text = "";
                var valueid;
                //alert(JSON.parse(data));
                data = JSON.parse(data);
                // alert(data);
                if (data.success == "1") {

                    $.each(data.data, function (index, value) {
                        var valuediscount = value.discount;
//                        alert(value.discount);
                        var hideclass
                        if (!valuediscount || value.discount == 0) {
                            // $('.discountoffer').hide();
                            hideclass = "display: none;";

                            // $('.orignalpricehide').show();
                        } else {
                            //  alert("call not empty");
                            hideclass = "display: block;";
                            //$('.orignalpricehide').hide();
                        }
                        $('.product-box-class').hide();
                        text += '<div class="col-sm-3 product-box-class filter">' +
                                '<div class="productBlock">' +
                                '<a href="/productdetails/' + value.url + '" class="productBlockImg">' +
                                '<div style="background: url(' + "/public/images/" + value.product_image + "" + ') no-repeat;"></div>' +
                                '</a>' +
                                '<span class="discountoffer" style="' + hideclass + '"> % Offer ' + value.discount + '</span>' +
                                '<div class="productBlockInfo">' +
                                '<h3 class="protitle">' + value.name + '</h3>' +
                                '<ul class="proRating">' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-half-o"></i></li>' +
                                '</ul>' +
                                '<div class="loaderWrapperAjax loader-wrapper' + value.id + '" style="display: none;"><img src="public/assets/images/ajax-loader.gif"></div>' +
                                '<div class="productInfoMsgAlert addtowishmessage' + value.id + '" ></div>' +
                                '<button  data-id="' + value.id + '" class="wishlist-btn addtowishlist">Add to Wishlist</button>' +
                                '<h2 class="propricing">$' + value.price +
                                '<small><strike>$' + value.original_price + '</strike></small></h2>' +
                                '</div>' +
                                '<div class="productBlockViewDtl">' +
                                '<a href="/productdetails/' + value.url + '" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>' +
                                '<a href="/add-to-cart/' + value.id + '" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';


                        valueid = value.id;
                    });
//                text += '<div id="remove-row">' +
//                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
//                            '</div>';
                    $('#remove-row').remove();
                    $('#postfilterdata').html(text);
                } else {
                    $('#remove-row').remove();
                    // $('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Saled!</div>');
                }
            }
        });
    }
    $('.common_subseleing_selector').click(function () {
        //var a= $('input[name=chechkmostselling]').attr('checked', true);
        var categorycheck = $('input[name=chechkmostselling]').is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            filter_subdata_sel();
        } else {
            $('.product-box-class').show();
            $('.filter_data').hide();
        }

    });


    function filter_subdata_sel()
    {
        $('.filter_data').show();

        $('.filter_data').html('<div id="loading" style="" ></div>');

        var brand = get_filter_sel('brandseling');

        $.ajax({
            url: '/mostsubsellingfilter',
            type: "GET",
            data: {brand: brand},
            // dataType:"JSON",
            success: function (data) {

                var text = "";
                var valueid;
                //alert(JSON.parse(data));
                data = JSON.parse(data);
                // alert(data);
                if (data.success == "1") {

                    $.each(data.data, function (index, value) {
                        var valuediscount = value.discount;
//                        alert(value.discount);
                        var hideclass
                        if (!valuediscount || value.discount == 0) {
                            // $('.discountoffer').hide();
                            hideclass = "display: none;";

                            // $('.orignalpricehide').show();
                        } else {
                            //  alert("call not empty");
                            hideclass = "display: block;";
                            //$('.orignalpricehide').hide();
                        }
                        $('.product-box-class').hide();
                        text += '<div class="col-sm-3 product-box-class filter">' +
                                '<div class="productBlock">' +
                                '<a href="/productdetails/' + value.url + '" class="productBlockImg">' +
                                '<div style="background: url(' + "/public/images/" + value.product_image + "" + ') no-repeat;"></div>' +
                                '</a>' +
                                '<span class="discountoffer" style="' + hideclass + '"> % Offer ' + value.discount + '</span>' +
                                '<div class="productBlockInfo">' +
                                '<h3 class="protitle">' + value.name + '</h3>' +
                                '<ul class="proRating">' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-half-o"></i></li>' +
                                '</ul>' +
                                '<div class="loaderWrapperAjax loader-wrapper' + value.id + '" style="display: none;"><img src="public/assets/images/ajax-loader.gif"></div>' +
                                '<div class="productInfoMsgAlert addtowishmessage' + value.id + '" ></div>' +
                                '<button  data-id="' + value.id + '" class="wishlist-btn addtowishlist">Add to Wishlist</button>' +
                                '<h2 class="propricing">$' + value.price +
                                '<small><strike>$' + value.original_price + '</strike></small></h2>' +
                                '</div>' +
                                '<div class="productBlockViewDtl">' +
                                '<a href="/productdetails/' + value.url + '" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>' +
                                '<a href="/add-to-cart/' + value.id + '" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';


                        valueid = value.id;
                    });
//                text += '<div id="remove-row">' +
//                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
//                            '</div>';
                    $('#remove-row').remove();
                    $('#postfilterdata').html(text);
                } else {
                    $('#remove-row').remove();
                    // $('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Saled!</div>');
                }
            }
        });
    }

    // end  code for sub category higer and lower filters

    //code for veiw change main page and sub pages
    //proListViewBtns
    //proListViewBtns
    $(".proListView .proListViewBtns").click(function (event) {
        event.preventDefault();
    });
    $('.proListView .gridColViewBtn').attr('data-id', '1');
    //1 Row 1 column button
    $(".proListView .rowColViewBtn").click(function () {
        $(".proListView .proListViewBtns").removeClass("proListViewBtnsActive");
        $(this).addClass("proListViewBtnsActive");
        $(this).attr('data-id', '2');
        $(".innerproductCol .col-sm-3.product-box-class").addClass("rowCol1ProductBoxClass");
        $(".categoryMainSection .col-sm-3.product-box-class").addClass("rowCol1ProductBoxClass");
    });

    //4 columns button - grid view
    $(".proListView .gridColViewBtn").click(function () {
        $(".proListView .proListViewBtns").removeClass("proListViewBtnsActive");
        $(this).addClass("proListViewBtnsActive");
        $(this).attr('data-id', '1');
        $(".innerproductCol .col-sm-3.product-box-class").removeClass("rowCol1ProductBoxClass");
        $(".categoryMainSection .col-sm-3.product-box-class").removeClass("rowCol1ProductBoxClass");
    });
    $(".remove").click(function () {


        swal({
            title: "Are you sure?",
            text: "You  want to empty cart!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Empty it!",
            cancelButtonText: "No, Cancel !",
            closeOnConfirm: false,
            closeOnCancel: false,
            timer: 10000
        },
                function (isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            url: '/removeAll',
                            type: "GET",
                            //url: '/removeAll/',
                            // type: 'DELETE',
                            error: function () {
                                alert('Something is wrong');
                            },
                            success: function (data) {
                                swal("Deleted!", "Your Cart has been Empty.", "success");
                            }
                        });
                    } else {

                        swal("Cancelled", "Your Cart is safe :)", "error");
                    }
                });

    });
    $('#ajaxtotalprice').hide();
    $('#ajaxgiftboxtotal').hide();
    $('#ajaxdeliverycharge').hide();
    $('#ajaxtotalpay').hide();
    $('#ajaxtotalpay').hide();
    $('.ajaxitemtotal').hide();

    $('.giftwrappingcheck').change(function () {
        var countCheckedCheckboxes = $('.giftwrappingcheck').filter(':checked').length;
        // $('#count-checked-checkboxes').text(countCheckedCheckboxes);
        var giftwrapvalue = $(this).val();

        var categorycheck = $(this).is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            var giftwrapvaluecheck = $(this).val();


            if (countCheckedCheckboxes > 3) {

                $('#giftwrapmessage').html('<p style="color:red" >Gift wraspping more than 3 item not applicable</p>');
                $('.guestCheckOutBtns').attr("disabled", "disabled");

            } else {
                var eachval = $('#qtyinc' + giftwrapvaluecheck).val();

                if (eachval > 3) {

                    //$('.decermentitem').on('click');

//             $('#decermentitem'+giftwrapvaluecheck).off('click');
                    //$('.decermentitembtn').on('click');
                    $('#giftwrapmessage').html('<p style="color:red" >Gift wraspping more than 3 item not applicable</p>');
                    $('.guestCheckOutBtns').attr("disabled", "disabled");
                    $('#giftWrap' + giftwrapvalue).attr('checked', false); // Unchecks it
                } else {

                    if (eachval == 3) {
                        $.ajax({
                            url: '/addgiftbox',
                            type: "GET",
                            data: {brand: giftwrapvaluecheck},
                            // dataType:"JSON",
                            success: function (data) {

//                alert(JSON.parse(data));
                                data = JSON.parse(data);
//                 alert(data.success);
                                if (data.success == "1") {
                                    $('#loadtotalprice').hide();
                                    $('#loadgiftboxtotal').hide();
                                    $('#loaddeliverycharge').hide();
                                    $('#loadtotalpay').hide();


                                    $('#ajaxtotalprice').show();
                                    $('#ajaxgiftboxtotal').show();
                                    $('#ajaxdeliverycharge').show();
                                    $('#ajaxtotalpay').show();

                                    var totalPriceitem = data.totalPrice;

                                    var giftboxtotalitem = data.giftboxtotal;
                                    var dilverycharge = data.dilverycharge;
                                    var dilverychargevalue = Math.abs(dilverycharge);
                                    var pricesing;
                                    if (dilverychargevalue == 0) {
                                        dilverychargevalue = "Free";
                                        var delivercharge = 0;
                                        pricesing = "";
                                    } else {
                                        dilverychargevalue = dilverychargevalue;
                                        delivercharge = dilverychargevalue
                                        pricesing = "$";
                                    }
                                    var datatotal = parseInt(giftboxtotalitem) + parseInt(delivercharge);
                                    var totalpay = totalPriceitem + datatotal;
//                    alert(totalpay+'this is totoal account');
                                    $('#ajaxtotalprice').html('$' + totalPriceitem);
                                    $('#ajaxgiftboxtotal').html('$' + giftboxtotalitem);
                                    $('#ajaxdeliverycharge').html(pricesing + dilverychargevalue);
                                    $('#ajaxtotalpay').html('$' + totalpay);
//                    $.each(data.data, function (index, value) {
//                     
//                    });

                                } else {
                                    $('#ajaxtotalprice').hide();
                                    $('#ajaxgiftboxtotal').hide();
                                    $('#ajaxdeliverycharge').hide();
                                    $('#ajaxtotalpay').hide();



                                    $('#loadtotalprice').show();
                                    $('#loadgiftboxtotal').show();
                                    $('#loaddeliverycharge').show();
                                    $('#loadtotalpay').show();
                                }
                            }
                        });
                        $(".decermentitem").on('click');
                        $(".incermentitem").on('click');
                        $(".decermentitembtn").on('click');
                        $(".incermentitembtn").on('click');
                        $('#giftwrapmessage').html("");

                        $(".guestCheckOutBtns").removeAttr("disabled");
                        $('#incermentitem' + giftwrapvaluecheck).attr("data-toggle", "tooltip");
                        $('#incermentitem' + giftwrapvaluecheck).attr("data-placement", "left");
                        $('#incermentitem' + giftwrapvaluecheck).attr("title", "Gift wraspping more than 3 item not applicable");
                        $('#incermentitem' + giftwrapvaluecheck).removeClass("incermentitem");
                        $('#incermentitem' + giftwrapvaluecheck).addClass('incermentitemclick');
                        $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvaluecheck).attr("disabled", "disabled");
                    } else if (countCheckedCheckboxes == 1) {
                        $.ajax({
                            url: '/addgiftbox',
                            type: "GET",
                            data: {brand: giftwrapvaluecheck},
                            // dataType:"JSON",
                            success: function (data) {

//                alert(JSON.parse(data));
                                data = JSON.parse(data);
//                 alert(data.success);
                                if (data.success == "1") {
                                    $('#loadtotalprice').hide();
                                    $('#loadgiftboxtotal').hide();
                                    $('#loaddeliverycharge').hide();
                                    $('#loadtotalpay').hide();


                                    $('#ajaxtotalprice').show();
                                    $('#ajaxgiftboxtotal').show();
                                    $('#ajaxdeliverycharge').show();
                                    $('#ajaxtotalpay').show();

                                    var totalPriceitem = data.totalPrice;

                                    var giftboxtotalitem = data.giftboxtotal;
                                    var dilverycharge = data.dilverycharge;
                                    var dilverychargevalue = Math.abs(dilverycharge);
                                    var pricesing;
                                    if (dilverychargevalue == 0) {
                                        dilverychargevalue = "Free";
                                        var delivercharge = 0;
                                        pricesing = "";
                                    } else {
                                        dilverychargevalue = dilverychargevalue;
                                        delivercharge = dilverychargevalue
                                        pricesing = "$";
                                    }
                                    var datatotal = parseInt(giftboxtotalitem) + parseInt(delivercharge);
                                    var totalpay = totalPriceitem + datatotal;
//                    alert(giftboxtotalitem+'this is giftboxtotalitem account');
//                     alert(datatotal+'this is delivercharge account');
//                    alert(totalpay+'this is totoal account');
                                    $('#ajaxtotalprice').html('$' + totalPriceitem);
                                    $('#ajaxgiftboxtotal').html('$' + giftboxtotalitem);
                                    $('#ajaxdeliverycharge').html(pricesing + dilverychargevalue);
                                    $('#ajaxtotalpay').html('$' + totalpay);
//                    $.each(data.data, function (index, value) {
//                     
//                    });

                                } else {
                                    $('#ajaxtotalprice').hide();
                                    $('#ajaxgiftboxtotal').hide();
                                    $('#ajaxdeliverycharge').hide();
                                    $('#ajaxtotalpay').hide();



                                    $('#loadtotalprice').show();
                                    $('#loadgiftboxtotal').show();
                                    $('#loaddeliverycharge').show();
                                    $('#loadtotalpay').show();
                                }
                            }
                        });
                        $(".decermentitem").on('click');
                        $(".incermentitem").on('click');
                        $(".decermentitembtn").on('click');
                        $(".incermentitembtn").on('click');
                        $('#giftwrapmessage').html("");

                        $(".guestCheckOutBtns").removeAttr("disabled");
                    } else {
                        var checkvalue = $("#qtyinc" + giftwrapvaluecheck).val();
//                            alert("call now each 1 or 2");
//                              alert(giftwrapvalue+'id of click');
//                            alert(checkvalue+'value of click');
                        //alert(eachval+'this ech val click');

                        $('.cartBlockWrap label input[class="giftwrappingcheck"]:checked').not('#giftWrap' + giftwrapvalue).each(function () {
                            var valueofcheck = this.value;
                            var giftwrapvaluechecktotal = $("#qtyinc" + valueofcheck).val();
                            var balanccheck = parseInt(checkvalue) + parseInt(giftwrapvaluechecktotal);
                            //alert(balanccheck+'thsi balacne value now');
                            if (eachval != 3 && balanccheck > 3) {
                                $('#giftWrap' + giftwrapvalue).attr('checked', false); // Unchecks it
//                    $('label .giftwrappingcheck').not('#giftWrap'+valueofcheck).attr("disabled", "disabled");
                                $('label .giftwrappingcheck').not('#giftWrap' + valueofcheck).attr("data-toggle", "tooltip");
                                $('label .giftwrappingcheck').not('#giftWrap' + valueofcheck).attr("data-placement", "left");
                                $('label .giftwrappingcheck').not('#giftWrap' + valueofcheck).attr("title", "Gift wraspping more than 3 item not applicable");
                                $('#giftwrapmessage').html('<p style="color:red" >Gift wraspping more than 3 item not applicable</p>');
                            } else {

                                $.ajax({
                                    url: '/addgiftbox',
                                    type: "GET",
                                    data: {brand: giftwrapvaluecheck},
                                    // dataType:"JSON",
                                    success: function (data) {

//                alert(JSON.parse(data));
                                        data = JSON.parse(data);
//                 alert(data.success);
                                        if (data.success == "1") {
                                            $('#loadtotalprice').hide();
                                            $('#loadgiftboxtotal').hide();
                                            $('#loaddeliverycharge').hide();
                                            $('#loadtotalpay').hide();


                                            $('#ajaxtotalprice').show();
                                            $('#ajaxgiftboxtotal').show();
                                            $('#ajaxdeliverycharge').show();
                                            $('#ajaxtotalpay').show();

                                            var totalPriceitem = data.totalPrice;

                                            var giftboxtotalitem = data.giftboxtotal;
                                            var dilverycharge = data.dilverycharge;
                                            var dilverychargevalue = Math.abs(dilverycharge);
                                            var pricesing;
                                            if (dilverychargevalue == 0) {
                                                dilverychargevalue = "Free";
                                                var delivercharge = 0;
                                                pricesing = "";
                                            } else {
                                                dilverychargevalue = dilverychargevalue;
                                                delivercharge = dilverychargevalue
                                                pricesing = "$";
                                            }
                                            var datatotal = parseInt(giftboxtotalitem) + parseInt(delivercharge);
                                            var totalpay = totalPriceitem + datatotal;
//                   var totalpay= totalPriceitem +  giftboxtotalitem +  delivercharge;
//                    alert(totalpay+'this is totoal account');
                                            $('#ajaxtotalprice').html('$' + totalPriceitem);
                                            $('#ajaxgiftboxtotal').html('$' + giftboxtotalitem);
                                            $('#ajaxdeliverycharge').html(pricesing + dilverychargevalue);
                                            $('#ajaxtotalpay').html('$' + totalpay);
//                    $.each(data.data, function (index, value) {
//                     
//                    });

                                        } else {
                                            $('#ajaxtotalprice').hide();
                                            $('#ajaxgiftboxtotal').hide();
                                            $('#ajaxdeliverycharge').hide();
                                            $('#ajaxtotalpay').hide();



                                            $('#loadtotalprice').show();
                                            $('#loadgiftboxtotal').show();
                                            $('#loaddeliverycharge').show();
                                            $('#loadtotalpay').show();
                                        }
                                    }
                                });
                                $(".decermentitem").on('click');
                                $(".incermentitem").on('click');
                                $(".decermentitembtn").on('click');
                                $(".incermentitembtn").on('click');
                                $('#giftwrapmessage').html("");

                                $(".guestCheckOutBtns").removeAttr("disabled");
                                $('#incermentitem' + giftwrapvaluecheck).removeClass("incermentitemclick");
                                $('#incermentitem' + giftwrapvaluecheck).addClass('incermentitem');
                            }
                        });


//                        $('#incermentitem'+giftwrapvaluecheck).on('click');
                    }
                    // code for chek other chek qty valu and current cliek value not to greter than 3
//         var checkvalue = $("#qtyinc"+giftwrapvaluecheck).val();
//             $('.cartBlockWrap label input[class="giftwrappingcheck"]:checked').not('#giftWrap'+giftwrapvalue).each(function() {
//                var valueofcheck= this.value;
//                 var giftwrapvaluecheck= $("#qtyinc"+valueofcheck).val();
//               var balanccheck = parseInt(checkvalue) + parseInt(giftwrapvaluecheck);
//                
//                if(balanccheck==3){
//                      $('label .giftwrappingcheck').not('#giftWrap'+valueofcheck).attr("disabled", "disabled");
//                      $('label .giftwrappingcheck').not('#giftWrap'+valueofcheck).attr("data-toggle","tooltip");
//                      $('label .giftwrappingcheck').not('#giftWrap'+valueofcheck).attr("data-placement","left");
//                      $('label .giftwrappingcheck').not('#giftWrap'+valueofcheck).attr("title","Gift wraspping more than 3 item not applicable");
//                      }else{
//
//                }
//             });
                    // end here


                }


                // $('#giftwrapmessage').html("");

                // $(".guestCheckOutBtns").removeAttr("disabled");
            }
        } else {

            var giftwrapvaluecheck = $(this).val();
            if (countCheckedCheckboxes > 3) {
                $('#giftwrapmessage').html('<p style="color:red" >Gift wraspping more than 3 item not applicable</p>');
                $('.guestCheckOutBtns').attr("disabled", "disabled");
            } else {
                var eachval = $('#qtyinc' + giftwrapvaluecheck).val();
                $('#incermentitem' + giftwrapvaluecheck).removeAttr("data-toggle");
                $('#incermentitem' + giftwrapvaluecheck).removeAttr("data-placement");
                $('#incermentitem' + giftwrapvaluecheck).removeAttr("title");
                $('#incermentitem' + giftwrapvaluecheck).removeClass("incermentitemdisabled ");
                $('#incermentitem' + giftwrapvaluecheck).removeClass("incermentitemclick");
                $('#incermentitem' + giftwrapvaluecheck).addClass('incermentitem');

//                 if(eachval == 3){ 
//                    
//                                 $('#incermentitem'+giftwrapvaluecheck).removeClass("incermentitem");
//                          $('#incermentitem'+giftwrapvaluecheck).addClass('incermentitemclick');
//                          $('label .giftwrappingcheck').not('#giftWrap'+giftwrapvaluecheck).attr("disabled", "disabled");
//                        }else{
//                        $('#incermentitem'+giftwrapvaluecheck).removeClass("incermentitemclick");
//                        $('#incermentitem'+giftwrapvaluecheck).addClass('incermentitem');
//                   }
                $.ajax({
                    url: '/removegiftbox',
                    type: "GET",
                    data: {brand: giftwrapvaluecheck},
                    // dataType:"JSON",
                    success: function (data) {


                        data = JSON.parse(data);
                        // alert(data);
                        if (data.success == "1") {
                            $('#loadtotalprice').hide();
                            $('#loadgiftboxtotal').hide();
                            $('#loaddeliverycharge').hide();
                            $('#loadtotalpay').hide();


                            $('#ajaxtotalprice').show();
                            $('#ajaxgiftboxtotal').show();
                            $('#ajaxdeliverycharge').show();
                            $('#ajaxtotalpay').show();

                            var totalPriceitem = data.totalPrice;

                            var giftboxtotalitem = data.giftboxtotal;
                            var dilverycharge = data.dilverycharge;
                            var dilverychargevalue = Math.abs(dilverycharge);
                            var pricesing;
                            if (dilverychargevalue == 0) {
                                dilverychargevalue = "Free";
                                var delivercharge = 0;
                                pricesing = "";
                            } else {
                                dilverychargevalue = dilverychargevalue;
                                delivercharge = dilverychargevalue
                                pricesing = "$";
                            }
                            var datatotal = parseInt(giftboxtotalitem) + parseInt(delivercharge);
                            var totalpay = totalPriceitem + datatotal;
//                   var totalpay= totalPriceitem + giftboxtotalitem + delivercharge;

                            $('#ajaxtotalprice').html('$' + totalPriceitem);
                            $('#ajaxgiftboxtotal').html('$' + giftboxtotalitem);
                            $('#ajaxdeliverycharge').html(pricesing + dilverychargevalue);
                            $('#ajaxtotalpay').html('$' + totalpay);


                        } else {
                            $('#ajaxtotalprice').hide();
                            $('#ajaxgiftboxtotal').hide();
                            $('#ajaxdeliverycharge').hide();
                            $('#ajaxtotalpay').hide();



                            $('#loadtotalprice').show();
                            $('#loadgiftboxtotal').show();
                            $('#loaddeliverycharge').show();
                            $('#loadtotalpay').show();

                        }
                    }
                });

                $('#giftwrapmessage').html("");
                //  $('.guestCheckOutBtns').attr("disabled", "disabled");
                $(".guestCheckOutBtns").removeAttr("disabled");
            }
            //alert("this is unchekc value"+giftwrapvaluecheck)
        }



    });
    //end code for gift box add to click

    $('.incermentitem').click(function () {

        var giftwrapvalue = $(this).attr("data-id");

        var eachval = $('#qtyinc' + giftwrapvalue).val();
        var one = 1;

        var eachvalinc = parseInt(one) + parseInt(eachval);

//              alert(eachvalinc+'this is value on increm df');
        var categorycheck = $("#giftWrap" + giftwrapvalue).is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            if (eachvalinc > 3) {
                $('#giftwrapmessage').html('<p style="color:red" >Gift wraspping more than 3 item not applicable</p>');
//         $('.guestCheckOutBtns').attr("disabled", "disabled");
//         $('#giftWrap'+giftwrapvalue).attr('checked', false); // Unchecks it
            } else {

                if (eachvalinc == 3) {
                    $('#incermentitem' + giftwrapvalue).attr("data-toggle", "tooltip");
                    $('#incermentitem' + giftwrapvalue).attr("data-placement", "left");
                    $('#incermentitem' + giftwrapvalue).attr("title", "Gift wraspping more than 3 item not applicable");
                    $('#incermentitem' + giftwrapvalue).removeClass("incermentitem");
                    $('#incermentitem' + giftwrapvalue).addClass('incermentitemclick');
                    $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).attr("disabled", "disabled");
                } else {

                    $('#incermentitem' + giftwrapvalue).removeClass("incermentitemclick");
                    $('#incermentitem' + giftwrapvalue).addClass('incermentitem');

                }
                $.ajax({
                    url: '/incrementitem',
                    type: "GET",
                    data: {brand: giftwrapvalue},

                    success: function (data) {

//                alert(JSON.parse(data));
                        data = JSON.parse(data);
//                 alert(data.success);
                        if (data.success == "1") {
                            $.each(data.data, function (index, value) {

//                                alert(JSON.stringify(value));
                                if (value[giftwrapvalue]) {

                                    // alert(value[giftwrapvalue].qty);
                                    var productitemqty = value[giftwrapvalue].qty;
                                    var productitemprice = value[giftwrapvalue].price;

                                    $('#qtyinc' + giftwrapvalue).val(value[giftwrapvalue].qty);
                                    $('#loadtotalprice').hide();
                                    $('#loadgiftboxtotal').hide();
                                    $('#loaddeliverycharge').hide();
                                    $('#loadtotalpay').hide();
                                    $('#loaditemtotal' + giftwrapvalue).hide();


                                    $('#ajaxtotalprice').show();
                                    $('#ajaxgiftboxtotal').show();
                                    $('#ajaxdeliverycharge').show();
                                    $('#ajaxtotalpay').show();
                                    $('#ajaxitemtotal' + giftwrapvalue).show();

                                    var totalPriceitem = data.totalPrice;

                                    var giftboxtotalitem = data.giftboxtotal;
                                    var dilverycharge = data.dilverycharge;
                                    var dilverychargevalue = Math.abs(dilverycharge);
                                    var pricesing;
                                    if (dilverychargevalue == 0) {
                                        dilverychargevalue = "Free";
                                        var delivercharge = 0;
                                        pricesing = "";
                                    } else {
                                        dilverychargevalue = dilverychargevalue;
                                        delivercharge = dilverychargevalue
                                        pricesing = "$";
                                    }
                                    if (value[giftwrapvalue].qty > 3) {

                                        $('#giftWrap' + giftwrapvalue).attr('checked', false);
                                        $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).attr("disabled", "disabled");
                                    } else {
                                        $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).removeAttr("disabled", "disabled");
                                        // $('#giftWrap'+giftwrapvalue).attr('checked', true);

                                    }
                                    var totalitemamount = productitemqty * productitemprice;
                                    var datatotal = parseInt(giftboxtotalitem) + parseInt(delivercharge);
                                    var totalpay = totalPriceitem + datatotal;
//                   var totalpay = totalPriceitem +  giftboxtotalitem +  delivercharge;

//                    alert(totalpay+'this is totoal account');
                                    $('#ajaxitemtotal' + giftwrapvalue).html('$' + productitemprice);
                                    $('#ajaxtotalprice').html('$' + totalPriceitem);
                                    $('#ajaxgiftboxtotal').html('$' + giftboxtotalitem);
                                    $('#ajaxdeliverycharge').html(pricesing + dilverychargevalue);
                                    $('#ajaxtotalpay').html('$' + totalpay);
                                }


                            });
                        } else {
                            $('#ajaxtotalprice').hide();
                            $('#ajaxgiftboxtotal').hide();
                            $('#ajaxdeliverycharge').hide();
                            $('#ajaxtotalpay').hide();
                            $('.ajaxitemtotal').hide();


                            $('#loadtotalprice').show();
                            $('#loadgiftboxtotal').show();
                            $('#loaddeliverycharge').show();
                            $('#loadtotalpay').show();
                            $('.loaditemtotal').show();
                        }
                    }

                });
            }
        } else {
            $.ajax({
                url: '/incrementitem',
                type: "GET",
                data: {brand: giftwrapvalue},

                success: function (data) {

//                alert(JSON.parse(data));
                    data = JSON.parse(data);
//                 alert(data.success);
                    if (data.success == "1") {
                        $.each(data.data, function (index, value) {

//                                alert(JSON.stringify(value));
                            if (value[giftwrapvalue]) {

                                // alert(value[giftwrapvalue].qty);
                                var productitemqty = value[giftwrapvalue].qty;
                                var productitemprice = value[giftwrapvalue].price;

                                $('#qtyinc' + giftwrapvalue).val(value[giftwrapvalue].qty);
                                $('#loadtotalprice').hide();
                                $('#loadgiftboxtotal').hide();
                                $('#loaddeliverycharge').hide();
                                $('#loadtotalpay').hide();
                                $('#loaditemtotal' + giftwrapvalue).hide();


                                $('#ajaxtotalprice').show();
                                $('#ajaxgiftboxtotal').show();
                                $('#ajaxdeliverycharge').show();
                                $('#ajaxtotalpay').show();
                                $('#ajaxitemtotal' + giftwrapvalue).show();

                                var totalPriceitem = data.totalPrice;

                                var giftboxtotalitem = data.giftboxtotal;
                                var dilverycharge = data.dilverycharge;
                                var dilverychargevalue = Math.abs(dilverycharge);
                                var pricesing;
                                if (dilverychargevalue == 0) {
                                    dilverychargevalue = "Free";
                                    var delivercharge = 0;
                                    pricesing = "";
                                } else {
                                    dilverychargevalue = dilverychargevalue;
                                    delivercharge = dilverychargevalue
                                    pricesing = "$";
                                }
                                if (value[giftwrapvalue].qty > 3) {

                                    $('#giftWrap' + giftwrapvalue).attr('checked', false);
                                    $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).attr("disabled", "disabled");
                                } else {
                                    $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).removeAttr("disabled", "disabled");
                                    // $('#giftWrap'+giftwrapvalue).attr('checked', true);

                                }
                                var totalitemamount = productitemqty * productitemprice;
                                var datatotal = parseInt(giftboxtotalitem) + parseInt(delivercharge);
                                var totalpay = totalPriceitem + datatotal;
//                   var totalpay = totalPriceitem +  giftboxtotalitem +  delivercharge;

//                    alert(totalpay+'this is totoal account');
                                $('#ajaxitemtotal' + giftwrapvalue).html('$' + productitemprice);
                                $('#ajaxtotalprice').html('$' + totalPriceitem);
                                $('#ajaxgiftboxtotal').html('$' + giftboxtotalitem);
                                $('#ajaxdeliverycharge').html(pricesing + dilverychargevalue);
                                $('#ajaxtotalpay').html('$' + totalpay);
                            }


                        });
                    } else {
                        $('#ajaxtotalprice').hide();
                        $('#ajaxgiftboxtotal').hide();
                        $('#ajaxdeliverycharge').hide();
                        $('#ajaxtotalpay').hide();
                        $('.ajaxitemtotal').hide();


                        $('#loadtotalprice').show();
                        $('#loadgiftboxtotal').show();
                        $('#loaddeliverycharge').show();
                        $('#loadtotalpay').show();
                        $('.loaditemtotal').show();
                    }
                }

            });
        }


    });
    // code for decrment the quanity of item in shooping cart page
    $('.decermentitem').click(function () {

        var giftwrapvalue = $(this).attr("data-id");
        var eachval = $('#qtyinc' + giftwrapvalue).val();
        var one = 1;

        var eachvalinc = parseInt(eachval) - parseInt(one);

//              alert(eachvalinc+'this is value on increm df');
        var categorycheck = $("#giftWrap" + giftwrapvalue).is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            if (eachvalinc > 3) {
                $('#giftwrapmessage').html('<p style="color:red" >Gift wraspping more than 3 item not applicable</p>');
                $('.guestCheckOutBtns').attr("disabled", "disabled");
//         $('#giftWrap'+giftwrapvalue).attr('checked', false); // Unchecks it
            } else {
                if (eachvalinc == 3) {
                    $('#incermentitem' + giftwrapvalue).attr("data-toggle", "tooltip");
                    $('#incermentitem' + giftwrapvalue).attr("data-placement", "left");
                    $('#incermentitem' + giftwrapvalue).attr("title", "Gift wraspping more than 3 item not applicable");
                    $('#incermentitem' + giftwrapvalue).removeClass("incermentitem");
                    $('#incermentitem' + giftwrapvalue).addClass('incermentitemclick');
                    $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).attr("disabled", "disabled");
                } else {

                    $('#incermentitem' + giftwrapvalue).removeClass("incermentitemclick");
                    $('#incermentitem' + giftwrapvalue).addClass('incermentitem');

                }
                if (eachvalinc < 3) {
                    $('#incermentitem' + giftwrapvalue).removeAttr("data-toggle");
                    $('#incermentitem' + giftwrapvalue).removeAttr("data-placement");
                    $('#incermentitem' + giftwrapvalue).removeAttr("title");
                    $('#incermentitem' + giftwrapvalue).removeClass("incermentitemdisabled ");
                    $('#incermentitem' + giftwrapvalue).removeClass("incermentitemclick");
                    $('#incermentitem' + giftwrapvalue).addClass('incermentitem');
                }
                $.ajax({
                    url: '/decrementitem',
                    type: "GET",
                    data: {brand: giftwrapvalue},

                    success: function (data) {

//                alert(JSON.parse(data));
                        data = JSON.parse(data);
//                 alert(data.success);
                        if (data.success == "1") {
                            $.each(data.data, function (index, value) {

//                                alert(JSON.stringify(value));
                                if (value[giftwrapvalue]) {

                                    // alert(value[giftwrapvalue].qty);
                                    var productitemqty = value[giftwrapvalue].qty;
                                    var productitemprice = value[giftwrapvalue].price;

                                    $('#qtyinc' + giftwrapvalue).val(value[giftwrapvalue].qty);
                                    $('#loadtotalprice').hide();
                                    $('#loadgiftboxtotal').hide();
                                    $('#loaddeliverycharge').hide();
                                    $('#loadtotalpay').hide();
                                    $('#loaditemtotal' + giftwrapvalue).hide();


                                    $('#ajaxtotalprice').show();
                                    $('#ajaxgiftboxtotal').show();
                                    $('#ajaxdeliverycharge').show();
                                    $('#ajaxtotalpay').show();
                                    $('#ajaxitemtotal' + giftwrapvalue).show();

                                    var totalPriceitem = data.totalPrice;

                                    var giftboxtotalitem = data.giftboxtotal;
                                    var dilverycharge = data.dilverycharge;
                                    var dilverychargevalue = Math.abs(dilverycharge);
                                    var pricesing;
                                    if (dilverychargevalue == 0) {
                                        dilverychargevalue = "Free";
                                        var delivercharge = 0;
                                        pricesing = "";
                                    } else {
                                        dilverychargevalue = dilverychargevalue;
                                        delivercharge = dilverychargevalue
                                        pricesing = "$";
                                    }
                                    if (value[giftwrapvalue].qty > 3) {
                                        $('#giftWrap' + giftwrapvalue).attr('checked', false);
                                        $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).attr("disabled", "disabled");
                                    } else {
                                        $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).removeAttr("disabled", "disabled");
                                    }
                                    var totalitemamount = productitemqty * productitemprice;
                                    var datatotal = parseInt(giftboxtotalitem) + parseInt(delivercharge);
                                    var totalpay = totalPriceitem + datatotal;
//                   var totalpay = totalPriceitem +  giftboxtotalitem +  delivercharge;

//                    alert(totalpay+'this is totoal account');
                                    $('#ajaxitemtotal' + giftwrapvalue).html('$' + productitemprice);
                                    $('#ajaxtotalprice').html('$' + totalPriceitem);
                                    $('#ajaxgiftboxtotal').html('$' + giftboxtotalitem);
                                    $('#ajaxdeliverycharge').html(pricesing + dilverychargevalue);
                                    $('#ajaxtotalpay').html('$' + totalpay);
                                }


                            });
                        } else {
                            setTimeout(function () {// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000);
                            $('#ajaxtotalprice').hide();
                            $('#ajaxgiftboxtotal').hide();
                            $('#ajaxdeliverycharge').hide();
                            $('#ajaxtotalpay').hide();
                            $('.ajaxitemtotal').hide();


                            $('#loadtotalprice').show();
                            $('#loadgiftboxtotal').show();
                            $('#loaddeliverycharge').show();
                            $('#loadtotalpay').show();
                            $('.loaditemtotal').show();
                        }
                    }

                });
            }
        } else {
            $.ajax({
                url: '/decrementitem',
                type: "GET",
                data: {brand: giftwrapvalue},

                success: function (data) {

//                alert(JSON.parse(data));
                    data = JSON.parse(data);
//                 alert(data.success);
                    if (data.success == "1") {
                        $.each(data.data, function (index, value) {

//                                alert(JSON.stringify(value));
                            if (value[giftwrapvalue]) {

                                // alert(value[giftwrapvalue].qty);
                                var productitemqty = value[giftwrapvalue].qty;
                                var productitemprice = value[giftwrapvalue].price;

                                $('#qtyinc' + giftwrapvalue).val(value[giftwrapvalue].qty);
                                $('#loadtotalprice').hide();
                                $('#loadgiftboxtotal').hide();
                                $('#loaddeliverycharge').hide();
                                $('#loadtotalpay').hide();
                                $('#loaditemtotal' + giftwrapvalue).hide();


                                $('#ajaxtotalprice').show();
                                $('#ajaxgiftboxtotal').show();
                                $('#ajaxdeliverycharge').show();
                                $('#ajaxtotalpay').show();
                                $('#ajaxitemtotal' + giftwrapvalue).show();

                                var totalPriceitem = data.totalPrice;

                                var giftboxtotalitem = data.giftboxtotal;
                                var dilverycharge = data.dilverycharge;
                                var dilverychargevalue = Math.abs(dilverycharge);
                                var pricesing;
                                if (dilverychargevalue == 0) {
                                    dilverychargevalue = "Free";
                                    var delivercharge = 0;
                                    pricesing = "";
                                } else {
                                    dilverychargevalue = dilverychargevalue;
                                    delivercharge = dilverychargevalue
                                    pricesing = "$";
                                }
                                if (value[giftwrapvalue].qty > 3) {
                                    $('#giftWrap' + giftwrapvalue).attr('checked', false);
                                    $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).attr("disabled", "disabled");
                                } else {
                                    $('label .giftwrappingcheck').not('#giftWrap' + giftwrapvalue).removeAttr("disabled", "disabled");
                                }
                                var totalitemamount = productitemqty * productitemprice;
                                var datatotal = parseInt(giftboxtotalitem) + parseInt(delivercharge);
                                var totalpay = totalPriceitem + datatotal;
//                   var totalpay = totalPriceitem +  giftboxtotalitem +  delivercharge;

//                    alert(totalpay+'this is totoal account');
                                $('#ajaxitemtotal' + giftwrapvalue).html('$' + productitemprice);
                                $('#ajaxtotalprice').html('$' + totalPriceitem);
                                $('#ajaxgiftboxtotal').html('$' + giftboxtotalitem);
                                $('#ajaxdeliverycharge').html(pricesing + dilverychargevalue);
                                $('#ajaxtotalpay').html('$' + totalpay);
                            }


                        });
                    } else {
                        setTimeout(function () {// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 1000);
                        $('#ajaxtotalprice').hide();
                        $('#ajaxgiftboxtotal').hide();
                        $('#ajaxdeliverycharge').hide();
                        $('#ajaxtotalpay').hide();
                        $('.ajaxitemtotal').hide();


                        $('#loadtotalprice').show();
                        $('#loadgiftboxtotal').show();
                        $('#loaddeliverycharge').show();
                        $('#loadtotalpay').show();
                        $('.loaditemtotal').show();
                    }
                }

            });

        }

    });
    // start code for send as gift 
    $('.sendasgiftitem').change(function () {

        var categorycheck = $(this).is(':checked')
        var categoryvalue = JSON.stringify(categorycheck)
        if (categoryvalue == 'true') {
            var giftwrapvaluecheck = $(this).val();

            $.ajax({
                url: '/addsendasgift',
                type: "GET",
                data: {brand: giftwrapvaluecheck},

                success: function (data) {
                    data = JSON.parse(data);
                    if (data.success == "1") {

                    } else {

                    }
                }
            });
            $('#giftwrapmessage').html("");
        } else {
            var giftwrapvaluecheck = $(this).val();

            $.ajax({
                url: '/removesendasgift',
                type: "GET",
                data: {brand: giftwrapvaluecheck},
                success: function (data) {

                    data = JSON.parse(data);
                    if (data.success === "1") {

                    } else {


                    }
                }
            });

            $('#giftwrapmessage').html("");

        }

    });
    $('.cartBlockWrap label input[class="giftwrappingcheck"]:checked').each(function () {
        var valueofcheck = this.value;
        var giftwrapvaluecheck = $("#qtyinc" + valueofcheck).val();
//   var giftwrapvaluecheck++=giftwrapvaluecheck;
        if (giftwrapvaluecheck === 3) {
            $('label .giftwrappingcheck').not('#giftWrap' + valueofcheck).attr("disabled", "disabled");
            $('label .giftwrappingcheck').not('#giftWrap' + valueofcheck).attr("data-toggle", "tooltip");
            $('label .giftwrappingcheck').not('#giftWrap' + valueofcheck).attr("data-placement", "left");
            $('label .giftwrappingcheck').not('#giftWrap' + valueofcheck).attr("title", "Gift wraspping more than 3 item not applicable");
        } else {

        }
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $("#shoppingcartbtn").click(function () {
        $("#shoppingcartpage").submit();
    });

    $(".thanksVideoBlock").click(function () {
        console.log('test video 1')
        $(".thanksVideoBlock").hide();
    });
    //$(".thanksVideoBlock").delay(10000).hide("medium").attr('src', 'youtube.com');
    $(".thanksVideoBlock").delay(12000).queue(function () {
        $(this).addClass("thanksVideoBlockTOBEHIDDEN");
        setTimeout(
          function() 
          {
            $("#thanksVideoBlock").css("display","none");
            $('#thanksVideoBlock').remove();
          }, 12000);
    });
    //$(".thanksVideoBlockTOBEHIDDEN iframe").attr('src', 'youtube.com');

   /* document.getElementById("thanksVideoBlock").onclick = function () {
       
        //document.getElementById('player').src = "https://www.youtube.com/embed/bo2KQer1KNM";
        document.getElementById('player').src = "https://www.youtube.com";
        
        
    }; */
    
     $("#thanksVideoBlock").click(function () {
        document.getElementById('player').src = "https://www.youtube.com";
    });
    



});
