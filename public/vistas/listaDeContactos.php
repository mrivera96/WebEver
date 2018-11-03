<!DOCTYPE html>
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

  <link rel="shortcut icon" href="../imagenes/aeo.ico" />
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/estilos.css" rel="stylesheet">
</head>
<body>
  <!fin documento inicio>

  <!Barra de navegacion Navbar>
  <script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
  <head><link href="../css/estilos_melvin.css" rel="stylesheet"></head>
  <nav class="navbar navbar-default ">
    <div class="container">
      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a  href="../index.php"><img class="btn-card" src="../imagenes/aeo.png" align="left" height="50"></a><!--Para ponerle una img ala pagina -->
        <a class="navbar-brand" href="../index.php"><strong>Agenda Electrónica Oriental</strong></a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li> <a id="colorIniciosecion" href="../../config/cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong>Cerrar Sesión</strong></a></li>

          <li id="boton" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
            <ul id="despliege"class="dropdown-menu" role="menu">
              <li><a href="../Vistas/mostrar_usuarios.php"><img src="../imagenes/administracioncuenta.jpg" height="15"></img> <strong>Administración de Cuenta</strong></a></li>
              <li><a href="../Vistas/administracion-de-perfiles.php"><img src="../imagenes/administracionperfil.jpg" height="15"></img> <strong>Administración de Perfil</strong></a></li>
            </ul>
          </li>
          <!--va iniciar secion o registrarce -->
        </ul>
      </div>
    </div>

  </nav>
  <!Fin de navbar>

  <!Inicio del buscador >
  <?php
  $busquedas = null;
  ?>




  <script src="../js/jquery-2.2.4.min.js"></script>
  <link href="../css/estilos_alan.css" rel="stylesheet">


  <div class="container" style="padding-top: 3px;padding-bottom: 3px; " >
    <div class="form-group" >
      <form role="form" method="get" action="../Vistas/resultado_busqueda.php" >
        <div class="row"    >

          <div id="diseñobuscarusuario" class="panel-heading" >


            <div class="col-md-6 col-xs-6 col-sm-6 inner-addon right-addon">
              <div class="input-group">
                <span class="input-group-btn">
                  <button   type="submit"   class="btn btn-default form-control" style="width: 100%; line-height: 50px; padding-left: 8px; background-color:#F2F2F2; color:black;"><strong><span class="glyphicon glyphicon-search"></span></strong></button>
                </span>
                <input class="form-control" id="busqueda" type="text"  name="busqueda"  placeholder="Contacto a buscar"
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

  <div id="encabezado_lista_contactos" class="container"><h4 id="nombreCategoria"><?php echo $_GET['name_cty'] ?></h4></div>


  <div class="container responsive" id="contenedor_perfiles">
    <div class="row" style="margin-top: 10px;" id="fila">


    </div>
  </div>
  <script type="text/javascript" src="../js/listaDeContactos.js"> </script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <br>
  <br>

  <!-- Footer -->
  <div class="navbar navbar-default navbar-fixed-bottom" id="footer">
    <div class="container">
      <div class="row text-center text-xs-center text-sm-left text-md-left ">
        <div  class="col-xs-6 col-sm-6 col-md-4" >
          <a  href="../Vistas/acercadeweb.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <strong class="opcion coloremail">Acerca de Desarrolladores</strong></a>
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
