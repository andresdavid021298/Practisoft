function validarClaves() {
    var pas1 = document.getElementById("inputClave1").value;
    var pas2 = document.getElementById("inputClave2").value;
    console.log("Clave 1: " + pas1);
    console.log("Clave 2: " + pas2);
    if (pas1 != pas2) {
        console.log("No son iguales");
        if (document.getElementById("newID")) {
            console.log("Existe un newID");
        } else {
            console.log("No existe newID");
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
    } else {
        if (document.getElementById("newID")) {
            $('#newID').remove();
        }
    }
}