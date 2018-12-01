$(document).on("ready", function () {
    loadData();
});



var loadData = function () {
    $.ajax({
        type: "GET",
        url: "categorias",
        statusCode:{
            200: function(data){
                var array = data.content;
                for (var i in array) {
                    $("#fila").append('<div class = "col-sm-6 col-md-4">' +
                        '<a href="perfiles?cty=' + array[i].id_categoria + '&&name_cty=' + array[i].nombre_categoria + '"><div id="panel_default" class="panel panel-default">' +
                        '<div  class="panel-heading" >' +
                        '<span aria-hidden="true"></span> <strong>' + array[i].nombre_categoria + '</strong>' +
                        '<h6>' + array[i].coun + ' Contactos</h6>' +
                        '</div> ' +
                        '<img class="img-responsive" alt="Responsive image" style="width:100%"  id="tamaño" src=' + array[i].imagen_categoria + '>' +
                        '</div></a>' +
                        '</div>'
                    );
                }
            },
            500: function(data){
              mostrarError(document.formulario, ERROR40);



            }


        }

    });
    $.ajax({
      type: "GET",
      url: "regiones",
      statusCode:{
        200:function (data) {
          var regiones = data.content;
          for (var i in regiones) {
            $("#region").append(
                '<option value="' + regiones[i].id_region + '"> ' + regiones[i].nombre_region + '</option>'
            );
          }
          $.ajax({
            type: "GET",
            url: "categorias",
            statusCode:{
              200:function (data) {
                var categorias = data.content;
                for (var i in categorias) {
                  $("#categoria").append(
                    '<option value="' + categorias[i].id_categoria + ' "> ' + categorias[i].nombre_categoria + '</option>'
                  );
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

};
