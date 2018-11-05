<?php
namespace App\modelo;
use App\ApiResponse;
use Illuminate\Database\Eloquent\Model;
class Roles extends Model{
    protected $table  = "roles";
    public static function todos(){
        try{
            $rol = new Roles();
            $roles = $rol::all();
            return new ApiResponse(
                200,
                "OK",
                $roles
            );
        }catch (Exception $e){
            return new ApiResponse(
                500,
                "Error en la base de datos",
                null
            );
        }
    }
}