<?php
include_once("incClass.php");
Helper::startSession();
Login::restrictTechnician();
//this is the code you  need to get the session of the technician-->
//--------------------------------------------------------------
$techInSessionId = Helper::getSession(Login::$_technician_id);
//---------------------------------------------------------------

$objTs = new Ts();
$objCp = new CustomerPart();
$objTech = new Technician();
$objValid = new Validation();

//$id=Helper::getParam('id');

if(isset($_POST['update'])){
	if(isset($_POST['switch'])){
		$switches = $_POST['switch'];
		$boo = false;
		foreach($switches as $switch){
			$boo = $objTs->updateStatus($switch);
		}
			if(is_bool($boo)==true){
				Helper::redirect('tech.php');
			}else{
				Helper::redirect('error.php');
			}
		}
}
		
	
	


$techs = $objTech->getAllTechnicians();
$cps = $objCp->getCustomerRequest();
$works = $objTs->technicianView($techInSessionId);
require_once('_aheader.php'); 
?>
<?php require_once('_aframer.php'); ?>
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
											<a href="#">Home <?php echo $techInSessionId; ?></a>
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
										
									</div>
								</div>
								
										<!-- Server Info Charts .morris -->
										
										<!-- End Server Info Charts .morris -->

										
										<!-- End Statics Charts -->
										
										<!-- Recent Activities -->
								<div class="row">
								<form method="post" action="">
									<div class="col-lg-10 col-sm-12">
										<div class="portlet no-border-bottom">
											<div class="portlet-heading dark">
												<div class="portlet-title">
													<h4><i class="fa fa-list-ul"></i> Customer Request</h4>
												</div>
												<div class="portlet-widgets">
													<a data-toggle="collapse" data-parent="#accordion" href="#recent"><i class="fa fa-chevron-down"></i></a>
												</div>
												<div class="clearfix"></div>
											</div>
											<div id="recent" class="panel-collapse collapse in">
												<div class="portlet-body no-padding">
												<?php //echo $objValid->validate('customerRequest'); ?>
													<div class="tc-tabs no-margin">
														<ul class="nav nav-tabs tab-small-button no-padding">
															<li class="active"><a href="#tab14" data-toggle="tab"><i class="fa fa-bell-o bigger-130"></i></a></li>
															<li><a href="#tab15" data-toggle="tab"><i class="fa fa-ticket bigger-130"></i></a></li>
															<li><a href="#tab16" data-toggle="tab"><i class="fa fa-users bigger-130"></i><span class="badge badge-primary">0</span></a></li>
														</ul>
														
														<div class="tab-content no-padding no-border-left no-border-right no-border-bottom">
															<div class="tab-pane active" id="tab14">
																
																<div class="well white">
													<table id="SampleDT" class="datatable table table-hover table-striped table-bordered tc-table">
														<thead>
															<tr>
																
                                                                <th data-hide="phone,tablet" width="15%">S/N</th>
																<th data-hide="phone,tablet" width="20%">Date</th>
																<th data-hide="phone,tablet" width="25%">Computer Part</th>
                                                                <th data-hide="phone,tablet" width="30%">Description</th>
                                                                <th data-class="expand" width="10%">Fixed</th>
																
															</tr>
														</thead>
														<tbody>
														<?php 
															     
                                                            if(!empty($works)){
                                                                $count = 0;
																foreach($works as $work){
																    
																		
															?>
															<tr>
																<td width="10%"><?php echo ++$count ?></td>
																<td width="25%"><?php echo $work['requestdate'] ?></td>
																<td width="30%"><?php echo $work['partname'] ?></td>
																<td width="30%"><?php echo $work['partdescription'] ?></td>
																<td width="5%"><label>
																			<input name="switch[]" class="tc tc-switch" value="<?php echo $work['id']  ?>" type="checkbox" />
																			<span class="labels"></span>
																		</label></td>
															</tr>
																<?php
															 
                                                                }
                                                            } else{ 
															 
															?>
                                                            <tr>
                                                                <td width="25%"></td>
															     <td width="50%" colspan="2"><b>No data available now</b></td>
                                                                <td width="25%"></td>
                                                            </tr>
                                                            <?php
                                                            } ?>
														</tbody>
														<tfoot>
															<tr>
																<td colspan="7">
																	<div class="btn-group btn-group-sm pull-right">
																		<button type="submit" class="btn btn-primary btn-line pull-right" name="update">
																			<i class="fa fa-key"></i> UPDATE STATUS
																		</button>
																	</div>
																	<ul class="hide-if-no-paging pagination pagination-centered pull-right"></ul>
																	<div class="clearfix"></div>
																</td>
															</tr>
														</tfoot>
													</table>
														
													</div>
																
															</div>
															
															
															
														</div>
														
													</div>
												</div>
												
											</div>
										</div>
										<!-- End Recent Activities -->
										
										<!-- Internal Chat -->
										
										<!-- End Internal Chat -->
										
									</div><!-- //col-lg-9 -->
									
									
									<!-- //col-lg-3 -->
									</form>
								</div>
								
								
														
								<!-- END YOUR CONTENT HERE -->
					
							</div>
						</div>
<?php require_once('_afooter.php'); ?>