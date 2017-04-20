<?php
include_once("incClass.php");
Helper::startSession();
Login::restrictAdmin();

$objForm = new Form();
$objValid = new Validation();
$objTech = new Technician();
$objCus = new Customer();
//$objTs = new TechnicianService();

//$cat_id=Helper::getParam('pid');
$id=Helper::getParam('id');
//echo $id;

if($objForm->isPost('buttonUpdate')){
	$firstname = $objForm->getPost('firstname');
	$lastname = $objForm->getPost('lastname');
	$email = $objForm->getPost('email');
	$password = $objForm->getPost('password');
	
	if(empty($firstname)) $objValid->add2Errors['firstname'];
	if(empty($lastname)) $objValid->add2Errors['lastname'];
	
	if(empty($email)) $objValid->add2Errors['emailempty'];
	
	if(empty($password)) $objValid->add2Errors['password'];
	//echo $category;
	if($objValid->chkiferrempty()){
		if($objTech->updateTechnician($id, $firstname, $lastname, $email, $password)){
			Helper::redirect('addTechnician.php');
		}else{
			Helper::redirect('error.php');
		}
	}
}

if(isset($_POST['remove'])){
	$tid = $_POST['tid'];
	if($objTech->updateTechStatus($tid)){
		Helper::redirect('addTechnician.php');
	}
	
	Helper::redirect('addTechnician.php');
}

