<?php
namespace App\controladores;
use App\modelo\Roles;
use App\controladores\Utilities;
/******************************************************************************************
 *                              CONTROLADOR PARA ROLES                                    *
 ******************************************************************************************/
class controladorRoles{
    public function todosRoles($request,  $response){
        if(!Utilities::verificaToken($request,$response)){
            $resp = Roles::todos();

            $response -> write(json_encode($resp ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($resp ->getStatus());

        }else {
            return $response->withHeader('Content-type', 'application/json')
                ->withStatus(401);
        }
    }
}