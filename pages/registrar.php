<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/signin.css">

    <title>Natalia Viera | Registrarse</title>

</head>

<body>

    <main class="m-auto">

        <form id="frmAltaUsuario" action="../sql/altaUsuario.php" method="post">

            <div class="tituloRegistro">
                <a href="../index.php"><img class="mb-4" src="../assets/LOGO NATALIA VIERA.png" alt="" width="200" height="50"
                    alt="Imágen del logo Natalia Viera"></img></a>
                <h1 class="h3 mb-3 fw-normal">Crear Cuenta</h1>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="userName" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="userName" id="userName">
                </div>
                <div class="col-md-6">
                    <label for="userPhone" class="form-label">Teléfono</label>
                    <input type="number" class="form-control" name="userPhone" id="userPhone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="userAddress" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="userAddress" id="userAddress">
                </div>
                <div class="col-md-6">
                    <label for="userCity" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="userCity" id="userCity">
                </div><b></b>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="userEmail" class="form-label"><b>Email</b></label>
                    <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="name@gmail.com">
                </div>
                <div class="col-md-6">
                    <label for="userPassword" class="form-label"><b>Contraseña</b></label>
                    <input type="password" class="form-control" name="userPassword" id="userPassword">
                </div>
            </div>
            <br>
            <input class="w-100 btn btn-lg btn-warning" type="button" value="Registrarse" id="userAdd">
        
            <p id="footerRegistro" class="mt-5 mb-3 text-muted">&copy; 2022 Natalia Viera Seguridad Corporal. Todos los derechos reservados.</p>
        </form>

    </main>

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/validaciones.js"></script>
</body>

</html>