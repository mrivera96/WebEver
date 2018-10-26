<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
require_once '../modelo/modelo_usuarios.php';

class controladorUsuarios{

    public function crearUsuario(Request $request, Response $response){

        $error_nomUsuario = false;
        $error_nomPropio = false;
        $error_correo = false;
        $error_contrasena = false;


        if (!isset($_POST['usuarionombre']) || empty($_POST['usuarionombre'])) {
            $error_nomUsuario = true;
            print json_encode(ERROR10);
            return;
        }
        if (!isset($_POST['usuariopropio']) || empty($_POST['usuariopropio'])) {
            $error_nomPropio = true;
            print json_encode(ERROR11);
            return;
        }

        if (!isset($_POST['usuarioemail']) || empty($_POST['usuarioemail'])) {
            $error_correo = true;
            print json_encode(ERROR32);
            return;
        } else {
            if (strpos($_POST['usuarioemail'], "@") === false || strpos($_POST['usuarioemail'], ".") === false) {
                $error_correo = true;
                print json_encode(ERROR4);
                return;
            }
        }

        if (!isset($_POST['usariopassword']) || empty($_POST['usariopassword'])) {
            $error_contrasena = true;
            print json_encode(ERROR17);
            return;
        }

        if ($error_nomUsuario === false &&
            $error_nomPropio === false &&
            $error_correo === false &&
            $error_contrasena === false
        ){

        }
    }
}

