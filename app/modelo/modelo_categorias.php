<?php
namespace App\modelo;
use App\ApiResponse;
use Illuminate\Database\Eloquent\Model;

class ModeloCategorias extends Model {

    protected $table = 'view_categorias';

    static function obtenerCategorias(){
        try{
            $cats=self::all();
            return new ApiResponse(200, "OK",
                $cats
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