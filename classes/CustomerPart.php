<?php
    include_once("Application.php");
    include_once("Helper.php");
    
class CustomerPart extends Application{
	
    private $_table = "tb_customer_part";
    private $_table2 = "tb_part";
    private $_table3 = "tb_customer";
    private $_table4 = "tb_technician_service";
        
        public function addCustomerPart($customer_id, $part_id){
            if(!empty($customer_id) && !empty($part_id)){
                $customer_id = $customer_id;
                $part_id = $part_id;
                $con = $this->db->getConn();
                $stmt = $con->prepare("INSERT INTO $this->_table(customer_id, part_id) VALUES(?, ?)");
                $stmt->bindParam(1, $customer_id);
                $stmt->bindParam(2, $part_id);
                
                $stmt->execute();
                return true;
            }
            return false;
        }
        
        public function updateCustomerPart($id){
        
            if(!empty($id)){
                $id = $id;
                $con = $this->db->getConn();
                $stmt = $con->prepare("UPDATE $this->_table 
                SET assigned = 1  
                WHERE id = ?");
               // $stmt->bindParam(1, 1);
                $stmt->bindParam(1, $id);
                
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }
            return false;
        }
    
    
    public function getCustomerRequest(){
        
        $con = $this->db->getConn();
                $stmt = $con->prepare("SELECT 
                tb3.first_name AS cus_fname,
                tb3.last_name AS cus_lname,
                tb2.name AS partname,
                tb.date AS date,
                tb.assigned AS assigned,
                tb.id AS id 
                FROM $this->_table AS tb JOIN $this->_table2 AS tb2 ON tb.part_id=tb2.id JOIN $this->_table3 AS tb3 ON tb.customer_id=tb3.id ORDER BY tb.date ASC
                
                ");
        $stmt->execute();
        $customerpart = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $customerpart;
        
    } 
    
    public function getCustomerproductstatus($uid){
        if(!empty($uid)){
            $con = $this->db->getConn();
            $stmt = $con->prepare("SELECT
                tb2.name AS partname,
                tb2.description AS partdescription,
                tb4.status AS status
                
                FROM $this->_table AS tb
                JOIN $this->_table2 AS tb2 ON
                tb.part_id=tb2.id JOIN $this->_table4 AS tb4 ON tb.id=tb4.customer_part_id
                WHERE tb.customer_id= ? 
                ORDER BY tb.date ASC
                ");
            $stmt->bindParam(1, $uid);
            $stmt->execute();
            $customerStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $customerStatus;
        }
    }

    
}
?>