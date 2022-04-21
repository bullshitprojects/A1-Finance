
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="@mdo">
    Open modal for @mdo
  </button>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modalstyle">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Crear Cuenta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <form class="row g-3">
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputPassword4">
              </div>
              <div class="col-md-6 mt-4">
                <label for="inputAddress2" class="form-label">Saldo</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="$0.00">
              </div>

              <div class="col-md-4 mt-4">
                <label for="inputState" class="form-label">Tipo de Cuenta</label>
                <select id="inputState" style="width: 230px; border-radius:10px" class="form-select">
                  <option selected>Efectivo</option>
                  <option>Tarjeta de crédito</option>
                </select>
              </div>
            </form>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
          </button>
          <button type="button" class="btn btn-primary">Agregar Cuenta</button>
        </div>
      </div>
    </div>
  </div>