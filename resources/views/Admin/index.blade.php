@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')

        <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <a href="<?php echo url(Request::segment(1).'/dashboard') ?>"><h1>{{ __('message.Dashboard') }}</h1></a>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">{{ __('message.Dashboard') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <!-- dashboardBlocks -->
        <div class="col-sm-6 col-lg-3">
            <a href="{{ url(Request::segment(1).'/allproduct/') }}" class="dashboardBlocks">
                <div class="dashboardBlockTitle"><p>{{ __('message.Product') }}</p></div>
                <div class="dashboardBlockNumb"><h3>{{$countproduct}}</h3></div>
                <!-- <div class="dashboardBlockInfo"><p>15 New Orders</p></div> -->
                <div class="dashboardBlockIcon"><i class="fa fa-shopping-cart"></i></div>
            </a>
        </div><!-- End of dashboardBlocks -->
 @can('products.category',Auth::user())
        <!-- dashboardBlocks -->
        <div class="col-sm-6 col-lg-3">
            <a href="<?php echo url('/admin/allmenu') ?>" class="dashboardBlocks">
                <div class="dashboardBlockTitle"><p>{{ __('message.Category') }}</p></div>
                <div class="dashboardBlockNumb"><h3> {{$countcategory}}</h3></div>
                <!-- <div class="dashboardBlockInfo"><p>Total 15 Products</p></div> -->
                <div class="dashboardBlockIcon"><i class="fa fa-cubes"></i></div>
            </a>
        </div><!-- End of dashboardBlocks -->
          @endcan
         @can('products.users',Auth::user())
        <!-- dashboardBlocks -->
        <div class="col-sm-6 col-lg-3">
            <a href="{{ route('user.index') }}" class="dashboardBlocks">
                <div class="dashboardBlockTitle"><p>{{ __('message.Users') }}</p></div>
                <div class="dashboardBlockNumb"><h3>{{$countUser}}</h3></div>
                <!-- <div class="dashboardBlockInfo"><p>2 New Customers</p></div> -->
                <div class="dashboardBlockIcon"><i class="fa fa-users"></i></div>
            </a>
        </div><!-- End of dashboardBlocks -->
                <!-- dashboardBlocks -->
        <div class="col-sm-6 col-lg-3">
            <a href="{{ route('customer.index') }}" class="dashboardBlocks">
                <div class="dashboardBlockTitle"><p>{{ __('message.Customers') }}</p></div>
                <div class="dashboardBlockNumb"><h3>{{$countCustomer}}</h3></div>
                <!-- <div class="dashboardBlockInfo"><p>2 New Customers</p></div> -->
                <div class="dashboardBlockIcon"><i class="fa fa-users"></i></div>
            </a>
        </div><!-- End of dashboardBlocks -->
     @endcan
     @can('products.roles',Auth::user())
        <!-- dashboardBlocks -->
        <div class="col-sm-6 col-lg-3">
            <a href="{{ route('role.index') }}" class="dashboardBlocks">
                <div class="dashboardBlockTitle"><p>{{ __('message.Roles') }}</p></div>
                <div class="dashboardBlockNumb"><h3>{{$countrole}}</h3></div>
                <!-- <div class="dashboardBlockInfo"><p>Bounce Rate 20%</p></div> -->
                <div class="dashboardBlockIcon"><i class="fa fa-list"></i></div>
            </a>
        </div><!-- End of dashboardBlocks -->
     
           @endcan
         <div class="col-sm-6 col-lg-3">
            <a href="<?php echo url(Request::segment(1).'/orders') ?>" class="dashboardBlocks">
                <div class="dashboardBlockTitle"><p>{{ __('message.Orders') }}</p></div>
                <div class="dashboardBlockNumb"><h3>{{$countorder_product}}</h3></div>
                <!-- <div class="dashboardBlockInfo"><p>2 New Customers</p></div> -->
                <div class="dashboardBlockIcon"><i class="fa fa-file"></i></div>
            </a>
        </div>
    </div>
</div><!-- /#right-panel -->
@endsection
