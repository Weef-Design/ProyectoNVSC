<?php
include "../sql/connect.inc";

$vendedorID = $_POST["vendedorID"];

$sql = "DELETE FROM Usuario WHERE ID_Usuario='$vendedorID'";

if ($conex->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conex->error;
}

$conex->close();

header("Location: ../pages/crudempleados.php");

?>