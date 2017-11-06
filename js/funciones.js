// ***** ----- Funciones para administrador ----- ***** //
function borrarAdministrador(idRegistro, nombre) {
    $("#mensajeB").html("Registro: <b>" + nombre + "</b>");
    $("#id_admi").val(idRegistro);
    $("#nombre_admi").val(nombre);
    $("#borrar").modal("show");
}

function modificarAdministrador(idRegistro, nombre, correo, contrasena, telefono, direccion) {
    $("#id_admiM").val(idRegistro);
    $("#nombre_admiM").val(nombre);
    $("#correo_admiM").val(correo);
    $("#contrasena_adminM").val(contrasena);
    $("#telefono_admiM").val(telefono);
    $("#direccion_admiM").val(direccion);
    $("#modificarAdministrador").modal("show");
}

function detallesAdministrador(nombre, correo, contrasena, telefono, direccion) {
    // Asigna con ID en la vista
    $("#dNombre").html("Nombre: <b>" +nombre + "<b><br><br>");
    $("#dCorreo").html("Correo: <b>" +correo + "<b><br><br>");
    $("#dContrasena").html("Contraseña: <b>" +contrasena + "<b><br><br>");
    $("#dTelefono").html("Teléfono: <b>" +telefono + "<b><br><br>");
    $("#dDireccion").html("Dirección: <b>" +direccion + "<b><br><br>");
    // Recupera datos
    $("#nombre_admi").val(nombre);
    $("#correo_admi").val(correo);
    $("#contrasena_admin").val(contrasena);
    $("#telefono_admi").val(telefono);
    $("#direccion_admi").val(direccion);
    $("#detallesAdministrador").modal("show");
}


// ***** ----- Funciones para museo ----- ***** //
function borrarMuseo(idRegistro, nombre) {
    $("#mensaje").html("Registro: <b>" + nombre + "</b>");
    $("#id_museo").val(idRegistro);
    $("#nombre_museo").val(nombre);
    $("#borrar").modal("show");
}

function modificarMuseo(id, nombre, descripcion, colonia, calle, numero, telefono, servicio, costo){
    $("#id_museoM").val(id);
    $("#nombre_museoM").val(nombre);
    $("#descripcion_museoM").val(descripcion);
    $("#colonia_museoM").val(colonia);
    $("#calle_museoM").val(calle);
    $("#numero_museoM").val(numero);
    $("#telefono_museoM").val(telefono);
    $("#nombre_servicioM").val(servicio);
    $("#costoM").val(costo);
    $("#modificar").modal("show");
}

function detallesMuseo(nombre, descripcion, colonia, calle, numero, telefono, servicio, costo, imagen){
    // Vista
    $("#dNombre").html("Nombre: <b>" + nombre + "</b><br><br>");
    $("#dDescripcion").html("Descripcion: <br><br><b>" + descripcion + "</b>");
    $("#dColonia").html("Colonia: <b>" + colonia + "</b><br><br>");
    $("#dCalle").html("Calle: <b>" + calle + "</b><br><br>");
    $("#dNumero").html("Número: <b>#" + numero + "</b><br><br>");
    $("#dTelefono").html("Teléfono: <b>" + telefono + "</b><br><br>");
    $("#dServicio").html("Servicio: <b>" + servicio + "</b><br><br>");
    $("#dCosto").html("Costo: <b>$" + costo + "</b><br><br>");
    $("#dImagen").html("Imagen: <br><br> <img class='img-responsive' src='../images/" + imagen +  "' alt=''/>");
    // Datos
    $("#nombre_museo").val(nombre);
    $("#descripcion_museo").val(descripcion);
    $("#colonia_museo").val(colonia);
    $("#calle_museo").val(calle);
    $("#numero_museo").val(numero);
    $("#telefono_museo").val(telefono);
    $("#nombre_servicio").val(servicio);
    $("#costo").val(costo);
    $("#imagen").val(imagen);

    $("#detallesMuseo").modal("show");
}

// ***** ----- Funciones para piezas ----- ***** //
function borrarPieza(idRegistro, nombre) {
    $("#mensaje").html("Registro: <b>" + nombre + "</b>");
    $("#id_pieza").val(idRegistro);
    $("#nombre_pieza").val(nombre);
    $("#borrar").modal("show");
}

function modificarPieza(idRegistro, nombre, tipo, descripcion, sala){
    $("#id_piezaM").val(idRegistro);
    $("#nombre_piezaM").val(nombre);
    $("#tipo_piezaM").val(tipo);
    $("#descripcion_piezaM").val(descripcion);
    $("#id_salaM").val(sala)
    $("#modificar").modal("show");
}


// ***** ----- Funciones para sala ----- ***** //
function borrarSala(id, nombre) {
    $("#mensaje").html("Registro: <b>" + nombre + "</b>");
    $("#id_sala").val(id);
    $("#nombre_sala").val(nombre);
    $("#borrar").modal("show");
}

function modificarSala(id, nombre, descripcion, museo) {
    $("#id_salaM").val(id);
    $("#nombre_salaM").val(nombre);
    $("#descripcion_salaM").val(descripcion);
    $("#id_museoM").val(museo);
    $("#modificar").modal("show");
}


// ***** ----- Funciones para servicio ----- ****** //
function borrarServicio(idRegistro, nombre) {
    $("#mensajeB").html("Registro: <b>" + nombre + "</b>");
    $("#id_servicio").val(idRegistro);
    $("#nombre_serviciom").val(nombre);
    $("#borrar").modal("show");
}

function modificarServicio(idRegistro, nombre, descripcion, costo) {
    $("#id_serviciom").val(idRegistro);
    $("#nombre_serviciom").val(nombre);
    $("#descripcion_serviciom").val(descripcion);
    $("#costom").val(costo);
    $("#modificarServicio").modal("show");
}
