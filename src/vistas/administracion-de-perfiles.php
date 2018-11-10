<?php

$titulo = "Administración de Perfiles";

include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';

?>
<head><link href="css/estilos_melvin.css" rel="stylesheet"></head>

<div id="encabezado_contactos_activos" class="container">
    <div class="col-md-9 col-sm-9 col-xs-9">

        <h4 style="color: white"><i class="glyphicon glyphicon-ok-circle" aria-hidden="true"></i> Perfiles Activos</h4>

    </div>
    <div class="col-md-3 col-sm-3 col-xs-3 ">

        <div class="inner-addon right-addon">
            <i class="glyphicon glyphicon-search"></i>
            <input type="search" class="form-control" id="search">
        </div>
    </div>
</div>

<div class="container" id="contenedor_perfiles">

    <div class="row" style="margin-top: 10px;" id="fila">


    </div>

    <a href="nuevoPerfilAdmin" class="float">
        <i class="glyphicon glyphicon-plus my-float"></i>
    </a>

</div>

<?php
include_once 'documento-cierre.inc.php';
?>
<script src="js/administracionPerfiles.js"></script>
