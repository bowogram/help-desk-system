<?php
$adminInSessionId = Helper::getSession(Login::$_admin_id);


 ?>
 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>eKoders - Responsive Admin Theme</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		
	<!-- PAGE LEVEL PLUGINS STYLES -->	
	<link href=" assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href=" assets/css/plugins/morris/morris.css" rel="stylesheet">
	<link rel="stylesheet" href=" assets/css/plugins/bootstrap-datepicker/datepicker.css">
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<link rel="stylesheet" type="text/css" href=" assets/css/plugins/gritter/jquery.gritter.css" />

    <!-- Tc core CSS -->
	<link id="qstyle" rel="stylesheet" href=" assets/css/themes/style.css">
	
	
    <!-- Add custom CSS here -->
	<link rel="stylesheet" href=" assets/css/only-for-demos.css">

	<!-- End custom CSS here -->
	
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	
	<!--[if lte IE 8]>
	<script src="assets/js/plugins/easypiechart/easypiechart.ie-fix.js"></script>
	<![endif]-->
	
  </head>

  <body>
	<div id="wrapper">
		<div id="main-container">		
			<!-- BEGIN TOP NAVIGATION -->
				<nav class="navbar-top" role="navigation">
					<!-- BEGIN BRAND HEADING -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".top-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<div class="navbar-brand">
							<a href="index2.php">
								<?php// echo Login::getFullNameFront($userInSessionId );?>
							</a>
						</div>
					</div>
					<!-- END BRAND HEADING -->
					<div class="nav-top">
						<!-- BEGIN RIGHT SIDE DROPDOWN BUTTONS -->
							<ul class="nav navbar-right">
								<li class="dropdown">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
										<i class="fa fa-bars"></i>
									</button>
								</li>
								
								
								
								<!--Speech Icon-->
								
								<!--Speech Icon-->
								<li class="dropdown user-box">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img class="img-circle" src="<?php //echo "account/" . $userInSessionId . ".jpg"; ?>" alt="User Images" width="32px" height="32px"> <span class="user-info"><?php echo Login::getFullNameFront($adminInSessionId, $type="admin" );?></span> <b class="caret"></b>
									</a>
										<ul class="dropdown-menu dropdown-user">
											<li>
												<a href="?page=myProfile&tb=p1&fn=&em=&ph=&nm=&fb=&ct=1&ad=">
													<i class="fa fa-user"></i> My Profile
												</a>
											</li>
																						
											<li>
												<a href="logout.php">
													<i class="fa fa-power-off"></i> Logout
												</a>
											</li>
										</ul>
								</li>
								<!--Search Box-->
								<li class="dropdown nav-search-icon">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<span class="glyphicon glyphicon-search"></span>
									</a>
									<ul class="dropdown-menu dropdown-search">
										<li>
											<div class="search-box">
												<form class="" role="search">
													<input type="text" class="form-control" placeholder="Search" />
												</form>
											</div>
										</li>
									</ul>
								</li>
								<!--Search Box-->
							</ul>
						<!-- END RIGHT SIDE DROPDOWN BUTTONS -->
						
						<!-- BEGIN TOP MENU -->
							<div class="collapse navbar-collapse top-collapse">
								<!-- .nav -->
								<ul class="nav navbar-left navbar-nav">
									<li><a href="?page=index">Dashboard</a></li>
									
								</ul><!-- /.nav -->
							</div>
						<!-- END TOP MENU -->
						
					</div><!-- /.nav-top -->
				</nav><!-- /.navbar-top -->
				<!-- END TOP NAVIGATION -->