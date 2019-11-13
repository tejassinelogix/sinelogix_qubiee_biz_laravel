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
                <h1>All Discount Voucher</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                    <!--<li><a href="<?php //echo url('/admin/createproduct')  ?>">Add User</a></li>-->
                    <li class="active">All Discount</li>
                </ol>
            </div>
        </div>
        <!--<a class='col-lg-offset-5 btn btn-success' href="{{ route('user.create') }}">Add New</a>-->
    </div>
</div>


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">All Discount</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('message.Sr. No') }}</th>
                                    <th>Voucher Name</th>
                                    <th>Voucher Type</th>
                                    <th>Voucher Validity</th>
<!--                                            <th>Assigned Roles</th>
                                 <th>Status</th>-->
                                    <th>{{ __('message.Edit') }}</th>
                                    <th>{{ __('message.Delete') }}</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php //dd($discount_voucher);?>
                                      @foreach($discount_voucher as $discount)
                                      <tr>
                                      <td>{{ $loop->index + 1 }}</td>
                                      <td>{{ $discount->voucher_name }}</td>
                                      <td>{{ $discount->voucher_name }}</td>
                                      <td>{{ $discount->validity_end_date}}</td>
                                      <td><a href="admin/AdminController/{ $discount_voucher->discount_id }"><span class="glyphicon glyphicon-edit"></span><i class="fa fa-pencil"></i></td>
                                    <td><a href=""><span class="glyphicon glyphicon-trash"></span><i class="fa  fa-trash-o"></i></a></td>
                                   </tr>
                                    @endforeach  
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
<script type="text/javascript" src="{{ URL::asset('/js/view_discount_service.js') }}"></script> 
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