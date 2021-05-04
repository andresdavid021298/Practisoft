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

function agregarActividadesDinamicamente() {

    // Crear el nuevo div con clase row
    var newDivRow = document.createElement("div");
    newDivRow.className = "row";
    newDivRow.id = "newRow";

    // Crear un nuevo div de descripcion
    var newDiv_descripcion = document.createElement("div");
    newDiv_descripcion.className = "form-group col-md-8";
    newDiv_descripcion.id = "newID_descripcion";

    // Crear un nuevo div del numero de horas
    var newDiv_horas = document.createElement("div");
    newDiv_horas.className = "form-group col-md-4";
    newDiv_horas.id = "newID_horas";

    // Crear nuevo Label de descripcion y añadirle un texto
    var newLabel = document.createElement("label");
    var textLabel = document.createTextNode("Nueva Actividad");
    newLabel.appendChild(textLabel);

    // Crear nuevo Input de descripcion
    var newInput = document.createElement("textarea");
    newInput.className = "form-control form-control-lg";
    newInput.id = "actividad_nueva";
    newInput.rows = 1

    // Crear nuevo Label de numero de horas y añadirle un texto
    var newLabel_horas = document.createElement("label");
    var textLabel_horas = document.createTextNode("Numero de Horas");
    newLabel_horas.appendChild(textLabel_horas);

    // Crear nuevo Input de numero de horas
    var newInput_horas = document.createElement("input");
    newInput_horas.className = "form-control form-control-lg";
    newInput_horas.id = "numero_horas_nueva";

    // Añadir a la vista el div row
    const app = document.querySelector("#primer_row");
    app.insertAdjacentElement("afterend", newDivRow);

    // Añadir a la vista el div de descripcion
    const app1 = document.querySelector("#newRow");
    app1.insertAdjacentElement("afterbegin", newDiv_descripcion);

    const app3 = document.querySelector("#newRow");
    app3.insertAdjacentElement("beforeend", newDiv_horas);

    // Añadirle al nuevo div de descripcion el label y el input
    const app2 = document.querySelector("#newID_descripcion");
    app2.insertAdjacentElement("beforeend", newLabel);
    app2.insertAdjacentElement("beforeend", newInput);

    // Añadirle al nuevo div de horas el label y el input
    const app5 = document.querySelector("#newID_horas");
    app5.insertAdjacentElement("beforeend", newLabel_horas);
    app5.insertAdjacentElement("beforeend", newInput_horas);


}

function eliminarActividadesDinamicamente() {
    $('#newRow').remove();
}