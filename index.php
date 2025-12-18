<?php
// Asegurarse de que no se estén imprimiendo encabezados
ob_start();

// Incluir cualquier validación necesaria aquí antes de la redirección

// Redirigir al usuario a la página deseada
header("Location: LogIn.php");
exit();
?>
