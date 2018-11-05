<?php
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';

?>

<link href="css/estilos_alan.css" rel="stylesheet">

 <div id="estilo-contenedor-textocategoria"class="container">
    <div class="row"  id="fila"  >
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 40px; border-radius: 8px">
                <div class="coll">
                    <h3 class="panel-title">
                        <center><strong>Ubicación</strong></center>
                    </h3>
                </div>
<br/>
<div class="container responsive" id="contenedor_resultado">
    <br>
    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?sensor=false">
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEOxwsMZ7J9V7kqTr82JflRNORJchV4mM&callback=initMap"
    type="text/javascript"></script>


     </div>
  </div>
    </div>
  </div>
    <body >
        <div id="map_canvas" style="width:100%; height:435px"></div><br>

    </body>

    <?php
include_once 'documento-cierre.inc.php';?>
<script>
                $(document).on("ready", function () {
                    loadData();
                });
                var loadData = function ()
                {
                    $.ajax({
                        type: "get",
                        url: "obtenerPerfil",
                        data: {'cto':<?php echo $_GET['numct'] ?>}
     }).done(function (data)
     {
     var coordenadas = data.content;
     var latitud;
     var longitud;


     for (var i in coordenadas)
     {


     $("#titulo").append(
     '<h3' + coordenadas[i].nombre_organizacion + '</h3>'


     );

     if (coordenadas[i].latitud && coordenadas[i].longitud != "") {
     var myLatlng = new google.maps.LatLng(latitud = coordenadas[i].latitud, longitud = coordenadas[i].longitud);

     var myOptions = {
     zoom: 15,
     center: myLatlng,
     mapTypeId:google.maps.MapTypeId.ROADMAP,
     }
     var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

     marker = new google.maps.Marker({
     position: myLatlng,
     title: coordenadas[i].nombre_organizacion,

     });
     google.maps.event.addListener(marker, "dragend", function () {

     getCoords(marker);

     });

     marker.setMap(map);
     getCoords(marker);




     } else {
     latitud = "No disponible";
     longitud = "No disponible";
     }

     $("#map_canvas").append(
     '<h5>ubicación:' + latitud + '</h5>'

     );
     }
     });
     }
     </script>