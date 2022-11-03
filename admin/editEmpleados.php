<?php
include_once "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['guardar'])) {

    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $pass = md5(mysqli_real_escape_string($con, $_REQUEST['pass'] ?? ''));
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $tel = mysqli_real_escape_string($con, $_REQUEST['tel'] ?? '');
    $dir = mysqli_real_escape_string($con, $_REQUEST['dir'] ?? '');
    $id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');

    $query = "UPDATE Usuario SET
        Email='" . $email . "',Contrasenia='" . $pass . "',NombreUsuario='" . $nombre . "',Direccion='" . $dir . "',Telefono='" . $tel . "'
        where ID_Usuario='" . $id . "';
    ";

    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=empleados&mensaje=Usuario ' . $nombre . ' editado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al editar usuario <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
$id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
$query = "SELECT * from Usuario
            where ID_Usuario='" . $id . "'; ";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($res);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Usuario</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-signin w-100 m-auto">
                            <form action="dashboard.php?modulo=editEmpleados" method="post">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="userName" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $row['NombreUsuario'] ?>" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="userPhone" class="form-label">Teléfono</label>
                                        <input type="number" class="form-control" name="tel" id="tel" value="<?php echo $row['Telefono'] ?>" required="required">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="userEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['Email'] ?>" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="userPassword" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="pass" id="pass" required="required" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="dir" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" name="dir" id="dir" value="<?php echo $row['Direccion'] ?>" required="required">
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="id" value="<?php echo $row['ID_Usuario'] ?>">
                                <button type="submit" class="w-100 btn btn-lg btn-warning" name="guardar">Guardar</button>
                                

                            </form>
                        </div>
                    
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>