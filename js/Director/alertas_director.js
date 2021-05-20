// Funcion que permite mostrar una alerta al momento de insertar un usuario
function agregarCoordinador() {
    nombre_coordinador = document.getElementById("nombre_coordinador").value
    correo_coordinador = document.getElementById("correo_coordinador").value

}

// Funcion que permite mostrar la alerta al momento de eliminar un coordinador
function eliminarCoordinador(id_coordinador) {

}

// Funcion que permite mostrar una alerta al momento de editar el director
function editarDirector() {

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
    .done(function(response) {
        swal.fire({
            icon: response.state,
            title: response.title
        }).then(() => {
            window.location = response.location;
        })
    })
}

// Funcion que permite mostrar una alerta al momento de eliminar un grupo
function eliminarGrupo(id_grupo){
    $.ajax({
        url: "../../Controller/Grupo/Grupo_Controller.php",
        type: "POST",
        data: {
            "accion": "eliminar_grupo",
            "id_grupo": id_grupo
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

// Funcion que muestra una alerta cuando se actualiza el director
function editarDirector(){
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
    .done(function(response) {
        swal.fire({
            icon: response.state,
            title: response.title
        }).then(() => {
            window.location = response.location;
        })
    })

}