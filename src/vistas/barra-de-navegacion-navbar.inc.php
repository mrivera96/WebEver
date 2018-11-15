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
            <li id="boton" style="margin: 12px;" class="dropdown">
              <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong> <span class="caret"></span>
              </button>
              <ul id="despliege" class="dropdown-menu">
                <li> <a id = "colorIniciosecion" href = "./panelControlCliente"><img src="imagenes/config.png" height="15"></img> <strong>Panel de Control </strong></a></li>
                <li><a href="./editarUsuarioCliente"><img src="imagenes/administracioncuenta.jpg" height="15"></img> <strong>Edición de Cuenta</strong></a></li>
                <li role="separator" class="divider"></li>
              </ul>
            </li>


            <li> <button id="botoncierreSession" type="button"  id="guardar"  class="btn-card"   name="guardar" onclick="funCerrar()"
              ><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong></strong></button></li>
              <?php
            } else {
              ?>
              <li id="boton"  class="dropdown">
                <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong> <span class="caret"></span>
                </button>
                <ul id="despliege" class="dropdown-menu">
                  <li><a id = "colorIniciosecion" href="usuarios"><img src="imagenes/administracioncuenta.jpg" height="15"></img> <strong>Administración de Cuenta</strong></a></li>
                  <li><a href="administrarPerfiles"><img src="imagenes/administracionperfil.jpg" height="15"></img> <strong>Administración de Perfil</strong></a></li>
                  <li role="separator" class="divider"></li>
                </ul>
              </li>

              <li> <button id="botoncierreSession" type="button"  id="guardar"  class="btn-card"   name="guardar" onclick="funCerrar()"
                ><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <strong></strong></button></li>
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
