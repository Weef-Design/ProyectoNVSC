<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.6.0.js"></script>
    <!-- Link Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- owl carousel -->
    <link rel="stylesheet" href="owl_carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl_carousel/owl.theme.default.css">

    <!-- Link Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Link CSS -->
    <link rel="stylesheet" href="./css/index.css">

    <title>Natalia Viera | Inicio</title>
</head>

<body>
    <!-- Incluimos Menu Principal -->
    <?php include("layouts/_main-header.php"); ?>

    <main>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/CAROUSEL UNIFORMES.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/CAROUSEL CALZADO.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/CAROUSEL SEGURIDAD.png" class="d-block w-100" alt="...">
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


        </div>

        <section class="recommended">
            <h2>RECOMENDADO PARA TI</h2>

                    <div id="space-list">
                    </div>

        </section>

        <section class="recommended">
            <h2>OFERTAS IMPERDIBLES</h2>

        </section>

        <section class="recommended">
            <h2>LOS MÁS VISTOS</h2>

        </section>

    </main>

    <!-- Incluimos el Footer -->
    <?php include("layouts/_footer.php"); ?>

    <!-- Link Boxicons -->
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

    <!-- Link Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- Link JS -->
    <!-- owl carousel -->
    <script src="owl_carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: 'sql/products/get_all_products.php',
                type: 'POST',
                data: {},
                success: function(data) {
                    console.log(data);
                    let html = '';
                    for (var i = 0; i < data.datos.length; i++) {
                        html +=
                            '<div class="product">' +
                            '<a href="./pages/producto.php?p=' + data.datos[i].codpro + '">' +
                            '<div class="product-card">' +
                            '<div class="product-img"><img src="assets/products/' + data.datos[i].rutimapro + '">' + '</div>' +
                            '<div class="product-title">' + data.datos[i].nompro + '</div>' +
                            '<div class="product-price">' + formato_precio(data.datos[i].prepro) + '</div>' +
                            '</div>' +
                            '</a>' +
                            '</div>';
                    }
                    document.getElementById("space-list").innerHTML = html;
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });

        function formato_precio(valor) {
            //10.99
            let svalor = valor.toString();
            let array = svalor.split(".");
            return "$ " + array[0] + ".<span>" + array[1] + "</span>";
        }
    </script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

</body>

</html>