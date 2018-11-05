<?php
require '../funcs/funcs.php';


$titulo = 'Recuperación de contraseña';
$errors = array();

if (!empty($_POST)) {
    $email = $con->real_escape_string($_POST['email']);

    if (!isEmail($email)) {
        $errors[] = "Debe ingresar un correo electronico valido";
    }

    if (emailExiste($email)) {
        $user_id = getValor('id_usuario', 'correo', $email);
        $nombre = getValor('nombre_usuario', 'correo', $email);

        $token = generaTokenPass($user_id);

        $url = 'http://' . $_SERVER["SERVER_NAME"] . '/cambia_pass.php?user_id=' . $user_id . '&token=' . $token;

        $asunto = 'Recuperar Password - Sistema de Usuarios';
        $cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";

        if (enviarEmail($email, $nombre, $asunto, $cuerpo)) {
            echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
            echo "<a href='index.php' >Iniciar Sesion</a>";
            exit;
        } else {
            $errors[] = "no envio los datos";
        }
    } else {
        $errors[] = "La direccion de correo electronico no existe";
    }
}
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

<html>
    <head>
        <title>Recuperar contraseña</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div style="margin-top: 17%" class="panel panel-default">
                        <div class="panel-heading text-center" style="background: #005662">
                            <h4 style="color: #fff">Recuperación de contraseña</h4>

                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                                <h4>Introduce tu email</h4>
                                <br>
                                <p>
                                    Ingresa la dirección de correo electrónico con la que te registraste y te enviaremos un email
                                    con el que podrás restablecer tu contraseña.
                                </p>
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                       required autofocus>
                                <br>
                                <button type="submit" name="enviar_email" class="btn btn-lg btn-primary btn-block" id="btn_enviar_email">
                                    Enviar
                                </button>
                            </form>
                            <?php echo resultBlock($errors); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

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
