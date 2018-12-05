<!--VALIDACION DE LOS CAMPOS DE INICIO DE SECCION-->

$("#btn-card").click(function () {
    loguear()
});
function mostrarError(componente, error) {

    $("#modal_login").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al Acceder ala Cuenta.</h5>' +
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
function loguear() {

    var error_nomUsuario = false;
    var error_contrasena = false;


    if (document.log.usern.value === "") {
        error_nomUsuario = true;
        $("#Modal3").modal("show");
        mostrarError(document.log.usern,ERROR10);
        return;
    }

    if (document.log.pass.value === "") {
        error_nomPropio = true;
        $("#Modal3").modal("show");
        mostrarError(document.log.pass,ERROR25);
        return;
    }

    if (error_nomUsuario === false &&
        error_contrasena === false) {

        var usuario = document.log.usern.value;
        var contrasena = document.log.pass.value;
        $.ajax({
            type: "POST",
            url: "loginUsuario",
            data: {'nombre_usuario': usuario, 'contrasena': contrasena},
            statusCode:{
                200: function(data){
                    window.location.href='login';
                },400: function(data){
                    mostrarError(document.log.pass,ERROR14);

                },500: function(){
                  mostrarError(document.log.pass, ERROR40);

                }
            }

        });

    }
}
//FUNCION QUE AVILITA EL ENTER DEL TECLADO
$('#pas').keypress(function(e){
  var keycode=(e.keycode ? e.keycode : e.which);
  if(keycode=='13'){
    loguear();
    e.preventDefault();
    return false;
  }
});
