<?php
include "../sql/connect.inc";

$productID = $_POST["productID"];

$sql = "DELETE FROM Producto WHERE ID_Producto='$productID'";

if ($conex->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conex->error;
}

$conex->close();

header("Location: ../pages/crudproductos.php");

?>