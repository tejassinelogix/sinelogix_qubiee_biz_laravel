@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
<!-- All Product -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>All Orders</h1>
            </div>
        </div>
    </div>
    @if (\Session::has('errormeesag'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('errormeesag') !!}</li>
        </ul>
    </div>
    @endif
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Dashboard</a></li>
                    <li class="active">All Orders</li>
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
<!--                    <div align="center">
                        <?php //if ($usertype == 'superadmin') { ?>
                            <a href="<?php //echo url(Request::segment(1) . '/exportAllOrderExcel') ?>" class="btn btn-success">Export to Excel</a>
                        <?php //} else { ?>
                            <a href="<?php //echo url(Request::segment(1) . '/exportOrderExcel') ?>/{{$vendorId}}" class="btn btn-success">Export to Excel</a>
                        <?php //} ?>
                     </div>  -->
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <?php if ($usertype == 'superadmin') { ?>
                                        <th>Vendor Name</th>
                                    <?php } ?>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                 <!--     <th>Product Price</th>
                                     <th>Orignal Price</th>
                                     <th>Offer ID</th>-->
                                    <th>Product Reference No.</th>
                                    <th>View Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                foreach ($research as $researchdata) {
                                    ?>
                                    <tr>
                                        <td class="srNo">
                                            <?php echo $index++; ?>
                                        </td>
                                        <?php if ($usertype == 'superadmin') { ?>
                                            <td>
                                                <?php
                                                echo $researchdata->admins->name;
                                                //echo $researchdata->role_id; 
                                                ?>

                                            </td>
                                        <?php } ?>
                                        <td>
                                            <?php
                                            echo $researchdata->order_id;
                                            ?>

                                        </td>
                                        <td> 

                                            <?php
                                            echo $researchdata->product->product_name[$language];
                                            //echo $researchdata->product_id; 
                                            ?> 
                                        </td>

                                        <td> 
                                            <?php echo $researchdata->product_ref_number;
                                            ?> 
                                        </td>
                                        <td>
                                            <div class="operationsblok">
                                                <!--  <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                     <i class="fa fa-pencil"></i>
                                                 </a> -->
                                                <a href="cancelinvoice/{{$researchdata->id}}" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <!--  <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                     <i class="fa  fa-trash-o"></i>
                                                 </a> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
</div><!-- /#right-panel -->
<!-- Right Panel -->


@endsection

@section('footerSection')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function () {
    $("#example1").DataTable();
});
</script>
@endsection