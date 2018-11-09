<?php
namespace App\modelo;
use Illuminate\Database\Eloquent\Model;
use App\ApiResponse;
class Perfiles extends Model{
    protected $table='contactos';

    static function crearPerfil($nomborg_rec,
                                $numtel_rec,
                                $numcel_rec,
                                $direccion_rec,
                                $email_rec,
                                $desc_rec,
                                $id_categoria,
                                $lat_rec,
                                $longitud_rec,
                                $id_region,
                                $id_usuario,
                                $imagen,
                                $ste,
                                $path){

        $perf=new Perfiles();
        if($path!=null){

            $insert=array('nombre_organizacion'=>$nomborg_rec,
                'numero_fijo'=>$numtel_rec,
                'numero_movil'=>$numcel_rec,
                'direccion'=>$direccion_rec,
                'descripcion_organizacion'=>$desc_rec,
                'e_mail'=>$email_rec,
                'id_categoria'=>$id_categoria,
                'latitud'=>$lat_rec,
                'longitud'=>$longitud_rec,
                'id_region'=>$id_region,
                'id_usuario'=>$id_usuario,
                'id_estado'=>$ste,
                'imagen'=>$path);

            try{
                $perf->insert($insert);
                return new ApiResponse(
                    200,
                    "Perfil creado correctamente.",
                    null
                );
            } catch (Exception $e){
                return new ApiResponse(
                    500,
                    "Error en la base de datos.",
                    null
                );
            }
        }else{
            $insert=array('nombre_organizacion'=>$nomborg_rec,
                'numero_fijo'=>$numtel_rec,
                'numero_movil'=>$numcel_rec,
                'direccion'=>$direccion_rec,
                'descripcion_organizacion'=>$desc_rec,
                'e_mail'=>$email_rec,
                'id_categoria'=>$id_categoria,
                'latitud'=>$lat_rec,
                'longitud'=>$longitud_rec,
                'id_region'=>$id_region,
                'id_usuario'=>$id_usuario,
                'id_estado'=>$ste);

            try{
                $perf->insert($insert);
                return new ApiResponse(
                    200,
                    "Perfil creado correctamente.",
                    null
                );
            } catch (Exception $e){
                return new ApiResponse(
                    500,
                    "Error en la base de datos.",
                    null
                );
            }
        }
    }





    static function eliminarPerfil(){

    }
    static function actualizarPerfil(){

    }
}