if($objForm->isPost('buttonCreate')){
	//echo "create";
	$firstname = $objForm->getPost('firstname');
	$lastname = $objForm->getPost('lastname');
	$email = $objForm->getPost('email');
	$password = $objForm->getPost('password');
	
	if(empty($firstname)) $objValid->add2Errors['firstname'];
	if(empty($lastname)) $objValid->add2Errors['lastname'];
	
	if(empty($email)) $objValid->add2Errors['emailempty'];
	else{
		$techemail = $objTech->getByEmail($email);
		if(!empty($techemail)) $objValid->add2Errors('email_duplicate');
		}
	if(empty($password)) $objValid->add2Errors['password'];
	//echo $category;
	if($objValid->chkiferrempty()){
		if($objTech->addTechnician($firstname, $lastname, $email, $password)){
			Helper::redirect('addTechnician.php');
		}else{
			Helper::redirect('error.php');
		}
	} 
}
if(!empty($id)){
	$tech = $objTech->getOneTechnician($id);
}
$customers = $objCus->getAllCustomers();
$techs = $objTech->getAllTechnicians() ;
require_once('_aheader.php'); 
?>
<?php require_once('_aframer.php'); ?>
								
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
						
						<!--form begins here-->
						<div class="row">
									<div class="col-lg-6">
										<div class="portlet">
											<div class="portlet-heading dark">
												<div class="portlet-title">
													<h4>Form Inputs</h4>
												</div>
												<div class="portlet-widgets">
													<a data-toggle="collapse" data-parent="#accordion" href="#f-1"><i class="fa fa-chevron-down"></i></a>
												</div>
												<div class="clearfix"></div>
											</div>
											<div id="f-1" class="panel-collapse collapse in">
												<div class="portlet-body">
													<form class="form-horizontal" role="form" method="post">
													<div class="form-group">
													<div class="col-sm-12">
														<div class="input-icon right">
															<?php echo $objValid->validate('firstname'); ?>
															<span class="fa fa-user text-gray"></span>
															<input type="text" id="firstname" class="form-control"  name="firstname" placeholder="First Name" value="<?php if(!empty($id)) echo $tech['firstname']; else echo '';?>" required>
														</div>
													</div>
													</div>
													
													<div class="form-group">
														<div class="col-sm-12">
															<div class="input-icon right">
																<?php echo $objValid->validate('lastname'); ?>
																<span class="fa fa-user text-gray"></span>
																<input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last NAme" value="<?php if(!empty($id)) echo $tech['lastname']; else echo '';?>" required>
															</div>
														</div>
													</div>
													
													<div class="form-group">
														<div class="col-sm-12">
															<div class="input-icon right">
																<?php echo $objValid->validate('email_duplicate'); ?>
																<?php echo $objValid->validate('emailempty'); ?>
																<span class="fa fa-user text-gray"></span>
																<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(!empty($id)) echo $tech['email']; else echo '';?>" required>
															</div>
														</div>
													</div>
													
													<div class="form-group">
														<div class="col-sm-12">
															<div class="input-icon right">
															<?php if(!empty($id)) echo 'disable=""'; else echo '';?>
																<span class="fa fa-user text-gray"></span>
																<input type="text" id="password" class="form-control" name="password" placeholder="Password" value="<?php if(!empty($id)) echo $tech['firstname'].''.$tech['lastname']; else echo '';?>" 
																<?php
																//if(!empty($id)) echo 'disabled=""'; else echo"";
																?>  readonly
																>
															</div>
														</div>
													</div>
													
													<?php if(!empty($id)) echo  "buttonUpdate"; else echo "buttonCreate"; ?>
													
													<div class="form-group">
														<div class="col-sm-12">
															<p>
																<button type="submit" class="btn btn-primary btn-line pull-right" name=
																 <?php if(!empty($id)) echo "buttonUpdate";
																	else echo "buttonCreate";?>>
																	<i class="fa fa-key"></i>
																	 <?php if(!empty($id)) echo "buttonUpdate"; 
																	else echo "buttonCreate"; ?>
																</button>
															</p>
														</div>
													</div>
													
													<div class="form-group">
														<div class="col-sm-12">
															<p>
															<?php
																if(!empty($id)){
																	echo '<a href="addtechnician.php" title=""><i class="fa fa-signal"></i></a>';
																}
																else{
																	echo("");
																}
															?>
															</p>
														</div>
													</div>
													
													</form>
												</div>
											</div>
										</div>
									</div>
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
												
													<div class="well white">
														<table id="SampleDT" class="datatable table table-hover table-striped table-bordered tc-table">
															<thead>
																<tr>
																	<th data-class="expand" width="10%">sn</th>
																	<th data-hide="phone,tablet" width="30%">First Name</th>
																	<th data-hide="phone,tablet" width="30%">Last Name</th>
																	<th data-hide="phone,tablet" width="30%">Email</th>
																	<th data-hide="phone,tablet" width="10%">settings</th>
																</tr>
															</thead>
															<tbody>
															<?php
																$count=0;
																if(!empty($techs)){
																foreach($techs as $tech){
																	
															?>
																<tr>
																	<td><?php echo ++$count ?></td>
																	<td><?php echo $tech['firstname']; ?></td>
																	<td><?php echo $tech['lastname']; ?></td>
																	<td><?php echo $tech['email']; ?></td>
																	<td>
																	<div>
																	<div class="btn-group">
																		<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
																			<i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
																		</a>
																		<ul role="menu" class="dropdown-menu pull-right">
																			<li role="presentation">
																				<a role="menuitem" tabindex="-1" href="addtechnician.php?id=<?php echo $tech['id'] ?>">
																					<i class="glyphicon glyphicon-pencil"></i>Edit Technician
																				</a>
																			</li>
																			
																			<li role="presentation">
																			<form action="" method="post">
																			<input type="hidden" name="tid" value="<?php echo $tech['id'] ?>"> 
																				<button type="submit" class="btn btn-primary btn-line pull-right" name="remove">remove user</button>
																			</form>
																			</li>
																			
																		</ul>
																	</div>
																</div>
																</td>
																</tr>
																<?php }}
																else{
																?>
																<tr>
																	<td>sn</td>
																	<td>empty</td>
																	<td>empty</td>
																	<td>empty</td>
																	<td>
																	<div>
																	<div class="btn-group">
																		<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
																			<i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
																		</a>
																		<ul role="menu" class="dropdown-menu pull-right">
																			<li role="presentation">
																				<a role="menuitem" tabindex="-1" href="">
																					<i class="glyphicon glyphicon-pencil"></i>Edit Product
																				</a>
																			</li>
																			
																		</ul>
																	</div>
																</div>
																</td>
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
													
												</div>
											</div>
											
										</div>
										
									</div>
									
									<!--end of portlet-->
						</div>
	<script>
		const firstname = document.getElementById('firstname');
		const lastname = document.getElementById("lastname");
		const result = document.getElementById('password');
		
		lastname.addEventListener('blur',go);
		// lastname.addEventListener('blur',function(){
		// 	go();
		// });
		function go(){
			console.log(firstname.value + lastname.value);
			result.value = firstname.value + lastname.value;
		}
		
	</script>
	<script src="assets/js/plugins/bootbox/bootbox.min.js"></script>
	<script src="assets/js/plugins/gritter/jquery.gritter.min.js"></script>
	<script src="assets/js/plugins/bootstrap-rating/bootstrap-rating-input.min.js"></script>
	<script src="assets/js/plugins/easypiechart/jquery.easypiechart.min.js"></script>
	
	<script src="assets/js/plugins/slimscroll/jquery.slimscroll.init.js"></script>
	<script src="assets/js/plugins/bootbox/demo-modals.js"></script>
	<script src="assets/js/plugins/gritter/demo-gritter-notice.js"></script>
	<script src="assets/js/plugins/easypiechart/jquery.easypiechart.init.js"></script>
<?php require_once('_afooter.php'); ?>