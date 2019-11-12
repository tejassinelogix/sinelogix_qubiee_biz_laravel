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
		var url_app = '/admin/get_subcategory_details';
		REQ.data['category_id'] = $("#main_category_select").val();

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
				console.log('resp_data')							
				console.log(resp_data)
				console.log(status)	

				if(resp_data.status){

					if(resp_data.language == "en"){
						console.log(resp_data.data);
						var obj = jQuery.parseJSON(resp_data.data);
						console.log('obj');
						console.log(obj);
							return false;	
						// $.each(resp_data.data, function (i, item) {
					 //    	console.log('i'+i)
					 //    	console.log('item'+item)
						// });

					}
					// $('#sub_category_select').append($('<option>', { 
					//         value: 1,
					//         text : 123 
					//     }));
				}else{

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