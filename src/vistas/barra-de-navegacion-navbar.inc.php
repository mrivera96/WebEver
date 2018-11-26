<?php
?>
<link href="css/estilos_alan.css" rel="stylesheet">

<nav class="navbar navbar-default ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a  href="inicio"><img class="btn-card" src="imagenes/aeo.png" align="left" height="50"></a><!--Para ponerle una img ala pagina -->
      <a class="navbar-brand" href="inicio"><strong>Agenda Electrónica Oriental</strong></a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul id="enlaces" class="nav navbar-nav navbar-right">
        <?php
        if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
          if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
            ?>
            <li><div  class="media ">
              <img id="iconodeusuario" class="media-object img-circle circle-img " src="imagenes/admin.png" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <ul id="despliege" class="dropdown-menu">
                <li> <a id = "colorIniciosecion" href = "./panelControlCliente"><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Panel de Control</strong></a></li>
                <li><a href="./editarUsuarioCliente"><strong><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edición de Cuenta</strong></a></li>
                <li role="separator" class="divider"></li>
               <li><a id = "botoncierreSession" class="btn"   onclick="funCerrar()"><strong><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Cerrar Sesión</strong></a></li>

              </ul>
            </div>
          </li>


              <?php
            } else {
              ?>
              <li><div  class="media ">
                <img id="iconodeusuario" class="media-object img-circle circle-img " src="imagenes/admin.png" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <ul id="despliege" class="dropdown-menu">
                  <li><a id = "colorIniciosecion" href="usuarios"><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Administración de Cuenta</strong></a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="administrarPerfiles"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span><strong> Perfiles activos</strong></a></li>
                  <li><a href="solicitudesNuevas"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Nuevas Solicitudes </a></li>
                  <li><a href="solicitudesRechazadas"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><strong> Solicitudes Rechazadas</strong></a></li>
                  <li><a href="perfilesEliminados"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span><strong> Perfiles Eliminados</strong></a></li>
                  <li role="separator" class="divider"></li>
                <li><a id = "botoncierreSession" class="btn"   onclick="funCerrar()"><strong><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Cerrar Sesión</strong></a></li>


                </ul>
              </div>
            </li>



                <?php
                $message = 'Usuario o Contraseña incorrectas desde la sesion';
              }
              ?>
              <?php
            } else {
              ?>
              <li> <a id = "colorIniciosecion" href = "login"><span class = "glyphicon glyphicon-log-in" aria-hidden = "true"></span> <strong>Iniciar Sesión</strong></a></li>
              <li> <a id = "colorIniciosecion" href = "registro"><span class = "glyphicon glyphicon-plus" aria-hidden = "true"></span> <strong>Registrarse</strong></a></li>
              <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
