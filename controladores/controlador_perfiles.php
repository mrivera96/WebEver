<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once '../modelo/modelo_view_perfiles.php';
class controladorPerfiles{
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

    public function listarPerfiles(Request $request, Response $response){

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

    public function obtenerPerfil(Request $request, Response $response){
        if(!$this->haveEmptyParameters(array('cto'), $request, $response)){
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

    public function buscar(Request $request, Response $response){
        if(!$this->haveEmptyParameters(array('busqueda','categoria','region'), $request, $response)){
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