
<?php
$titulo = 'Agenda Electrónica Oriental';
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
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">
        <script src="./js/jquery-2.2.4.min.js" ></script>
        <link href="css/estilos_alan.css" rel="stylesheet">
    </head>
    <body>
<!fin documento inicio>

<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  href="index.php"><img class="btn-card" src="imagenes/aeo.png"   align="left" height="50"></a><!--Para ponerle una img ala pagina -->
            <a class="navbar-brand" href="index.php"><strong>Agenda Electrónica Oriental</strong></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li id="boton" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                    <ul id="despliege"class="dropdown-menu" role="menu">
                        <li><a href="mostrar_usuarios.php"><img src="imagenes/administracioncuenta.jpg" height="15"></img> <strong>Administración de Cuenta</strong></a></li>
                        <li><a href="#"><img src="imagenes/administracionperfil.jpg" height="15"></img> <strong>Administración de Perfil</strong></a></li>
                    </ul>
                </li>
                <!--va iniciar secion o registrarce -->
            </ul>
        </div>
    </div>

</nav>
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
