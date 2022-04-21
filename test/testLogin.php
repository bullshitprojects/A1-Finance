<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Correo:</label>
            <input type="text" class="form-control" name="inputEmail" id="inputEmail" placeholder="Correo">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Contraseña:</label>
            <input type="text" class="form-control" name="inputPass" id="inputPass" placeholder="Contraseña">
        </div>
        <input name="" id="" class="btn btn-success" type="submit" value="Logearse">
    </form>
    <br>
    <br>
    <?php
    if ($_POST) {
        include_once("../model/Usuario.php");
        include_once("../controller/UsuarioController.php");

        $email = $_POST['inputEmail'];
        $clave = $_POST['inputPass'];
        try {
            if (UsuarioController::ValidarUsuario($email, $clave) == 1) {
                $usuario = $_SESSION['usuario'];
                echo 'Excepción capturada: ';
                //Redireccionar al dashboard
            } else {
                //Redireccionar al login
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    ?>
</body>

</html>