<?php
use Illuminate\Database\Eloquent\Model;
class ViewUsuarios extends Model{
    protected $table='view_usuarios';

    public static function todos(){
        try{
            $usr = new ViewUsuarios();
            $usuarios = $usr::all();
            return new ApiResponse(
                200,
                "OK",
                $usuarios
            );
        }catch (Exception $e){
            return new ApiResponse(
                500,
                $e->getMessage(),
                null
            );
        }
    }
}