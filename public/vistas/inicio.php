<?php
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
    include_once 'buscador.inc.php';
 ?>


  <link href="css/estilos_alan.css" rel="stylesheet">

  <div id="estilo-contenedor-textocategoria"class="container">
    <div class="row"  id="fila"  >
      <div class="panel panel-default">
        <div class="panel-heading" style="height: 40px">
          <div class="coll">
            <h3 class="panel-title">
              <center><strong>Categorías</strong></center>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--Contenedor de tarjetas-->

  <div     id="estilo-contenedor" class="container"  >
    <div class="row" style="margin-top: 10px;" id="fila">
      <script>
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
                '<a href="Vistas/listaDeContactos.php?cty=' + array[i].id_categoria + '&&name_cty=' + array[i].nombre_categoria + '"><div id="panel_default" class="panel panel-default">' +
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
            alert(data.message);
          }


        }

      });

    };


    </script>

  </div>
</div>
<?php
include_once 'documento-cierre.inc.php';
?>
