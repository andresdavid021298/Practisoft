//M├ętodo para mostrar alerta en el momento en que una empresa se registra
function alertaRegistro() {
    var nombre_empresa = document.getElementById("inputNombreEmpresa").value;
    var representante_legal = document.getElementById("inputRepresentanteLegal").value;
    var NIT = document.getElementById("inputNIT").value;
    var direccion_empresa = document.getElementById("inputDireccion").value;
    var municipio = document.getElementById("selectMunicipio").value;
    var correo_empresa = document.getElementById("inputCorreo").value;
    var pagina_web_empresa = document.getElementById("inputPaginaWeb").value;
    var celular_empresa = document.getElementById("inputContacto").value;
    var telefono_empresa = document.getElementById("inputTelefono").value;
    var sector_empresa = document.getElementById("selectSector").value;
    var actividad_empresa = document.getElementById("selectActividad").value;
    var clave_empresa = document.getElementById("inputClave1").value;
    var clave_empresa2 = document.getElementById("inputClave2").value;
    if (actividad_empresa == "Otro") {
        var otro_empresa = document.getElementById("inputActividadOtro").value;
        actividad_empresa = otro_empresa;
    }
    if ((nombre_empresa == "") || (representante_legal == "") || (NIT == "") || (direccion_empresa == "") || (correo_empresa == "") ||
        (celular_empresa == "") || (clave_empresa == "") || (clave_empresa2 == "") || (actividad_empresa == "")) {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        if (!validarTama├▒oClaveYCaracterNumerico(clave_empresa)) {
            swal.fire({
                icon: "warning",
                title: "La clave no cumple con las condiciones establecidas"
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
                    "pagina_web_empresa": pagina_web_empresa,
                    "celular_empresa": celular_empresa,
                    "telefono_empresa": telefono_empresa,
                    "sector_empresa": sector_empresa,
                    "actividad_empresa": actividad_empresa,
                    "clave_empresa": clave_empresa
                },
                dataType: "JSON"
            })
                .done(function (response) {
                    swal.fire({
                        icon: response.state,
                        title: response.title
                    }).then((result) => {
                        window.location = "../../index.php";
                    })
                })
        }
    }
}

function mostrarYOcultarInput() {
    var selectActividad = document.getElementById('selectActividad').value;
    if ((selectActividad == 'Tecnologia') || (selectActividad == 'Religioso') || (selectActividad == 'Comercial') ||
        (selectActividad == 'Servicios') || (selectActividad == 'Industrial') || (selectActividad == 'Educativo') || (selectActividad == 'Construccion')) {
        $('#divOtro').hide();
    } else {
        $('#divOtro').show();
    }
}

function validarTama├▒oClaveYCaracterNumerico() {
    var pas1 = document.getElementById('inputClave1').value;
    var tamanio = pas1.length;
    var numero = false;
    if (pas1.length >= 8) {
        for (var i = 0; i < pas1.length; i++) {
            if (pas1.charCodeAt(i) >= 48 && pas1.charCodeAt(i) <= 57) {
                numero = true;
            }
        }
        return numero;
    }
    return numero;
}

//M├ętodo para mostrar alerta cuando una empresa ingresa al sistema
function alertaLogin() {
    var email = document.getElementById("inputEmail").value;
    var password = document.getElementById("inputPassword").value;
    if ((email == "") || (password == "")) {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
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
            .done(function (response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }
}

//M├ętodo para mostrar alerta en el momento en que una empresa actualiza los datos
function actualizarDatos() {
    var idEmpresa = document.getElementById("id_empresa").value;
    var inputRepresentante = document.getElementById("inputRepresentante").value;
    var inputDireccion = document.getElementById("inputDireccion").value;
    var selectMunicipio = document.getElementById("select_municipio").value;
    var inputCorreo = document.getElementById("inputCorreo").value;
    var inputPaginaWeb = document.getElementById("inputPaginaWeb").value;
    var inputContacto = document.getElementById("inputContacto").value;
    var inputTelefono = document.getElementById("inputTelefono").value;
    if ((inputRepresentante == "") || (inputDireccion == "") || (selectMunicipio == "") || (inputCorreo == "") || (inputContacto == "")) {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
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
                "correo": inputCorreo,
                "contacto": inputContacto,
                "telefono": inputTelefono,
                "pagina_web": inputPaginaWeb
            },
            dataType: "JSON"
        })
            .done(function (response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }
}

//Metodo para mostrar alerta cuando se valida el plan de trabajo del estudiante
function validarPlanTrabajo(id_estudiante) {

    $.ajax({
        url: "../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php",
        type: "POST",
        data: {
            "accion": "validar_plan_trabajo",
            "id_estudiante": id_estudiante
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = response.location;
            })
        })
}

