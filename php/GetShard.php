<?php 
ob_start();
session_start();

require_once "ValidacionSesion.php";


$db_handle = new DBController();
$query = "Select * from fragmentos";
$shard = $db_handle->simpleQuery($query);
//print_r($shard[0]['shard_name']);
?>
