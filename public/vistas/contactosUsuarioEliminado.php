<?php
$titulo = 'Contactos Eliminados';
if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
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

        <head>
            <link href="../css/estiloslogin.css" rel="stylesheet">
            <link href="../css/estilos_melvin.css" rel="stylesheet">
        </head>

        <script src="../js/jquery-2.2.4.min.js"></script>

        <div class="container" id="contenedor_perfiles">
            <div class="row" style="margin-top: 10px;" id="contenedorContacto">

            </div>


        </div>


        <script>
            $(document).on("ready", function () {
                loadData();
            });
            var loadData = function () {
            $.ajax({
            type: "post",
                    url: "../WebServices/consultarContactosEliminados.php",
                    data: {'id_usuario':<?php echo $_SESSION['idUrs'] ?>, 'tkn':"<?php echo $_SESSION['token'] ?>"}
            }).done(function (data) {
            var users = JSON.parse(data);
                    if (users == "El token recibido NO existe en la base de datos." || users == "Credenciales incorrectos"){

            } else if (users == "El Token ya expiró."){
            document.getElementById("logout").click();
            } else {

            if (data !== "No hay resultados") {
            var contacto = JSON.parse(data);
                    var imagen;
                    var estado;
                    var id;
                    for (var i in contacto) {
            if (contacto[i].imagen !== "") {
            imagen = contacto[i].imagen;
            } else {
            imagen = "https://cdn.icon-icons.com/icons2/37/PNG/512/contacts_3695.png";
            }
            if (contacto[i].id_estado == 1) {
            estado = "Pendiente";
            } else if (contacto[i].id_estado == 2) {
            estado = "Aprobado";
            } else if (contacto[i].id_estado == 4) {
            estado = "Eliminado";
            } else {
            estado = "";
            }


            $("#contenedorContacto").append(
                    '<a class="enlaces_de_listas_contactos" href="edicionDePerfilUsuarioNormal.php?cto=' + contacto[i].id_contacto + '"><div class = "col-md-4 col-sm-6">' +
                    '<div class="media">' +
                    '<div class="media-left">' +
                    '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<h4 class = "media-heading">' + contacto[i].nombre_organizacion + '</h4>' + '<br>' +
                    '<p>Estado del Contacto:</p>' +
                    '<p style="color:#D4410A">' + estado + '</p>' +
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
                    '<img  style="width:130px ; heigh:130px ;"  class="img-circle circle-img" src="https://cdn4.iconfinder.com/data/icons/rounded-white-basic-ui/139/Warning01-RoundedWhite-512.png"> ' +
                    '</div>' +
                    '<div class="col-md-12 text-center">' +
                    '<h3>No tiene contactos eliminados </h3> ' +
                    '</div>'
                    );
            }
            });
            };
        </script>


        //inicio documento cierre
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
        //fin de documento cierre
        <?php
    } else {
        header('Location: ../webaeo');
    }
} else {
    header('Location: ../webaeo');
}
?>
