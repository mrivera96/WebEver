<?php
namespace App\modelo;
use Illuminate\Database\Eloquent\Model;
use App\ApiResponse;
class ModeloPerfiles extends Model{
    protected $table='view_perfiles';

    public static function listarPerfiles($categoria, $estado){
        if(isset($categoria) && !empty($categoria) && $categoria!=null){
            try{
                $perfs=new ModeloPerfiles();

                $filtrada= $perfs->where([["id_categoria","=",$categoria],['id_estado','=',2]])
                    ->get();
                return new ApiResponse(200, "OK",
                    $filtrada
                );
            }catch (Exception $e){
                return new ApiResponse(
                    500,
                    "error en la base de datos",
                    null
                );
            }

        }else {
            try{
                $perfs=new ModeloPerfiles();
                $perfiles = $perfs->where('id_estado','=',$estado)->get();
                return new ApiResponse(200, "OK",
                    $perfiles
                );
            }catch (Exception $e){
                return new ApiResponse(
                    500,
                    "error en la base de datos",
                    null
                );
            }
        }

    }



    public static function getPerfilPorId($id_contacto){

        try{
            $perfs = new ModeloPerfiles();

            $perfiles=$perfs::where(["id_contacto","=",$id_contacto],['id_estado','=',2])
            ->get();

            return new ApiResponse(
                200,
                "OK",
                $perfiles
            );
        }catch (Exception $e){
            return new ApiResponse(
                500,
                "error en la base de datos",
                null
            );
        }
    }



    public function buscarPorFiltros($busqueda, $categoria, $region){

        if ($region == 0) {

            if ($categoria == 0) {

                try{
                    $perfs=new ModeloPerfiles();
                       $perfiles=$perfs::where('nombre_organizacion','like',"%{$busqueda}%")
                           ->orWhere('numero_fijo','like',"%{$busqueda}%")
                           ->orWhere('numero_movil','like',"%{$busqueda}%")
                           ->get();
                    return new ApiResponse(
                        200,
                        "request ejecutada correctamente",
                        $perfiles
                    );
                }catch (Exception $e){
                    return new ApiResponse(
                        500,
                        "error en la base de datos",
                        null
                    );
                }


            } else if ($categoria != 0) {

                try{
                    $perfs=new ModeloPerfiles();
                    $perfiles=$perfs::where([['nombre_organizacion','like',"%{$busqueda}%"],['id_categoria','=',$categoria]])
                        ->orWhere([['numero_fijo','like',"%{$busqueda}%"],['id_categoria','=',$categoria]])
                        ->orWhere([['numero_movil','like',"%{$busqueda}%"],['id_categoria','=',$categoria]])
                        ->get();
                    return new ApiResponse(
                        200,
                        "request ejecutada correctamente",
                        $perfiles
                    );
                }catch (Exception $e){
                    return new ApiResponse(
                        500,
                        "error en la base de datos",
                        null
                    );
                }


            }
        } else if ($region != 0) {

            if ($categoria == 0) {
                try{
                    $perfs=new ModeloPerfiles();
                    $perfiles=$perfs::where([['nombre_organizacion','like',"%{$busqueda}%"],['id_region','=',$region]])
                        ->orWhere([['numero_fijo','like',"%{$busqueda}%"],['id_region','=',$region]])
                        ->orWhere([['numero_movil','like',"%{$busqueda}%"],['id_region','=',$region]])
                        ->get();
                    return new ApiResponse(
                        200,
                        "request ejecutada correctamente",
                        $perfiles
                    );
                }catch (Exception $e){
                    return new ApiResponse(
                        500,
                        "error en la base de datos",
                        null
                    );
                }


            } else if ($categoria != 0) {
                try{
                    $perfs=new ModeloPerfiles();
                    $perfiles=$perfs::where([['nombre_organizacion','like',"%{$busqueda}%"], ['id_region','=',$region], ['id_categoria','=',$categoria]])
                        ->orWhere([['numero_fijo','like',"%{$busqueda}%"],['id_region','=',$region], ['id_categoria','=',$categoria]])
                        ->orWhere([['numero_movil','like',"%{$busqueda}%"],['id_region','=',$region], ['id_categoria','=',$categoria]])
                        ->get();
                    return new ApiResponse(
                        200,
                        "request ejecutada correctamente",
                        $perfiles
                    );
                }catch (Exception $e){
                    return new ApiResponse(
                        500,
                        "error en la base de datos",
                        null
                    );
                }

            }
        }
    }

}