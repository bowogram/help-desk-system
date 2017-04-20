<?php
    include_once("Application.php");
    include_once("Helper.php");
    
    class Technician extends Application{
        private $_table = "tb_technician";
       // private $_table_service = "tb_service_part";
        
        public $_id = null;
        //public $_status = null;
        
        
        public function getAllTechnicians(){
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table WHERE status=1");
            $stmt->execute();
            $user =$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        
        }
        
        public function getOneTechnician($id=null){
    
            if(!empty($id)){
                $con = $this->db->getconn();
                $stmt = $con->prepare("SELECT * FROM $this->_table WHERE id = ? AND status=1");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $user =$stmt->fetch(PDO::FETCH_ASSOC);
                return $user;
            }
        
    }
        
        
        
        public function isTechnician($email= null, $password=null){
            if(!empty($email) && !empty($password)){
                $email = $email;
                $password = Helper::string2hash($password);
                
                $con = $this->db->getconn();
                $stmt =$con->prepare("SELECT * FROM $this->_table WHERE email = ? AND password = ?");
                $stmt->bindParam(1, $email);
                $stmt->bindParam(2, $password);
                
                $stmt->execute();
                $technician = $stmt->fetch(PDO::FETCH_ASSOC);
                if(!empty($technician)){
                    $this->_id = $technician['id'];
                    return true;
                }
                return false;
            }
            return false;
        }
        
        
        public function addTechnician($firstname=null, $lastname=null, $email=null, $password=null){
            if(!empty($lastname) && !empty($firstname) && !empty($email) && !empty($password)){
                $id = $this->generateTechnicianId();
                $firstname = Helper::cleanInput($firstname); 
                $lastname = Helper::cleanInput($lastname);
                $email = $email;
                $password = Helper::string2hash($password);
                
                $con = $this->db->getconn();
                $stmt = $con->prepare("INSERT INTO $this->_table(id, firstname, lastname, email, password) Values (?, ?, ?, ?, ?)");
                
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
        
        public function updateTechStatus($tid=null){
            if(!empty($tid)){
                $con = $this->db->getconn();
                $stmt = $con->prepare("UPDATE $this->_table
                SET status = 0
                WHERE id = ?");
                $stmt->bindParam(1, $tid);
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
                
            }
        }
        
        
         public function updateTechnician($id=null, $fname=null, $lname=null, $email=null, $password=null){
        if (!empty($id)&&!empty($fname) && !empty($lname)&& !empty($email)&& !empty($password)){
            $password = Helper::string2hash($password);
            $con = $this->db->getconn();
            $stmt = $con->prepare("UPDATE $this->_table
            SET firstname = ?,
            lastname = ?,
            email = ?,
            password = ?
            WHERE id = ?");
            $stmt->bindParam(1, $fname);
            $stmt->bindParam(2, $lname);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $password);
            $stmt->bindParam(5, $id);
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
        
        
        
        public function generateTechnicianId(){
		$numchars = rand(15,15); 
		$chars = explode(',','0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z'); 
		$randomID = ''; 
		for($i = 0; $i < $numchars; $i++)  { 
			$randomID.= $chars[rand(0, count($chars) - 25)]; 
        }
		return $randomID;
	
	}
        
       
    }
?>