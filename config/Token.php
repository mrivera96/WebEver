<?php
require_once '../php-jwt-master/src/JWT.php';
require_once '../php-jwt-master/src/BeforeValidException.php';
require_once '../php-jwt-master/src/ExpiredException.php';
require_once '../php-jwt-master/src/SignatureInvalidException.php';
require_once 'ConexionABaseDeDatos.php';


use Firebase\JWT\JWT;

class Token{
    private $con;
    private $objeto_conexion;

    public  function  __construct(){
        $this -> objeto_conexion = new ConexionBD();
        $this->con = $this -> objeto_conexion ->getConexion();
    }

    /**
     * @return mysqli
     */
    public function getCon(){
        return $this->con;
    }

    /**
     * @return ConexionBD
     */
    public function getObjetoConexion()
    {
        return $this->objeto_conexion;
    }


    public static function getKey(){
        $key = "@e%o$2&0!1/8";
       return $key;
    }
    //Verifica la existencia de un token
    public function existeToken($tkn){
        $existeTkn = "SELECT * FROM usuarios WHERE token = ?";
        $stm = $this->getCon() -> prepare($existeTkn);
        $stm -> bind_param("s",  $tkn);
        $stm -> execute();
        $results = $stm->get_result();
        $this->objeto_conexion -> cerrarConexion();
        if( mysqli_num_rows($results) > 0 ){
          return true;
        }else{
          return false;
        }

    }

    //Hace la consulta, genera y devuelve el token
    public function generarToken($usr){
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
        $resultado = $this->getCon() -> prepare($query);
        $resultado -> bind_param("s", $usr);
        $resultado -> execute();
        $results = $resultado->get_result();
        $this->objeto_conexion -> cerrarConexion();

        while($row=$results->fetch_assoc()){
            
            $result['nUsr']=$row['nombre_usuario'];
            $result['idUsr']=$row['id_usuario'];
            $result['rolUsr']=$row['rol'];
            $result['estUsr']=$row['estado_usuario'];

	    $flag['datos'][]=$result;
        }

        $time = time();

        $token = array(
                'iat' => $time,
                'exp' =>  $time + 259200,
                'nUsuario' => $flag['datos'][0]['nUsr'],
                'idUsuario' => $flag['datos'][0]['idUsr'],
                'rolUsr' => $flag['datos'][0]['rolUsr'],
                'usrSts' => $flag['datos'][0]['estUsr']
            );

        $jwt = JWT::encode($token, self::getKey() );


         $this->insertToken($jwt, $flag['datos'][0]['idUsr']);     //Llama al método que inserta el token
        return $jwt;

    }

    //Este metodo inserta el token en la base de datos
    private function insertToken($jwt, $id){
        $updToken = "UPDATE usuarios SET token = ? where id_usuario = ?";
        $stm = $this->getCon() -> prepare($updToken);
        $stm -> bind_param("si", $jwt , $id);
        $stm -> execute();
        $this->objeto_conexion -> cerrarConexion();
    }

    public function revocarToken($tkn){

        $clave = self::getKey();
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
