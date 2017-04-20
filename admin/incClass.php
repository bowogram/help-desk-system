<?php
function __autoload($class)
{
include_once("../classes/".$class.".php");
}
?>