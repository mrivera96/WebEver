<?php  
    include_once '../plantillas/documento-inicio.inc.php';
    include_once '../plantillas/barra-de-navegacion-navbar.inc.php';
    include_once '../plantillas/buscador.inc.php';
?>
<script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script> 
<head><link href="../css/estilos_melvin.css" rel="stylesheet"></head>

  <div id="encabezado_lista_contactos" class="container"><h4 id="nombreCategoria"><?php echo $_GET['name_cty'] ?></h4></div>
  

  <div class="container responsive" id="contenedor_perfiles">
      <div class="row" style="margin-top: 10px;" id="fila">
         
             
      </div>                    
  </div>
  <script type="text/javascript" src="../js/listaDeContactos.js"> </script> 
<?php
    include_once '../plantillas/documento-cierre.inc.php';
?>