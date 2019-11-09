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
<!--            <div class="page-title">
                <h1>{{ __('message.Add New Category') }}</h1>
            </div>-->
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                    <li><a href="<?php echo url('/admin/menu') ?>">{{ __('message.Add Category') }}</a></li>
                    <li class="active">{{ __('message.Add New Category') }}</li>
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
                    <div class="card-header">
                        <strong class="card-title">{{ __('message.Main Category') }} </strong>
                    </div>
                    <div class="card-body card-block">
                        <form  action="{{ url('/admin/addmenu') }}" method="post" enctype="multipart/form-data">
                             {{csrf_field()}}
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
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class=""> <label for="title">{{ __('message.Title') }} </label></div>
                                    <div class="">  
                                        <input type="text" class="form-control" id="title"  name="title" placeholder=""></div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="title">{{ __('message.Meta Title') }}</label>
                                    <input type="text" class="form-control" id="metatitle" name="MetaTitle" placeholder="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="metadescription">{{ __('message.Meta Description') }}</label>
                                    <textarea  name="MetaDescription" id="metadescription" rows="5" placeholder="" class="form-control"></textarea>

                                        <!-- <input type="text" class="form-control" id="metadescription" name="MetaDescription" placeholder=""> -->
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="metakeyword">{{ __('message.Meta Keyword') }} </label>
                                    <input type="text" class="form-control" id="metakeyword" 
                                           name="MetaKeyword" placeholder="">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <div class="col col-md-12"> <label for="file-input" class=" form-control-label">{{ __('message.Category Image') }}
                                                
                                            </label></div>
                                        <div class="col-12 col-md-12"> 
                                            <input type="file" id="file-input" name="file-input"
                                                   class="form-control-file"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">{{ __('message.Upload') }}</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated 1-->
    <div class="animated fadeIn  mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{ __('message.Sub Category') }} </strong>
                    </div>
                    <div class="card-body card-block">
                        <form  action="{{ url('/admin/addsubmenu') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @if (\Session::has('success-sub-menu'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success-sub-menu') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class=""><label for="select" class=" form-control-label">
                                            {{ __('message.Select Main Category') }} </label></div>
                             
                                <div class="">
                                    <select  id="maincategory" name="maincategory" class="form-control">
                                        <option value="0">{{ __('message.Please select') }}</option>
                                     <?php foreach ($users  as $sn) 
                                        {
                                    $category_name = json_decode($sn->category_name, true);
                                         ?>
                                        <option value="{{ $sn->category_id }}"><?php echo $category_name[$language]; ?></option>
                                       <?php }
                                      ?>
                                        <!--  <option value="1">Menu #1</option>
                                         <option value="2">Menu #2</option>
                                         <option value="3">Menu #3</option> -->
                                    </select>
                                </div>
                                       </div>
                   
                                <div class="col-sm-6">
                                <div class=" "> <label for="title">{{ __('message.Sub Category Title') }} </label></div>
                                <div class=""> 
                                    <input type="text" name="subcategory" class="form-control" id="subcategory"
                                           placeholder=""></div>
                                </div>
 
                            <div class=" col-sm-6">
                                <label for="title">{{ __('message.Meta Title') }}</label>
                                <input type="text" class="form-control" id="metatitle" name="MetaTitle" placeholder="">
                            </div>
                                  <div class="form-group col-sm-6">
                                <label for="metakeyword">{{ __('message.Meta Keyword') }} </label>
                                <input type="text" class="form-control" id="metakeyword" 
                                       name="MetaKeyword" placeholder="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="metadescription">{{ __('message.Meta Description') }}</label>
                                <textarea  name="MetaDescription" id="metadescription" rows="5" placeholder="" class="form-control"></textarea>

                                        <!-- <input type="text" class="form-control" id="metadescription" name="MetaDescription" placeholder=""> -->
                            </div>
                            <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-primary">{{ __('message.Upload') }}</button>
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


<script type="text/javascript">
$(document).ready(function () {
    $('#bootstrap-data-table-export').DataTable();
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
</body>

</html>