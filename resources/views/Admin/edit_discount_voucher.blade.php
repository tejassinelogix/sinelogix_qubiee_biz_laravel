@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- All Product -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{ __('message.Edit Discount Voucher') }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                    <!--<li><a href="<?php //echo url('/admin/createproduct')  ?>">Add User</a></li>-->
                    <li class="active">{{ __('message.Edit Discount') }}</li>
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
                    <div class="card-header">
                        <strong class="card-title">{{ __('message.Edit Discount') }}</strong>
                        
                    </div>
                    <div class="card-body">

                   @foreach($discount_voucher as $discount)

                          <form role="form" action="{{ url('admin_2/'.$discount->discount_id.'/update_discount/') }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                  <input type="text" name="discount_id" value="{{$discount->discount_id}}" style="border: none;color: #fff; ">
                                      <div class="is_auto_generated_select">
                                          <select id="is_auto_generated" name="is_auto_generated" class="form-control">
                                              <option value="0">{{ __('message.Please Select Auto Generated') }}</option>
                                              @if($discount->is_auto_generated == 'yes')
                                               <option value="{{$discount->is_auto_generated}}" selected>{{ __('message.Yes') }}</option>
                                               <option value="no" >{{ __('message.No') }}</option>
                                               @endif

                                               @if($discount->is_auto_generated == 'no')
                                               <option value="{{$discount->is_auto_generated}}" selected="selected">{{ __('message.No') }}</option>
                                               <option value="yes">{{ __('message.Yes') }}</option>
                                                @endif
                                          </select>
                                      </div>
                                      <br>
                                    <?php $auto_code = sprintf("QUB%u%s",rand(10,99),chr(rand(65,90)));

                                     ?>
                                    @if($discount->is_auto_generated == 'yes')
                                    <div class="form-group auto_coupan_form">
                                        <label for="name">{{ __('message.Coupan Code') }}</label>
                                        <input type="text" class="form-control"  name="auto_coupan" value="<?php echo $auto_code; ?>" readonly>
                                    </div>
                                    @endif
                                    
                                    <div class="form-group manual_coupan_form">
                                        <label for="name">{{ __('message.Coupan Code') }}</label>
                                        <input type="text" class="form-control"  name="manual_coupan" placeholder="Enter Coupan Code" value="{{ old('manual_coupan') }}" maxlength="6" minlength="6">
                                    </div>                                
                                   
                                    <div class="is_fixed_select_form">
                                      <select id="is_fixed_select" name="is_fixed_select" class="form-control">
                                              <option value="0">{{ __('message.Select Voucher Type') }}</option>
                                              @if($discount->voucher_type_id == '1')
                                               <option value="{{$discount->voucher_type_id}}" selected>{{ __('message.One time use') }}</option>
                                               <option value="no" >{{ __('message.Fixed Code') }}</option>
                                               @endif

                                               @if($discount->voucher_type_id == '2')
                                               <option value="{{$discount->voucher_type_id}}" selected="selected">{{ __('message.Fixed Code') }}</option>
                                               <option value="yes">{{ __('message.One time use') }}</option>
                                                @endif
                                          </select>

                                       
                                    </div>
                                    <br>
                                    <div class="is_validity_select_form">
                                            <select id="is_validity_select" name="is_validity_select" class="form-control">
                                                <option value="0">{{ __('message.Select Voucher Validity') }}</option>

                                              @if($discount->voucher_validity == 'yes')
                                               <option value="{{$discount->voucher_validity}}" selected>{{ __('message.Yes') }}</option>
                                               <option value="no" >{{ __('message.No') }}</option>
                                               @endif
                                               
                                               @if($discount->voucher_validity == 'no')
                                               <option value="{{$discount->voucher_validity}}" selected="selected">{{ __('message.No') }}</option>
                                               <option value="yes">{{ __('message.Yes') }}</option>
                                                @endif
                                                
                                            </select>
                                        </div>
                                        <br>
                                        @if($discount->voucher_validity == 'yes')
                                      <div class="form-group col-sm-6 voucher_date_validity">
                                        <label for="from_date">{{ __('message.From Date') }}</label>
                                        <input type="date" class="form-control" id="from_date_order" name="fromdate" placeholder="" value="{{$discount->validity_start_date}}">
                                    </div>

                                    <div class="form-group col-sm-6 voucher_date_validity">
                                        <label for="to_date">{{ __('message.To Date') }}</label>
                                        <input type="date" class="form-control" id="to_date_order" name="todate" placeholder="" value="{{$discount->validity_end_date}}">
                                    </div>
                                     @endif
                                    <br>
                                    <div class="is_minamt_select_form">
                                            <select id="is_minamt_select" name="is_minamt_select" class="form-control">
                                                <option value="0">{{ __('message.Select Minimum Amount') }}</option>
                                                 @if($discount->is_minimum_order == 'yes')
                                                 <option value="{{$discount->is_minimum_order}}" selected>{{ __('message.Yes') }}</option>
                                                 <option value="no">{{ __('message.No') }}</option> 
                                                 @endif

                                                  @if($discount->is_minimum_order == 'no')
                                               <option value="{{$discount->is_minimum_order}}" selected="selected">{{ __('message.No') }}</option>
                                               <option value="yes">{{ __('message.Yes') }}</option>
                                                @endif
                                            </select>
                                        </div>                                        
                                         <br>
                                         @if($discount->is_minimum_order == 'yes')
                                        <div class="form-group minimum_amount_form">
                                          <label for="name">{{ __('message.Minimum Amount') }}</label>
                                          <input type="text" class="form-control" id="minimum_amount" name="minimum_amount" placeholder="Enter Minimum Amount" value="{{$discount->minimum_amount }}">
                                        </div> 
                                        @endif
                                        <br>

                                        <div class="is_discount_by_select_form">
                                        <select id="is_discount_by_select" name="is_discount_by_select" class="form-control">
                                          <option value="0">{{ __('message.Select Discount Type') }}</option>
                                              @if($discount->discount_type == 'percentage')
                                                 <option value="{{$discount->discount_type}}" selected="">Percentage') }}</option>
                                                 <option value="rupees">{{ __('message.Rupees') }}</option> 
                                              @endif

                                              @if($discount->discount_type == 'rupees')
                                               <option value="{{$discount->discount_type}}" selected="">{{ __('message.Rupees') }}</option>
                                                 <option value="percentage">{{ __('message.Percentage') }}</option> 
                                              @endif
                                        </select>
                                      </div>
                                      <br>
                                       @if($discount->discount_type == 'percentage')
                                      <div class="form-group discount_type_input_form">
                                          <label for="name">{{ __('message.Discount') }}</label>
                                          <input type="text" class="form-control" id="discount_type_input" name="discount_type_input" placeholder="Enter Discount" value="{{ $discount->discount_type_amount }}">
                                        </div>
                                        @endif
                                         @if($discount->discount_type == 'rupees')
                                      <div class="form-group discount_type_input_form">
                                          <label for="name">{{ __('message.Discount') }}</label>
                                          <input type="text" class="form-control" id="discount_type_input" name="discount_type_input" placeholder="Enter Discount" value="{{ $discount->discount_type_amount }}">
                                        </div>
                                        @endif
                                    <br>
                                    <div class="main_category_form">
                                        <select id="main_category_select" name="main_category_select" class="form-control">
                                          <option value="0">{{ __('message.Select Category') }}</option>
                                          <?php 
                                          if(isset($category_parent_id) && !empty($category_parent_id)){
                                          foreach($category_parent_id as $key => $main_cat) { 
                                            $cat_name = json_decode($main_cat->category_name, true);
                                            $cat_name_display = (isset($language) && $language == 'en')?$cat_name['en']:$cat_name['ar'];
                                            //dd($cat_name);
                                            ?>                                            
                                            <option value="<?php echo $main_cat->category_id; ?>" ><?php echo $cat_name_display; ?></option>
                                           
                                         
                                            <?php } } else { ?>
                                              <option value="0">{{ __('message.No Category Found') }}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>

                                    <div class="sub_category_form">
                                        <select id="sub_category_select" name="sub_category_select" class="form-control">
                                          <option value="0">{{ __('message.Select Sub-Category') }}</option>
                                        </select>
                                    </div>  

                                    <br>
                                    <div class="products_form">
                                        <select id="products_select" name="products_select" class="form-control">
                                          <option value="0">{{ __('message.Select Products') }}</option>
                                        </select>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">{{ __('message.Update') }}</button>
                                      <a href='{{ route('user.index') }}' class="btn btn-warning">{{ __('message.Back') }}</a>
                                    </div>

                                    </div> <!-- col-e ends -->
                            </div> 
                            </form>
                      @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!-- All Product -->



</div><!-- /#right-panel -->
<script type="text/javascript" src="{{ URL::asset('/js/view_discount_service.js') }}"></script> 
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
