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
                <h1>Add New Layout</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                    <li><a href="<?php echo url('/admin/addlayout') ?>">Add Layout</a></li>
                    <li class="active">Add New Layout</li>
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
                        <strong class="card-title">Add Layout </strong>
                         
                    </div>
                    <div class="card-body card-block">
                        <form  action="{{ url('/admin/createlayout') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @if (\Session::has('success-sub-menu'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success-sub-menu') !!}</li>
                                </ul>
                            </div>
                            @endif
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
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class=""><label for="select" class=" form-control-label">Select
                                            Layout </label></div>
                             
                                <div class="">
                                    <select  id="layoutoption" name="layoutoption" class="form-control">
                                        <option value="0">Please Select Layout</option>
                                         <option value="backgroundcolor">Background Color</option>
                                         <option value="backgroundimage">Background Image</option> 
                                    </select>
                                </div>
                                       </div>
                   
                                <div class="col-sm-6" id="backgroudimgdiv">
                                <div class=" "><label for="title"> Select Background image</label></div>
                                <div class=""> 
                                   <input type="file" id="file-input" name="file-input" class="form-control-file" onchange="readURL1(this);">
                                </div>
                                </div>
  
                            <div class="form-group col-sm-6" id="backgroudclrdiv">
                                <label for="backgroudclr">Select Background Color</label>
                                 <div class=""> 
                                <input type="color" name="colorcode" id="colorcode">
                                <!--<textarea  name="backgroudclr" id="backgroudclr" rows="5" placeholder="" class="form-control"></textarea>-->

                                        <!-- <input type="text" class="form-control" id="metadescription" name="MetaDescription" placeholder=""> -->
                            </div>
                            </div>
                                
                            <div class="form-group col-sm-12">
                                <button type="submit" id="submitlayout" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
               <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Current Layout </strong>
                         
                    </div>
                    <div class="card-body card-block">
                       <table id="bootstrap-data-table" class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Title</th>
                                    <th>View</th>
                                     <th>Stasus</th>
                                     
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cntr = 0;
                        

                                    $cntr++;
                                    ?>
                                    <tr>
                                        <td class="srNo">
                                            <?php echo $cntr; //echo $user->product_id ;?>
                                        </td>
                                        
                                            <td>
                                            <?php echo $layoutclass_name; ?>
                                            </td>
                                            <td>
                                            <?php 
                                             if($layoutclass_name=='backgroundimage'){ ?>
                                                 <img src="../../../public/images/<?php echo $layoutbackground_image ?>" height="100px" width="100px" >
                                             <?php }elseif ($layoutclass_name=='backgroundcolor') {?>
                                                 <span style="display: block;width: 100px;background-color:<?php echo $background_color;?>">&nbsp;</span>
                                            <?php }
                                            ?>
                                            </td>
                                      
                                            <td> 
                                                <?php if ($backgroundStatus == 1) { ?>
                                        <span class="badge badge-success">Enabled</span>
                                                <?php } else { ?>
                                         <span class="badge badge-danger">Disabled </span>
                                                <?php }
                                                ?>

                                            </td>
                                             
                                               <td>  
                                                    <div class="operationsblok">
                                                <?php
                                                if($backgroundStatus == 1) { ?>
                                                <a href="deactivatelayout/{{ $backgroundId }}" id="productapprove" data-toggle="tooltip" title="Deactivate" onclick="return confirm('Are you sure to Deactivate?');">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                     
                                                <?php } else { ?>
                                             <a href="activatelayout/{{ $backgroundId }}" id="productapprove" data-toggle="tooltip" title="Activate" onclick="return confirm('Are you sure to Activate?');">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                              <?php  }   
                                                ?>
                                                    </div>
                                        </td>
                                    </tr>
 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
<!-- All Product -->



</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{ asset('/admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{ asset('/admin/assets/js/plugins.js')}}"></script>
<script src="{{ asset('/admin/assets/js/main.js')}}"></script>

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


<script type="text/javascript">
$(document).ready(function () {
    $('#bootstrap-data-table-export').DataTable();
});

</script>

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
               $('#backgroudimgdiv').hide()
               $('#backgroudclrdiv').hide()
                $('#submitlayout').prop("disabled", true);
      $("#layoutoption").on('change', function(){
       
         var val = $(this).val(); 
           if (val == 'backgroundcolor') {
               $('#backgroudimgdiv').hide()
               $('#backgroudclrdiv').show()
                $('#submitlayout').prop("disabled", false);
            }
            
            if (val == 'backgroundimage') {
                $('#backgroudimgdiv').show()
               $('#backgroudclrdiv').hide()
               $('#submitlayout').prop("disabled", true);
              
            } 
             if (val == 0) {
                $('#backgroudimgdiv').hide()
               $('#backgroudclrdiv').hide()
                $('#submitlayout').prop("disabled", true);
            }  
 
    }); 
    (function($) {
    $.fn.checkFileType = function(options) {
        var defaults = {
            allowedExtensions: [],
            success: function() {},
            error: function() {}
        };
        options = $.extend(defaults, options);

        return this.each(function() {

            $(this).on('change', function() {
                var value = $(this).val(),
                    file = value.toLowerCase(),
                    extension = file.substring(file.lastIndexOf('.') + 1);

                if ($.inArray(extension, options.allowedExtensions) == -1) {
                    options.error();
                    $(this).focus();
                } else {
                    options.success();

                }

            });

        });
    };

})(jQuery);

$(function() {
    $('#file-input').checkFileType({
        allowedExtensions: ['png'],
        success: function() {
             $('#submitlayout').prop("disabled", false);
        },
        error: function() {
           $('#submitlayout').prop("disabled", true);
           alert("Ony PNG Extention Images Allow");
        }
    });

});
</script>
</body>

</html>