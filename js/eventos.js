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