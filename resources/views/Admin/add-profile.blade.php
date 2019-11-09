
        <!-- Header-->
        <!-- All Product -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo url('/administration/dashboard') ?>">Dashboard</a></li>
                            <li class="active">Profile</li>
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
                       <form class="form-horizontal" method="post" action="{{ url('/admin/profilesave') }}" enctype="multipart/form-data">
                                {{ csrf_field()}}
                                <?php
//                                echo '<pre>';
//                                    print_r($adminProfileInfo);
//                                    print_r($adminloginProfile);
//                                    die;
                                ?>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label " for="Name">Name:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" readonly="" class="form-control" value="{{ $adminloginProfile[0]->name }}" id="name" placeholder="Enter Name" name="Name">
                                        <input type="hidden" class="form-control" value="{{ $adminloginProfile[0]->id }}" id="user_id"  name="user_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label " for="Email">Email:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" readonly=""class="form-control" value="{{ $adminloginProfile[0]->email }}" id="Email" placeholder="Enter Email" name="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="Contact">Contact
                                            No:
                                        </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="tel" class="form-control" id="Contact" <?php if ($adminProfileInfo != null) { ?>value="{{$adminProfileInfo[0]->contact}}"<?php } ?> placeholder="" name="Contact">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label " for="CompanyName">Company
                                            Name:
                                        </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="CompanyName" <?php if ($adminProfileInfo != null) { ?>value="{{$adminProfileInfo[0]->company}}"<?php } ?> placeholder="Enter Company Name" name="CompanyName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label for="Country">Country:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="Country" id="Country">
                                            <option value="0">Please Country</option>
                                            <option>India</option>
                                            <option>UAE</option>
                                            <option>US</option>
                                            <option>UK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label " for="State">State:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="State" <?php if ($adminProfileInfo != null) { ?>value="{{$adminProfileInfo[0]->state}}"<?php } ?> placeholder="" name="State">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label " for="Address">Address:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea rows="4" class="form-control" name="Address"><?php if ($adminProfileInfo != null) { ?>{{$adminProfileInfo[0]->address}}<?php } ?></textarea>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label " for="Profile">Profile Picture:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                                       <input type="hidden" name="filepath"  <?php if ($adminProfileInfo != null) { ?>value="{{$adminProfileInfo[0]->profile_pic}}"<?php } ?>>
                                    <img src="https://xtacky.com/public/images/<?php if ($adminProfileInfo != null) { ?>{{$adminProfileInfo[0]->profile_pic}}"<?php } ?> height="100px" width="100px" >
                                    </div>
                                </div>

                                <div class="SaveBtnWrapper">
                                    <button type="submit" class="btn btnSave">Save</button>
                                    <button type="reset" class="btn btnSave">Cancel</button>
                                </div>
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


</body>

</html>