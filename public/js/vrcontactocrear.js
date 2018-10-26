$(document).on("ready", function () {
    loadData();
});

var loadData = function () {
    $.ajax({
        type: "GET",
        url: "../WebServices/consultarRegiones.php"
    }).done(function (data) {
        var regiones = JSON.parse(data);

        for (var i in regiones) {
            $("#region").append('<option value="' + regiones[i].id_region + '">' + regiones[i].nombre_region + '</option>');
        }
    });

    $.ajax({
        type: "GET",
        url: "../WebServices/consultarCategorias.php"
    }).done(function (data) {
        var categorias = JSON.parse(data);

        for (var i in categorias) {
            $("#categoria").append('<option value="' + categorias[i].id_categoria + ' "> ' + categorias[i].nombre_categoria + '</option>');
        }
    });
    

};

document.getElementById("guardar").onclick = function () {
    validarFormulario();
};

function mostrarError(componente, error) {

    $("#formularioCrear").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
            '<div class="modal-dialog" role="document">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<h5 class="modal-title">Error al crear el perfil</h5>' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>' +
            ' <div class="modal-body">' +
            '<p>' + error + '</p>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    $("#Modal3").modal("show");
    $('#Modal3').on('hidden.bs.modal', function () {
        componente.focus();
        $("#Modal3").detach();
    });

}
function validarFormulario() {
    var error_nomb = false;
    var error_tel = false;
    var error_cel = false;
    var error_mail = false;
    var error_desc = false;
    var error_dir = false;
    var error_reg = false;
    var error_cat = false;


    if (document.formularioCrear.nomborg_rec.value === "") {
        error_nomb = true;
        mostrarError(document.formularioCrear.nomborg_rec, "Debe ingresar un nombre de organización.");
        return;
    }

    if (document.formularioCrear.email_rec.value === "") {

    } else {
        if (!document.formularioCrear.email_rec.value.includes("@") || !document.formularioCrear.email_rec.value.includes(".")) {
            error_mail = true;

            mostrarError(document.formularioCrear.email_rec, "Ingrese un e-mail válido.");
            return;
        }
    }


    if (document.formularioCrear.numtel_rec.value === "") {
        if (document.formularioCrear.numcel_rec.value === "") {
            error_tel = true;

            mostrarError(document.formularioCrear.numtel_rec, "Debe ingresar al menos un número telefónico.");
            return;
        }
    } else {
        if (document.formularioCrear.numtel_rec.value.length < 8 || !document.formularioCrear.numtel_rec.value.startsWith("2") || document.formularioCrear.numtel_rec.value.length > 8) {
            error_tel = true;

            mostrarError(document.formularioCrear.numtel_rec, "El número telefónico ingresado no es válido.");
            return;
        }
    }

    if (document.formularioCrear.numcel_rec.value === "") {
        if (document.formularioCrear.numtel_rec.value === "") {
            error_cel = true;

            mostrarError(document.formularioCrear.numcel_rec, "Debe ingresar al menos un número telefónico.");
            return;
        }
    } else {
        if (document.formularioCrear.numcel_rec.value.length < 8 || document.formularioCrear.numcel_rec.value.length > 8) {
            error_cel = true;
            $("#Modal3").modal("show");
            mostrarError(document.formularioCrear.numcel_rec, "El número telefónico ingresado no es válido.");
            return;
        }
    }

    if (document.formularioCrear.direccion_rec.value === "") {
        error_dir = true;

        mostrarError(document.formularioCrear.direccion_rec, "Debe ingresar la dirección de la organización.");
        return;
    }
    if (document.formularioCrear.desc_rec.value === "") {
        error_desc = true;

        mostrarError(document.formularioCrear.desc_rec, "Debe escribir una descripción de la organización.");
        return;
    }
    if (document.formularioCrear.id_region.value < 3 && document.formularioCrear.id_region.value > 4) {
        error_reg = true;
        alert('La región seleccionada no existe.');
        document.formularioEditar.id_region.focus();
        return;
    }
    if (document.formularioCrear.id_categoria.value < 1 && document.formularioCrear.id_categoria.value > 11) {
        error_cat = true;
        alert('La categoría seleccionada no existe.');
        document.formularioCrear.id_categoria.focus();
        return;
    }

    if (error_nomb === false &&
            error_tel === false &&
            error_cel === false &&
            error_dir === false &&
            error_mail === false &&
            error_desc === false &&
            error_reg === false &&
            error_cat === false) {
        document.formularioCrear.submit();
        $("#Modal1").modal('show');

        return;
    }
}

