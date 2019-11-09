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
                <h1>Vendor Details</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                    <li><a href="<?php echo url('/admin/user')  ?>">All Vendor</a></li>
                    <!--<li class="active">All Vendor</li>-->
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
                    <!--                            <div class="card-header">
                                                    <strong class="card-title">Data Table</strong>
                                                </div>-->
                    <div class="card-body">
                        <table  class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th><center>Vendor Name</center></th>
                                    <th><center>Vendor Email</center></th>
                                    <th><center>Vendor phone</center></th>
                                     <th><center>Vendor Status</center></th>
                                     <th><center>Vendor Role</center></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                     <?php if ($users != null) { ?>
                                    <td>
                                       
                                       <center> {{ $users->name }}</center>
                                    </td>
                                    <td>
                                       <center> {{ $users->email }}</center>
                                    </td>
                                    <td>
                                        <center> {{ $users->phone }}</center>
                                    </td>
                                    <td>
                                        <?php if ($users->status == 1) { ?>
                                            <center><span class="badge badge-success">Active</span></center>
                                        <?php } else { ?>
                                            <center><span class="badge badge-danger">Deactivated </span></center>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        @foreach ($roles as $role)
                                           @foreach ($users->roles as $user_role)
                                                @if ($user_role->id == $role->id)
                            <center>{{ ucfirst($role->name) }}</center> 
                                                @endif
                                                @endforeach 
                                        
                                        @endforeach
                                    </td>
                                    <?php } ?>

                                </tr>


                            </tbody>
                        </table>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Approval Status</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cntr = 0;
                                foreach ($usersProducts as $user) {
                                    $product_name = json_decode($user->product_name, true);
                                    $product_status = json_decode($user->status, true);

                                    $cntr++;
                                    ?>
                                    <tr>
                                        <td class="srNo">
                                            <?php echo $cntr; //echo $user->product_id ;?>
                                        </td>
                                        <?php if (isset($product_name[$language])) { ?>
                                            <td>
                                                <?php if ($language === 'en') { ?>

                                                    {{ $product_name[$language] }}<br>{{ $product_name['ar'] }}
                                                <?php }
                                                if ($language === 'ar') {
                                                    ?>
                                                    {{ $product_name[$language] }}<br>{{ $product_name['en'] }}
                                                <?php } ?>
                                            <?php //echo $product_name[$language];  ?>
                                            </td>
                                        <?php } else { ?>
                                            <td></td>
    <?php } ?>

                                        <td>{{ $user->createdOn }} </td>
                                        <td> 
                                                <?php if ($product_status == 1) { ?>
                                        <span class="badge badge-success">Approved</span>
                                                <?php } else { ?>
                                         <span class="badge badge-danger">Disapproved </span>
                                                <?php }
                                                ?>

                                            </td>
                                        <td>
                                            <div class="operationsblok">
                                                <a href="/admin/showproduct/{{ $user->id }}" data-toggle="tooltip"  title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                   <a href="/admin/add-stock/{{ $user->id }}" data-toggle="tooltip" title="Manage Stock">
                                                      <i class="fa fa-archive"></i>
                                                  </a> 
<!--                                                <a href="deleteproduct/{{ $user->id }}" id="productdelete" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure to Delete Products?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>-->
                                                <?php
                                                if($product_status == 1) { ?>
                                                <a href="deleteproduct/{{ $user->id }}" id="productapprove" data-toggle="tooltip" title="Not Approved" onclick="return confirm('Are you sure to Not Approved Products?');">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                     
                                                <?php } else {
                                                      $usertype = (Auth::user()->job_title);
                                             if($usertype=='superadmin'){ ?>
                                                      
                                             <a href="approvproduct/{{ $user->id }}" id="productapprove" data-toggle="tooltip" title="Approved" onclick="return confirm('Are you sure to Approved Products?');">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                             <?php } else { ?>
                                            <a href="#" id="productapprove" data-toggle="tooltip" title="Disapproved">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                               <!--<span class="badge badge-success">Only <br>Superadmin <br>Can<br> Approved</span>-->
                                              
                                                <?php } }   
                                                ?>
                                               <a href="<?php echo url('/productdetails'); ?>/{{$user->url }}" target="_blank"> <i class="fa fa-eye"></i></a>
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
</div><!-- .content -->
<!-- All Product -->



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