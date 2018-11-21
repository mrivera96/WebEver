

$(document).on("ready", function () { loadData(); });
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


/**********************************************************************************************
*            FUNCIÓN AJAX PARA MOSTRAR LAS SOLICITUDES
**********************************************************************************************/
var aceptarSolicitud = function(id_contacto) {


  $.ajax({
    type:'POST',
    url: 'gestionarSolicitud',
    data: {'cto':id_contacto,'opr':"aceptar"},
    statusCode:{
      200:function (data) {
      },
      500: function(){
        mostrarError(document.formulario, ERROR40);

      },
      401:function () {
        mostrarError(document.formulario, ERROR39);
          //document.getElementById("colorIniciosecion").click();


      }
        }
  });
};


var rechazarSolicitud = function(id_contacto) {
  $.ajax({
    type:'POST',
    url: 'gestionarSolicitud',
      data: {'cto':id_contacto,'opr':"rechazar"},
    statusCode:{
      200:function (data) {
      },
      500: function(){
        mostrarError(document.formulario, ERROR40);

      },
      401:function () {
        mostrarError(document.formulario, ERROR39);
        //  document.getElementById("colorIniciosecion").click();

        }
          }
      });
      };

var loadData = function () {
  $.ajax({
    type: "GET",
    url: "listarPerfiles",
    data:{'ste':'1'},
    statusCode:{
        200: function(data){
        var perfiles = data.content;
      if (perfiles!== "No hay resultados.") {

        var imagen;


        for (var i in perfiles) {
          if (perfiles[i].imagen !== "") {
            imagen = perfiles[i].imagen;
          } else {
            imagen = "imagenes/iconocontactowhite.png";
          }
          ;

          $("#fila").append(
            '<a   id="solicitud" class="enlaces_de_listas_contactos" ><div class = "col-md-4 col-sm-6">' +
            '<div class="media">' +
            '<div class="media-left">' +
            '<img  style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
            '</div>' +
            '<div class="media-body">' +
            '<h4 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h4>' +
            '<p>Usuario Propietario:</p>' +
            '<p>' + perfiles[i].nombre_usuario + '</p>' +
            '<input type="hidden" id="id" name="id" value=' + perfiles[i].id_contacto + '/>' +
            '<button type="button" id="ok" onclick="aceptarSolicitud('+ perfiles[i].id_contacto+')" data-toggle="modal" data-target="#Modal" class="btn btn-primary">Aceptar</button>'+
            '<button type="button" id="cancel" onclick="rechazarSolicitud('+perfiles[i].id_contacto+')" data-toggle="modal" data-target="#Modal1" class="btn btn-secondary">Rechazar</button>' +
            '</div>' +
            '</div>' +
            '<hr style="margin-left:140px"/>' +
            '</div>' +
            '</a>' );

          }
        } else {
          $("#fila").append(
            '<div class="col-md-12 text-center">' +
            '<img  style="width:130px ; heigh:130px ;"  class="img-circle circle-img" src="imagenes/warning.png"> ' +
            '</div>' +
            '<div class="col-md-12 text-center">' +
            '<h1>No hay nuevas solicitudes</h1> ' +
            '</div>'
          );
          }
          },
          500: function(){
          mostrarError(document.formulario, ERROR40);
          },
          401:function () {
          mostrarError(document.formulario, ERROR39);

          //  document.getElementById("colorIniciosecion").click();

          }

          }

          });

          };
