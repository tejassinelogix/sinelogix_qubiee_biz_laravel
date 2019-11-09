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
                <!--<h1>Customer Details</h1>-->
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                    <li><a href="<?php echo url('/admin/customer')  ?>">All Customer</a></li>
                    <!--<li class="active">All Customers</li>-->
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
                                    <th>Customer Details</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <?php if ($users != null) { 
                                       
                                            ?>
                                             <?php if(isset($users[0]->profile_img)){?>                                       
                                            <img src="../../public/images/profile/{{ $users[0]->profile_img }}" style="height: 100px;width: 100px;margin-bottom: 10px;"/>
                                            <br>
                                              <?php } ?>
                                            Customer Name :- {{ $users[0]->name }}
                                            <br>
                                             <?php if(isset($users[0]->address)){?>   
                                            Customer Address :- {{ $users[0]->address }}<br>
                                           
                                            {{ $users[0]->state }} {{ $users[0]->country }} {{ $users[0]->pin_code }}
                                        <br>    
                                         <?php } ?>
                                            Customer Email Id :- {{ $users[0]->email }}
                                            <br>
                                            <?php if(isset($users[0]->address)){?> 
                                            Customer Contact No :- {{ $users[0]->contact }}
                                             <?php } ?>
                                            <br> 
                                        <?php } ?>
                                    </td>
                                </tr>


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