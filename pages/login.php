<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Natalia Viera | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Natalia</b> Viera
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar Sesión</p>
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
          if(mysqli_num_rows($res) == 1){ 
            $row = mysqli_fetch_assoc($res);
            $_SESSION['idUsuario'] = $row['ID_Usuario'];
            $_SESSION['emailUsuario'] = $row['Email'];
            $_SESSION['nombreUsuario'] = $row['NombreUsuario'];
            $_SESSION['tipoUsuario'] = $row['Tipo'];

            if ($row['Tipo'] == 'J') {
        
              header("location: ../admin/dashboard.php?mensaje=Usuario logueado exitosamente");	
                
            }elseif ($row['Tipo'] == 'C'){
              header("location: ../admin/dashboard.php?mensaje=Usuario logueado exitosamente");
        
            }elseif ($row['Tipo'] == 'V'){
              header("location: ../admin/dashboard.php?mensaje=Usuario logueado exitosamente");
        
            }elseif ($row['Tipo'] == 'U'){
              header("location: ../index.php?mensaje=Usuario logueado exitosamente");
        
            }
        } else {
        ?>
            <div class="alert alert-warning" role="alert">
              Credenciales no válidas/Usuario no activado.
            </div>
        <?php
          }
        }
        ?>
        <form method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="pass">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary" name="login">Continuar</button>
              <a href="../admin/registro.php" class="text-success float-right" >Registrarse</a>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../admin/dist/js/adminlte.min.js"></script>

</body>

</html>