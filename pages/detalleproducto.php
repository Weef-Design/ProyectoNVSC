<?php
$id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
$queryProducto = "SELECT * FROM Producto where ID_Producto='$id';  ";
$resProducto = mysqli_query($con, $queryProducto);
$rowProducto = mysqli_fetch_assoc($resProducto);

?>
<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['Nombre_Producto'] ?></h3>
                <div class="col-12">
                    <img src="admin/dist/img/products/<?php echo $rowProducto['Ruta_Imagen'] ?>" class="product-image">
                </div>
                <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb"><img src="admin/dist/img/products/<?php echo $rowProducto['Ruta_Imagen'] ?>"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?php echo $rowProducto['Nombre_Producto'] ?></h3>
                <hr>
                
                <div class="py-2 mt-4">
                    <h2 class="mb-0">
                    
                        $<?php echo $rowProducto['Precio']  ?>
                    </h2>
                </div>

                <p><?php echo $rowProducto['Stock'] ?> disponibles</p>

                <div class="mt-4">
                    <button class="btn btn-primary btn-lg btn-flat" id="agregarCarrito" 
                    data-id="<?php echo $_REQUEST['id'] ?>"
                    data-nombre="<?php echo $rowProducto['Nombre_Producto'] ?>"
                    data-web_path="./admin/dist/img/products/<?php echo $rowProducto['Ruta_Imagen'] ?>"
                    data-precio="<?php echo $rowProducto['Precio'] ?>"
                    >
                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                        Añadir al Carrito
                    </button>
                </div>
                <div class="mt-4">
                    Cantidad
                    <input type="number" class="form-control" style="width: 60px;" id="cantidadProducto" value="1">
                </div>

            </div>
        </div>
        
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripción</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $rowProducto['Descripcion'] ?></div>
            </div>
        </div>
        
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->