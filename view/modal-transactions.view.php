  <div class="modal fade" id="modalTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modalstyle">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Nueva Transacción</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" class="row g-3">
            <div class="col-md-8">
              <label for="inputDateTransaccion" class="form-label ">Fecha</label>
              <input type="text" placeholder="dd/mm/yyyy" class="form-control" id="inputDateTransaccion" name="inputDateTransaccion" require>
            </div>
            <div class="col-md-8 mt-4">
              <label for="inputImporte" class="form-label">Importe</label>
              <input type="text" class="form-control" name="inputImporte" id="inputImporte" placeholder="$0.00" require>
            </div>
            <div class="col-md-8 mt-4">
              <label for="inputDescripcion" class="form-label">Descripción</label>
              <input type="text" class="form-control" id="inputDescripcion" name="inputDescripcion" placeholder="" require>
            </div>
            <div class="col-md-8 mt-4">
              <label for="inputTipo" class="form-label">Tipo de transacción</label>
              <select id="inputTipo" name="inputTipo" style="width: 310px; border-radius:10px" class="form-select" require>
                <option selected disabled>Selecciona una</option>
                <?php
                $tipos = new TipoTransaccionController();
                $tipos::ObtenerTipos();
                ?>
              </select>
            </div>
            <div class="col-md-8 mt-4">
              <label for="inputCategoria" class="form-label">Categoría</label>
              <select id="inputCategoria" name="inputCategoria" style="width: 310px; border-radius:10px" class="form-select" require>
                <option selected disabled>Selecciona una</option>
                <?php
                $categorias = new CategoriaController();
                $categorias::ObtenerCategorias();
                ?>
              </select>
            </div>
            <div class="col-md-8 mt-4">
              <label for="inputCuenta" class="form-label">Cuenta</label>
              <select id="inputCuenta" name="inputCuenta" style="width: 310px; border-radius:10px" class="form-select" require>
                <option selected disabled>Selecciona una</option>
                <?php
                $usuario = $_SESSION['usuario'];
                $cuentas = new CuentaController();
                $cuentas::ObtenerCuentas($usuario->getIdUsuario());
                ?>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
          </button>
          <button type="submit" class="btn btn-primary modalBtn">Agregar Transacción</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['inputImporte'])) {
    $transaccion = new Transaccion();
    $transaccion->setMonto($_POST['inputImporte']);
    $transaccion->setFecha(new DateTime($_POST['inputDateTransaccion']));
    $transaccion->setDescripcion($_POST['inputDescripcion'], 1);
    $transaccion->setId_categoria($_POST['inputCategoria']);
    $transaccion->setIdCuenta($_POST['inputCuenta']);
    $transaccion->setId_tipo_transaccion($_POST['inputTipo']);
    $procesarTransaccion = new TransaccionController();
    $procesarTransaccion->CrearTransaccion($transaccion);
  }

  ?>