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
		var url_app = '/admin/get_subcategory_details';
		// var url_app = '/admin_2/get_subcategory_details';
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
		var url_app = '/admin/get_products_details';
		// var url_app = '/admin_2/get_products_details';
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

	$('.all_order_chk').on('change', function(){

		$('input:checkbox').not(this).prop('checked', this.checked);		
	});

		$('#productapprove').on('click', function(){
			console.log('productapprove');
		// 	var sThisVal = [];
		// 	$('.order_chk').each(function () {
		// 		var sThisVal = sThisVal.push(this.checked ? $(this).val() : "");
		//    });
		//    console.log('productapprove');
		//    console.log(sThisVal);
		});

			// dis approve orders
			$(document).on('click', '#orderdisapprove_check', function() {
				
				confirm('Are you sure you want to Disapprove this product ?')
				var url_app = '/admin/disapprovemultiorder';
				// var url_app = '/admin_2/disapprovemultiorder';

				var check_box_details = [];
				$.each($("input[name='order_chk']:checked"), function(){
					check_box_details.push($(this).val());
				});

				if(check_box_details.length === 0){
					swal("Error!", "Please select checkbox first..!", "error");
					return 0;
				}
					

				$.ajax({
					type: 'POST', // Default GET
					url: url_app,
					data: {"_token": $('#token').val(),'order_ids': check_box_details},
					dataType: 'json', // text , XML, HTML
					beforeSend: function(){ // Before ajax send operation 
					console.log('Before ajax send');   
					// var parse_obj = JSON.parse(); 
					},
					success: function(data_resp, textStatus, jqXHR) { // On ajax success operation
						if(data_resp.status){
							swal("Success!", "Orders are Disapproved successfully..!", "success");
						}else{
							swal("Error!", "Products are not Disapproved..!", "error");
						}
						location.reload(true);
						return 0;
					},error: function (jqXHR, textStatus, errorThrown) { // On ajax error operation 
					//    console.log(textStatus, errorThrown);        
					},complete: function() { // On ajax complete operation    
					//    console.log('Complete ajax send');
					}
					});

			});

			// approve multie order
			$(document).on('click', '#orderapprove_check', function() {
				
				confirm('Are you sure you want to Approve this product ?')
				var url_app = '/admin/approvorder_multi';
				// var url_app = '/admin_2/approvorder_multi';

				var check_box_details = [];
				$.each($("input[name='order_chk']:checked"), function(){
					check_box_details.push($(this).val());
				});

				if(check_box_details.length === 0){
					swal("Error!", "Please select checkbox first..!", "error");
					return 0;
				}
					

				$.ajax({
					type: 'POST', // Default GET
					url: url_app,
					data: {"_token": $('#token').val(),'order_ids': check_box_details},
					dataType: 'json', // text , XML, HTML
					beforeSend: function(){ // Before ajax send operation 
					// console.log('Before ajax send');   
					// var parse_obj = JSON.parse(); 
					},
					success: function(data_resp, textStatus, jqXHR) { // On ajax success operation
						if(data_resp.status){
							swal("Success!", "Orders are approved successfully..!", "success");
						}else{
							swal("Error!", "Orders are not approved..!", "error");
						}
						location.reload(true);
						return 0;
					},error: function (jqXHR, textStatus, errorThrown) { // On ajax error operation 
					//    console.log(textStatus, errorThrown);        
					},complete: function() { // On ajax complete operation    
					//    console.log('Complete ajax send');
					}
					});

			});

	// ("#productapprove").anchor
