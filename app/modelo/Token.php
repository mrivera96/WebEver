<?php
namespace App\modelo;

use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Illuminate\Database\Eloquent\Model;

class Token extends Model{
    protected $table='usuarios';
    public $timestamps = false;

    public static function getClave(){
        $key = hash('md5','@e%o$2&0!1/8');
       return $key;
    }
    //Verifica la existencia de un token
    public static function existeToken($tkn){
        $usr=new Token();

        $token=$usr->where('token','=',$tkn)->get()->count();
        if( $token > 0 ){
            if (self::vigenciaToken($tkn)){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }

    }

    //Hace la consulta, genera y devuelve el token
    public static function generarToken($usr){
        $user=new Token();


        $us_uname=$user->where('nombre_usuario','=',$usr)->get(['nombre_usuario'])->first();
        $us_id=$user->where('nombre_usuario','=',$usr)->get(['id_usuario'])->first()->id_usuario;
        $us_rol=$user->where('nombre_usuario','=',$usr)->get(['rol'])->first()->rol;
        $us_state=$user->where('nombre_usuario','=',$usr)->get(['estado_usuario'])->first()->estado_usuario;


        $time = time();

        $token = array(
                'iat' => $time,
                'exp' =>  $time + 259200,
                'nUsuario' => $us_uname,
                'idUsuario' => $us_id,
                'rolUsr' => $us_rol,
                'usrSts' => $us_state
            );

        $jwt = JWT::encode($token, self::getClave() );

        try{
            self::insertToken($jwt, $us_id);     //Llama al método que inserta el token
            return $jwt;
        }catch (Exception $e){
            return false;
        }


    }

    //Este metodo inserta el token en la base de datos
    private static function insertToken($jwt, $id){
        $user=new Token();

        $where=$user->where('id_usuario','=',$id);
        $update = array("token"=>$jwt);
        $where->update($update);

    }

    public static function revocarToken($tkn){
        $user=new Token();
        $clave = self::getClave();
        try{
            $data = JWT::decode($tkn,$clave,array('HS256'));
            $id = $data -> idUsuario;
            $user->where([['id_usuario','=',$id],['token','=',$tkn]])
                ->update(array('token'=>null));
        }catch(Exception $e){
            $e -> getMessage();
        }

    }

    private static function vigenciaToken($tkn){
        $clave =self::getClave();
        try{
          $data = \Firebase\JWT\JWT::decode($tkn,$clave, array('HS256'));

          if(date('m/d/Y', time()) > date('m/d/Y', $data -> exp)   ){
            return false;
          }else{
            return true;
          }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
