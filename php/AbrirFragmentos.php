<?php
session_start(); 
require_once "DBController.php";

$id = $_SESSION["usuario_id"];
$tipo = $_POST["tipo"];
$cantidad = $_POST["cantidad"];
$porcentaje = "";

if($tipo == 4){
  $porcentaje = calcular_porcentaje_2($cantidad);
}else{
  $porcentaje = calcular_porcentaje($cantidad);
}

function calcular_porcentaje($cantidad) {
  $porcentaje = ($cantidad / 200) * 100;
  if ($porcentaje >= 100) {
    $porcentaje = 100;
  }
  return $porcentaje;
}
function calcular_porcentaje_2($cantidad) {
  $porcentaje = ($cantidad / 12) * 100;
  if ($porcentaje >= 100) {
    $porcentaje = 100;
  }
  return $porcentaje;
}

$db_handle = new DBController();

$buscarQuery = "SELECT * FROM apertura WHERE apertura_usuario = ? AND apertura_fragmento = ?";
$successQuery = $db_handle->exeQuery($buscarQuery, 'ii', array($id, $tipo));
if ($successQuery[1] > 0) {
  foreach($successQuery[0] as $row) {
    $total = $row['apertura_total'];
    $porcentajeA = $row['apertura_porcentaje'];
    $apertura = $row['apertura_actual'];
  }
  $total += $cantidad;
  $porcentajeA += $porcentaje;
  if ($porcentajeA >= 100) {
    $porcentajeA = 100;
  }
  $apertura += $cantidad;
  $query = "UPDATE `apertura` SET `apertura_total`=?,`apertura_porcentaje`=?,`apertura_actual`=? WHERE apertura_usuario = $id AND apertura_fragmento = $tipo";
  $success = $db_handle->update($query, 'idi', array($total, $porcentajeA, $apertura));
}else{
  $query = "INSERT INTO `apertura`(`apertura_usuario`, `apertura_fragmento`, `apertura_total`, `apertura_porcentaje`, `apertura_actual`) VALUES (?, ?, ?, ?, ?)";
  $success = $db_handle->insert($query, 'iiidi', array($id, $tipo, $cantidad, $porcentaje, $cantidad));
}



?>