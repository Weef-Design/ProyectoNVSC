<?php
include_once "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);

$queryNumUsuarios = "SELECT COUNT(ID_Usuario) AS num from Usuario; ";
$resNumUsuarios = mysqli_query($con, $queryNumUsuarios);
$rowNumUsuarios = mysqli_fetch_assoc($resNumUsuarios);

$queryNumProductos = "SELECT COUNT(ID_Producto) AS num from Producto where Stock>0; ";
$resNumProductos = mysqli_query($con, $queryNumProductos);
$rowNumProductos = mysqli_fetch_assoc($resNumProductos);

$queryNumVentas = "SELECT COUNT(ID_Venta) AS num from Venta 
where Fecha BETWEEN DATE( DATE_SUB(NOW(),INTERVAL 7 DAY) ) AND NOW(); ";
$resNumVentas = mysqli_query($con, $queryNumVentas);
$rowNumVentas = mysqli_fetch_assoc($resNumVentas);

$queryNumClientes = "SELECT COUNT(ID_Usuario) AS num from Usuario where Tipo='U'; ";
$resNumClientes = mysqli_query($con, $queryNumClientes);
$rowNumClientes = mysqli_fetch_assoc($resNumClientes);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard | Natalia Viera Seguridad Corporal</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $rowNumUsuarios['num']; ?></h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $rowNumProductos['num']; ?></h3>
                            <p>Productos en Stock</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pricetag"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $rowNumVentas['num']; ?></h3>
                            <p>Ventas en los ultimos 7 dias</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="dashboard.php?modulo=ventas" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $rowNumClientes['num'] ?></h3>
                            <p>Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="dashboard.php?modulo=clientes" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>