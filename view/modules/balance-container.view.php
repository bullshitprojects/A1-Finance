<div class="balance-container">
    <div class="balance-container__item">
        <h2>Balance Total</h2>
        <h1>
            <?php
            $usuario = $_SESSION['usuario'];
            $cuenta = new CuentaController();
            $cuenta::ObtenerBalance($usuario->getIdUsuario());
            ?>
        </h1>
    </div>
    <div class="balance-container__item budget">
        <h2></h2>
        <h1></h1>
    </div>
    <button class="submit" data-bs-toggle="modal" data-bs-target="#modalTransaction" id="newRecord">Nuevo Registro</button>
    <?php
    include 'view/modal-transactions.view.php';
    ?>
</div>