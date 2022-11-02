<?php
  session_start();
  session_regenerate_id(true);
  if( isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="cerrar" ){
    session_destroy();
    header("location: login.php");
  }
  if(isset($_SESSION['idUsuario'])==false){

    header("location: login.php");
  }
  $modulo=$_REQUEST['modulo']??'';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Natalia Viera SC | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/alert.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Edit perfil -->
          <a class="nav-link" href="dashboard.php?modulo=editEmpleados&id=<?php echo $_SESSION['idUsuario']; ?>" title="Editar Perfil">
            <i class="fas fa-user text-primary"></i>
          </a>
        <!-- Cerrar Sesion -->
          <a class="nav-link" href="dashboard.php?modulo=&sesion=cerrar" title="Cerrar Sesión">
            <i class="fas fa-door-closed text-danger"></i>
          </a>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index.php" class="brand-link">
        <img src="dist/img/LOGO NATALIA VIERA.png" alt="NataliaVier" class="brand-image"
          style="opacity: .8">
        <span class="brand-text font-weight-light">NVSC</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['nombreUsuario']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="fa fa-shopping-cart nav-icon"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="dashboard.php?modulo=estadisticas" class="nav-link <?php echo ($modulo=="estadisticas" || $modulo=="" )?" active ":" "; ?>">
                    <i class="fas fa-chart-bar nav-icon"></i>
                    <p>Estadísticas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard.php?modulo=empleados" class="nav-link<?php echo ($modulo=="empleados" || $modulo=="editEmpleados")?" active ":" "; ?>">
                    <i class="fa fa-user-tie nav-icon"></i>
                    <p>Empleados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard.php?modulo=clientes" class="nav-link<?php echo ($modulo=="clientes")?" active ":" "; ?>">
                    <i class="fa fa-users nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard.php?modulo=crudproductos" class="nav-link <?php echo ($modulo=="crudproductos" || $modulo=="editproductos")?" active ":" "; ?>">
                    <i class="fa fa-shopping-bag nav-icon"></i>
                    <p>Productos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard.php?modulo=ventas" class="nav-link <?php echo ($modulo=="ventas" )?" active ":" "; ?>">
                    <i class="fa fa-table nav-icon"></i>
                    <p>Ventas</p>
                  </a>
                </li>
              </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <?php
    if(isset($_REQUEST['mensaje'])){
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Cerrar</span>
      </button>
      <?php echo $_REQUEST['mensaje'] ?>
    </div>
    <!-- Content Wrapper. Contains page content -->
    <?php
    }
      if($modulo=="estadisticas" || $modulo==""){
        include_once "estadisticas.php";
      }
      if($modulo=="empleados"){
        include_once "empleados.php";
      }
      if($modulo=="clientes"){
        include_once "clientes.php";
      }
      if($modulo=="crudproductos"){
        include_once "crudproductos.php";
      }
      if($modulo=="ventas"){
        include_once "ventas.php";
      }
      if($modulo=="editEmpleados"){
        include_once "editEmpleados.php";
      }
      if($modulo=="editproductos"){
        include_once "editproductos.php";
      }
    ?>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="../js/validaciones.js"></script>
  <script src="https://kit.fontawesome.com/61458513d7.js" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function () {
    $(".borrar").click(function (e) { 
      e.preventDefault();
      var res=confirm("¿Está seguro que quieres eliminar este usuario?");
      if(res==true){
        var link=$(this).attr("href");
        window.location=link;
      }
      
    });
  });

  $("#productCat").change(() => {
                if ($("#productCat").val() === "2") {
                    $("#Talle").html("<label class='form-label' for='Talle'>Talle</label> <select name='productTalle' class='form-control'><option value='39'>39</option><option value='40'selected>40</option><option value='41'>41</option><option value='42'>42</option><option value='43'>43</option><option value='44'>44</option><option value='45'>45</option>");
                } else if ($("#productCat").val() === "1") {
                    $("#Talle").html("<label class='form-label' for='Talle'>Talle</label> <select name='productTalle' class='form-control'><option value='S'>S</option><option value='M'selected>M</option><option value='L'>L</option><option value='XL'>XL</option><option value='XXL'>XXL</option></select>");
                } else {
                    $("#Talle").html("");
                }

            })
</script>
</body>

</html>
