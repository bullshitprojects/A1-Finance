<div class="modal fade" id="modalAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modalstyle padding-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white">Crear Cuenta</h5>
                <button type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close">
                    <svg data-v-6a943414="" width="24" height="24" xmlns="http://www.w3.org/2000/svg" class="close-icon">
                        <path data-v-6a943414="" d="M6.414 5A1 1 0 105 6.414L10.586 12 5 17.586A1 1 0 106.414 19L12 13.414 17.586 19A1 1 0 1019 17.586L13.414 12 19 6.414A1 1 0 1017.586 5L12 10.586 6.414 5z"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="row g-3">
                    <div class="col-md-12">
                        <label for="nombreCuenta" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreCuenta" name="nombreCuenta">
                    </div>
                    <div class="col-md-12">
                        <label for="saldoCuenta" class="form-label">Saldo Inicial</label>
                        <input type="text" class="form-control" id="saldoCuenta" placeholder="$0.00" name="saldoCuenta">
                    </div>
                    <div class="col-md-6">
                        <label for="tipoCuenta" class="form-label">Tipo de Cuenta</label>
                        <select id="tipoCuenta" name="tipoCuenta" style="border-radius:10px" class="form-select">
                            <option selected disabled>Selecciona una</option>
                            <?php
                            $tipoCuentaController = new TipoCuentaController();
                            $tipoCuentaController::ObtenerCuentas();
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="moneda" class="form-label">Tipo de Moneda</label>
                        <select id="moneda" name="moneda" style="border-radius:10px" class="form-select">
                            <option selected disabled>Selecciona una</option>
                            <?php
                            $moneda = new MonedaController();
                            $moneda::ObtenerMonedas();
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary modalBtn mt-2">Agregar Cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['nombreCuenta'])) {
    $usuario = $_SESSION['usuario'];
    $cuenta = new Cuenta();
    $cuenta->setNo_cuenta($_POST['nombreCuenta']);
    $cuenta->setBalance($_POST['saldoCuenta']);
    $cuenta->setId_usuario($usuario->getIdUsuario());
    $cuenta->setId_tipo_cuenta($_POST['tipoCuenta']);
    $cuenta->setId_moneda($_POST['moneda']);
    $addCuenta = new CuentaController();
    $addCuenta->CrearCuenta($cuenta);
}
?>