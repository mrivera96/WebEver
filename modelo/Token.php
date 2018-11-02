<?php
require_once '../php-jwt-master/src/JWT.php';
require_once '../php-jwt-master/src/BeforeValidException.php';
require_once '../php-jwt-master/src/ExpiredException.php';
require_once '../php-jwt-master/src/SignatureInvalidException.php';

use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Model;

class Token extends Model{
    protected $table='usuarios';
    public $timestamps = false;

    public static function getClave(){
        $key = "@e%o$2&0!1/8";
       return $key;
    }
    //Verifica la existencia de un token
    public static function existeToken($tkn){
        $usr=new Token();

        $token=$usr->where('token','=',$tkn)->get()->count();
        if( $token > 0 ){
            return true;
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

    public function revocarToken($tkn){

        $clave = self::getClave();
        try{
            $data = JWT::decode( $tkn, $clave, array('HS256') );
            $id = $data -> idUsuario;
            $updToken = "UPDATE usuarios SET token = '' WHERE id_usuario = ? AND token = ?";
            $stm = $this->getCon() -> prepare($updToken);
            $stm -> bind_param("is", $id, $tkn );
            $stm -> execute();
            $this->objeto_conexion -> cerrarConexion();

        }catch(Exception $e){
            $e -> getMessage();
        }

    }

    public static function vigenciaToken($tkn){
        try{
          $data = JWT::decode( $tkn, self::getKey(), array('HS256') );

          if(date('m/d/Y',time()) > date('m/d/Y', $data -> exp)   ){
            return false;
          }else{
            return true;
          }
        }catch(Exception $e){

        }
    }
}
