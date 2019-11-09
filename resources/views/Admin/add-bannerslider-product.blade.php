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
                            <h1>{{ __('message.Add New') }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                                <li><a href="<?php echo url('/admin/bannerproduct') ?>">{{ __('message.All Banner Products') }}</a></li>
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
                                    <form action="<?php echo url('/admin/addbannerproduct') ?>" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Title') }}</label>
                                                <input type="text" name="title" class="form-control" id="title" placeholder="" value="{{ old('title') }}">
                                            </div>
                                           
                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Url') }}</label>
                                                <input type="text" class="form-control" id="url" name="url" placeholder="" value="{{ old('url') }}">
                                            </div>
                                             
                                            <div class="form-group col-sm-6">
                                                <img id="blah" />
                                                <label for="file-input" class=" form-control-label">{{ __('message.Product Banner Image') }}
                                                </label>
                                                <input type="file" id="file-input" name="file-input" class="form-control-file" onchange="readURL(this);">
                                            </div>
                                            <div class="form-group col-md-6">
                                                        <h4>Select Section</h4> 
                                                <label>{{ __('message.Banner Slider Products') }}</label>
                                                <input type="radio" name="addvertisment" value="1" >
                                                <label>{{ __('message.addvertisment') }}</label>
                                                <input type="radio" name="addvertisment" value="2" >
                                            </div>
                                             
                                            <div class="gallery"></div>
                                            
                                            <div class="form-group col-sm-12">
                                            <button type="submit" class="btn btn-primary">{{ __('message.Upload') }}</button>
                                           </div>
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