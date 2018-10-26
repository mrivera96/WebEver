<?php
require_once '../config/ConexionABaseDeDatos.php';
class ModeloUsuarios{
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

    public function crearUsuario($nombre_usuario, $nombre_propio, $correo, $contrasena, $rol, $imagen){
        if($this->usuarioExiste($nombre_usuario)){
            $pass = password_hash($contrasena, PASSWORD_DEFAULT);


            $insert =
                "INSERT INTO usuarios(nombre_usuario,nombre_propio,correo,contrasena,rol,estado_usuario, imagen)
              VALUES(?,?,?,?,?,1)";

            $resultado_insert = $this->getCon()->prepare($insert);
            $resultado_insert->bind_param("ssssi",$nombre_usuario, $nombre_propio, $correo, $pass, $rol);
            $resultado_insert->execute();
            $this->getObjetoConexion()->cerrarConexion();


            print json_encode("Usuario creado correctamente.");
        }
    }

    public function usuarioExiste($user){

        $query="SELECT nombre_usuario from usuarios where nombre_usuario=?";
        $prepared = $this -> getCon() -> prepare($query);
        $prepared -> bind_param("s",$user);
        $prepared -> execute();
        $result=$prepared -> get_result();
        $this->getObjetoConexion()->cerrarConexion();

        if(mysqli_num_rows($result) > 0){
            return false;
        }else{
            return true;
        }
    }
}