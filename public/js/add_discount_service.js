/* 
 Page Name: add discount
 Module Name: admin
*/
var url = document.URL;
var str = url.substr(url.lastIndexOf('/') + 1) + '$';
var APP_URL = url.replace( new RegExp(str), '' );
service = {
	req_data : {"data": {}},
	render_db: {'filter_dlr_code':''},
	get_subcategory_details: function(){

		REQ  =  ser_obj.req_data;
		var url = APP_URL+'get_subcategory_details';
		/* TDS :: Server Changes requires */
	//	var url_app = '/admin/get_subcategory_details';
		var url_app = '/admin_2/get_subcategory_details';
		REQ.data['category_id'] = $("#main_category_select").val();
		// Setup X-CSRF-Token
		$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
		});

		$.ajax({
			type: 'POST',
			url: url_app,
			data: REQ,
			dataType: "json",
			beforeSend: function(){
				console.log('Before Ajax')
			},
			success: function(resp_data,status,xhr){

				if(resp_data.status){
						var obj = jQuery.parseJSON(resp_data.data);						
						if (obj) {
                        $("#sub_category_select").empty();
                        $("#sub_category_select").append('<option option value="0">Please Select Sub Category</option>');
                        $.each(obj, function (key, value) {
                            $("#sub_category_select").append('<option value="' + value + '">' + key + '</option>');
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
		// var url_app = '/admin/get_products_details';
		var url_app = '/admin_2/get_products_details';
		REQ.data['category_id'] = $("#main_category_select").val();
		REQ.data['sub_category_id'] = $("#sub_category_select").val();
		// Setup X-CSRF-Token
		$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
		});

		$.ajax({
			type: 'POST',
			url: url_app,
			data: REQ,
			dataType: "json",
			beforeSend: function(){
				console.log('Before Ajax')
			},
			success: function(resp_data,status,xhr){
				if(resp_data.status){
						var obj = jQuery.parseJSON(resp_data.data);						
						if (obj) {

                        $("#products_select").empty();
                        $("#products_select").append('<option option value="0">Please Select Products</option>');
                        $.each(obj, function (key, value) {
                            $("#products_select").append('<option value="' + value.id + '">' + value.product_name + '</option>');
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
	},init : function(){
		ser_obj = this;
		// ser_obj.list_dealer();
		$("#main_category_select").change(ser_obj.get_subcategory_details);
		$("#sub_category_select").change(ser_obj.get_products_details);
		
		// $("#dlr_block_action").click(ser_obj.update_dealer_report);
	}
}
service.init();

// Custom Events
$('.auto_coupan_form').hide();
$('.manual_coupan_form').hide();
$('.voucher_date_validity').hide();
$('.minimum_amount_form').hide();
$('.discount_type_input_form').hide();
$(document).on("change","#is_auto_generated, #is_validity_select, #is_minamt_select, #is_discount_by_select",function(event){
  	
  	if($(this).attr('id') == 'is_auto_generated'){
		if($(this).val() == 'yes'){
			$('.default_manual_gen_coupan').addClass('manual_coupan_form');
			$('.auto_coupan_form').show();
			$('.manual_coupan_form').hide();
			$('.default_auto_gen_coupan').addClass('auto_coupan_form');
		}else{
			$('.manual_coupan_form').show();			
			$('.default_auto_gen_coupan').addClass('auto_coupan_form');
			$('.auto_coupan_form').hide();
		}
  	}

  	if($(this).attr('id') == 'is_validity_select'){
		if($(this).val() == 'yes'){
			// $('.default_voucher_date_validity').addClass('voucher_date_validity');
			$('.voucher_date_validity').show();
		}else{
			$('.default_voucher_date_validity').addClass('voucher_date_validity');
			$('.voucher_date_validity').hide();
		}
  	}

  	if($(this).attr('id') == 'is_minamt_select'){
		if($(this).val() == 'yes'){
			$('.minimum_amount_form').show();
		}else{
			$('.default_minimum_amount_form').addClass('minimum_amount_form');
			$('.minimum_amount_form').hide();
		}
  	}

  	if($(this).attr('id') == 'is_discount_by_select'){
  		$('.discount_type_input_form').show();
  	}

});
