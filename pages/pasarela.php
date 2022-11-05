<form action="index.php?modulo=factura" method="post" id="payment-form">
    <table class="table table-striped table-inverse" id="tablaPasarela">
        <thead class="thead-inverse">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="form-row">
        <h4 class="mt3">Elija Método de Pago</h4>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Datos Tarjeta
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Datos Tarjeta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" for="nomTarjeta">Nombre de Titular:</label>
                                <input type="text" id="nombreTarjeta" name="nombreTarjeta" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" for="numberTarjeta">Número de Tarjeta:</label>
                                <input type="text" maxlength="16" id="numberTarjeta" name="numberTarjeta" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="vencTarjeta">Vencimiento:</label>
                                <input type="month" min="2022-11" name="vencTarjeta" class="form-control" placeholder="xx/xxxx" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="cvvTarjeta">CVV:</label>
                                <input type="text" maxlength="3" id="cvvTarjeta" name="cvvTarjeta" class="form-control" placeholder="xxx" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="finCompra" class="btn btn-primary">Pagar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <div class="mt-3">
        <a class="btn btn-warning" href="index.php?modulo=envio" role="button">Ir a envio</a>
    </div>
</form>