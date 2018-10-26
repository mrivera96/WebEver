<?php
require_once '../config/ConexionABaseDeDatos.php';
require_once '../config/ApiResponse.php';

class ModeloCategorias{
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
    public function getObjetoConexion(){
        return $this->objeto_conexion;
    }

    public function obtenerCategorias(){

        $query ="SELECT A.* ,COUNT(C.id_estado) as coun FROM categorias AS A JOIN contactos AS C ON A.id_categoria=C.id_categoria WHERE C.id_estado= 2 GROUP BY A.id_categoria";

        $resultado = $this->getCon()->prepare($query);
        $ejecuted=$resultado->execute();

        if($ejecuted){
            $resul = $resultado->get_result();

            $this->getObjetoConexion()->cerrarConexion();

            while ($row = $resul->fetch_assoc()) {

                $flag[] = $row;
            }

            return new ApiResponse(
                200,
                "request ejecutada correctamente",
                $flag
            );

        }else{
            return new ApiResponse(
                500,
                "error en la base de datos"
            );
        }



    }


}