function validarClaves() {
    // Tomar los valores de los campos de las claves
    var pas1 = document.getElementById("inputClave1").value;
    var pas2 = document.getElementById("inputClave2").value;
    //Preguntar si son iguales
    if (pas1 != pas2) {
        // Deshabilitar el boton de registrar
        document.getElementById("btn_registrar_empresa").disabled = true;
        // Pregunta si ya hay una alerta mostrandose
        if (document.getElementById("newID")) {
            // Si no hay alerta, se crea una nueva
        } else {
            //crea un nuevo div
            // y añade contenido
            var newDiv = document.createElement("div");
            newDiv.className = "alert alert-danger";
            newDiv.id = "newID";
            var newContent = document.createTextNode("Las contraseñas no coinciden");
            newDiv.appendChild(newContent); //añade texto al div creado.

            // añade el elemento creado y su contenido al DOM
            const app = document.querySelector("#inputClave2"); // <div id="app">App</div>

            app.insertAdjacentElement("afterend", newDiv);
        }
        //Si son iguales borro la alerta
    } else {
        // Activar el boton nuevamente de registrar
        document.getElementById("btn_registrar_empresa").disabled = false;
        if (document.getElementById("newID")) {
            $('#newID').remove();
        }
    }
}

function validarInputOtra() {
    var isCheckedOtra = document.getElementById('checkOtra').checked;

    if (isCheckedOtra == false) {
        document.getElementById("input_otra").disabled = true;
    } else {
        document.getElementById("input_otra").disabled = false;
    }

}

function validarClavesEnPerfil() {
    // Tomar los valores de los campos de las claves
    var pas1 = document.getElementById("inputClave1").value;
    var pas2 = document.getElementById("inputClave2").value;
    //Preguntar si son iguales
    if (pas1 != pas2) {
        // Deshabilitar el boton de registrar
        document.getElementById("btn_cambiar_clave").disabled = true;
        // Pregunta si ya hay una alerta mostrandose
        if (document.getElementById("newID")) {
            // Si no hay alerta, se crea una nueva
        } else {
            //crea un nuevo div
            // y añade contenido
            var newDiv = document.createElement("div");
            newDiv.className = "alert alert-danger";
            newDiv.id = "newID";
            var newContent = document.createTextNode("Las contraseñas no coinciden");
            newDiv.appendChild(newContent); //añade texto al div creado.

            // añade el elemento creado y su contenido al DOM
            const app = document.querySelector("#inputClave2"); // <div id="app">App</div>

            app.insertAdjacentElement("afterend", newDiv);
        }
        //Si son iguales borro la alerta
    } else {
        // Activar el boton nuevamente de registrar
        document.getElementById("btn_cambiar_clave").disabled = false;
        if (document.getElementById("newID")) {
            $('#newID').remove();
        }
    }
}

function seleccionarOtrosCheckDesarrollo() {
    var isCheckedDesarrollo = document.getElementById("check3").checked;
    if (isCheckedDesarrollo) {
        document.getElementById('checkWeb').checked = true;
        document.getElementById('checkMovil').checked = true;
        document.getElementById('checkEscritorio').checked = true;
    } else {
        document.getElementById('checkWeb').checked = false;
        document.getElementById('checkMovil').checked = false;
        document.getElementById('checkEscritorio').checked = false;
    }
}

function SeleccionarcheckboxDesarrolloSoftware() {
    var isCheckedWeb = document.getElementById('checkWeb').checked;
    var isCheckedMovil = document.getElementById('checkMovil').checked;
    var isCheckedEscritorio = document.getElementById('checkEscritorio').checked;
    if (isCheckedWeb && isCheckedMovil && isCheckedEscritorio) {
        document.getElementById('check3').checked = true;
    } else {
        document.getElementById('check3').checked = false;

    }
}

function seleccionarCheckRedes() {
    var isCheckedRedes = document.getElementById("check5").checked;
    if (isCheckedRedes) {
        document.getElementById('checkMantenimiento').checked = true;
        document.getElementById('checkSeguridad').checked = true;
        document.getElementById('checkDiseño').checked = true;
    } else {
        document.getElementById('checkMantenimiento').checked = false;
        document.getElementById('checkSeguridad').checked = false;
        document.getElementById('checkDiseño').checked = false;
    }
}

function SeleccionarcheckboxRedes() {
    var isCheckedMantenimiento = document.getElementById('checkMantenimiento').checked;
    var isCheckedSeguridad = document.getElementById('checkSeguridad').checked;
    var isCheckedDiseño = document.getElementById('checkDiseño').checked;
    if (isCheckedSeguridad && isCheckedMantenimiento && isCheckedDiseño) {
        document.getElementById('check5').checked = true;
    } else {
        document.getElementById('check5').checked = false;

    }
}
// Funcion que permite agregar campos dinamicamente en el plan de trabajo
function AgregarMas() {
    $("<div>").load("InputDinamico.php", function() {
        $("#productos").append($(this).html());
    });
}

// Funcion que permite borrar campos dinamicamente en el plan de trabajo
function BorrarRegistro() {
    $('div.lista-producto').each(function(index, item) {
        jQuery(':checkbox', this).each(function() {
            if ($(this).is(':checked')) {
                $(item).remove();
            }
        });
    });
    sumatoriaNumeroHorasActividadesPlanTrabajo();
}

//Función que realiza la suma de las actividades del plan de trabajo
function sumatoriaNumeroHorasActividadesPlanTrabajo() {
    var inputs_actividades = document.getElementsByClassName("numero_horas");
    var p_sumatoria_horas = document.getElementById('sumatoria');
    var longitud = inputs_actividades.length;
    var cantidad_horas = 0;
    for (let index = 0; index < longitud; index++) {
        if (inputs_actividades[index].value != "") {
            cantidad_horas = cantidad_horas + parseInt(inputs_actividades[index].value);
        }
    }
    p_sumatoria_horas.textContent = "Sumatoria de horas = " + cantidad_horas + " / 320";
}

// Funcion que permite escoger el rol 
function escogerRol() {
    var info_user = document.getElementById("select_rol").value
    rol = info_user.split(" - ")[0];
    id = info_user.split(" - ")[1];
    nombre = info_user.split(" - ")[2];
    imagen = info_user.split(" - ")[3];
    $.ajax({
            url: "../Controller/Login/Login_Controller.php",
            type: "POST",
            data: {
                "accion": "escoger_rol",
                "rol": rol,
                "nombre": nombre,
                "id": id,
                "imagen": imagen
            },
            dataType: "JSON"
        })
        .done(function(response) {
            swal.fire({
                icon: response.state,
                title: response.title
            }).then(() => {
                window.location = response.view
            })
        })
}