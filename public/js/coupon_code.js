/* 
 Page Name: add discount
 Module Name: admin
*/
var url = document.URL;
var str = url.substr(url.lastIndexOf('/') + 1) + '$';
var APP_URL = url.replace( new RegExp(str), '' );
var is_coupon_set = false;
$('.success_green').hide();
$('.one_time_error').hide();
$('.is_validity_error').hide();
$('.is_minimum_error').hide();
service = {
	req_data : {"data": {}},
	product_old_data : {"data": {"Total": 0,"Gift_Box": 0,"Delivery_Charges":"Free","You_Pay":0,"Product_id":0,"Product_Price":0,"coupon_name":{}}},		
	product_new_data : {"data": {"Total": 0,"Gift_Box": 0,"Delivery_Charges":"Free","You_Pay":0,"Product_id":0,"Product_Price":0,"coupon_name":{}}},		
	render_db: {'filter_dlr_code':''},
	update_session_details: function(){
		REQ  =  ser_obj.product_new_data;
		var url = APP_URL+'update_cart_details';
		// Setup X-CSRF-Token
		$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
		});

		$.ajax({
			type: 'POST',
			url: url,
			data: REQ,
			dataType: "json",
			beforeSend: function(){
				console.log('Before Ajax')
			},
			success: function(resp_data,status,xhr){

				console.log('resp_data update debuged')
				console.log(resp_data)
				return 0;

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

	},reset_coupon_details: function(){
			// $('#coupon_code').removeAttr('disabled','disabled');
			// $('.coupon_apply').removeAttr('disabled','disabled');
			// $('#coupon_code').val('');
			// $('#success_green_'+__this_product).hide();
			// $('#one_time_error_'+__this_product).hide();
			// $('.is_validity_error').hide();
			// $('.is_minimum_error').hide();
			// $('.is_specific_error').hide();
			// $('#one_time_error_'+__this_product).text('');
			// $('.is_validity_error').text('');
			// $('.is_minimum_error').text('');
			// $('.is_specific_error').text('');

			// if(is_coupon_set){ // revert with old value
			// 	console.log('old value set')
			// 	REQ_OLD  =  ser_obj.product_old_data;

			// 	console.log(REQ_OLD)
			// 	$("#loadtotalpay").html("<strong>$ "+REQ_OLD.data.You_Pay+"</strong>");
			// 	$("#loadtotalprice").html("$ "+REQ_OLD.data.Total);
			// 	$(".loaditemtotal").html("$ "+REQ_OLD.data.Total);
			// }

	},init : function(){
		ser_obj = this;
		var __this = '';

		// apply coupan code starts
		$(".coupon_apply").click(function(){
  				__this = $(this).attr('id');
  				__this_product = $(this).attr('product_id');

  				if($("#coupon_code_"+__this_product).val() != ""){  					
  					
						REQ  =  ser_obj.req_data;
						REQ.data['voucher_name'] = $("#coupon_code_"+__this_product).val();
						REQ.data['qty_select'] = $("#qtyinc"+__this_product).val();
						REQ.data['category_id'] = $(".additional_product_details_"+__this_product).attr('main_category');
						REQ.data['brand_id'] = $(".additional_product_details_"+__this_product).attr('sub_category');
						REQ.data['product_id'] = $(".additional_product_details_"+__this_product).attr('product_id');
						console.log('before product code'+__this_product)
						var url = APP_URL+'fetch_coupon_details';
						// Setup X-CSRF-Token
						$.ajaxSetup({
							  headers: {
							    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							  }
						});

						$.ajax({
							type: 'POST',
							url: url,
							data: REQ,
							dataType: "json",
							beforeSend: function(){
								console.log('Before Ajax')
								$('#one_time_error_'+__this_product).text('');
								$('#is_validity_error_'+__this_product).text('');
								$('#is_minimum_error_'+__this_product).text('');
								$('#is_specific_error_'+__this_product).text('');
								$('#coupon_code_'+__this_product).removeAttr('disabled','disabled');
								$('#coupon_apply_'+__this_product).removeAttr('disabled','disabled');
							},
							success: function(resp_data,status,xhr){
								console.log('resp_data')
								console.log(resp_data)
								if(resp_data.status){

								// pre set data starts
								is_coupon_set = true;
								var product_total_price = $("#loaditemtotal"+__this_product).attr('id');															
								var total_string = $("#"+product_total_price).text();
								var total_amt = total_string.replace('$ ','');
								var delivery_string = $("#loaddeliverycharge").text();
								var delivery_amt = delivery_string.replace('$ ','');
								var youpay_string = $("#loadtotalpay").text();
								var youpay_amt = youpay_string.replace('$ ','');
								var org_total_price_string = $("#loadtotalprice").text();
								var org_total_price = org_total_price_string.replace('$ ','');								
								var gift_string = $("#loadgiftboxtotal").text();
								var gift_amt = gift_string.replace('$ ','');
								// pre set data ends

								// set old value starts
								REQ_OLD  =  ser_obj.product_old_data;
								if($.trim(delivery_amt) == "Free"){
									REQ_OLD.data['Delivery_Charges'] = "Free";
								}else{
									REQ_OLD.data['Delivery_Charges'] = $.trim(delivery_amt);
								}
								REQ_OLD.data['Gift_Box'] = gift_amt;									
								REQ_OLD.data['Total'] = org_total_price;									
								REQ_OLD.data['You_Pay'] = $.trim(youpay_amt);
								REQ_OLD.data['Product_id'] = __this_product;
								REQ_OLD.data['Product_Price'] = total_amt;
								console.log('REQ_OLD')
								console.log(REQ_OLD)
								// set old value ends

								// set ajax updated value starts
								var total_amt_new = 0;
								var total_youpay_new = 0;
								var total_discount_new = 0;
								if(resp_data.data[0].discount_type == "rupees"){
									total_discount_new = $.trim(total_amt) - resp_data.data[0].discount_type_amount;
									total_amt_new = org_total_price - resp_data.data[0].discount_type_amount;
									total_youpay_new = youpay_amt - resp_data.data[0].discount_type_amount;
								}else if(resp_data.data[0].discount_type == "percentage"){								
									  total_discount_new = total_amt * resp_data.data[0].discount_type_amount / 100;								
									  total_amt_new = org_total_price - total_discount_new;	
									  total_youpay_new = youpay_amt - total_discount_new;			
								}
								// set new discount value into view
								$("#loadtotalpay").html("<strong>$ "+total_youpay_new+"</strong>");
								$("#loadtotalprice").html("$ "+total_amt_new);
								$("#loaditemtotal"+__this_product).text("$ "+total_discount_new);

								REQ  =  ser_obj.product_new_data;
								REQ.data['Total'] = total_amt_new;
								if($.trim(delivery_amt) == "Free"){
									REQ.data['Delivery_Charges'] = "Free";	
								}else{
									REQ.data['Delivery_Charges'] = delivery_amt;	
								}
								var COUPON_NAME = [];
								REQ.data['Gift_Box'] = gift_amt;								
								REQ.data['You_Pay'] = total_youpay_new;
								REQ.data['Product_id'] = __this_product;
								REQ.data['Product_Price'] = total_discount_new;
								REQ.data['coupon_name'] = [$('#coupon_code_'+__this_product).val()];
								// set ajax updated value ends
								
									$('#success_green_'+__this_product).show();
									$('#one_time_error_'+__this_product).hide();
									$('#is_validity_error_'+__this_product).hide();
									$('#is_minimum_error_'+__this_product).hide();
									$('#is_specific_error_'+__this_product).hide();
									$('#coupon_code_'+__this_product).attr('disabled','disabled');									
									$('#coupon_apply_'+__this_product).attr('disabled','disabled');

									ser_obj.update_session_details();

								}else if(resp_data.is_onetime.status){
									
									$('#success_green_'+__this_product).hide();
									$('#one_time_error_'+__this_product).show();
									$('#is_validity_error_'+__this_product).hide();
									$('#is_minimum_error_'+__this_product).hide();
									$('#is_specific_error_'+__this_product).hide();
									$('#one_time_error_'+__this_product).text(resp_data.is_onetime.message);
								}else if(resp_data.is_validity.status){

									$('#success_green_'+__this_product).hide();
									$('#one_time_error_'+__this_product).hide();
									$('#is_validity_error_'+__this_product).show();
									$('#is_validity_error_'+__this_product).text(resp_data.is_validity.message);
									$('#is_minimum_error_'+__this_product).hide();
									$('#is_specific_error_'+__this_product).hide();
								}else if(resp_data.is_minimum.status){
									$('#success_green_'+__this_product).hide();
									$('#one_time_error_'+__this_product).hide();
									$('#is_validity_error_'+__this_product).hide();
									$('#is_minimum_error_'+__this_product).show();
									$('#is_minimum_error_'+__this_product).text(resp_data.is_minimum.message);
									$('#is_specific_error_'+__this_product).hide();
								}else if(resp_data.is_specific.status){
									$('#success_green_'+__this_product).hide();
									$('#one_time_error_'+__this_product).hide();
									$('#is_validity_error_'+__this_product).hide();
									$('#is_minimum_error_'+__this_product).hide();
									$('#is_specific_error_'+__this_product).show();
									$('#is_specific_error_'+__this_product).text(resp_data.is_specific.message);
								}
							},
							error : function(jqXhr, textStatus, errorMessage){	
								console.log('Error Ajax')				
							}
						}).done(function(){
							console.log('Done Ajax')				
						});	
  				}
  				
		});
		// apply coupan code ends

		// apply coupan code starts
		$(".coupon_cancel").click(function(){
				location.reload(true);

  				__this = $(this).attr('id');
  				__this_product = $(this).attr('product_id');
  			// 	console.log('__this_product')
					// console.log(__this_product)
					// return 0;
				if($("#coupon_code_"+__this_product).val() != ""){  
					$('#coupon_code_'+__this_product).removeAttr('disabled','disabled');
					$('#coupon_apply_'+__this_product).removeAttr('disabled','disabled');
					$('#coupon_code_'+__this_product).val('');
					$('#success_green_'+__this_product).hide();
					$('#one_time_error_'+__this_product).hide();
					$('#is_validity_error_'+__this_product).hide();
					$('#is_minimum_error_'+__this_product).hide();
					$('#is_specific_error_'+__this_product).hide();
					$('#one_time_error_'+__this_product).text('');
					$('#is_validity_error_'+__this_product).text('');
					$('#is_minimum_error_'+__this_product).text('');
					$('#is_specific_error_'+__this_product).text('');
					
					if(is_coupon_set){ // revert with old value						
						REQ_OLD  =  ser_obj.product_old_data;
						console.log('old value')
						console.log(REQ_OLD)
						$("#loaditemtotal"+__this_product).html("$ "+REQ_OLD.data.Product_Price);
						$("#loadtotalpay").html("<strong>$ "+REQ_OLD.data.You_Pay+"</strong>");
						$("#loadtotalprice").html("$ "+REQ_OLD.data.Total);
					}
				}	
  					

  		});


		//$("#"+__this).click(ser_obj.get_discount_Voucher_details);
		//$(".coupon_cancel").click(ser_obj.reset_coupon_details);
	}
}
service.init();
