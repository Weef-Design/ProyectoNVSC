<?php
include_once "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['idBorrar'])) {
    $id = mysqli_real_escape_string($con, $_REQUEST['idBorrar'] ?? '');
    $query = "DELETE from Usuario where ID_Usuario='" . $id . "';";
    $res = mysqli_query($con, $query);
    if ($res) {
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
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <i class="fa fa-user-plus"></i>
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Agregar Empleado
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-signin w-100 m-auto">
                                            <form id="frmAltaEmpleado" action="./altaEmpleado.php" method="post">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="userName" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="userName" id="userName" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="userPhone" class="form-label">Teléfono</label>
                                                        <input type="number" class="form-control" name="userPhone" id="userPhone" required="required">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="userEmail" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="name@gmail.com" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="userPassword" class="form-label">Contraseña</label>
                                                        <input type="password" class="form-control" name="userPassword" id="userPassword" required="required">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="userDir" class="form-label">Dirección</label>
                                                        <input type="email" class="form-control" name="userDir" id="userDir" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="userEmail" class="form-label">Tipo de Empleado</label>
                                                        <select class="form-control" name="userTipo" id="userTipo">
                                                            <option value="V">Vendedor</option>
                                                            <option value="C">Comprador</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <input class="w-100 btn btn-lg btn-warning" type="button" value="Agregar" id="empleadoAdd">

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Vendedores</h1>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-warning">
                            <thead>
                                <tr class="d-flex">
                                    <th class="col-4">Nombre</th>
                                    <th class="col-5">Email</th>
                                    <th class="col-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                <?php
                                include_once "conectDB.php";
                                $conex = mysqli_connect($host, $user, $pass, $db);
                                $query = "SELECT * FROM Usuario
                            where Tipo = 'V';";
                                $res = mysqli_query($conex, $query);

                                while ($row = mysqli_fetch_array($res)) {
                                ?>

                                    <tr class="d-flex">
                                        <td class="col-4"><?php echo $row['NombreUsuario'] ?></td>
                                        <td class="col-5"><?php echo $row['Email'] ?></td>
                                        <td class="col-3">
                                            <a title="Editar Empleado" href="dashboard.php?modulo=editEmpleado&id=<?php echo $row['ID_Usuario'] ?>" style="margin-right:5px"><i class="fa fa-pen"></i></a>
                                            <a title="Eliminar Empleado" href="dashboard.php?modulo=empleados&idBorrar=<?php echo $row['ID_Usuario'] ?>" class="text-danger borrar"><i class="fa fa-user-minus"></i></a>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Compradores</h1>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <div class="table-responsive">
                        <table class="table table-bordered table-warning">
                            <thead>
                                <tr>
                                    <th class="col-4">Nombre</th>
                                    <th class="col-5">Email</th>
                                    <th class="col-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                <?php
                                include_once "conectDB.php";
                                $con = mysqli_connect($host, $user, $pass, $db);
                                $query = "SELECT * FROM Usuario
                            where Tipo = 'C';";
                                $res = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_array($res)) {
                                ?>

                                    <tr>
                                        <td class="col-4"><?php echo $row['NombreUsuario'] ?></td>
                                        <td class="col-5"><?php echo $row['Email'] ?></td>
                                        <td class="col-3">
                                            <a title="Editar Empleado" href="dashboard.php?modulo=editEmpleado&id=<?php echo $row['ID_Usuario'] ?>" style="margin-right:5px"><i class="fa fa-pen"></i></a>
                                            <a title="Eliminar Empleado" href="dashboard.php?modulo=empleados&idBorrar=<?php echo $row['ID_Usuario'] ?>" class="text-danger borrar"><i class="fa fa-user-minus"></i></a>
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