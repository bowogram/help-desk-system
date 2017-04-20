<?php
include_once("classes/Application.php");
include_once("classes/Customer.php");
include_once("classes/Product.php");
//$app = new Application();
$fn='dd';
$ln='aa';
$e="grp2@yy.com";
$p = 'wdssd';

//$cus = new Customer();
//$u = $cus->getByEmail($e);
//foreach($u as $v){
    //this only works with d pdo statement fetchALL()
//echo $v['last_name']."</br>";
//}

$tec = new Product();
$t = $tec->getAllProducts();
//echo sizeof($t);

while($a = $t(PDO::FETCH_ASSOC)){
    echo $a['product_name'];
}

/*for($i=0; $i<sizeof($t);$i++){
    
    echo "-------------------------<br>";
    $c=$t[$i];
    print_r($c);
    echo "<br>";
    while($c=$t[$i]){
   // for($a=$c; $a<sizeof($c); $a++){
        echo $c['product_name'];
    }
    
    
    
    
    //print_r($t);
//echo "<br>";
//print_r($t[0]); 
//echo "<br>";
//print_r($t[1]); 
}
*/
?>