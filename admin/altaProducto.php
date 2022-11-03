<?php
include "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);

if (isset($_REQUEST['agregarProducto'])) {

  $productNombre = $_POST["productNombre"];
  $productPrecio = $_POST["productPrecio"];
  $productStock = $_POST["productStock"];
  $productTalle = $_POST["productTalle"] ?? '';
  $productDesc = $_POST["productDesc"] ?? '';

  $archivo = $_FILES['productImage']['name'];
  if (isset($archivo) && $archivo != "") {
    $tipo = $_FILES['productImage']['type'];
    $tamano = $_FILES['productImage']['size'];
    $temp = $_FILES['productImage']['tmp_name'];

    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
      echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=crudproductos&mensaje=Error. La extensión o el tamaño de los archivos no es correcta.<br/>
      - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo." />  ';
    } else {
      if (move_uploaded_file($temp, 'dist/img/products/' . $archivo)) {
        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
        chmod('dist/img/products/' . $archivo, 0777);
      } else {
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=crudproductos&mensaje=Ocurrió algún error al subir el fichero. No pudo guardarse." />  ';
      }
    }
  }

  $productProv = $_POST["productProv"];
  $productCat = $_POST["productCat"];

  $query = "INSERT INTO Producto(Nombre_Producto, Precio, Stock, Talle, Descuento, Ruta_Imagen, ID_Proveedor, ID_Categoria) 
        VALUE ('$productNombre','$productPrecio','$productStock','$productTalle', '$productDesc','$archivo','$productProv','$productCat');";

  $res = mysqli_query($con, $query);

  if ($res) {
    echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=crudproductos&mensaje=Producto añadido exitosamente" />  ';
  } else {
?>
    <div class="alert alert-danger" role="alert">
      Error al agregar producto.<?php echo mysqli_error($con); ?>
    </div>
<?php
  }
}
?>