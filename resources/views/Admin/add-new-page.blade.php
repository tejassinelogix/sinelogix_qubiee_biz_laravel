
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
                            <li><a href="<?php echo url('/administration/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                            <li><a href="<?php echo url('/admin/allpages') ?>">{{ __('message.Add Page') }}</a></li>
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
                                <form action="<?php echo url('/admin/addpage') ?>" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                    <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="" value=" ">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Short Description') }}</label>
                                        <input type="text" class="form-control" id="shortdescription" name="shortdescription" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="title">{{ __('message.Url') }}</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="description">{{ __('message.Description') }}</label>
                                        <textarea  name="description" id="description" rows="5" placeholder="" class="form-control"></textarea>
                                    </div>
                                         <div class="form-group col-sm-6">
                                        <label for="country">{{ __('message.Country') }} </label>
                                         <input type="text" class="form-control" id="country" name="country" placeholder="">
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
                                    <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">{{ __('message.Product Banner Image') }}
                                        </label>
                                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                                    </div>
<!--                                     <div class="form-group col-sm-6">
                                        <label for="file-input" class=" form-control-label">Product Images
                                        </label>
                                        <input type="file" id="fileinputproduct" name="photos[]" class="form-control-file" multiple>
                                    </div>-->
                              
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


</body>

</html>