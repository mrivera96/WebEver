<?php
$titulo = 'Formulario de  Registro';
include '../Errores.inc.php';
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
    <link href="../css/estilos_alan.css" rel="stylesheet">
</head>

<h3 class="panel-title"> <strong><center style="color: #005662">   Registrar</center></strong><br></H3>


<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div  class="panel-heading" style="height: 40px">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-pencil"></span>  Nuevo Usuario
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="formulario" role="form" id="editar_usuarios"  method="post"style="padding-top: 15px" target="formDestination" >

                        <div class="group">
                            <input id="nombre_propio" type="text" required name="usuariopropio">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Nombre Propio</label>
                        </div>
                        <div class="group">
                            <input name="usuarionombre" id="nombre_usuario" onkeyup="escribiendoUsuario()" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ_-]*$|" title="No se permiten espacios" required type="text">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Nombre de Usuario</label>
                        </div>

                        <div class="group">
                            <input id="contrasena" type="password" required name="usariopassword" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label >Contraseña</label>
                        </div>

                        <div class="group">
                            <input id="contrasena1" type="password" required name="usariopassword1" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Repite la Contraseña</label>
                        </div>
                        <div class="group">
                            <input id="correo" onkeyup="escribiendoEmail()"type="email"required name="usuarioemail">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Correo</label>
                        </div>

                        <br>
                        <button type="button" onclick="validarFormulario()" id="btn" class="form-control"   name="Submit"  style="width:100%; background-color:#005662; color:white;">  <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>


                        <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><span class="glyphicon glyphicon-user"></span> Crear Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>El Usuario se ha creado con éxito.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onClick="javascript:(function () {
                                                    window.location.href = 'login.php';
                                                })()">Aceptar</button>

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


<script>

    function mostrarError(componente, error) {

        $("#editar_usuarios").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al ingresar un usuario.</h5>' +
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

    function escribiendoUsuario() {
        $.ajax({
            type: "GET",

            url: "../WebServices/verificar_usuario.php?verificausu=" + $('#nombre_usuario').val(),
        }).done(function (data) {
            console.log(data);
            if (data == 1) {
                $('#nombre_usuario').css("color", "red");
                // mostrarErrorto(document.formulario.nombre_usuario, "error no .");
                mostrarError(document.formulario.usuarionombre, "Este nombre de usuario ya existe \" Ingrese un usuario valido\"");

            } else
                $('#nombre_usuario').css("color", "black");
        });
    }

    function escribiendoEmail() {
        $.ajax({
            type: "GET",

            url: "../WebServices/verificar_email.php?verificaemail=" + $('#correo').val(),
        }).done(function (data) {
            console.log(data);
            if (data == 1) {
                $('#correo').css("color", "red");
                mostrarError(document.formulario.usuarioemail, "Este e-mail ya existe \" Ingrese un e-mail valido\"");



            } else
                $('#correo').css("color", "black");

        });
    }

    function validarFormulario() {

        var error_nomUsuario = false;
        var error_nomPropio = false;
        var error_correo = false;
        var error_contrasena = false;
        var error_contrasena1 = false;


        if (document.formulario.usuariopropio.value === "") {
            error_nomPropio = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.usuariopropio,<?php print json_encode(ERROR11); ?>);
            return;
        }
        if (document.formulario.usuarionombre.value === "") {
            error_nomUsuario = true;
            mostrarError(document.formulario.usuarionombre, <?php print json_encode(ERROR10); ?>);
            return;
        }

        if (document.formulario.usariopassword.value === "") {
            error_contrasena = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.usariopassword, <?php print json_encode(ERROR25); ?>);
            return;
        }

        if (document.formulario.usariopassword1.value === "") {
            error_contrasena = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.usariopassword1, <?php print json_encode(ERROR27); ?>);
            return;
        } else {
            if (document.formulario.usariopassword.value !== document.formulario.usariopassword1.value) {
                error_contrasena1 = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.usariopassword1, <?php print json_encode(ERROR28); ?>);


            }
        }

        if (document.formulario.usuarioemail.value === "") {
            error_correo = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.usuarioemail, <?php print json_encode(ERROR32); ?>);
            return;
        } else {
            if (!document.formulario.correo.value.includes("@") || !document.formulario.usuarioemail.value.includes(".")) {
                error_correo = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.usuarioemail, <?php print json_encode(ERROR12); ?>);
                return;
            }
        }

        if (error_nomUsuario === false &&
                error_nomPropio === false &&
                error_correo === false &&
                error_contrasena === false &&
                error_contrasena1 === false) {


            $.ajax({
                type: "POST",
                url: "../WebServices/insertarUsuarioCliente.php",
                data: {
                    'tkn': "<?php echo $_SESSION['token'] ?>",
                    'usuariopropio': document.formulario.usuariopropio.value,
                    'usuarionombre': document.formulario.usuarionombre.value,
                    'usariopassword': document.formulario.usariopassword.value,
                    'usariopassword1': document.formulario.usariopassword1.value,
                    'usuarioemail': document.formulario.usuarioemail.value

                }

            }).done(function (data) {
                var resp = JSON.parse(data);
                if (resp == "El token recibido NO existe en la base de datos." || resp == "El Token ya expiró.") {
                    document.getElementById("colorIniciosecion").click();
                } else {
                    $("#Modal1").modal('show');
                }


            });
            return;


        }


    }
</script>

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
<!Fin de documento cierre>
