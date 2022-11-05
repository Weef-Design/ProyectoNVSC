<?php
include_once "../admin/conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['guardar'])) {

  $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
  $pass = md5(mysqli_real_escape_string($con, $_REQUEST['pass'] ?? ''));
  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
  $fechaActual = date('y-m-d');

  $sql = "SELECT Email FROM Usuario WHERE Email='$email'";

  $res = $con->query($sql);
  if (mysqli_num_rows($res) == 1) {
    echo '<meta http-equiv="refresh" content="0; url=registro.php?mensaje=Email en uso, intente nuevamente." />  ';
  } else {
    $query = "INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Estado, FechaRegistro, Tipo) 
                        VALUE ('$email','$pass','$nombre',0,'$fechaActual','U');";

    $res = mysqli_query($con, $query);
    if ($res) {
      echo '<meta http-equiv="refresh" content="0; url=../index.php?mensaje=Usuario ' . $nombre . ' creado exitosamente" />  ';
    } else {
?>
      <div class="alert alert-danger" role="alert">
        Error al Registrarse.<?php echo mysqli_error($con); ?>
      </div>
  <?php
    }
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

  <!-- ===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="../admin/dist/css/signup.css">
</head>

<body>
  <a href="../index.php"> <img src="../admin/dist/img/LOGO NATALIA VIERA.png" alt="Logo Natalia Viera" width="800px">
  </a>

  <div class="container active">
    <div class="forms">

      <!-- Registration Form -->
      <div class="form signup">
        <span class="title">Registrarse</span>

        <form action="registro.php" method="POST">
          <div class="input-field">
            <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" required>
            <i class="uil uil-user"></i>
          </div>
          <div class="input-field">
            <input type="email" name="email" id="email" placeholder="Ingresa tu email" required>
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">
            <input type="password" class="password" id="pass" name="pass" placeholder="Contraseña" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <div class="input-field button">
            <input type="submit" value="Crear cuenta" name="guardar">
          </div>
        </form>

        <div class="login-signup">
          <span class="text">¿Ya tienes cuenta?
            <a href="./login.php" class="text login-link">Iniciar sesión</a>
          </span>
        </div>
      </div>
    </div>
  </div>

  <script src="../admin/dist/js/viewPassword.js"></script>
  <!-- AdminLTE App -->
  <script src="../admin/dist/js/adminlte.min.js"></script>

</body>

</html>