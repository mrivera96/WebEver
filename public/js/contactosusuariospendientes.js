$(document).on("ready", function () {
    loadData();
});
/**********************************************************************************************
*            FUNCIÓN PARA BUSCAR ENTRE LOS PERFILES
**********************************************************************************************/
var search = document.getElementById("search"),
food = document.getElementsByClassName("enlaces_de_listas_contactos"),
forEach = Array.prototype.forEach;

search.addEventListener("keyup", function(e){
  var choice = this.value;

  forEach.call(food, function(f){
    if (f.innerHTML.toLowerCase().search(choice.toLowerCase()) === -1)
    f.style.display = "none";
    else
    f.style.display = "block";
  });
}, false);




var loadData = function () {
  $.ajax({
    type: "post",
    url: "obtenerPerfilesCliente",
    data: {'id':id_logueado,'ste':'1'},
    statusCode:{
      200:function (data) {
        var contacto = data.content;

        if (contacto.length>0) {
          var imagen;

          var estado;
          var id;


          for (var i in contacto) {
            if (contacto[i].imagen !== null) {
              imagen = contacto[i].imagen;
            } else {
              imagen = "imagenes/iconocontactowhite.png";
            };


            $("#contenedorContacto").append(
              '<a class="enlaces_de_listas_contactos" href="editarPerfilCliente?cto=' + contacto[i].id_contacto + '"><div class = "col-md-4 col-sm-6">' +
              '<div class="media">' +
              '<div class="media-left">' +
              '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
              '</div>' +
              '<div class="media-body">' +
              '<h4 class = "media-heading">' + contacto[i].nombre_organizacion + '</h4>' + '<br>' +
              '<p>Estado del Contacto:</p>' +
              '<p style="color:#388e3c">' + "Pendiente" + '</p>' +
              '</div>' +
              '</div>' +
              '<hr style="margin-left:140px"/>' +
              '</div>' +
              '</a>'
            );


          }
        } else {
          $("#contenedorContacto").append(
            '<div class="col-md-12 text-center">' +
            '<img  style="width:130px ; heigh:130px ;"  class="img-circle circle-img" src="imagenes/warning.png"> ' +
            '</div>' +
            '<div class="col-md-12 text-center">' +
            '<h3>No tiene contactos pendientes. </h3> ' +
            '</div>'

          );
        }
      },
      500: function(data){
        mostrarError(document.formulario, ERROR40);
      },
      400:function () {
        mostrarError(document.formulario, ERROR35);
      },
      404:function(){
        mostrarError(document.formulario,ERROR43);
      }
    }});
};
