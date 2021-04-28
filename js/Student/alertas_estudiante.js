function agregarActividad(){
    var fecha = document.getElementById("fecha").value;
    var horas = document.getElementById("horas").value;
    var descripcion = document.getElementById("descripcion").value;
    var idEstudiante = document.getElementById("id_estudiante").value;
    if(fecha == "" || horas == "" || descripcion == ""){
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    }else {
        $.ajax({
                url: "../../Controller/Actividad/Actividad_Controller.php",
                type: "POST",
                data: {
                    "accion": "agregar_actividad",
                    "id": idEstudiante,
                    "fecha":fecha,
                    "horas": horas,
                    "descripcion": descripcion
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

function actualizarActividad(){
    var fecha = document.getElementById("fecha_input").value;
    var horas = document.getElementById("horas_input").value;
    var descripcion = document.getElementById("descripcion_input").value;
    var idActividad = document.getElementById("id_input").value;
    console.log(fecha);
    console.log(horas);
    console.log(descripcion);
    console.log(idActividad);
    if(fecha == "" || horas == "" || descripcion == ""){
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    }else {
        $.ajax({
                url: "../../Controller/Actividad/Actividad_Controller.php",
                type: "POST",
                data: {
                    "accion": "actualizar_actividad",
                    "id": idActividad,
                    "fecha":fecha,
                    "horas": horas,
                    "descripcion": descripcion
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

function eliminarActividad(id_actividad){
    $.ajax({
        url: "../../Controller/Actividad/Actividad_Controller.php",
        type: "POST",
        data: {
            "accion": "eliminar_actividad",
            "id_actividad": id_actividad
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