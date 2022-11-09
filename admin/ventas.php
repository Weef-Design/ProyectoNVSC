<?php
include_once "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['idEstadoEnvio'])) {
    $id = mysqli_real_escape_string($con, $_REQUEST['idEstadoEnvio'] ?? '');
    $query = "UPDATE Venta SET Estado='En Camino al Deposito' where ID_Venta='" . $id . "';";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=ventas&mensaje=Paquete en camino al deposito." />  ';
    } else {
    ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}

if (isset($_REQUEST['idEstadoEnvioii'])) {
    $id = mysqli_real_escape_string($con, $_REQUEST['idEstadoEnvioii'] ?? '');
    $query = "UPDATE Venta SET Estado='Pronto para Entrega' where ID_Venta='" . $id . "';";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=ventas&mensaje=Paquete en Deposito pronto para entrega." />  ';
    } else {
    ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
?>

<?php
if (isset($_REQUEST['idEstadoEnvioiii'])) {
    $id = mysqli_real_escape_string($con, $_REQUEST['idEstadoEnvioiii'] ?? '');
    $query = "UPDATE Venta SET Estado='Paquete Entregado' where ID_Venta='" . $id . "';";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=ventas&mensaje=Paquete entregado al cliente." />  ';
    } else {
    ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
?>


<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Gestión de Envíos</h1>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <div class="table-responsive">
                        <table class="table table-bordered table-warning">
                            <thead>
                                <tr>
                                    <th class="col-2">Estado Envío</th>
                                    <th class="col-2">Nombre Cliente</th>
                                    <th class="col-2">Fecha Compra</th>
                                    <th class="col-1">Subtotal</th>
                                    <th class="col-1">Acciones</th>
                                    <th class="col-1"></th>
                                    <th class="col-1"></th>
                                    <th class="col-1"></th>
                                    <th class="col-1"></th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                <?php
                                include_once "conectDB.php";
                                $con = mysqli_connect($host, $user, $pass, $db);
                                $query = "SELECT
                            V.ID_Venta,
                            P.Nombre_Producto,
                            U.NombreUsuario,
                            V.Fecha,
                            Dv.Cantidad,
                            Dv.Precio,
                            Dv.SubTotal,
                            V.Estado
                            FROM
                            Venta AS V
                            INNER JOIN detalleVenta AS Dv ON Dv.ID_Venta = V.ID_Venta
                            INNER JOIN Producto AS P ON P.ID_Producto = Dv.ID_Producto
                            INNER JOIN Usuario AS U ON U.ID_Usuario = V.ID_Cliente;";
                                $res = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_array($res)) {
                                ?>
                                    <tr>
                                        <td class="col-2"><?php echo $row['Estado'] ?></td>
                                        <td class="col-2"><?php echo $row['NombreUsuario'] ?></td>
                                        <td class="col-2"><?php echo $row['Fecha'] ?></td>
                                        <td class="col-1">$<?php echo $row['SubTotal'] ?></td>
                                        <td class="col-1">
                                            <a title="Cambiar a: En Camino al deposito" href="dashboard.php?modulo=ventas&idEstadoEnvio=<?php echo $row['ID_Venta'] ?>" style="margin-right:5px">
                                            <box-icon name='truck' type='solid' color='#ff993f' ></box-icon>
                                            </a>
                                        </td>
                                        <td class="col-1">
                                            <box-icon name='chevron-right'></box-icon>
                                            <box-icon name='chevron-right'></box-icon>
                                        </td>
                                        <td class="col-1">
                                            <a title="Cambiar a: Pronto para Entrega" href="dashboard.php?modulo=ventas&idEstadoEnvioii=<?php echo $row['ID_Venta'] ?>" style="margin-right:5px">
                                            <box-icon name='package' color='#ff993f' ></box-icon>
                                            </a>  
                                        </td>
                                        <td class="col-1">
                                            <box-icon name='chevron-right'></box-icon>
                                            <box-icon name='chevron-right'></box-icon>
                                        </td>
                                        <td class="col-1">
                                            <a title="Cambiar a: Paquete Entregado" href="dashboard.php?modulo=ventas&idEstadoEnvioiii=<?php echo $row['ID_Venta'] ?>" style="margin-right:5px">
                                            <box-icon name='home' type='solid' color='#ff993f' ></box-icon>
                                            </a>  
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>