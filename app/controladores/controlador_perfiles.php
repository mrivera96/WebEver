<?php
namespace App\controladores;
use App\modelo\ModeloPerfiles;
use App\controladores\Utilities;
class controladorPerfiles{


    public function listarPerfiles( $request,  $response){

            $request_data = $request->getParams();
            if(isset($request_data['ctg'])){
                $ctg = $request_data['ctg'];
            }else{
                $ctg=null;
            }


            $respuesta = ModeloPerfiles::listarPerfiles($ctg);


            $response -> write(json_encode($respuesta ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($respuesta ->getStatus());


    }

    public function obtenerPerfil( $request,  $response){
        if(!Utilities::haveEmptyParameters(array('cto'), $request, $response)){
            $request_data = $request->getParams();
            $cto = $request_data['cto'];
            $perf= new ModeloPerfiles() ;
            $respuesta = $perf-> getPerfilPorId($cto);


            $response -> write(json_encode($respuesta ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($respuesta ->getStatus());

        }else{
            return $response -> withHeader('Content-type','application/json')
                -> withStatus(400);
        }
    }

    public function buscar( $request,  $response){
        if(!Utilities::haveEmptyParameters(array('busqueda','categoria','region'), $request, $response)){
            $request_data = $request->getParams();
            $busqueda=$request_data['busqueda'];
            $categoria=$request_data['categoria'];
            $region=$request_data['region'];
            $perf= new ModeloPerfiles() ;
            $respuesta = $perf-> buscarPorFiltros($busqueda, $categoria, $region);

            $response -> write(json_encode($respuesta ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($respuesta ->getStatus());

        }else{
            return $response -> withHeader('Content-type','application/json')
                -> withStatus(400);
        }
    }


}