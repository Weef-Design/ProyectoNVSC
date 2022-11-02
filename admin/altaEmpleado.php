<?php
include "conectDB.php";
$con = mysqli_connect($host, $user, $pass, $db);

$userEmail = $_POST["userEmail"];
$userPassword = $_POST["userPassword"];
$userPassword = md5($userPassword);
$userName = $_POST["userName"];
$fechaActual = date('y-m-d');
$userTipo = $_POST["userTipo"];

$userPhone = $_POST["userPhone"];

$sql = "INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Estado, FechaRegistro, Tipo) 
        VALUE ('$userEmail','$userPassword','$userName',1,'$fechaActual','$userTipo');";

$sql.= "INSERT INTO TelefonoUsuario(Telefono)
        VALUE ('$userPhone');";

if ($con->multi_query($sql)) {
  do {
    /* almacenar primer juego de resultados */
    if ($result = $con->store_result()) {
      while ($row = $result->fetch_row()) {
        printf("%s\n", $row[0]);
      }
      $result->free();
    }
    /* mostrar divisor */
    if ($con->more_results()) {
      printf("-----------------\n");
    }
  } while ($con->next_result());
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

header("Location: dashboard.php?modulo=empleados");


?>
