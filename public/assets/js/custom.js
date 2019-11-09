$(document).ready(function () {

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
        filter_data_price(from,to)
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
        max: 10000,
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
  if ( $(window).width() < 991){
 $(".dropdown >a").attr('data-toggle','dropdown').attr('aria-haspopup','true').attr('aria-expanded','true');    
}
$('#finalResult').hide();

$('#searchproduct').on('keyup',function(){
    $('#finalResult').empty();
        if($("#searchproduct").val().length>0){
            $('#finalResult').show();
            var value=$(this).val();
             //$('#finalResult').empty();
  $.ajax({
                url: '/ajax',
                type: 'GET',
                data: { id: value },
                 dataType: "JSON",
                success: function(response)
                {
                  
                   // $('#something').html(response);
//                   var abc=response.length;
                var guestfamilyName=response.product;
                   //alert(JSON.stringify(guestfamilyName));
                     if(response){
                $("#finalResult").empty();
               // $("#finalResult").append('<a>Please Select</a>');
                var guestfamilyName=response.product;
                $.each(guestfamilyName,function(key,value){
                 //$("#finalResult").append('<option value="'+value+'">'+key+'</option>');
               $('#finalResult').append($('<div class="addtocart-btn-search-wrap"><a href="/productdetails/'+value.url+'">'+value.name+'<span class="searchcategory">|'+value.category_name+'</span><span class="searchprice">$ '+value.price+'</span><a href="/product-add-to-cart/'+value.id+'" class="addtocart-btn addtocart-btn-search"><ion-icon name="cart"></ion-icon> Add<a></a></div>'))
                });
            }else{
               $("#finalResult").empty();
                 // $("#finalResult").append('<option value="0">Please Select Category</option>');
            }
                }
            });
        }else if($("#searchproduct").val().length<0){
                             $('#finalResult').hide();
                              $('#finalResult').empty();
                                   // $('#country').empty();
//                               $('#state').empty();
//                                $("#Address input[type='text']").val("");
                    }

 }); 
     function filter_data_price(minimum_price,maximum_price)
    {
        
         $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
       // var minimum_price = $('#hidden_minimum_price').val();
      var categoryname = $('#cateoryname').val();
//       alert(categoryname);
//       alert(maximum_price);
//       alert(minimum_price);
        $.ajax({
            url:'/categoryfilterprice',
            type:"GET",
                data:{minimum_price:minimum_price, maximum_price:maximum_price,categoryname:categoryname},
           // data:{brand:brand},
           // dataType:"JSON",
            success:function(data){

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
                          $('.filter_data').show();
                         if(value.discount != null){
                             //alert("call empty");
                          $('.discountoffer').hide();
                         }else{
                           //  alert("call not empty");
                          $('.discountoffer').show();
                         }
                              $('.product-box-class').hide();
                              
                              
               text +='<div class="col-sm-3">'+
	'<div class="productBlock">'+
        '<a href="/productdetails/'+value.url+'" class="productBlockImg">'+
//        '<div style="background: url('+"'/public/images/"+value.product_image+"') no-repeat;"+'></div>'+
	       '<div style="background: url('+"/public/images/"+value.product_image+""+') no-repeat;"></div>'+
        '</a>'+
    	'<div class="productBlockInfo">'+
            '<h3 class="protitle">'+value.name+'</h3>'+
                '<ul class="proRating">'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star-half-o"></i></li>'+
                '</ul>'+
                '<span class="discountoffer">&nbsp;</span>'+
            '<h2 class="propricing">$'+value.price+' $'+value.original_price+'</h2>'+
            '<p class="proinfo">Earliest Delivery: Today</p>'+
    	'</div>'+
        '<div class="productBlockViewDtl">'+
            '<a href="/productdetails/'+value.url+'" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>'+
            '<a href="/add-to-cart/'+value.id+'" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>'+
        '</div>'+
        '</div>'+
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
                    
                            valueid=value.id;
                });
                
                
                text += '<div id="remove-row">' +
                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
                            '</div>';
              $('#remove-row').remove();
                $('.filter_data').html(text);
            }else{
                  
                 $('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Added!</div>');
            }
            }
        });
    }
});

//Read More 
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 100;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
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
        
          $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:'/categoryfilter',
            type:"GET",
