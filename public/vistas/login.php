<!Documento de Inicio>
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
<!Fin Documento de Inicio>

<!Barra de navegacion>
<?php
session_start();
?>
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
                <?php
                if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
                    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
                        ?>
                        <li id="boton" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                            <ul id="despliege"class="dropdown-menu" role="menu">
                                <li> <a id = "colorIniciosecion" href = "../Vistas/login.php"><img src="../imagenes/config.png" height="15"></img> <strong>Panel de Control </strong></a></li>
                                <li><a href="../Vistas/editarUsuarioNormal.php"><img src="../imagenes/administracioncuenta.jpg" height="15"></img> <strong>Edición de Cuenta</strong></a></li>
                            </ul>
                        </li>
                        <li> <a id="colorIniciosecion" href="../cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong>Cerrar Sesión</strong></a></li>

                        <?php
                    } else {
                        ?><li id="boton" class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                               <ul id="despliege"class="dropdown-menu" role="menu">
                                 <li><a href="../Vistas/mostrar_usuarios.php"><img src="../imagenes/administracioncuenta.jpg" height="15"></img> <strong>Administración de Cuenta</strong></a></li>
                                 <li><a href="../Vistas/administracion-de-perfiles.php"><img src="../imagenes/administracionperfil.jpg" height="15"></img> <strong>Administración de Perfil</strong></a></li>
                             </ul>
                        </li>
                        <li> <a id="colorIniciosecion" href="../cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong>Cerrar Sesión</strong></a></li>
                        <?php
                        $message = 'Usuario o Contraseña incorrectas desde la sesion';
                           }
                           ?>
                    <?php
                } else {
                    ?>
                    <li> <a id = "colorIniciosecion" href = "../Vistas/login.php"><span class = "glyphicon glyphicon-log-in" aria-hidden = "true"></span> <strong>Iniciar Sesión</strong></a></li>
                    <li> <a id = "colorIniciosecion" href = "../Vistas/registrarCuentaUsuario.php"><span class = "glyphicon glyphicon-plus" aria-hidden = "true"></span> <strong>Registrarse</strong></a></li>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</nav>
<!fin barra de navegacion>

<?php
$titulo = 'Acceder a la cuenta';
include '../Errores.inc.php';

if (isset($_POST['tkn']) && !empty($_POST['tkn'])) {

    if ($_POST['estado'] != 2) {
        $_SESSION['token'] = $_POST['tkn'];
        $_SESSION['idUrs'] = $_POST['id'];
        $_SESSION['rol'] = $_POST['rol'];
    }
}
if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {

    if (($_SESSION['rol'] == 2)) {
        header('Location: ../Vistas/contactosUsuario.php');
    } else if (($_SESSION['rol'] == 1)) {
        header('Location: ../Vistas/mostrar_usuarios.php');
    } else {
        $message = 'Usuario o Contraseña incorrectas ';
    }
}
?>
<head>
    <link href="../css/estiloslogin.css" rel="stylesheet">
</head>

<!--FORMULARIO DE LOGUIN-->
<div  class="container well" id="contenedor">
    <div class="row">
        <div class="col-xs-12">
            <img src="../imagenes/LoginUsuario.png" class="img-responsive" id="imagen">
        </div>
        <p><h5>
            <strong><center style="color: #005662">   Acceder a la Cuenta</center></strong>
        </h5></p>
        <br>
    </div>
    <form class="form" name="log" id="modal_login" method="POST">
        <div class="group">
            <input  type="text" required    name="usern"  title="No se permiten espacios">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label  for="usern">  <span class="glyphicon glyphicon-user"></span> Usuario</label>
        </div>

        <div class="group">
            <input  type="password"  required  name="pass" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="pass"><span class="glyphicon glyphicon-lock"></span> Password</label>
        </div>

        <br>

        <button  type="button"  id="btn-card"  class="btn btn-lg btn-block"    name="guardar"  style=" background-color: #005662; color:white;">Ingresar</button>
    </form>

<!--FORMULARIO QUE RECIVE LA INFORMACION DEL TOKEN-->
    <form style="display: hidden" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="form">
        <input type="hidden" id="tkn" name="tkn" value=""/>
        <input type="hidden" id="rol" name="rol" value=""/>
        <input type="hidden" id="id" name="id" value=""/>
        <input type="hidden" id="stado" name="estado" value=""/>
    </form>

</div>

<script src="../js/jquery-2.2.4.min.js"></script>
<!--VALIDACION DE LOS CAMPOS DE INICIO DE SECCION-->
<script>
    $("#btn-card").click(function () {
        loguear()
    });
    function mostrarError(componente, error) {

        $("#modal_login").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al Acceder ala Cuenta.</h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>' +
                ' <div class="modal-body">' +
                '<p>' + error + '</p>' +
                '</div>' +
                '<div class="modal-footer">' +
                '<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>');
        $("#Modal3").modal("show");
        $('#Modal3').on('hidden.bs.modal', function () {
            componente.focus();
            $("#Modal3").detach();
        });

    }
    ;
    function loguear() {

        var error_nomUsuario = false;
        var error_contrasena = false;


        if (document.log.usern.value === "") {
            error_nomUsuario = true;
            $("#Modal3").modal("show");
            mostrarError(document.log.usern,<?php print json_encode(ERROR10); ?>);
            return;
        }

        if (document.log.pass.value === "") {
            error_nomPropio = true;
            $("#Modal3").modal("show");
            mostrarError(document.log.pass,<?php print json_encode(ERROR25); ?>);
            return;
        }

        if (error_nomUsuario === false &&
                error_contrasena === false) {

            var usuario = document.log.usern.value;
            var contrasena = document.log.pass.value;
            $.ajax({
                type: "POST",
                url: "../loginUsuario",
                data: {'nombre_usuario': usuario, 'contrasena': contrasena},
                statusCode:{
                  200: function(data){
                    var array = data.content;

                if (array != "Credenciales incorrectos") {

                    $("#tkn").val(array.token);
                    $("#rol").val(array.rol);
                    $("#id").val(array.idUrs);
                    $("#stado").val(array.ste);


                    $("#form").submit();
                    $("#form").detach();

                } else {
            mostrarError(document.log.pass,<?php print json_encode(ERROR14); ?>);
                }

            },//data
              500: function(data){
              alert(data.message);
            }
              }

        });

        return;
    }
  };


</script>

<!Documento de cierre>
<div class="navbar navbar-default navbar-fixed-bottom" id="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left ">
            <div  class="col-xs-6 col-sm-6 col-md-4" >
                <a  href="../Vistas/acercadeweb.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <strong class="opcion coloremail">Acerca de Desarrolladores</strong></a>
            </div>

            <div  class="col-xs-6 col-sm-6 col-md-4" >
                <a  href="#"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> <strong class="opcion coloremail">Descarga la App</strong></a>
                  <ul class="list-unstyled quick-links">
                  <div class="principal">
                  </div>
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
<!fin de documento de cierre>
