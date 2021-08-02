//Metodo para mostrar alerta cuando se valida la solicitud de practicantes de una empresa
function validarSolicitud(id_solicitud) {
    $.ajax({
            url: "../../Controller/Solicitud/Solicitud_Controller.php",
            type: "POST",
            data: {
                "accion": "validar_solicitud",
                "id_solicitud": id_solicitud
            },
            dataType: "JSON"
        })
        .done(function(response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = response.location;
            })
        })
}

//Metodo para mostrar alerta cuando se rechaza la solicitud de practicantes de una empresa
function rechazarSolicitud() {
    var id_solicitud = document.getElementById('id_solicitud').value;
    var observacion = document.getElementById('observacion_solicitud').value;

    $.ajax({
            url: "../../Controller/Solicitud/Solicitud_Controller.php",
            type: "POST",
            data: {
                "accion": "rechazar_solicitud",
                "id_solicitud": id_solicitud,
                "observacion": observacion
            },
            dataType: "JSON"
        })
        .done(function(response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = response.location;
            })
        })
}

//Método que permite mostrar alerta cuando se sube el listado de estudiantes al sistema
function subirEstudiantes() {
    var inputArchivo = document.getElementById('input_archivo_documentos').value;
    var input_id_grupo = document.getElementById('input_id_grupo').value;
    var fd = new FormData();
    var files = $('#input_archivo_documentos')[0].files;
    if (inputArchivo == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        fd.append('input_id_grupo', input_id_grupo);
        fd.append('input_archivo', files[0]);
        $("#cargando_fichero").show();
        $.ajax({
            url: '../../Controller/Estudiante/Estudiante_Controller.php',
            type: 'post',
            dataType: "JSON",
            data: fd,
            contentType: false,
            processData: false,
        }).done(function(response) {
            $("#cargando_fichero").hide();
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "ver_practicantes.php?id_grupo=" + input_id_grupo
            })
        })
    }
}

// Metodo que permite agregar estudiante de forma individual
function agregarEstudianteIndividual() {
    var correo_estudiante = document.getElementById('correo_estudiante').value;
    var input_id_grupo = document.getElementById('input_id_grupo').value;
    if (correo_estudiante == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        $("#cargando").show();
        $.ajax({
                url: "../../Controller/Estudiante/Estudiante_Controller.php",
                type: "POST",
                data: {
                    "accion": "agregar_estudiante_individual",
                    "correo_estudiante": correo_estudiante,
                    "input_id_grupo": input_id_grupo
                },
                dataType: "JSON"
            })
            .done(function(response) {
                $("#cargando").hide();
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = "ver_practicantes.php?id_grupo=" + input_id_grupo
                })
            })
    }

}

function eliminarEstudiante(id_estudiante) {
    var input_id_grupo = document.getElementById('input_id_grupo').value;
    swal.fire({
        title: '¿Esta seguro de eliminar este estudiante?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                    url: "../../Controller/Estudiante/Estudiante_Controller.php",
                    type: "POST",
                    data: {
                        "accion": "eliminar_estudiante",
                        "id_estudiante": id_estudiante
                    },
                    dataType: "JSON"
                })
                .done(function(response) {
                    swal.fire({
                        icon: response.state,
                        title: response.title
                    }).then(() => {
                        window.location = "ver_practicantes.php?id_grupo=" + input_id_grupo
                    })
                })
        }
    })
}

//Metodo para actualizar datos de coordinador
function actualizarPerfil() {
    var id_coordinador = document.getElementById('id_coordinador').value;
    var codigo_coordinador = document.getElementById('input_codigo').value;
    var celular_coordinador = document.getElementById('input_celular').value;

    $.ajax({
            url: "../../Controller/Coordinador/Coodinador_Controller.php",
            type: "POST",
            data: {
                "accion": "actualizar_perfil",
                "id_coordinador": id_coordinador,
                "codigo_coordinador": codigo_coordinador,
                "celular_coordinador": celular_coordinador
            },
            dataType: "JSON"
        })
        .done(function(response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = response.location;
            })
        })
}

//Metodo para mostrar alerta al momento de vincular un estudiante con una empresa
function vincularEstudianteConEmpresa(id_estudiante, id_empresa, nombre_empresa, funciones, id_solicitud) {
    id_grupo = document.getElementById('id_grupo').value;
    nombre_estudiante = document.getElementById('nombre_estudiante').value;

    swal.fire({
        title: '¿Esta seguro de vincular al estudiante?',
        showCancelButton: true,
        confirmButtonText: "Vincular",
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                    url: "../../Controller/Estudiante/Estudiante_Controller.php",
                    type: "POST",
                    data: {
                        "accion": "asignar_empresa_estudiante",
                        "id_estudiante": id_estudiante,
                        "id_empresa": id_empresa,
                        "id_solicitud": id_solicitud,
                        "funciones": funciones,
                        "nombre_empresa": nombre_empresa,
                        "nombre_estudiante": nombre_estudiante
                    },
                    dataType: "JSON"
                })
                .done(function(response) {
                    swal.fire({
                        icon: response.state,
                        title: response.title
                    }).then(() => {
                        window.location = "asignar_practicantes.php?id_grupo=" + id_grupo;
                    })
                })
        }
    })
}

function imprimirInformeEstadistico() {
    $('.imagen_header').hide();
    $('.navbar-nav').hide();
    $('#imprimirInforme').hide();
    $('.foot').css("visibility", "hidden");
    window.print();
    $('.imagen_header').show();
    $('.navbar-nav').show();
    $('#imprimirInforme').show();
    $('.foot').css("visibility", "visible");
}