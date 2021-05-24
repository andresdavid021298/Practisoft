// Funcion que permite mostrar una alerta al momento de insertar un usuario
function agregarCoordinador() {
    nombre_coordinador = document.getElementById("nombre_coordinador").value
    correo_coordinador = document.getElementById("correo_coordinador").value
    if (nombre_coordinador == "" || correo_coordinador == "") {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        $.ajax({
            url: "../../Controller/Coordinador/Coodinador_Controller.php",
            type: "POST",
            data: {
                "accion": "agregar_coordinador",
                "nombre_coordinador": nombre_coordinador,
                "correo_coordinador": correo_coordinador
            },
            dataType: "JSON"
        })
            .done(function (response) {
                swal.fire({
                    icon: response.state,
                    title: response.title
                }).then(() => {
                    window.location = "agregar_coordinador.php";
                })
            })
    }

}

// Funcion que permite mostrar la alerta al momento de eliminar un coordinador
function eliminarCoordinador(id_coordinador) {
    $.ajax({
        url: "../../Controller/Coordinador/Coodinador_Controller.php",
        type: "POST",
        data: {
            "accion": "eliminar_coordinador",
            "id_coordinador": id_coordinador
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "agregar_coordinador.php";
            })
        })
}

// Funcion que permite mostrar una alerta al momento de crear un grupo
function crearGrupo() {
    nombre_grupo = document.getElementById('nombre_grupo').value;
    id_coordinador = document.getElementById('id_coordinador_option').value;

    $.ajax({
        url: "../../Controller/Grupo/Grupo_Controller.php",
        type: "POST",
        data: {
            "accion": "crear_grupo",
            "nombre_grupo": nombre_grupo,
            "id_coordinador": id_coordinador
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

// Funcion que permite mostrar una alerta al momento de eliminar un grupo
function eliminarGrupo(id_grupo) {
    $.ajax({
        url: "../../Controller/Grupo/Grupo_Controller.php",
        type: "POST",
        data: {
            "accion": "eliminar_grupo",
            "id_grupo": id_grupo
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

// Funcion que muestra una alerta cuando se actualiza el director
function editarDirector() {
    id_director = document.getElementById('input_id_director').value;
    nombre_director = document.getElementById('nombre_director').value;
    correo_director = document.getElementById('correo_director').value;
    $.ajax({
        url: "../../Controller/Director/Director_Controller.php",
        type: "POST",
        data: {
            "accion": "editar_director",
            "id_director": id_director,
            "nombre_director": nombre_director,
            "correo_director": correo_director
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

// Funcion que muestra una alerta cuando se abre el semestre
function abrirSemestre() {
    fecha = document.getElementById('fecha_inicio_semestre').value;

    let date = new Date(fecha);
    var mes = date.getMonth() + 1;
    var anio = date.getFullYear();
    var semestre = "";
    if (mes > 0 && mes < 7) {
        semestre = "I Semestre del " + anio;
    }
    else {
        semestre = "II Semestre del " + anio;
    }

    $.ajax({
        url: "../../Controller/Semestre/Semestre_Controller.php",
        type: "POST",
        data: {
            "accion": "insertar_semestre",
            "nombre_semestre": semestre
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "semestre.php";
            })
        })

}

// Metodo que permite mostrar una alerta cuando finaliza el semestre
function finalizarSemestre() {
    Swal.fire({
        title: '¿Está seguro que desea cerrar el semestre actual?',
        text: "Esta acción es irreversible, lo que conlleva la eliminación de los grupos existentes, los estudiantes matriculados y el semestre en curso",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, deseo finalizar el semestre!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                $.ajax({
                    url: "../../Controller/Director/Director_Controller.php",
                    type: "POST",
                    data: {
                        "accion": "finalizar_semestre",
                    },
                    dataType: "JSON"
                })
                    .done(function (response) {
                        swal.fire({
                            icon: response.state,
                            title: response.title
                        }).then(() => {
                            window.location = "semestre.php";
                        })
                    })
            )
        }
    })
}

//Método para mostrar alerta en el momento de validar fechas
function validarFechas() {
    var fecha_inicio = document.getElementById("fecha_inicio").value;
    var fecha_fin = document.getElementById("fecha_fin").value;
    if ((fecha_inicio == "") || (fecha_fin == "")) {
        swal.fire({
            icon: "warning",
            title: "Hay campos vacios"
        })
    } else {
        window.location = 'informe_historico.php?fecha_inicio='+fecha_inicio+'&fecha_fin='+fecha_fin;
    }
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