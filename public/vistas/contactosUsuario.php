<?php
$titulo = 'Contactos';
include_once '../plantillas/documento-inicio.inc.php';
include_once '../plantillas/barra-de-navegacion-navbar.inc.php';
if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
        ?>

        <head>
            <link href="../css/estiloslogin.css" rel="stylesheet">
            <link href="../css/estilos_melvin.css" rel="stylesheet"
        </head>

        <script src="../js/jquery-2.2.4.min.js"></script>
        <div class="container" id="">
            <div class="row" style="margin-top: 10px;" id="contedidodecategoriascontacto">
                <div class="row">

                    <div class="col-sm-6 col-md-6">
                        <div class="panel panel-default">
                            <div  class="panel-heading" style="height: 40px">
                                <h3 class="panel-title">
                                    <center>Contactos Pendientes<br><br></center>  
                                    <br>
                                    <br>
                                </h3>
                            </div>
                            <div class="coll">
                                <center>
                                    <img src="../imagenes/contactopendiente.jpg" height="200px" class="img-fluid imagenAcercadeWeb " alt="Imagen no Disponible" title="Imagen Agenda Electronica Digital" >
                                </center>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <p ><a href="contactosUsuariosPendientes.php" class="btn btn-primary">Ver Contactos Pendientes</a></p>
                                </center>
                            </div>
                        </div>   
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="panel panel-default">
                            <div  class="panel-heading" style="height: 40px">
                                <h3 class="panel-title">
                                    <center>Contactos Aprobados<br><br></center>  
                                    <br>
                                    <br>
                                </h3>
                            </div>
                            <div class="coll">
                                <center>
                                    <img class="card-img-top" height="200px" src="../imagenes/contactoaprovado.jpg" alt="Imagen no Disponible">
                                </center>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <p ><a href="contactosUsuarioAprobado.php" class="btn btn-primary">Ver Contactos Aprobados</a>
                                </center>
                            </div>
                        </div>   
                    </div>

                    <!-- <div class="col-sm-6 col-md-4">
                         <div class="panel panel-default">
                             <div  class="panel-heading" style="height: 40px">
                                 <h3 class="panel-title">
                                     <center>Contactos Elimimnados<br><br></center>  
                                     <br>
                                     <br>
                                 </h3>
                             </div>
                             <div class="coll">
                                 <center>
                                      <img class="card-img-top" height="200px" src="imagenes/contactoborrado.jpg" alt="Imagen no Disponible">
                                </center>
                             </div>
                             <div class="panel-body">
                                 <center>
                                 <p ><a href="contactosUsuarioEliminado.php" class="btn btn-primary">Ver Contactos Eliminados</a>
                                 </center>
                             </div>
                         </div>   
                     </div> -->
                </div>
            </div>
            <div  class="container">


            </div>
            <div  class="container">
                <div class="row">


                </div>

            </div>

        </div>


        <div  class="container">
            <div class="row">


            </div>

        </div>


        <a href="nuevoContacto.php" class="float">  
            <i class="glyphicon glyphicon-plus my-float"></i>
        </a>

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

