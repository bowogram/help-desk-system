<?php
//include_once("./incClass.php");
include_once("Customer.php");
include_once("Technician.php");
include_once("Admin.php");

//include_once("Helper.php");


class Login{
	public static $_login_page = "login.php";
	public static $_dashboard_page = "index2.php";
	public static $_user_id = "cid";
   
    public static $_admin_id = "admin";
    public static $_admin_login_page = "../adminlogin.php";
    
    
    
    public static $_tech_login_page = "../login.php";
    public static $_technician_id = "tid";
    
	
	
	
	
	
	public static function isLogged($case = null) {
		if (!empty($case)) {
                return isset($_SESSION[$case]) ? true : false;
            
		}
		return false;
	}
	
	
	public static function loginFront($id = null, $url = null) {
		if (!empty($id)) {
			//$url = !empty($url) ? $url : self::$_dashboard_page;
			$_SESSION[self::$_user_id] = $id;
			Helper::redirect($url);
		}
	}
	
	public static function loginAdmin($id = null, $url = null) {
		if (!empty($id)) {
			//$url = !empty($url) ? $url : self::$_dashboard_admin;
			$_SESSION[self::$_admin_id] = $id;
			Helper::redirect($url);
		}
	}
    
    
    public static function loginTechnician($id = null, $url = null) {
		if (!empty($id)) {
			//$url = !empty($url) ? $url : self::$_dashboard_admin;
			$_SESSION[self::$_technician_id] = $id;
			Helper::redirect($url);
		}
	}
    
    

	public static function restrictFront() {
		if (!self::isLogged(self::$_user_id)){
			$url = self::$_login_page;
			Helper::redirect($url);
		}
	}
            
	
    
    public static function restrictTechnician() {
		if (!self::isLogged(self::$_technician_id)) {
			$url = self::$_tech_login_page;
			Helper::redirect($url);
		}
	}
    
    public static function restrictAdmin() {
		if (!self::isLogged(self::$_admin_id)) {
			$url = self::$_admin_login_page;
			Helper::redirect($url);
		}
	}
    
    
	
	
	public static function getFullNameFront($id = null, $type=null) {
		if (!empty($id)) {
            if($type=='customer'){
                $objCus = new Customer();
                $user = $objCus->getCustomer($id);
                if (!empty($user)) {
                    return $user['first_name']." ".$user['last_name'];
                }
            }
            
            if($type=='technician'){
                $objTech = new Technician();
                $user = $objTech->getOneTechnician($id);
                if (!empty($user)) {
                    return $user['firstname']." ".$user['lastname'];
                }
            }
            
            if($type=='admin'){
                $objAdmin = new Admin();
                $user = $objAdmin->getAdmin($id);
                if (!empty($user)) {
                    return $user['firstname']." ".$user['lastname'];
                }
            }
		}
	}

	
    
    public static function logout($case = null) {
		if (!empty($case)) {
			$_SESSION[$case] = NULL;
			unset($_SESSION[$case]);
            //session_destroy();
		} else {
			session_destroy();
		}
	}
	
}
?>