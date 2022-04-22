<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once("../model/Usuario.php");
    session_start();
    $usuario = $_SESSION['usuario']
    ?>
    <form action="" method="post">
        <div class="col-md-6">
            <label class="form-label">Numero de Cuenta</label>
            <input type="text" class="form-control" name="inputNumeroCuenta">
        </div>
        <div class="col-md-6">
            <label class="form-label">Entidad Financiera</label>
            <input type="text" class="form-control" name="inputEntidadFinanciera">
        </div>
        <div class="col-12">
            <label class="form-label">Nombre de la cuenta</label>
            <input type="text" class="form-control" name="inputNombre">
        </div>
        <div class="col-12">
            <label class="form-label">Saldo Inicial</label>
            <input type="number" step="any" class="form-control" name="inputSaldoInicial">
        </div>
        <div class="col-12">
            <br>
            <button type="submit" class="submit">Crear Cuenta</button>
        </div>
    </form>
    <?php
    if ($_POST) {
        include_once("../model/Cuenta.php");
        include_once("../controller/CuentaController.php");
        $resulset = CuentaController::CrearCuenta($Cuenta = new Cuenta(
            "",
            $_POST['inputNumeroCuenta'],
            $_POST['inputEntidadFinanciera'],
            $_POST['inputNombre'],
            $_POST['inputSaldoInicial'],
            3,
        ));
        if ($resulset == 1) {
            //Aqui para cuando el usuario se creo 
        } else {
            echo "ya existia";
            //Aqui cuando el correo ya existia
        }
    }
    ?>
</body>

</html>