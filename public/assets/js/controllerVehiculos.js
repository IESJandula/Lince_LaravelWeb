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
