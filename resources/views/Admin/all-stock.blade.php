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
                <h1>{{ __('message.All Products Stock') }}</h1>
            </div>
        </div>        
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                    <!--<li><a href="<?php // echo url('/admin/createproduct')  ?>">Add Products</a></li>-->
                    <li class="active">{{ __('message.All Products Stock') }}</li>
                </ol>
            </div>
        </div>
<!--        @can('products.create', Auth::user())
        <a class='col-lg-offset-5 btn btn-success' href="{{ url(Request::segment(1)."/createproduct/") }}">Add New</a>
        @endcan-->
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{ __('message.Stocks') }}</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>{{ __('message.Sr. No') }}</th>
                                    <th>{{ __('message.Product Name') }}</th>
<!--                                    <th>Product id</th>-->
                                    <th>{{ __('message.Original Quantity') }}</th>
                                    <th>{{ __('message.Sale Quantity') }}</th>
                                    <th>{{ __('message.Remained Quantity') }}</th>
                                    <th>{{ __('message.Created') }}</th>
                                    <th>{{ __('message.Update Quantity') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cntr = 0;
                                foreach ($stocks as $stock) {
                                    $cntr++;
                                    $product_name = json_decode($stock->product_name, true);
                                ?>
                                    <tr>
                                        <td class="srNo">
                                            <?php echo $cntr;?>
                                        </td>
                                        <td><?php if ($language === 'en') { ?>
                                                    {{ $product_name[$language] }} / {{ $product_name['ar'] }}<?php }if ($language === 'ar') {?>{{ $product_name[$language] }} / {{ $product_name['en'] }}<?php } ?></td>
<!--                                        <td>{{ $stock->product_id }}</td>-->
                                        <td>{{ $stock->original_qty }}</td>
                                        <td>{{ $stock->sale_qty }}</td>
                                        <td>{{ $stock->remained_qty }}</td>
                                        <td>{{ $stock->created_at }}</td>
                                        <td>
                                            <div class="operationsblok">
                                               <a href="/admin/add-stock/{{ $stock->product_id }}" data-toggle="tooltip" title="View">
                                                      <i class="fa fa-eye"></i>
                                                </a> 
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
