<?php
$titulo = "Perfiles Eliminados";
session_start();
include_once '../plantillas/documento-inicio.inc.php';
if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
        ?>

        <head><link href="../css/estilos_melvin.css" rel="stylesheet"></head>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                    <a  href="../index.php"><img class="btn-card" src="../imagenes/aeo.png"   align="left" height="50"></a><!--Para ponerle una img ala pagina -->
                    <a class="navbar-brand" href="../index.php"><strong>Agenda Electrónica Oriental</strong></a> 
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="administracion-de-perfiles.php"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Administración de Perfiles activos</a></li>
                        <li><a href="nuevas-solicitudes.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Nuevas Solicitudes </a></li>
                        <li><a href="solicitudes-rechazadas.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Solicitudes rechazadas</a></li>
                    </ul>
                </div> 
            </div>   

        </nav>

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
        <script src="../js/jquery-2.2.4.min.js"></script>
        <script src="../js/perfilesEliminados.js"></script>   

        <?php
        include_once '../plantillas/documento-cierre.inc.php';
        ?>
        <?php
    } else {
        header('Location: /webaeo');
    }
} else {
    header('Location: /webaeo');
}
?>



