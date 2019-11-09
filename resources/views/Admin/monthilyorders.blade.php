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
                    <div align="center">
                        <a href="#" id="monthilyorderExcel" class="btn btn-success">Export to Excel</a>
                              <!--<a href="../admin/exportOrderPdf/" class="btn btn-primary">Export To Pdf</a>-->

                    </div>
                    <form id="monthilyordrs" method="POST">
                            <div class="form-group col-sm-6">
                                        <label for="from_date">From Date </label>
                                        <input type="date" class="form-control" id="from_date_order" name="fromdate" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="to_date">To Date </label>
                                        <input type="date" class="form-control" id="to_date_order" name="todate" placeholder="">
                                    </div>
                     <div class="form-group col-sm-12">
                         <input name="submit" id="submitmothorders" class="btn btn-primary" type="submit" value="Submit">             
                     </div>
                     
                </form>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered mothilyOrdrInfo">
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