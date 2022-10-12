<?php
include "../sql/connect.inc";

$userName = $_POST["userName"];
$userPhone = $_POST["userPhone"];
$userAddress = $_POST["userAddress"];
$userCity = $_POST["userCity"];
$userEmail = $_POST["userEmail"];
$userPassword = $_POST["userPassword"];

$sql = "INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Direccion, Ciudad, Tipo) 
        VALUE ('$userEmail','$userPassword','$userName','$userAddress','$userCity', 'V');";

$sql.= "INSERT INTO TelefonoUsuario(Telefono)
        VALUE ('$userPhone');";

$sql.= "INSERT INTO Vendedor(select ID_Usuario from Usuario ORDER BY ID_Usuario DESC LIMIT 1)";

if ($conex->multi_query($sql)) {
  do {
    /* almacenar primer juego de resultados */
    if ($result = $conex->store_result()) {
      while ($row = $result->fetch_row()) {
        printf("%s\n", $row[0]);
      }
      $result->free();
    }
    /* mostrar divisor */
    if ($conex->more_results()) {
      printf("-----------------\n");
    }
  } while ($conex->next_result());
} else {
  echo "Error: " . $sql . "<br>" . $conex->error;
}

$conex->close();

header("Location: ../pages/crudempleados.php");


?>
