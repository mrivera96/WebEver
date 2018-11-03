<?php session_start(); ?>

<!Documento de inicio>
<html  lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if (!isset($titulo) || empty($titulo)) {
        $titulo = 'Agenda Electroníca Oriental';
    }
    echo "<title>$titulo</title>";
    ?>
    <title>Agenda Electrónica Oriental</title>

    <link rel="shortcut icon" href="imagenes/aeo.ico" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <script src="js/jquery-2.2.4.min.js" ></script>
    <link href="css/estilos_alan.css" rel="stylesheet">
</head>
<body>
<!fin documento inicio>

<!Barra de navegacion Navbar>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  href="index.php"><img class="btn-card" src="imagenes/aeo.png"   align="left" height="50"></a><!--Para ponerle una img ala pagina -->
            <a class="navbar-brand" href="index.php"><strong>Agenda Electrónica Oriental</strong></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php

                if(isset($_SESSION['token']) && !empty($_SESSION['token'])){
                    if(isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol']==2){
                        ?>


                        <li id="boton" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                            <ul id="despliege"class="dropdown-menu" role="menu">
                                <li> <a id = "colorIniciosecion" href = "Vistas/login.php"><img src="imagenes/config.png" height="15"></img> <strong>Panel de Control </strong></a></li>
                                <li><a href="Vistas/editarUsuarioNormal.php"><img src="imagenes/administracioncuenta.jpg" height="15"></img> <strong>Edición de Cuenta</strong></a></li>
                            </ul>
                        </li>
                        <li> <a id="colorIniciosecion" href="config/cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong>Cerrar Sesión</strong></a></li>

                        <?php
                    } else {
                        ?><li id="boton" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                            <ul id="despliege"class="dropdown-menu" role="menu">
                                <li><a href="Vistas/mostrar_usuarios.php"><img src="imagenes/administracioncuenta.jpg" height="15"></img> <strong>Administración de Cuenta</strong></a></li>
                                <li><a href="Vistas/administracion-de-perfiles.php"><img src="imagenes/administracionperfil.jpg" height="15"></img> <strong>Administración de Perfil</strong></a></li>
                            </ul>
                        </li>
                        <li> <a id="colorIniciosecion" href="config/cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong>Cerrar Sesión</strong></a></li>
                        <?php
                        $message = 'Usuario o Contraseña incorrectas desde la sesion';
                    }
                    ?>

                    <?php
                } else {
                    ?>
                    <li> <a id = "colorIniciosecion" href = "Vistas/login.php"><span class = "glyphicon glyphicon-log-in" aria-hidden = "true"></span> <strong>Iniciar Sesión</strong></a></li>
                    <li> <a id = "colorIniciosecion" href = "Vistas/registrarCuentaUsuario.php"><span class = "glyphicon glyphicon-plus" aria-hidden = "true"></span> <strong>Registrarse</strong></a></li>
                    <?php
                }
                ?>   <!--va iniciar secion o registrarce -->
            </ul>
        </div>
    </div>

</nav>
<!Fin de navbar>

<!Inicio del buscador >
<div class="container" style="padding-top: 3px;padding-bottom: 3px;">
    <div class="form-group">
        <form role="form" method="get" action="Vistas/resultado_busqueda.php">
            <div class="row">
                <div id="diseñobuscarusuario" class="panel-heading">
                    <div class="col-md-6 col-xs-6 col-sm-6 inner-addon right-addon">
                        <div class="input-group">
                <span class="input-group-btn">
                  <button id="separador"  type="submit"  style=" color: black; background:#F2F2F2" class="btn btn-light form-control "><strong><span class="glyphicon glyphicon-search" style="padding: 1px ; width: 2px"></span></strong></button>
                </span>
                            <input id="busqueda" type="text" class="form-control" name="busqueda"  placeholder="Contacto a buscar"
                                   required oninvalid="setCustomValidity('Ingrese la busqueda.')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-3 col-sm-3 inner-addon right-addon">
                        <select class="form-control" name="categoria">
                            <option value="0">Todas las Categorías</option>
                            <option value="1" >Emergencia</option>
                            <option value="2" >Educación</option>
                            <option value="3">Centros Asistenciales</option>
                            <option value="4">Bancos</option>
                            <option value="5" >Hostelería y turismo</option>
                            <option value="6" >Instituciones Públicas</option>
                            <option value="7">Comercio de Bienes</option>
                            <option value="8" >Comercio de Servicios</option>
                            <option value="9">Bienes y Raíces</option>
                            <option value="10">Asesoría Legal</option>
                            <option value="11">Funeraria</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-xs-3 col-sm-3 inner-addon right-addon">
                        <select class="form-control" name="region">
                            <option value="0" >Todas las Regiones</option>
                            <option value="4" >El Paraíso</option>
                            <option value="3">Danlí</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!fin del buscador>

<div id="estilo-contenedor-textocategoria"class="container">
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
</div>


<!--Contenedor de tarjetas-->

<div     id="estilo-contenedor" class="container"  >
    <div class="row" style="margin-top: 10px;" id="fila">
        <script>
            $(document).on("ready", function () {
                loadData();
            });

            var loadData = function () {
                $.ajax({
                    type: "GET",
                    url: "categorias",
                    statusCode:{
                        200: function(data){
                            var array = data.content;
                            for (var i in array) {
                                $("#fila").append('<div class = "col-sm-6 col-md-4">' +
                                    '<a href="Vistas/listaDeContactos.php?cty=' + array[i].id_categoria + '&&name_cty=' + array[i].nombre_categoria + '"><div id="panel_default" class="panel panel-default">' +
                                    '<div  class="panel-heading" >' +
                                    '<span aria-hidden="true"></span> <strong>' + array[i].nombre_categoria + '</strong>' +
                                    '<h6>' + array[i].coun + ' Contactos</h6>' +
                                    '</div> ' +
                                    '<img class="img-responsive" alt="Responsive image" style="width:100%"  id="tamaño" src=' + array[i].imagen_categoria + '>' +
                                    '</div></a>' +
                                    '</div>'
                                );
                            }
                        },
                        500: function(data){
                            alert(data.message);
                        }


                    }

                });

            };


        </script>

    </div>
</div>
<!Inicio de documento de cierre>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<br>
<br>

<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom" id="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left ">
            <div  class="col-xs-6 col-sm-6 col-md-4" >
                <a  href="Vistas/acercadeweb.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <strong class="opcion coloremail">Acerca de Desarrolladores</strong></a>
            </div>

            <div  class="col-xs-6 col-sm-6 col-md-4" >
                <a  href="#"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> <strong class="opcion coloremail">Descarga la App</strong></a>

                <ul class="list-unstyled quick-links">

                    <div class="principal"
            </div>

            <!--LIK DE DESCARGA DE LA APP-->
            </ul>
        </div>
        <div  class="col-xs-6 col-sm-6 col-md-4" >
            <span  class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <strong id="coloayuda">Ayuda y Contacto</strong></a>

            <ul class="list-unstyled quick-links">
                <a  href="#"><span  aria-hidden="true"></span> <strong class="opcion coloremail"><small>aeodanli@gmail.com</small></strong></a>


            </ul>
        </div>
    </div>
</div>
</div>
</body>
</html>
<!fin de documento de cierre>
