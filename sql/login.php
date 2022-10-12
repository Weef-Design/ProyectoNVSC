<?php
include "../sql/connect.inc";

$userEmail = $_POST["userEmail"];
$userPassword = $_POST["userPassword"];

$sql= "SELECT * FROM Usuario WHERE Email = '$userEmail' and Contrasenia = '$userPassword'";

$result = mysqli_query($conex, $sql);

if(mysqli_num_rows($result) == 1){ 
    $tipoUsuario = mysqli_fetch_assoc($result);

    if ($tipoUsuario['Tipo'] == 'J') {

        header('location: ../pages/dashboard.html');	
        
    }elseif ($tipoUsuario['Tipo'] == 'U'){
        header('location: ../index.html');
    }
    
}

else{  
    echo '<script language="javascript">alert("Email o Contraseña incorrecta.");window.location.href="../pages/iniciosesion.html";</script>';
}    

$conex->close();

?>









