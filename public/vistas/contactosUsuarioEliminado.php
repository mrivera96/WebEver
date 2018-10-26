<?php
$titulo = 'Contactos Eliminados';
include_once '../plantillas/documento-inicio.inc.php';
include_once '../plantillas/barra-de-navegacion-navbar.inc.php';
if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
        ?>

        <head>
            <link href="../css/estiloslogin.css" rel="stylesheet">
            <link href="../css/estilos_melvin.css" rel="stylesheet">
        </head>

        <script src="../js/jquery-2.2.4.min.js"></script>

        <div class="container" id="contenedor_perfiles">
            <div class="row" style="margin-top: 10px;" id="contenedorContacto">

            </div>


        </div>


        <script>
            $(document).on("ready", function () {
                loadData();
            });
            var loadData = function () {
            $.ajax({
            type: "post",
                    url: "../WebServices/consultarContactosEliminados.php",
                    data: {'id_usuario':<?php echo $_SESSION['idUrs'] ?>, 'tkn':"<?php echo $_SESSION['token'] ?>"}
            }).done(function (data) {
            var users = JSON.parse(data);
                    if (users == "El token recibido NO existe en la base de datos." || users == "Credenciales incorrectos"){

            } else if (users == "El Token ya expiró."){
            document.getElementById("logout").click();
            } else {

            if (data !== "No hay resultados") {
            var contacto = JSON.parse(data);
                    var imagen;
                    var estado;
                    var id;
                    for (var i in contacto) {
            if (contacto[i].imagen !== "") {
            imagen = contacto[i].imagen;
            } else {
            imagen = "https://cdn.icon-icons.com/icons2/37/PNG/512/contacts_3695.png";
            }
            if (contacto[i].id_estado == 1) {
            estado = "Pendiente";
            } else if (contacto[i].id_estado == 2) {
            estado = "Aprobado";
            } else if (contacto[i].id_estado == 4) {
            estado = "Eliminado";
            } else {
            estado = "";
            }


            $("#contenedorContacto").append(
                    '<a class="enlaces_de_listas_contactos" href="edicionDePerfilUsuarioNormal.php?cto=' + contacto[i].id_contacto + '"><div class = "col-md-4 col-sm-6">' +
                    '<div class="media">' +
                    '<div class="media-left">' +
                    '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<h4 class = "media-heading">' + contacto[i].nombre_organizacion + '</h4>' + '<br>' +
                    '<p>Estado del Contacto:</p>' +
                    '<p style="color:#D4410A">' + estado + '</p>' +
                    '</div>' +
                    '</div>' +
                    '<hr style="margin-left:140px"/>' +
                    '</div>' +
                    '</a>'
                    );
            }
            } else {
            $("#contenedorContacto").append(
                    '<div class="col-md-12 text-center">' +
                    '<img  style="width:130px ; heigh:130px ;"  class="img-circle circle-img" src="https://cdn4.iconfinder.com/data/icons/rounded-white-basic-ui/139/Warning01-RoundedWhite-512.png"> ' +
                    '</div>' +
                    '<div class="col-md-12 text-center">' +
                    '<h3>No tiene contactos eliminados </h3> ' +
                    '</div>'
                    );
            }
            });
            };
        </script>
        <?php
        include_once '../plantillas/documento-cierre.inc.php';
        ?>
        <?php
    } else {
        header('Location: ../webaeo');
    }
} else {
    header('Location: ../webaeo');
}
?>


