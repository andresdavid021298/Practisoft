function alertaRegistro() {
    var nombre_empresa = document.getElementById("inputNombreEmpresa").value;
    var representante_legal = document.getElementById("inputRepresentanteLegal").value;
    var NIT = document.getElementById("inputNIT").value;
    var direccion_empresa = document.getElementById("inputDireccion").value;
    var municipio = document.getElementById("selectMunicipio").value;
    var correo_empresa = document.getElementById("inputCorreo").value;
    var celular_empresa = document.getElementById("inputContacto").value;
    var sector_empresa = document.getElementById("selectSector").value;
    var clave_empresa = document.getElementById("inputClave1").value;
    var clave_empresa2 = document.getElementById("inputClave2").value;
    if ((nombre_empresa == "") || (representante_legal == "") || (NIT == "") || (direccion_empresa == "") || (correo_empresa == "") || (celular_empresa == "") || (clave_empresa == "") || (clave_empresa2 == "")) {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        $.ajax({
                //Como hago el llamado a la funcion dentro de la carpeta View tengo que salir de la carpeta primero
                url: "../../Controller/Empresa/Empresa_Controller.php",
                type: "POST",
                data: {
                    "accion": "registrar",
                    "nombre_empresa": nombre_empresa,
                    "representante_legal": representante_legal,
                    "NIT": NIT,
                    "direccion_empresa": direccion_empresa,
                    "municipio": municipio,
                    "correo_empresa": correo_empresa,
                    "celular_empresa": celular_empresa,
                    "sector_empresa": sector_empresa,
                    "clave_empresa": clave_empresa

                },
                dataType: "JSON"
            })
            .done(function(response) {
                console.log(response);
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then((result) => {
                    window.location = "../../index.php";
                })
            })
    }
}

function alertaLogin() {
    var email = document.getElementById("inputEmail").value;
    var password = document.getElementById("inputPassword").value;
    if ((email == "") || (password == "")) {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        $.ajax({
                //Como hago llamado a la funcion desde la carpeta raiz no tengo que hacer ningun salto
                url: "Controller/Empresa/Empresa_Controller.php",
                type: "POST",
                data: {
                    "accion": "login",
                    "correo": email,
                    "clave": password

                },
                dataType: "JSON"
            })
            .done(function(response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }
}

function actualizarDatos() {
    var idEmpresa = document.getElementById("id_empresa").value;
    var inputRepresentante = document.getElementById("inputRepresentante").value;
    var inputDireccion = document.getElementById("inputDireccion").value;
    var selectMunicipio = document.getElementById("select_municipio").value;
    var inputTutor = document.getElementById("inputTutor").value;
    var inputCorreo = document.getElementById("inputCorreo").value;
    var inputContacto = document.getElementById("inputContacto").value;
    if ((inputRepresentante == "") || (inputDireccion == "") || (selectMunicipio == "") || (inputTutor == "") || (inputCorreo == "") || (inputContacto == "")) {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        $.ajax({
                url: "../../Controller/Empresa/Empresa_Controller.php",
                type: "POST",
                data: {
                    "accion": "actualizar_datos",
                    "id": idEmpresa,
                    "representante": inputRepresentante,
                    "direccion": inputDireccion,
                    "municipio": selectMunicipio,
                    "tutor": inputTutor,
                    "correo": inputCorreo,
                    "contacto": inputContacto,
                },
                dataType: "JSON"
            })
            .done(function(response) {
                console.log(response);
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }
}

function agregarSolicitud() {

    var isChecked = document.getElementById('check1').checked;
    var isChecked2 = document.getElementById('check2').checked;
    var isChecked3 = document.getElementById('check3').checked;
    var isChecked4 = document.getElementById('check4').checked;
    var isChecked5 = document.getElementById('check5').checked;

    var areas = [];
    if (isChecked == true) {
        c1 = document.getElementById('check1').value;
        areas.push(c1);
    }
    if (isChecked2 == true) {
        c2 = document.getElementById('check2').value;
        areas.push(c2);
    }
    if (isChecked3 == true) {
        c3 = document.getElementById('check3').value;
        areas.push(c3);
    }
    if (isChecked4 == true) {
        c4 = document.getElementById('check4').value;
        areas.push(c4);
    }
    if (isChecked5 == true) {
        c5 = document.getElementById('check5').value;
        areas.push(c5);
    }

    var areasSeleccionadas = areas.join();
    var numPracticantes = document.getElementById('practicantes').value;
    var idEmpresa = document.getElementById('id_empresa').value;
    if (practicantes == "" || areasSeleccionadas == "") {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        $.ajax({
                url: "../../Controller/Solicitud/Solicitud_Controller.php",
                type: "POST",
                data: {
                    "accion": "agregar_solicitud",
                    "id": idEmpresa,
                    "areas": areasSeleccionadas,
                    "practicantes": numPracticantes
                },
                dataType: "JSON"
            })
            .done(function(response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }
}

function cambiarClave() {
    var id_empresa = document.getElementById("input_id_empresa").value;
    var clave_empresa = document.getElementById("inputClave1").value;
    var clave_empresa2 = document.getElementById("inputClave2").value;
    if ((clave_empresa == "") || (clave_empresa2 == "")) {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        $.ajax({
                url: "../../Controller/Empresa/Empresa_Controller.php",
                type: "POST",
                data: {
                    "accion": "cambiar_clave",
                    "id_empresa": id_empresa,
                    "clave": clave_empresa

                },
                dataType: "JSON"
            })
            .done(function(response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }
}

function validarActividad(id_actividad, id_estudiante) {
    $.ajax({
            url: "../../Controller/Actividad/Actividad_Controller.php",
            type: "POST",
            data: {
                "accion": "validar_actividad",
                "id_actividad": id_actividad
            },
            dataType: "JSON"
        })
        .done(function(response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "detalles_actividades.php?id_estudiante=" + id_estudiante
            })
        })
}

function rechazarActividad(id_estudiante) {
    var id_actividad = document.getElementById("id_actividad").value;
    var observaciones = document.getElementById("textarea_observaciones").value;
    console.log("ID Estudiante:" + id_estudiante);
    console.log("Observaciones:" + observaciones);
    console.log("ID Actividad:" + id_actividad);
    $.ajax({
            url: "../../Controller/Actividad/Actividad_Controller.php",
            type: "POST",
            data: {
                "accion": "rechazar_actividad",
                "id_actividad": id_actividad,
                "observaciones": observaciones
            },
            dataType: "JSON"
        })
        .done(function(response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "detalles_actividades.php?id_estudiante=" + id_estudiante
            })
        })
}