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
        <!-- All Product -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>All Products</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                            <li><a href="<?php echo url('/admin/createblog') ?>">Add Blogs</a></li>
                            <li class="active">All Blogs</li>
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
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                                 $cntr = 0;
                                     foreach ($users as $user)
                                     {     $cntr++; ?>
                                         <tr>
                                            <td class="srNo">
                                              <?php echo $cntr ; //echo $user->product_id ;?>
                                            </td>
                                            <td>
                                               {{ $user->product_name }}
                                            </td>
                                            <td>{{ $user->createdOn }} </td>
                                            <td>
                                                <div class="operationsblok">
                                                    <a href="/admin/showblog/{{ $user->id }}"  title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                  <!--   <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a> -->
                                                    <a href="deleteblog/{{ $user->id }}" id="productdelete" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure to Delete Products?');">
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                           <?php } ?>
                                      <!--    <tr>
                                           <td class="srNo">
                                                2.
                                            </td>
                                            <td>
                                                forem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </td>
                                            <td>2018-09-03 </td>
                                            <td>
                                                <div class="operationsblok">
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="srNo">
                                                3.
                                            </td>
                                            <td>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </td>
                                            <td>2018-09-03 </td>
                                            <td>
                                                <div class="operationsblok">
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="srNo">
                                                4.
                                            </td>
                                            <td>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </td>
                                            <td>2018-09-03 </td>
                                            <td>
                                                <div class="operationsblok">
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="srNo">
                                                5.
                                            </td>
                                            <td>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </td>
                                            <td>2018-09-03 </td>
                                            <td>
                                                <div class="operationsblok">
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="srNo">
                                                6.
                                            </td>
                                            <td>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </td>
                                            <td>2018-09-03 </td>
                                            <td>
                                                <div class="operationsblok">
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="srNo">
                                                7.
                                            </td>
                                            <td>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </td>
                                            <td>2018-09-03 </td>
                                            <td>
                                                <div class="operationsblok">
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="srNo">
                                                8.
                                            </td>
                                            <td>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </td>
                                            <td>2018-09-03 </td>
                                            <td>
                                                <div class="operationsblok">
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="srNo">
                                                9.
                                            </td>
                                            <td>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </td>
                                            <td>2018-09-03 </td>
                                            <td>
                                                <div class="operationsblok">
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
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