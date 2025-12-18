<?php 
ob_start();
require_once "ValidacionSesion.php";
require_once "GetShard.php";
$con = $db_handle->connectDB();
$userid = mysqli_real_escape_string($con, $_SESSION["usuario_id"]);

$query_card = "SELECT shard_name, shard_img, shard_porcentaje, shard_piedad, shard_aumento, apertura_usuario, apertura_fragmento, apertura_total, apertura_actual, apertura_porcentaje, shard_color FROM fragmentos C LEFT JOIN apertura O ON C.shard_id = O.apertura_fragmento AND O.apertura_usuario = ? ORDER BY shard_id";

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

    
    <?php 
    if ($result[1] > 0) {
      $i = 1;
      foreach($result[0] as $row) {
    ?>
    <!-- CARD -->
    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded p-4 shadow border border-3 border-<?php echo $row['shard_color']; ?>">
        <h2 class="h6 font-weight-bold text-center mb-4"><?php echo $row['shard_name']; ?></h2>
        <!-- Progress bar 1 -->
        <div class="progress mx-auto" data-value='<?php echo $row['apertura_porcentaje']; ?>'>
          <span class="progress-left">
            <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
            <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <img src="img/<?php echo $row['shard_img']; ?>" width="30">
            <div class="h3 font-weight-bold">&nbsp;<?php echo $row['apertura_porcentaje']; ?><sup class="small">%</sup></div>
          </div>
        </div>
        <!-- Demo info -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0"><?php echo $row['shard_piedad'] - $row['apertura_actual']; ?></div><span class="small text-gray">Remaining Shards</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">
              <?php $restante = $row['shard_piedad'] - $row['apertura_actual'];
              echo $resultado = 0.0.$row['shard_porcentaje'] + (0.0.$row['shard_aumento'] * ( ($row['apertura_actual'] - $row['shard_piedad']) <= 0 ? 0 : (-1 * $restante) )); ?>%</div><span class="small text-gray">Chance of legendary</span>
          </div>
        </div>
        <!-- Botones -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <button id="btn_x1_shard" class="btn btn-dark w-100" data-cantidad="1" data-tipo="<?php echo $i; ?>" onclick="abrirFragmento($(this).data('cantidad'), $(this).data('tipo'))">x1</button>
          </div>
          <div class="col-6">
            <button id="btn_x10_shard" class="btn btn-dark w-100" data-cantidad="10" data-tipo="<?php echo $i; ?>" onclick="abrirFragmento($(this).data('cantidad'), $(this).data('tipo'))">x10</button>
          </div>
        </div>
      </div>
    </div>
    <?php 
    $i++;
    }
  }?>

    

  </div>
</div>

<script src="js/progress.js"></script> 