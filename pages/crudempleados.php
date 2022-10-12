<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Natalia Viera | Empleados</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="../index.html">Natalia Viera S-C</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Buscar" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../index.html">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="dashboard.html">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Ordenes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="crudproductos.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./crudempleados.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Empleados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                Reportes
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle" class="align-text-bottom"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Year-end sale
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php include('../sql/connect.inc'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="h2">Vendedores</h1>
                <div class="overflow-auto">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Ciudad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT ID_Usuario, NombreUsuario, Direccion, Ciudad FROM Usuario
                            where Tipo = 'V';";
                            $resultado = mysqli_query($conex, $sql);

                            while ($mostrar = mysqli_fetch_array($resultado)) {
                            ?>

                                <tr>
                                    <td><?php echo $mostrar['ID_Usuario'] ?></td>
                                    <td><?php echo $mostrar['NombreUsuario'] ?></td>
                                    <td><?php echo $mostrar['Direccion'] ?></td>
                                    <td><?php echo $mostrar['Ciudad'] ?></td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <h1 class="h2">Compradores</h1>
                <div class="overflow-auto">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Ciudad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT ID_Usuario, NombreUsuario, Direccion, Ciudad FROM Usuario
                            where Tipo = 'C';";
                            $resultado = mysqli_query($conex, $sql);

                            while ($mostrar = mysqli_fetch_array($resultado)) {
                            ?>

                                <tr>
                                    <td><?php echo $mostrar['ID_Usuario'] ?></td>
                                    <td><?php echo $mostrar['NombreUsuario'] ?></td>
                                    <td><?php echo $mostrar['Direccion'] ?></td>
                                    <td><?php echo $mostrar['Ciudad'] ?></td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-signin w-100 m-auto">
                    <h1 class="h2">Agregar Vendedor</h1>
                    <form id="frmAltaVendedor" action="../sql/altaVendedor.php" method="post">

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
                                <label for="userEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="name@gmail.com">
                            </div>
                            <div class="col-md-6">
                                <label for="userPassword" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="userPassword" id="userPassword">
                            </div>
                        </div>
                        <br>
                        <input class="w-100 btn btn-lg btn-warning" type="button" value="Agregar" id="vendedorAdd">

                    </form>
                </div>
                <br>
                <h1 class="h2">Baja Vendedor</h1>
                <form id="frmBajaVendedor" action="../sql/bajaVendedoresConfirma.php" method="post">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="vendedorID">Identificador</label>
                            <input class="form-control form-control-sm" type="number" name="vendedorID" id="vendedorID"><br>
                        </div>
                        <div class="col-md-6">
                            <label for="userName">Nombre</label>
                            <input class="form-control form-control-sm" type="text" name="userName" disabled="true" id="userName"><br>
                        </div>
                    </div>
                    <input class="w-100 btn btn-lg btn-warning" type="button" value="Eliminar" id="vendedorDel">
                    <br><br>
                </form>
                <br>
                <div class="form-signin w-100 m-auto">
                    <h1 class="h2">Agregar Comprador</h1>
                    <form id="frmAltaComprador" action="../sql/altaComprador.php" method="post">

                        <div class="row">
                            <div class="col-md-6">
                                <label for="compradorName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="compradorName" id="compradorName">
                            </div>
                            <div class="col-md-6">
                                <label for="compradorPhone" class="form-label">Teléfono</label>
                                <input type="number" class="form-control" name="compradorPhone" id="compradorPhone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="compradorAddress" class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="compradorAddress" id="compradorAddress">
                            </div>
                            <div class="col-md-6">
                                <label for="compradorCity" class="form-label">Ciudad</label>
                                <input type="text" class="form-control" name="compradorCity" id="compradorCity">
                            </div><b></b>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="compradorEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="compradorEmail" id="compradorEmail" placeholder="name@gmail.com">
                            </div>
                            <div class="col-md-6">
                                <label for="compradorPassword" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="compradorPassword" id="compradorPassword">
                            </div>
                        </div>
                        <br>
                        <input class="w-100 btn btn-lg btn-warning" type="button" value="Agregar" id="compradorAdd">

                    </form>
                </div>
                <br>
                <h1 class="h2">Baja Comprador</h1>
                <form id="frmBajaComprador" action="../sql/bajaCompradoresConfirma.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="compradorID">Identificador</label>
                            <input class="form-control form-control-sm" type="number" name="compradorID" id="compradorID"><br>
                        </div>
                        <div class="col-md-6">
                            <label for="compradorName">Nombre</label>
                            <input class="form-control form-control-sm" type="text" name="compradorName" disabled="true" id="compradorName"><br>
                        </div>
                    </div>
                    <input class="w-100 btn btn-lg btn-warning" type="button" value="Eliminar" id="compradorDel">
                    <br><br>
                </form>

            </main>
        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/validaciones.js"></script>
</body>

</html>