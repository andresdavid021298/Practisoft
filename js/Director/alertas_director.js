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

// Funcion que permite mostrar la alerta al momento de actualizar un coordinador
function actualizarCoordinador() {
    id = document.getElementById('id_coordinador_act').value;
    nombre = document.getElementById('nombre_coordinador_act').value;
    correo = document.getElementById('correo_coordinador_act').value;

    $.ajax({
        url: "../../Controller/Coordinador/Coodinador_Controller.php",
        type: "POST",
        data: {
            "accion": "actualizar_coordinador",
            "id_coordinador": id,
            "nombre_coordinador": nombre,
            "correo_coordinador": correo
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
        confirmButtonText: '¡Si, deseo finalizar el semestre!'
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

// Método para agregar un documento en documento_empresa
function crearDocumento(){
    var nombre_documento = document.getElementById('nombre_documento').value;
    
    // var final = "";
    // var cont = 0;
    // for (let index = 0; index < nombre_documento.length; index++) {
        //console.log(nombre_documento.replace(' ', '_'));
            
            // final = final+nombre_documento.charAt(index);
        // }
        // console.log(nombre_documento.charAt());
        
    var formato_nombre = 'archivo_'+nombre_documento.replace(/ /g, '_');
     
    $.ajax({
        url: "../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php",
        type: "POST",
        data: {
            "accion": "crear_documento_BD",
            "nombre_documento": formato_nombre
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "gestionar_documentos_semestre.php";
            })
        })
}

// Método para mostrar una alerta cuando se actualiza un documento de documento_empresa
function actualizarDocumentoBD(){
    var nombre_documento_nuevo = document.getElementById('nombre_documento_act').value;
    var nombre_documento_antiguo = document.getElementById('nombre_documento_antiguo').value;     
    var formato_nombre_nuevo = 'archivo_'+nombre_documento_nuevo.replace(/ /g, '_');
    // console.log(formato_nombre_nuevo);
    // console.log(nombre_documento_antiguo);
     
    $.ajax({
        url: "../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php",
        type: "POST",
        data: {
            "accion": "actualizar_documento_BD",
            "nombre_documento_nuevo": formato_nombre_nuevo,
            "nombre_documento_antiguo": nombre_documento_antiguo
        },
        dataType: "JSON"
    })
        .done(function (response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = "gestionar_documentos_semestre.php";
            })
        })
}

// Método para mostrar una alerta cuando se elimina un documento de documento_empresa
function eliminarDocumentoBD(nombre){
    Swal.fire({
        title: '¿Está seguro que desea borrar este documento?',
        text: "Esta acción es irreversible y conlleva la eliminación de este documento del sistema",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, deseo borrar el documento!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                $.ajax({
                    url: "../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php",
                    type: "POST",
                    data: {
                        "accion": "eliminar_documento_BD",
                        "nombre_documento": nombre
                    },
                    dataType: "JSON"
                })
                    .done(function (response) {
                        swal.fire({
                            icon: response.state,
                            title: response.title
                        }).then(() => {
                            window.location = "gestionar_documentos_semestre.php";
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
        window.location = 'informe_historico.php?fecha_inicio=' + fecha_inicio + '&fecha_fin=' + fecha_fin;
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