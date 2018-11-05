<?php
$titulo = 'Contactos';
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
            <link href="../css/estiloslogin.css" rel="stylesheet">
            <link href="../css/estilos_melvin.css" rel="stylesheet"
        </head>

        <script src="../js/jquery-2.2.4.min.js"></script>
        <div class="container" id="">
            <div class="row" style="margin-top: 10px;" id="contedidodecategoriascontacto">
                <div class="row">

                    <div class="col-sm-6 col-md-6">
                        <div class="panel panel-default">
                            <div  class="panel-heading" style="height: 40px">
                                <h3 class="panel-title">
                                    <center>Contactos Pendientes<br><br></center>
                                    <br>
                                    <br>
                                </h3>
                            </div>
                            <div class="coll">
                                <center>
                                    <img src="../imagenes/contactopendiente.jpg" height="200px" class="img-fluid imagenAcercadeWeb " alt="Imagen no Disponible" title="Imagen Agenda Electronica Digital" >
                                </center>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <p ><a href="contactosUsuariosPendientes.php" class="btn btn-primary">Ver Contactos Pendientes</a></p>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="panel panel-default">
                            <div  class="panel-heading" style="height: 40px">
                                <h3 class="panel-title">
                                    <center>Contactos Aprobados<br><br></center>
                                    <br>
                                    <br>
                                </h3>
                            </div>
                            <div class="coll">
                                <center>
                                    <img class="card-img-top" height="200px" src="../imagenes/contactoaprovado.jpg" alt="Imagen no Disponible">
                                </center>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <p ><a href="contactosUsuarioAprobado.php" class="btn btn-primary">Ver Contactos Aprobados</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="container">


            </div>
            <div  class="container">
                <div class="row">


                </div>

            </div>

        </div>


        <div  class="container">
            <div class="row">


            </div>

        </div>


        <a href="nuevoContacto.php" class="float">
            <i class="glyphicon glyphicon-plus my-float"></i>
        </a>
<!inicio deocumento cierre>
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
} else {
    header('Location: /webaeo');
}
?>