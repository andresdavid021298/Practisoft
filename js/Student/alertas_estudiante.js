// Metodo que permite mostrar una alerta la momento de agregar una nueva activiad por parte del estudiante
function agregarActividad() {
    var id_actividad_plan_trabajo = document.getElementById("id_actividad_plan_trabajo").value;
    var fecha = document.getElementById("fecha").value;
    var horas = document.getElementById("horas").value;
    var descripcion = document.getElementById("descripcion").value;
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
                    "id": id_actividad_plan_trabajo,
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
                    window.location = "ver_actividades.php?id_actividad=" + id_actividad_plan_trabajo
                })
            })
    }
}

// Metodo que permite mostrar una alerta al momento de actualizar una actividad
function actualizarActividad() {
    var id_plan = document.getElementById("id_actividad_plan_trabajo").value;
    var fecha = document.getElementById("fecha_input").value;
    var horas = document.getElementById("horas_input").value;
    var descripcion = document.getElementById("descripcion_input").value;
    var idActividad = document.getElementById("id_input").value;
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
                    window.location = "ver_actividades.php?id_actividad=" + id_plan
                })
            })
    }
}

// Metodo que le muestra una alerta al estudiante al momento de eliminar una actividad
function eliminarActividad(id_actividad, id_actividad_plan_trabajo) {
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
                window.location = "ver_actividades.php?id_actividad=" + id_actividad_plan_trabajo
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

// Metodo para mostrar alerta al momento de agregar el plan de trabajo
function agregarPlanDeTrabajo() {
    var id_estudiante = document.getElementById("input_id_estudiante").value;
    var inputs_actividades;
    inputs_actividades = document.getElementsByClassName("form-control form-control-lg");
    var arreglo_actividades = []
    var longitud = inputs_actividades.length;
    var cantidad_horas = 0;
    for (let index = 0; index < longitud; index++) {
        arreglo_actividades.push(inputs_actividades[index].value)
        if (index % 2 != 0) {
            cantidad_horas = cantidad_horas + parseInt(inputs_actividades[index].value);
        }
    }
    existe_actividad_vacia = arreglo_actividades.includes("");
    if (existe_actividad_vacia) {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else if (cantidad_horas != 320) {
        swal.fire({
            icon: "warning",
            title: "No se cumplen las 320 horas reglamentarias"
        })
    } else {
        $.ajax({
                url: "../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php",
                type: "POST",
                data: {
                    "accion": "insertar_actividad_plan_trabajo",
                    "id_estudiante": id_estudiante,
                    "actividades": arreglo_actividades
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
}

// Metodo que permite conectar con el controlador para borrar luego de la accion en la alerta
function eliminarActividadesPlanTrabajo(id_estudiante) {
    $.ajax({
        url: "../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php",
        type: "POST",
        data: {
            "accion": "eliminar_actividad_plan_trabajo",
            "id_estudiante": id_estudiante
        },
        dataType: "JSON"
    }).done(function() {
        window.location = "plan_de_trabajo.php";
    })
}

//Método que permite conectar con el controlador para subir la carta compromisoria del estudiante
function subirCartaCompromisoria() {
    var idEstudiante = document.getElementById('id_estudiante').value;
    var nombreEstudiante = document.getElementById('nombre_estudiante').value;
    var inputArchivo = document.getElementById('input_archivo_carta').value;
    var fd = new FormData();
    var files = $('#input_archivo_carta')[0].files;
    if (inputArchivo == "") {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        fd.append('id_estudiante', idEstudiante);
        fd.append('nombre_estudiante', nombreEstudiante);
        fd.append('input_archivo_carta', files[0]);
        $.ajax({
            url: '../../Controller/DocumentosEstudiante/Documentos_Estudiante_Controller.php',
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
                window.location = "documento_carta_compromisoria.php"
            })
        })
    }
}

//Método que permite conectar con el controlador para subir el informe de avance del estudiante
function subirInformeAvance() {
    var idEstudiante = document.getElementById('id_estudiante').value;
    var nombreEstudiante = document.getElementById('nombre_estudiante').value;
    var inputArchivo = document.getElementById('input_archivo_informe').value;
    var fd = new FormData();
    var files = $('#input_archivo_informe')[0].files;
    if (inputArchivo == "") {
        swal.fire({
            icon: "warning",
            title: "Oops, Hay campos vacios"
        })
    } else {
        fd.append('id_estudiante', idEstudiante);
        fd.append('nombre_estudiante', nombreEstudiante);
        fd.append('input_archivo_informe', files[0]);
        $.ajax({
            url: '../../Controller/DocumentosEstudiante/Documentos_Estudiante_Controller.php',
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
                window.location = "documento_informe_avance.php"
            })
        })
    }
}