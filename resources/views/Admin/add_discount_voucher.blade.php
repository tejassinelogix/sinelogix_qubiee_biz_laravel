@extends('Admin.layouts.app')
 <?php
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }
    ?>
@section('main-content')
 <!-- TDS :: Server Changes requires  -->
<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/custom_all.css') }}"/> -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/custom_all.css') }}"/>
  <!-- Content Wrapper. Contains page content -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>{{ __('message.Add New Discount Voucher') }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">{{ __('message.Dashboard') }}</a></li>
                        <li><a href="{{ route('user.index')}}">{{ __('message.All Voucher') }}</a></li>
                        <li class="active">{{ __('message.Add Discount Voucher') }}</li>
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
                              <form role="form" action="{{ action('AdminController@create_discount') }}" method="post">
			    <!-- form role="form" action="admin_2/add_discount" method="post" -->
                            {{ csrf_field() }}
                            <?php $old_value = old(); 
                           // dd($old_value);
                            ?>
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                      <div class="is_auto_generated_select">
                                          <select id="is_auto_generated" name="is_auto_generated" class="form-control">
                                              <option value="">{{ __('message.Please Select Auto Generated') }}</option>
                                               <option value="yes" {{ old('is_auto_generated') == 'yes' ? 'selected' : '' }}>{{ __('message.Yes') }}</option>
                                               <option value="no" {{ old('is_auto_generated') == 'no' ? 'selected' : '' }}>{{ __('message.No') }}</option> 
                                          </select>
                                      </div>
                                      <br>
                                    <?php $auto_code = sprintf("QUB%u%s",rand(10,99),chr(rand(65,90))); ?>
                                    <div class="form-group default_auto_gen_coupan <?php echo (isset($old_value['is_auto_generated']) && $old_value['is_auto_generated'] == 'yes')?'':'auto_coupan_form'; ?>">
                                        <label for="name">{{ __('message.Coupan Code') }}</label>
                                        <input type="text" class="form-control" id="auto_coupan" name="auto_coupan" value="<?php echo (isset($old_value['auto_coupan']) && !empty($old_value['auto_coupan']))?old('auto_coupan'):$auto_code; ?>" readonly>
                                    </div>

                                    <div class="form-group default_manual_gen_coupan <?php echo (isset($old_value['is_auto_generated']) && $old_value['is_auto_generated'] == 'no')?'':'manual_coupan_form'; ?>">
                                        <label for="name">{{ __('message.Coupan Code') }}</label>
                                        <input type="text" class="form-control" id="manual_coupan" name="manual_coupan" placeholder="Enter Coupan Code" value="{{ old('manual_coupan') }}" maxlength="6" minlength="6">
                                    </div>                                

                                    <div class="is_fixed_select_form">
                                        <select id="is_fixed_select" name="is_fixed_select" class="form-control">
                                          <option value="">{{ __('message.Select Voucher Type') }}</option>
                                          <?php 
                                          
                                          if(isset($list_voucher) && !empty($list_voucher)){
                                          foreach($list_voucher as $key => $voucher) { ?>
                                            <option value="<?php echo $voucher['voucher_id'] ?>" <?php echo (isset($old_value['is_fixed_select']) && $old_value['is_fixed_select'] == $voucher['voucher_id'])?'selected':''; ?>><?php echo $voucher['voucher_name'] ?></option>
                                            <?php } } else { ?>
                                              <option value="">{{ __('message.No Voucher Found') }}</option>
                                          <?php } ?>                                            
                                        </select>
                                    </div>
                                    <br>
                                    <div class="is_validity_select_form">
                                            <select id="is_validity_select" name="is_validity_select" class="form-control">
                                                <option value="">{{ __('message.Select Voucher Validity') }}</option>
                                                 <option value="yes" {{ old('is_validity_select') == 'yes' ? 'selected' : '' }}>{{ __('message.Yes') }}</option>
                                                 <option value="no" {{ old('is_validity_select') == 'no' ? 'selected' : '' }}>{{ __('message.No') }}</option> 
                                            </select>
                                        </div>
                                        <br>
                                      <div class="form-group col-sm-6 default_voucher_date_validity <?php echo (isset($old_value['is_validity_select']) && $old_value['is_validity_select'] == 'yes')?'':'voucher_date_validity'; ?>">
                                        <label for="from_date">{{ __('message.From Date') }}</label>
                                        <input type="date" class="form-control" id="from_date_order" name="fromdate" placeholder="" value="{{ old('fromdate') }}">
                                    </div>

                                    <div class="form-group col-sm-6 default_voucher_date_validity <?php echo (isset($old_value['is_validity_select']) && $old_value['is_validity_select'] == 'yes')?'':'voucher_date_validity'; ?>">
                                        <label for="to_date">{{ __('message.To Date') }}</label>
                                        <input type="date" class="form-control" id="to_date_order" name="todate" placeholder="" value="{{ old('todate') }}">
                                    </div>

                                    <br>
                                    <div class="is_minamt_select_form">
                                            <select id="is_minamt_select" name="is_minamt_select" class="form-control">
                                                <option value="">{{ __('message.Select Minimum Amount') }}</option>
                                                 <option value="yes" {{ old('is_minamt_select') == 'yes' ? 'selected' : '' }}>{{ __('message.Yes') }}</option>
                                                 <option value="no" {{ old('is_minamt_select') == 'no' ? 'selected' : '' }}>{{ __('message.No') }}</option> 
                                            </select>
                                        </div>                                        
                                         <br>
                                        <div class="form-group default_minimum_amount_form <?php echo (isset($old_value['is_minamt_select']) && $old_value['is_minamt_select'] == 'yes')?'':'minimum_amount_form'; ?>">
                                          <label for="name">{{ __('message.Minimum Amount') }}</label>
                                          <input type="text" class="form-control" id="minimum_amount" name="minimum_amount" placeholder="Enter Minimum Amount" value="{{ old('minimum_amount') }}">
                                        </div> 
                                        <br>

                                        <div class="is_discount_by_select_form">
                                        <select id="is_discount_by_select" name="is_discount_by_select" class="form-control">
                                          <option value="">{{ __('message.Select Discount Type') }}</option>
                                                 <option value="percentage" {{ old('is_discount_by_select') == 'percentage' ? 'selected' : '' }}>{{ __('message.Percentage') }}</option>
                                                 <option value="dollar" {{ old('is_discount_by_select') == 'dollar' ? 'selected' : '' }}>{{ __('message.Dollar') }}</option> 
                                        </select>
                                      </div>
                                      <br>

                                      <div class="form-group <?php echo (isset($old_value['is_discount_by_select']) && ($old_value['is_discount_by_select'] == 'percentage' || $old_value['is_discount_by_select'] == 'dollar'))?'':'discount_type_input_form'; ?>">
                                          <label for="name">{{ __('message.Discount') }}</label>
                                          <input type="text" class="form-control" id="discount_type_input" name="discount_type_input" placeholder="Enter Discount" value="{{ old('discount_type_input') }}">
                                        </div>
                                    <br>
                                    <div class="main_category_form">
                                        <select id="main_category_select" name="main_category_select" class="form-control">
                                          <option value="">{{ __('message.Select Category') }}</option>
                                          <?php 
                                          if(isset($category_parent_id) && !empty($category_parent_id)){
                                          foreach($category_parent_id as $key => $main_cat) { 
                                            $cat_name = json_decode($main_cat->category_name, true);
                                            $cat_name_display = (isset($language) && $language == 'en')?$cat_name['en']:$cat_name['ar'];
                                            ?>

                                            <option value="<?php echo $main_cat->category_id; ?>" <?php echo (isset($old_value['main_category_select']) && $old_value['main_category_select'] == $main_cat->category_id)?'selected':''; ?>><?php echo $cat_name_display; ?></option>
                                            <?php } } else { ?>
                                              <option value="">No Category Found') }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>

                                    <div class="sub_category_form">
                                        <select id="sub_category_select" name="sub_category_select" class="form-control">
                                          <option value="">{{ __('message.Select Sub-Category') }}</option>
                                        </select>
                                    </div>  

                                    <br>
                                    <div class="products_form">
                                        <select id="products_select" name="products_select" class="form-control">
                                          <option value="">{{ __('message.Select Products') }}</option>
                                        </select>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">{{ __('message.Submit') }}</button>
                                      <!-- TDS :: Server Changes requires  -->
                                      <!-- <a href='{{ URL('admin/discountvoucheradd' )}}' class="btn btn-warning">{{ __('message.Back') }}</a> -->
                                      <a href='{{ URL('admin_2/discountvoucheradd' )}}' class="btn btn-warning">{{ __('message.Back') }}</a>
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
 <!-- TDS :: Server Changes requires  -->
<!-- <script type="text/javascript" src="{{ URL::asset('public/js/add_discount_service.js') }}"></script> -->
<script type="text/javascript" src="{{ URL::asset('/js/add_discount_service.js') }}"></script>
@endsection

