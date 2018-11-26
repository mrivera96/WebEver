<?php
$titulo = 'Contactos Aprobados';
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
?>

        <head>
            <link href="css/estiloslogin.css" rel="stylesheet">
            <link href="css/estilos_melvin.css" rel="stylesheet">
        </head>




        <div id="encabezado_contactos_activos" class="container">
          <div class="col-md-9 col-sm-9 col-xs-9">
            <h4  style="color: white "><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Lista de Contactos Aprobados</h4>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-3 ">

            <div class="inner-addon right-addon">
              <i class="glyphicon glyphicon-search"></i>
              <input type="search" class="form-control" id="search">
            </div>
          </div>
        </div>

        <div class="container" id="contenedor_perfiles">
            <div class="row" style="margin-top: 10px;" id="contenedorContacto">

            </div>


        </div>



        <?php
        include_once 'documento-cierre.inc.php';
            ?>
            <script type="text/javascript">
                var id_logueado=<?php echo $_SESSION['idUrs']; ?>;
                </script>
                <script type="text/javascript" src="js/Errores.js"></script>
                <script type="text/javascript" src="js/coctactosusuarioaprovados.js"></script>
