<?php
$titulo = 'Contactos';
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
?>

<link href="css/estiloslogin.css" rel="stylesheet">
<link href="css/estilos_melvin.css" rel="stylesheet">

<div class="container" id="">
  <div class="row" style="margin-top: 10px;" id="contedidodecategoriascontacto">
    <div class="row">
      <div class="col-sm-6 col-md-6">
        <div class="panel panel-default">
          <div  class="panel-heading" style="height: 40px">
            <h3 class="panel-title">
              <center>Contactos Pendientes<br><br></center>
              <br>
              <br>
            </h3>
          </div>
          <div class="coll">
            <center>
              <img src="imagenes/pendiente.png" height="200px" class="img-fluid imagenAcercadeWeb " alt="Imagen no Disponible" title="Imagen Agenda Electronica Digital" >
            </center>
          </div>
          <div class="panel-body">
            <center>
              <p ><a href="contactosPendientesCliente" class="btn btn-primary">Ver Contactos Pendientes</a></p>
            </center>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-6">
        <div class="panel panel-default">
          <div  class="panel-heading" style="height: 40px">
            <h3 class="panel-title">
              <center>Contactos Aprobados<br><br></center>
              <br>
              <br>
            </h3>
          </div>
          <div class="coll">
            <center>
              <img class="card-img-top" height="200px" src="imagenes/aprovados.png" alt="Imagen no Disponible">
            </center>
          </div>
          <div class="panel-body">
            <center>
              <p ><a href="contactosAprobadosCliente" class="btn btn-primary">Ver Contactos Aprobados</a>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <a  id="float" href="./nuevoPerfilCliente">
    <i class="glyphicon glyphicon-plus my-float"></i>
  </a>
  <?php
  include_once 'documento-cierre.inc.php';
  ?>
  <script type="text/javascript" src="js/Errores.js"></script>
