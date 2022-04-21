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

            <!-- MAIN CONTENT HERE -->
            <div class="col-8 border-both main-content">
                <!-- CONTENIDO DEL CENTRO -->
            </div>

            <!-- LEFT SECTION -->
            <div class="col-2 left-section"></div>
        </div>

    </main>
</body>

</html>