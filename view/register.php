<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('location:index.php?page=home');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'imports.php';
    ?>

</head>

<body>
    <main class="container-fluid main">

        <div class="d-flex justify-content-center">
            <!-- LEFT MENU -->
            <!-- DESKTOP -->
            <div class="logo loginlogo">
                <h1 class="a1">A1</h1>
                <h1 class="finance">Finance</h1>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-between align-items-center register-page">
            <p class="d-flex justify-content-start col-6 logtext"> Tu prosperidad <br>comienza hoy</p>
            <div class="col-4">
                <div class="register-form py-5 px-4">
                    <form action="" method="POST" class="row g-3" autocomplete="off">
                        <div class="col-12">
                            <label class="form-label fw-bold">Nombre</label>
                            <input type="text" placeholder="Juan Perez" class="form-control" id="inputName" name="inputName" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Telefono</label>
                            <input type="tel" maxlength="8" placeholder="77778888" class="form-control" id="inputPhone" name="inputPhone" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Fecha de Nacimiento</label>
                            <input type="text" placeholder="dd/mm/yyyy" class="form-control" id="inputDate" name="inputDate" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Correo</label>
                            <input type="email" placeholder="juanperez@mail.com" class="form-control" id="inputMail" name="inputMail" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Contraseña</label>
                            <input type="password" placeholder="********" class="form-control" id="inputPass" name="inputPass" required>
                        </div>
                        <div id="pswd_info">
                            <h4>La constraseña debe cumplir con lo siguiente:</h4>
                            <ul>
                                <li id="letter" class="invalid">Al menos <strong>una letra</strong></li>
                                <li id="number" class="invalid">Al menos <strong>un número</strong></li>
                                <li id="capital" class="invalid">Al menos <strong>una letra mayúscula</strong></li>
                                <li id="length" class="invalid">Debe de contener <strong>8 caracteres</strong></li>
                            </ul>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex jusfify-content-between align-items-center">
                                <button id="submit" type="submit" class="submit m-1" style="width:125px">Registrarme</button>
                                <a class="m-2 input-link" href="?page=login">¿Ya tienes una cuenta? Inicia Sesión</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    if (isset($_POST['inputName'])) {
        $user = new Usuario();
        $user->setNombre($_POST['inputName']);
        $user->setTelefono($_POST['inputPhone']);
        //=================================
        // 1 = ENCRYPT
        // ? = READ
        //=================================
        $user->setContra($_POST['inputPass'], 1);
        $user->setCorreo($_POST['inputMail']);
        $user->setUrlFoto('null');
        $user->setFechaNacimiento(new DateTime($_POST['inputDate']));
        $user->setId_tipoUsuario(1);

        $register = new UsuarioController();
        $register->CrearUsuario($user);
    }

    ?>
</body>

</html>