<?php
namespace App\controladores;
use App\modelo\ModeloCategorias;
class controladorCategorias{

    public function obtenerCategorias( $request,  $response){
       $cat= new ModeloCategorias() ;
        $respuesta = $cat-> obtenerCategorias();


           $response -> write(json_encode($respuesta ->toArray2()));
           return $response ->withHeader('Content-type','application/json')
                            ->withStatus($respuesta ->getStatus());


    }
}