<?php
include_once("incClass.php");
Helper::startSession();
Login::restrictFront();
$objPrt = new Part();
$objCp = new CustomerPart();
$objValid = new Validation();

$cid=Helper::getParam('cid');

$userInSessionId = Helper::getSession(Login::$_user_id);


	
	
	/*if (empty($category) && empty($description)){
		$objValid->add2Errors("product");
	}
	if($objValid->chkiferrempty()){
		if($objPrt->updateProduct($id, $cat_id, $category, $description)){
			Helper::redirect('addproduct.php?pid='.$cat_id);
		}else{
			Helper::redirect('error.php');
		}
	}*/



$css = $objCp->getCustomerproductstatus($userInSessionId) ;
require_once('_header.php'); 
?>
<?php require_once('_framer.php'); ?>
	
				<!-- BEGIN MAIN PAGE CONTENT -->
					<div id="page-wrapper">

						<div class="row">
							<div class="col-lg-12">
								<!-- BEGIN BREADCRUMB -->
								<div class="breadcrumbs">
									<ul class="breadcrumb">
										<li>
											<a href="index2.php">Home</a>
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
													<li><a href="#"><?php echo $userInSessionId; ?></a></li>
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
						</div>
						
						<div class="row">
									<div class="col-lg-9">
										<div class="portlet">
											<div class="portlet-heading dark">
												<div class="portlet-title">
													<h4>Form Inputs</h4>
												</div>
												<div class="portlet-widgets">
													<a data-toggle="collapse" data-parent="#accordion" href="#f-2"><i class="fa fa-chevron-down"></i></a>
												</div>
												<div class="clearfix"></div>
											</div>
											<div id="f-2" class="panel-collapse collapse in">
												<div class="portlet-body">
													<form action="" method="post">
													
													<div class="well white">
													<table id="SampleDT" class="datatable table table-hover table-striped table-bordered tc-table">
														<thead>
															<tr>
																<th data-class="expand" width="4%">checKbox</th>
																<th data-hide="phone,tablet" width="16%">Part Name</th>
																<th data-hide="phone,tablet" width="16%">Part Description</th>
																<th data-hide="phone,tablet" width="16%">Status</th>
															</tr>
														</thead>
														<tbody>
														<?php 
															if(!empty($css)){ 
																foreach($css as $cs){
																
															
															
															?>
															<tr>
																<td width="4%"></td>
																<td width="16%"><?php echo $cs['partname']; ?></td>
																<td width="16%"><?php  echo $cs['partdescription']; ?></td>
																<td width="16%">
																<?php if($cs['status']==0){ ?>
																<span class="label label-warning arrowed-in-right arrowed-in">Not fixed</span>
																<?php } ?>
																<?php if($cs['status']==1){ ?>
																<span class="label label-paid arrowed-in-right arrowed-in">Fixed</span>
																<?php } ?>
																</td>
															</tr>
															
														
															<?php
																}
															}else{
																
															
															 
															?>
															<tr>
																<td width="100%">
																You haven't requested to service any product 
																</td>
															</tr>
															<?php
															}
															?>
															
														</tbody>
														<tfoot>
															<tr>
																<td colspan="7">
																	
																	<ul class="hide-if-no-paging pagination pagination-centered pull-right"></ul>
																	<div class="clearfix"></div>
																</td>
															</tr>
													</table>
														
													</div>
													</form>
												</div>
											</div>
											
										</div>
										
									</div>
									
									<!--end of portlet-->
						</div>

<?php require_once('_footer.php'); ?>