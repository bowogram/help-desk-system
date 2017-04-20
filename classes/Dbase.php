<?php
/**
* 
*/
class Dbase{
private $hostname= "localhost";
private $user = "root";
private $password = "";
private $db_name = "hds";
public $con = null;



//print_r(PDO::getAvailableDrivers());


	//function __construct()
//	{
//		$this->connect();
        //this->con = 
  //  }

    private function connect() {
    	try{
            //global $conn;
            $conn = new PDO("mysql:host=$this->hostname; dbname=$this->db_name", $this->user, $this->password);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $ex){
    		echo "Sorry something went wrong";
    		file_put_contents('PDOErrors.txt', $ex->getMessage(), FILE_APPEND);
    	}
        return $conn;
    }


    public function getconn(){
        $connn = $this->connect();
        return $connn;
    }
}
?>