<?php
$conex = new mysqli("localhost","root","","Backend");
if ($conex->connect_error) {
die("Error!... No se ha podido conectar a la base de datos". $conex->connect_error);
}
?>
