
        <!-- Header-->
        <!-- All Product -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Product</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                            <!-- <li><a href="<?php //echo url('/administration/product') ?>">Up0adte Product</a></li> -->
                            <li class="active">Update Product</li>
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
                     <form action="<?php echo url('/admin/updateblog') ?>" method="post" enctype="multipart/form-data">
                         {{csrf_field()}}   
                         <div class="row">
                                  <?php foreach ($users  as $produc) 
                            {     
                                      ?>
                                    <div class="form-group col-sm-6">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="" value="<?php echo $produc->product_name; ?>">
                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $produc->id; ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="" value="<?php echo $produc->product_price; ?>">
                                    </div>
                                 <div class="form-group col-sm-6">
                                        <label for="title">Original Price</label>
                                        <input type="text" class="form-control" id="originalprice" name="originalprice" value="<?php echo $produc->original_price; ?>" placeholder="">
                                    </div>
                                     <div class="form-group col-sm-6">
                                        <label for="title">Short Description</label>
                                        <input type="text" class="form-control" id="shortdescription" name="shortdescription" value="<?php echo$produc->short_description; ?>" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">Url</label>
                                        <input type="text" value="<?php echo $produc->url; ?>" class="form-control" id="url" name="url" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="description">Description</label>
                    <textarea  name="product-description" id="description" rows="5"  placeholder="" class="form-control"  ><?php echo $produc->product_description; ?></textarea>
                                    </div>
                                     <div class="form-group col-sm-3">
                                      <label for="select" class=" form-control-label">Select
                                                Category</label>
                                <select  id="maincategory" name="maincategory" class="form-control">
                                      <option value="0">Please select</option>
                                   <?php foreach ($category_parent_id  as $sn) 
                                              { if ($sn->category_id == $produc->main_category) { ?>
                                      <option value="<?php echo $sn->category_id; ?>" selected><?php echo $sn->category_name; ?></option><?php
                                             } else{?>
                             <option value="<?php echo $sn->category_id; ?>"><?php echo$sn->category_name; ?></option>
                                                <?php } }?>
                                              
                                    </select>
                                     </div>
                                    <div class="form-group col-sm-3">
                                    <label for="select" class=" form-control-label">Select
                                                Sub Category</label>
                                <select  id="subcategory" name="subcategory" class="form-control">
                                      <option value="0">Please select</option>
                                        <?php //foreach ($subcategory  as $sn){ 
                                            foreach ($getAllsubmenuparent  as $getsubmenuparent){
                                            if ($getsubmenuparent->category_id == $produc->sub_category ) { ?>
                                      <option value="<?php echo $getsubmenuparent->category_id; ?>" selected><?php echo $getsubmenuparent->category_name; ?></option><?php
                                             } else {?>
                             <option value="<?php echo $getsubmenuparent->category_id; ?>"><?php echo $getsubmenuparent->category_name; ?></option>
                                            <?php } }//}?>
                                     
                                    </select>
                                 </div>
                                   <div class="form-group col-sm-3">
                                    <label for="select" class=" form-control-label">Select
                                                Section</label>
                                <select  id="section" name="section" class="form-control">
<!--                                      <option value="0">Please select</option>-->
                                    <option value="blog" selected="">blog</option>
                                    </select>
                                 </div>
                                    <div class="form-group col-sm-3">
                                        <label for="select" class=" form-control-label">Offer</label>
                                        <input type="text" class="form-control" value="<?php echo $produc->offer; ?>" id="offer" name="offer" placeholder="" disabled>
                                    </div>
                                    
                                    <?php 
                                        $s_date = strtotime($produc->offer_start_date);
                                        $e_date = strtotime($produc->offer_expire_date);
                                        $start_date = date("m/d/Y", $s_date);
                                        $expire_date = date("m/d/Y", $e_date);
//                                        echo $start_date;
//                                        echo $expire_date;
                                    ?>
                                  
                                     <div class="form-group col-sm-3">
                                         
                                         <div class="form-group">
                                            <label class="form-control-label">Offer Start Date</label>
                                            <div class="controls input-append date form_date" data-date="" data-date-format="dd/mm/yyyy" data-link-field="offer_start_date" data-link-format="yyyy-mm-dd">
                                                <input size="16" type="text" value="<?php echo $start_date; ?>" readonly>
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="add-on"><i class="icon-th"></i></span>
                                            </div>
                                            <input type="hidden" name="offer_start_date" id="offer_start_date" value="<?php echo $start_date; ?>" /><br/>
                                        </div>
                                         
                                         
<!--                                        <label for="offer_start_date" class=" form-control-label">Offer Start Date</label>
                                        <input type="date" class="form-control" value="<?php //echo $start_date; ?>" id="offer_start_date" name="offer_start_date" >-->
                                    </div>
                                
                                    <div class="form-group col-sm-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Offer Expire Date</label>
                                            <div class="controls input-append date form_date" data-date="" data-date-format="dd/mm/yyyy" data-link-field="offer_expire_date" data-link-format="yyyy-mm-dd">
                                                <input size="16" type="text" value="<?php echo $expire_date; ?>" readonly>
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="add-on"><i class="icon-th"></i></span>
                                            </div>
                                            <input type="hidden" name="offer_expire_date" id="offer_expire_date" value="<?php echo $expire_date; ?>" /><br/>
                                        </div>
                                        
                                        
<!--                                        <label for="offer_expire_date" class=" form-control-label">Offer Expire Date</label>
                                        <input type="date" class="form-control" value="<?php //echo $expire_date; ?>" id="offer_expire_date" name="offer_expire_date" >-->
                                    </div>
                                   
                                    <div class="form-group col-sm-6">
                                        <label for="country">Country </label>
                                         <input type="text" class="form-control" value="<?php echo $produc->country; ?>" id="country" name="country" placeholder="">
                                    </div>
                                      <div class="form-group col-sm-6">
                                        <label for="title">Meta Title</label>
                                        <input type="text" class="form-control" id="metatitle" name="MetaTitle" value="<?php echo $produc->meta_title; ?>" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="metadescription">Meta Description</label>
                <textarea name="metadescription"  id="metadescription" rows="5" placeholder="" class="form-control"><?php echo $produc->meta_description; ?></textarea>

                                        <!-- <input type="text" class="form-control" id="metadescription" name="MetaDescription" placeholder=""> -->
                                    </div>
                                     <div class="form-group col-sm-6">
                                        <label for="metakeyword">Meta Keyword </label>
                                        <input type="text" class="form-control" value="<?php echo $produc->meta_keyword; ?>" id="metakeyword " 
                                        name="MetaKeyword" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">Product Banner Image
                                        </label>
                                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                                        <input type="hidden" name="filepath" value="<?php echo $produc->product_image; ?>">
                                    </div>
                                   <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">Product front Image
                                        </label>
                                       <img src="https://xtacky.com/public/images/<?php echo $produc->product_image; ?>" height="100px" width="100px" >
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">Product slider Image(multipal image)
                                        </label>
                                        <input type="file" id="photos" name="photos[]" class="form-control-file" multiple>
                                        <?php foreach ($getProductimagedetails  as $getProductimage) 
                                        { ?> 
                                        <input type="hidden" name="filepath_product" value="<?php echo $getProductimage->images_name; ?>">
                                    <?php }?>          
                                    </div>
                                <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">Selected Product Image 
                                        </label>
                                      <?php  
                                       foreach ($getProductimagedetails  as $getProductimage) 
                                        {
                                         $lang_invitee= explode('|', $getProductimage->images_name);
                                      
                                         foreach ($lang_invitee  as $key => $value) 
                                        {    
                                          //   echo '<pre>';
//                                         print_r($value);
                                         ?>  
                                       <img src="https://xtacky.com/public/images/{{$value}}" height="100px" width="100px" >
                                        <?php } }?>   
                                </div>
                              
                                    <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                 <?php }?>
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
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });

    </script>


</body>

</html>