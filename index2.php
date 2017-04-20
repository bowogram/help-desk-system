<?php
include_once("incClass.php");
Helper::startSession();
Login::restrictFront();
$objPro = new Product();
$objPrt = new Part();

$products = $objPro->getAllProducts() ;

require_once('_header.php'); 
?>
<?php require_once('_framer.php'); ?>
<?php 

?>
<!-- BEGIN MAIN PAGE CONTENT -->
				<div id="page-wrapper">
					<!-- BEGIN PAGE HEADING ROW -->
						<div class="row">
							<div class="col-lg-12">
								<!-- BEGIN BREADCRUMB -->
								<div class="breadcrumbs">
									<ul class="breadcrumb">
										<li>
											<a href="#">Home</a>
										</li>
										<li class="active">Dashboard</li>
									</ul>
									
									<div class="b-right hidden-xs">
										<ul>
											<li><a href="#" title=""><i class="fa fa-signal"></i></a></li>
											<li><a href="#" title=""><i class="fa fa-comments"></i></a></li>
											<li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
												<ul class="dropdown-menu dropdown-primary dropdown-menu-right">
													<li><a href="#">Add new task</a></li>
													<li><a href="#">Statement</a></li>
													<li><a href="#">Settings</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
								<!-- END BREADCRUMB -->	
								
								<div class="page-header title">
								<!-- PAGE TITLE ROW -->
									<h1>Dashboard <span class="sub-title">Content Overview</span></h1>									
								</div>
								
								<!-- /#ek-layout-button -->	
								<div class="qs-layout-menu">
									<div class="btn btn-gray qs-setting-btn" id="qs-setting-btn">
										<i class="fa fa-cog bigger-150 icon-only"></i>
									</div>
									<div class="qs-setting-box" id="qs-setting-box">
									
										<div class="hidden-xs hidden-sm">
											<span class="bigger-120">Layout Options</span>
											
											<div class="hr hr-dotted hr-8"></div>
											<label>
												<input type="checkbox" class="tc" id="fixed-navbar" />
													<span id="#fixed-navbar" class="labels"> Fixed NavBar</span>
											</label>
											<label>
												<input type="checkbox" class="tc" id="fixed-sidebar" />
													<span id="#fixed-sidebar" class="labels"> Fixed NavBar+SideBar</span>
											</label>
											<label>
												<input type="checkbox" class="tc" id="sidebar-toggle" />
													<span id="#sidebar-toggle" class="labels"> Sidebar Toggle</span>
											</label>
											<label>
												<input type="checkbox" class="tc" id="in-container" />
													<span id="#in-container" class="labels"> Inside<strong>.container</strong></span>
											</label>
										
											<div class="space-4"></div>
										</div>
										
										<span class="bigger-120">Color Options</span>
										
										<div class="hr hr-dotted hr-8"></div>
										
										<label>
											<input type="checkbox" class="tc" id="side-bar-color" />
											<span id="#side-bar-color" class="labels"> SideBar (Light)</span>
										</label>
										
										<ul>									
											<li><button class="btn" style="background-color:#d15050;" onclick="swapStyle('assets/css/themes/style.css')"></button></li>
											<li><button class="btn" style="background-color:#86618f;" onclick="swapStyle('assets/css/themes/style-1.css')"></button></li> 
											<li><button class="btn" style="background-color:#ba5d32;" onclick="swapStyle('assets/css/themes/style-2.css')"></button></li>
											<li><button class="btn" style="background-color:#488075;" onclick="swapStyle('assets/css/themes/style-3.css')"></button></li>
											<li><button class="btn" style="background-color:#4e72c2;" onclick="swapStyle('assets/css/themes/style-4.css')"></button></li>
										</ul>
										
									</div>
								</div>
								<!-- /#ek-layout-button -->		
								
							</div><!-- /.col-lg-12 -->
						</div><!-- /.row -->
					<!-- END PAGE HEADING ROW -->					
						<div class="row">
							<div class="col-lg-12">
							
								<!-- START YOUR CONTENT HERE -->
								<div class="row">
									<div class="col-lg-9 col-sm-12">

										<div class="row">
										
											<div class="col-lg-4 col-sm-4">
												<a href="#" class="tile-button btn btn-primary">
													<div class="tile-content-wrapper">
														<i class="fa fa-users"></i>
														<div class="tile-content">
															<?php
																echo "20"
															 ?>
														</div>
														<small>
															New Signup
														</small>
													</div>
												</a>												
											</div>

											<div class="col-lg-4 col-sm-4">
												<a href="#" class="tile-button btn btn-inverse">
													<div class="tile-content-wrapper">
														<i class="glyphicon glyphicon-gift"></i>
														<div class="tile-content">
															70
														</div>
														<small>
															My Domains
														</small>												
													</div>
												</a>												
											</div>

											
											<div class="col-lg-4 col-sm-4">
												<a href="#" class="tile-button btn btn-white">
													<div class="tile-content-wrapper">
														<i class="fa fa-warning text-primary"></i>
														<div class="tile-content text-primary">
															<span>$</span>270
														</div>
														<small>
															Due Invoices
														</small>
													</div>
												</a>												
											</div>
											
											
										</div>
								
										<!-- Server Info Charts .morris -->
										
										<!-- End Server Info Charts .morris -->

										
										<!-- End Statics Charts -->
										
										<!-- Recent Activities -->
										
										<!-- End Recent Activities -->
										
										<!-- Internal Chat -->
										
										<!-- End Internal Chat -->
										
									</div><!-- //col-lg-9 -->
									
									<div class="col-lg-3 col-sm-12">

										<!-- Users List -->
										
										<!-- End Users List -->
										
										<!-- Todo List -->
																				
										<!-- End Todo List -->
										
										
										<!-- Mini Calendar -->
																				
										<!-- End World Map -->

										
									</div><!-- //col-lg-3 -->
								</div>
								
								<div class="row">
									<div class="col-lg-12">
										<div class="portlet">
									<div class="portlet-heading dark">
										<div class="portlet-title">
											<h4><i class="fa fa-gears"></i>Product Categories</h4>
										</div>
										<div class="portlet-widgets">
											<a data-toggle="collapse" data-parent="#accordion" href="#notices"><i class="fa fa-chevron-down"></i></a>
										</div>
										<div class="clearfix"></div>
									</div>
									<div id="notices" class="panel-collapse collapse in">
										<div class="portlet-body">
											<div class="row">
												<?php
													if(!empty($products)){				
														foreach($products as $product){
												?>
												<div class="col-lg-7 col-sm-6">
													<a href="customerpart.php?cid=<?php echo $product['id']; ?>" class="tile-button btn btn-primary">
														<div class="tile-content-wrapper">
															<i class="fa fa-users"></i>
															<div class="tile-content">
																<?php
																echo $product['product_name'];
																 ?>
															</div>
															<small>
																<?php echo $product['product_description'] ?>
															</small>
														</div>
													</a>
												</div>
													<div class="col-lg-5 col-sm-6">
														<div class="notice bg-primary">
															<?php echo $product['product_description']; ?>
														</div>
													</div>
												<?php
														}
													}
												?>
											</div>
												
										</div>
									</div>
								</div>
									</div>
								</div>
														
								<!-- END YOUR CONTENT HERE -->
					
							</div>
						</div>
<?php require_once('_footer.php'); ?>