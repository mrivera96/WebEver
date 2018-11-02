<?php  session_start(); ?>

<?php $titulo = 'Acerca de....'; ?>

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

  <link rel="shortcut icon" href="../imagenes/aeo.ico" />
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/estilos.css" rel="stylesheet">
</head>
<body>
  <! fin Documento de inicio>

  <!Barra de navegacion>

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
          <?php
          if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
            if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
              ?>
              <li id="boton" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                <ul id="despliege"class="dropdown-menu" role="menu">
                  <li> <a id = "colorIniciosecion" href = "../Vistas/login.php"><img src="../imagenes/config.png" height="15"></img> <strong>Panel de Control </strong></a></li>
                  <li><a href="../Vistas/editarUsuarioNormal.php"><img src="../imagenes/administracioncuenta.jpg" height="15"></img> <strong>Edición de Cuenta</strong></a></li>
                </ul>
              </li>
              <li> <a id="colorIniciosecion" href="../cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong>Cerrar Sesión</strong></a></li>

              <?php
            } else {
              ?><li id="boton" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                <ul id="despliege"class="dropdown-menu" role="menu">
                  <li><a href="../Vistas/mostrar_usuarios.php"><img src="../imagenes/administracioncuenta.jpg" height="15"></img> <strong>Administración de Cuenta</strong></a></li>
                  <li><a href="../Vistas/administracion-de-perfiles.php"><img src="../imagenes/administracionperfil.jpg" height="15"></img> <strong>Administración de Perfil</strong></a></li>
                </ul>
              </li>
              <li> <a id="colorIniciosecion" href="../cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong>Cerrar Sesión</strong></a></li>
              <?php
              $message = 'Usuario o Contraseña incorrectas desde la sesion';
            }
            ?>
            <?php
          } else {
            ?>
            <li> <a id = "colorIniciosecion" href = "../Vistas/login.php"><span class = "glyphicon glyphicon-log-in" aria-hidden = "true"></span> <strong>Iniciar Sesión</strong></a></li>
            <li> <a id = "colorIniciosecion" href = "../Vistas/registrarCuentaUsuario.php"><span class = "glyphicon glyphicon-plus" aria-hidden = "true"></span> <strong>Registrarse</strong></a></li>
            <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!FIN BARRA DE NAVEGACION>



  <link href="../css/estilos_alan.css" rel="stylesheet">


  <div  class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="panel panel-default">
          <div  class="panel-heading" style="height: 40px">
            <h3 class="panel-title">
              <center>Acerca de la Pagina Web<br><br></center>
              <br>
              <br>
            </h3>
          </div>
          <div class="coll">
            <center>
              <img src="../imagenes/aeo.png" height="200px" class="img-fluid imagenAcercadeWeb " alt="Imagen no Disponible" title="Imagen Agenda Electronica Digital" >
            </center>
          </div>
          <div class="panel-body">
            <p><h4>
              Agenda Electrónica Oriental es una Web pensada para que accedas de forma fácil y sencilla a los números telefónicos, información y ubicación de las diferentes organizaciones ubicadas en las regiones de Danlí y el Paraíso pertenecientes al departamento de El Paraíso en Honduras.
            </h4></p>

          </div>
        </div>
      </div>
    </div>

  </div>

  <br/>

  <div  class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="panel panel-default">
          <div  class="panel-heading" style="height: 40px">
            <h3 class="panel-title">
              <center>Acerca de el Equipo de Desarrollo<br><br></center>
              <br>
              <br>
            </h3>
          </div>
          <div class="coll">
            <center>
              <img src="../imagenes/webeverLogo.png"height="200px" class="img-fluid imagenAcercadeWeb" alt="Imagen no Disponible" title="Imagen Agenda Electronica Digital" >
            </center>
          </div>
          <div class="panel-body">
            <p><h4>
              Nosotros WebEver, equipo de desarrolladores de la App Agenda Electrónica Oriental somos los únicos responsables de aceptar o denegar solicitudes de
              actualización de las empresas aquí registradas o por registrar en el futuro.
            </h4></p>

          </div>
        </div>
      </div>
    </div>

  </div>

  <!Iniciodocumento de cierre>
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
            <div class="principal">
            </div>
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
<!Fin documento de cierre>
