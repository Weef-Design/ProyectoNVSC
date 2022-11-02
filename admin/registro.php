<?php
include_once "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['guardar'])) {

    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $pass = md5(mysqli_real_escape_string($con, $_REQUEST['pass'] ?? ''));
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $fechaActual = date('y-m-d');
    $tel = mysqli_real_escape_string($con, $_REQUEST['tel'] ?? '');

    $sql = "SELECT Email FROM Usuario WHERE Email='$email'";
    
    $res = $con->query($sql);
    if (mysqli_num_rows($res)==1) {
        echo '<meta http-equiv="refresh" content="0; url=registro.php?mensaje=Email en uso, intente nuevamente." />  ';
        } else {
            $query = "INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Estado, FechaRegistro, Tipo) 
                        VALUE ('$email','$pass','$nombre',0,'$fechaActual','U');";

    $query.= "INSERT INTO TelefonoUsuario(Telefono)
        VALUE ('$tel');";

    if ($con->multi_query($query)) {
        do {
            /* almacenar primer juego de resultados */
            if ($result = $con->store_result()) {
                while ($row = $result->fetch_row()) {
                    printf("%s\n", $row[0]);
                }
                $result->free();
            }
            /* mostrar divisor */
            if ($con->more_results()) {
                printf("-----------------\n");
            }
        } while ($con->next_result());
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear usuario <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
    echo '<meta http-equiv="refresh" content="0; url=../index.php?mensaje=Usuario ' . $nombre . ' creado exitosamente" />  ';
}
?>
<?php 
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Natalia Viera | Registro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="css/stripe.css">
</head>

<body>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-signin w-100 m-auto">
                            <form action="registro.php" method="post">
                                <h2>Registro</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tel" class="form-label">Teléfono</label>
                                        <input type="number" class="form-control" name="tel" id="tel" required="required">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pass" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="pass" id="pass" required="required">
                                    </div>
                                </div>
                                <br>
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

    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/stripe.js"></script>
    <script src="js/ecommerce.js"></script>

</body>

</html>