//Metodo para mostrar alerta cuando se rechaza el plan de trabajo del estudiante
function rechazarPlanTrabajo(id_estudiante) {
    var observacion = document.getElementById('observacion_plan').value;

    $.ajax({
        url: "../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php",
        type: "POST",
        data: {
            "accion": "rechazar_plan_trabajo",
            "id_estudiante": id_estudiante,
            "observacion": observacion
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = response.location;
            })
        })
}

function agregarTutor() {
    var nombre = document.getElementById('nombre_tutor').value;
    var correo = document.getElementById('correo_tutor').value;
    var celular = document.getElementById('celular_tutor').value;
    var idEmpresa = document.getElementById('id_empresa').value;

    if (nombre == "" || correo == "" || celular == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else if (validarEmail(correo) == 0) {
        swal.fire({
            icon: "warning",
            title: "Direcci├│n de correo inv├ílida"
        })
    } else {
        $.ajax({
            url: "../../Controller/Tutor/Tutor_Controller.php",
            type: "POST",
            data: {
                "accion": "registrar_tutor",
                "id": idEmpresa,
                "nombre_tutor": nombre,
                "correo_tutor": correo,
                "celular_tutor": celular
            },
            dataType: "JSON"
        })
            .done(function (response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }
}

function actualizarTutor() {
    var nombre = document.getElementById('nombre_tutor_act').value;
    var correo = document.getElementById('correo_tutor_act').value;
    var celular = document.getElementById('celular_tutor_act').value;
    var idEmpresa = document.getElementById('id_empresa_act').value;
    var idTutor = document.getElementById('id_tutor_act').value;

    if (nombre == "" || correo == "" || celular == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else if (validarEmail(correo) == 0) {
        swal.fire({
            icon: "warning",
            title: "Direcci├│n de correo inv├ílida"
        })
    }
    else {
        $.ajax({
            url: "../../Controller/Tutor/Tutor_Controller.php",
            type: "POST",
            data: {
                "accion": "actualizar_tutor",
                "id": idEmpresa,
                "id_tutor": idTutor,
                "nombre_tutor": nombre,
                "correo_tutor": correo,
                "celular_tutor": celular
            },
            dataType: "JSON"
        })
            .done(function (response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }

}

function eliminarTutor(id_tutor) {
    $.ajax({
        url: "../../Controller/Tutor/Tutor_Controller.php",
        type: "POST",
        data: {
            "accion": "eliminar_tutor",
            "id_tutor": id_tutor
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = response.location
            })
        })
}

//Metodo para asignar un tutor a un estudiante
function asignarTutor() {
    var id_estudiante = document.getElementById('id_estudiante_tut').value;
    var id_tutor = document.getElementById('id_tutor_est').value;

    $.ajax({
        url: "../../Controller/Estudiante/Estudiante_Controller.php",
        type: "POST",
        data: {
            "accion": "asignar_tutor_estudiante",
            "id_estudiante": id_estudiante,
            "id_tutor": id_tutor
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = response.location
            })
        })
}

//M├ętodo para mostrar alerta cuando una empresa agrega una solicitud de practicantes
function agregarSolicitud() {

    //Verifica el estado de todos los checks
    var isChecked = document.getElementById('check1').checked;
    var isChecked2 = document.getElementById('check2').checked;
    var isChecked3 = document.getElementById('check3').checked;
    var isChecked4 = document.getElementById('check4').checked;
    var isChecked5 = document.getElementById('check5').checked;
    var isCheckedMovil = document.getElementById('checkMovil').checked;
    var isCheckedEscritorio = document.getElementById('checkEscritorio').checked;
    var isCheckedWeb = document.getElementById('checkWeb').checked;
    var isCheckedSeguridad = document.getElementById('checkSeguridad').checked;
    var isCheckedDise├▒o = document.getElementById('checkDise├▒o').checked;
    var isCheckedMantenimiento = document.getElementById('checkMantenimiento').checked;
    var isCheckedOtra = document.getElementById('checkOtra').checked;

    //Si el estado es true, lo inserta en el arreglo areas
    var areas = [];
    if (isCheckedMovil == true) {
        c1 = document.getElementById('checkMovil').value;
        areas.push(c1);
    }
    if (isCheckedWeb == true) {
        c1 = document.getElementById('checkWeb').value;
        areas.push(c1);
    }
    if (isCheckedEscritorio == true) {
        c1 = document.getElementById('checkEscritorio').value;
        areas.push(c1);
    }
    if (isCheckedSeguridad == true) {
        c1 = document.getElementById('checkSeguridad').value;
        areas.push(c1);
    }
    if (isCheckedDise├▒o == true) {
        c1 = document.getElementById('checkDise├▒o').value;
        areas.push(c1);
    }
    if (isCheckedMantenimiento == true) {
        c1 = document.getElementById('checkMantenimiento').value;
        areas.push(c1);
    }
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
    if (isCheckedOtra == true) {
        otro = document.getElementById('input_otra').value;
        areas.push(otro);
    }

    //Concatena todos los elementos del arreglo areas con una coma (,) para conocer las areas seleccionadas por la empresa
    var areasSeleccionadas = areas.join();
    var numPracticantes = document.getElementById('practicantes').value;
    var idEmpresa = document.getElementById('id_empresa').value;

    if (numPracticantes == "" || areasSeleccionadas == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else if (numPracticantes < 1 || numPracticantes > 8) {
        swal.fire({
            icon: "warning",
            title: "N├║mero inv├ílido de practicantes. El n├║mero de practicantes debe estar entre 1 y 8."
        })
    }
    else {
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
            .done(function (response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }
}

//Metodo que muestra una alerta cuando se rechaza una solicitud
function cancelarSolicitud(id_solicitud) {
    $.ajax({
        url: "../../Controller/Solicitud/Solicitud_Controller.php",
        type: "POST",
        data: {
            "accion": "cancelar_solicitud",
            "id_solicitud": id_solicitud
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = response.location
            })
        })
}

//M├ętodo que permite mostrar alerta al momento de cambiar clave de una empresa
function cambiarClave() {
    var id_empresa = document.getElementById("input_id_empresa").value;
    var clave_empresa = document.getElementById("inputClave1").value;
    var clave_empresa2 = document.getElementById("inputClave2").value;
    if ((clave_empresa == "") || (clave_empresa2 == "")) {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else if (!validarTama├▒oClaveYCaracterNumerico(clave_empresa)) {
        swal.fire({
            icon: "warning",
            title: "La clave no cumple con las condiciones establecidas"
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
            .done(function (response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = response.location
                })
            })
    }
}

//M├ętodo que permite mostrar alerta cuando se valida una actividad de un estudiante por parte de su empresa
function validarActividad(id_actividad, id_actividad_plan_trabajo) {
    $.ajax({
        url: "../../Controller/Actividad/Actividad_Controller.php",
        type: "POST",
        data: {
            "accion": "validar_actividad",
            "id_actividad": id_actividad
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "detalles_actividades.php?id_actividad=" + id_actividad_plan_trabajo
            })
        })
}

//M├ętodo que permite mostrar alerta cuando se rechaza una actividad de un estudiante por parte de su empresa
function rechazarActividad(id_actividad_plan_trabajo) {
    var id_actividad = document.getElementById("id_actividad").value;
    var observaciones = document.getElementById("textarea_observaciones").value;
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
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "detalles_actividades.php?id_actividad=" + id_actividad_plan_trabajo
            })
        })
}

//M├ętodo que permite mostrar alerta cuando se sube un convenio con su fecha de inicio y fin
function subirConvenio() {
    var fechaInicio = document.getElementById('fecha_inicio').value;
    var fechaExpiracion = document.getElementById('fecha_expiracion').value;
    var inputArchivo = document.getElementById('input_archivo_documentos').value;
    if ((fechaInicio == "") || (fechaExpiracion == "") || (inputArchivo == "")) {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        //El boton de la vista debe ser tipo button
        $("#cargando").show();
        $.ajax({
            url: "../../Controller/Convenio/Convenio_Controller.php",
            type: "post",
            //Debe ser tipo JSON para poder mostrar la alerta
            dataType: "JSON",
            //Se hace referencia al formulario por jQuery
            data: new FormData($("#formConvenio")[0]),
            cache: false,
            contentType: false,
            processData: false
        }).done(function (response) {
            $("#cargando").hide();
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "documento_convenio.php"
            })
        })
    }
}

