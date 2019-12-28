<html class="no-js" lang="">
<head>
   @include('Admin.layouts.head')
</head>
<body>
<div class="wrapper">
	@include('Admin.layouts.header')
<!-- Header-->
<!-- All Product -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{ __('message.Update Product') }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                    <!-- <li><a href="<?php //echo url('/administration/product')      ?>">Up0adte Product</a></li> -->
                    <li class="active">{{ __('message.Update Product') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body card-block">
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
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
                        <form action="<?php echo url('/admin/updateproduct') ?>" method="post" enctype="multipart/form-data">
                             
                            <input type="hidden" name="_token" id="csrf-token" value='{{csrf_token()}}' />
                            <p><span class="required" style="color: red">Enter all required fields marked as *</span>
                            <div class="row">
                                <?php
                                foreach ($users as $produc) {
                                   
                                  
                                    $product_name = json_decode($produc->product_name, true);
                                  $product_description = json_decode($produc->product_description, true);
                                  $short_description = json_decode($produc->short_description, true);
                                   $productspecification= $produc->product_specification;
                                   $deliverytime= $produc->deliverytime;
                                   $dilverycharges= $produc->dilverycharges;
                                    $sku= $produc->sku;
                                    
                                   $meta_title = json_decode($produc->meta_title, true);
                                   $meta_description = json_decode($produc->meta_description, true);
                                   $meta_keyword = json_decode($produc->meta_keyword, true);
                                  ?>
                                    <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Title') }}</label><span class="required" style="color: red">*</span>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="" value="<?php if(isset( $product_name[$language] )){ echo $product_name[$language];}  else {} ?>">
                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $produc->id; ?>">
										
									</div>
                                    
                                   <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Original Price') }}</label><span class="required" style="color: red">*</span>
                                        <input type="text" class="form-control" id="originalprice" name="originalprice" value="<?php echo $produc->original_price; ?>" placeholder="">
                                    </div>
                                 <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Offer Discount Percentage') }}</label>
                                                <input type="text" class="form-control" id="discount" name="discount" value="<?php echo $produc->discount; ?>" placeholder="">
                                            </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Price') }}</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="" value="<?php echo $produc->product_price; ?>">
                                    </div>
                                    
<!--                                    <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Short Description') }}</label><span class="required" style="color: red">*</span>
                                        <input type="text" class="form-control" id="shortdescription" name="shortdescription" value="<?php //if(isset( $short_description[$language] )){ echo $short_description[$language];}  else {} ?>" placeholder="">
                                    </div>-->
                                
                                    <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Url') }}</label>
                                        <input type="text" value="<?php echo $produc->url; ?>" class="form-control" id="url" name="url" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="description">{{ __('message.Description') }}</label><span class="required" style="color: red">*</span>
                                        <textarea  name="product-description" id="description" rows="5"  placeholder="" class="form-control"  ><?php if(isset( $product_description[$language] )){ echo $product_description[$language];}  else {}  ?></textarea>
                                    </div>
                                <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Product Delivery Time') }}</label>
                                        <textarea  name="deliverytime" id="deliverytime" rows="3"  placeholder="" class="form-control"  ><?php
                                            if (isset($deliverytime)) {
                                                echo $deliverytime;
                                            } else {
                                                
                                            }
                                            ?></textarea>

                                    </div>
                                 <div class="form-group col-sm-6">
                                                  <label for="title">{{ __('message.Delivery Charges') }}</label>
                                                <input type="text" class="form-control" id="deliverycharges" name="deliverycharges" value="<?php if(isset($dilverycharges)){ echo $dilverycharges ; }  else {}  ?>" placeholder="">
                                             </div>
                                <div class="form-group col-sm-6">
                                                  <label for="title">{{ __('message.SKU') }}</label>
                                                <input type="text" class="form-control" id="productsku" name="productsku" value="<?php if(isset($sku)){ echo $sku; }  else {}  ?>" placeholder="">
                                             </div>
                                <div class="form-group col-sm-6">
                                                 <label for="description">{{ __('message.Product Specifications') }}</label>
                                                <textarea  name="prodspecifiction" id="prodspecifiction" rows="5"  value="{{ old('prodspecifiction') }}" class="form-control summernote"><?php if(isset( $productspecification )){ echo $productspecification;}  else {}  ?></textarea>
                                               
                                            </div>

                                <div class="form-group col-sm-6 input_fields_wrap" style="display:none">
                                        <label for="select" class="form-control-label">{{ __('message.Addones') }}</label>
                                        <a href="" class="add_field_button">{{ __('message.Add More Fields') }}</a>
                                        <?php
                                        $cnt = 0;
                                        foreach ($product_addonce as $pro_addonce) {
                                            ?>
                                            <div>
                                                <select class="form-control" id="addonce{{ $cnt }}" name="addonce[]">
                                                    <option value="{{ $pro_addonce->id }}">{{ $pro_addonce->product_name }}</option>
                                                </select>
                                                <a href="#" class="remove_field" data-id="{{ $pro_addonce->addonce_id }}">{{ __('message.Remove') }}</a>
                                            </div>
                                        <?php $cnt++;
                                    } ?>
                                    </div>
                                    <!-- TDS category & sub category-->
                                    <div class="form-group col-sm-3"> 
                                    <div class="main_category_form">
                                        <select id="main_category_select" name="main_category_select" class="form-control">
                                          <option value="0">{{ __('message.Select Category') }}</option>
                                          <?php 
                                          if(isset($category_parent_id) && !empty($category_parent_id)){
                                          foreach($category_parent_id as $key => $main_cat) { 
                                            $cat_name = json_decode($main_cat->category_name, true);
                                            $cat_name_display = (isset($language) && $language == 'en')?$cat_name['en']:$cat_name['ar'];
                                            //dd($cat_name);
                                            ?>                                            
                                            <option value="<?php echo $main_cat->category_id; ?>" <?php echo (isset($produc->main_category,$main_cat->category_id) && $produc->main_category == $main_cat->category_id)?'selected':''; ?>><?php echo $cat_name_display; ?></option>
                                           
                                         
                                            <?php } } else { ?>
                                              <option value="0">{{ __('message.No Category Found') }}</option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="main_category_hidden" id="main_category_hidden" value="{{ $produc->main_category }}">
                                    </div>
                                    </div>
                                    <div class="form-group col-sm-3">        
                                    <div class="sub_category_form">
                                        <select id="sub_category_select" name="sub_category_select" class="form-control">
                                          <option value="0">{{ __('message.Select Sub-Category') }}</option>
                                        </select>
                                        <input type="hidden" name="sub_category_hidden" id="sub_category_hidden" value="{{ $produc->sub_category }}">                                       
                                    </div> 
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="select" class=" form-control-label">{{ __('message.Select Section') }}</label>
                                        <select  id="section" name="section" class="form-control">
                                            <option value="0">{{ __('message.Please select') }}</option>
                                            <?php if ($produc->section == "New") { ?>
                                                <option value="New" selected>{{ __('message.New') }}</option>
                                                <option value="Feature">{{ __('message.Feature') }}</option>
                                                <option value="Old">{{ __('message.Old') }}</option>
                                            <?php } else if ($produc->section == "Feature") { ?>
                                                <option value="New">{{ __('message.New') }}</option>
                                                <option value="Feature" selected>{{ __('message.Feature') }}</option>
                                                <option value="Old">{{ __('message.Old') }}</option>
                                            <?php } else if ($produc->section == "Old") { ?>
                                                <option value="New">{{ __('message.New') }}</option>
                                                <option value="Feature">{{ __('message.Feature') }}</option>
                                                <option value="Old" selected>{{ __('message.Old') }}</option>
    <?php } else { ?>
                                                <option value="New">{{ __('message.New') }}</option>
                                                <option value="Feature">{{ __('message.Feature') }}</option>
                                                <option value="Old">{{ __('message.Old') }}</option>
    <?php }
    ?>
                                        </select>
                                    </div>
									
                                    <div class="form-group col-sm-3">
                                        <label for="select" class=" form-control-label">{{ __('message.Offer') }}</label>
                                        <input type="text" class="form-control" value="<?php echo $produc->offer; ?>" id="offer" name="offer" placeholder="" disabled>
                                    </div>

                                   


<!--                                    <div class="form-group col-sm-6">
                                        <label for="country">{{ __('message.Country') }} </label>
                                        <input type="text" class="form-control" value="<?php //echo $produc->country; ?>" id="country" name="country" placeholder="">
                                    </div>-->
                                    <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Meta Title') }}</label>
                                        <input type="text" class="form-control" id="metatitle" name="MetaTitle" value="<?php if(isset( $meta_title[$language] )){ echo $meta_title[$language];}  else {} ?>" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="metadescription">{{ __('message.Meta Description') }}</label>
                                        <textarea name="metadescription"  id="metadescription" rows="5" placeholder="" class="form-control"><?php if(isset( $meta_description[$language] )){ echo $meta_description[$language];}  else {} ?></textarea>

                                                            <!-- <input type="text" class="form-control" id="metadescription" name="MetaDescription" placeholder=""> -->
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="metakeyword">{{ __('message.Meta Keyword') }} </label>
                                        <input type="text" class="form-control" value="<?php if(isset( $meta_keyword[$language] )){ echo $meta_keyword[$language];}  else {} ?>" id="metakeyword " 
                                               name="MetaKeyword" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">{{ __('message.Product Banner Image') }}
                                        </label>
                                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                                        <input type="hidden" name="filepath" value="<?php echo $produc->product_image; ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">{{ __('message.Selected Product Image') }}
                                        </label>
                                        <img src="https://qbe.demosoftwares.biz/public/images/<?php echo $produc->product_image; ?>" height="100px" width="100px" >
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">{{ __('message.Product Images(Add multipal images)') }}
                                        </label>
                                        <input type="file" id="photos" name="photos[]" class="form-control-file" multiple>
                                        <?php foreach ($getProductimagedetails as $getProductimage) {
                                            ?> 
                                            <input type="hidden" name="filepath_product" value="<?php echo $getProductimage->images_name; ?>">
                                        <?php } ?>          
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">{{ __('message.Selected Product Image') }} 
                                        </label>
                                        <?php
                                        foreach ($getProductimagedetails as $getProductimage) {
                                            $lang_invitee = explode('|', $getProductimage->images_name);
                                            foreach ($lang_invitee as $key => $value) {
                                                //   echo '<pre>';
//                                         print_r($value);
                                                ?>  
                                                <img src="https://qbe.demosoftwares.biz/public/images/{{$value}}" height="100px" width="100px" >
        <?php }
    } ?>                                    </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ __('message.Customization') }}</label>
                                                <?php
                                                if($produc->custmization==1) { ?>
                                                    <input type="checkbox" checked="checked" name="customization" value="<?php echo $produc->custmization; ?>" >
                                                <?php }  else { ?>
                                            <input type="checkbox" name="customization" value="1">
                                                   <?php } ?>
                                            </div> 
                                <?php $usertype = (Auth::user()->job_title);
                                             if($usertype=='superadmin'){ ?>
                                           <div class="form-group col-md-6">
                                                <label>{{ __('message.Gift Wrapping') }}</label>
                                                <!--<input type="checkbox" name="gift_wrapping" value="1" >-->
                                                 <?php
                                                if($produc->gift_wrapping==1) { ?>
                                                    <input type="checkbox" checked="checked" name="gift_wrapping" value="<?php echo $produc->gift_wrapping; ?>" >
                                                        <?php }  else { ?>
                                                    <input type="checkbox" name="gift_wrapping" value="1">
                                                           <?php } ?>
                                            </div>
                                           
                                            
                                
                                   <?php } ?>
                                   
                                <button type="submit" class="btn btn-primary">{{ __('message.Save') }} </button>&nbsp&nbsp&nbsp&nbsp
                                    <a href="<?php echo url('/productdetails'); ?>/{{$produc->url }}" class="btn btn-success headingFull" target="_blank"> View Product <i class="fa fa-eye"></i></a>
                                    </div>
<?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!-- All Product -->

</div><!-- /#right-panel -->

<!-- Right Panel -->
<script type="text/javascript" src="{{ URL::asset('/js/view_edit_product_service.js') }}"></script> 
<script src="{{ asset('/admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{ asset('/admin/assets/js/plugins.js')}}"></script>
<script src="{{ asset('admin/assets/js/main.js')}}"></script>

<!-- data table js -->
<script src="{{ asset('/admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/datatables-init.js')}}"></script>
<script src="{{ asset('/admin/assets/datepicker/bootstrap-datetimepicker.js')}}"></script>

<script src="{{ asset('/admin/assets/datepicker/jquery-1.8.3.min.js')}}"></script>
<script src="{{ asset('/admin/assets/datepicker/bootstrap.min.js')}}"></script>
<script src="{{ asset('/admin/assets/datepicker/bootstrap-datetimepicker.js')}}"></script>
<script src="{{ asset('/admin/assets/datepicker/bootstrap-datetimepicker.fr.js')}}"></script>
<script src="{{ asset('/admin/assets/dist/summernote-bs4.js')}}"></script>
<script type="text/javascript">
$('.form_datetime').datetimepicker({
    //language:  'fr',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
});
$('.form_date').datetimepicker({
    language: 'fr',
    weekStart: 1,
    startDate: '-0d',
    changeMonth: true,
    autoclose: true,
    todayBtn: 1,
    autoclose: 1,
            todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
});
$('.form_time').datetimepicker({
    language: 'fr',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
});
</script>
<script type="text/javascript">
    $("#Locale").on('change', function(){
         var val = $(this).val();   
         $.ajax({
            type:'get',
            url:"/locale/"+val,
            success:function(data){
                location.reload();
                },
            error:function(){
            }
        });
    }); 
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var cnt = <?php echo $cnt; ?>;
        var x = <?php echo $cnt; ?>; //initlal text box count
        var regdClients = <?php echo json_encode($productlist); ?>;
        $(add_button).click(function (e) { //on add input button click
            //alert(regdClients);
            var i = 0;
            var regClient = "";
            for (i = 0; i < regdClients.length; i++) {
                //alert(regdClients[i].wedding_title);
                regClient += '<option value="' + regdClients[i].id + '">' + regdClients[i].product_name + '</option>';
            }
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><select class="form-control"  id="addonce' + cnt + '" name="addonce[]"><option>Please Select addonec</option>' + regClient + '</select><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
            cnt++;
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            var id = $(this).attr('data-id');
            if (confirm('Are you sure want to delete?')) {
            //alert(id);
            var APP_URL = {!! json_encode(url('/')) !!}
            //alert (APP_URL);
            $.ajax({
                method: 'get',
                dataType: 'json',
                url: APP_URL + '/admin/addonce',
                data: {'addon_id': id},
                success: function (response) {
                    alert("Removed Successfully");
                },
                error: function (e) {
                    alert("Removed Failed");
                }
            });
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
            }
            else{
            e.preventDefault();
        }
        })
         $('.summernote').summernote({
        height: 82,
        width:400,
        placeholder:'Product Specifications'
        //tabsize: 2
      });
    });

</script>
</body>
</html>
