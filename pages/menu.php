                <!-- Navbar -->
                <nav class="navbar navbar-expand navbar-dark">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index.php" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index.php?modulo=contacto" class="nav-link">Contacto</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index.php?modulo=allproductos" class="nav-link">Productos</a>
                        </li>
                    </ul>

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-3" action="index.php">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar bg-gray" type="search" placeholder="Buscar" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre'] ?? ''; ?>">
                            <input type="hidden" name="modulo" value="allproductos">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Messages Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="carrito.php" id="iconoCarrito">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                <span class="badge badge-danger navbar-badge" id="badgeProducto"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">

                            </div>
                        </li>
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="./pages/login.php">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <?php
                                if (isset($_SESSION['idUsuario']) == false) {
                                ?>
                                    <a href="./pages/login.php" class="dropdown-item">
                                        <i class="fas fa-door-open mr-2 text-primary"></i>Loguearse
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="./pages/registro.php" class="dropdown-item">
                                        <i class="fas fa-sign-in-alt mr-2 text-primary"></i>Registrarse
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="index.php?modulo=usuario" class="dropdown-item">
                                        <i class="fas fa-user text-primary mr-2"></i>Hola <?php echo $_SESSION['nombreUsuario']; ?>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                
                                <?php if($_SESSION['tipoUsuario'] == 'J' || $_SESSION['tipoUsuario'] == 'C' || $_SESSION['tipoUsuario'] == 'V' ){ ?>
                                
                                    <a href="./admin/dashboard.php" class="dropdown-item">
                                        <i class="fas fa-chart-bar mr-2 text-warning"></i>Dashboard
                                    </a>
                                    <div class="dropdown-divider"></div>
                                <?php 
                                } 
                                ?>
                                    <form action="index.php" method="post">
                                        <button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
                                            <i class="fas fa-door-closed text-danger mr-2"></i>Cerrar sesión
                                        </button>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                </nav>
                <?php
                $mensaje = $_REQUEST['mensaje'] ?? '';
                if ($mensaje) {
                ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Cerrar</span>
                        </button>
                        <?php echo $mensaje; ?>
                    </div>
                <?php
                }
                ?>