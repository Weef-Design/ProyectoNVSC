<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./admin/dist/img/CAROUSEL UNIFORMES.png" class="d-block w-100" alt="Uniformes">
        </div>
        <div class="carousel-item">
            <img src="./admin/dist/img/CAROUSEL CALZADO.png" class="d-block w-100" alt="Calzado">
        </div>
        <div class="carousel-item">
            <img src="./admin/dist/img/CAROUSEL SEGURIDAD.png" class="d-block w-100" alt="Seguridad">
        </div>
        <div class="carousel-item">
            <img src="./admin/dist/img/CAROUSEL SEGURIDAD.png" class="d-block w-100" alt="Otros">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<h3 class="titulo">RECOMENDADO PARA TI</h3>

<div class="sliderRecom">
    <?php
    $query = "SELECT
                        ID_Producto,
                        Nombre_Producto,
                        Precio,
                        Ruta_Imagen,
                        Stock
                        FROM
                        Producto
                        GROUP BY Precio
                        limit 10
                        ";
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {

    ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-primary" style="width: 280px; height: 340px">
                <a href="index.php?modulo=detalleproducto&id=<?php echo $row['ID_Producto'] ?>">
                    <img class="card-img-top img-thumbnail" style="height: 250px" src="./admin/dist/img/products/<?php echo $row['Ruta_Imagen'] ?>" alt="">
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


<h3 class="titulo">OFERTAS IMPERDIBLES</h3>

<div class="sliderOfertas">
    <?php
    $query = "SELECT
                        ID_Producto,
                        Nombre_Producto,
                        Precio,
                        Ruta_Imagen,
                        Stock
                        FROM
                        Producto
                        GROUP BY Precio
                        limit 10
                        ";
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {

    ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card border-primary" style="width: 280px; height: 340px">
                <a href="index.php?modulo=detalleproducto&id=<?php echo $row['ID_Producto'] ?>">
                    <img class="card-img-top img-thumbnail" style="height: 250px" src="./admin/dist/img/products/<?php echo $row['Ruta_Imagen'] ?>" alt="">
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