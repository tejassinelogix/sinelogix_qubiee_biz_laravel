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
                            <h1>Add New</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                                <li><a href="<?php echo url('/admin/bannerproduct') ?>">All Products</a></li>
                                <li class="active">Update Banner</li>
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
                                    <form action="<?php echo url('/admin/updatebanner') ?>" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <?php
                                            foreach ($getProductdetails as $produc) {
                                                //$product_name = $produc->name;
                                                $product_name = json_decode($produc->name, true);
                                                 ?>
                                                <div class="form-group col-sm-6">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" class="form-control" id="title" placeholder="" value="<?php if (isset($product_name[$language])) {
                                  echo $product_name[$language];
                                            } else {
                                                                           
                                            } ?>">
                                                    <input type="hidden" name="product_id" id="product_id" value="<?php echo $produc->id; ?>">
                                                </div>
                                              
                                               
                                                <div class="form-group col-sm-6">
                                                    <label for="title">Url</label>
                                                    <input type="text" class="form-control" id="url" name="url" value="<?php echo $produc->url; ?>" placeholder="">
                                                </div>
                                                
                                                <div class="form-group col-sm-3">
                                                    <label for="file-input" class=" form-control-label">Product Banner Image
                                                    </label>
                                                    <input type="file" id="file-input" name="file-input" class="form-control-file">
                                                    <input type="hidden" name="filepath" value="<?php echo $produc->image; ?>">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="file-input" class=" form-control-label">Product Banner Image
                                                    </label>
                                                    <img src="https://qbe.demosoftwares.biz/public/images/<?php echo $produc->image; ?>" height="100px" width="100px" >
                                                </div>
                                               <div class="form-group col-md-6">
                                                        <h4>Select Section</h4> 
                                                <label>{{ __('message.Banner Slider Products') }}</label>
                                                <input type="radio" name="addvertisment" value="1" <?php echo ($produc->section==1)?'checked':'' ?> >
                                                <label>{{ __('message.addvertisment') }}</label>
                                                <input type="radio" name="addvertisment" value="2"<?php echo ($produc->section==2)?'checked':'' ?> >
                                            </div>
                                      
                                            <button type="submit" class="btn btn-primary">Upload</button>&nbsp&nbsp&nbsp&nbsp
                                            
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
        $("#Locale").on('change', function () {
            var val = $(this).val();
            $.ajax({
                type: 'get',
                url: "/locale/" + val,
                success: function (data) {
                    location.reload();
                },
                error: function () {
                }
            });
        });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#bootstrap-data-table-export').DataTable();
            });

        </script>


    </body>

</html>