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

//Metodo para actualizar datos de coordinador
function actualizarPerfil(){
    var id_coordinador= document.getElementById('id_coordinador').value;
    var codigo_coordinador = document.getElementById('input_codigo').value;
    var celular_coordinador = document.getElementById('input_celular').value;
    
    $.ajax({
        url: "../../Controller/Coordinador/Coodinador_Controller.php",
        type: "POST",
        data: {
            "accion": "actualizar_perfil",
            "id_coordinador": id_coordinador,
            "codigo_coordinador": codigo_coordinador,
            "celular_coordinador":celular_coordinador
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