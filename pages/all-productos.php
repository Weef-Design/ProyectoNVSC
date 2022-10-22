<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.6.0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Link Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/products.css">

    <title>Natalia Viera | Productos</title>
</head>

<body>

    <!-- Incluimos Menu Principal -->
    <?php include("../layouts/_main-headerPages.php"); ?>


    <div class="d-flex flex-column flex-shrink-0 p-3 aside" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32">
                <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-4">Productos</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link link-dark" aria-current="page">
                    <svg class="bi pe-none me-2" width="16" height="16">
                        <use xlink:href="#home" />
                    </svg>
                    Uniformes
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi pe-none me-2" width="16" height="16">
                        <use xlink:href="#speedometer2" />
                    </svg>
                    Calzado
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi pe-none me-2" width="16" height="16">
                        <use xlink:href="#table" />
                    </svg>
                    Seguridad
                </a>
            </li>
        </ul>
    </div>

    <main>
        <div class="row">

            <div id="space-list">

            </div>

        </div>
    </main>

    <!-- Incluimos el Footer -->
    <?php include("../layouts/_footerPages.php"); ?>

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

    <!-- Link Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <!-- Link JS -->
    <script type="text/javascript" src="../js/main-scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: '../sql/products/get_all_products.php',
                type: 'POST',
                data: {},
                success: function(data) {
                    console.log(data);
                    let html = '';
                    for (var i = 0; i < data.datos.length; i++) {
                        html +=
                            '<div class="product">' +
                            '<a href="producto.php?p=' + data.datos[i].codpro + '">' +
                            '<div class="product-card">' +
                            '<div class="product-img"><img src="../assets/products/' + data.datos[i].rutimapro + '">' + '</div>' +
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

</body>

</html>