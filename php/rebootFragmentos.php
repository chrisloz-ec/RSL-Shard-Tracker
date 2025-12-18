<?php
session_start(); 
require_once "DBController.php";

$db_handle = new DBController();
$con = $db_handle->connectDB();

$userid = mysqli_real_escape_string($con, $_POST["user"]);
$shard = mysqli_real_escape_string($con, $_POST["shard"]);

$query = "UPDATE `apertura` SET `apertura_porcentaje`=0,`apertura_actual`=0 WHERE apertura_usuario =? AND apertura_fragmento =?";

$success = $db_handle->update($query, 'ii', array($userid, $shard));
?>