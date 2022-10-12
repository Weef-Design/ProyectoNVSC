<?php
include "../sql/connect.inc";

$compradorID = $_POST["compradorID"];

$sql = "DELETE FROM Usuario WHERE ID_Usuario='$compradorID'";

if ($conex->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conex->error;
}

$conex->close();

header("Location: ../pages/crudempleados.php");

?>