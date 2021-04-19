function alertaRegistro() {
    var nombre_empresa = document.getElementById("inputNombreEmpresa").value;
    var representante_legal = document.getElementById("inputRepresentanteLegal").value;
    var direccion_empresa = document.getElementById("inputDireccion").value;
    var correo_empresa = document.getElementById("inputCorreo").value;
    var celular_empresa = document.getElementById("inputContacto").value;
    var sector_empresa = document.getElementById("selectSector").value;
    var clave_empresa = document.getElementById("inputClave1").value;
    var clave_empresa2 = document.getElementById("inputClave2").value;
    if ((nombre_empresa == "") || (representante_legal == "") || (direccion_empresa == "") || (correo_empresa == "") || (celular_empresa == "") || (clave_empresa == "") || (clave_empresa2 == "")) {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        $.ajax({
                url: "../Controller/Empresa_Controller.php",
                type: "POST",
                data: {
                    "accion": "insertar",
                    "nombre_empresa": nombre_empresa,
                    "representante_legal": representante_legal,
                    "direccion_empresa": direccion_empresa,
                    "correo_empresa": correo_empresa,
                    "celular_empresa": celular_empresa,
                    "sector_empresa": sector_empresa,
                    "clave_empresa": clave_empresa

                },
                dataType: "JSON"
            })
            .done(function(response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                })
            })
    }
}