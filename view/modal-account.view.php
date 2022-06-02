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
                <form class="row g-3" action="" method="POST">
                    <div class="col-md-12">
                        <label for="nombreCuenta" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreCuenta" name="nombreCuenta">
                    </div>

                    <div class="col-md-6">
                        <label for="saldoCuenta" class="form-label">Saldo Inicial</label>
                        <input type="text" class="form-control" id="saldoCuenta" placeholder="$0.00" name="saldoCuenta">
                    </div>
                    <div class="col-md-6">
                        <label for="presupuestoCuenta" class="form-label">Presupuesto</label>
                        <input type="text" class="form-control" id="presupuestoCuenta" placeholder="$0.00" name="presupuestoCuenta">
                    </div>

                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Tipo de Cuenta</label>
                        <select id="inputState" style="border-radius:10px" class="form-select">
                            <option selected disabled>Selecciona una</option>
                            <option>Efectivo</option>
                            <option>Tarjeta de crédito</option>
                            <option>
                                <?php
                                $hola = $_SESSION['usuario'];
                                echo $hola->getIdUsuario();
                                ?>
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Tipo de Moneda</label>
                        <select id="inputState" style="border-radius:10px" class="form-select">
                            <option selected disabled>Selecciona una</option>
                            <option>Efectivo</option>
                            <option>Tarjeta de crédito</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary modalBtn mt-2">Agregar Cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>