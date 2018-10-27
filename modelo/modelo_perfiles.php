<?php
class ModeloPerfiles{
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

    public function listarPerfiles($categoria){

        $query ="SELECT c.nombre_organizacion,c.numero_movil, c.numero_fijo, c.imagen, c.id_contacto,  "
            . "r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and id_categoria=?";

        $resultado=$this->getCon()->prepare($query);
        $resultado -> bind_param("i",$categoria);
        $ejecuted=$resultado->execute();
        if($ejecuted){
            $resul=$resultado->get_result();

            while($row=$resul->fetch_assoc()){

                $flag[]=$row;
            }

            return new ApiResponse(
                200,
                "request ejecutada correctamente",
                $flag
            );
        }else{
            return new ApiResponse(
                500,
                "error en la base de datos",
                null
            );
        }
    }

    public function getPerfilPorId($id_contacto){
        $query = "SELECT * FROM contactos WHERE id_contacto=?";

        $resultado = $this->getCon()->prepare($query);
        $resultado->bind_param("i", $id_contacto);
        $ejecuted=$resultado->execute();

        if($ejecuted){
            $resul = $resultado->get_result();

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
                "error en la base de datos",
                null
            );
        }
    }

    public function buscarPorFiltros($busqueda, $categoria, $region){

        if ($region == 0) {

            if ($categoria == 0) {

                $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,c.numero_fijo,c.numero_movil,r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like CONCAT('%',?,'%') or id_estado=2 and c.numero_fijo like CONCAT('%',?,'%')or id_estado=2 and c.numero_movil like CONCAT('%',?,'%') ";//'%'||?||'%'
                $resultado=$this->getCon()->prepare($sql);
                $resultado->bind_param("sss",$busqueda,$busqueda,$busqueda);
                $ejecuted=$resultado->execute();

                if($ejecuted){
                    $resul = $resultado->get_result();

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
                        "error en la base de datos",
                        null
                    );
                }
            } else if ($categoria != 0) {

                $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto, c.numero_fijo,c.numero_movil, r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like CONCAT('%',?,'%') and id_categoria= ? or id_estado=2 and c.numero_fijo like  CONCAT('%',?,'%')  and id_categoria=? or id_estado=2 and c.numero_movil like  CONCAT('%',?,'%') and id_categoria=?";
                $resultado=$this->getCon()->prepare($sql);
                $resultado->bind_param("sisisi", $busqueda,$categoria, $busqueda,$categoria,$busqueda,$categoria);
                $ejecuted=$resultado->execute();


                if($ejecuted){
                    $resul = $resultado->get_result();

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
                        "error en la base de datos",
                        null
                    );
                }
            }
        } else if ($region != 0) {

            if ($categoria == 0) {

                $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,c.numero_fijo,c.numero_movil,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like CONCAT('%',?,'%') and c.id_region= ? or id_estado=2 and c.numero_fijo like  CONCAT('%',?,'%') and c.id_region= ? or id_estado=2 and c.numero_movil like  CONCAT('%',?,'%') and c.id_region= ?";

                $resultado=$this->getCon()->prepare($sql);
                $resultado->bind_param("sisisi",$busqueda,$region,$busqueda,$region,$busqueda,$region);
                $ejecuted=$resultado->execute();


                if($ejecuted){
                    $resul = $resultado->get_result();

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
                        "error en la base de datos",
                        null
                    );
                }
            } else if ($categoria != 0) {

                $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,c.numero_fijo,c.numero_movil,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like CONCAT('%',?,'%') and c.id_region=? and c.id_categoria=? or id_estado=2 and c.numero_fijo like CONCAT('%',?,'%') and c.id_region=? and c.id_categoria=? or id_estado=2 and c.numero_movil like CONCAT('%',?,'%') and c.id_region=? and c.id_categoria= ? ORDER BY c.nombre_organizacion";

                $resultado=$this->getCon()->prepare($sql);
                $resultado->bind_param("siisiisii",$busqueda,$region, $categoria,$busqueda,$region,$categoria,$busqueda,$region,$categoria);
                $ejecuted=$resultado->execute();


                if($ejecuted){
                    $resul = $resultado->get_result();

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
                        "error en la base de datos",
                        null
                    );
                }
            }
        }



    }


}