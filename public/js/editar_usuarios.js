function mostrarError(componente, error) {

    $("#formulario_editar").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al actualizar el usuario</h5>' +
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

function escribiendoUsuario() {
    $.ajax({
        type: "POST",
        url: "existeUsuario"  ,
        data:{'usuario':$('#nombre_usuario').val()}
    }).done(function (data) {

        if (data.content === true) {
            $('#nombre_usuario').css("color", "red");
            mostrarError(document.formulario_editar.usuarionombre, ERROR30);



        } else
            $('#nombre_usuario').css("color", "black");
    });
}

function escribiendoEmail() {
    $.ajax({
        type: "POST",

        url: "existeEmail"  ,
        data:{'usuarioemail':$('#correo').val()}
    }).done(function (data) {

        if (data.content === true) {
            $('#correo').css("color", "red");
            mostrarError(document.formulario_editar.usuarioemail,ERROR31);

        } else
            $('#correo').css("color", "black");
    });
}

function validarFormulario() {

    var error_nomUsuario = false;
    var error_nomPropio = false;
    var error_correo = false;
    var error_contrasena = false;
    if (document.formulario_editar.usuarionombre.value === "") {
        error_nomUsuario = true;
        mostrarError(document.formulario_editar.usuarionombre, ERROR10);
        return;

    }


    if (document.formulario_editar.usuariopropio.value === "") {
        error_nomPropio = true;
        $("#Modal3").modal("show");
        mostrarError(document.formulario_editar.usuariopropio, ERROR11);
        return;
    }
    if (document.formulario_editar.usuarioemail.value === "") {
        error_correo = true;
        $("#Modal3").modal("show");
        mostrarError(document.formulario_editar.usuarioemail,ERROR32);
        return;
    } else {
        if (!document.formulario_editar.usuarioemail.value.includes("@") || !document.formulario_editar.usuarioemail.value.includes(".")) {
            error_correo = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario_editar.usuarioemail, ERROR4);
            return;
        }
    }


    if (error_nomUsuario === false &&
        error_nomPropio === false &&
        error_correo === false)
    //error_contrasena === false

    {
        var iUsuario = document.formulario_editar.usuario.value;
        var nombre = document.formulario_editar.usuarionombre.value;
        var nombrepropio = document.formulario_editar.usuariopropio.value;
        var email = document.formulario_editar.usuarioemail.value;



        $.ajax({
            type:"POST",
            url:"actualizarUsuario",
            data:{'usuario':iUsuario,'usuarionombre':nombre,'usuariopropio':nombrepropio,'usuarioemail':email},
            statusCode:{
                200:function (data) {
                    $("#Modal1").modal('show');
                }
            }});
        return;

    }

};



$(document).on("ready", function () {
    loadData();
});
var loadData = function () {

    $.ajax({
        type: "POST",
        url: "obtenerUsuario",
        data: {'usuario':usuario}
}).done(function (data)
{

    var editar = data.content;
    for (var i in editar) {


        $("#nombre_usuario").attr('value', editar[i].nombre_usuario);
        $("#nombre_propio").attr('value', editar[i].nombre_propio);
        $("#correo").attr('value', editar[i].correo);
        //  $("#contrasena").attr('value', editar[i].contrasena);
        $("#id_usuario").attr('value', editar[i].id_usuario);
    }
});
    $("#editar_usuarios").submit(function () {

    });
}

document.getElementById("id_eliminar").onclick = function () {
    if (document.formulario_editar.id_usuario.value == 1) {
        mostrarError(document.formulario_editar.id_eliminar, ERROR33);


    } else {
        myFunction();
    }
};

function myFunction() {
    $.ajax({
        type: "POST",
        url: "eliminarUsuario",
        data: {'usuario':usuario}

});
    if(id_logueado === usuario) {
        $.ajax({
            type:"GET",
            url:"cerrarSession"
        })
    } else {
        window.location.href = 'usuarios';
    }


}