//M├ętodo que permite mostrar alerta cuando se sube el documento de protocolos de bioseguridad
function subirProtocolos() {
    var idEmpresa = document.getElementById('id_empresa').value;
    var nombreEmpresa = document.getElementById('nombre_empresa').value;
    var inputArchivo = document.getElementById('input_archivo').value;
    var fd = new FormData();
    var files = $('#input_archivo')[0].files;
    if (inputArchivo == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        fd.append('id_empresa', idEmpresa);
        fd.append('nombre_empresa', nombreEmpresa);
        fd.append('input_archivo', files[0]);
        $.ajax({
            url: '../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php',
            type: 'post',
            dataType: "JSON",
            data: fd,
            contentType: false,
            processData: false,
        }).done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "documento_protocolos.php"
            })
        })
    }
}

//Metodo que permite subir el documento del representante legal
function subirRepresentante() {
    var idEmpresa = document.getElementById('id_empresa').value;
    var nombreEmpresa = document.getElementById('nombre_empresa').value;
    var inputArchivo = document.getElementById('input_archivo_representante').value;
    var fd = new FormData();
    var files = $('#input_archivo_representante')[0].files;
    if (inputArchivo == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        fd.append('id_empresa', idEmpresa);
        fd.append('nombre_empresa', nombreEmpresa);
        fd.append('input_archivo_representante', files[0]);
        $.ajax({
            url: '../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php',
            type: 'post',
            dataType: "JSON",
            data: fd,
            contentType: false,
            processData: false,
        }).done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "documento_representante.php"
            })
        })
    }
}

