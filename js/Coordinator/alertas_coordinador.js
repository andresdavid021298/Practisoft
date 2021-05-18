//Metodo para mostrar alerta cuando se valida la solicitud de practicantes de una empresa
function validarSolicitud(id_solicitud) {
    console.log(id_solicitud);
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
    var inputArchivo = document.getElementById('input_archivo').value;
    var input_id_grupo = document.getElementById('input_id_grupo').value;
    console.log(inputArchivo);
    console.log(input_id_grupo);
    var fd = new FormData();
    var files = $('#input_archivo')[0].files;
    if (inputArchivo == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        fd.append('input_id_grupo', input_id_grupo);
        fd.append('input_archivo', files[0]);
        $.ajax({
            url: '../../Controller/Estudiante/Estudiante_Controller.php',
            type: 'post',
            dataType: "JSON",
            data: fd,
            contentType: false,
            processData: false,
        }).done(function(response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "ver_practicantes.php?id_grupo=" + input_id_grupo
            })
        })
    }
}

function eliminarEstudiante(id_estudiante){
    console.log(id_estudiante);
    var input_id_grupo = document.getElementById('input_id_grupo').value;
    console.log(input_id_grupo);
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
function vincularEstudianteConEmpresa(id_estudiante, id_empresa, id_sollicitud) {

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
                        "id_solicitud": id_solicitud
                    },
                    dataType: "JSON"
                })
                .done(function(response) {
                    swal.fire({
                        icon: response.state,
                        title: response.title
                    }).then(() => {
                        window.location = "asignar_practicantes.php";
                    })
                })
        }
    })

}