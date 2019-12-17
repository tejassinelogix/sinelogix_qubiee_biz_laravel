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
                <h1>All Products </h1>
            </div>
        </div>        
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                    <!--<li><a href="<?php // echo url('/admin/createproduct')  ?>">Add Products</a></li>-->
                    <li class="active">All Products</li>
                </ol>
            </div>
        </div>
        @can('products.create', Auth::user())
        <a class='col-lg-offset-5 btn btn-success' href="{{ url(Request::segment(1)."/createproduct/") }}">Add New</a>
        @endcan
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <form name="edit_product" id="edit_product" method="POST">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
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
                                    <th><input type="checkbox" name="all_prod_chk" class="all_prod_chk" value="" unchecked="unchecked"></th>
                                    <th>Sr. No.</th>
                                    <th>Title</th>
                                    <th>Vendor Name</th>
                                    <th>Category Name</th>
                                    <th>Date</th>
                                    <th>Approval Status</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cntr = 0;
                                foreach ($users as $user) {
//                                    $product_name = json_decode($user->product_name, true);
                                    $product_name = $user->product_name;
                                    $product_status = $user->status;

                                    $cntr++;
                                    ?>
                                    <tr>
                                        <td class="chkbox">
                                            <input type="checkbox" class="prod_chk" name="prod_chk" value="{{ $user->id }}">
                                        </td>
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
                                            <td><?php  echo $user->admins->name; ?></td>
                                            <td>
                                                <?php  
                                       foreach ($all_cat as $all_catmain){
                                           if($all_catmain->category_id == $user->main_category ){
                                                $cat_Name = json_decode($all_catmain->category_name, true);
                                                         echo $cat_Name[$language];
                                                         }
                                                     } ?>
                                           </td>
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
                                                <a href="#" id="productapprove" data-toggle="tooltip" title="Not Approved" ">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                     
                                                <?php } else {
                                                      $usertype = (Auth::user()->job_title);
                                             if($usertype=='superadmin'){ ?>
                                                      
                                                <a href="#" id="productapprove_check" data-toggle="tooltip" title="Approved">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                             <?php } else { ?>
                                            <a href="" id="productapprove" data-toggle="tooltip" title="Disapproved">
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
</form> 
    </div><!-- .animated -->
</div><!-- .content -->
<!-- All Product -->



</div><!-- /#right-panel -->

<!-- Right Panel -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/view_product_service.js') }}"></script>

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
