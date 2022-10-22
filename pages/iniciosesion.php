<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/log-in.css">
  <title>Natalia Viera | Iniciar Sesión</title>

</head>
<body class="text-center">
  
  <main class="form-signin w-100 m-auto">

      <form id="frmLOGIN" action="../sql/login.php" method="post">

        <div class="tituloRegistro">
          <a href="../index.php"><img class="mb-4" src="../assets/LOGO NATALIA VIERA.png" alt="" width="200" height="50"
              alt="Imágen del logo Natalia Viera"></img></a>
          <h1 class="h3 mb-3 fw-normal">Inicio de Sesión</h1>
      </div>
          <label class="form-label" for="userEmail">Ingrese su email</label>
          <input type="text" class="form-control" name="userEmail" id="userEmail" placeholder="name@gmail.com">
          
          <label class="form-label" for="userPassword">Ingrese su contraseña</label>
          <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="Contraseña">
          
        <br>
        <input class="w-100 btn btn-lg btn-warning" type="button" value="Iniciar Sesión" id="userLogin">
        <p>¿Aún no tienes cuenta? <a href="./registrar.php">Registrate</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2022 Natalia Viera Seguridad Corporal. Todos los derechos reservados.</p>
      </form>

  </main>

  <script src="../js/jquery-3.6.0.js"></script>
  <script src="../js/validaciones.js"></script>
</body>
</html>