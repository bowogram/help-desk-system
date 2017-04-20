<?php
include_once("Application.php");
include_once("Helper.php");
//include_once("./incClass.php");

class Customer extends Application{
    private $_table = "tb_customer";
	public $_id =null;
	
	
    public function getAllCustomers(){
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table WHERE status=1");
            $stmt->execute();
            $user =$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        
        }
    
    
	public function isCustomer($email=null, $password=null){
		if (!empty($email) && !empty($password)){
            $email = $email;
            $password = Helper::string2hash($password);
            
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table WHERE email = ? AND password = ? AND status=1");
   
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
    
	public function getCustomer($id=null){
		if (!empty($id)){
            
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table WHERE id = ? AND status=1 ");
   
            $stmt->bindParam(1, $id);
			
            $stmt->execute();
			$user =$stmt->fetch(PDO::FETCH_ASSOC);
			return($user);
        }
       
	}
    
    
    public function addCustomer($firstname=null, $lastname=null, $email=null, $password=null){
        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)){
            $id = $this->generateCustomerId();
            $firstname = stripslashes($firstname);
            $lastname = stripslashes($lastname);
            $email = $email;
            $password = Helper::string2hash($password);
            
            $con = $this->db->getconn();
            $stmt = $con->prepare("INSERT INTO $this->_table(id, first_name, last_name, email, password) Values (?, ?, ?, ?, ?)");
            
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $firstname);
            $stmt->bindParam(3, $lastname);
            $stmt->bindParam(4, $email);
            $stmt->bindParam(5, $password);
            
            $stmt->execute();
            return true;
        }
        
        return false;
    }
    
    public function getByEmail($email = null){
        if(!empty($email)){
			
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table WHERE email = ?");
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $user =$stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
    }
    
    public function generateCustomerId(){
		$numchars = rand(10,10); 
		$chars = explode(',','0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z'); 
		$randomID = ''; 
		for($i = 0; $i < $numchars; $i++)  { 
			$randomID.= $chars[rand(0, count($chars) - 25)]; 
        }
		return $randomID;
	
	}
}

?>