<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
require_once '../modelo/modelo_usuarios.php';
require_once '../php-jwt-master/src/JWT.php';
require_once '../php-jwt-master/src/BeforeValidException.php';
require_once '../php-jwt-master/src/ExpiredException.php';
require_once '../php-jwt-master/src/SignatureInvalidException.php';

use Firebase\JWT\JWT;

require '../config/Token.php';

class controladorUsuarios{

    function haveEmptyParameters($params,$request,$response){
        $error = false;
        $error_params='';
        $request_params = $request -> getParams();

        foreach($params as $parameter){
            if(!isset($request_params[$parameter]) || strlen($request_params[$parameter])<=0){
                $error=true;
                $error_params.=$parameter.', ';
            }
        }

        if($error){
            $err= new ApiResponse(400,
                "Parámetros incorrectos",
                "NO CONTENT");
            $response -> write(json_encode($err->toArray()));

        }

        return $error;
    }

    public function crearUsuario(Request $request, Response $response){
        if(!$this->haveEmptyParameters(array(
            'usuarionombre',
            'usuariopropio',
            'usuarioemail',
            'usuariopassword'), $request, $response)){

            $request_data = $request->getParsedBody();
            $error_correo = false;
            $usr = $request_data['usuarionombre'];
            $nom = $request_data['usuariopropio'];
            $mail = $request_data['usuarioemail'];
            $pass = $request_data['usuariopassword'];



            if (strpos($mail, "@") === false || strpos($mail, ".") === false) {
                $error_correo = true;
                $err= new ApiResponse(
                    400,
                    "email inválido",
                    null
                );
                $response -> write(json_encode($err ->toArray()));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($err ->getStatus());
            }

            if ($error_correo === false){
                if(isset($request_data['usuariosroles']) && empty($request_data['usuariosroles'])){
                    $rol = $request_data['usuariosroles'];
                }else{
                    $rol = 2;
                }

                $modelo = new ModeloUsuarios();
                $resp = $modelo->crearUsuario($usr,$nom,$mail,$pass,$rol);

                $response -> write(json_encode($resp ->toArray()));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($resp ->getStatus());
            }else{
                $err= new ApiResponse(
                    400,
                    "email inválido",
                    null
                );

                $response -> write(json_encode($err ->toArray()));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($err ->getStatus());
            }

        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(400);
        }



    }

    public function eliminarUsuario(Request $request, Response $response){
        if(!$this->haveEmptyParameters(array('usuario'), $request, $response)){

            $request_data = $request->getParsedBody();
            $usr = $request_data['usuario'];


                $modelo = new ModeloUsuarios();
                $resp = $modelo->eliminarUsuario($usr);

                $response -> write(json_encode($resp ->toArray()));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($resp ->getStatus());

        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(400);
        }



    }

    public function actualizarUsuario(Request $request, Response $response){
        if(!$this->haveEmptyParameters(array('usuario','usuarionombre','usuariopropio','usuarioemail'), $request, $response)){

            $request_data = $request->getParsedBody();
            $id_usua = $request_data['usuario'];
            $nombre_usua = $request_data['usuarionombre'];
            $nombre_pro = $request_data['usuariopropio'];
            $corr = $request_data['usuarioemail'];
            $error_correo = false;

            if (strpos($corr, "@") === false || strpos($corr, ".") === false) {
                $error_correo = true;
                $err= new ApiResponse(
                    400,
                    "email inválido",
                    null
                );
                $response -> write(json_encode($err ->toArray()));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($err ->getStatus());
            }

            if ($error_correo === false){
                $modelo = new ModeloUsuarios();
                $resp = $modelo->actualizarUsuario($id_usua,$nombre_usua, $nombre_pro, $corr);

                $response -> write(json_encode($resp ->toArray()));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($resp ->getStatus());
            }else{
                $err= new ApiResponse(
                    400,
                    "email inválido",
                    null
                );

                $response -> write(json_encode($err ->toArray()));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($err ->getStatus());
            }

        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(400);
        }
    }


    public function loginUsuario(Request $request, Response $response){
        if(!$this->haveEmptyParameters(array('nombre_usuario','contrasena'), $request, $response)){

            $request_data = $request->getParsedBody();
            $usr = $request_data['nombre_usuario'];
            $pass = $request_data['contrasena'];


            $modelo = new ModeloUsuarios();
            $resp = $modelo->loginUsuario($usr, $pass);

            $response -> write(json_encode($resp ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($resp ->getStatus());

        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(400);
        }



    }


}

