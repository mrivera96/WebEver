<?php
$titulo = 'Usuarios';
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
?>

    <link href="css/estilos_alan.css" rel="stylesheet">
    <link href="css/estiloslogin.css" rel="stylesheet">


    <div  id="contenedor_usuarios"class="container" >
        <div class="row"  id="fila"  >

            <div class="panel panel-default">
                <div id="diseñobuscarusuario" class="panel-heading" >
                    <div class="col-md-9 col-xs-9 col-sm-9">
                        <h3 style="color: white;"class="panel-title">
                            <strong> <span id="diseñotituloUsuario" class="glyphicon glyphicon-user"></span>  Usuarios </strong>
                        </h3>
                    </div>

                    <div class="col-md-3 col-xs-3 col-sm-3 inner-addon right-addon">
                        <div class= "form-group  panel-title">
                            <input class="form-control" id="busqueda" type="search" name="busqueda"  required="">
                            <span class="glyphicon glyphicon-search"></span>

                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

    <a  href="nuevoUsuario" class="float">
        <i class="glyphicon glyphicon-plus my-float"></i>
    </a>

<?php
include_once 'documento-cierre.inc.php';
?>
<script type="text/javascript" src="js/Errores.js"></script>
<script type="text/javascript" src="js/mostrar_usuarios.js"></script>

