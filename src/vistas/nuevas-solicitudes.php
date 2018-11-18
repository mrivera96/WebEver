<?php
$titulo = "Nuevas Solicitudes";
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
?>

<head><link href="css/estilos_melvin.css" rel="stylesheet"></head>

<form name="formulario" type="hidden" role="form" id="formulario">
</form>

<div id="encabezado_contactos_activos" class="container">
  <div class="col-md-9 col-sm-9 col-xs-9">
    <h4 style="color: white"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Nuevas Solicitudes</h4>
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
    <div class="modal" id="Modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Gestión de Solicitud</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Solicitud aceptada</p>
          </div>
          <div class="modal-footer">
            <button type="button" id="aceptar" onclick="javascript:(function () {
              window.location.href = 'solicitudesNuevas';
            })()" class="btn btn-primary">Aceptar</button>

          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="Modal1" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Gestión de Solicitud</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Solicitud rechazada</p>
          </div>
          <div class="modal-footer">
            <button type="button" id="aceptar" onclick="javascript:(function () {
              window.location.href = 'solicitudesNuevas';})()" class="btn btn-primary">Aceptar</button>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


    <?php
    include_once 'documento-cierre.inc.php';
    ?>

    <script type="text/javascript" src="js/Errores.js"></script>
    <script type="text/javascript" src="js/modalerror.js"> </script>
    <script src="js/nuevasSolicitudes.js"></script>
