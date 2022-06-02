<?php
session_start();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'imports.php';
    ?>
    <title>Perfil</title>
</head>

<body>
    <main class="container-fluid main">
        <div class="row">
            <!-- LEFT MENU -->
            <!-- DESKTOP -->
            <?php
            include 'modules/desktop-menu.php'
            ?>

            <!-- MOBILE MENU -->
            <?php
            include 'modules/mobile-menu.php'
            ?>
            <!-- CONTENIDO DEL CENTRO -->
            <?php
            if (isset($_POST['inputName'])) {
                $user = new Usuario();
                $user->setNombre($_POST['inputName']);
                $user->setTelefono($_POST['inputPhone']);
                $user->setCorreo($_POST['inputMail']);
                $user->setFechaNacimiento(new DateTime($_POST['inputDate']));
                $update = new UsuarioController();
                $update->ActualizarUsuario($user);
            }
            ?>
            <div class="col-8 border-both main-content px-5 py-5 d-flex justify-content-center">
                <h3 style="color:white">Perfil</h3>
                <div class="mt-5" style="width: 700px;">
                    <form action="" method="POST" class="row g-3">
                        <div class="col-12 div-pic-parent ">
                            <div class="profile-pic-div ">
                                <img src="web/images/perfil.png" id="photo">
                                <input type="file" id="file">X
                                <label for="file" id="uploadBtn">Elegir foto</label>
                            </div>
                        </div>
                        <br><br><br><br><br><br><br><br>
                        <div class="col-md-12">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" value="<?php echo $usuario->getNombre() ?>" id="inputName" name="inputName" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" readonly value="<?php echo $usuario->getCorreo() ?>" id="inputMail" name="inputMail" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Fecha de nacimiento</label>
                            <input type="text" class="form-control" value="<?php echo $usuario->getFechaNacimiento()->format('Y-m-d') ?>" id="inputDate" name="inputDate" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" value="<?php echo $usuario->getTelefono() ?>" id="inputPhone" name="inputPhone" required>
                        </div>
                        <div class="col-12">
                            <br>
                            <button type="submit" class="submit">Actualizar Datos</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- LEFT SECTION -->
            <div class="col-2 left-section"></div>
        </div>
    </main>
    </div>
    </div>
</body>

</html>