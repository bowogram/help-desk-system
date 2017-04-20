<?php 
include_once("incClass.php");

Helper::startSession();

Login::logout(Login::$_technician_id);
Login::restrictTechnician();  
?>