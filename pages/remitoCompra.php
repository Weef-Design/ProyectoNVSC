<?php
session_start();
include_once "../admin/conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);

$queryRecibe = "SELECT Nombre,Email,Direccion,Telefono 
from datosEnvio 
where ID_Cliente='" . $_SESSION['idUsuario'] . "';";
$resRecibe = mysqli_query($con, $queryRecibe);
$rowRecibe = mysqli_fetch_assoc($resRecibe);

$queryCli = "SELECT NombreUsuario,Email,Direccion,Telefono 
from Usuario 
where ID_Usuario='" . $_SESSION['idUsuario'] . "';";
$resCli = mysqli_query($con, $queryCli);
$rowCli = mysqli_fetch_assoc($resCli);

$idVenta = mysqli_real_escape_string($con, $_REQUEST['idVenta'] ?? '');
$queryVenta = "SELECT V.ID_Venta,V.Fecha
FROM Venta AS V
WHERE V.ID_Venta = '$idVenta';";
$resVenta = mysqli_query($con, $queryVenta);
$rowVenta = mysqli_fetch_assoc($resVenta);
?>

    
            <th>Cliente</th>
            <th>Recibe</th>
            <th>Datos de la factura</th>

                <strong>Nombre:</strong><?php echo $rowCli['NombreUsuario'] ?><br>
                <strong>Email:</strong><?php echo $rowCli['Email'] ?><br>
                <strong>Direccion:</strong><?php echo $rowCli['Direccion'] ?><br>
                <strong>Direccion:</strong><?php echo $rowCli['Telefono'] ?><br>
            </td>
            <td>
                <strong>Nombre:</strong><?php echo $rowRecibe['Nombre'] ?><br>
                <strong>Email:</strong><?php echo $rowRecibe['Email'] ?><br>
                <strong>Direccion:</strong><?php echo $rowRecibe['Direccion'] ?><br>
                <strong>Direccion:</strong><?php echo $rowRecibe['Telefono'] ?><br>
            </td>
            <td>
                <strong>Nombre:</strong><?php echo $rowVenta['ID_Venta'] ?><br>
                <strong>Email:</strong><?php echo $rowVenta['Fecha'] ?><br>
            </td>

<table style="width: 750px;margin-top: 30px;">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
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
            $total = $total + $row['Subtotal'];
        ?>
            <tr>
                <td><?php echo $row['Nombre'] ?></td>
                <td><?php echo $row['Cantidad'] ?></td>
                <td><?php echo "$" . $row['Precio'] - ($row['Precio'] * $row['Descuento']) / 100 ?></td>
                <td><?php echo "$" . $row['Subtotal']; ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="3" class="text-right" style="text-align: right;">Total:</td>
            <td><?php echo "$" . $total; ?></td>
        </tr>

    </tbody>
</table>
