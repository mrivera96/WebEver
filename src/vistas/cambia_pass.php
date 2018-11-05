<?php

$titulo="Recuperacion de contraseña";
require '../config/ConexionABaseDeDatos.php';
require '../funcs/funcs.php';

if(empty($_GET['user_id'])){
    header('Location: ../index.php');
}


if(empty($_GET['token'])){
    header('Location: ../index.php');
}

$user_id= $con->real_escape_string($_GET['user_id']);
$token= $con->real_escape_string($_GET['token']);


if(!verificaTokenPass($user_id,$token))
{
    echo 'No se pudo verificar los datos';
    exit;
}

?>

//DOCTYPE html>
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

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="background: #005662">
                    <h4 style="color: #fff">Crea una nueva contraseña</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="">

                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />

                        <input type="hidden" id="token" name="token" value="<?php echo $token; ?>" />

                        <div class="form-group">
                           <!-- <label for="clave">Nueva Contraseña</label>-->
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Mínimo de 8 caracteres" required>
                        </div>

                         <div class="form-group">
                           <!-- <label for="clave">Escribe de nuevo la contraseña</label>-->
                            <input type="password" name="clave2" id="clave2" class="form-control" placeholder="Las contraseñas deben coincidir" required>
                        </div>

                        <button type="submit" name="guardar-clave" class="btn btn-lg  btn-primary btn-block" id="btn_enviar_email">Guardar Contraseña</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
//inicio de documento cierre
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
//fin documento cierre
