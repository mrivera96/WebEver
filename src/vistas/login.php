<?php

include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
$titulo = 'Acceder a la cuenta';

?>
<head>
    <link href="css/estiloslogin.css" rel="stylesheet">
</head>



<!--FORMULARIO DE LOGUIN-->
<div  class="container well" id="contenedor">
    <div class="row">
        <div class="col-xs-12">
            <img src="imagenes/LoginUsuario.png" class="img-responsive" id="imagen">
        </div>
        <p><h5>
            <strong><center style="color: #005662">   Acceder a la Cuenta</center></strong>
        </h5></p>
        <br>
    </div>
    <form class="form" name="log" id="modal_login" method="POST">
        <div class="group">
            <input  type="text" required    name="usern"  title="No se permiten espacios">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label  for="usern">  <span class="glyphicon glyphicon-user"></span> Usuario</label>
        </div>

        <div class="group">
            <input  type="password"  required  name="pass" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="pass"><span class="glyphicon glyphicon-lock"></span> Password</label>
        </div>

        <br>

        <button  type="button"  id="btn-card"  class="btn btn-lg btn-block"    name="guardar"  style=" background-color: #005662; color:white;">Ingresar</button>
    </form>


</div>


<?php
include_once 'documento-cierre.inc.php';
?>
<script type="text/javascript" src="js/Errores.js"></script>
<script type="text/javascript" src="js/login.js"></script>