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
                <h1>{{ __('message.All Discount Voucher') }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                    <!--<li><a href="<?php //echo url('/admin/createproduct')  ?>">Add User</a></li>-->
                    <li class="active">{{ __('message.All Discount') }}</li>
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
                        <strong class="card-title">{{ __('message.All Discount') }}</strong>
                        
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('message.Sr. No') }}</th>
                                    <th>{{ __('message.Voucher Name') }}</th>
                                    <th>{{ __('message.Voucher Type') }}</th>
                                    <th>{{ __('message.Voucher Validity') }}</th>
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
                                      <td>{{ $discount->main_voucher_name }}</td>
                                      <td>{{ $discount->sub_voucher_name }}</td>
                                      <td>{{ $discount->validity_end_date}}</td>
                                      <td><a href="{{ url('admin_2/'.$discount->discount_id.'/edit_vouchers/') }}"><span class="glyphicon glyphicon-edit"></span><i class="fa fa-pencil"></i></a></td>
                                    <td>                                     
                                    <form id="delete-form-{{ $discount->discount_id }}" deleteuid="{{$discount->discount_id}}" method="get" action="<?php echo $discount->discount_id.'/del_vouchers'; ?>">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                      <a href="" onclick="
                                      if(confirm('Are you sure, You Want to delete this?'))
                                          {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $discount->discount_id }}').submit();
                                          }
                                          else{
                                            event.preventDefault();
                                          }" ><span class="glyphicon glyphicon-trash"></span><i class="fa  fa-trash-o"></i></a>
                                    </td>
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
