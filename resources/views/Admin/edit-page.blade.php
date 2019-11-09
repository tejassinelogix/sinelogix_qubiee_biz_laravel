
        <!-- Header-->
        <!-- All Product -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Upadte Page</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo url('/administration/index') ?>">Dashboard</a></li>
                            <!-- <li><a href="<?php //echo url('/administration/product') ?>">Upadte Product</a></li> -->
                            <li class="active">Upadte Page</li>
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
                     <form action="<?php echo url('/admin/updatepageinfo') ?>" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}   
                         <div class="row">
                                     <div class="form-group col-sm-6">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="" value="<?php echo $pagesedit[0]->page_name; ?>">
                                    <input type="hidden" name="page_id" id="page_id" value="<?php echo $pagesedit[0]->page_id; ?>">
                                     </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">Short Description</label>
                                        <input type="text" class="form-control" value="<?php echo $pagesedit[0]->short_description	; ?>" id="shortdescription" name="shortdescription" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">Url</label>
                                        <input type="text" class="form-control" id="url" name="url" value="<?php echo $pagesedit[0]->url; ?>" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="description">Description</label>
                                        <textarea  name="description" id="description" rows="5" placeholder="" class="form-control"><?php echo $pagesedit[0]->page_description; ?></textarea>
                                    </div>
                                         <div class="form-group col-sm-6">
                                        <label for="country">Country </label>
                                        <input type="text" class="form-control" value="<?php echo $pagesedit[0]->country; ?>" id="country" name="country" placeholder="">
                                    </div>
                                      <div class="form-group col-sm-6">
                                        <label for="title">Meta Title</label>
                                        <input type="text" class="form-control" value="<?php echo $pagesedit[0]->meta_title; ?>" id="metatitle" name="MetaTitle" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="metadescription">Meta Description</label>
                                        <textarea  name="MetaDescription" id="metadescription" rows="5" placeholder="" class="form-control"><?php echo $pagesedit[0]->meta_description; ?></textarea>

                                        <!-- <input type="text" class="form-control" id="metadescription" name="MetaDescription" placeholder=""> -->
                                    </div>
                                     <div class="form-group col-sm-6">
                                        <label for="metakeyword">Meta Keyword </label>
                                        <input type="text" class="form-control" id="metakeyword" 
                                               name="MetaKeyword" placeholder="" value="<?php echo $pagesedit[0]->meta_keyword; ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">Product Banner Image
                                        </label>
                                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                                        <input type="hidden" name="filepath" value="<?php echo $pagesedit[0]->page_image; ?>">
                                    </div>
<!--                                     <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">Product Images
                                        </label>
                                        <input type="file" id="fileinputproduct" name="photos[]" class="form-control-file" multiple>
                                    </div>-->
                              
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


    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });

    </script>


</body>

</html>