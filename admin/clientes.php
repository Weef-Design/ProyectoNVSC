<?php
include_once "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['idBorrar'])) {
    $id = mysqli_real_escape_string($con, $_REQUEST['idBorrar'] ?? '');
    $query = "DELETE from TelefonoUsuario where ID_Usuario='" . $id . "';";
    $queryii = "DELETE from Usuario where ID_Usuario='" . $id . "';";
    $res = mysqli_query($con, $query);
    $resii = mysqli_query($con, $queryii);
    if ($res and $resii) {
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=empleados&mensaje=Usuario eliminado exitosamente." />  ';
    } else {
    ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
?>
<!-- Content Wrapper. Contains page content -->
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
                                        <h1>Clientes</h1>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="d-flex">
                                    <th class="col-1">Estado</th>
                                    <th class="col-3">Nombre</th>
                                    <th class="col-4">Email</th>
                                    <th class="col-2">Fecha Registro</th>
                                    <th class="col-1">Activar</th>
                                    <th class="col-1">Desactivar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "conectDB.php";
                                $con = mysqli_connect($host, $user, $pass, $db);
                                $query = "SELECT * FROM Usuario
                                where Tipo = 'U';";
                                $res = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_array($res)) {
                                ?>

                                    <tr class="d-flex">
                                        <td class="col-1"><?php echo $row['Estado'] ?></td>
                                        <td class="col-3"><?php echo $row['NombreUsuario'] ?></td>
                                        <td class="col-4"><?php echo $row['Email'] ?></td>
                                        <td class="col-2"><?php echo $row['FechaRegistro'] ?></td>
                                        <td class="col-1">
                                            <a href="dashboard.php?modulo=editEmpleados&id=<?php echo $row['ID_Usuario'] ?>" style="margin-right:5px"><i class="fa fa-check text-success"></i></a>
                                        </td>
                                        <td class="col-1">
                                            <a href="dashboard.php?modulo=empleados&idBorrar=<?php echo $row['ID_Usuario'] ?>" class="text-danger borrar"><i class="fa-solid fa-xmark"></i></a>
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