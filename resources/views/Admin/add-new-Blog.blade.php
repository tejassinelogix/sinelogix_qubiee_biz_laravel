<html class="no-js" lang="">
<head>
   @include('Admin.layouts.head')
</head>
<body>
<div class="wrapper">
	@include('Admin.layouts.header')
<!-- Header-->
        <!-- Header-->
        <!-- All Product -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add New</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                            <li><a href="<?php echo url('/admin/product') ?>">Add Products</a></li>
                            <li class="active">Add New</li>
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
                                    <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="" value=" ">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="">
                                    </div>
                                       <div class="form-group col-sm-6">
                                        <label for="title">Original Price</label>
                                        <input type="text" class="form-control" id="originalprice" name="originalprice" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">Short Description</label>
                                        <input type="text" class="form-control" id="shortdescription" name="shortdescription" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">Url</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="description">Description</label>
                                        <textarea  name="description" id="description" rows="5" placeholder="" class="form-control"></textarea>
                                    </div>
                                      <div class="form-group col-sm-3">
                                      <label for="select" class=" form-control-label">Select
                                                Category</label>
                                <select  id="maincategory" name="maincategory" class="form-control">
                                      <option value="0">Please Select</option>
                                         <?php foreach ($users  as $sn) 
                                              {?>
                                 <option value="{{ $sn->category_id }}">{{ $sn->category_name }}</option>
                                              <?php }
                                             ?>
                                    </select>
                                     </div>
                                    <div class="form-group col-sm-3">
                                    <label for="select" class=" form-control-label">Select
                                                Sub Category</label>
                                <select  id="subcategory" name="subcategory" class="form-control">
                                      <option value="0">Please Select</option>
                                      <?php //foreach ($categoryall as $categoryalls) {?>
                                          <!--<option value="<?php //$categoryalls->category_id ?>"><?php  //$categoryalls->category_name ?></option>-->
                                      <?php //}?> 
                                    </select>
                                 </div>
                                      <div class="form-group col-sm-3">
                                    <label for="select" class=" form-control-label">Select
                                                Section</label>
                                <select  id="section" name="section" class="form-control">
                                      <option value="0">Please Select</option>
                                      <option value="New">New</option>
                                      <option value="Feature">Feature</option>
                                      <option value="Old">Old</option>
                                      
                                    </select>
                                 </div>
                                         <div class="form-group col-sm-3">
                                    <label for="select" class=" form-control-label">Offer</label>
                                <select  id="offer" name="offer" class="form-control">
                                      <option value="0">Please Offer</option>
                                      <option value="1">Offer 1</option>
                                      <option value="2">Offer #2</option>
                                      <option value="3">Offer #3</option>
                                    </select>
                                                </div>
                                    <div class="form-group col-sm-6">
                                        <label for="from_date">From Date </label>
                                         <input type="date" class="form-control" id="from_date" name="from_date" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="to_date">To Date </label>
                                         <input type="date" class="form-control" id="to_date" name="to_date" placeholder="">
                                    </div>
                                            
                                         <div class="form-group col-sm-6">
                                        <label for="country">Country </label>
                                         <input type="text" class="form-control" id="country" name="country" placeholder="">
                                    </div>
                                      <div class="form-group col-sm-6">
                                        <label for="title">Meta Title</label>
                                        <input type="text" class="form-control" id="metatitle" name="MetaTitle" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="metadescription">Meta Description</label>
                                        <textarea  name="MetaDescription" id="metadescription" rows="5" placeholder="" class="form-control"></textarea>

                                        <!-- <input type="text" class="form-control" id="metadescription" name="MetaDescription" placeholder=""> -->
                                    </div>
                                     <div class="form-group col-sm-6">
                                        <label for="metakeyword">Meta Keyword </label>
                                        <input type="text" class="form-control" id="metakeyword" 
                                        name="MetaKeyword" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">Product Banner Image
                                        </label>
                                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                                    </div>
                                     <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">Product Images(Add multipal images)
                                        </label>
                                        <input type="file" id="fileinputproduct" name="photos[]" class="form-control-file" multiple>
                                    </div>
                              
                                    <button type="submit" class="btn btn-primary">Upload</button>
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


</body>

</html>