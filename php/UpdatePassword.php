<?php 
session_start(); 
require_once "DBController.php";

$id = trim($_POST['usuario']);
$password = trim($_POST['password']);
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$db_handle = new DBController();

$query = "UPDATE `usuarios` SET `usuario_password`= ? WHERE usuario_id = ?";
$success = $db_handle->update($query, 'si', array($password_hash, $id));
 ?>