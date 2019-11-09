<html class="no-js" lang="">
    <head>
        @include('Admin.layouts.head')
    </head>
    <?php
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }
    ?>
    <body <?php echo $language . 'language'; ?>>
        <div class="wrapper">
            @include('Admin.layouts.header')
            <!-- Header-->
            <!-- All Product -->
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>{{ __('message.Add New') }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                                <li><a href="<?php echo url('/admin/product') ?>">{{ __('message.Add Products') }}</a></li>
                                <li class="active">{{ __('message.Add New') }}</li>
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
                                    <form action="<?php echo url('/admin/addproduct') ?>" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{$language}}" id="lang" name="lang">
                                        <p><span class="required" style="color: red">Enter all required fields marked as *</span>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Title') }}</label><span class="required" style="color: red">*</span>
                                                <input type="text" name="title" class="form-control" id="title" placeholder="" value="{{ old('title') }}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Original Price') }}</label><span class="required" style="color: red">*</span>
                                                <input type="text" class="form-control" id="originalprice" name="originalprice" value="{{ old('originalprice') }}" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Offer Discount Percentage') }}</label>
                                                <input type="text" class="form-control" id="discount" name="discount" value="{{ old('discount') }}" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Price') }}</label>
                                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="">
                                            </div>


<!--                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Short Description') }}</label><span class="required" style="color: red">*</span>
                                                <input type="text" class="form-control" id="shortdescription" name="shortdescription" value="{{ old('shortdescription') }}" placeholder="">
                                            </div>-->
                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Url') }}</label>
                                                <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="description">{{ __('message.Description') }}</label><span class="required" style="color: red">*</span>
                                                <textarea  name="description" id="description" rows="5" placeholder="" value="{{ old('description') }}" class="form-control"></textarea>
                                            </div>
                                             <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Quantity') }}</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="">
                                                 
                                            </div>
                                            <div class="form-group col-sm-6">
                                                  <label for="title">{{ __('message.Product Delivery Time') }}</label>
                                               <textarea  name="deliverytime" id="deliverytime" rows="3" placeholder="" value="{{ old('deliverytime') }}" class="form-control"></textarea>
                                             </div>
                                              <div class="form-group col-sm-6">
                                                  <label for="title">{{ __('message.Delivery Charges') }}</label>
                                                <input type="text" class="form-control" id="deliverycharges" name="deliverycharges" value="{{ old('deliverycharges') }}" placeholder="">
                                             </div>
                                            <div class="form-group col-sm-6">
                                                  <label for="title">{{ __('message.SKU') }}</label>
                                                <input type="text" class="form-control" id="productsku" name="productsku" value="{{ old('productsku') }}" placeholder="">
                                             </div>
                                             <div class="form-group col-sm-6">
                                                 <label for="description">{{ __('message.Product Specifications') }}</label>
                                                <textarea  name="prodspecifiction" id="prodspecifiction" rows="5"  value="{{ old('prodspecifiction') }}" class="form-control summernote"></textarea>
                                               
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="select" class=" form-control-label">{{ __('message.Select Category') }}</label> <span class="required" style="color: red">*</span>
                                                <select  id="maincategory" name="maincategory" class="form-control">
                                                    <option value="0">{{ __('message.Please Select') }}</option>
                                                    <?php foreach ($users as $sn) {
                                                          $cat_name = json_decode($sn->category_name, true);
                                                        ?>
                                                        <option value="{{ $sn->category_id }}"> <?php echo $cat_name[$language]; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="select" class=" form-control-label">{{ __('message.Select Sub Category') }}</label>
                                                <select  id="subcategory" name="subcategory" class="form-control">
                                                    <option value="0">{{ __('message.Please Select') }}</option>
                                                    <?php //foreach ($categoryall as $categoryalls) {?>
                                                        <!--<option value="<?php //$categoryalls->category_id   ?>"><?php //$categoryalls->category_name   ?></option>-->
                                                    <?php //}?> 
                                                </select>
                                                <p style="color: red" id="selectsubcat"></p>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="select" class=" form-control-label">{{ __('message.Select Sub Category') }}</label>
                                                <select id="sub_cat" name="sub_cat" class="form-control">
                                                    <option value="0">{{ __('message.Please Select') }}</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="select" class=" form-control-label">{{ __('message.Select Section') }}</label>
                                                <select  id="section" name="section" class="form-control">
                                                    <option value="0">{{ __('message.Please Select') }}</option>
                                                    <option value="New">{{ __('message.New') }}</option>
<!--                                                    <option value="Feature">Feature</option>
                                                    <option value="Old">Old</option>-->
                                                    <option value="banner">{{ __('message.Banner') }}</option>
                                                    <!--<option value="addones">addones</option>-->

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="select" class=" form-control-label">{{ __('message.Offer') }}</label>
                                                <select  id="offer" name="offer" class="form-control">
                                                    <option value="0">{{ __('message.Please Select') }}</option>
                                                    <option value="1">{{ __('message.Offer') }} 1</option>
                                                    <option value="2">{{ __('message.Offer') }} #2</option>
                                                    <option value="3">{{ __('message.Offer') }} #3</option>
                                                </select>
                                            </div>
<!--                                            <div class="form-group col-sm-6 input_fields_wrap">
                                                <label for="select" class=" form-control-label">{{ __('message.Addones') }}</label>
                                                <a href="" class="add_field_button">{{ __('message.Add More Fields') }}</a>
                                                <select  id="addonce0" name="addonce[0]" class="form-control">
                                                    <option value="0">{{ __('message.Please Select Addones') }}</option>
                                                    <?php //foreach ($productlist as $product) {
                                                          //$product_name = json_decode($product->product_name, true);
                                                        ?>
                                                        <option value="<?php //$product->id ?>"><?php //$product_name[$language] ?></option>
                                                    <?php //}
                                                    ?>
                                                </select>
                                            </div>-->
<!--                                            <div class="form-group col-sm-6">
                                                <label for="from_date">{{ __('message.From Date') }} </label>
                                                <input type="date" class="form-control" id="from_date" value="{{ old('from_date') }}" name="from_date" placeholder="">
                                            </div>-->
<!--                                            <div class="form-group col-sm-6">
                                                <label for="to_date">{{ __('message.To Date') }} </label>
                                                <input type="date" class="form-control" id="to_date" value="{{ old('to_date') }}" name="to_date" placeholder="">
                                            </div>-->

                                            <div class="form-group col-sm-6">
                                                <label for="country">{{ __('message.Country') }} </label>
                                                <input type="text" class="form-control" id="country" value="{{ old('country') }}" name="country" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Meta Title') }}</label><span class="required" style="color: red">*</span>
                                                <input type="text" class="form-control" id="metatitle" value="{{ old('MetaTitle') }}" name="MetaTitle" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="metadescription">{{ __('message.Meta Description') }}</label><span class="required" style="color: red">*</span>
                                                <textarea  name="MetaDescription" id="metadescription" value="{{ old('MetaDescription') }}" rows="5" placeholder="" class="form-control"></textarea>

                                        <!-- <input type="text" class="form-control" id="metadescription" name="MetaDescription" placeholder=""> -->
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="metakeyword">{{ __('message.Meta Keyword') }} </label><span class="required" style="color: red">*</span>
                                                <input type="text" class="form-control" id="metakeyword" value="{{ old('MetaKeyword') }}"
                                                       name="MetaKeyword" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <img id="blah1" />
                                                <label for="file-input" class=" form-control-label">{{ __('message.Product Banner Image') }}
                                                </label><span class="required" style="color: red">*</span>
                                                <input type="file" id="file-input" name="file-input" class="form-control-file" onchange="readURL1(this);">
                                            </div>
<!--                                            <div class="form-group col-sm-6">
                                                <label for="file-zip" class=" form-control-label">{{ __('message.Product Download') }}
                                                </label>
                                                <input type="file" id="file-input" name="file-zip" class="form-control-file">
                                            </div>-->
                                            <div class="gallery"></div>
                                            <div class="form-group col-sm-6">
                                                <label for="file-input" class=" form-control-label">{{ __('message.Product Images(Add multipal images)') }}
                                                </label><span class="required" style="color: red">*</span>
                                                <input type="file" id="fileinputproduct" name="photos[]" class="form-control-file" multiple>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>{{ __('message.Customization') }}</label>
                                                <input type="checkbox" name="customization"id="customization" class="customization" value="1" > <label id="giftwrapavail"></label>
                                            </div> 
                                            <?php $usertype = (Auth::user()->job_title);
                                             if($usertype=='superadmin'){ ?>
                                                 <div class="form-group col-md-6">
                                                <label>{{ __('message.Gift Wrapping') }}</label>
                                                <input type="checkbox" name="gift_wrapping" value="1" >
                                            </div>
                                             <?php } ?>
<!--                                            <div class="form-group col-md-6">
                                                <label>{{ __('message.addvertisment') }}</label>
                                                <input type="checkbox" name="addvertisment" value="1" >
                                            </div>-->
                                            
                                            <button type="submit" class="btn btn-primary" id="addprodsubmit">{{ __('message.Upload') }}</button>
                                        </div>
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
        <script src="{{ asset('/admin/assets/js/main.js')}}"></script>

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
        <script src="{{ asset('/admin/assets/dist/summernote-bs4.js')}}"></script>
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
    $('#bootstrap-data-table-export').DataTable();


    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID
    var cnt = 1;
    var x = 1; //initlal text box count
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
            $(wrapper).append('<div><select class="form-control"  id="addonce' + cnt + '" name="addonce[' + cnt + ']"><option>Please Select addonec</option>' + regClient + '</select><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
        cnt++;
    });

    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
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