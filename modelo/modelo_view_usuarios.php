<?php
use Illuminate\Database\Eloquent\Model;
class ViewUsuarios extends Model{
    protected $table='view_usuarios';

    public static function todos(){
        try{
            $usr = new ModeloUsuarios();
            $usuarios = $usr ->where('estado_usuario','=',1)->get();
            return new ApiResponse(
                200,
                "OK",
                $usuarios
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