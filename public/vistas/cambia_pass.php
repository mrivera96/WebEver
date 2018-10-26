<?php

$titulo="Recuperacion de contraseña";

include_once '../plantillas/documento-inicio.inc.php';
include_once '../plantillas/barra-de-navegacion-navbar.inc.php';

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

<?php
include_once '../plantillas/documento-cierre.inc.php';
?>

