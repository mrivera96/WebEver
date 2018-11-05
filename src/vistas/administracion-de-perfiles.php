<?php

$titulo = "Administración de Perfiles";

include_once 'documento-inicio.inc.php';

?>


<head><link href="css/estilos_melvin.css" rel="stylesheet"></head>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  href="inicio"><img class="btn-card" src="imagenes/aeo.png"   align="left" height="50"></a><!--Para ponerle una img ala pagina -->
            <a class="navbar-brand" href="../index.php"><strong>Agenda Electrónica Oriental</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">

                <li><a href="nuevas-solicitudes.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Nuevas Solicitudes</a></li>
                <li><a href="solicitudes-rechazadas.php"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Solicitudes Rechazadas</a></li>
                <li><a href="perfiles-eliminados.php"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Perfiles Eliminados</a></li>
                <li id="boton" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                    <ul id="despliege" class="dropdown-menu" role="menu">
                        <li><a href="usuarios"><img src="imagenes/administracioncuenta.jpg" height="15"> <strong>Administración de Cuenta</strong></a></li>
                        <li><a href="administrarPerfiles"><img src="imagenes/administracionperfil.jpg" height="15"> <strong>Administración de Perfiles</strong></a></li>
                    </ul>
                </li>
                <li> <a id="colorIniciosecion" href="cerrarSesion"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a></li>
            </ul>
        </div>
    </div>

</nav>
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

    <a href="nuevo-perfil.php" class="float">
        <i class="glyphicon glyphicon-plus my-float"></i>
    </a>

</div>

<script src="js/administracionPerfiles.js"></script>



<?php
include_once 'documento-cierre.inc.php';
?>
