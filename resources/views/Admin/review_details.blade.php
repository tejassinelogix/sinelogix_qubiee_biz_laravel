@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
      <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>All Reviews</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <!-- <li><a href="add-new-product.php">Add Products</a></li> -->
                        <li class="active">All Reviews</li>
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
                                         <?php if(Auth::user()->job_title == 'superadmin'){ ?>
                                        <th>Product Id</th>
                                         <?php }?>
                                        <th>Product Name</th>
                                        <th>Vendor Name</th>
                                        <?php if(Auth::user()->job_title == 'superadmin'){ ?>
                                        <th>Username Name</th>
                                        <?php } ?>
                                        <th>Comment</th>
                                        <th>Headline</th>
                                        <th>Rating</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                $index = 1;
                                foreach ($productReviews as $researchdata) {
                                    
                                   ?> 
                                    <tr>
                                        <td class="srNo">
                                          <?php echo $index++; ?>
                                        </td>
                                         <?php if(Auth::user()->job_title == 'superadmin'){ ?>
                                        <td>
                                         <?php echo $researchdata->product_id; ?> 
                                        </td>
                                         <?php } ?>
                                        <td><?php echo $researchdata->product->product_name[$language]; ?></td>
                                        <td><?php echo $researchdata->admins->name; ?> </td>
                                        <?php if(Auth::user()->job_title == 'superadmin'){ ?>
                                        <td><?php echo $researchdata->user->name; ?> </td>
                                         <?php } ?>
                                        <td> <?php echo $researchdata->comment; ?>  </td>
                                         <td> <?php echo $researchdata->hedline; ?>  </td>
                                         <td><center> <span class="badge badge-primary"><?php 
                                         echo $researchdata->rating; ?></span></center></td>
                                        <td>
                                            <div class="operationsblok">

                                                <a href="#" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
<!--
                                               <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                    <i class="fa  fa-trash-o"></i>
                                                </a>--> 
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