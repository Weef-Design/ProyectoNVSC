<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Natalia Viera | Iniciar sesión</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- ===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="../admin/dist/css/login.css">
</head>

<body>
  <a href="../index.php"> <img src="../admin/dist/img/LOGO NATALIA VIERA.png" alt="Logo Natalia Viera" width="800px">
  </a>
  <div class="container">
    <div class="forms">
      <div class="form login">
        <span class="title">Iniciar sesión</span>

        <form method="POST">
          <div class="input-field">
            <input type="email" name="email" placeholder="Ingresá tu email" required>
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">
            <input type="password" name="pass" class="password" placeholder="Ingresá tu contraseña" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <div class="input-field button">
            <input type="submit" value="Ingresar" name="login">
          </div>

          <?php
          if (isset($_REQUEST['login'])) {
            session_start();
            $email = $_REQUEST['email'] ?? '';
            $pasword = $_REQUEST['pass'] ?? '';
            $pasword = md5($pasword);
            include_once "../admin/conectDB.php";
            $con = mysqli_connect($host, $user, $pass, $db);
            $query = "SELECT * FROM Usuario WHERE Email = '$email' and Contrasenia = '$pasword' and Estado=1";
            $res = mysqli_query($con, $query);
            if (mysqli_num_rows($res) == 1) {
              $row = mysqli_fetch_assoc($res);
              $_SESSION['idUsuario'] = $row['ID_Usuario'];
              $_SESSION['emailUsuario'] = $row['Email'];
              $_SESSION['nombreUsuario'] = $row['NombreUsuario'];
              $_SESSION['tipoUsuario'] = $row['Tipo'];

              if ($row['Tipo'] == 'J') {

                header("location: ../admin/dashboard.php?mensaje=Usuario logueado exitosamente");
              } elseif ($row['Tipo'] == 'C') {
                header("location: ../admin/dashboard.php?mensaje=Usuario logueado exitosamente");
              } elseif ($row['Tipo'] == 'V') {
                header("location: ../admin/dashboard.php?mensaje=Usuario logueado exitosamente");
              } elseif ($row['Tipo'] == 'U') {
                header("location: ../index.php?mensaje=Usuario logueado exitosamente");
              }
            } else {
          ?>
              <p style="color: red;">
                Credenciales no válidas | Usuario no activado.
              </p>
          <?php
            }
          }
          ?>
        </form>
        <div class="login-signup">
          <span class="text">¿No tienes cuenta?
            <a href="./registro.php" class="text signup-link">Registrarse</a>
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