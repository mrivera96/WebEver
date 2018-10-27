<?php
use Firebase\JWT\JWT;
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

    public function crearUsuario($nombre_usuario, $nombre_propio, $correo, $contrasena, $rol){
        if($this->usuarioExiste($nombre_usuario)){
            $pass = password_hash($contrasena, PASSWORD_DEFAULT);


            $sql = "INSERT INTO usuarios(nombre_usuario,nombre_propio,correo,contrasena,rol,estado_usuario) VALUES(?,?,?,?,?,1)";

            $resultado=$this->getCon()->prepare($sql);
            $resultado->bind_param("ssssi",$nombre_usuario, $nombre_propio, $correo, $pass, $rol);
            $ejecuted=$resultado->execute();
            $this->getObjetoConexion()->cerrarConexion();

            if($ejecuted){

                return new ApiResponse(
                    200,
                    "Usuario creado correctamente.",
                    null
                );
            }else{
                return new ApiResponse(
                    500,
                    "error en la base de datos",
                    null
                );
            }
            ;
        }else{
            return new ApiResponse(
                400,
                "el usuario ya existe",
                null
            );
        }
    }

    public function usuarioExiste($user){

        $query="SELECT nombre_usuario from usuarios where nombre_usuario=?";
        $prepared = $this -> getCon() -> prepare($query);
        $prepared -> bind_param("s",$user);
        $prepared -> execute();
        $result=$prepared -> get_result();


        if(mysqli_num_rows($result) > 0){
            return false;
        }else{
            return true;
        }
    }

    public function eliminarUsuario($id_usua){
        $update="update usuarios SET estado_usuario=2 where id_usuario=?";


        $resultado_update = $this->getCon()->prepare($update);
        $resultado_update->bind_param("i", $id_usua);

        if($resultado_update->execute()){
            return new ApiResponse(
                200,
                "Usuario eliminado correctamente.",
                null
            );
        }else{
            return new ApiResponse(
                500,
                "error en la base de datos",
                null
            );
        }

    }
    public function loginUsuario($usuario, $contrasena){
        if(!$this->usuarioExiste($usuario)){
            $query = "SELECT * FROM usuarios WHERE nombre_usuario = ? ";
            $resultado = $this->getCon()->prepare($query);
            $resultado->bind_param("s", $usuario);
            if($resultado->execute()){
                $results=$resultado->get_result();


                while($row=$results->fetch_assoc()){
                    $result['usuario']=$row['nombre_usuario'];
                    $result['contrasena']=$row['contrasena'];
                    $result['idUsuario']=$row['id_usuario'];
                    $result['rolUrs']=$row['rol'];
                    $result['usrSts']=$row['estado_usuario'];
                    $flag[]=$result;
                }
                if(mysqli_num_rows($results)>0 && password_verify($contrasena,$flag[0]['contrasena']) ){
                    $tokenobj = new Token();
                    $token=$tokenobj -> generarToken( $usuario);
                    $data = JWT::decode($token, Token::getKey(), array('HS256'));
                    return
                        new ApiResponse(
                        200,
                        "usuario autenticado con éxito",
                            array('token' => $token, 'rol' => $data -> rolUsr, 'idUrs' => $data -> idUsuario, 'ste' => $data -> usrSts)
                    );
                }else{
                     return new ApiResponse(
                        400,
                        "credenciales incorrectas",
                        null
                    );
                }
            }else{
                return new ApiResponse(
                    500,
                    "error en la base de datos",
                    null
                );
            }

        }else{
            return new ApiResponse(
                400,
                "el usuario no existe",
                null
            );
        }


    }

    public function actualizarUsuario($id_usua, $nombre_usua, $nombre_pro, $corr){

        $query_search = "update usuarios SET nombre_usuario=?,nombre_propio=?,correo=? where id_usuario=? and estado_usuario=1";

        $resultado = $this->getCon()->prepare($query_search);
        $resultado->bind_param("sssi", $nombre_usua, $nombre_pro, $corr,  $id_usua);


        if($resultado->execute()){

            return new ApiResponse(
                    200,
                    "Usuario actualizado correctamente.",
                    null
                );
        }else{
                return new ApiResponse(
                    500,
                    "error en la base de datos",
                    null
                );
        }
        $this->getObjetoConexion()->cerrarConexion();
    }

}