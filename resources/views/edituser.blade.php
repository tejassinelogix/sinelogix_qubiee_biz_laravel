<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
     <link href="{{ asset('/public/assets/css/bootstrap.min.css') }} " rel="stylesheet">
   <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" />-->

    <!-- Animation library for notifications   -->
         <link href="{{ asset('/public/assets/css/animate.min.css') }} " rel="stylesheet">
    <!--<link href="assets/css/animate.min.css" rel="stylesheet"/>-->

    <!--  Light Bootstrap Table core CSS    -->
      <link href="{{ asset('/public/assets/css/light-bootstrap-dashboard.css') }} " rel="stylesheet">
   <!-- <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>-->


    <!--  CSS for Demo Purpose, don't include it in your project     -->
     <link href="{{ asset('/public/assets/css/demo.css') }} " rel="stylesheet">
    <!-- <link href="assets/css/demo.css" rel="stylesheet" /> -->


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
       <link href="{{ asset('/public/assets/css/pe-icon-7-stroke.css') }} " rel="stylesheet">
  <!--   <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" /> -->
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li>
                  <a href="<?php echo url('/home');?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                   <a href="<?php echo url('/create_task');?>">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                 <a href="<?php echo url('/user_list');?>">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">User</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="<?php echo url('/');?>">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                            <form action = "/edit/<?php echo $users[0]->user_id; ?>" method = "post">
                                <!-- <form action="<?php //echo url('/editrecored') ?>" method="post"> -->
                                

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Company" value = '<?php echo$users[0]->name; ?>'/>
                         <input type="hidden" id="user_id" name="user_id" value = '<?php echo$users[0]->user_id; ?>'/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value = '<?php echo$users[0]->lastname; ?>'/>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" value = '<?php echo$users[0]->mobile_number; ?>'/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Home Address" value = '<?php echo$users[0]->address; ?>'/>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="Username" id="Username"placeholder="Username" value = '<?php echo$users[0]->Username; ?>'/>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="Password" id="Password" class="form-control" placeholder="Password" value = '<?php echo$users[0]->Password; ?>'/>
                                            </div>
                                        </div>
                                            <div class="row">
                                       <!--  <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company (disabled)</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="Creative Code Inc.">
                                            </div>
                                        </div> -->
                                     <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value = '<?php echo$users[0]->email_id; ?>'/>
                                            </div>
                                        </div>
                                    </div>

                                 <!--    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" value="Mike">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code">
                                            </div>
                                        </div>
                                    </div> -->

                                <!--     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div> -->

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('/public/assets/js/jquery-1.10.2.js') }} "></script>
   <!--  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
    <script src="{{ asset('/public/assets/js/bootstrap.min.js') }} "></script>
<!-- 	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script> -->

	<!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('/public/assets/js/bootstrap-checkbox-radio-switch.js') }} "></script>
	<!-- <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script> -->

	<!--  Charts Plugin -->
        <script src="{{ asset('/public/assets/js/chartist.min.js') }} "></script>
	<!-- <script src="assets/js/chartist.min.js"></script> -->

    <!--  Notifications Plugin    -->
            <script src="{{ asset('/public/assets/js/bootstrap-notify.js') }} "></script>
   <!--  <script src="assets/js/bootstrap-notify.js"></script> -->

    <!--  Google Maps Plugin    -->

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
     <script src="{{ asset('/public/assets/js/light-bootstrap-dashboard.js') }} "></script>
<!-- 	<script src="assets/js/light-bootstrap-dashboard.js"></script> -->

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
     <script src="{{ asset('/public/assets/js/demo.js') }} "></script>
	<!-- <script src="assets/js/demo.js"></script> -->

</html>