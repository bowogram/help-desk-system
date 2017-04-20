<?php
include_once("Application.php");
include_once("Helper.php");
//include_once("./incClass.php");

class Admin extends Application{
    private $_table = "tb_admin";
	public $_id =null;
	
	
	public function isAdmin($email=null, $password=null){
		if (!empty($email) && !empty($password)){
            $email = $email;
            $password = $password;
            
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table WHERE email = ? AND password = ?");
   
            $stmt->bindParam(1, $email);
			$stmt->bindParam(2, $password);
            
            $stmt->execute();
			$user =$stmt->fetch(PDO::FETCH_ASSOC);
			if(!empty($user)){
				$this->_id = $user['id'];
				return true;
			
			}
            return false;
        }
        return false;
	}
    
	public function getAdmin($id=null){
		if (!empty($id)){
            
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table WHERE id = ?");
   
            $stmt->bindParam(1, $id);
			
            $stmt->execute();
			$user =$stmt->fetch(PDO::FETCH_ASSOC);
			return($user);
        }
       
	}
}

?>