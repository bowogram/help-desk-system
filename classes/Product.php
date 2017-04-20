<?php
include_once("Application.php");
//include_once("Helper.php");
//include_once("./incClass.php");

class Product extends Application{
    private $_table = "tb_product_category";
    public $_id =null;
    
    
    
    
    
    public function addProduct($name=null, $description=null){
        if (!empty($name) && !empty($description)){
            
            $name = stripslashes($name);
            $description = stripslashes($description);
            
            $con = $this->db->getconn();
            $stmt = $con->prepare("INSERT INTO $this->_table(product_name, product_description) Values (?, ?)");
            
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $description);
            
            $stmt->execute();
            return true;
        }
        
        return false;
    }
    
    public function getAllProducts(){
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table");
            $stmt->execute();
            $user =$stmt->fetchAll();
            return $user;
        
    }
    
    public function getOneProduct($id=null){
    
            if(!empty($id)){
                $con = $this->db->getconn();
                $stmt = $con->prepare("SELECT * FROM $this->_table WHERE id = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $user =$stmt->fetch(PDO::FETCH_ASSOC);
                return $user;
            }
        
    }
    
    public function updateProduct($id=null, $name=null, $description=null){
        if (!empty($id)&&!empty($name) && !empty($description)){
            $con = $this->db->getconn();
            $stmt = $con->prepare("UPDATE $this->_table
            SET product_name = ?,
            product_description = ?
            WHERE id = ?");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $id);
            $stmt->execute();
            return true;
        }
         return false;
    }
       
    
}