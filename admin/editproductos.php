<?php
include_once "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['editProducto'])) {

  $productNombre = mysqli_real_escape_string($con, $_REQUEST['productNombre'] ?? '');
  $productPrecio = mysqli_real_escape_string($con, $_REQUEST['productPrecio'] ?? '');
  $productStock = mysqli_real_escape_string($con, $_REQUEST['productStock'] ?? '');
  $productTalle = mysqli_real_escape_string($con, $_REQUEST['productTalle'] ?? '');
  $productDesc = mysqli_real_escape_string($con, $_REQUEST['productDesc'] ?? '');

  $archivo = $_FILES['productImage']['name'];
  if (isset($archivo) && $archivo != "") {
    $tipo = $_FILES['productImage']['type'];
    $tamano = $_FILES['productImage']['size'];
    $temp = $_FILES['productImage']['tmp_name'];

    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
      echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=editproductos&mensaje=Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo." />  ';
    } else {
      if (move_uploaded_file($temp, 'dist/img/products/' . $archivo)) {
        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
        chmod('dist/img/products/' . $archivo, 0777);
      } else {
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=editproductos&mensaje=Ocurrió algún error al subir el fichero. No pudo guardarse." />  ';
      }
    }
  }

  $productProv = mysqli_real_escape_string($con, $_REQUEST['productProv'] ?? '');
  $productCat = mysqli_real_escape_string($con, $_REQUEST['productCat'] ?? '');
  $id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');

  $sql = "UPDATE Producto SET
        Nombre_Producto='" . $productNombre . "',Precio='" . $productPrecio . "',Stock='" . $productStock . "', Talle='" . $productTalle . "',Descuento='" . $productDesc . "',Ruta_Imagen='" . $archivo . "',ID_Proveedor='" . $productProv . "',ID_Categoria='" . $productCat . "'
        where ID_Producto='" . $id . "';";

  $result = mysqli_query($con, $sql);
  if ($result) {
    echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=crudproductos&mensaje=Producto editado exitosamente." />  ';
  } else {
?>
    <div class="alert alert-danger" role="alert">
      Error al editar producto. <?php echo mysqli_error($con); ?>
    </div>
<?php
  }
}
$id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
$query = "SELECT * from Producto
        where ID_Producto='" . $id . "'; ";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($res);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Producto</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-signin w-100 m-auto">
              <form action="dashboard.php?modulo=crudproductos" method="post" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-md-6">
                    <label for="productNombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="productNombre" id="productNombre" value="<?php echo $row['Nombre_Producto'] ?>" required="required">
                  </div>
                  <div class="col-md-6">
                    <label for="productPrecio" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="productPrecio" id="productPrecio" value="<?php echo $row['Precio'] ?>" required="required">
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
                    <input type="number" class="form-control" name="productStock" id="productStock" value="<?php echo $row['Stock'] ?>" required="required">
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
                    <label for="productDesc" class="form-label">Descuento</label>
                    <input type="number" class="form-control" name="productDesc" id="productDesc" value="<?php echo $row['Descuento'] ?>">
                  </div>
                  <div class="col-md-6">
                    <div id="Talle"></div>
                  </div>
                </div>
                <br>
                <input type="hidden" name="id" value="<?php echo $row['ID_Producto'] ?>">
                <button type="submit" class="w-100 btn btn-lg btn-warning" name="editProducto">Modificar</button>

              </form>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>