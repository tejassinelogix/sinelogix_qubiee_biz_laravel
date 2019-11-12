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
	list_dealer : function(){
		REQ  =  ser_obj.req_data;
		$.ajax({
			type: 'POST',
			url: APP_URL + '/api/m/list-dealer',
			headers: {'Authorization': 'Bearer '+getCookie('jwt_token')},
			data: REQ,
			dataType: "json",
			beforeSend: function(){
        			$.LoadingOverlay("show");        			
        			$("#dealer_status").attr("disabled", "disabled");
					$("#filter_dlr_code").attr("disabled", "disabled");
					$("#search-block-dealer").attr("disabled", "disabled");
			},
			success: function(resp_data){  
				var delaer_list = resp_data.data;
				var select_box = $("#filter_dlr_code");
				select_box.empty(); 
				select_box.append('<option value="All" selected>All</option>');
				$.each(delaer_list, function(key,value) { 
				select_box.append('<option value="'+ value.dlr_code+'">'+value.dlr_code + '</option>');
				});
				if(ser_obj.render_db.filter_dlr_code != "")
		    	$("#filter_dlr_code option[value='"+render_db.filter_dlr_code+"']").attr("selected","selected").change();
			
		},error : function(jqXhr, textStatus, errorMessage){					
		}
		}).done(function(){
			$("#dealer_status").removeAttr("disabled", "disabled");
			$("#filter_dlr_code").removeAttr("disabled", "disabled");
			$("#search-block-dealer").removeAttr("disabled", "disabled");
			$.LoadingOverlay("hide");
		}); 
	},
	get_subcategory_details: function(){

		REQ  =  ser_obj.req_data;
		var url = APP_URL+'get_subcategory_details';
		var url_app = '/sinelogix_qubiee_biz_laravel/admin_2/get_subcategory_details';
		REQ.data['category_id'] = $("#main_category_select").val();
		// console.log('REQ');
		// console.log(REQ);
		// return false;
		$.ajax({
			headers: {
				 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			},
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
			},
			error : function(jqXhr, textStatus, errorMessage){	
				console.log('Error Ajax')				
			}
		}).done(function(){
			console.log('Done Ajax')				
		});
	},update_dealer_report: function(){

		sel_dlr_count = $(".dlr_codes:checked").length;

		dlrs = [];
		$(".dlr_codes:checked").each(function(k,v){
			dlrs[k] = $(this).val();
		})

		url = APP_URL + '/api/admin/update-dlr-detail';
		REQ  =  ser_obj.req_data;

		REQ.data = {};
		REQ.data['checked_count'] = sel_dlr_count;
		REQ.data['dealers'] = dlrs;
		
		$.ajax({
			type: 'POST',
			url: url,
			headers: {'Authorization': 'Bearer '+getCookie('jwt_token')},
			data: REQ,
			dataType: "json",
			beforeSend: function(){
				$.LoadingOverlay("show");
				$("#dlr_block_action").attr("disabled", "disabled");
				$("#dlr_block_cancel").attr("disabled", "disabled");
			},
			success: function(resp_data,status,xhr){
				if(!resp_data.status){
					notify_e("Dealer not updated..Please try later !!"); 
					return 0;
				}
				notify_s(resp_data.message.success); 
				setInterval(function(){				 
					location.reload(true);
				}, 3000);
			},
			error : function(jqXhr, textStatus, errorMessage){
			}
		}).done(function(){
			$("#dlr_block_action").removeAttr("disabled", "disabled");
			$("#dlr_block_cancel").removeAttr("disabled", "disabled");
			$.LoadingOverlay("hide");
		});
	},cancel_dealer_report: function(){
		location.reload(true);
	},init : function(){
		ser_obj = this;
		// ser_obj.list_dealer();
		$("#main_category_select").change(ser_obj.get_subcategory_details);
		// $("#dlr_block_action").click(ser_obj.update_dealer_report);
		// $("#dlr_block_cancel").click(ser_obj.cancel_dealer_report);
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