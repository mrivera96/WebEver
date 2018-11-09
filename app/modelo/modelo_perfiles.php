<?php
namespace App\modelo;
use Illuminate\Database\Eloquent\Model;
use App\ApiResponse;
class Perfiles extends Model{
    protected $table='contactos';
    public $timestamps = false;

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
        }
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

    static function eliminarPerfil($id_perf){
        $perf = new Perfiles();
        try{
            $perfil=$perf->where('id_contacto','=',$id_perf);
            $delete = array("id_estado"=>"4");
            $perfil->update($delete);
            return new ApiResponse(
                200,
                "Perfil eliminado correctamente.",
                null
            );

        }catch (Exception $e){
            return new ApiResponse(
                500,
                "error en la base de datos",
                null
            );
        }

    }
    static function actualizarPerfil($nomborg_rec,
                                     $numtel_rec,
                                     $numcel_rec,
                                     $direccion_rec,
                                     $email_rec,
                                     $desc_rec,
                                     $id_categoria,
                                     $lat_rec,
                                     $longitud_rec,
                                     $id_region,
                                     $path,
                                     $cto){
        $perf=new Perfiles();
        if($path!=null){

            $update=array('nombre_organizacion'=>$nomborg_rec,
                'numero_fijo'=>$numtel_rec,
                'numero_movil'=>$numcel_rec,
                'direccion'=>$direccion_rec,
                'descripcion_organizacion'=>$desc_rec,
                'e_mail'=>$email_rec,
                'id_categoria'=>$id_categoria,
                'latitud'=>$lat_rec,
                'longitud'=>$longitud_rec,
                'id_region'=>$id_region,
                'imagen'=>$path);
        }else{
            $update=array('nombre_organizacion'=>$nomborg_rec,
                'numero_fijo'=>$numtel_rec,
                'numero_movil'=>$numcel_rec,
                'direccion'=>$direccion_rec,
                'descripcion_organizacion'=>$desc_rec,
                'e_mail'=>$email_rec,
                'id_categoria'=>$id_categoria,
                'latitud'=>$lat_rec,
                'longitud'=>$longitud_rec,
                'id_region'=>$id_region
            );

        }
        try{
            $perf->where('id_contacto','=',$cto)->update($update);
            return new ApiResponse(
                200,
                "Perfil actualizado correctamente.",
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