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
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Paypal -->
    <script src="https://www.paypal.com/sdk/js?client-id=AUWPpA-OBxPm0KkjXP4a4CjF8F2vrjzhSbP9gURj2pA85jOORrxn1bDtn0uGoDHMG-lNWI0F7EMZOKnj&currency=USD"></script>

<?php
    session_start();
    $accion=$_REQUEST['accion']??'';
    if($accion=='cerrar'){
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
    <div class="container">
        <div class="row">
            <div class="col-12">                
                <?php
                include_once "./pages/menu.php";
                $modulo=$_REQUEST['modulo']??'';
                
                if($modulo=="allproductos"){
                    include_once "./pages/allproductos.php";
                }
                if($modulo=="contacto"){
                    include_once "./pages/contacto.php";
                }
                if( $modulo=="detalleproducto" ){
                    include_once "./pages/detalleproducto.php";
                }
                
                if( $modulo=="carrito" ){
                    include_once "./pages/carrito.php";
                }
                if( $modulo=="envio" ){
                    include_once "./pages/envio.php";
                }
                if( $modulo=="pasarela" ){
                    include_once "./pages/pasarela.php";
                }
                if( $modulo=="factura" ){
                    include_once "./pages/factura.php";
                }
                
                ?>
                
            </div>
        </div>
    </div>

    <!-- jQuery UI 1.11.4 -->
    <script src="./js/jquery-3.6.0.js"></script>
    <script src="./admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- daterangepicker -->
    <script src="./admin/plugins/moment/moment.min.js"></script>
    <script src="./admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="./admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="./admin/dist/js/pages/dashboard.js"></script>
    <!-- <script src="https://js.stripe.com/v3/"></script>
    <script src="./admin/js/stripe.js"></script> -->
    <script src="./js/carrito.js"></script>
    
    
</body>

</html>