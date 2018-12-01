<?php
$titulo = 'Contactos';
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
?>

<link href="css/estiloslogin.css" rel="stylesheet">
<link href="css/estilos_melvin.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">


<section id="fh5co-about" data-section="about">
  <div class="container">
    <div class="row">
      <div class="col-md-12 section-heading text-center">
        <h2 class="to-animate">Panel de Control</h2>
        <hr id="diseñoseparador">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 subtext to-animate">
            <p style="font-size: 16px;">
              En este panel podrás agregar un nuevo contacto, ver tus contactos pendientes y cuáles de ellos ya fueron aprobados por el administrador.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="fh5co-person text-center to-animate">
            <figure><img id="suspendido" src="imagenes/pendiente.png" alt="Image"></figure>
            <h3>Contactos Pendientes</h3>
            <span class="fh5co-position">Contactos en espera de ser aprovados</span>
            <p style="font-size: 16px;">
              Estos Son tus contactos que se han enviado a el administrador para su posterior aprovación.</p>
                </br>
            <p ><a id="botn" href="contactosPendientesCliente" class="btn btn-primary">Ver Contactos Pendientes</a></p>
          </div>
        </div>



        <div class="col-md-6">
          <div class="fh5co-person text-center to-animate">
            <figure><img id="suspendido"  src="imagenes/aprovados.png" alt="Image"></figure>
            <h3>Contactos Aprobados</h3>
            <span class="fh5co-position">Contactos ya aprovados por el administardor</span>
            <p style="font-size: 16px;">
              Estos son tus contactos que el administrador ya aprobó y que se encuentran en uso.</p>
                </br>
              <p ><a id="botn" href="contactosAprobadosCliente" class="btn btn-primary">Ver Contactos Aprobados</a>
              </div>
            </div>
          </div>
        </div>
      </section>


      <a id="float" href="nuevoPerfilCliente" >
        <i class="glyphicon glyphicon-plus my-float"></i>
      </a>

      <?php
      include_once 'documento-cierre.inc.php';
      ?>
      <script type="text/javascript" src="js/Errores.js"></script>
