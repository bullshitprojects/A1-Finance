<?php
    //CONEXIÓN A LA BASE DE DATOS
    $hostname_db = "localhost";
    $database_db = "db_A1Finance";
    $username_db = "A1root";
    $password_db = "123456";

    $conexion = new mysqli($hostname_db,$username_db,$password_db,$database_db);
    $conexion->set_charset("utf8");
    if ($conexion->connect_errno) {
        echo "Error al conectar a la base de datos";
    exit();
}
?>