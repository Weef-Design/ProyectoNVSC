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
$userDir = $_POST["userDir"];

$query = "INSERT INTO Usuario(Email, Contrasenia, NombreUsuario, Estado, FechaRegistro, Tipo, Direccion, Telefono) 
        VALUE ('$userEmail','$userPassword','$userName',1,'$fechaActual','$userTipo','$userDir','$userPhone');";

$res = mysqli_query($con, $query);

  if ($res) {
    echo '<meta http-equiv="refresh" content="0; url=dashboard.php?modulo=empleados&mensaje=Usuario añadido exitosamente" />  ';
  } else {
?>
    <div class="alert alert-danger" role="alert">
      Error al agregar empleado.<?php echo mysqli_error($con); ?>
    </div>
<?php
  }
?>

