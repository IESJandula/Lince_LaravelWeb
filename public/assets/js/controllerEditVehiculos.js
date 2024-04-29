// Obtener referencia al div donde queremos mostrar el mensaje
let mensajeDiv = document.getElementById("informacion");

let radioButtons = document.querySelectorAll('input[name="opciones"]');
// Verificar si algún radio button está seleccionado
let algunoSeleccionado = Array.from(radioButtons).some(function(radioButton) {
    return radioButton.checked;
});

let mensaje = "";

// Mensaje a mostrar
if (algunoSeleccionado) {
    mensaje =
        '<div class="alert alert-success" role="alert"> <i class="fa-solid fa-check"></i> Imágen Seleccionada </div>';
} else {
    mensaje =
        '<div class="alert alert-danger" role="alert"> <i class="fa-solid fa-triangle-exclamation"></i> No se ha seleccionado ninguna imágen </div>';
}

//cuando la pagina haya cargado que muestre una funcion
function imprimeMensaje() {
    mensaje = "";

    mensaje =
        '<div class="alert alert-success" role="alert"> <i class="fa-solid fa-check"></i> Imágen Seleccionada </div>';;
}


// Mostrar el mensaje en el div
mensajeDiv.innerHTML = mensaje;

function mostrarOcultarUbicaciones() {
    let menuUbicaciones = document.getElementById("menuUbicaciones");

    if (menuUbicaciones.style.display === "none") {
        menuUbicaciones.style.display = "block";
    } else {
        menuUbicaciones.style.display = "none";
        mensajeDiv.innerHTML = mensaje;
    }

}

function mostrarOcultarUbicacionesCheck() {
    let menuUbicaciones = document.getElementById("menuUbicaciones");

    if (menuUbicaciones.style.display === "none") {
        menuUbicaciones.style.display = "block";
    } else {
        menuUbicaciones.style.display = "none";
        imprimeMensaje();
        mensajeDiv.innerHTML = mensaje;
    }

}

