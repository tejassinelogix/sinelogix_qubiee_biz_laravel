<html class="no-js" lang="">
    <head>
        @include('Admin.layouts.head')
    </head>
    <body>
        <div class="wrapper">
            @include('Admin.layouts.header')
            <!-- Header-->
            <!-- Header-->
            <!-- All Product -->
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
<!--                        <div class="page-title">
                            <h1>{{ __('message.All Category') }}</h1>
                        </div>-->
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="/admin/dashboard">{{ __('message.Dashboard') }}</a></li>
                                <li><a href="/admin/menu">{{ __('message.Add Category') }}</a></li>
                                <li class="active">{{ __('message.All Category') }}</li>
                            </ol>
                        </div>
                    </div>
                     <?php  
                $usertype = (Auth::user()->job_title);
                  if($usertype=="superadmin"){
                                ?>
        <a class='col-lg-offset-5 btn btn-success' href="{{ url(Request::segment(1)."/menu/") }}">Add New</a>
     <?php } ?>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">{{ __('message.All Category') }}</strong>
                                </div>
                                @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                                @endif
                                <div class="card-body card-block">
                                    <?php
                                    foreach ($category_parent_id as $user) {

                                        $category_name = json_decode($user->category_name, true);

                                        $metatitle = json_decode($user->meta_title, true);
                                        $metadescription = json_decode($user->meta_description, true);
                                        $metakeyword = json_decode($user->meta_keyword, true);
                                        ?>
                                        <!-- menu group 1 -->
                                        <div class="form-group row">
                                            <div class="col col-md-3"> <label for="title">{{ __('message.Main Category') }} </label></div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" class="form-control" id="title" value="<?php echo $category_name[$language]; ?>" placeholder="" disabled>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="operationsblok">
                                                
                                                <img src="https://qbe.demosoftwares.biz/public/images/<?php echo '/'.$user->category_image; ?>" width="35" height="35"/>

                                                
                                                    <!--                                                <a href="editmenu/{{ $user->category_id }}" data-toggle="tooltip" title="Edit">
                                                                                                        <i class="fa fa-pencil"></i>
                                                                                                    </a>-->
                                                     <?php
                                                     if($usertype=="superadmin"){
                                                      ?>
                                                    <a data-toggle="modal" data-target="#mycart-modal1" onclick="addmenumodel(<?php echo $user->category_id ?>, '<?php echo $category_name[$language]; ?>', '<?php echo $metatitle[$language]; ?>', '<?php echo $metadescription[$language]; ?>', '<?php echo $metakeyword[$language]; ?>');">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <a href="deletemenu/{{ $user->category_id }}" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure to Delete Menu?');" >
                                                        <i class="fa  fa-trash-o"></i>
                                                    </a>
                                                    <?php } ?>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="form-group row">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" form-control-label">
                                                    {{ __('message.Sub Category') }}
                                                </label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <div class="row">
                                                    <?php
                                                    foreach ($subcategory as $subcat) {
                                                        
                                                        $subcategory_name = json_decode($subcat->category_name, true);

                                                        $subcatmetatitle = json_decode($subcat->meta_title, true);
                                                        $subcatmetadescription = json_decode($subcat->meta_description, true);
                                                        $subcatmetakeyword = json_decode($subcat->meta_keyword, true);

                                                        $lang_typea = explode(',', $user->category_id);
                                                        $lang_invitee = explode(',', $subcat->category_parent_id);
                                                       
                                                        if (in_array("$lang_typea[0]", $lang_invitee)) {
                                                            ?>
                                                            <div class="col-md-8">
                                                                <input type="text" readonly="" class="form-control" id="title" value="<?php echo $subcategory_name[$language]; ?>" placeholder="">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="operationsblok">
                                                                     <?php
                                                                            if($usertype=="superadmin"){
                                                                            ?>
                                                                    <a data-toggle="modal" data-target="#mycart-modal-submenu" onclick="addsubmenumodel(<?php echo $subcat->category_id ?>, '<?php echo $subcat->category_parent_id ?>', '<?php echo $subcategory_name[$language]; ?>', '<?php echo $subcatmetatitle[$language]; ?>', '<?php echo $subcatmetakeyword[$language]; ?>', '<?php echo $subcatmetadescription[$language]; ?>');">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                    <a href="deletesubmenu/{{ $subcat->category_id }}" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure to Delete Sub-Category?');">
                                                                        <i class="fa  fa-trash-o"></i>
                                                                    </a>
                                                                            <?php } ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col col-md-3">
                                                        <label for="file-input" class=" form-control-label">

                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <div class="row">
                                                            <?php
                                                            foreach ($subcategory as $key => $mainsubsumenu) {
                                                                $mainsubsumenuname = json_decode($mainsubsumenu->category_name, true);

                                                                $mainsubmetatitle = json_decode($mainsubsumenu->meta_title, true);
                                                                $mainsubmetadescription = json_decode($mainsubsumenu->meta_description, true);
                                                                $mainsubmetakeyword = json_decode($mainsubsumenu->meta_keyword, true);
                                                                if ($subcat->category_id == $mainsubsumenu->category_parent_id) {
                                                                    ?>
                                                                    <div class="col-md-8">
                                                                        <input type="text" readonly="" class="form-control" id="title" value="<?php echo $mainsubsumenuname[$language]; ?>" placeholder="">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="operationsblok">
                                                                             <?php
                                                                            if($usertype=="superadmin"){
                                                                            ?>
                                                                            <a data-toggle="modal" data-target="#mycart-modal-submenu" onclick="addsubmenumodel(<?php echo $mainsubsumenu->category_id ?>, '<?php echo $mainsubsumenu->category_parent_id ?>', '<?php echo $mainsubsumenuname[$language]; ?>', '<?php echo $mainsubmetatitle[$language]; ?>', '<?php echo $mainsubmetakeyword[$language]; ?>', '<?php echo $mainsubmetadescription[$language]; ?>');">
                                                                                <i class="fa fa-pencil"></i>
                                                                            </a>
                                                                            <a href="deletesubmenu/{{ $mainsubsumenu->category_id }}" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure to Delete Sub-Category?');">
                                                                                <i class="fa  fa-trash-o"></i>
                                                                            </a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .animated-->

            </div><!-- .content -->
            <!-- All Menus -->

            <!-- mycart-modal for menu-->
            <div class="modal fade" id="mycart-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-header">

                            <div class="col-sm-6 enquiry-Form">
                                <h4 class="modal-title" id="myModalLabel">{{ __('message.Update Category') }}</h4>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="">

                                <form class="" action="{{ url('/admin/editmenupage') }}" method="post">
                                    {{csrf_field()}}
                                    <div class="row enquiry-Form">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <div class=""> <label for="title">{{ __('message.Title') }} </label></div>

                                                <input type="text" class="form-control" id="etitle1"  name="etitle1" placeholder="">
                                            </div>
                                            <input type="hidden" name="categoryid1" id="categoryid1">


                                            <div class="form-group col-sm-6">
                                                <label for="title">{{ __('message.Meta Title') }}</label>
                                                <input type="text" class="form-control" id="emetatitle1" name="eMetaTitle1" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="metadescription">{{ __('message.Meta Description') }}</label>
                                                <!--<textarea  name="eMetaDescription1" id="eMetaDescription1" rows="5" placeholder="" class="form-control"></textarea>-->

                                                <input type="text" class="form-control" id="eMetaDescription1" name="eMetaDescription1" placeholder=""> 
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="metakeyword">{{ __('message.Meta Keyword') }} </label>
                                                <input type="text" class="form-control" id="emetakeyword1" 
                                                       name="eMetaKeyword1" placeholder="">
                                            </div>
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" class="btn addtocart-btn  btn-lg">{{ __('message.Update') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mycart-modal for menu-->

            <!-- mycart-modal for submenu-->
            <div class="modal fade" id="mycart-modal-submenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-header">

                            <div class="col-sm-6 enquiry-Form">
                                <h4 class="modal-title" id="myModalLabel">Update Sub Category</h4>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="">

                                <form  action="{{ url('/admin/editsubmenupage') }}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row form-group">


                                        <div class="col-sm-6">
                                            <div class=" "> <label for="title"> Sub Category Title</label></div>
                                            <div class=""> 
                                                <input type="text" name="esubcategory" class="form-control" id="esubcategory"
                                                       placeholder=""></div>
                                            <input type="hidden" name="esubcategoryid" id="esubcategoryid">
                                            <input type="hidden" name="esubcategoryparentid" id="esubcategoryparentid">
                                        </div>

                                        <div class=" col-sm-6">
                                            <label for="title">Meta Title</label>
                                            <input type="text" class="form-control" id="esubmetatitle" name="eSubMetaTitle" placeholder="">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="metakeyword">Meta Keyword </label>
                                            <input type="text" class="form-control" id="esubmetakeyword" 
                                                   name="eSubMetaKeyword" placeholder="">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="metadescription">Meta Description</label>
            <!--                                <textarea  name="MetaDescription" id="metadescription" rows="5" placeholder="" class="form-control"></textarea>-->
                                            <input type="text" class="form-control" id="esubmetadescription" name="eSubMetaDescription" placeholder=""> 

                                        </div>
                                        <div class="form-group col-sm-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- mycart-modal for submenu-->

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

            <script>
                function addmenumodel(categoryid, etitle, emetatitle, emetadescription, emetakeyword) {
                    // alert(etitle);
                    $("#categoryid1").val(categoryid);
                    $("#etitle1").val(etitle);
                    $("#emetatitle1").val(emetatitle);
                    $("#eMetaDescription1").val(emetadescription);
                    $("#emetakeyword1").val(emetakeyword);
            //        $("#price").val(price);   
            //        $("#subject").val(categoryname);   
                    // $('#mycart-modal1').modal('toggle');
                    //  $('#mycart-modal1').modal('show');

                }

                function addsubmenumodel(subecategoryid, subecategoryparentid, subetitle, subemetatitle, subemetakeyword, subemetadescription) {
                    // alert(etitle);
                    $("#esubcategoryid").val(subecategoryid);
                    $("#esubcategoryparentid").val(subecategoryparentid);
                    $("#esubcategory").val(subetitle);
                    $("#esubmetatitle").val(subemetatitle);
                    $("#esubmetakeyword").val(subemetakeyword);
                    $("#esubmetadescription").val(subemetadescription);
                }
            </script>

            <script type="text/javascript">
                $("#Locale").on('change', function () {
                    var val = $(this).val();
                    $.ajax({
                        type: 'get',
                        url: "/locale/" + val,
                        success: function (data) {
                            location.reload();
                        },
                        error: function () {
                        }
                    });
                });
            </script>

<!--    <script type="text/javascript">
//$(".modal-dialog").hide();
function addmenumodel(category_id,category_name)
{
    $("#categoryid1").val(category_id);
    $("#etitle1").val(category_name); 
    $.ajax({
        type: "POST",
        url: "<?php //echo url('MenuController/view');     ?>",
        data: "category_id=" + category_id,
        success: function (response) {
            $(".displaycontent").html(response);

        }
    });
}
</script>-->
    </body>

</html>
