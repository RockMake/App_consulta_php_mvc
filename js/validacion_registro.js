function validarRegistro() {
    // Obtiene los valores de los campos
    var tipoIdentificacion = document.getElementById("tipo_identificacion").value;
    var numeroIdentificacion = document.getElementById("numero_identificacion").value;
    // Agrega aquí el resto de los campos del formulario que necesites validar

    // Verifica que todos los campos obligatorios estén completos
    if (tipoIdentificacion === "" || numeroIdentificacion === "") {
        alert("Por favor, complete todos los campos obligatorios.");
        return false;
    }
    // Agrega aquí más validaciones si es necesario

    // Si todo está bien, permite el envío del formulario
    return true;
}

function mostrarTipoDiscapacidad() {
    var seleccion = document.getElementById("discapacidad").value;
    var tipoDiscapacidad = document.getElementById("tipoDiscapacidad");

    if (seleccion === "si") {
        tipoDiscapacidad.style.display = "block";
    } else {
        tipoDiscapacidad.style.display = "none";
    }
}


function mostrarMadreCabezaHogar() {
    var sexoSelect = document.getElementById("sexo");
    var madreCabezaHogarDiv = document.getElementById("madreCabezaHogar");

    if (sexoSelect.value === "femenino") {
        madreCabezaHogarDiv.style.display = "block";
    } else {
        madreCabezaHogarDiv.style.display = "none";
        // Si el sexo no es femenino, también ocultamos el campo de rango de edad
        document.getElementById("edadHijos").style.display = "none";
    }
}

function mostrarEdadHijos() {
    var madreCabezaHogarSelect = document.getElementById("madre_cabeza_hogar");
    var edadHijosDiv = document.getElementById("edadHijos");

    if (madreCabezaHogarSelect.value === "si") {
        edadHijosDiv.style.display = "block";
    } else {
        edadHijosDiv.style.display = "none";
    }
}
