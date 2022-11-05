<nav class="py-2 bg-warning border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="index.php" class="nav-link link-dark px-2 active" aria-current="page">Inicio</a></li>
            <li class="nav-item"><a href="index.php?modulo=contacto" class="nav-link link-dark px-2">Contacto</a></li>
            <li class="nav-item"><a href="index.php?modulo=allproductos" class="nav-link link-dark px-2">Productos</a></li>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" action="index.php">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre'] ?? ''; ?>">
                <input type="hidden" name="modulo" value="allproductos">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <box-icon name='search'></box-icon>
                    </button>
                </div>
            </div>
        </form>
    </div>
</nav>
<header class="py-3">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="./index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap" />
            </svg>
            <img class="fs-4" src="./admin/dist/img/LOGO NATALIA VIERA.png" alt="Natalia Viera" width="220px">

        </a>

        <!-- Right navbar links -->
        <!-- Carrito Dropdown Menu -->
        <li class="nav-item dropdown" style="list-style-type: none;">
            <a class="nav-link" href="./index.php?modulo=carrito" id="iconoCarrito" data-bs-toggle="dropdown" aria-expanded="false">
                <box-icon type='solid' name='cart' aria-hidden="true"></box-icon>
                <span class="badge badge-danger navbar-badge" id="badgeProducto"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">

            </ul>
        </li>
        <!-- Sesion Dropdown Menu -->
        <li class="nav-item dropdown" style="list-style-type: none;">
            <a class="nav-link" href="./pages/login.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <box-icon type='solid' name='user' aria-hidden="true"></box-icon>
            </a>
            <ul class="dropdown-menu dropdown-menu-md">
                <?php
                if (isset($_SESSION['idUsuario']) == false) {
                ?>
                    <li><a class="dropdown-item" href="./pages/login.php">
                            <box-icon name='log-in' class="mr-2"></box-icon>Iniciar Sesión
                        </a></li>

                    <div class="dropdown-divider"></div>

                    <li><a class="dropdown-item" href="./pages/registro.php">
                            <box-icon name='user' class="mr-2"></box-icon>Registrarse
                        </a></li>

                <?php
                } else {
                ?>
                    <a href="index.php?modulo=usuario" class="dropdown-item">
                        <box-icon name='user' class="mr-2"></box-icon></i>Hola <?php echo $_SESSION['nombreUsuario']; ?>
                    </a>
                    <div class="dropdown-divider"></div>

                    <?php if ($_SESSION['tipoUsuario'] == 'J' || $_SESSION['tipoUsuario'] == 'C' || $_SESSION['tipoUsuario'] == 'V') { ?>

                        <li><a class="dropdown-item" href="./admin/dashboard.php">
                                <box-icon name='bar-chart-alt-2' class="mr-2"></box-icon>Dashboard
                            </a></li>

                        <div class="dropdown-divider"></div>
                    <?php
                    }
                    ?>
                    <form action="index.php" method="post">
                        <button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
                            <box-icon name='log-out' class="mr-2"></box-icon></i>Cerrar sesión
                        </button>
                    </form>
                <?php
                }
                ?>
            </ul>
        </li>

    </div>
</header>


<?php
$mensaje = $_REQUEST['mensaje'] ?? '';
if ($mensaje) {
?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        <?php echo $mensaje; ?>
    </div>

<?php
}
?>