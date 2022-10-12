<?php

include "../sql/connect.inc";

$productID = $_GET["productIDUpd"];
$productNombre = $_POST["productNombre"];
$productPrecio = $_POST["productPrecio"];
$productStock = $_POST["productStock"];
$productTalle = $_POST["productTalle"];
$productImage = $_POST["productImage"];
$productImageII = $_POST["productImageII"];
$productImageIII = $_POST["productImageIII"];

$sql="UPDATE Producto SET Nombre_Producto='$productNombre',Precio='$productPrecio',Stock='$productStock', Talle='$productTalle', Imagen_1='$productImage', Imagen_2='$productImageII', Imagen_3='$productImageIII' WHERE ID_Producto='$productID'";

if ($conex->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conex->error;
  }

$conex->close();

header("Location: ../pages/crudproductos.php");