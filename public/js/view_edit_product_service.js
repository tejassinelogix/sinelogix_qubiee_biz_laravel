/* 
 Page Name: add discount
 Module Name: admin
*/
var url = document.URL;
var str = url.substr(url.lastIndexOf('/') + 1) + '$';
var APP_URL = url.replace( new RegExp(str), '' );
var	is_init_load = true;

service = {
	req_data : {"data": {}},
	render_db: {'filter_dlr_code':''},

	get_subcategory_details: function(){

		REQ  =  ser_obj.req_data;
		var url = APP_URL+'get_subcategory_details';
		/* TDS :: Server Changes requires */
		 var url_app = '/admin/get_subcategory_details';
		// var url_app = '/admin_2/get_subcategory_details';
		REQ.data['category_id'] = $("#main_category_select").val();
		// Setup X-CSRF-Token
		$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('#csrf-token').val()
			  }
		});

		$.ajax({
			type: 'POST',
			url: url_app,
			data: REQ,
			dataType: "json",
			beforeSend: function(){
				console.log('Before Ajax')
				// $("#sub_category_select").empty();
				$("#products_select").empty();
			},
			success: function(resp_data,status,xhr){

				if(resp_data.status){
						var obj = jQuery.parseJSON(resp_data.data);						
						if (obj) {
                        $("#sub_category_select").empty();
                        $("#sub_category_select").append('<option option value="0">Please Select Sub Category</option>');
                        $.each(obj, function (key, value) {
                        	var selected = '';
                        	/* set dynamic selection option if true */
                        	if($("#sub_category_hidden").val() != ""){								
								if(value === parseInt($("#sub_category_hidden").val())){
									selected = 'selected';
								}
							}
                            $("#sub_category_select").append('<option value="' + value + '" '+selected+'>' + key + '</option>');
                        });
                    } else {
                        $("#sub_category_select").empty();
                        $("#sub_category_select").append('<option value="0">Please Select Category</option>');
                    }
				}else{ // no records found
					$("#sub_category_select").empty(); 
                    $("#sub_category_select").append('<option value="0">No Sub Category found</option>');
				}

			},
			error : function(jqXhr, textStatus, errorMessage){	
				console.log('Error Ajax')				
			}
		}).done(function(){
			console.log('Done Ajax')				
		});
	},get_products_details: function(){

		REQ  =  ser_obj.req_data;
		var url = APP_URL+'get_products_details';
		/* TDS :: Server Changes requires */
		var url_app = '/admin/get_products_details';
		// var url_app = '/admin_2/get_products_details';
		REQ.data['category_id'] = $("#main_category_select").val();
		if(is_init_load){
			REQ.data['sub_category_id'] = $("#sub_category_hidden").val();
		} 
		else{			
			REQ.data['sub_category_id'] = $("#sub_category_select").val();
		}
		is_init_load = false;

		// Setup X-CSRF-Token
		$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			  }
		});

		$.ajax({
			type: 'POST',
			url: url_app,
			data: REQ,
			dataType: "json",
			beforeSend: function(){
				console.log('Before Ajax')
				// $("#products_select").empty();
			},
			success: function(resp_data,status,xhr){
				if(resp_data.status){
						var obj = jQuery.parseJSON(resp_data.data);						
						if (obj) {

                        $("#products_select").empty();
                        $("#products_select").append('<option option value="0">Please Select Products</option>');
                        $.each(obj, function (key, value) {
                        	var selected = '';
                        	/* set dynamic selection option if true */
                        	if($("#products_hidden").val() != ""){								
								if(value.id === parseInt($("#products_hidden").val())){
									selected = 'selected';
								}
							}

                            $("#products_select").append('<option value="' + value.id + '" '+selected+'>' + value.product_name + '</option>');
                        });
                    } else {
                        $("#products_select").empty();
                        $("#products_select").append('<option value="0">Please Select Products</option>');
                    }
				}else{ // no records found
					$("#products_select").empty(); 
                    $("#products_select").append('<option value="0">No Products found</option>');
				}

			},
			error : function(jqXhr, textStatus, errorMessage){	
				console.log('Error Ajax')				
			}
		}).done(function(){
			console.log('Done Ajax')				
		});
	},get_vouchers_list: function(){

		REQ  =  ser_obj.req_data;
		/* TDS :: Server Changes requires */
		var url_app = '/admin/view_discount_voucher';
		// var url_app = '/admin_2/view_discount_voucher';
		// Setup X-CSRF-Token
		$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			  }
		});

		$.ajax({
			//type: 'GET',
			url: url_app,
			data: REQ,
			dataType: "json",
			beforeSend: function(){				
				console.log('Before Ajax')						
			},
			success: function(resp_data,status,xhr){
				console.log(status);
				if(resp_data.status){
						var obj = jQuery.parseJSON(resp_data.data);						
						if (obj) {

                        $("#example").empty();
                        $("#example").append('<option option value="0">Please Select Products</option>');
                        $.each(obj, function (key, value) {
                            $("#example").append('<option value="' + value.id + '">' + value.product_name + '</option>');
                        });
                    } else {
                        $("#example").empty();
                        $("#example").append('<option value="0">Please Select Products</option>');
                    }
				}else{ // no records found
					$("#example").empty(); 
                    $("#example").append('<option value="0">No Products found</option>');
				}

			},
			error : function(jqXhr, textStatus, errorMessage){	
				console.log('Error Ajax')				
			}
		}).done(function(){
			console.log('Done Ajax')				
		});
	},init : function(){

		ser_obj = this;
		// ser_obj.get_vouchers_list();
		$("#main_category_select").change(ser_obj.get_subcategory_details);
		$("#sub_category_select").change(ser_obj.get_products_details);

		if(is_init_load){
			if($("#main_category_hidden").val() != ""){
				ser_obj.get_subcategory_details();
			}
		}

		if(is_init_load){
			if($("#sub_category_select").val() != ""){
				ser_obj.get_products_details();
			}
		}	

		// $("#dlr_block_action").click(ser_obj.update_dealer_report);
	}
}
service.init();

// Custom Events
// $('.auto_coupan_form').hide();
$('.manual_coupan_form').hide();
//$('.voucher_date_validity').hide();
//$('.minimum_amount_form').hide();
//$('.discount_type_input_form').hide();


// $("#is_autoptiono_generated").on("select",function() {
//   alert( "Handler for called." );
// });


$(document).on("change","#is_auto_generated, #is_validity_select, #is_minamt_select, #is_discount_by_select",function(event){
  	
  	if($(this).attr('id') == 'is_auto_generated'){
		if($(this).val() == 'yes'){			
			$('.auto_coupan_form').show();
			$('.manual_coupan_form').hide();
		}else{
			$('.manual_coupan_form').show();
			$('.auto_coupan_form').hide();
		}
  	}

  	if($(this).attr('id') == 'is_validity_select'){
		if($(this).val() == 'yes'){
		   $('.voucher_date_validity').show();
		}else{
			$('.voucher_date_validity').hide();
		}
  	}

  	if($(this).attr('id') == 'is_minamt_select'){
		if($(this).val() == 'yes'){
			$('.minimum_amount_form').show();
		}else{
			$('.minimum_amount_form').hide();
		}
  	}

  	if($(this).attr('id') == 'is_discount_by_select'){
  		$('.discount_type_input_form').show();
  	}

});

$(document).on("change","#main_category_select",function(event){
		$('#products_select').empty();
});	
