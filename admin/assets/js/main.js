$.noConflict();

jQuery(document).ready(function ($) {

    "use strict";

    [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
        new SelectFx(el);
    });

    jQuery('.selectpicker').selectpicker;


    $('#menuToggle').on('click', function (event) {
        $('body').toggleClass('open');
    });

    $('.search-trigger').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').addClass('open');
    });

    $('.search-close').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').removeClass('open');
    });

    // $('.user-area> a').on('click', function(event) {
    // 	event.preventDefault();
    // 	event.stopPropagation();
    // 	$('.user-menu').parent().removeClass('open');
    // 	$('.user-menu').parent().toggleClass('open');
    // });
// tool tip
    $('[data-toggle="tooltip"]').tooltip();
    $('#discount').change(function () {
        var discountprice = $(this).val();
        //alert(discountprice);
        var orginalpriceprice = $('#originalprice').val();

        var sellingprice = orginalpriceprice - (orginalpriceprice * (discountprice / 100));
        $('#price').val(sellingprice);
        //alert(sellingprice);
    });

    //        $('#monthilyordrs').on('submit', function (e) {
    $('#submitmothorders').click(function (e) {

        e.preventDefault();
        //var data = $('#monthilyordrs').serialize();
        var from_date_order = $('#from_date_order').val();
        var to_date_order = $('#to_date_order').val();

        $.ajax({
            type: "GET",
            // url: 'post.php',
            url: '/admin/ordersmothily',
            data: {from_date_order: from_date_order, to_date_order: to_date_order},
            success: function (data) {
//                alert(data);
                var text = "";
                var counter = 0;
//                alert(JSON.parse(data));
                data = JSON.parse(data);

                if (data.success == "1") {
                    $.each(data.data, function (index, value) {
                        counter++;
                        if (value.usertype == 'superadmin') {
                            text += '<tr>' +
                                    '<td><center>' + counter + '</center></td>' +
                                    '<td><center>' + value.vendorname + '</center></td>' +
                                    '<td><center>' + value.order_id + '</center></td>' +
                                    '<td><center>' + value.product_name + '</center></td>' +
                                    '<td><center>' + value.product_ref_number + '</center></td>' +
                                    '<td><center>' +
                                    '<a href="/admin/showinvoice/' + value.order_id + '" target="_blank" class="btn1"><i class="fa fa-eye"></i></a>' +
                                    '</center></td>' +
                                    '</tr>';
                        } else {
                            text += '<tr>' +
                                    '<td><center>' + counter + '</center></td>' +
                                    '<td><center>' + value.order_id + '</center></td>' +
                                    '<td><center>' + value.product_name + '</center></td>' +
                                    '<td><center>' + value.product_ref_number + '</center></td>' +
                                    '<td><center>' +
                                    '<a href="/admin/showinvoice/' + value.order_id + '" target="_blank" class="btn1"><i class="fa fa-eye"></i></a>' +
                                    '<center></td>' +
                                    '</tr>';
                        }

//               $('.mothilyOrdrInfo').append($('<tr>').append($('<td>').append(text)))
//                 $('.mothilyOrdrInfo > tbody:last-child').append(text); 
                        $(".mothilyOrdrInfo tbody").html(text);
                    });
                } else {
                    $(".odd").hide();
                    text += '<tr class="oddmothilyord">' +
                            '<td bgcolor="#FF0000" valign="top" colspan="6" class="dataTables_empty">' + "No data available in table" + '</td>' +
                            '</tr>';

                    $(".mothilyOrdrInfo tbody").html(text);
                    //$('.filter_data').append('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product !</div>');
                    // $('.filter_data-ajax').append('<div class="NoCar"><i class="fa fa-exclamation-triangle"></i> <br> No Product !</div>');
                    // $('#btn-more').html("No Data");
                }

            }
        });

    });
    // code for date wise excel sheet genrate
    $('#monthilyorderExcel').click(function (e) {
//                 alert("call excel data");
        e.preventDefault();
        //var data = $('#monthilyordrs').serialize();
        var from_date_order = $('#from_date_order').val();
        var to_date_order = $('#to_date_order').val();


        $.ajax({
            type: "GET",
            url: '/admin/monthilyOrderExcel',
            data: {from_date_order: from_date_order, to_date_order: to_date_order},
//            success: function (data) {
////                alert(data);
//                var text = "";
//                var counter = 0;
////                alert(JSON.parse(data));
//            //    data = JSON.parse(data);
//            }
        });

    });



    $('#maincategory').click(function () {
        var countryID = $(this).val();
        //alert(countryID);
        $("#subcategory").empty();
        $('#addprodsubmit').prop('disabled', true);
        if (countryID > 0) {
//        alert("call now");
            $.ajax({
                url: '/admin/subcat',
                type: 'GET',
                data: {id: countryID},
                success: function (response)
                {
                    // $('#something').html(response);
                    if ($.trim(response)) {
                       var x = document.getElementById("Locale").value;
//                       alert(x);
//                       console.log(x);
//                        alert(document.documentElement.lang);
                        $("#subcategory").empty();
                        $("#subcategory").append('<option option value="0">Please Select</option>');
                        $.each(response, function (key, value) {
                            var keyval=JSON.parse(key);
                         $("#selectsubcat").html('Plesase select sub category');
                            if (x == 'en') {
                            $("#subcategory").append('<option value="' + value + '">' + keyval.en + '</option>');
                          } else {
                              $("#subcategory").append('<option value="' + value + '">' + keyval.ar + '</option>');
                          }                                               
//                        console.log(o);                            
                        });
                    } else {
                           $('#addprodsubmit').prop('disabled', false);
                         $("#selectsubcat").empty();
                        $("#subcategory").empty();
                        $("#subcategory").append('<option value="1">Please Select Category</option>');
                    }
                }
            });
        } else {
//alert("call now else 0");
            $("#subcategory").empty();
            $("#subcategory").append('<option value="0">Please Select Category</option>');
            // $("#city").empty();
        }
    });
    
    // code for get the sub categaory
                $('#subcategory').click(function () {
                var countryID = $(this).val();
                //alert(countryID);
                 $("#selectsubcat").empty();
                $("#sub_cat").empty();
                if (countryID != 0) {
                     $("#selectsubcat").empty();
                     $('#addprodsubmit').prop('disabled', false);
                      $.ajax({
                url: '/admin/sub_category',
                type: 'GET',
                data: { id: countryID },
                success: function(response)
                { 
                   // $('#something').html(response);
                     if ($.trim(response)) {
                         var x = document.getElementById("Locale").value;
                $("#sub_cat").empty();
                $("#sub_cat").append('<option option value="0">Please Select</option>');
                $.each(response,function(key,value){
                    var keyval=JSON.parse(key);
                      if (x == 'en') {
                           $("#sub_cat").append('<option value="'+value+'">'+keyval.en+'</option>');
                      }else{
                           $("#sub_cat").append('<option value="'+value+'">'+keyval.ar+'</option>');
                      }
                   
                });
           
            }else{
               $("#sub_cat").empty();
                  $("#sub_cat").append('<option value="0">Please Select Category</option>');
            }
                }
            });
                } else {
                    $('#addprodsubmit').prop('disabled', true);
                    $("#selectsubcat").html('Plesase select sub category');
                    //alert("call now else 0");
                    $("#sub_cat").empty();
                    $("#sub_cat").append('<option value="0">Please Select Category</option>');
                    // $("#city").empty();
                }
            });
     $('#customization').click(function () {
         if ($(this).is(':checked') ) {
             $("#giftwrapavail").html("<sapn style='color:green'> Gift wrap available for this product</span>");
         }else{
             $("#giftwrapavail").html("<sapn></span>");
         }
         
     });
      $(document).on('click','.productapprovead',function(){
        var id = $(this).data('id');
          alert(id+'this');
        jQuery('.loader-wrapper'+id).show();
       $.ajax({
            //url : '{{ url("demos/loaddata") }}',
            url: '/deleteproduct',
            method: "get",
            data: {id: id},
            //dataType : "text",
            success: function (data)
            { //alert(JSON.parse(data));
                jQuery('.loader-wrapper'+id).hide();
                data = JSON.parse(data);
                    event.preventDefault();
                if (data.success == "1") {
                     jQuery.noConflict();
                     $("#myModalajax").modal("show");
              $('.addtowishmessage'+id).html('<span class="addtoWishMsg">Product added in wishlist </span>');
              $('.modal-body-addtowish').html('<span class="addtoWishMsg">Product added in wishlist <span>');             
//                    $.each(data.data, function (index, value) {
//                        });
                 } else if(data.success == "2"){
                      
                     $('.addtowishmessage'+id).html('<span class="addtoWishMsg">Product already added in wishlist <span>');
                     
                }else{
                     $('.addtowishmessage'+id).html('<span class="addtoWishMsgFiled">Product added in wishlist failed </span>');
                }

            },
            error: function(){
                jQuery('.loader-wrapper'+id).hide();
                 $('.addtowishmessage'+id).html('<span class="addtoWishMsgLogin">Please login to check Wishlist<span>');
               
            }
            
        });
    });
   // $('.vendorTable tr td:empty').parent().addClass("trGhaib");

});