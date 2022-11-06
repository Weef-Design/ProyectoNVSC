<ul class="filtros">
<li><a href="index.php?modulo=allproductos"><img class="mr-2" src="./admin/dist/img/grid.png" alt="Uniformes" style="width: 22px">Todos</a></li>
<li><a href="index.php?modulo=uniformes&idCategoria=1"><img class="mr-1" src="./admin/dist/img/ropa-protectora.png" alt="Uniformes" style="width: 22px">Uniformes</a></li>
<li><a href="index.php?modulo=calzado&idCategoria=2"><img class="mr-1" src="./admin/dist/img/zapato.png" alt="Uniformes" style="width: 22px">Calzado</a></li>
<li><a href="index.php?modulo=seguridad&idCategoria=3"><img class="mr-1" src="./admin/dist/img/casco.png" alt="Uniformes" style="width: 22px">Seguridad</a></li>
<li><a href="index.php?modulo=otros&idCategoria=4"><img class="mr-1" src="./admin/dist/img/more-information.png" alt="Uniformes" style="width: 22px">Otros</a></li>
</ul>
<div class="allProducts row mt-1">
<?php
    if (isset($_REQUEST['idCategoria'])) {

    $idCat = mysqli_real_escape_string($con, $_REQUEST['idCategoria'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $where = " where 1=1 and Nombre_Producto like '%" . $nombre . "%' and ID_Categoria=$idCat";

    $queryCuenta = "SELECT COUNT(*) as cuenta FROM Producto  $where ;";
    $resCuenta = mysqli_query($con, $queryCuenta);
    $rowCuenta = mysqli_fetch_assoc($resCuenta);
    $totalRegistros = $rowCuenta['cuenta'];

    $elementosPorPagina = 4;

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
        <div class="cardProductos col-lg-3 col-md-6 col-sm-12">
            <div class="card border-primary" style="width: 240px; height: 300px">
                <a href="index.php?modulo=detalleproducto&id=<?php echo $row['ID_Producto'] ?>">
                    <img class="card-img-top img-thumbnail" style="height: 210px" src="./admin/dist/img/products/<?php echo $row['Ruta_Imagen'] ?>" alt="">
                    <div class="card-body">
                        <h2 class="card-title"><strong><?php echo $row['Nombre_Producto'] ?></strong></h2></a>
                        <p class="card-text">$<?php echo $row['Precio'] ?></p>
                    
                
            </div>
        </div>
</div>
<?php
    }
?>
</div>
</div>
<?php
if ($totalPaginas > 0) {
?>
    <nav aria-label="Page navigation">
        <ul class="pagination text-center d-flex align-items-center justify-content-center">
            <?php
            if ($paginaSel != 1) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?modulo=otros&idCategoria=4&pagina=<?php echo ($paginaSel - 1); ?>" aria-label="Previous">
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
                    <a class="page-link" href="index.php?modulo=otros&idCategoria=4&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php
            }
            ?>
            <?php
            if ($paginaSel != $totalPaginas) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?modulo=otros&idCategoria=4&pagina=<?php echo ($paginaSel + 1); ?>" aria-label="Next">
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
<?php
    }
?>