<?php

    include_once 'documento-inicio.inc.php';
    include_once 'barra-de-navegacion-navbar.inc.php';
    include_once 'buscador.inc.php';
?>

<head>
    <link href="css/estilos_alan.css" rel="stylesheet">
</head>


  <div id="encabezado_lista_contactos" class="container"><h4 id="nombreCategoria"><?php echo $_GET['name_cty'] ?></h4></div>


  <div class="container responsive" id="contenedor_perfiles">
    <div class="row" style="margin-top: 10px;" id="fila">


    </div>
  </div>


<?php
include_once 'documento-cierre.inc.php';
?>
<script> var cty=<?php echo $_GET['cty']?></script>
<script type="text/javascript" src="js/listaDeContactos.js"> </script>
