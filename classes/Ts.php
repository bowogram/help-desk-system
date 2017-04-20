<?php
include_once("Application.php");
include_once("CustomerPart.php");

class Ts extends Application{
	private $_table = "tb_technician_service";
    private $_table_2 = "tb_customer_part";
    private $_table_3="tb_part";
	
	 public function technicianProduct($computerPartid=null, $technicianId){
            if(!empty($computerPartid) && !empty($technicianId)){
                $objCp = new CustomerPart();
                $con = $this->db->getconn();
          
                $stmt3 = $con->prepare("INSERT INTO $this->_table(customer_part_id, technician_id) Values (?, ?)");
                $stmt3->bindParam(1, $computerPartid);
                $stmt3->bindParam(2, $technicianId);
                    
                if($stmt3->execute() && $objCp->updateCustomerPart($computerPartid)){
                    return true;
                }else{
                    return false;
                }
            }
		 
		  return false;
        }
    
    public function chkTechAssigned($tid){
        if(!empty($tid)){
            $con = $this->db->getconn();
            $stmt = $con->prepare("SELECT * FROM $this->_table WHERE technician_id = ? ");
            $stmt->bindParam(1, $tid);
            $stmt->execute();
            $tech=$stmt->fetch(PDO::FETCH_ASSOC);
                
            if(!empty($tech)){
                return true;
            }else{
                return false;
            }
            
            
        }
        else{
            return false;
        }
        
    }
    
     public function technicianView($techID){
       $workAssigned=null;
         if(!empty($techID)){
             if($this->chkTechAssigned($techID)){
            
                $techID = $techID;
                $con = $this->db->getConn();
                $stmt = $con->prepare("
                SELECT tb1.date AS requestdate, 
                tb2.name as partname, 
                tb2.description as partdescription,
                tb.id as id
                FROM $this->_table AS tb 
                JOIN  $this->_table_2 AS tb1 ON
                tb.customer_part_id=tb1.id
                JOIN $this->_table_3 AS tb2 ON
                tb1.part_id=tb2.id
                WHERE tb.technician_id=? AND tb.status=0
                ORDER BY tb1.date ASC");
                $stmt->bindParam(1, $techID);
                $stmt->execute();
                $workAssigned = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $workAssigned;
             }
             return $workAssigned;
        }
    }
    
    public function updateStatus($id){
        if(!empty($id)){
            $con = $this->db->getConn();
            $stmt = $con->prepare("UPDATE $this->_table SET status = 1 WHERE id = ?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return true;
        }else{
            return false;
        }
   
    }


}
?>
