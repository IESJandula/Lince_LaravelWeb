//Mostrar mensaje de error o éxito en la generacion del slug

function mostrarMensajeSlug(slug) {
    let infoSlug = document.getElementById('infoSlug');
    if (slug.trim() === '') {
        infoSlug.innerHTML = '<div class="alert alert-danger" role="alert"> <i class="fa-solid fa-triangle-exclamation"></i> Slug no generado </div>';
    } else {
        infoSlug.innerHTML = '<div class="alert alert-success" role="alert"> <i class="fa-solid fa-check"></i> Slug generado </div>';
    }
}

let infoSlug = document.getElementById('infoSlug');
infoSlug.innerHTML = '<div class="alert alert-danger" role="alert"> <i class="fa-solid fa-triangle-exclamation"></i> Slug no generado </div>';


//Generar slug
function quitarTildes(letra) {
    let tildes = {
        'á': 'a', 'é': 'e', 'í': 'i', 'ó': 'o', 'ú': 'u',
        'Á': 'A', 'É': 'E', 'Í': 'I', 'Ó': 'O', 'Ú': 'U'
    };
    return tildes[letra] || letra;
}

function generarSlug() {
    let titulo = document.getElementById('titulo').value;
    let slug = titulo
        .toLowerCase()
        .replace(/[^\w\sáéíóúü]/g, '') // Mantener letras con tilde y caracteres especiales excepto espacios
        .replace(/ñ/g, 'n')            // Reemplazar ñ con n
        .replace(/[áéíóú]/g, quitarTildes) // Reemplazar letras con tilde por sus equivalentes sin tilde
        .replace(/\s+/g, '-')          // Reemplazar espacios con guiones
        .replace(/--+/g, '-')          // Eliminar múltiples guiones seguidos
        .replace(/^-+/, '')            // Eliminar guiones al principio
        .replace(/-+$/, '');           // Eliminar guiones al final
    document.getElementById('slug').value = slug;
    mostrarMensajeSlug(slug);
}

document.getElementById('titulo').addEventListener('keyup', function() {
    generarSlug();
});

document.getElementById('generarSlug').addEventListener('click', function() {
    generarSlug();
});



// Obtener referencia al div donde queremos mostrar el mensaje
let mensajeDiv = document.getElementById("informacion1");
let mensajeDiv2 = document.getElementById("informacion2");
let mensajeDiv3 = document.getElementById("informacion3");


let radioButtons = document.querySelectorAll('.opciones');
let radioButtons2 = document.querySelectorAll('.opciones2');
let radioButtons3 = document.querySelectorAll('.opciones3');



// Verificar si algún radio button está seleccionado
//Comprobar 1
let algunoSeleccionado = Array.from(radioButtons).some(function(radioButton) {
    return radioButton.checked;
});
//Comprobar 2
let algunoSeleccionado2 = Array.from(radioButtons2).some(function(radioButton) {
    return radioButton.checked;
});
//Comprobar 3
let algunoSeleccionado3 = Array.from(radioButtons3).some(function(radioButton) {
    return radioButton.checked;
});

let mensaje = "";
let mensaje2 = "";
let mensaje3 = "";

let mensajeError =
    '<div class="alert alert-danger" role="alert"> <i class="fa-solid fa-triangle-exclamation"></i> No se ha seleccionado ninguna imágen </div>';
let mensajeOk =
    '<div class="alert alert-success" role="alert"> <i class="fa-solid fa-check"></i> Imágen Seleccionada </div>';
// Mensaje a mostrar

//Comprobar 1
if (algunoSeleccionado) {
    mensaje = mensajeOk;
} else {
    mensaje = mensajeError;
}

//Comprobar 2
if (algunoSeleccionado2) {
    mensaje2 = mensajeOk;
} else {
    mensaje2 = mensajeError;
}

//Comprobar 3
if (algunoSeleccionado3) {
    mensaje3 = mensajeOk;
} else {
    mensaje3 = mensajeError;
}

// Mostrar el mensaje en el div
mensajeDiv.innerHTML = mensaje;
mensajeDiv2.innerHTML = mensaje2;
mensajeDiv3.innerHTML = mensaje3;

function mostrarOcultarMenu(menuId) {
    let menu = document.getElementById(menuId);
    if (menu.style.display === "none") {
        menu.style.display = "block";
    } else {
        menu.style.display = "none";
        mensajeDiv.innerHTML =
        mensaje; // Asegúrate de que mensajeDiv y mensaje estén definidos fuera de esta función
    }
}

function mostrarOcultarUbicacionesCheck(menuId) {
    let menuUbicaciones = document.getElementById("menuUbicaciones" + menuId);

    if (menuUbicaciones.style.display === "none") {
        menuUbicaciones.style.display = "block";
    } else {
        menuUbicaciones.style.display = "none";
        if (menuId == 1) {
            mensajeDiv.innerHTML = mensajeOk;
        } else if (menuId == 2) {
            mensajeDiv2.innerHTML = mensajeOk;
        } else {
            mensajeDiv3.innerHTML = mensajeOk;
        }
    }
}

