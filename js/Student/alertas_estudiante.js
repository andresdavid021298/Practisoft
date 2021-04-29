// Metodo que permite mostrar una alerta la momento de agregar una nueva activiad por parte del estudiante
function agregarActividad() {
    var fecha = document.getElementById("fecha").value;
    var horas = document.getElementById("horas").value;
    var descripcion = document.getElementById("descripcion").value;
    var idEstudiante = document.getElementById("id_estudiante").value;
    if (fecha == "" || horas == "" || descripcion == "") {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        $.ajax({
                url: "../../Controller/Actividad/Actividad_Controller.php",
                type: "POST",
                data: {
                    "accion": "agregar_actividad",
                    "id": idEstudiante,
                    "fecha": fecha,
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

// Metodo que permite mostrar una alerta al momento de actualizar una actividad
function actualizarActividad() {
    var fecha = document.getElementById("fecha_input").value;
    var horas = document.getElementById("horas_input").value;
    var descripcion = document.getElementById("descripcion_input").value;
    var idActividad = document.getElementById("id_input").value;
    console.log(fecha);
    console.log(horas);
    console.log(descripcion);
    console.log(idActividad);
    if (fecha == "" || horas == "" || descripcion == "") {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        $.ajax({
                url: "../../Controller/Actividad/Actividad_Controller.php",
                type: "POST",
                data: {
                    "accion": "actualizar_actividad",
                    "id": idActividad,
                    "fecha": fecha,
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

// Metodo que le muestra una alerta al estudiante al momento de eliminar una actividad
function eliminarActividad(id_actividad) {
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

// Metodo que permite mostrar una alerta al momento de actualizar su perfil 
function actualizarPerfil() {
    var codigo = document.getElementById("input_codigo").value;
    var nombre = document.getElementById("input_nombre").value;
    var celular = document.getElementById("input_celular").value;
    var id_estudiante = document.getElementById("input_id_estudiante").value;
    if (codigo == "" || nombre == "" || celular == "") {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        $.ajax({
                url: "../../Controller/Estudiante/Estudiante_Controller.php",
                type: "POST",
                data: {
                    "accion": "actualizar_perfil",
                    "id_estudiante": id_estudiante,
                    "nombre": nombre,
                    "codigo": codigo,
                    "celular": celular
                },
                dataType: "JSON"
            })
            .done(function(response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = "perfil.php";
                })
            })
    }
}

// Metodo que muestra una alerta al estudiante al momento de guardar la inscripicion
function guardarEncuestaInscripcion() {
    id_estudiante = document.getElementById("input_id_estudiante").value;
    area_desarrollo = document.getElementById("select_area_desarrollo").value;
    area_mantenimiento = document.getElementById("select_area_mantenimiento").value;
    area_servidores = document.getElementById("select_area_servidores").value;
    area_redes = document.getElementById("select_area_redes").value;
    area_capacitacion = document.getElementById("select_area_capacitacion").value;
    console.log("ID: " + id_estudiante);
    console.log("Capacitacion: " + area_capacitacion);
    console.log("Desarrollo: " + area_desarrollo);
    console.log("Redes: " + area_redes);
    console.log("Mantenimiento: " + area_mantenimiento);
    console.log("Servidores: " + area_servidores);
    $.ajax({
            url: "../../Controller/Encuesta_Areas/Encuesta_Areas_Controller.php",
            type: "POST",
            data: {
                "accion": "guardar_inscripcion",
                "id_estudiante": id_estudiante,
                "area_capacitacion": area_capacitacion,
                "area_mantenimiento": area_mantenimiento,
                "area_desarrollo": area_desarrollo,
                "area_servidores": area_servidores,
                "area_redes": area_redes
            },
            dataType: "JSON"
        })
        .done(function(response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "index_student.php";
            })
        })
}