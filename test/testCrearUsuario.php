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
        <div class="col-12">
            <div class="profile-pic-div">
                <img src="web/images/perfil.png" name="photo">
                <input type="file" name="file">X
                <label for="file" id="uploadBtn">Elegir foto</label>
            </div>
        </div>
        <br><br><br><br><br><br><br>
        <div class="col-md-6">
            <label class="form-label">Nombres</label>
            <input type="text" class="form-control" name="inputName">
        </div>
        <div class="col-md-6">
            <label class="form-label">DUI</label>
            <input type="text" class="form-control" name="inputDui">
        </div>
        <div class="col-12">
            <label class="form-label">Fecha de nacimiento</label>
            <input type="text" class="form-control" name="inputFechaNac">
        </div>
        <div class="col-12">
            <label class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="inputPhoneNumber">
        </div>
        <div class="col-12">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="inputEmail">
        </div>
        <div class="col-12">
            <label class="form-label">Contraseña</label>
            <input type="text" class="form-control" name="inputPass">
        </div>
        <div class="col-12">
            <label class="form-label">Repetir Contraseña</label>
            <input type="text" class="form-control" id="inputPass2">
        </div>
        <div class="col-12">
            <br>
            <button type="submit" class="submit">Crear Usuario</button>
        </div>
    </form>
    <?php
    if ($_POST) {
        include_once("../model/Usuario.php");
        include_once("../controller/UsuarioController.php");
        $resulset = UsuarioController::ValidarEmail($_POST['inputEmail'], $Usuario = new Usuario(
            "",
            $_POST['inputName'],
            $_POST['inputDui'],
            $_POST['file'],
            new DateTime($_POST['inputFechaNac']),
            $_POST['inputPhoneNumber'],
            $_POST['inputEmail'],
            $_POST['inputPass'],
            1
        ));
        if ($resulset == 1) {
            //Aqui para cuando el usuario se creo 
        }else{
            echo "ya existia";
            //Aqui cuando el correo ya existia
        }
    }
    ?>
</body>

</html>