$(document).on("ready", function () {
    loadData();
});


//Carga los perfiles de cierta categoria
var loadData = function () {
  $.ajax({
    type: "GET",
    url: "regiones",
    statusCode:{
      200:function (data) {
        var regiones = data.content;
        for (var i in regiones) {
          $("#region").append('<option value="' + regiones[i].id_region + '">' + regiones[i].nombre_region + '</option>');
        }
        $.ajax({
          type: "GET",
          url: "categorias",
          statusCode:{
            200:function (data) {
              var categorias = data.content;
              for (var i in categorias) {
                $("#categoria").append('<option value="' + categorias[i].id_categoria + ' "> ' + categorias[i].nombre_categoria + '</option>');
              }
            },
            500: function(){
              mostrarError(document.formulario, ERROR40);
            }
          }
        });
      },
      500: function(){
        mostrarError(document.formulario, ERROR40);

      },

    }
  });
    $.ajax({
        type: "get",
        url: "listarPerfiles",
        data: {'ctg': cty},

        statusCode:{
          200: function(data){
            var array = data.content;


        var perfiles = data.content;
        var imagen;
        var telefono;

        for (var i in perfiles) {
            if (perfiles[i].imagen !==null) {
                imagen = perfiles[i].imagen;
            } else {
                imagen = "imagenes/iconocontactowhite.png";
            }
            ;
            if (perfiles[i].numero_fijo != "") {
                telefono = perfiles[i].numero_fijo;
            } else {
                telefono = perfiles[i].numero_movil;
            }
            ;
            $("#fila").append('<a class="enlaces_de_listas_contactos" href="perfil?cto=' + perfiles[i].id_contacto + '"><div class = "col-md-4 col-sm-6">' +
                    '<div class="media-list">' +
                    '<div class="media-left">' +
                    '<img  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<h4 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h4>' +
                    '<p>' + telefono + '</p>' +
                    '<p>' + perfiles[i].nombre_region + '</p>' +
                    '</div>' +
                    '</div>' +
                    '<hr/>' +
                    '</div></a>'
                    );
        }
      },
      500: function(data){
        mostrarError(document.formulario, ERROR40);
    }


    }

    });
};
