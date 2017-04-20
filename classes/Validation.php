<?php 
class Validation{
	
	// for storing all error ids
	private $_error = array();
	
	// validation messages
	public $_message = array(
        "el" => "cant assign empty examiner",
		"matno" => "please enter matric no",
		"firstname"	=> "Please provide your first name",
		"lastname"		=> "Please provide your last name",
		"emailempty"	=> "Please provide your email addres",
		"email"		=> "Please provide your valid email address",
		"email_duplicate" => "This email address is already taken",
		"login"	=> "Username and / or password were incorrect",
		"password"	=> "Please choose your password",
		"tac"	=> "Please accept the terms and conditions",
		"product"	=> "Please product field mustn't be empty ",
        "selectproduct"	=> "Please click on the checkbox to request for  a product ",
        "customerRequest"     =>  "please selcet one of those fields in each table",
		"confirm_password"	=> "Please confirm your password",
		"password_mismatch"	=> "Passwords did not match",
	);
	
	//private $_firstname ;
	//private $_lastname;
	//private $_email;
	//private $_password;
	//private $_confirm_password;
	
	
	
	
	public function __construct() {
		//$this->objForm = $ob
		//$this->firstname = $firstname;addLecturervalidation
		//$this->lastname = $lastname;
		//$this->firstname = $email;
		//$this->_confirm_password=
		
	}
	
	//this is the method dat set the oda methos in ths class rolling
	public function validation($firstname, $lastname, $email, $password, $confirm_password){
		$this->process($firstname, $lastname, $email, $password, $confirm_password);
		if (empty($this->_errors)){
			return true;
		}
		return false;
	}
	
	
	
	public function process($firstname, $lastname, $email, $password, $confirm_password){
		if(!empty($email)){
			$this->checkSpecial($email);
		}
		else{
			$this->add2Errors('email_empty');
		}
		
		if(empty($firstname)) $this->add2Errors('firstname');
		if(empty($lastname)) $this->add2Errors('lastname');
		if(empty($email)) $this->add2Errors('emailempty');
		if(empty($password)) $this->add2Errors('password');
		if(empty($confirm_password)) $this->add2Errors('confirm_password'); 
		//if(empty($tac)) $this->add2Errors('tac');
	}

	
    
	
	
    public function checkSpecial($email) {
			if (!$this->isEmail($email)) {
				$this->add2Errors('email');
			}
	
		
	}

	
	
	public function isEmail($email = null) {
		if (!empty($email)) {
			$result = filter_var($email, FILTER_VALIDATE_EMAIL);
			return !$result ? false : true;
		}
		return false;
	} 
	
	
	
	public function add2Errors($key) {
		$this->_errors[] = $key;
	}
	
	public function chkiferrempty(){
		if(!empty($this->_errors)){
			return false;
		}else{
			return(true);
		}
	}
	
	public function validate($key) {
		if (!empty($this->_errors) && in_array($key, $this->_errors)) {
			return $this->wrapWarn($this->_message[$key]);
		}
	}
	
	
	
	public function wrapWarn($mess = null) {
		if (!empty($mess)) {
			return "<span style='color:#900'>{$mess}</span>";
			
		}
	}
	



}



?>
