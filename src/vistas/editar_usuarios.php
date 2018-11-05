<?php
$titulo = 'Edición de Cuenta';

include_once 'Errores.inc.php';

include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
?>

    <link href="css/estilos_alan.css" rel="stylesheet">


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
                        <form  name="formulario_editar" id="formulario_editar" role="form" method="post"  target="formDestination" >


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

                            <!-- CUADRO MODAL DE ELIMINACION DE UN USUARIO-->
                            <iframe class="oculto"  name="formDestination"></iframe>
                            <button  type="button" onclick="validarFormulario()" id="btn" class="form-control"  name="Submit" style="width:100%; background-color:#005662; color:white;"> <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>
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
                                            <p>"Eliminará el usuario. ¿Desea continuar?."</p>
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
                                                                window.location.href = 'usuarios';
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



<?php
include_once 'documento-cierre.inc.php';
?>
<script type="text/javascript">
    var usuario=<?php echo $_GET['usuario']; ?>;
    var id_logueado=<?php echo $_SESSION['idUrs']; ?>;
</script>
<script src="js/Errores.js"></script>
<script src="js/editar_usuarios.js">

</script>