<?php
// ESTABLECER CONEXION
include "../sql/connect.inc";
// CAPTURAR ID DEL FORMULARIO DE BAJAS
$productIDUpd = $_POST["productIDUpd"];
// CREAR SENTENCIA SQL PARA BUSCAR ID DE PERSONA
$sql = "SELECT * FROM Producto WHERE ID_Producto='$productIDUpd'";
// EJECUTAR SENTENCIA SQL
$result = $conex->query($sql);
if (mysqli_num_rows($result)==0) {
    echo '<script language="javascript">alert("Producto Inexistente");window.location.href="../pages/crudproductos.php";</script>';
    } else {
    $reg = mysqli_fetch_array($result);
    }
// CERRAR CONEXION
$conex->close();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Natalia Viera | Administración Productos</title>

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
                            <a class="nav-link" aria-current="page" href="../pages/dashboard.html">
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
                            <a class="nav-link active" href="../pages/crudproductos.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/crudempleados.php">
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
                <h1 class="h2">Productos</h1>
                <div class="overflow-auto">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Talle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT ID_Producto,Nombre_Producto,Precio,Stock,Talle FROM Producto";
                            $resultado = mysqli_query($conex, $sql);

                            while ($mostrar = mysqli_fetch_array($resultado)) {
                            ?>

                                <tr>
                                    <td><?php echo $mostrar['ID_Producto'] ?></td>
                                    <td><?php echo $mostrar['Nombre_Producto'] ?></td>
                                    <td>$<?php echo $mostrar['Precio'] ?></td>
                                    <td><?php echo $mostrar['Stock'] ?></td>
                                    <td><?php echo $mostrar['Talle'] ?></td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-signin w-100 m-auto">
                    <h1 class="h2">Agregar Productos</h1>
                    <form id="frmAltaProducto" action="../sql/altaProducto.php" method="post">

                        <label for="productImage">Imagen 1</label>
                        <input class="form-control form-control-sm" type="file" name="productImage" id="productImage">

                        <label for="productImageII">Imagen 2</label>
                        <input class="form-control form-control-sm" type="file" name="productImageII" id="productImageII">

                        <label for="productImageIII">Imagen 3</label>
                        <input class="form-control form-control-sm" type="file" name="productImageIII" id="productImageIII">

                        <label for="productNombre">Nombre</label>
                        <input class="form-control form-control-sm" type="text" name="productNombre" id="productNombre">

                        <label for="productPrecio">Precio</label>
                        <input class="form-control form-control-sm" type="number" name="productPrecio" id="productPrecio">

                        <label for="productStock">Stock</label>
                        <input class="form-control form-control-sm" type="number" name="productStock" id="productStock">

                        <label for="productTalle">Talle</label>
                        <select class="form-select form-select-sm" name="productTalle" id="productTalle">
                            <option value="">Sin Talle</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select><br>

                        <input class="w-100 btn btn-lg btn-warning" type="button" value="Agregar" id="productAdd">
                    </form>
                </div>
                <br>
                <h1 class="h2">Baja Productos</h1>
                <form id="frmBajaProducto" action="bajaProductoConfirma.php" method="post">

                    <label for="productID">Identificador</label>
                    <input class="form-control form-control-sm" type="number" name="productID" id="productID">

                    <label for="productNombre">Nombre</label>
                    <input class="form-control form-control-sm" type="text" name="productNombre" disabled="true" id="productNombre"><br>

                    <input class="w-100 btn btn-lg btn-warning" type="button" value="Eliminar" id="productBajaEliminar">
                </form>
                <br>
                <div class="form-signin w-100 m-auto">
                    <h1 class="h2">Modificar Productos</h1>
                    <?php echo " <form id='frmUpdProducto' action='../sql/updateProducto.php?productIDUpd=$productIDUpd' method='POST'>\n"; ?>
                        <label for="productIDUpd">Identificador</label>
                        <input class="form-control form-control-sm" type="number" disabled="true" value="<?php echo $reg['ID_Producto']; ?>" name="productIDUpd" id="productIDUpd">

                        <label for="productImage">Imagen 1</label>
                        <input class="form-control form-control-sm" type="file" value="<?php echo $reg['Imagen_1']; ?>" name="productImage" id="productImage">

                        <label for="productImageII">Imagen 2</label>
                        <input class="form-control form-control-sm" type="file" value="<?php echo $reg['Imagen_2']; ?>" name="productImageII" id="productImageII">

                        <label for="productImageIII">Imagen 3</label>
                        <input class="form-control form-control-sm" type="file" value="<?php echo $reg['Imagen_3']; ?>" name="productImageIII" id="productImageIII">

                        <label for="productNombre">Nombre</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo $reg['Nombre_Producto']; ?>" name="productNombre" id="productNombre">

                        <label for="productPrecio">Precio</label>
                        <input class="form-control form-control-sm" type="number" value="<?php echo $reg['Precio']; ?>" name="productPrecio" id="productPrecio">

                        <label for="productStock">Stock</label>
                        <input class="form-control form-control-sm" type="number" value="<?php echo $reg['Stock']; ?>" name="productStock" id="productStock">

                        <label for="productTalle">Talle</label>
                        <select class="form-select form-select-sm" name="productTalle" id="productTalle">
                            <option value="">Sin Talle</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select><br>

                        <input class="w-100 btn btn-lg btn-warning" type="button" value="Modificar" id="productUpd">
                        <br><br>
                    </form>
                </div>
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