//M├ętodo que permite mostrar alerta cuando se sube el documento de protocolos de bioseguridad
function subirCertificado() {
    var idEmpresa = document.getElementById('id_empresa').value;
    var nombreEmpresa = document.getElementById('nombre_empresa').value;
    var inputArchivo = document.getElementById('input_archivo_certificado').value;
    var fd = new FormData();
    var files = $('#input_archivo_certificado')[0].files;
    if (inputArchivo == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        fd.append('id_empresa', idEmpresa);
        fd.append('nombre_empresa', nombreEmpresa);
        fd.append('input_archivo_certificado', files[0]);
        $.ajax({
            url: '../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php',
            type: 'post',
            dataType: "JSON",
            data: fd,
            contentType: false,
            processData: false,
        }).done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "documento_certificado.php"
            })
        })
    }
}

//M├ętodo que permite mostrar alerta cuando se sube el documento de protocolos de bioseguridad
function subirRUT() {
    var idEmpresa = document.getElementById('id_empresa').value;
    var nombreEmpresa = document.getElementById('nombre_empresa').value;
    var inputArchivo = document.getElementById('input_archivo_rut').value;
    var fd = new FormData();
    var files = $('#input_archivo_rut')[0].files;
    if (inputArchivo == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        fd.append('id_empresa', idEmpresa);
        fd.append('nombre_empresa', nombreEmpresa);
        fd.append('input_archivo_rut', files[0]);
        $.ajax({
            url: '../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php',
            type: 'post',
            dataType: "JSON",
            data: fd,
            contentType: false,
            processData: false,
        }).done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "documento_rut.php"
            })
        })
    }
}

//M├ętodo que permite mostrar alerta al momento de cambiar clave de una empresa por email
function recuperarClaveEmail() {
    var inputCorreo = document.getElementById("input_correo").value;
    if (inputCorreo == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        $.ajax({
            url: "../../Controller/Empresa/Empresa_Controller.php",
            type: "POST",
            data: {
                "accion": "cambiar_clave_email",
                "input_correo": inputCorreo,
            },
            dataType: "JSON"
        })
            .done(function (response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = "../../index.php"
                })
            })
    }
}

//M├ętodo que permite mostrar alerta al momento de cambiar clave de una empresa por email
function restablecerClave() {
    var idEmpresa = document.getElementById("id_empresa").value;
    var inputClave1 = document.getElementById("inputClave1").value;
    var inputClave2 = document.getElementById("inputClave2").value;
    var token = document.getElementById("token").value;
    if (inputClave1 == "" || inputClave2 == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else if (!validarTama├▒oClaveYCaracterNumerico(inputClave1)) {
        swal.fire({
            icon: "warning",
            title: "La clave no cumple con las condiciones establecidas"
        })
    } else {
        $.ajax({
            url: "../../Controller/Empresa/Empresa_Controller.php",
            type: "POST",
            data: {
                "accion": "restablecer_clave",
                "id_empresa": idEmpresa,
                "inputClave1": inputClave1,
                "token": token
            },
            dataType: "JSON"
        })
            .done(function (response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = "../../index.php"
                })
            })
    }
}

function subirDocumento() {
    //Nombre de la columna separado por _
    var columna = document.getElementById('id_documento_option').value;
    //Nombre del documento
    var documento = columna.replace('archivo_', '');
    //archivo
    var inputArchivo = document.getElementById('input_archivo_documentos').value;
    var nombreEmpresa = document.getElementById('nombre_empresa').value;
    var idEmpresa = document.getElementById('id_empresa').value;
    var fd = new FormData();
    var files = $('#input_archivo_documentos')[0].files;
    if (inputArchivo == "") {
        swal.fire({
            icon: "warning",
            title: "Seleccione un archivo para cargar"
        })
    } else {
        fd.append('columna', columna);
        fd.append('nombre_documento', documento);
        fd.append('id_empresa', idEmpresa);
        fd.append('nombre_empresa', nombreEmpresa);
        fd.append('input_archivo_documentos', files[0]);
        $("#cargando").show();
        $.ajax({
            url: '../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php',
            type: 'post',
            dataType: "JSON",
            data: fd,
            contentType: false,
            processData: false,
        }).done(function (response) {
            $("#cargando").hide();
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "gestionar_documentacion.php"
            })
        })
    }

}

function validarEmail(correo) {
    var expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    var esValido = expReg.test(correo);
    if (esValido == true) {
        return 1;
    } else {
        return 0;
    }
}