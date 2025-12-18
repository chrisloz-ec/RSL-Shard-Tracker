<?php 
ob_start();
session_start();
require_once "ValidacionSesion.php";
?>     
<div class="table-responsive card mb-5 p-1"> <!-- <== overflow: hidden applied to parent -->
  <table class="table rounded rounded-3 overflow-hidden">
    <thead class="bg-black-2 text-light">
      <tr>
        <th scope="col"><small class="ms-2">Fragment</small></th>
        <th scope="col"><small>Total Open</small></th>
        <th scope="col"><small>Percentages</small></th>
        <th scope="col"><small>Current Opening</small></th>
        <th scope="col"><small>Remaining</small></th>
        <th scope="col"><small>Actions</small></th>
      </tr>
    </thead>
    <tbody class="table-light">
      <?php 
      $con = $db_handle->connectDB();
      $userid = mysqli_real_escape_string($con, $_SESSION["usuario_id"]);
      $query_table = "SELECT shard_name, shard_img, shard_porcentaje, shard_piedad, shard_aumento, apertura_usuario, apertura_fragmento, apertura_total, apertura_actual, apertura_porcentaje FROM fragmentos, apertura WHERE apertura_usuario = ? AND shard_id = apertura_fragmento";
      $result = $db_handle->exeQuery($query_table, 'i', array($userid));
      if ($result[1] > 0) {
          $i = 0;
          foreach($result[0] as $row) {
            ?>
            <tr>
              <td>
                <img width="35" class="pe-2" src="img/<?php echo $row['shard_img']; ?>" alt="">
                <?php echo $row['shard_name']; ?>
              </td>
              <td><?php echo $row['apertura_total']; ?></td>
              <td>
                <span class="text-success">
                  <?php 
                  $porcentaje = $row['shard_porcentaje'];
                  $aumento = $row['shard_aumento'];
                  $apertura_actual = $row['apertura_actual'];
                  $piedad = $row['shard_piedad'];
                  $restante = $row['shard_piedad'] - $row['apertura_actual'];
                  $resultado = 0.0.$porcentaje + (0.0.$aumento * ( ($apertura_actual - $piedad) <= 0 ? 0 : (-1 * $restante) ));
                  echo $resultado; 
                  ?>
                  %</span>
              </td>
              <td><?php echo $row['apertura_actual']; ?></td>
              <td><?php echo $piedad - $apertura_actual; ?></td>
              <td class="d-grid gap-1 d-flex">
                <!--<button class="btn btn-outline-danger"><i class="fa-solid fa-arrows-rotate"></i> Void</button>-->
                <button id="reboot_sacred" class="btn btn-warning" data-user="<?php echo $userid; ?>" data-shard="<?php echo $row['apertura_fragmento']; ?>" onclick="rebootFragmento($(this).data('user'), $(this).data('shard'))"><i class="fa-solid fa-arrows-rotate"></i> Reboot</button>
                <button id="edit_sacred" class="btn btn-outline-warning" type="button"  data-bs-toggle="modal" data-bs-target="#modalEditopening" data-user="<?php echo $userid; ?>" data-shard="<?php echo $row['apertura_fragmento']; ?>" data-current="<?php echo $row['apertura_actual']; ?>" onclick="EditFragmento($(this).data('user'), $(this).data('shard'), $(this).data('current'))"><i class="fa-solid fa-pencil"></i> </button>
              </td>
            </tr>
            <?php
            $i++;
          }
      } else {
          echo "<tr><td>No results found.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>