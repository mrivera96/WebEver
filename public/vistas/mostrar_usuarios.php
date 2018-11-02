<?php

$titulo = 'Usuarios';
session_start();

if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
        ?>
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

        <script src="../js/jquery-2.2.4.min.js"></script>
        <link href="../css/estilos_alan.css" rel="stylesheet">
        <link href="../css/estiloslogin.css" rel="stylesheet">


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



                <script>

                    //---FUNCTION DE BUSQUEDA DE USUARIO
                    var search = document.getElementById("busqueda"),
                            food = document.getElementsByClassName("enlase_usuarios"),
                            forEach = Array.prototype.forEach;

                    search.addEventListener("keyup", function (e) {
                        var choice = this.value;

                        forEach.call(food, function (f) {
                            if (f.innerHTML.toLowerCase().search(choice.toLowerCase()) == -1)
                                f.style.display = "none";
                            else
                                f.style.display = "block";
                        });
                    }, false);

                    //fin de la funcion.

                    //FUNCTION QUE MUSTRA TODOS LOS USUARIOS REGUISTRADOS EN LA BASE DE DATOS.

                      $(document).on("ready", function () {
                          loadData();
                      });
                      var loadData = function () {
                          $.ajax({
                              type: "GET",
                              url: "../todosUsuarios",
                              data: {'estado': '1','tkn':"<?php echo $_SESSION['token'] ?>"},
                              statusCode:{
                                200: function(data){
                                  var usuarios = data.content;
                                  for (var i in usuarios) {

                           var imagen;
                           if (usuarios[i].descripcion_rol=='Administrador') {
                             imagen = "../imagenes/admin.png";
                           } else if(usuarios[i].descripcion_rol=='Cliente') {
                               imagen = "../imagenes/cliente.png";
                           }
                             $("#fila").append('</div>' +
                               '<a class="enlase_usuarios" href="../Vistas/editar_usuarios.php?usuario=' + usuarios[i].id_usuario + '"><div class = "col-md-6 col-sm-6">'+
                              '<div class="media">' +
                             '<div class="media-left">' +
                             '<img style="width:60px ; heigh:60px ;"  class="media-object img-circle circle-img" src="'+imagen+'">' +
                             '</div>' +
                              '<div class="media-body">' +
                                  '<h4  id="colorUsuarios" ><strong>' + usuarios[i].nombre_usuario + '</strong></h4>' +
                                     '<p href="../Vistas/editar_usuarios.php?usuario=' + usuarios[i].id_usuario + '"></p>'+
                                     '<h4 id="colortipUsuario"><strong>' + usuarios[i].descripcion_rol + '</strong></h4>' +
                                     '<hr id="disUsusarios">' +
                                     '</div>'+
                                     '</div>' +
                                 '</div>' +
                                   '</a>'

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

        <a  href="../Vistas/formulario_registro.php" class="float">
            <i class="glyphicon glyphicon-plus my-float"></i>
        </a>
<!inicio de documento cierre>
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
      <!fin de documentocierre>

        <?php

    } else {
        header('Location: /webaeo');
    }
} else {
    header('Location: /webaeo');
}
