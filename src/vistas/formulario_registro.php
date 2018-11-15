<?php
$titulo = 'Formulario de Registro';

include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
?>
    <link href="css/estilos_alan.css" rel="stylesheet">
    <div class="container" >
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default ">
                    <div  class="panel-heading" style="height: 40px ">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-pencil"></span>  Nuevo Usuario
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form name="formulario" role="form" id="formulario"  method="post"style="padding-top: 15px" target="formDestination" >
                            <div class="group">
                                <input  id="nombre_usuario" type="text"  required name="usuarionombre">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre de Usuario</label>
                            </div>
                            <div class="group">
                                <input id="nombre_propio" type="text" required name="usuariopropio">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre Propio</label>
                            </div>
                            <div class="group">
                                <input id="correo" onkeyup="escribiendoEmail()"type="email"required name="usuarioemail">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Correo</label>
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

                            <select name="usuariosroles" class="form-control" id="id_rol_usuario">
                            </select>
                            <br>
                            <button type="button"  id="guardar"  class="form-control"   name="guardar"  style="width:100%; background-color:#005662; color:white;">  <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>


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
                                            <p>El usuario se ha creado con exito.</p>
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
<script type="text/javascript" src="js/Errores.js"></script>
<script type="text/javascript" src="js/formulario_registro.js"></script>
