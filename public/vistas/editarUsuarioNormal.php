<?php
$titulo = 'Edición de Cuenta';
//session_start();
include_once '../plantillas/documento-inicio.inc.php';
include_once '../plantillas/barra-de-navegacion-navbar.inc.php';

if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
        ?>

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
                                                                    window.location.href = '../config/cerrarSessionLogin.php';
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

                window.location.href = '../config/cerrarSessionLogin.php';
            }
        </script>


        <?php
        include_once '../plantillas/documento-cierre.inc.php';
        ?>

        <?php
    } else {
        header('Location: /webaeo');
    }
} else {
    header('Location: /webaeo');
}
