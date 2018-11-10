<?php
namespace App\controladores;
use App\modelo\Regiones;
use App\controladores\Utilities;
/******************************************************************************************
 *                              CONTROLADOR PARA REGIONES                                 *
 ******************************************************************************************/
class controladorRegiones{
    public function todasRegiones($request,  $response){
        if(!Utilities::verificaToken($request,$response)){
            $resp = Regiones::todasRegiones();

            $response -> write(json_encode($resp ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($resp ->getStatus());

        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(401);
        }
    }
}