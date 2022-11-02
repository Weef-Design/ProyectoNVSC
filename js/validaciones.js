$("#empleadoAdd").click(agregarEmpleado);

function agregarEmpleado() {
    
    let userName = $("#userName").val();
    let userPhone = Number($("#userPhone").val());
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
        document.getElementById("frmAltaEmpleado").submit();
    }

}
