<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:index.php?page=login');
    exit();
}
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
    <title>Ajustes | A1 Finance</title>
</head>

<body>
    <main class="container-fluid main">
        <div class="row">
            <?php
            include 'modules/desktop-menu.php';
            include 'modules/mobile-menu.php'
            ?>
            <div class="col-8 border-both main-content px-5">
                <div class="settings-container">
                    <div class="settings-container__container">
                        <h1>Ajustes</h1>
                        <h6 class="mt-5">Tus Reportes Disponibles</h1>

                            <div class="report">
                                <div class="report__entry">
                                    <p class="report__entry--title">Mes contra mes</p>
                                    <select name="" id="" class="report__entry--select">
                                        <option value="" selected disabled>Desde</option>
                                        <option value="">Enero</option>
                                        <option value="">Febrero</option>
                                        <option value="">Marzo</option>
                                        <option value="">Abril</option>
                                        <option value="">Mayo</option>
                                        <option value="">Junio</option>
                                        <option value="">Julio</option>
                                        <option value="">Agosto</option>
                                        <option value="">Septiembre</option>
                                        <option value="">Octubre</option>
                                        <option value="">Noviembre</option>
                                        <option value="">Diciembre</option>
                                    </select>
                                    <select name="" id="" class="report__entry--select">
                                        <option value="" selected disabled>Hasta</option>
                                        <option value="">Enero</option>
                                        <option value="">Febrero</option>
                                        <option value="">Marzo</option>
                                        <option value="">Abril</option>
                                        <option value="">Mayo</option>
                                        <option value="">Junio</option>
                                        <option value="">Julio</option>
                                        <option value="">Agosto</option>
                                        <option value="">Septiembre</option>
                                        <option value="">Octubre</option>
                                        <option value="">Noviembre</option>
                                        <option value="">Diciembre</option>
                                    </select>
                                    <p id="momReport" class="report__entry--link">Descargar</p>
                                </div>
                                <div class="report__entry">
                                    <p class="report__entry--title">Mes contra mes (Detallado)</p>
                                    <select name="" id="" class="report__entry--select">
                                        <option value="" selected disabled>Desde</option>
                                        <option value="">Enero</option>
                                        <option value="">Febrero</option>
                                        <option value="">Marzo</option>
                                        <option value="">Abril</option>
                                        <option value="">Mayo</option>
                                        <option value="">Junio</option>
                                        <option value="">Julio</option>
                                        <option value="">Agosto</option>
                                        <option value="">Septiembre</option>
                                        <option value="">Octubre</option>
                                        <option value="">Noviembre</option>
                                        <option value="">Diciembre</option>
                                    </select>
                                    <select name="" id="" class="report__entry--select">
                                        <option value="" selected disabled>Hasta</option>
                                        <option value="">Enero</option>
                                        <option value="">Febrero</option>
                                        <option value="">Marzo</option>
                                        <option value="">Abril</option>
                                        <option value="">Mayo</option>
                                        <option value="">Junio</option>
                                        <option value="">Julio</option>
                                        <option value="">Agosto</option>
                                        <option value="">Septiembre</option>
                                        <option value="">Octubre</option>
                                        <option value="">Noviembre</option>
                                        <option value="">Diciembre</option>
                                    </select>
                                    <p id="momReportDetailed" class="report__entry--link">Descargar</p>
                                </div>
                                <div class="report__entry">
                                    <p class="report__entry--title">&Uacute;ltimos 3 meses</p>
                                    <p id="lastThreeReport" class="report__entry--link">Descargar</p>
                                </div>
                                <div class="report__entry">
                                    <p class="report__entry--title">Mes</p>
                                    <select name="" id="" class="report__entry--select">
                                        <option value="" selected disabled>Selecciona</option>
                                        <option value="">Enero</option>
                                        <option value="">Febrero</option>
                                        <option value="">Marzo</option>
                                        <option value="">Abril</option>
                                        <option value="">Mayo</option>
                                        <option value="">Junio</option>
                                        <option value="">Julio</option>
                                        <option value="">Agosto</option>
                                        <option value="">Septiembre</option>
                                        <option value="">Octubre</option>
                                        <option value="">Noviembre</option>
                                        <option value="">Diciembre</option>
                                    </select>
                                    <p id="monthReport" class="report__entry--link">Descargar</p>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- LEFT SECTION -->
                <div class="col-2 left-section"></div>
            </div>
    </main>
</body>

</html>