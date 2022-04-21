<?php
/*session_start();
if (!$_SESSION['validate']) {
    header('location:index.php?path=login');
    exit();
}*/
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
    <title>Dashboard | A1 Finance</title>
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

        <div class="container ">
            <p class="d-flex justify-content-start logtext"> Tus Finanzas, <br> tu futuro</p>
            <div class="d-flex justify-content-end">
                <div class="loginform py-4 px-4">
                    <form class="row g-3 vertical-center">
                        <div class="col-12">
                            <label class="form-label">Correo</label>
                            <input type="text" style="width: 70% !important;" class="form-control" id="inputName" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Contraseña</label>
                            <input type="password" style="width: 70% !important;" class="form-control" id="inputPass" required>
                        </div>
                        <div class="col-12">
                            <br>
                            <div class="d-flex jusfify-content-center"></div>
                            <button type="submit" class="submit m-1" style="width:125px">Login</button>
                            <a class="m-2" href="#" style="color: rgba(255, 255, 255, 0.3); text-decoration: none;">¿Olvidaste la contraseña?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
</body>

</html>