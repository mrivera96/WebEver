<?php
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
include_once 'buscador.inc.php';
?>

<link href="css/estilos_alan.css" rel="stylesheet">

<div id="estilo-contenedor-textocategoria"class="container">
  <form name="formulario" type="hidden" role="form" id="formulario">

    <div class="row"  id="fila"  >
      <div class="panel panel-default">
        <div class="panel-heading" style="height: 40px">
          <div class="coll">
            <h3 class="panel-title">
              <center><strong>Categorías</strong></center>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>


<!--Contenedor de tarjetas-->

<div     id="estilo-contenedor" class="container"  >
  <div class="row" style="margin-top: 10px;" id="fila">


  </div>
</div>
<?php include_once 'documento-cierre.inc.php';?>
<script type="text/javascript" src="js/Errores.js"></script>
<script type="text/javascript" src="js/modalerror.js"> </script>
<script src="js/inicio.js"></script>
