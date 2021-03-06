$.ajax({
  type: "POST",
  url: "roles",
  statusCode:{
    200:function (data) {
      var roles = data.content;

      for (var i in roles) {
        $("#id_rol_usuario").append('<option value="' + roles[i].id_rol + '"> ' + roles[i].descripcion_rol + '</option >');
      }
    },
    500: function(){
      mostrarError(document.formulario, ERROR40);

    },
    401:function (data) {
      mostrarErrorToken();
    }
  }
});

function mostrarError(componente, error) {

  $("#formulario").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
  '<div class="modal-dialog" role="document">' +
  '<div class="modal-content">' +
  '<div class="modal-header">' +
  '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
  '<span aria-hidden="true">&times;</span>' +
  '</button>' +
  '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al ingresar un usuario.</h5>' +
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

$("#nombre_usuario").keyup(function escribiendoUsuario() {
  $.ajax({
    type: "POST",
    url: "existeUsuario",
    data:{'usuario': $('#nombre_usuario').val()},
    statusCode:{
      200: function(data){
        if (data.content === true) {
          $('#nombre_usuario').css("color", "red");
          mostrarError(document.formulario.usuarionombre, ERROR30);
        } else{
          $('#nombre_usuario').css("color", "black");
        }


      },
      500: function(data){
        mostrarError(document.formulario, ERROR40);
      }


    }
  });
});
function escribiendoEmail() {
  $.ajax({
    type: "POST",
    url: "existeEmail"  ,
    data:{'usuarioemail':$('#correo').val()},
    statusCode:{
      200: function(data){
        if (data.content === true) {
          $('#correo').css("color", "red");
          mostrarError(document.formulario.usuarioemail,ERROR31);
        } else{
          $('#correo').css("color", "black");
        }

      },
      500: function(data){
        mostrarError(document.formulario, ERROR40);
      }


    }
  });
}
document.getElementById("guardar").onclick = function () {
  validarFormulario();
};
function validarFormulario() {

  var error_nomUsuario = false;
  var error_nomPropio = false;
  var error_correo = false;
  var error_contrasena = false;
  var error_contrasena1 = false;

  if (document.formulario.usuarionombre.value === ""|| document.formulario.usuarionombre.value.trim()=="") {
    error_nomUsuario = true;
    mostrarError(document.formulario.usuarionombre,ERROR10);
    return;
  }

  if (document.formulario.usuariopropio.value === ""|| document.formulario.usuariopropio.value.trim()=="") {
    error_nomPropio = true;
    $("#Modal3").modal("show");
    mostrarError(document.formulario.usuariopropio,ERROR11);
    return;
  }
  if (document.formulario.usuarioemail.value === "") {
    error_correo = true;
    $("#Modal3").modal("show");
    mostrarError(document.formulario.usuarioemail,ERROR32);
    return;
  } else {
    if (!document.formulario.usuarioemail.value.includes("@") || !document.formulario.usuarioemail.value.includes(".")) {
      error_correo = true;
      $("#Modal3").modal("show");
      mostrarError(document.formulario.usuarioemail, ERROR4);
      return;
    }
  }

  if (document.formulario.usariopassword.value === "") {
    error_contrasena = true;
    $("#Modal3").modal("show");
    mostrarError(document.formulario.usariopassword, ERROR25);
    return;
  }

  if (document.formulario.usariopassword1.value === "") {
    error_contrasena = true;
    $("#Modal3").modal("show");
    mostrarError(document.formulario.usariopassword1, ERROR27);
    return;
  } else {
    if (document.formulario.usariopassword.value !== document.formulario.usariopassword1.value) {
      error_contrasena1 = true;
      $("#Modal3").modal("show");
      mostrarError(document.formulario.usariopassword1, ERROR28);

    }
  }

  if (error_nomUsuario === false &&
    error_nomPropio === false &&
    error_correo === false &&
    error_contrasena === false &&
    error_contrasena1 === false) {
      var nombre = document.formulario.usuarionombre.value;
      var nombrepropio = document.formulario.usuariopropio.value;
      var email = document.formulario.usuarioemail.value;
      var pass = document.formulario.usariopassword.value;
      var roles = document.formulario.usuariosroles.value;
      var data = new FormData();

      data.append('usuarionombre',nombre);
      data.append('usuariopropio',nombrepropio);
      data.append('usuarioemail',email);
      data.append('usuariopassword',pass);
      data.append('usuariosroles',roles);
      $.ajax({
        type:"POST",
        contentType:false,
        url:"crearUsuario",
        data:data,
        processData:false,
        statusCode:{
          200:function (data) {
            $("#Modal1").modal('show');
            $("#formulario")[0].reset();
          },
          500: function(data){
            mostrarError(document.formulario, ERROR40);
          },
          403: function(data){
            mostrarError(document.formulario.usuarionombre, ERROR30);
          },
          400: function(data){
            mostrarError(document.formulario, ERROR42);
          },
          400: function(data){
            mostrarError(document.formulario.usuarioemail, ERROR31);
          },
          401:function (data) {
            mostrarErrorToken();
          }

          
        }});

      }



    }
