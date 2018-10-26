<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once '../modelo/modelo_categorias.php';
class controladorCategorias{

    public function obtenerCategorias(Request $request, Response $response){
       $cat= new ModeloCategorias() ;
        $respuesta = $cat-> obtenerCategorias();


           $response -> write(json_encode($respuesta ->toArray2()));
           return $response ->withHeader('Content-type','application/json')
                            ->withStatus($respuesta ->getStatus());


    }
}