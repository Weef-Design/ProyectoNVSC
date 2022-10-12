<?php
include "../sql/connect.inc";

$productNombre = $_POST["productNombre"];
$productPrecio = $_POST["productPrecio"];
$productStock = $_POST["productStock"];
$productTalle = $_POST["productTalle"];
$productImage = $_POST["productImage"];
$productImageII = $_POST["productImageII"];
$productImageIII = $_POST["productImageIII"];

$sql = "INSERT INTO Producto (Nombre_Producto,Precio,Stock,Talle,Imagen_1,Imagen_2,Imagen_3) 
        VALUE ('$productNombre','$productPrecio','$productStock','$productTalle','$productImage','$productImageII','$productImageIII') ";

if ($conex->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conex->error;
}

$conex->close();

header("Location: ../pages/crudproductos.php");
