<?php
namespace App\controladores;
use App\modelo\Token;
use App\ApiResponse;
use Slim\Http\Response as Response;
use Slim\Http\Request as Request;
/******************************************************************************************
 *                              UTILIDADES PARA LA API                                    *
 ******************************************************************************************/
class Utilities{
    /**
     * VERIFICA SI EL REQUEST TIENE PARÁMETROS VACÍOS O HACEN FALTA
     **/
    static function haveEmptyParameters($params,$request,$response){
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
                null);
            $response -> write(json_encode($err->toArray()));

        }

        return $error;
    }
    /**
     * VERIFICA SI EL REQUEST TIENE HEADER VACÍOS O HACEN FALTA
     **/
     static function verificaToken(Request $request,Response $response){
        $error = false;


        if(isset($_SESSION['token']) && !empty($_SESSION['token'])){

            $tokenAuth =$_SESSION['token'];
            if (Token::existeToken($tokenAuth) ){

            }else{
                $error=true;
            }

        }else if($request->hasHeader('Authorization')){
            $tokenAuth =$request->getHeader('Authorization')[0];
            if (Token::existeToken($tokenAuth) ){

            }else{
                $error=true;
            }
        }else{
            $error=true;
        }

        if($error){
            $err= new ApiResponse(401,
                "Token de autenticación inválido o expirado.",
                null);
            $response -> write(json_encode($err->toArray()));

        }

        return $error;
    }
}