//            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
            data:{brand:brand},
           // dataType:"JSON",
            success:function(data){
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
                  if (data.success == "1") {
                     
                     $.each(data.data, function (index, value) {
                         
                              $('.product-box-class').hide();
                              text +='<div class="col-sm-3">'+
	'<div class="productBlock">'+
        '<a href="/productdetails/'+value.url+'" class="productBlockImg">'+
//        '<div style="background: url('+"'/public/images/"+value.product_image+"') no-repeat;"+'></div>'+
	       '<div style="background: url('+"/public/images/"+value.product_image+""+') no-repeat;"></div>'+
        '</a>'+
    	'<div class="productBlockInfo">'+
            '<h3 class="protitle">'+value.name+'</h3>'+
                '<ul class="proRating">'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star-half-o"></i></li>'+
                '</ul>'+
                '<span class="discountoffer">&nbsp;</span>'+
            '<h2 class="propricing">$'+value.price+' $'+value.original_price+'</h2>'+
            '<p class="proinfo">Earliest Delivery: Today</p>'+
    	'</div>'+
        '<div class="productBlockViewDtl">'+
            '<a href="/productdetails/'+value.url+'" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>'+
            '<a href="/add-to-cart/'+value.id+'" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>'+
        '</div>'+
        '</div>'+
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
                            valueid=value.id;
                });
                text += '<div id="remove-row">' +
                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
                            '</div>';
              $('#remove-row').remove();
                $('.filter_data').html(text);
            }else{
                 
                 $('.filter_data').html('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product Added!</div>');
            }
            } 
        });
    }
    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
        $('.common_selector').click(function(){
           //var a= $('input[name=chechkcategory]').attr('checked', true);
          var categorycheck= $('input[name=chechkcategory]').is(':checked')
        var categoryvalue=JSON.stringify(categorycheck)
        if(categoryvalue =='true'){
            filter_data();
        }else{
            $('.product-box-class').show();
             $('.filter_data').hide();
        }
            
    });
    
     $(document).on('click','#btn-more',function(){
       var id = $(this).data('id');
             var categoryname = $('#cateoryname').val();
              
      // $("#btn-more").html("Loading....");
       $.ajax({
           //url : '{{ url("demos/loaddata") }}',
           url:'/loaddata',
           method : "get",
           data : {id:id,categoryname:categoryname},
           //dataType : "text",
           success : function (data)
           {
                          var text = "";
                          var valueid;
                          
                //alert(JSON.parse(data));
             data = JSON.parse(data);
             //alert(data);
                  if (data.success == "1") {
                     
                     $.each(data.data, function (index, value) {
                         if(value.discount != null){
                              $('.discountoffer').show();
                         
                         }else{
                           //  alert("call not empty");
                          $('.discountoffer').hide();
                         }
                         
                         text +='<div class="col-sm-3">'+
	'<div class="productBlock">'+
        '<a href="/productdetails/'+value.url+'" class="productBlockImg">'+
//        '<div style="background: url('+"'/public/images/"+value.product_image+"') no-repeat;"+'></div>'+
	       '<div style="background: url('+"/public/images/"+value.product_image+""+') no-repeat;"></div>'+
        '</a>'+
    	'<div class="productBlockInfo">'+
            '<h3 class="protitle">'+value.name+'</h3>'+
                '<ul class="proRating">'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star"></i></li>'+
                    '<li><i class="fa fa-star-half-o"></i></li>'+
                '</ul>'+
                '<span class="discountoffer">&nbsp;</span>'+
            '<h2 class="propricing">$'+value.price+' $'+value.original_price+'</h2>'+
            '<p class="proinfo">Earliest Delivery: Today</p>'+
    	'</div>'+
        '<div class="productBlockViewDtl">'+
            '<a href="/productdetails/'+value.url+'" class="btn1">View details <i class="fa fa-arrow-circle-right"></i></a>'+
            '<a href="/add-to-cart/'+value.id+'" class="btn2">Buy Now <i class="fa fa-shopping-cart"></i></a>'+
        '</div>'+
        '</div>'+
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
                    
                    
                    valueid=value.id;

                            
                });
                    text += '<div id="remove-row">' +
                            '<button id="btn-more" data-id="' + valueid + '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" > Load More </button>' +
                            '</div>';
              $('#remove-row').remove();
               //$('.filter_data-ajax').append(text);
                $('.filter_data').append(text);
            }else{
                  $('.filter_data').append('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product !</div>');
                // $('.filter_data-ajax').append('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product !</div>');
            $('#btn-more').html("No Data");
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
});