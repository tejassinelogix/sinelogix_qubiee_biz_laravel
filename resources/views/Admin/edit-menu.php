
        <!-- Header-->
        <!-- All Product -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>All Menus</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Add Menus</a></li>
                            <li class="active">All Menus</li>
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
                                <strong class="card-title">All Menus</strong>
                            </div>
                            <div class="card-body card-block">
                                 <form action="<?php echo url('/mainmenu/updateinfo') ?>" method="post" >
                                    <!-- menu group 1 -->
                                    <div class="form-group row">
                                        <div class="col col-md-3"> <label for="title"> Main Menu</label></div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" class="form-control" id="title" value="Menu 1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">
                                                Sub Menus
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="title" value="Sub Menu 1" placeholder="">
                                                </div>
                                            </div>
                                       
                                    
                                        </div>


                                    </div>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated-->

        </div><!-- .content -->
        <!-- All Menus -->



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