<html class="no-js" lang="">
    <head>
        @include('Admin.layouts.head')
    </head>
    <body>
        <div class="wrapper">
            @include('Admin.layouts.header')
            <!-- All Product -->
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>{{ __('message.All Banner Products') }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                                <li><a href="<?php echo url('/admin/createbannerproduct') ?>">{{ __('message.Add Banner Products') }}</a></li>
                                <li class="active">{{ __('message.All Products') }}</li>
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
                                    <strong class="card-title">{{ __('message.All Banner Products') }}</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><center>{{ __('message.Sr. No') }}</center></th>
                                                <th><center>{{ __('message.Title') }}</center></th>
                                                <th><center>{{ __('message.Date') }}</center></th>
                                                 <th>Section</th>
                                                 <th>Approval Status</th>
                                                <th><center>{{ __('message.Operations') }}</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cntr = 0;
                                            foreach ($users as $user) {
                                            
                                                $cntr++;
                                                $product_name = $user->name;
                                               $product_status = $user->status;
                                              
                                                ?>
                                                <tr>
                                                    <td class="srNo">
                                                        <?php echo $cntr; //$user->product_id  ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $user->name['en']; ?>
                                                    </td>
                                                    <td>{{ $user->created_at }} 
                                                    </td>
                                                        <td> 
                                                <?php if ($user->section == 1) { ?>
                                         Bannersliser 
                                                <?php } else { ?>
                                         Advertisment 
                                                <?php }
                                                ?>

                                            </td>
                                                     <td> 
                                                <?php if ($user->status == 1) { ?>
                                        <span class="badge badge-success">Activted</span>
                                                <?php } else { ?>
                                         <span class="badge badge-danger">Diactivated </span>
                                                <?php }
                                                ?>

                                            </td>
                                                    
                                                  <td>
                                                <div class="operationsblok">
                                                <a href="/admin/showbanner/{{ $user->id }}" data-toggle="tooltip"  title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                  
                                                <?php
                                                if($product_status == 1) { ?>
                                                <a href="deletebannerproduct/{{ $user->id }}" id="productapprove" data-toggle="tooltip" title="Not Approved" onclick="return confirm('Are you sure to Not Approved Products?');">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                     
                                                <?php } else {
                                                      $usertype = (Auth::user()->job_title);
                                             if($usertype=='superadmin'){ ?>
                                                      
                                             <a href="approvbannproduct/{{ $user->id }}" id="productapprove" data-toggle="tooltip" title="Approved" onclick="return confirm('Are you sure to Approved Products?');">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                             <?php } else { ?>
                                            <a href="#" id="productapprove" data-toggle="tooltip" title="Disapproved">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                               <!--<span class="badge badge-success">Only <br>Superadmin <br>Can<br> Approved</span>-->
                                              
                                                <?php } }   
                                                ?>
                                               <a href="{{$user->url }}" target="_blank"> <i class="fa fa-eye"></i></a>
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