<?php 
include_once("incClass.php");

Helper::startSession();

Login::logout(Login::$_user_id);
Login::restrictFront();  
?>