<?php
$titulo = "Perfiles Eliminados";
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
?>

<head><link href="css/estilos_melvin.css" rel="stylesheet"></head>

<div id="encabezado_contactos_activos" class="container">
  <div class="col-md-9 col-sm-9 col-xs-9">
    <h4 style="color: white"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Perfiles Eliminados</h4>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-3 ">

    <div class="inner-addon right-addon">
      <i class="glyphicon glyphicon-search"></i>
      <input type="search" class="form-control" id="search">
    </div>
  </div>
</div>


<div class="container responsive" id="contenedor_perfiles">
  <div class="row" style="margin-top: 10px;" id="fila">


  </div>
</div>

<?php
include_once 'documento-cierre.inc.php';
?>
<script type="text/javascript" src="js/Errores.js"></script>
<script src="js/perfilesEliminados.js"></script>
