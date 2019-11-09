
@extends('Admin.layouts.app')


@section('main-content')


<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <a href="{{ route('admin.home')}}"><h1>{{ __('message.Dashboard') }}</h1></a>
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
            <a href="{{ url("/admin/allproduct/") }}" class="dashboardBlocks">
                <div class="dashboardBlockTitle"><p>{{ __('message.Product') }}</p></div>
                <div class="dashboardBlockNumb"><h3>{{$countproduct}}</h3></div>
                <!-- <div class="dashboardBlockInfo"><p>15 New Orders</p></div> -->
                <div class="dashboardBlockIcon"><i class="fa fa-shopping-cart"></i></div>
            </a>
        </div><!-- End of dashboardBlocks -->

        <!-- dashboardBlocks -->
        <div class="col-sm-6 col-lg-3">
            <a href="<?php echo url('/admin/allmenu') ?>" class="dashboardBlocks">
                <div class="dashboardBlockTitle"><p>{{ __('message.Category') }}</p></div>
                <div class="dashboardBlockNumb"><h3> </h3></div>
                <!-- <div class="dashboardBlockInfo"><p>Total 15 Products</p></div> -->
                <div class="dashboardBlockIcon"><i class="fa fa-cubes"></i></div>
            </a>
        </div><!-- End of dashboardBlocks -->
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
    </div>
</div><!-- /#right-panel -->

@endsection