<?php
include_once "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);

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


                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Productos Vendidos</h1>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="d-flex">
                                    <th class="col-4">Producto</th>
                                    <th class="col-3">Nombre Cliente</th>
                                    <th class="col-2">Fecha Compra</th>
                                    <th class="col-1">Cantidad</th>
                                    <th class="col-1">Precio</th>
                                    <th class="col-1">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "conectDB.php";
                                $con = mysqli_connect($host, $user, $pass, $db);
                                $query = "SELECT
                            P.Nombre_Producto,
                            U.NombreUsuario,
                            V.Fecha,
                            Dv.Cantidad,
                            Dv.Precio,
                            Dv.SubTotal
                            FROM
                            Venta AS V
                            INNER JOIN detalleVenta AS Dv ON Dv.ID_Venta = V.ID_Venta
                            INNER JOIN Producto AS P ON P.ID_Producto = Dv.ID_Producto
                            INNER JOIN Usuario AS U ON U.ID_Usuario = V.ID_Cliente;";
                                $res = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_array($res)) {
                                ?>

                                    <tr class="d-flex">
                                        <td class="col-4"><?php echo $row['Nombre_Producto'] ?></td>
                                        <td class="col-3"><?php echo $row['NombreUsuario'] ?></td>
                                        <td class="col-2"><?php echo $row['Fecha'] ?></td>
                                        <td class="col-1"><?php echo $row['Cantidad'] ?></td>
                                        <td class="col-1">$<?php echo $row['Precio'] ?></td>
                                        <td class="col-1">$<?php echo $row['SubTotal'] ?></td>
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