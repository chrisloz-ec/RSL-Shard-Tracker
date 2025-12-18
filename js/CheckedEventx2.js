// Obtenemos el checkbox
const miCheckbox = document.querySelector('#cbx_x2');

const ancientvoid_rare = 91.5;
const ancientvoid_epic = 8.0;
const ancientvoid_legendary = 0.5;
const sacred_epic = 94.0;
const sacred_legendary = 6.0;

// Función que se ejecutará cada vez que el checkbox cambie de estado
miCheckbox.addEventListener('change', function() {
  // Verificamos si el checkbox está marcado o no
  if (this.checked) {
    // Si está marcado, ejecutamos la función correspondiente
    siEstaMarcado();
  } else {
    // Si NO está marcado, ejecutamos la otra función
    siNoEstaMarcado();
  }
});

// Al cargar la página, ejecutamos una de las funciones por defecto
if (miCheckbox.checked) {
  siEstaMarcado();
} else {
  siNoEstaMarcado();
}

// Función que se ejecutará si el checkbox está marcado
function siEstaMarcado() {
  //console.log('El checkbox está marcado');
  $('#td_ancient_r').text(100 - (ancientvoid_legendary * 2) - (ancientvoid_epic * 2) +"%");
  $('#td_ancient_e').text(ancientvoid_epic * 2 +"%")
  $('#td_ancient_l').text(ancientvoid_legendary * 2 +"%");

  $('#td_void_r').text(100 - (ancientvoid_legendary * 2) - (ancientvoid_epic * 2) +"%");
  $('#td_void_e').text(ancientvoid_epic * 2 +"%")
  $('#td_void_l').text(ancientvoid_legendary * 2 +"%");

  $('#td_sacred_e').text(100 - sacred_legendary * 2 +"%")
  $('#td_sacred_l').text(sacred_legendary * 2 +"%");
}

// Función que se ejecutará si el checkbox NO está marcado
function siNoEstaMarcado() {
  //console.log('El checkbox NO está marcado');
  //let resultado = 0.005 + (0.05 * (Math.max(($b5 - $b15), 0) * (-1 * $c5)));
  $('#td_ancient_r').text(ancientvoid_rare+"%");
  $('#td_ancient_e').text(ancientvoid_epic+"%")
  $('#td_ancient_l').text(ancientvoid_legendary+"%");

  $('#td_void_r').text(ancientvoid_rare+"%");
  $('#td_void_e').text(ancientvoid_epic+"%")
  $('#td_void_l').text(ancientvoid_legendary+"%");

  $('#td_sacred_e').text(sacred_epic +"%")
  $('#td_sacred_l').text(sacred_legendary +"%");
}




/*
// Obtener el elemento del checkbox
const myCheckbox = document.getElementById("cbx_x2");

// Agregar un evento de cambio al checkbox
myCheckbox.addEventListener("change", function() {
  if(this.checked) {
    // Si el checkbox está marcado, ejecutar una función
    miFuncionCheckboxMarcado();
  } else {
    // Si el checkbox no está marcado, ejecutar otra función
    miFuncionCheckboxNoMarcado();
  }
});

// Definir las funciones que se ejecutarán
function miFuncionCheckboxMarcado() {
  console.log("El checkbox está marcado");
}

function miFuncionCheckboxNoMarcado() {
  console.log("El checkbox no está marcado");
}
*/