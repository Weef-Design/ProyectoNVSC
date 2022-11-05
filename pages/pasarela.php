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

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Agregar Datos Tarjeta
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="width: 300px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Datos Tarjeta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" for="nomTarjeta">Nombre de Titular:</label>
                                <input type="text" id="nombreTarjeta" name="nombreTarjeta" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" for="numTarjeta">Número de Tarjeta:</label>
                                <input class="form-control" id="numTarjeta" name="numTarjeta" maxlength="15" placeholder="xxx xxxx xxxx xxxx">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="vencTarjeta">Vencimiento:</label>
                                <input type="text" name="vencTarjeta" class="form-control" placeholder="xx/xxxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="cvvTarjeta">CVV:</label>
                                <input type="number"name="cvvTarjeta" id="cvvTarjeta" name="cvvTarjeta" class="form-control" placeholder="xxx">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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