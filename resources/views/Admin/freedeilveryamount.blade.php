<html class="no-js" lang="">
<head>
   @include('Admin.layouts.head')
</head>
<body>
<div class="wrapper">
	@include('Admin.layouts.header')
<!-- Header-->
<!-- All Product -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{ __('message.Add Free Delivery Charges') }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                    <!-- <li><a href="<?php //echo url('/administration/product')      ?>">Up0adte Product</a></li> -->
                    <li class="active">{{ __('message.Add Free Delivery Charges') }}</li>
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
                        <form action="<?php echo url('/admin/addfreedelivery') ?>" method="post" enctype="multipart/form-data">
                            {{csrf_field()}} 
                              
                            <!--<p><span class="required" style="color: red">Enter all required fields marked as *</span>-->
                            <div class="row">
                                <?php
//                                foreach ($users as $produc) {
 
                                  //  echo $users->wraping_charage.'this is wrapping charge';
                                 
                                 ?>
                                <div class="form-group col-sm-6">
                                <label for="freedeliveryamount">{{ __('message.Add Free Delivery Charges') }} ($)</label><span class="required" style="color: red">*</span>
                                <input type="number" class="form-control quantity" id="freedeliverycharges" name="freedeliverycharges" value="<?php if($users){echo $users->deilveriescharges;}else{} ?>" placeholder="">
                                <input type="hidden" name="freedeilveryid" id="freedeilveryid" value="<?php if($users){echo $users->id;}else{}; ?>">
                                </div>
                            <div class="space10"></div>
                            <div class="form-group col-sm-12">
                                
                                 <button type="submit" class="btn btn-primary">{{ __('message.Save') }} </button>&nbsp&nbsp&nbsp&nbsp
                            </div>
                                 
                                   </div>
                                   
                            <?php // } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!-- All Product -->

</div><!-- /#right-panel -->
 

<!-- Right Panel -->
<script src="{{ asset('/admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{ asset('/admin/assets/js/plugins.js')}}"></script>
<script src="{{ asset('admin/assets/js/main.js')}}"></script>

<!-- data table js -->
<script src="{{ asset('/admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('/admin/assets/js/lib/data-table/datatables-init.js')}}"></script>
<script src="{{ asset('/admin/assets/datepicker/bootstrap-datetimepicker.js')}}"></script>

<script src="{{ asset('/admin/assets/datepicker/jquery-1.8.3.min.js')}}"></script>
<script src="{{ asset('/admin/assets/datepicker/bootstrap.min.js')}}"></script>
<script src="{{ asset('/admin/assets/datepicker/bootstrap-datetimepicker.js')}}"></script>
<script src="{{ asset('/admin/assets/datepicker/bootstrap-datetimepicker.fr.js')}}"></script>
<script src="{{ asset('/admin/assets/dist/summernote-bs4.js')}}"></script>
 
<script type="text/javascript">
    $("#Locale").on('change', function(){
         var val = $(this).val();   
         $.ajax({
            type:'get',
            url:"/locale/"+val,
            success:function(data){
                location.reload();
                },
            error:function(){
            }
        });
    }); 
</script>
 
</body>
</html>