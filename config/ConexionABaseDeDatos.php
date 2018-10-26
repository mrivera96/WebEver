<?php
require_once 'credenciales_bd.php';
class ConexionBD{
    private $con;

    public function __construct(){
        $this->con = new mysqli(HOST,USER,PASSWORD,DATABASE);
        mysqli_set_charset($this->con,"utf8");
    }

    /**
     * @return mysqli
     */
    public function getConexion()
    {
        return $this->con;
    }

    public function cerrarConexion(){
        $this->con->close();
    }

}
 

?>