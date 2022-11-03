<?php
include_once "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['idBorrar'])) {
    $id = mysqli_real_escape_string($con, $_REQUEST['idBorrar'] ?? '');
    $query = "DELETE from Producto where ID_Producto='" . $id . "';";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=crudproductos&mensaje=Producto eliminado exitosamente."/ > ';
    } else {
    ?>
        <div class="alert alert-danger" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <i class="fa fa-tag"></i>
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Agregar Producto
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-signin w-100 m-auto">
                                            <form action="altaProducto.php" method="post" enctype="multipart/form-data">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="productNombre" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="productNombre" id="productNombre" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="productPrecio" class="form-label">Precio</label>
                                                        <input type="number" class="form-control" name="productPrecio" id="productPrecio" required="required">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="productCat" class="form-label">Categoría</label>
                                                        <select class="form-control" name="productCat" id="productCat">
                                                            <option value="1">Uniformes</option>
                                                            <option value="2">Calzado</option>
                                                            <option value="3">Seguridad</option>
                                                            <option value="4">Accesorios</option>
                                                            <option value="5" selected>Otros</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="productStock" class="form-label">Stock</label>
                                                        <input type="number" class="form-control" name="productStock" id="productStock" required="required">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="productImage">Foto del Producto</label>
                                                        <input class="form-control" type="file" name="productImage" id="productImage">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="productProv" class="form-label">Proveedor</label>
                                                        <select class="form-control" name="productProv" id="productProv">
                                                            <option value="1">Montevideo Uniformes</option>
                                                            <option value="2">Fupi Seguridad Industrial</option>
                                                            <option value="3">VICAS</option>
                                                            <option value="4">Garimport</option>
                                                            <option value="5">Mundo Trabajo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div id="Talle"></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="w-100 btn btn-lg btn-warning" name="agregarProducto">Agregar</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Productos</h1>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="d-flex">
                                    <th class="col-3">Nombre</th>
                                    <th class="col-1">Precio</th>
                                    <th class="col-1">Stock</th>
                                    <th class="col-1">Talle</th>
                                    <th class="col-2">Categoría</th>
                                    <th class="col-2">Proveedor</th>
                                    <th class="col-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include_once "conectDB.php";
                                $con = mysqli_connect($host, $user, $pass, $db);
                                $query = "select * from Producto P 
                                join Categoria C on C.ID_Categoria=P.ID_Categoria
                                join Proveedor Pr on Pr.ID_Proveedor=P.ID_Proveedor
                                ;";
                                $res = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_array($res)) {
                                ?>

                                    <tr class="d-flex">
                                        <td class="col-3"><?php echo $row['Nombre_Producto'] ?></td>
                                        <td class="col-1">$<?php echo $row['Precio'] ?></td>
                                        <td class="col-1"><?php echo $row['Stock'] ?></td>
                                        <td class="col-1"><?php echo $row['Talle'] ?></td>
                                        <td class="col-2"><?php echo $row['Nombre_Categoria'] ?></td>
                                        <td class="col-2"><?php echo $row['Nombre_Proveedor'] ?></td>
                                        <td class="col-2">
                                            <a href="dashboard.php?modulo=editproductos&id=<?php echo $row['ID_Producto'] ?>"   style="margin-right:5px" title="Modificar Producto"><i class="fa fa-pen"></i></a>
                                            <a href="dashboard.php?modulo=crudproductos&idBorrar=<?php echo $row['ID_Producto'] ?>" title="Eliminar Producto" class="text-danger borrarProducto"><i class="fa fa-user-minus"></i></a>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>