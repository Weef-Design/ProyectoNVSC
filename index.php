<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Natalia Viera SC | Inicio</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="admin/dist/css/mystyles.css">

    <?php
    session_start();
    $accion = $_REQUEST['accion'] ?? '';
    if ($accion == 'cerrar') {
        session_destroy();
        header("Refresh:0");
    }
    ?>
</head>

<body>
    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <?php
    include_once "admin/conectDB.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    ?>

    <?php
    include_once "./pages/menu.php";
    ?>

    <?php
    $modulo = $_REQUEST['modulo'] ?? '';

    if ($modulo == "") {
        include_once "./pages/contenido-index.php";
    }

    if ($modulo == "allproductos") {
        include_once "./pages/allproductos.php";
    }
    if ($modulo == "contacto") {
        include_once "./pages/contacto.php";
    }
    if ($modulo == "detalleproducto") {
        include_once "./pages/detalleproducto.php";
    }

    if ($modulo == "carrito") {
        include_once "./pages/carrito.php";
    }
    if ($modulo == "envio") {
        include_once "./pages/envio.php";
    }
    if ($modulo == "pasarela") {
        include_once "./pages/pasarela.php";
    }
    if ($modulo == "factura") {
        include_once "./pages/factura.php";
    }

    ?>

    <?php
    include_once "./pages/footer.html";
    ?>

    <!-- jQuery UI 1.11.4 -->
    <script src="./js/jquery-3.6.0.js"></script>
    <script src="./admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="./js/carrito.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Box Icons -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</body>

</html>