<?php
include_once("incClass.php");
Helper::startSession();
Login::restrictAdmin();

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
						</div>
						
						<div class="row">
									<div class="col-lg-6">
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
												
													<table class="table table-bordered table-striped table-hover tc-table table-primary footable" data-page-size="4">
														<thead>
															<tr>
																<th class="col-small center" data-sort-ignore="true"><label><input type="checkbox" class="tc"><span class="labels"></span></label></th>
																<th data-toggle="true">User</th>
																<th data-hide="phone,tablet">Referred</th>
																<th data-hide="phone,tablet">Clicks</th>
																<th data-hide="phone,tablet"><i class="fa fa-dollar"></i> Earned</th>
																<th>Status</th>
																<th data-sort-ignore="true"></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="col-small center"><label><input type="checkbox" class="tc"><span class="labels"></span></label></td>
																<td>Mark</td>
																<td>35</td>
																<td>387</td>
																<td>$70</td>
																<td><span class="label label-paid arrowed-in-right arrowed-in">Paid</span></td>
																<td class="col-small center">
																	<div class="action-buttons">
																		<a href="#" data-placement="left" data-rel="tooltip" title="View"><i class="fa fa-search-plus bigger-130"></i></a>
																	</div>	
																</td>
															</tr>
															<tr>
																<td class="col-small center"><label><input type="checkbox" class="tc"><span class="labels"></span></label></td>
																<td>Jacob</td>
																<td>130</td>
																<td>769</td>
																<td>$206</td>
																<td><span class="label label-pending arrowed-in-right arrowed-in">Pending</span></td>
																<td class="col-small center">
																	<div class="action-buttons">
																		<a href="#" data-placement="left" data-rel="tooltip" title="View"><i class="fa fa-search-plus bigger-130"></i></a>
																	</div>	
																</td>
															</tr>
															<tr>
																<td class="col-small center"><label><input type="checkbox" class="tc"><span class="labels"></span></label></td>
																<td>lee</td>
																<td>56</td>
																<td>537</td>
																<td>$95</td>
																<td><span class="label label-warning arrowed-in-right arrowed-in">Review</span></td>
																<td class="col-small center">
																	<div class="action-buttons">
																		<a href="#" data-placement="left" data-rel="tooltip" title="View"><i class="fa fa-search-plus bigger-130"></i></a>
																	</div>	
																</td>
															</tr>
															<tr>
																<td class="col-small center"><label><input type="checkbox" class="tc"><span class="labels"></span></label></td>
																<td>Tom</td>
																<td>26</td>
																<td>190</td>
																<td>$46</td>
																<td><span class="label label-fraud arrowed-in-right arrowed-in">Fraud</span></td>
																<td class="col-small center">
																	<div class="action-buttons">
																		<a href="#"  data-placement="left" data-rel="tooltip" title="View"><i class="fa fa-search-plus bigger-130"></i></a>
																	</div>	
																</td>
															</tr>
														</tbody>
														<tfoot>
															<tr>
																<td colspan="7">
																	<div class="btn-group btn-group-sm pull-left">
																		<button class="btn btn-primary dropdown-toggle hidden-xs" data-toggle="dropdown">
																			with Selected <span class="caret"></span>
																		</button>
																		<button class="btn btn-primary dropdown-toggle visible-xs" data-toggle="dropdown">
																			<i class="fa fa-cog icon-only"></i>
																		</button>
																		<ul class="dropdown-menu dropdown-primary" role="menu">
																			<li><a href="#">Action</a></li>
																			<li><a href="#">Another action</a></li>
																			<li class="divider"></li>
																			<li><a href="#">Separated link</a></li>
																		</ul>
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
									
									<!--end of portlet-->
						</div>


<?php require_once('_footer.php'); ?>