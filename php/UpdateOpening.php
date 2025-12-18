<?php 
session_start(); 
require_once "DBController.php";

$user = trim($_POST['user']);
$shard = trim($_POST['shard']);
$current = trim($_POST['current']);

$porcentaje = "";

if($shard == 4){
  $porcentaje = calcular_porcentaje_2($current);
}else{
  $porcentaje = calcular_porcentaje($current);
}

function calcular_porcentaje($current) {
  $porcentaje = ($current / 200) * 100;
  if ($porcentaje >= 100) {
    $porcentaje = 100;
  }
  return $porcentaje;
}
function calcular_porcentaje_2($current) {
  $porcentaje = ($current / 12) * 100;
  if ($porcentaje >= 100) {
    $porcentaje = 100;
  }
  return $porcentaje;
}

$db_handle = new DBController();

$query = "UPDATE `apertura` SET `apertura_actual`= ?, `apertura_porcentaje` = ? WHERE apertura_usuario = ? AND apertura_fragmento = ?";
$success = $db_handle->update($query, 'idii', array($current, $porcentaje, $user, $shard));
?>