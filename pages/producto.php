<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

	<title>Natalia Viera | Producto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Link Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
	
	<!-- Incluimos Menu Principal -->
	<?php include("../layouts/_main-headerPages.php"); ?>

	<div class="main-content">
		<div class="content-page">
			<section>
				<div class="part1">
					<img id="idimg" src="assets/products/crepe.jpg">
				</div>
				<div class="part2">
					<h2 id="idtitle">NOMBRE PRINCIPAL</h2>
					<h1 id="idprice">S/. 35.<span>99</span></h1>
					<h3 id="iddescription">Descripcion del producto</h3>
					<button onclick="iniciar_compra()">Comprar</button>
				</div>
			</section>
			<div class="title-section">Productos destacados</div>
			<div class="products-list" id="space-list">
			</div>
		</div>
	</div>

	<!-- Incluimos Footer -->
	<?php include("../layouts/_footerPages.php"); ?>

	<script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

	<!-- Link Boostrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	
	<!-- Link JS -->
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		var p = '<?php echo $_GET["p"]; ?>';
	</script>
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
						if (data.datos[i].codpro == p) {
							document.getElementById("idimg").src = "../assets/products/" + data.datos[i].rutimapro;
							document.getElementById("idtitle").innerHTML = data.datos[i].nompro;
							document.getElementById("idprice").innerHTML = formato_precio(data.datos[i].prepro);
							document.getElementById("iddescription").innerHTML = data.datos[i].despro;
						}
						html +=
							'<div class="product">' +
							'<a href="producto.php?p=' + data.datos[i].codpro + '">' +
							'<div class="product-card">' +
								'<div class="product-img"><img src="../assets/products/' + data.datos[i].rutimapro + '">'+'</div>'+
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
			return "S/. " + array[0] + ".<span>" + array[1] + "</span>";
		}

		function iniciar_compra() {
			$.ajax({
				url: 'servicios/compra/validar_inicio_compra.php',
				type: 'POST',
				data: {
					codpro: p
				},
				success: function(data) {
					console.log(data);
					if (data.state) {
						alert(data.detail);
					} else {
						alert(data.detail);
						if (data.open_login) {
							open_login();
						}
					}
				},
				error: function(err) {
					console.error(err);
				}
			});
		}

		function open_login() {
			window.location.href = "login.php";
		}
	</script>
</body>

</html>