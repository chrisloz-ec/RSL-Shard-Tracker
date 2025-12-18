<?php
    require_once('db.php');

    $connection=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$connection){
        die(
            "Error: No se pudo conectar al servidor; ". PHP_EOL .
            "Error de depuración #". mysqli_connect_errno() . PHP_EOL .
            " => ". mysqli_connect_error() . PHP_EOL
        );
    }

    mysqli_set_charset($connection, "utf8");

?>
