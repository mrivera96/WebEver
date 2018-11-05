<?php
$titulo = 'Edición de Cuenta';


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

        <script src="../js/jquery-2.2.4.min.js"></script>
        <link href="../css/estilos_alan.css" rel="stylesheet">

        <div class="container">
            <div class="row">

                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div   class="panel-heading" style="height: 40px">
                            <h3 class="panel-title">
                                <span class="glyphicon glyphicon-edit"></span>  Edición de Cuenta
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form  name="formulario_editar" id="editar_usuarios" role="form" method="post"  target="formDestination" >


                                <div class="group">
                                    <input  id="nombre_usuario" type="text" onkeyup="escribiendoUsuario()" required name="usuarionombre">
                                    <input id="id_usuario" type="hidden" name="usuario"  >
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre de Usuario</label>
                                </div>
                                <div class="group">
                                    <input id="nombre_propio" type="text" required="" name="usuariopropio">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre Propio</label>
                                </div>
                                <div class="group">
                                    <input id="correo" type="email" required="" onkeyup="escribiendoEmail()" name="usuarioemail">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Correo</label>
                                </div>
                                <iframe class="oculto"  name="formDestination"></iframe>
                                <button  type="button" onclick="validarFormulario()" id="btn" class="form-control"  name="guardar" style="width:100%; background-color:#005662; color:white;"> <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>
                                <br>
                                <button class="form-control btn btn-danger " data-toggle="modal"  data-target="#Modal" type="button"  style="width:100%;  color:white;"> <span class="glyphicon glyphicon-trash"></span>  Eliminar Usuario</button>

                                <div class="modal" id="Modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Eliminar Usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Eliminará el usuario. ¿Desea continuar?.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="id_eliminar" class="btn btn-primary">Sí, borrar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--modal de insercion-->
                                <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><span class="glyphicon glyphicon-user"></span> Actualizar Usuario.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>El Usuario se ha actualizado con éxito.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" onClick="javascript:(function () {
                                                                    window.location.href = '../cerrarSessionLogin.php';
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

            function escribiendoUsuario() {
                $.ajax({
                    type: "GET",
                    url: "../WebServices/verificar_usuario.php?verificausu=" + $('#nombre_usuario').val(),
                }).done(function (data) {
                    console.log(data);
                    if (data == 1) {
                        $('#nombre_usuario').css("color", "red").$('mitooltip').tooltip();

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
                    } else
                        $('#correo').css("color", "black");
                });
            }
            function validarFormulario() {
                function mostrarError(componente, error) {

                    $("#editar_usuarios").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
                            '<div class="modal-dialog" role="document">' +
                            '<div class="modal-content">' +
                            '<div class="modal-header">' +
                            '<h5 class="modal-title">Error al actualizar el usuario</h5>' +
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

                var error_nomUsuario = false;
                var error_nomPropio = false;
                var error_correo = false;
                var error_contrasena = false;
                if (document.formulario_editar.usuarionombre.value === "") {
                    error_nomUsuario = true;
                    mostrarError(document.formulario_editar.usuarionombre, "Debe ingresar un nombre de usuario.");
                    return;

                }


                if (document.formulario_editar.usuariopropio.value === "") {
                    error_nomPropio = true;
                    $("#Modal3").modal("show");
                    mostrarError(document.formulario_editar.usuariopropio, "Debe ingresar un nombre propio.");
                    return;
                }
                if (document.formulario_editar.usuarioemail.value === "") {
                    error_correo = true;
                    $("#Modal3").modal("show");
                    mostrarError(document.formulario_editar.usuarioemail, "Debe ingresar un correo.");
                    return;
                } else {
                    if (!document.formulario_editar.usuarioemail.value.includes("@") || !document.formulario_editar.usuarioemail.value.includes(".")) {
                        error_correo = true;
                        $("#Modal3").modal("show");
                        mostrarError(document.formulario_editar.usuarioemail, "Debes colocar una Dirección de Email válida.");
                        return;
                    }
                }

                if (error_nomUsuario === false &&
                        error_nomPropio === false &&
                        error_correo === false
                        //error_contrasena === false
                        )
                {
                  var iUsuario = document.formulario_editar.usuario.value;
                  var nombre = document.formulario_editar.usuarionombre.value;
                  var nombrepropio = document.formulario_editar.usuariopropio.value;
                  var email = document.formulario_editar.usuarioemail.value;



                  $.ajax({
                            type:"POST",
                            url:"../WebServices/actualizacion_de_un_usuario.php",
                            data:{'usuario':iUsuario,'usuarionombre':nombre,'usuariopropio':nombrepropio,'usuarioemail':email,'tkn':"<?php echo $_SESSION['token'] ?>"}
                        }).done(function(data){
                            var users = JSON.parse(data);
                            if(users=="El token recibido NO existe en la base de datos."|| users == "El Token ya expiró." ){
                            document.getElementById("colorIniciosecion").click();
                            }else{
                              $("#Modal1").modal('show');

                            }
                          }
                          );

                    return;
                  }

            }


        </script>





        <script>
            $(document).on("ready", function () {
                loadData();
            });
            var loadData = function ()
            {

                $.ajax({
                type: "POST",
                        url: "../WebServices/Mostar_Los_Usuarios_Editados.php",
                        data: {'usuario':<?php echo $_SESSION['idUrs'] ?>,'tkn':"<?php echo $_SESSION['token'] ?>"}
                }).done(function (data)
                {
                    var editar = JSON.parse(data);
                        for (var i in editar) {


                $("#nombre_usuario").attr('value', editar[i].nombre_usuario);
                        $("#nombre_propio").attr('value', editar[i].nombre_propio);
                        $("#correo").attr('value', editar[i].correo);
                        //  $("#contrasena").attr('value', editar[i].contrasena);
                        $("#id_usuario").attr('value', editar[i].id_usuario);
                }
                });
                        $("#editar_usuarios").submit(function () {
                //   alert('Usuario Actualizado con exito');
                //window.location.href = 'mostrar_usuarios.php';
                });
                }
        </script>

        <script>
                document.getElementById("id_eliminar").onclick = function () {
                myFunction()
            };

            function myFunction() {
                $.ajax({
                    type: "POST",
                    url: "../WebServices/eliminacion_de_un_usuario.php",
                    data: {'usuario':<?php echo $_SESSION['idUrs'] ?>,'tkn':"<?php echo $_SESSION['token'] ?>"}
                });

                window.location.href = '../cerrarSessionLogin.php';
            }
        </script>

<!inicio documento cierre>
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
