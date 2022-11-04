<div class="row mt-1">
    <?php
    
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $where = " where 1=1 and Nombre_Producto like '%" . $nombre . "%'";
    
    $queryCuenta = "SELECT COUNT(*) as cuenta FROM Producto  $where ;";
    $resCuenta = mysqli_query($con, $queryCuenta);
    $rowCuenta = mysqli_fetch_assoc($resCuenta);
    $totalRegistros = $rowCuenta['cuenta'];

    $elementosPorPagina = 16;

    $totalPaginas = ceil($totalRegistros / $elementosPorPagina);

    $paginaSel = $_REQUEST['pagina'] ?? false;

    if ($paginaSel == false) {
        $inicioLimite = 0;
        $paginaSel = 1;
    } else {
        $inicioLimite = ($paginaSel - 1) * $elementosPorPagina;
    }
    $limite = " limit $inicioLimite,$elementosPorPagina ";
    $query = "SELECT 
                        ID_Producto,
                        Nombre_Producto,
                        Precio,
                        Ruta_Imagen,
                        Stock
                        FROM
                        Producto
                        $where
                        GROUP BY ID_Producto
                        $limite
                        ";
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-primary">
                <a href="index.php?modulo=detalleproducto&id=<?php echo $row['ID_Producto'] ?>">
                <img class="card-img-top img-thumbnail" src="./admin/dist/img/products/<?php echo $row['Ruta_Imagen'] ?>" alt="">
                <div class="card-body">
                    <h2 class="card-title"><strong><?php echo $row['Nombre_Producto'] ?></strong></h2>
                    <p class="card-text">$<?php echo $row['Precio'] ?></p>
                </a>    
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
if ($totalPaginas > 0) {
?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            if ($paginaSel != 1) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?modulo=allproductos&pagina=<?php echo ($paginaSel - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Anterior</span>
                    </a>
                </li>
            <?php
            }
            ?>

            <?php
            for ($i = 1; $i <= $totalPaginas; $i++) {
            ?>
                <li class="page-item <?php echo ($paginaSel == $i) ? " active " : " "; ?>">
                    <a class="page-link" href="index.php?modulo=allproductos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php
            }
            ?>
            <?php
            if ($paginaSel != $totalPaginas) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?modulo=allproductos&pagina=<?php echo ($paginaSel + 1); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </nav>
<?php
}
?>