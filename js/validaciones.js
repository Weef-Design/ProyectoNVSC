$("#userAdd").click(agregarUsuario);
$("#userLogin").click(userLogin);

$("#vendedorAdd").click(agregarVendedor);
$("#vendedorDel").click(bajaVendedor);

$("#compradorAdd").click(agregarComprador);
$("#compradorDel").click(bajaComprador);

$("#productAdd").click(agregarProducto);
$("#productBajaEliminar").click(productBajaEliminar);
$("#productUpd").click(updateProducto);

function userLogin(){

    let userEmail = $("#userEmail").val();
    let userPassword = $("#userPassword").val();

    let mensaje = "Error\n";
    let error = false;

    if (userEmail == "") {
        mensaje = mensaje + "El campo Email esta vacio\n";
        error = true;
    }
    if (userPassword == "") {
        mensaje = mensaje + "El campo Contraseña esta vacio\n";
        error = true;
    }

    if (error) {
        alert(mensaje);
    } else {
        document.getElementById("frmLOGIN").submit();
    }
}

function agregarUsuario() {
    // Obtener valores de los inputs
    let userName = $("#userName").val();
    let userPhone = Number($("#userPhone").val());
    let userAddress = $("#userAddress").val();
    let userCity = $("#userCity").val();
    let userEmail = $("#userEmail").val();
    let userPassword = $("#userPassword").val();

    let mensaje = "Error\n";
    let error = false;

    if (userName == "") {
        mensaje = mensaje + "El campo Nombre esta vacio\n";
        error = true;
    }
    if (userPhone == "") {
        mensaje = mensaje + "El campo Celular/Telefono esta vacio\n";
        error = true;
    }
    if (userAddress == "") {
        mensaje = mensaje + "El campo Direccion esta vacio\n";
        error = true;
    }
    if (userCity == "") {
        mensaje = mensaje + "El campo Ciudad esta vacio\n";
        error = true;
    }
    if (userEmail == "") {
        mensaje = mensaje + "El campo Email esta vacio\n";
        error = true;
    }
    if (userPassword == "") {
        mensaje = mensaje + "El campo Contraseña esta vacio\n";
        error = true;
    }

    if (isNaN(userPhone)) {
        mensaje = mensaje + "telefono debe ser un valor numerico";
        error = true;
    }

    if (error) {
        alert(mensaje);
    } else {
        document.getElementById("frmAltaUsuario").submit();
    }

}

function agregarProducto() {
    // Obtener valores de los inputs
    let imagenProducto = $("#productImage").val();
    let nombreProducto = $("#productNombre").val();
    let precioProducto = Number($("#productPrecio").val());
    let stockProducto = Number($("#productStock").val());

    let mensaje = "Error\n";
    let error = false;

    if (imagenProducto == "") {
        mensaje = mensaje + "El campo Producto esta vacio\n";
        error = true;
    }
    if (nombreProducto == "") {
        mensaje = mensaje + "El campo Nombre esta vacio\n";
        error = true;
    }
    if (precioProducto == "") {
        mensaje = mensaje + "El campo Precio esta vacio\n";
        error = true;
    }
    if (stockProducto == "") {
        mensaje = mensaje + "El campo Stock esta vacio\n";
        error = true;
    }

    if (error) {
        alert(mensaje);
    } else {
        document.getElementById("frmAltaProducto").submit();
    }

}


function productBajaEliminar() {

    let id = Number($("#productID").val());
    var mensaje = "Error\n";
    var error = false;

    if (id == "") {
        mensaje = mensaje + "El campo Identificador esta vacio\n";
        error = true;
    }
    if (error) {
        alert(mensaje);
    } else {
        document.getElementById("frmBajaProducto").submit();
    }


}

function updateProducto() {

    let idupdate = Number($("#productIDUpd").val());
    var mensaje = "Error\n";
    var error = false;

    if (idupdate == "") {
        mensaje = mensaje + "El campo Identificador esta vacio\n";
        error = true;
    }
    if (error) {
        alert(mensaje);
    } else {
        document.getElementById("frmUpdProducto").submit();
    }

}




function agregarVendedor() {
    
    let userName = $("#userName").val();
    let userPhone = Number($("#userPhone").val());
    let userAddress = $("#userAddress").val();
    let userCity = $("#userCity").val();
    let userEmail = $("#userEmail").val();
    let userPassword = $("#userPassword").val();

    let mensaje = "Error\n";
    let error = false;

    if (userName == "") {
        mensaje = mensaje + "El campo Nombre esta vacio\n";
        error = true;
    }
    if (userPhone == "") {
        mensaje = mensaje + "El campo Celular/Telefono esta vacio\n";
        error = true;
    }
    if (userAddress == "") {
        mensaje = mensaje + "El campo Direccion esta vacio\n";
        error = true;
    }
    if (userCity == "") {
        mensaje = mensaje + "El campo Ciudad esta vacio\n";
        error = true;
    }
    if (userEmail == "") {
        mensaje = mensaje + "El campo Email esta vacio\n";
        error = true;
    }
    if (userPassword == "") {
        mensaje = mensaje + "El campo Contraseña esta vacio\n";
        error = true;
    }

    if (isNaN(userPhone)) {
        mensaje = mensaje + "telefono debe ser un valor numerico";
        error = true;
    }

    if (error) {
        alert(mensaje);
    } else {
        document.getElementById("frmAltaVendedor").submit();
    }

}

function bajaVendedor() {

    let id = Number($("#vendedorID").val());
    var mensaje = "Error\n";
    var error = false;

    if (id == "") {
        mensaje = mensaje + "El campo Identificador esta vacio\n";
        error = true;
    }
    if (error) {
        alert(mensaje);
    } else {
        document.getElementById("frmBajaVendedor").submit();
    }
}

function agregarComprador() {
    
    let userName = $("#compradorName").val();
    let userPhone = Number($("#compradorPhone").val());
    let userAddress = $("#compradorAddress").val();
    let userCity = $("#compradorCity").val();
    let userEmail = $("#compradorEmail").val();
    let userPassword = $("#compradorPassword").val();

    let mensaje = "Error\n";
    let error = false;

    if (userName == "") {
        mensaje = mensaje + "El campo Nombre esta vacio\n";
        error = true;
    }
    if (userPhone == "") {
        mensaje = mensaje + "El campo Celular/Telefono esta vacio\n";
        error = true;
    }
    if (userAddress == "") {
        mensaje = mensaje + "El campo Direccion esta vacio\n";
        error = true;
    }
    if (userCity == "") {
        mensaje = mensaje + "El campo Ciudad esta vacio\n";
        error = true;
    }
    if (userEmail == "") {
        mensaje = mensaje + "El campo Email esta vacio\n";
        error = true;
    }
    if (userPassword == "") {
        mensaje = mensaje + "El campo Contraseña esta vacio\n";
        error = true;
    }

    if (isNaN(userPhone)) {
        mensaje = mensaje + "telefono debe ser un valor numerico";
        error = true;
    }

    if (error) {
        alert(mensaje);
    } else {
        document.getElementById("frmAltaComprador").submit();
    }

}

function bajaComprador() {

    let id = Number($("#compradorID").val());
    var mensaje = "Error\n";
    var error = false;

    if (id == "") {
        mensaje = mensaje + "El campo Identificador esta vacio\n";
        error = true;
    }
    if (error) {
        alert(mensaje);
    } else {
        document.getElementById("frmBajaComprador").submit();
    }
}



