<?php
namespace App\controladores;
use App\modelo\ViewUsuarios;
use App\modelo\Token;
use App\modelo\ModeloUsuarios;
use App\ApiResponse;
use App\controladores\Utilities;

/**
 * CONTROLADOR PARA USUARIOS
**/
class controladorUsuarios{

    /**
     * CREA UN NUEVO USUARIO
     **/
    public function crearUsuario( $request,  $response){
        if(!Utilities::verificaToken($request,$response)){
            if(!Utilities::haveEmptyParameters(array(
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
                    if(isset($request_data['usuariosroles']) && !empty($request_data['usuariosroles'])){
                        $rol = $request_data['usuariosroles'];
                    }else{
                        $rol = 2;
                    }


                    $resp = ModeloUsuarios::crearUsuario($usr,$nom,$mail,$pass,$rol);

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
        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(401);
        }
    }

    /**
     * ELIMINA UN USUARIO
     **/

    public function eliminarUsuario( $request,  $response){
        if(!Utilities::verificaToken($request,$response)){
            if(!Utilities::haveEmptyParameters(array('usuario'), $request, $response)){

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
        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(401);
        }

    }

    /**
     * VERIFICA QUE UN USUARIO EXISTA EN LA BD
     **/
    public function existeUsuario( $request,  $response){
        if(!Utilities::verificaToken($request,$response)){
            if(!Utilities::haveEmptyParameters(array('usuario'), $request, $response)){

                $request_data = $request->getParsedBody();
                $usr = $request_data['usuario'];
                $resp = ModeloUsuarios::usuarioExiste($usr);

                $response -> write(json_encode($resp->toArray2() ));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($resp ->getStatus());

            }else {
                return $response->withHeader('Content-type', 'application/json')
                    ->withStatus(400);
            }
        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(401);
        }


    }

    /**
     * VERIFICA QUE UN EMAIL EXISTA EN LA BD
     **/
    public function existeEmail( $request,  $response){
        if(!Utilities::verificaToken($request,$response)){
            if(!Utilities::haveEmptyParameters(array('usuarioemail'), $request, $response)){

                $request_data = $request->getParsedBody();
                $mail = $request_data['usuarioemail'];
                $resp = ModeloUsuarios::emailExiste($mail);

                $response -> write(json_encode($resp->toArray2() ));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($resp ->getStatus());

            }else {
                return $response->withHeader('Content-type', 'application/json')
                    ->withStatus(400);
            }
        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(401);
        }

    }

    /**
     * ACTUALIZA UN USUARIO
     **/

    public function actualizarUsuario( $request,  $response){
        if(!Utilities::verificaToken($request,$response)){
            if(!Utilities::haveEmptyParameters(array('usuario','usuarionombre','usuariopropio','usuarioemail'), $request, $response)){

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
        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(401);
        }

    }

    /**
     * REALIZA EL LOGIN DE UN USUARIO
     **/
    public function loginUsuario( $request,  $response){
        if(!Utilities::haveEmptyParameters(array('nombre_usuario','contrasena'), $request, $response)){

            $request_data = $request->getParsedBody();
            $usr = $request_data['nombre_usuario'];
            $pass = $request_data['contrasena'];

            $resp = ModeloUsuarios::loginUsuario($usr, $pass);



            if ($resp->getContent()['ste'] != 2) {
                    $_SESSION['token'] = $resp->getContent()['token'];
                    $_SESSION['idUrs'] = $resp->getContent()['idUrs'];
                    $_SESSION['rol'] = $resp->getContent()['rol'];


                $respuesta=new ApiResponse(200,
                    $resp->getMessage(),
                    array('rol' => $_SESSION['rol'],
                        'idUrs' => $_SESSION['idUrs'],
                        'ste' => $resp->getContent()['ste'])
                );

                $response -> write(json_encode($respuesta ->toArray2()));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($resp ->getStatus());
                return $response ->withHeader('Location','usuarios');
            }

        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(400);
        }

    }

    /**
     * PARA REALIZAR PRUEBAS DEL MODELO
     **/
    public function pruebas( $request,  $response){
        if(!Utilities::haveEmptyParameters(array('tkn','id'), $request, $response)){

            $request_data = $request->getParsedBody();
            $tkn = $request_data['tkn'];
            $id = $request_data['id'];


            $resp = Token::generarToken($id);

            $response -> write(json_encode($resp ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($resp ->getStatus());

        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(400);
        }
    }

    /**
     * RECUPERA TODOS LOS USUARIOS DE LA BD
     **/
    public function todos( $request,  $response){
        if(!Utilities::verificaToken($request,$response)){
            $resp = ViewUsuarios::todos();

            $response -> write(json_encode($resp ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($resp ->getStatus());

        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(401);
        }
    }

    /**
     * CIERRA LA SESIÓN
     **/

    public function cerrarSesion( $request,  $response){

        Token::revocarToken($_SESSION['token']);
        session_unset();

        session_destroy();

        return $response ->withHeader('Location','inicio');
        exit();

    }

    /**
     * RECUPERA UN USUARIO DE LA BD
     **/
    public function obtenerUsuario($request,  $response){
        if(!Utilities::verificaToken($request,$response)){
            if(!Utilities::haveEmptyParameters(array('usuario'), $request, $response)){

                $request_data = $request->getParsedBody();
                $usr = $request_data['usuario'];


                $resp = ModeloUsuarios::obtenerUsuario($usr);

                $response -> write(json_encode($resp ->toArray2()));
                return $response ->withHeader('Content-type','application/json')
                    ->withStatus($resp ->getStatus());

            }else {
                return $response->withHeader('Content-type', 'application/json')
                    ->withStatus(400);
            }
        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(401);
        }

    }
}

