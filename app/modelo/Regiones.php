<?php
namespace App\modelo;
use Illuminate\Database\Eloquent\Model;
use App\ApiResponse;
class Regiones extends Model{
    protected $table='regiones';

    static function todasRegiones(){
        $reg=new Regiones();
        try{
            $regiones=$reg::all();
            return new ApiResponse(200,"OK",$regiones);
        }catch (Exception $e){
            return new ApiResponse(500,"Error en la base de datos",null);
        }

    }
}