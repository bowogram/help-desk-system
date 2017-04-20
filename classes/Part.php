<?php
include_once("Application.php");
//include_once("Helper.php");
//include_once("./incClass.php");

class Part extends Application{
    private $_table = "tb_part";
    public $_id =null;
    
    
    
    
    
    public function addPart($cat_id=null, $name=null, $description=null){
        if (!empty($cat_id) && !empty($name) && !empty($description)){
            
            $cat_id= stripslashes($cat_id);
            $name = stripslashes($name);
            $description = stripslashes($description);
            
            $con = $this->db->getconn();
            $stmt = $con->prepare("INSERT INTO $this->_table(category_id, name, description) Values (?, ?, ?)");
            
            $stmt->bindParam(1, $cat_id);
            $stmt->bindParam(2, $name);
            $stmt->bindParam(3, $description);
            
            $stmt->execute();
            return true;
        }
        
        return false;
    }
    
    
    
    public function getAllProducts($cat_id=null){
        if(!empty($cat_id)){
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table WHERE category_id = ?");
            $stmt->bindParam(1, $cat_id);
            $stmt->execute();
            $user =$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }
        
    }
    
    public function getOneProduct($id=null, $cat_id=null){
    
            if(!empty($id)){
                $con = $this->db->getconn();
                $stmt = $con->prepare("SELECT * FROM $this->_table WHERE id = ? AND category_id = ?");
                $stmt->bindParam(1, $id);
                $stmt->bindParam(2, $cat_id);
                $stmt->execute();
                $user =$stmt->fetch(PDO::FETCH_ASSOC);
                return $user;
            }
        
    }
    
    public function updateProduct($id=null, $cat_id=null, $name=null, $description=null){
        if (!empty($id)&&!empty($name) && !empty($description)){
            $con = $this->db->getconn();
            $stmt = $con->prepare("UPDATE $this->_table
            SET name = ?,
            description = ?
            WHERE id = ? AND category_id = ?");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $id);
            $stmt->bindParam(4, $cat_id);
            $stmt->execute();
            return true;
        }
         return false;
    }
       
    
}