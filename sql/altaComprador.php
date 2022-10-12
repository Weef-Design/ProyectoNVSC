<?php
include "../sql/connect.inc";

$userName = $_POST["compradorName"];
$userPhone = $_POST["compradorPhone"];
$userAddress = $_POST["compradorAddress"];
$userCity = $_POST["compradorCity"];
$userEmail = $_POST["compradorEmail"];
$userPassword = $_POST["compradorPassword"];

$sql = "INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Direccion, Ciudad, Tipo) 
        VALUE ('$userEmail','$userPassword','$userName','$userAddress','$userCity', 'C');";

$sql.= "INSERT INTO TelefonoUsuario(Telefono)
        VALUE ('$userPhone');";

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
