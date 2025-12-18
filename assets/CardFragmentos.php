<?php 
ob_start();
require_once "ValidacionSesion.php";
require_once "GetShard.php";
$con = $db_handle->connectDB();
$userid = mysqli_real_escape_string($con, $_SESSION["usuario_id"]);

$query_card = "SELECT shard_name, shard_img, shard_porcentaje, shard_piedad, shard_aumento, apertura_usuario, apertura_fragmento, apertura_total, apertura_actual, apertura_porcentaje FROM fragmentos, apertura WHERE apertura_usuario = ? AND shard_id = apertura_fragmento";
$result = $db_handle->exeQuery($query_card, 'i', array($userid));
?>

<div class="container py-4">
  <div class="row">

    <!-- Title -->
    <div class="col-lg-12 mx-auto mb-3 text-white text-center">
      <h1 class="fs-5">Raid Pity Tracker &nbsp;
        <button type="button" class="btn btn-link text-white" data-bs-toggle="modal" data-bs-target="#modalPity"><i class="fa-regular fa-circle-question text-decoration-none"></i></button>
      </h1>
    </div>

    <!-- CARD 1 -->
    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded p-4 shadow border border-3 border-success">
        <h2 class="h6 font-weight-bold text-center mb-4">Mystery Shard</h2>
        <!-- Progress bar 3 -->
        <div class="progress mx-auto" data-value='100'>
          <span class="progress-left">
              <span class="progress-bar border-success"></span>
          </span>
          <span class="progress-right">
              <span class="progress-bar border-success"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <img src="img/<?php print_r($shard[0]['shard_img']); ?>" width="30">
            <div class="h3 font-weight-bold">&nbsp;<sup class="small"></sup></div>
          </div>
        </div>
        <!-- Demo info -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">-</div><span class="small text-gray">Remaining Shards</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">-</div><span class="small text-gray">Chance of legendary</span>
          </div>
        </div>
        <!-- Botones -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <button id="btn_x1_misterioso" class="btn btn-dark w-100" data-cantidad="1" data-tipo="1" disabled>x1</button>
          </div>
          <div class="col-6">
            <button id="btn_x10_misterioso" class="btn btn-dark w-100" data-cantidad="10" data-tipo="1" disabled>x10</button>
          </div>
        </div>
      </div>
    </div>
    <?php 
    if ($result[1] > 0) {
      foreach($result[0] as $row) {
    ?>
    <!-- CARD 2 -->
    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded p-4 shadow border border-3 border-primary">
        <h2 class="h6 font-weight-bold text-center mb-4">Ancient Shard</h2>
        <!-- Progress bar 1 -->
        <div class="progress mx-auto" data-value='80'>
          <span class="progress-left">
            <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
            <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <img src="img/<?php print_r($shard[1]['shard_img']); ?>" width="30">
            <div class="h3 font-weight-bold">&nbsp;80<sup class="small">%</sup></div>
          </div>
        </div>
        <!-- Demo info -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">200</div><span class="small text-gray">Remaining Shards</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Chance of legendary</span>
          </div>
        </div>
        <!-- Botones -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <button id="btn_x1_antiguo" class="btn btn-dark w-100" data-cantidad="1" data-tipo="2">x1</button>
          </div>
          <div class="col-6">
            <button id="btn_x10_antiguo" class="btn btn-dark w-100" data-cantidad="10" data-tipo="2">x10</button>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD 3 -->
    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded p-4 shadow border border-3 border-void">
        <h2 class="h6 font-weight-bold text-center mb-4">Void Shard</h2>
        <!-- Progress bar 2 -->
        <div class="progress mx-auto" data-value='25'>
          <span class="progress-left">
              <span class="progress-bar border-void"></span>
          </span>
          <span class="progress-right">
              <span class="progress-bar border-void"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <img src="img/<?php print_r($shard[2]['shard_img']); ?>" width="30">
            <div class="h3 font-weight-bold">&nbsp;25<sup class="small">%</sup></div>
          </div>
        </div>
        <!-- Demo info-->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">200</div><span class="small text-gray">Remaining Shards</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Chance of legendary</span>
          </div>
        </div>
        <!-- Botones -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <button id="btn_x1_vacio" class="btn btn-dark w-100" data-cantidad="1" data-tipo="3">x1</button>
          </div>
          <div class="col-6">
            <button id="btn_x10_vacio" class="btn btn-dark w-100" data-cantidad="10" data-tipo="3">x10</button>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD 4 -->
    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded p-4 shadow border border-3 border-warning">
        <h2 class="h6 font-weight-bold text-center mb-4">Sacred Shard</h2>
        <!-- Progress bar 4 -->
        <div class="progress mx-auto" data-value='12'>
          <span class="progress-left">
            <span class="progress-bar border-warning"></span>
          </span>
          <span class="progress-right">
            <span class="progress-bar border-warning"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <img src="img/<?php print_r($shard[3]['shard_img']); ?>" width="30">
            <div class="h3 font-weight-bold">&nbsp;12<sup class="small">%</sup></div>
          </div>
        </div>
        <!-- Demo info -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">12</div><span class="small text-gray">Remaining Shards</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Chance of legendary</span>
          </div>
        </div>
        <!-- Botones -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right d-grid">
            <button id="btn_x1_sagrado" class="btn btn-dark" data-cantidad="1" data-tipo="4">x1</button>
          </div>
          <div class="col-6 d-grid">
            <button id="btn_x10_sagrado" class="btn btn-dark" data-cantidad="10" data-tipo="4">x10</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/progress.js"></script> 
