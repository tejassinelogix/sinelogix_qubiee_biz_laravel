@extends('Admin.layouts.app')
 <?php
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }
    ?>
@section('main-content')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/custom_all.css') }}"/>
  <!-- Content Wrapper. Contains page content -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add New Discount Voucher</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <li><a href="{{ route('user.index')}}">All Voucher</a></li>
                        <li class="active">Add Discount Voucher</li>
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
                   @include('Admin.includes.messages')
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="admin_2/add_discount" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                      <div class="is_auto_generated_select">
                                          <select id="is_auto_generated" name="is_auto_generated" class="form-control">
                                              <option value="0">Please Select Auto Generated</option>
                                               <option value="yes">Yes</option>
                                               <option value="no">No</option> 
                                          </select>
                                      </div>
                                      <br>
                                    <?php $auto_code = sprintf("QUB%u%s",rand(10,99),chr(rand(65,90))); ?>
                                    <div class="form-group auto_coupan_form">
                                        <label for="name">Coupan Code</label>
                                        <input type="text" class="form-control" id="auto_coupan" name="auto_coupan" value="<?php echo $auto_code; ?>" disabled>
                                    </div>

                                    <div class="form-group manual_coupan_form">
                                        <label for="name">Coupan Code</label>
                                        <input type="text" class="form-control" id="manual_coupan" name="manual_coupan" placeholder="Enter Coupan Code" value="{{ old('manual_coupan') }}" maxlength="6" minlength="6">
                                    </div>                                

                                    <div class="is_fixed_select_form">
                                        <select id="is_fixed_select" name="is_fixed_select" class="form-control">
                                          <?php 
                                          
                                          if(isset($list_voucher) && !empty($list_voucher)){
                                          foreach($list_voucher as $key => $voucher) { ?>
                                            <option value="<?php echo $voucher['voucher_id'] ?>"><?php echo $voucher['voucher_name'] ?></option>
                                            <?php } } else { ?>
                                              <option value="0">No Voucher Found</option>
                                          <?php } ?>                                            
                                        </select>
                                    </div>
                                    <br>
                                    <div class="is_validity_select_form">
                                            <select id="is_validity_select" name="is_validity_select" class="form-control">
                                                <option value="0">Select Voucher Validity</option>
                                                 <option value="yes">Yes</option>
                                                 <option value="no">No</option> 
                                            </select>
                                        </div>
                                        <br>
                                      <div class="form-group col-sm-6 voucher_date_validity">
                                        <label for="from_date">From Date </label>
                                        <input type="date" class="form-control" id="from_date_order" name="fromdate" placeholder="">
                                    </div>

                                    <div class="form-group col-sm-6 voucher_date_validity">
                                        <label for="to_date">To Date </label>
                                        <input type="date" class="form-control" id="to_date_order" name="todate" placeholder="">
                                    </div>

                                    <br>
                                    <div class="is_minamt_select_form">
                                            <select id="is_minamt_select" name="is_minamt_select" class="form-control">
                                                <option value="0">Select Minimum Amount</option>
                                                 <option value="yes">Yes</option>
                                                 <option value="no">No</option> 
                                            </select>
                                        </div>                                        
                                         <br>
                                        <div class="form-group minimum_amount_form">
                                          <label for="name">Minimum Amount</label>
                                          <input type="text" class="form-control" id="minimum_amount" name="minimum_amount" placeholder="Enter Minimum Amount" value="{{ old('minimum_amount') }}" required="">
                                        </div> 
                                        <br>

                                        <div class="is_discount_by_select_form">
                                        <select id="is_discount_by_select" name="is_discount_by_select" class="form-control">
                                          <option value="0">Select Discount Type</option>
                                                 <option value="percentage">Percentage</option>
                                                 <option value="rupees">Rupees</option> 
                                        </select>
                                      </div>
                                      <br>
                                      <div class="form-group discount_type_input_form">
                                          <label for="name">Discount</label>
                                          <input type="text" class="form-control" id="discount_type_input" name="discount_type_input" placeholder="Enter Discount" value="{{ old('discount_type_input') }}" required="">
                                        </div>
                                    <br>
                                    <div class="main_category_form">
                                        <select id="main_category_select" name="main_category_select" class="form-control">
                                          <option value="0">Select Category</option>
                                          <?php 
                                          if(isset($category_parent_id) && !empty($category_parent_id)){
                                          foreach($category_parent_id as $key => $main_cat) { 
                                            $cat_name = json_decode($main_cat->category_name, true);
                                            $cat_name_display = (isset($language) && $language == 'en')?$cat_name['en']:$cat_name['ar'];
                                            ?>

                                            <option value="<?php echo $main_cat->category_id; ?>"><?php echo $cat_name_display; ?></option>
                                            <?php } } else { ?>
                                              <option value="0">No Category Found</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>

                                    <div class="sub_category_form">
                                        <select id="sub_category_select" name="sub_category_select" class="form-control">
                                          <option value="0">Select Sub-Category</option>
                                        </select>
                                    </div>  

                                    <br>
                                    <div class="products_form">
                                        <select id="products_select" name="products_select" class="form-control">
                                          <option value="0">Select Products</option>
                                        </select>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                      <a href='{{ route('user.index') }}' class="btn btn-warning">Back</a>
                                    </div>

                                    </div> <!-- col-e ends -->
                            </div> 
                            </form>
                            <!-- form ends -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>

</div><!-- /#right-panel -->

<script type="text/javascript" src="{{ URL::asset('/js/add_discount_service.js') }}"></script>
@endsection

