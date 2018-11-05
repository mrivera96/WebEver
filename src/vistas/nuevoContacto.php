<?php
$titulo = 'Formulario Registro ';
if (isset($_SESSION['idUrs'])&& isset($_SESSION['token']) && !empty($_SESSION['token'])) {
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
                <li> <a id="colorIniciosecion" href="../cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong>Cerrar Sesión</strong></a></li>

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

<head>
    <link href="../css/nuevoperfil.css" rel="stylesheet">
    <link href="../css/estilos_melvin.css" rel="stylesheet">
</head>

<div class="container responsive">
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="height: 40px">

                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>   Nuevo Perfil</h3>
                </div>

                <div class="panel-body">
                    <form id="formularioCrear" name="formularioCrear" role="form" method="post" action="../WebServices/insertarPerfilUsuario.php" target="formDestination">
<br/>
                        <div class="group">
                            <input type="text" required name="nomborg_rec" id="nombreOrg">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-credit-card"></span> Nombre de Organización</label>
                        </div>

                        <div class="group">

                            <input type="tel" id="numtelOrg" name="numtel_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-earphone"></span> Número fijo</label>
                        </div>


                        <div class="group">
                            <input type="tel" id="numcelOrg" name="numcel_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-phone"></span> Número móvil</label>
                        </div>


                        <div class="group">
                            <input type="text" required id="dirOrg" name="direccion_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-transfer"></span> Dirección</label>
                        </div>


                        <div class="group">
                            <input type="email" id="emailOrg" name="email_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-envelope"></span> e-mail</label>
                        </div>



                        <div class="group">
                            <input type="text" required id="descOrg" name="desc_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-align-left"></span> Descripción de la organización</label>
                        </div>


                        <div class="group">
                            <input  type="text" id="latOrg" required name="lat_rec" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-map-marker"></span> Latitud</label>
                        </div>


                        <div class="group">
                            <input type="text" id="longOrg" required name="longitud_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-map-marker"></span> Longitud</label>
                        </div>

                        <h5>Ingrese su Ubicación</h5>

                         <script type="text/javascript"
                            src="https://maps.google.com/maps/api/js?sensor=false">
                        </script>

                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjOpSe_s3D6bX5abrOcQ5Yg8GGmUdhQn8&callback=initMap"
                         type="text/javascript"></script>

                            <script type="text/javascript">
                           function getCoords(marker){
                               $("#latOrg").attr("value",marker.getPosition().lat());
                                 $("#longOrg").attr("value",marker.getPosition().lng());

                           }
                           function initialize() {
                               var myLatlng = new google.maps.LatLng(14.041458, -86.568061);



                               var myOptions = {
                                   zoom: 15,
                                   center: myLatlng,
                                   mapTypeId: google.maps.MapTypeId.satelite
                               }
                               var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                              marker = new google.maps.Marker({
                                     position: myLatlng,
                                     draggable: true,
                                     title:'danli'
                               });
                               google.maps.event.addListener(marker, "dragend", function() {

                                               getCoords(marker);

                               });

                                 marker.setMap(map);
                               getCoords(marker);


                             }

                           </script>
                           <body onload="initialize()">
                               <div id="map_canvas" style="width:100%; height:200px"></div><br>

                    </body

                        <h5>Región</h5>
                        <select class="form-control" id="region" name="id_region"></select>

                        <h5>Categoría</h5>
                        <select class="form-control" id="categoria" name="id_categoria"></select>


                        <input type="hidden" name="imagen" value=""/>
                        <input type="hidden" name="nombre_imagen" value=""/>
                        <iframe class="oculto"  name="formDestination"></iframe>
                        <button class="form-control" name="guardar" id="guardar"  type="button" style="background-color:#005662; color:white;" ><span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>

                        <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Crear Perfil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>El Perfil se ha creado con éxito.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onClick="javascript:(function(){window.location.href = 'contactosUsuario.php';})()">Aceptar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>




            </div>


        </div>

    </div>
</div>
<br>

<script src="../js/jquery-2.2.4.min.js"></script>
<script src="../js/vrcontactocrear.js"></script>

<!inicio de documento cierre>
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
<!fin de documento cierre>
<?php
   } else {
       header('Location: /webaeo');
    }
?>
