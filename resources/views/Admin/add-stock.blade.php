@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Add Products Stock</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                                <li><a href="<?php echo url('/admin/product') ?>">Add Products</a></li>
                                <li class="active">Add Products Stock</li>
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
                                <div class="card-body card-block">
                                    @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                    </div>
                                    @endif
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form action="<?php echo url('/admin/add-stock') ?>" method="post">
                                        {{ csrf_field() }}
                                        <?php foreach ($products as $product) {
                                                $product_name = json_decode($product->product_name, true);
                                        ?>
                                        <div class="row">
                                            <div class="form-group col-sm-5">
                                                <label for="title">{{ __('message.Product Name') }}</label>
                                                <input type="text" readonly="" class="form-control" placeholder="" value="<?php if ($language === 'en') { ?>{{ $product_name[$language] }} / {{ $product_name['ar'] }}<?php }if ($language === 'ar') {?>{{ $product_name[$language] }} / {{ $product_name['en'] }}<?php } ?>">
                                            </div>
                                            <div class="form-group col-sm-5">
                                                <label for="title">{{ __('message.Quantity') }}</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="">
                                                <input type="hidden" name="product_id" id="product_id" value="{{ $product_id }}"/>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="title">&nbsp;</label><br>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </form>
                                    <hr>
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Product Name</th>
                                    <th>Original Quantity</th>
                                    <th>Sale Quantity</th>
                                    <th>Remained Quantity</th>
                                    <th>Created</th>
                                    <!--<th>Update Quantity</th>-->
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
                                                    {{ $product_name[$language] }} / {{ $product_name['ar'] }}<?php }if ($language === 'ar') {?>{{ $product_name[$language] }} / {{ $product_name['en'] }}<?php } ?>"</td>
                                        <td>{{ $stock->original_qty }}</td>
                                        <td>{{ $stock->sale_qty }}</td>
                                        <td>{{ $stock->remained_qty }}</td>
                                        <td>{{ $stock->created_at }}</td>
<!--                                        <td>
                                            <div class="operationsblok">
                                               <a href="/admin/add-stock/{{ $stock->product_id }}" data-toggle="tooltip" title="View">
                                                      <i class="fa fa-pencil"></i>
                                                </a> 
                                            </div>
                                        </td>-->
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
        
 