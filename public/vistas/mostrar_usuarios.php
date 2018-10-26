<?php

$titulo = 'Usuarios';
session_start();
include_once '../plantillas/documento-inicio.inc.php';
include_once '../plantillas/navbar_panel_de_control.inc.php';

if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
        ?>

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
                            type: "POST",
                            url: "../WebServices/ConsultarTodosLosUsuarios.php",
                            data: {'estado': '1','tkn':"<?php echo $_SESSION['token'] ?>"}
                        }).done(function (data) {
                            var usuarios = JSON.parse(data);
                            for (var i in usuarios) {
                                $("#fila").append('</div>' +
                                        '<a class="enlase_usuarios" href="../Vistas/editar_usuarios.php?usuario=' + usuarios[i].id_usuario + '"><h3 id="colorUsuarios" ><strong>' + usuarios[i].nombre_usuario + '</strong></h3>' +
                                        '<p href="../Vistas/editar_usuarios.php?usuario=' + usuarios[i].id_usuario + '"><h4 id="colortipUsuario"><strong>' + usuarios[i].descripcion_rol + '</strong></h4></p>' +
                                        '<hr id="disUsusarios">' +
                                        '</a>'
                                        );
                            }
                        });
                    }
                </script>
            </div> 
        </div> 

        <a  href="../Vistas/formulario_registro.php" class="float">
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