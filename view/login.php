<?php
session_start();
if ($_SESSION['usuario']) {
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
    <title>Login | A1 Finance</title>
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
        <div class="container-fluid d-flex justify-content-between align-items-center login-page ">
            <p class="d-flex justify-content-start logtext col-6"> Tus Finanzas, <br> tu futuro</p>
            <div class="d-flex justify-content-end col-4">
                <div class="login-form py-5 px-4">
                    <form action="" method="POST" class="row g-3 vertical-center" autocomplete="off">
                        <div class="col-12">
                            <label class="form-label fw-bold">Correo</label>
                            <input type="email" placeholder="juanperez@mail.com" class="form-control" id="inputName" name="inputName" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Contraseña</label>
                            <input type="password" placeholder="**********" class="form-control" id="inputPass" name="inputPass" required>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex jusfify-content-center align-items-center">
                                <button type="submit" class="submit m-1" style="width:125px">Login</button>
                                <a class="m-2 input-link" href="?page=register">¿No tienes una cuenta? Reg&iacute;strate</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    if (isset($_POST['inputName'])) {
        $username = $_POST['inputName'];
        $password = $_POST['inputPass'];

        $login = new UsuarioController();
        $login->ValidarUsuario($username, $password);
    }

    ?>
</body>

</html>