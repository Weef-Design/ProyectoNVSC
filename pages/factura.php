<?php
$total = $_REQUEST['total'] ?? '';

if (isset($_REQUEST['finCompra'])) {

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $idpago = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);
    $fechaActual = date("Y-m-d");
    $nomTarjeta = $_REQUEST["nombreTarjeta"];
    $numeroTarjeta = $_REQUEST["numberTarjeta"];
    $vencTarjeta = $_REQUEST["vencTarjeta"];
    $cvvTarjeta = $_REQUEST["cvvTarjeta"];

    $queryVenta = "INSERT INTO Venta 
        (ID_Cliente,ID_Pago,Fecha,NombreTarjeta,NumeroTarjeta,VencTarjeta,CVV,Estado) values
        ('".$_SESSION['idUsuario']."','$idpago','$fechaActual','$nomTarjeta','$numeroTarjeta','$vencTarjeta','$cvvTarjeta','Pago Realizado');
        ";
    $resVenta = mysqli_query($con, $queryVenta);
    $id = mysqli_insert_id($con);
    
        
    $insertaDetalle = "";
    $cantProd = count($_REQUEST['id']);
    for ($i = 0; $i < $cantProd; $i++) {
        $subTotal = $_REQUEST['precio'][$i] * $_REQUEST['cantidad'][$i];
        $insertaDetalle = $insertaDetalle . "('" . $_REQUEST['id'][$i] . "','$id','" . $_REQUEST['cantidad'][$i] . "','" . $_REQUEST['precio'][$i] . "','$subTotal'),";
    }
    $insertaDetalle = rtrim($insertaDetalle, ",");
    $queryDetalle = "INSERT INTO detalleVenta 
        (ID_Producto, ID_Venta, Cantidad, Precio, Subtotal) values 
        $insertaDetalle;";
    $resDetalle = mysqli_query($con, $queryDetalle);
    if ($resVenta && $resDetalle) {
?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
            </button>
            Compra realizada con éxito.
        </div>
        <div class="row">
            <div class="col-6">
                <?php muestraRecibe($id); ?>
            </div>
            <div class="col-6">
                <?php muestraDetalle($id); ?>
            </div>
        </div>
    <?php
        borrarCarrito();
    }
}
function borrarCarrito()
{
    ?>
    <script>
        $.ajax({
            type: "post",
            url: "ajax/borrarCarrito.php",
            dataType: "json",
            success: function(response) {
                $("#badgeProducto").text("");
                $("#listaCarrito").text("");
            }
        });
    </script>
<?php
}
function muestraRecibe($idVenta)
{
?>
    <table class="table">
        <thead>
            <tr>
                <th colspan="3" class="text-center">Recibe el Producto:</th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $con;
            $queryRecibe = "SELECT Nombre,Email,Direccion,Telefono 
                from datosEnvio 
                where ID_Cliente='" . $_SESSION['idUsuario'] . "';";
            $resRecibe = mysqli_query($con, $queryRecibe);
            $row = mysqli_fetch_assoc($resRecibe);
            ?>
            <tr>
                <td><?php echo $row['Nombre'] ?></td>
                <td><?php echo $row['Email'] ?></td>
                <td><?php echo $row['Direccion'] ?></td>
                <td><?php echo $row['Telefono'] ?></td>
            </tr>
        </tbody>
    </table>
<?php
}
function muestraDetalle($idVenta)
{
?>
    <table class="table">
        <thead>
            <tr>
                <th colspan="3" class="text-center">Detalle de venta</th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>SubTotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $con;
            $queryDetalle = "SELECT
                    P.Nombre_Producto,
                    Dv.Cantidad,
                    Dv.Precio,
                    Dv.SubTotal
                    FROM
                    Venta AS V
                    INNER JOIN detalleVenta AS Dv ON Dv.ID_Venta = V.ID_Venta
                    INNER JOIN Producto AS P ON P.ID_Producto = Dv.ID_Producto
                    WHERE
                    V.ID_Venta = '$idVenta'";
            $resDetalle = mysqli_query($con, $queryDetalle);
            $total = 0;
            while ($row = mysqli_fetch_assoc($resDetalle)) {
                $total = $total + $row['SubTotal'];
            ?>
                <tr>
                    <td><?php echo $row['Nombre_Producto'] ?></td>
                    <td><?php echo $row['Cantidad'] ?></td>
                    <td>$<?php echo $row['Precio'] ?></td>
                    <td>$<?php echo $row['SubTotal'] ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="3" class="text-right">Total:</td>
                <td>$<?php echo $total; ?></td>
            </tr>

        </tbody>
    </table>
    <!--
    <a class="btn btn-secondary float-right" target="_blank" href="./pages/imprimirFactura.php?idVenta=<?php echo $idVenta; ?>" 
    role="button">Imprimir factura <i class="fas fa-file-pdf"></i> </a>
    -->
<?php
}

?>