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
    $('#maincategory').click(function () {
        var countryID = $(this).val();
        //alert(countryID);
        $("#subcategory").empty();
        if (countryID > 0) {
//        alert("call now");
            $.ajax({
                url: '/admin/subcat',
                type: 'GET',
                data: {id: countryID},
                success: function (response)
                {
                    // $('#something').html(response);
                    if (response) {
                        $("#subcategory").empty();
                        $("#subcategory").append('<option option value="0">Please Select</option>');
                        $.each(response, function (key, value) {
                            $("#subcategory").append('<option value="' + value + '">' + key + '</option>');
                        });
                    } else {
                        $("#subcategory").empty();
                        $("#subcategory").append('<option value="0">Please Select Category</option>');
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
});