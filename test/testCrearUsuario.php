<?php
    include_once("../controller/UsuarioController.php");
    UsuarioController::CrearUsuario(
        "Usuario prueba freemiun",
        "00000000-0",
        "1.jpg",
        "2020-03-25",
        "75528305",
        "prueba@gmail.com",
        "123456",
        "1",
    );
?>