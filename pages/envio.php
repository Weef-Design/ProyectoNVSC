<?php
if (isset($_SESSION['idUsuario'])) {
    if(isset($_REQUEST['guardar'])){
        $nombreCli=$_REQUEST['nombreCli']??'';
        $emailCli=$_REQUEST['emailCli']??'';
        $direccionCli=$_REQUEST['direccionCli']??'';
        $telefonoCli=$_REQUEST['telefonoCli']??'';
        $queryCli="UPDATE Usuario SET NombreUsuario='$nombreCli',Email='$emailCli',Direccion='$direccionCli',Telefono='$telefonoCli' where ID_Usuario='".$_SESSION['idUsuario']."' ";
        $resCli=mysqli_query($con,$queryCli);

        $nombreRec=$_REQUEST['nombreRec']??'';
        $emailRec=$_REQUEST['emailRec']??'';
        $direccionRec=$_REQUEST['direccionRec']??'';
        $telefonoRec=$_REQUEST['telefonoRec']??'';

        $queryRec="INSERT INTO datosEnvio (ID_Cliente,Email,Direccion,Telefono,Nombre) VALUES ('".$_SESSION['idUsuario']."','$emailRec','$direccionRec','$telefonoRec','$nombreRec')
        ON DUPLICATE KEY UPDATE
        Nombre='$nombreRec',Email='$emailRec',Direccion='$direccionRec',Telefono='$telefonoRec'; ";
        $resRec=mysqli_query($con,$queryRec);
        if($resCli && $resRec){
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=pasarela" />';
        }
        else{
        ?>
            <div class="alert alert-danger" role="alert">
                Error
            </div>
        <?php
        }
    }
    $queryCli="SELECT NombreUsuario,Email,Direccion,Telefono from Usuario where ID_Usuario='".$_SESSION['idUsuario']."';";
    $resCli=mysqli_query($con,$queryCli);
    $rowCli=mysqli_fetch_assoc($resCli);

    $queryRec="SELECT Nombre,Email,Direccion,Telefono from datosEnvio where ID_Cliente='".$_SESSION['idUsuario']."';";
    $resRec=mysqli_query($con,$queryRec);
    $rowRec=mysqli_fetch_assoc($resRec);

?>
    <form method="post">
        <div class="container mt-3">
            <div class="row">
                <div class="col-6">
                    <h3>Datos del cliente</h3>
                    <div class="form-group">
                        <label for="nombreCli">Nombre</label>
                        <input type="text" name="nombreCli" id="nombreCli" class="form-control" value="<?php echo $rowCli['NombreUsuario'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="emailCli">Email</label>
                        <input type="email" name="emailCli" id="emailCli" class="form-control" readonly="readonly" value="<?php echo $rowCli['Email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="direccionCli">Dirección</label>
                        <input type="text" name="direccionCli" id="direccionCli" class="form-control" value="<?php echo $rowCli['Direccion'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefonoCli">Teléfono</label>
                        <input type="text" name="telefonoCli" id="telefonoCli" class="form-control" value="<?php echo $rowCli['Telefono'] ?>">
                    </div>
                </div>
                <div class="col-6">
                    <h3>Datos de envío de compra</h3>
                    <div class="form-group">
                        <label for="nombreRec">Nombre</label>
                        <input type="text" name="nombreRec" id="nombreRec" class="form-control" value="<?php echo $rowRec['Nombre'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="emailRec">Email</label>
                        <input type="email" name="emailRec" id="emailRec" class="form-control" value="<?php echo $rowRec['Email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="direccionRec">Dirección</label>
                        <input type="text" name="direccionRec" id="direccionRec" class="form-control" value="<?php echo $rowRec['Direccion'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefonoRec">Teléfono</label>
                        <input type="text" name="telefonoRec" id="telefonoRec" class="form-control" value="<?php echo $rowRec['Telefono'] ?>" >
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="tomarDatosEnvio">
                            Usar datos del cliente
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-warning" href="index.php?modulo=carrito" role="button">Regresar al carrito</a>
        <button type="submit" class="btn btn-primary float-right" name="guardar" value="guardar">Continuar a Métodos de Pago</button>
    </form>
<?php
} else {
?>
    <div class="mt-5 text-center">
        Debe <a href="./pages/login.php">Iniciar Sesión</a> o <a href="./pages/registro.php">Registrarse</a>
    </div>
<?php

}
?>