<?php
$titulo = 'Contactos Pendientes';
include_once 'documento-inicio.inc.php';
include_once 'barra-de-navegacion-navbar.inc.php';
?>

<head>
  <link href="css/estiloslogin.css" rel="stylesheet">
  <link href="css/estilos_melvin.css" rel="stylesheet">
</head>


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
    url: "../WebServices/consultarContactosPendientes.php",
    data: {'id_usuario':<?php echo $_SESSION['idUrs'] ?>}
  }).done(function (data) {
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
        } else {
          estado = "";
        }
        ;
        $("#contenedorContacto").append(
          '<a class="enlaces_de_listas_contactos" href="edicionDePerfilUsuarioNormal.php?cto=' + contacto[i].id_contacto + '"><div class = "col-md-4 col-sm-6">' +
          '<div class="media">' +
          '<div class="media-left">' +
          '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
          '</div>' +
          '<div class="media-body">' +
          '<h4 class = "media-heading">' + contacto[i].nombre_organizacion + '</h4>' + '<br>' +
          '<p>Estado del Contacto:</p>' +
          '<p style="color:#FCB30A">' + estado + '</p>' +
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
        '<h3>No tiene contactos Pendiente </h3> ' +
        '<h3>Empieza a registrar tus contacto </h3> ' +
        '</div>'

      );
    }
  });
};

</script>
<?php
include_once 'documento-cierre.inc.php';
?>
        <script type="text/javascript" src="js/Errores.js"></script>
