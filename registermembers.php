<?php


//include_once("classes/Form.php");
//include_once("classes/Validation.php");
//include_once("classes/Customer.php");
include_once("incClass.php");

Helper::startSession();


$objForm = new Form();
$objValid = new Validation();
$objCus = new Customer();

if(isset($_POST['buttonRegister'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	if(empty($_POST['tac'])){
		$objValid->add2Errors('tac');
	}

	
	if (!empty($password) && !empty($confirm_password) && $password != $confirm_password) {
		$objValid->add2Errors('password_mismatch');
	}
	
	$customer = $objCus->getByEmail($email);

	if (!empty($customer)) {
		$objValid->add2Errors('email_duplicate');
	}
	
	if($objValid->validation($firstname, $lastname, $email, $password, $confirm_password)){
				
		if ($objCus->addCustomer($firstname, $lastname, $email, $password)) {
			Helper::redirect('thankyou.php');
		}
		else{
			Helper::redirect('error.php');
		}
	}
	
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Help DEsk sUPPPORT</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	
	<!-- PAGE LEVEL PLUGINS STYLES -->
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<link rel="stylesheet" type="text/css" href="assets/css/plugins/gritter/jquery.gritter.css" />	

    <!-- Tc core CSS -->
	<link id="qstyle" rel="stylesheet" href="assets/css/themes/style.css">
	
	
    <!-- Add custom CSS here -->

	<!-- End custom CSS here -->
	
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	
  </head>

  <body class="login">
	<div id="wrapper">
			<!-- BEGIN MAIN PAGE CONTENT -->
			
			<div class="login-container">
				<h2>
					<a href="index.html"></a><!-- can use your logo-->
				</h2>
				<!-- BEGIN LOGIN BOX -->
				
				<!-- END LOGIN BOX -->
				
				<!-- BEGIN FORGOT BOX -->
				
				<!-- END FORGOT BOX -->
				
				<!-- BEGIN REGISTRATION BOX -->
				<div id="registration-box" class="login-box visible">				
					<p class="bigger-110">
						<i class="fa fa-users"></i> New Customer Registration
					</p>
					
					<div class="hr hr-8 hr-double dotted"></div>
					
					<form method="post" action="">
						<div class="form-group">
							<div class="input-icon right">
								<?php echo $objValid->validate('firstname'); ?>
								<span class="fa fa-user text-gray"></span>
								<input type="text" class="form-control" name="firstname" placeholder="First Name">
							</div>
						</div>

						<div class="form-group">
							<div class="input-icon right">
								<?php echo $objValid->validate('lastname'); ?>
								<span class="fa fa-user text-gray"></span>
								<input type="text" class="form-control" name="lastname" placeholder="Last Name">
							</div>
						</div>

						<div class="form-group">
							<div class="input-icon right">
								<?php echo $objValid->validate('email'); ?>
								<?php echo $objValid->validate('email_duplicate'); ?>
								<?php echo $objValid->validate('emailempty'); ?>	
								<span class="fa fa-envelope text-gray"></span>
								<input type="email" class="form-control" name="email" placeholder="Email">
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-icon right">
								<?php echo $objValid->validate('password'); ?>
                         		<?php echo $objValid->validate('password_mismatch'); ?>
								<span class="fa fa-lock text-gray"></span>
								<input type="password" class="form-control" name="password" placeholder="password">
							</div>
						</div>
						<div class="form-group">
							<div class="input-icon right">
								<?php echo $objValid->validate('confirm_password'); ?>
								<span class="fa fa-repeat text-gray"></span>
								<input type="password" class="form-control" name="confirm_password" placeholder="confirm password">
							</div>
						</div>
						<div class="tcb">
							<label>
                                <?php echo $objValid->validate('tac'); ?>
								<input type="checkbox" name="tac" class="tc">
								<span class="labels"> I accept the <a href="#" data-toggle="modal" data-target="#Myterms">Terms of Servcies</a></span>
							</label>
						</div>				
						
						<p><button type="submit" class="btn btn-primary btn-line" name="buttonRegister"><i class="fa fa-key"></i>Register</button></p>
						
						<div class="footer-wrap">
								<a href="index.php"><i class="fa fa-angle-double-left"></i> Back to login</a>
						</div>							
					</form>
				</div>
				<!-- END REGISTRATION BOX -->
			</div>
			
			<!-- Modal For Terms and Conditions -->
			<div class="modal fade" id="Myterms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
						</div>
						<div class="modal-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">I Agree</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->


			<!-- END MAIN PAGE CONTENT --> 
	</div> 
	 
    <!-- core JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/plugins/pace/pace.min.js"></script>
	
	<!-- PAGE LEVEL PLUGINS JS -->
	
    <!-- Themes Core Scripts -->	
	<script src="assets/js/main.js"></script>

	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<script src="assets/js/speech-commands.js"></script>
	<script src="assets/js/plugins/gritter/jquery.gritter.min.js"></script>	
	
	<!-- initial page level scripts for examples -->	
	<script type="text/javascript">
		function show_box(id) {
			jQuery('.login-box.visible').removeClass('visible');
			jQuery('#'+id).addClass('visible');
		}
	</script>
  </body>
</html>