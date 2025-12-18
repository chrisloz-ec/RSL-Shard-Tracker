function abrirFragmento(cantidad, tipo) {
  //console.log(cantidad, tipo);
  $.ajax({
    type: "POST",
    url: "php/AbrirFragmentos.php",
    data: {
      cantidad: cantidad,
      tipo: tipo
    },
    success: function(response) {
      $('#card_fragmentos').load('php/CardFragmentos.php');
      $('#tabla_apertura').load('php/tbl_apertura.php');
      //$('#tabla_apertura').html(response);
      console.log(response); // aquí puedes mostrar la respuesta en la consola
    },
    error: function(xhr, textStatus, errorThrown) {
      console.log(errorThrown); // aquí puedes mostrar el error en la consola
    }
  });
}


function rebootFragmento(user, shard) {
  //console.log(cantidad, tipo);
  $.ajax({
    type: "POST",
    url: "php/rebootFragmentos.php",
    data: {
      user: user,
      shard: shard
    },
    success: function(response) {
      $('#card_fragmentos').load('php/CardFragmentos.php');
      $('#tabla_apertura').load('php/tbl_apertura.php');
      //$('#tabla_apertura').html(response);
      console.log(response); // aquí puedes mostrar la respuesta en la consola
    },
    error: function(xhr, textStatus, errorThrown) {
      console.log(errorThrown); // aquí puedes mostrar el error en la consola
    }
  });
}


/* ======== Editar apertura de fragmentos ========= */
function EditFragmento(user, shard, current) {
  $('#InputUserOpening').val(user);
  $('#InputShardOpening').val(shard);
  $('#InputOpening').val(current);
}

$('#update_shard').click(function(){
  if($('#formCurrentOpening')[0].checkValidity()){
    user = $('#InputUserOpening').val();
    shard = $('#InputShardOpening').val(); 
    current = $('#InputOpening').val();
    updateOpening(user, shard, current);
  }
  else {
    $('#formCurrentOpening')[0].reportValidity();
  }
});

function updateOpening(user, shard, current) {
  $.ajax({
    type: "POST",
    url: "php/UpdateOpening.php",
    data: {
      user: user,
      shard: shard,
      current: current
    },
    success: function(response) {
      $('#card_fragmentos').load('php/CardFragmentos.php');
      $('#tabla_apertura').load('php/tbl_apertura.php');
      document.getElementById("formCurrentOpening").reset();
      $('#btnCloseEditOpening').click();
      console.log(response); // aquí puedes mostrar la respuesta en la consola
    },
    error: function(xhr, textStatus, errorThrown) {
      console.log(errorThrown); // aquí puedes mostrar el error en la consola
    }
  });
}
