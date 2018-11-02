<?php
include_once '../../config/ConexionABaseDeDatos.php';
?>
<!DOCTYPE html>
<html  lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if (!isset($titulo) || empty($titulo)) {
            $titulo = 'Agenda Electroníca Oriental';
        }
        echo "<title>$titulo</title>";
        ?>
        <title>Agenda Electrónica Oriental</title>

        <link rel="shortcut icon" href="../imagenes/aeo.ico" />
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/estilos.css" rel="stylesheet">
    </head>
    <body>
<!fin documento inicio>

<!Barra de navegacion Navbar>
<script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
<head><link href="../css/estilos_melvin.css" rel="stylesheet"></head>
<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  href="../index.php"><img class="btn-card" src="../imagenes/aeo.png" align="left" height="50"></a><!--Para ponerle una img ala pagina -->
            <a class="navbar-brand" href="../index.php"><strong>Agenda Electrónica Oriental</strong></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li> <a id="colorIniciosecion" href="../../config/cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong>Cerrar Sesión</strong></a></li>

                <li id="boton" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                    <ul id="despliege"class="dropdown-menu" role="menu">
                        <li><a href="../Vistas/mostrar_usuarios.php"><img src="../imagenes/administracioncuenta.jpg" height="15"></img> <strong>Administración de Cuenta</strong></a></li>
                        <li><a href="../Vistas/administracion-de-perfiles.php"><img src="../imagenes/administracionperfil.jpg" height="15"></img> <strong>Administración de Perfil</strong></a></li>
                    </ul>
                </li>
                <!--va iniciar secion o registrarce -->
            </ul>
        </div>
    </div>

</nav>
<!Fin de navbar>

<script src="../js/jquery-2.2.4.min.js"></script>
<link href="../css/estilos_alan.css" rel="stylesheet">

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

    <script>
                $(document).on("ready", function () {
                    loadData();
                });
                var loadData = function ()
                {
                    $.ajax({
                        type: "get",
                        url: "../WebServices/mostrar_perfil.php",
                        data: {'id_contacto':<?php echo $_GET['numct'] ?>}
                    }).done(function (data)
                    {
                        var coordenadas = JSON.parse(data);
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
     </div>
  </div>
    </div>
  </div>
    <body >
        <div id="map_canvas" style="width:100%; height:435px"></div><br>

    </body>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <br>
    <br>

    <!-- Footer -->
    <div class="navbar navbar-default navbar-fixed-bottom" id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left ">
                <div  class="col-xs-6 col-sm-6 col-md-4" >
                    <a  href="../Vistas/acercadeweb.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <strong class="opcion coloremail">Acerca de Desarrolladores</strong></a>
                </div>

                <div  class="col-xs-6 col-sm-6 col-md-4" >
                    <a  href="#"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> <strong class="opcion coloremail">Descarga la App</strong></a>

                    <ul class="list-unstyled quick-links">

                        <div class="principal"
                    </div>

                    <!--LIK DE DESCARGA DE LA APP-->
                </ul>
            </div>
            <div  class="col-xs-6 col-sm-6 col-md-4" >
                <span  class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <strong id="coloayuda">Ayuda y Contacto</strong></a>

                <ul class="list-unstyled quick-links">
                    <a  href="#"><span  aria-hidden="true"></span> <strong class="opcion coloremail"><small>aeodanli@gmail.com</small></strong></a>


                </ul>
            </div>
        </div>
    </div>
    </div>
    </body>
    </html>
