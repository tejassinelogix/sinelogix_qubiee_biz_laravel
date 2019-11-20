<!-- footer  -->
<div class="footer-top-area">
    <div class="containerWrapper">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="footer-about-us">
                    <h2 class="footer-wid-title">{{ __('message.About Qubiee') }}</h2>
                    <p>{{ __('message.dummy_txt') }}</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-8">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">{{ __('message.User Navigation') }} </h2>

                            <ul>
                                <?php
                                foreach ($getPagesdetails as $getPages) {
                                    $page_name = json_decode($getPages->page_name, true);
                                    ?>
                                    <li>
                                        <!-- <a href="<?php echo url('/'); ?>/<?php echo $getPages->url; ?>"><?php echo $getPages->page_name; ?>
                                        </a> -->
                                        <a href="<?php echo url('/'); ?>/<?php echo $getPages->url; ?>"><?php echo $page_name[$language]; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                    <li class="sellwithUsBtn">
                                        <a href="<?php echo url('/'); ?>/contact">{{ __('message.Sell with Us') }} <i class="fa fa-arrow-circle-right"></i></a>
                                        <!--<a href="mailto:sales@qubiee.com">{{ __('message.Sell with Us') }} </a>-->
                                    </li>
                                <!--                                <li><a href="#">My account</a></li>
                                                                    <li><a href="#">Order history</a></li>
                                                                    <li><a href="#">Wishlist</a></li>
                                                                    <li><a href="#">Vendor contact</a></li>-->
                            </ul>                        
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">{{ __('message.Categories') }}</h2>
                            <ul>
                                <?php
                                foreach ($getMainCategory as $getMainCatego) {
                                    $cat_name = json_decode($getMainCatego->category_name, true);
                                    ?>
                                    <li><a href="/<?php echo $getMainCatego->url; ?>"><?php echo $cat_name[$language]; ?></a>  </li>  
                                    <!-- <li><a href="#">Cups / Mugs</a></li>
                                    <li><a href="#">Photo Gifts</a></li>
                                    <li><a href="#">Printed Clothing</a></li>
                                    <li><a href="#">Pens</a></li>
                                    <li><a href="#">Photo Albums</a></li>
                                    <li><a href="#">Business Cards</a></li>
                                    <li><a href="#">Calendars</a></li>
                                    <li><a href="#">Corporate Gifts</a></li> -->
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="footer-menu">
                            <h3 class="footer-wid-title">{{ __('message.Subscribe') }}</h3>
                            <!--                            <form method="post" class="subscribeForm">
                                                            <input type="email" placeholder="Your Email">
                                                            <button type="submit">Subscribe</button>
                                                            </form>-->

                            <!--<p>Register now to get updates on promotions and coupons.</p>-->
                            <p>{{ __('message.dummy_short_txt') }}</p>

                            @if (\Session::has('subscribe_success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('subscribe_success') !!}</li>
                                </ul>
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form class="subscribeForm" action="{{ url('subscribe') }}" method="post">
                                @csrf
                                <input type="email" placeholder="{{ __('message.E-Mail Address') }}" name="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <button type="submit">
                                    {{ __('message.Subscribe') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <div class="col-md-12">
                <div class="copyright">
                    <p>© 2018 <strong>Qubiee</strong>. All Rights Reserved. Designed &amp; Developed by: by <a href="http://www.etcspl.com" target="_blank"><strong>eTCS</strong></a></p>
                </div>
            </div>

        </div>
    </div>
</div> <!-- End of footer -->

<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>

<!-- Modal -->
<div class="modal fade" id="userLoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ __('Login') }}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <form class="loginFormMain" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="loginFormRow">
                                <div class="loginFormCol">
                                    <i class="fa fa-user"></i>
                                    <input id="email" type="email" placeholder="Email" class="email form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="loginFormRow">
                                <div class="loginFormCol">
                                    <i class="fa fa-lock"></i>
                                    <input id="password" type="password" placeholder="Password" class="password form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="loginFormRow">
                                <div class="loginFormCol">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                               <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 signInBtns text-center">
                                    <button type="submit" id="loginuser" class="btn btn-primary btn-rounded"><i class="fa fa-sign-in"></i> {{ __('Login') }}</button>
                                    <a class="btn btn-default2 btn-rounded" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                    <div class="space5 text-center forgotPwdBtn">
                                        <a class="" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="signInwithsocial">
                                <label class="col-form-label text-md-right">{{ __('message.Login Using') }} : </label>
                                <a href="{{ url('auth/facebook') }}"><i class="fa fa-facebook-square" aria-hidden="true"></i> {{ __('message.Facebook') }}</a> /
                                <a href="{{ url('auth/google') }}"><i class="fa fa-google-plus-square" aria-hidden="true"></i> {{ __('message.Google') }}+</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModalajax">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
<!--      <div class="modal-header">
        <h4 class="modal-title-addtowish"> </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>-->

      <!-- Modal body -->
      <div class="modal-body-addtowish">
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- jQuery-->

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ URL::to('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('public/assets/js/bootstrap.min.js') }}"></script>    

<!-- jQuery -->
<script type="text/javascript" src="{{ URL::to('public/assets/js/modernizr.custom.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function() {
// $( "#dragimage" ).draggable();
// $('#dragimage').resizable();
$('#uploadImgPreviewDesign').draggable({
appendTo: 'body',
        start: function(event, ui) {
        isDraggingMedia = true;
        },
        stop: function(event, ui) {
        isDraggingMedia = false;
        // blah
        }
});
});
$(".uploadImgPreviewDesign").on("click", function() {
croppie.rotate(parseInt($(this).data('deg')));
});</script>

<!-- Fancybox jQuery -->
<script src="{{ URL::to('public/assets/fancybox/jquery.mousewheel-3.0.6.pack.js') }}"></script>
<script src="{{ URL::to('public/assets/fancybox/jquery.fancybox.js?v=2.1.4') }}"></script>

<!--animatecss-->
<script src="{{ URL::to('public/assets/animatecss/viewportchecker.js') }}"></script>

<!-- FlexSlider -->
<script defer src="{{ URL::to('public/assets/flexslider/jquery.flexslider.js') }}"></script>

<script type="text/javascript" src="{{ URL::to('public/assets/owl/owl.carousel.js') }}"></script>

<script type="text/javascript" src="{{ URL::to('public/assets/js/jquery.transit.min.js') }}"></script>

<!-- price-range -->
<script type="text/javascript" src="{{ URL::to('public/assets/range-slider/ion.rangeSlider.min.js') }}"></script>

<!-- image zoom slider feature -->
<script src="{{ URL::to('public/assets/zoomimage/zoom-image.js') }}"></script>
<script src="{{ URL::to('public/assets/zoomimage/main.js') }}"></script>


<script src="{{ URL::to('public/assets/js/jquery.js') }}"></script>
<script src="{{ URL::to('assets/js/custom.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<!--script image editor-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.7/fabric.js"></script>
<script type="text/javascript" src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
<script type="text/javascript" src="https://uicdn.toast.com/tui-color-picker/v2.2.0/tui-color-picker.js"></script>
<script type="text/javascript" src="{{ URL::to('public/assets/dist/tui-image-editor.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/assets/js/theme/white-theme.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/assets/js/theme/black-theme.js') }}"></script>

<!--script image editor end-->


<!-- <script type="text/javascript">
$("#Locale").on('change', function () {
var val = $(this).val();
  var baseurl = {!! json_encode(url('/')) !!};
var r_url = baseurl + "/locale/" + val;
// alert(r_url);
$.ajax({
type: 'get',
url: r_url,
success: function (data) {
  location.reload();
},
error: function () {
}
});
});
</script> -->



<script type="text/javascript">
$("#Locale").on('change', function(){
var val = $(this).val();
$.ajax({
type:'get',
        url:"/locale/" + val,
        success:function(data){
        location.reload();
        },
        error:function(){
        }
});
});</script>


<script>
    function addtocart(producid, productname, price, categoryname) {
    //alert(client_id);
    $("#productid").val(producid);
    $("#productname").val(productname);
    $("#price").val(price);
    $("#subject").val(categoryname);
    $('#mycart-modal').modal('toggle');
    $('#mycart-modal').modal('show');
    }



</script>
<script>
    $(document).ready(function () {
    $('.tui-image-editor-header-logo').hide();
    $('.tui-image-editor-menu-filter').hide();
    $('.uploadImgPreview img').click(function () {

    imagelink = ($(this).attr('src'));
    var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
    includeUI: {
    loadImage: {
    path: imagelink,
            name: 'SampleImage'
    },
            theme: blackTheme, // or whiteTheme
            // initMenu: 'filter',
            menuBarPosition: 'bottom'
    },
            cssMaxWidth: 700,
            cssMaxHeight: 300
    });
    window.onresize = function() {
    imageEditor.ui.resizeEditor();
    }
    });
    $('#summernote').summernote({
    height: "10px",
            width:"250px",
            placeholder: 'Enter Your Text Here',
            tabsize: 2,
            height: 100,
            toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ]
    });
    });</script>


<script>
    // // This example displays an address form, using the autocomplete feature
    // // of the Google Places API to help users fill in the information.

    // // This example requires the Places library. Include the libraries=places
    // // parameter when you first load the API. For example:
    // // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    // var placeSearch, autocomplete;
    // var componentForm = {
    //     street_number: 'short_name',
    //     route: 'long_name',
    //     locality: 'long_name',
    //     administrative_area_level_1: 'short_name',
    //     country: 'long_name',
    //     postal_code: 'short_name'
    // };

    // function initAutocomplete() {
    //     // Create the autocomplete object, restricting the search to geographical
    //     // location types.
    //     autocomplete = new google.maps.places.Autocomplete(
    //             /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
    //     {types: ['geocode']});
    //             // When the user selects an address from the dropdown, populate the address
    //             // fields in the form.
    //             autocomplete.addListener('place_changed', fillInAddress);
    // }

    // function fillInAddress() {
    //     // Get the place details from the autocomplete object.
    //     var place = autocomplete.getPlace();
    //     var address = $('#autocomplete').val();
    //     $('#addressfull').val(address);
    //     for (var component in componentForm) {
    //         document.getElementById(component).value = '';
    //         document.getElementById(component).disabled = false;
    //     }

    //     // Get each component of the address from the place details
    //     // and fill the corresponding field on the form.
    //     for (var i = 0; i < place.address_components.length; i++) {
    //         var addressType = place.address_components[i].types[0];
    //         if (componentForm[addressType]) {
    //             var val = place.address_components[i][componentForm[addressType]];
    //             document.getElementById(addressType).value = val;
    //         }
    //     }
    // }

    // // Bias the autocomplete object to the user's geographical location,
    // // as supplied by the browser's 'navigator.geolocation' object.
    // function geolocate() {
    //     if (navigator.geolocation) {
    //         navigator.geolocation.getCurrentPosition(function (position) {
    //             var geolocation = {
    //                 lat: position.coords.latitude,
    //                 lng: position.coords.longitude
    //             };
    //             var circle = new google.maps.Circle({
    //                 center: geolocation,
    //                 radius: position.coords.accuracy
    //             });
    //             autocomplete.setBounds(circle.getBounds());
    //         });
    //     }
    // }
</script>

<script>
    @if (Session::has('add-to-cart-success'))
            toastr.success("{{ Session::get('add-to-cart-success') }}");
    @endif
//  var msg = '{{Session::get('add-to-cart-success')}}';
//  var exist = '{{Session::has('add-to-cart-success')}}';
//  if(exist){
//    alert(msg);
//  }
</script>
<script>
    function f1(clicked_id){
//        alert(clicked_id);
            $('#selected_address').val(clicked_id);
            }
    $(".chb").change(function()
    {
    $(".chb").prop('checked', false);
    $(this).prop('checked', true);
    });
    
    function f2(clicked_id){
        //alert(clicked_id);
        $('#send_gift').val(clicked_id);
                }
        $(".chb").change(function()
        {
        $(".chb").prop('checked', false);
        $(this).prop('checked', true);
    });
    
    $("#nextreview").click(function() {
//        alert("nextreview");
        $(".checkOutTablayout .checkOutTabs > ul > li > a").parent().removeClass("active");
        $(".checkOutTablayout .checkOutTabs > ul > li > a[aria-controls='ReviewOrder']").parent().addClass("active");
    });  
      $("#nextreviewnogift").click(function() {
//        alert("nextreview");
        $(".checkOutTablayout .checkOutTabs > ul > li > a").parent().removeClass("active");
        $(".checkOutTablayout .checkOutTabs > ul > li > a[aria-controls='ReviewOrder']").parent().addClass("active");
    });  
    
    $("#backreview").click(function() { 
//        alert("backreview");
        $(".checkOutTablayout .checkOutTabs > ul > li > a").parent().removeClass("active");
        $(".checkOutTablayout .checkOutTabs > ul > li > a[aria-controls='ConfirmAddress']").parent().addClass("active");
    });
    
    $("#nextpayment").click(function() {
//        alert("nextpayment");
        $(".checkOutTablayout .checkOutTabs > ul > li > a").parent().removeClass("active");
        $(".checkOutTablayout .checkOutTabs > ul > li > a[aria-controls='MakePayment']").parent().addClass("active");
    });
    $("#nextConfirmAddress").click(function() {
//        alert("nextpayment");
        $(".checkOutTablayout .checkOutTabs > ul > li > a").parent().removeClass("active");
        $(".checkOutTablayout .checkOutTabs > ul > li > a[aria-controls='ConfirmAddress']").parent().addClass("active");
    });
     $("#backsenderDetailsModal").click(function() { 
//        alert("backreview");
        $(".checkOutTablayout .checkOutTabs > ul > li > a").parent().removeClass("active");
        $(".checkOutTablayout .checkOutTabs > ul > li > a[aria-controls='senderDetailsModal']").parent().addClass("active");
    });
    
    $("#backpayment").click(function() { 
//        alert("backpayment");
        $(".checkOutTablayout .checkOutTabs > ul > li > a").parent().removeClass("active");
        $(".checkOutTablayout .checkOutTabs > ul > li > a[aria-controls='ReviewOrder']").parent().addClass("active");
    });
    
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4y42DfJUNmx6YzlPWFdbhwj4m-6XEIg8&libraries=places&callback=initialize" async defer></script>
<script type="text/javascript" src="{{ URL::to('public/js/mapInput.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/coupon_code.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/assets/rate/star-rating.js') }}"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4y42DfJUNmx6YzlPWFdbhwj4m-6XEIg8&libraries=places&callback=initialize" async defer></script>-->

@yield('scripts')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d2036427a48df6da2433b20/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();


$('.rdCheck').dblclick(function(){
   if($(this).is(':checked'))
    {
        $(this).removeAttr('checked');
    }       
});

</script>
<script type="text/javascript">
	var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});


	function loadMoreData(page){
             var id = $('.proListViewBtnsActive').data('id');
              
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#post-data").append(data.html);
                    if(id==2){
                   $(".innerproductCol .col-sm-3.product-box-class").addClass("rowCol1ProductBoxClass");
                $(".categoryMainSection .col-sm-3.product-box-class").addClass("rowCol1ProductBoxClass");
              }else{
                  $(".innerproductCol .col-sm-3.product-box-class").removeClass("rowCol1ProductBoxClass");
                $(".categoryMainSection .col-sm-3.product-box-class").removeClass("rowCol1ProductBoxClass");
              }
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
<!--End of Tawk.to Script-->
</body>
</html>
