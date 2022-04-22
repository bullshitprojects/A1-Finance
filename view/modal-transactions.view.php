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
          <form>
            <form class="row g-3">
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Fecha</label>
                <input type="text" class="form-control" id="inputPassword4">
              </div>
              <div class="col-md-6 mt-4">
                <label for="inputAddress2" class="form-label">Importe</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="$0.00">
              </div>
              <div class="col-md-4 mt-4">
                <label for="inputState" class="form-label">Tipo de transacción</label>
                <select id="inputState" style="width: 230px; border-radius:10px" class="form-select">
                  <option selected>Ingreso</option>
                  <option>Egreso</option>
                </select>
              </div>
              <div class="col-md-4 mt-4">
                <label for="inputState" class="form-label">Categoría</label>
                <select id="inputState" style="width: 230px; border-radius:10px" class="form-select">
                  <option selected>Sueldo</option>
                  <option>Remesas</option>
                </select>
              </div>
              <div class="col-md-4 mt-4">
                <label for="inputState" class="form-label">Cuenta</label>
                <select id="inputState" style="width: 230px; border-radius:10px" class="form-select">
                  <option selected>Efectivo</option>
                  <option>Tarjeta de Crédito</option>
                </select>
              </div>
            </form>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
          </button>
        <button type="button" class="btn btn-primary modalBtn" >Agregar Transacción</button>
        </div>
      </div>
    </div>
  </div>