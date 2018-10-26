
<?php
$titulo = 'Acceder a la cuenta';
include_once '../plantillas/documento-inicio.inc.php';
include_once '../plantillas/barra-de-navegacion-navbar.inc.php';
include '../config/Errores.inc.php';

if (isset($_POST['tkn']) && !empty($_POST['tkn'])) {

    if ($_POST['estado'] != 2) {
        $_SESSION['token'] = $_POST['tkn'];
        $_SESSION['idUrs'] = $_POST['id'];
        $_SESSION['rol'] = $_POST['rol'];
    }
}
if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {

    if (($_SESSION['rol'] == 2)) {
        header('Location: /webaeo/Vistas/contactosUsuario.php');
    } else if (($_SESSION['rol'] == 1)) {
        header('Location: /webaeo/Vistas/mostrar_usuarios.php');
    } else {
        $message = 'Usuario o Contraseña incorrectas ';
    }
}
?>
<head>
    <link href="../css/estiloslogin.css" rel="stylesheet">
</head>



<!--FORMULARIO DE LOGUIN-->
<div  class="container well" id="contenedor">
    <div class="row">
        <div class="col-xs-12">
            <img src="../imagenes/LoginUsuario.png" class="img-responsive" id="imagen">
        </div>
        <p><h5>
            <strong><center style="color: #005662">   Acceder a la Cuenta</center></strong>
        </h5></p>
        <br>
    </div>
    <form class="form" name="log" id="modal_login" method="POST">
        <div class="group">
            <input  type="text" required    name="usern" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ_-0-9]*$|" title="No se permiten espacios">
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

<!--FORMULARIO QUE RECIVE LA INFORMACION DEL TOKEN-->
    <form style="display: hidden" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="form">
        <input type="hidden" id="tkn" name="tkn" value=""/>
        <input type="hidden" id="rol" name="rol" value=""/>
        <input type="hidden" id="id" name="id" value=""/>
        <input type="hidden" id="stado" name="estado" value=""/>
    </form>

</div>

<script src="../js/jquery-2.2.4.min.js"></script>
<!--VALIDACION DE LOS CAMPOS DE INICIO DE SECCION-->
<script>
    $("#btn-card").click(function () {
        loguear()
    });
    function mostrarError(componente, error) {

        $("#modal_login").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al Acceder ala Cuenta.</h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>' +
                ' <div class="modal-body">' +
                '<p>' + error + '</p>' +
                '</div>' +
                '<div class="modal-footer">' +
                '<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>');
        $("#Modal3").modal("show");
        $('#Modal3').on('hidden.bs.modal', function () {
            componente.focus();
            $("#Modal3").detach();
        });

    }
    ;
    function loguear() {

        var error_nomUsuario = false;
        var error_contrasena = false;


        if (document.log.usern.value === "") {
            error_nomUsuario = true;
            $("#Modal3").modal("show");
            mostrarError(document.log.usern,<?php print json_encode(ERROR10); ?>);
            return;
        }

        if (document.log.pass.value === "") {
            error_nomPropio = true;
            $("#Modal3").modal("show");
            mostrarError(document.log.pass,<?php print json_encode(ERROR25); ?>);
            return;
        }

        if (error_nomUsuario === false &&
                error_contrasena === false) {

            var usuario = document.log.usern.value;
            var contrasena = document.log.pass.value;
            $.ajax({
                type: "POST",
                url: "../WebServices/validar_usuario.php",
                data: {'nombre_usuario': usuario, 'contrasena': contrasena}
            }).done(function (data) {
                var dataParse = JSON.parse(data);

                if (dataParse != "Credenciales incorrectos") {

                    $("#tkn").val(dataParse.token);
                    $("#rol").val(dataParse.rol);
                    $("#id").val(dataParse.idUrs);
                    $("#stado").val(dataParse.ste);


                    $("#form").submit();
                    $("#form").detach();

                } else {
            mostrarError(document.log.pass,<?php print json_encode(ERROR14); ?>);
                }

            }
            );
        }
        ;

        return;
    }

</script>

<?php
include_once '../plantillas/documento-cierre.inc.php';
?>
