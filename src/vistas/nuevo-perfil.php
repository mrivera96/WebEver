<?php
$titulo = "Nuevo Perfil";


if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
        include_once 'documento-inicio.inc.php';

        ?>

        <head><link href="../css/estilos_melvin.css" rel="stylesheet"></head>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a  href="../index.php"><img class="btn-card" src="../imagenes/aeo.png"   align="left" height="50"></a><!--Para ponerle una img ala pagina -->
                    <a class="navbar-brand" href="../index.php"><strong>Agenda Electrónica Oriental</strong></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="nuevas-solicitudes.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Nuevas Solicitudes</a></li>
                        <li><a href="solicitudes-rechazadas.php"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Solicitudes Rechazadas</a></li>
                        <li><a href="perfiles-eliminados.php"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Perfiles Eliminados</a></li>
                        <li id="boton" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                            <ul id="despliege" class="dropdown-menu" role="menu">
                                <li><a href="mostrar_usuarios.php"><img src="../imagenes/administracioncuenta.jpg" height="15"> <strong>Administración de Cuenta</strong></a></li>
                                <li><a href="administracion-de-perfiles.php"><img src="../imagenes/administracionperfil.jpg" height="15"> <strong>Administración de Perfiles</strong></a></li>
                            </ul>
                        </li>
                        <li> <a id="colorIniciosecion" href="../config/cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a></li>
                    </ul>
                </div>
            </div>

        </nav>
        <div class="container responsive">
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading " style="height: 40px">

                            <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>   Nuevo Perfil</h3>
                        </div>

                        <div class="panel-body">
                            <form id="formularioCrear" name="formularioCrear" role="form" method="post">
                                <br/>
                                <div class="group">
                                    <input type="text" required name="nomborg_rec" id="nombreOrg">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label><span class="glyphicon glyphicon-credit-card"></span> Nombre de Organización</label>
                                </div>

                                <div class="group">

                                    <input type="tel" id="numtelOrg" name="numtel_rec">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label><span class="glyphicon glyphicon-earphone"></span> Número fijo</label>
                                </div>


                                <div class="group">
                                    <input type="tel" id="numcelOrg" name="numcel_rec">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label><span class="glyphicon glyphicon-phone"></span> Número móvil</label>
                                </div>


                                <div class="group">
                                    <input type="text" required id="dirOrg" name="direccion_rec">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label><span class="glyphicon glyphicon-transfer"></span> Dirección</label>
                                </div>


                                <div class="group">
                                    <input type="email" id="emailOrg" name="email_rec">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label><span class="glyphicon glyphicon-envelope"></span> e-mail</label>
                                </div>



                                <div class="group">
                                    <input type="text" required id="descOrg" name="desc_rec">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label><span class="glyphicon glyphicon-align-left"></span> Descripción de la organización</label>
                                </div>


                                <div class="group">
                                    <input  type="text" id="latOrg" required name="lat_rec" >
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label><span class="glyphicon glyphicon-map-marker"></span> Latitud</label>
                                </div>


                                <div class="group">
                                    <input type="text" id="longOrg" required name="longitud_rec">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label><span class="glyphicon glyphicon-map-marker"></span> Longitud</label>
                                </div>

                                <h5>Ingrese su Ubicación</h5>



                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEOxwsMZ7J9V7kqTr82JflRNORJchV4mM&callback=initMap"
                                type="text/javascript"></script>

                                <script type="text/javascript">
                                    function getCoords(marker) {
                                        $("#latOrg").attr("value", marker.getPosition().lat());
                                        $("#longOrg").attr("value", marker.getPosition().lng());

                                    }
                                    function initialize() {
                                        var myLatlng = new google.maps.LatLng(14.041458, -86.568061);



                                        var myOptions = {
                                            zoom: 15,
                                            center: myLatlng,
                                            mapTypeId: google.maps.MapTypeId.satelite
                                        }
                                        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                                        marker = new google.maps.Marker({
                                            position: myLatlng,
                                            draggable: true,
                                            title: 'danli'
                                        });
                                        google.maps.event.addListener(marker, "dragend", function () {

                                            getCoords(marker);

                                        });

                                        marker.setMap(map);
                                        getCoords(marker);


                                    }

                                </script>
                                <body onload="initialize()">
                                    <div id="map_canvas" style="width:100%; height:220px"></div><br>

                                </body

                                <h5>Región</h5>
                                <select class="form-control" id="region" name="id_region"></select>

                                <h5>Categoría</h5>
                                <select class="form-control" id="categoria" name="id_categoria"></select>

                                <h5>Usuario</h5>
                                <select class="form-control" id="usuario" name="id_usuario"></select>
                                <br>
                                <input type="hidden" name="imagen" value=""/>
                                <input type="hidden" name="nombre_imagen" value=""/>
                                <button class="form-control" name="guardar" id="guardar"  type="button" style="background-color:#005662; color:white;" ><span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>

                                <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Crear Perfil</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>El Perfil se ha creado con éxito.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" onClick="javascript:(function () {
                                                                window.location.href = 'administracion-de-perfiles.php';
                                                            })()">Aceptar</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>




                    </div>


                </div>

            </div>
        </div>
        <br>

        <script src="../js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript">
        <!--
                $(document).on("ready", function () {
                    loadData();
                });

                var loadData = function () {
                    $.ajax({
                        type: "GET",
                        url: "../WebServices/consultarRegiones.php"
                    }).done(function (data) {
                        var regiones = JSON.parse(data);

                        for (var i in regiones) {
                            $("#region").append('<option value="' + regiones[i].id_region + '">' + regiones[i].nombre_region + '</option>');
                        }
                    });

                    $.ajax({
                        type: "GET",
                        url: "../WebServices/consultarCategorias.php"
                    }).done(function (data) {
                        var categorias = JSON.parse(data);

                        for (var i in categorias) {
                            $("#categoria").append('<option value="' + categorias[i].id_categoria + ' "> ' + categorias[i].nombre_categoria + '</option>');
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "../WebServices/ConsultarTodosLosUsuarios.php",
                        data: {'estado': '1', 'tkn':"<?php echo $_SESSION['token']?>"}
                    }).done(function (data) {
                        var usuarios = JSON.parse(data);
                        if(usuarios == "El token recibido NO existe en la base de datos." || usuarios == "El Token ya expiró."){
                           document.getElementById("colorIniciosecion").click();
                        }else {
                          for (var i in usuarios) {
                              $("#usuario").append('<option value="' + usuarios[i].id_usuario + '">' + usuarios[i].nombre_usuario + '</option>');
                          }
                        }


                    });

                };

                document.getElementById("guardar").onclick = function () {
                    validarFormulario();
                };

                function mostrarError(componente, error) {

                    $("#formularioCrear").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
                            '<div class="modal-dialog" role="document">' +
                            '<div class="modal-content">' +
                            '<div class="modal-header">' +
                            '<h5 class="modal-title">Error al crear el perfil</h5>' +
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
                function validarFormulario() {
                    var error_nomb = false;
                    var error_tel = false;
                    var error_cel = false;
                    var error_mail = false;
                    var error_desc = false;
                    var error_dir = false;
                    var error_reg = false;
                    var error_cat = false;


                    if (document.formularioCrear.nomborg_rec.value === "") {
                        error_nomb = true;
                        mostrarError(document.formularioCrear.nomborg_rec, "Debe ingresar un nombre de organización.");
                        return;
                    }

                    if (document.formularioCrear.email_rec.value === "") {

                    } else {
                        if (!document.formularioCrear.email_rec.value.includes("@") || !document.formularioCrear.email_rec.value.includes(".")) {
                            error_mail = true;

                            mostrarError(document.formularioCrear.email_rec, "Ingrese un e-mail válido.");
                            return;
                        }
                    }


                    if (document.formularioCrear.numtel_rec.value === "") {
                        if (document.formularioCrear.numcel_rec.value === "") {
                            error_tel = true;

                            mostrarError(document.formularioCrear.numtel_rec, "Debe ingresar al menos un número telefónico.");
                            return;
                        }
                    } else {
                        if (document.formularioCrear.numtel_rec.value.length < 8 || !document.formularioCrear.numtel_rec.value.startsWith("2") || document.formularioCrear.numtel_rec.value.length > 8) {
                            error_tel = true;

                            mostrarError(document.formularioCrear.numtel_rec, "El número telefónico ingresado no es válido.");
                            return;
                        }
                    }

                    if (document.formularioCrear.numcel_rec.value === "") {
                        if (document.formularioCrear.numtel_rec.value === "") {
                            error_cel = true;

                            mostrarError(document.formularioCrear.numcel_rec, "Debe ingresar al menos un número telefónico.");
                            return;
                        }
                    } else {
                        if (document.formularioCrear.numcel_rec.value.length < 8 || document.formularioCrear.numcel_rec.value.length > 8) {
                            error_cel = true;

                            mostrarError(document.formularioCrear.numcel_rec, "El número telefónico ingresado no es válido.");
                            return;
                        }
                    }

                    if (document.formularioCrear.direccion_rec.value === "") {
                        error_dir = true;
                        mostrarError(document.formularioCrear.direccion_rec, "Debe ingresar la dirección de la organización.");
                        return;
                    }
                    if (document.formularioCrear.desc_rec.value === "") {
                        error_desc = true;

                        mostrarError(document.formularioCrear.desc_rec, "Debe escribir una descripción de la organización.");
                        return;
                    }
                    if (document.formularioCrear.id_region.value < 3 && document.formularioCrear.id_region.value > 4) {
                        error_reg = true;
                        alert('La región seleccionada no existe.');
                        document.formularioEditar.id_region.focus();
                        return;
                    }
                    if (document.formularioCrear.id_categoria.value < 1 && document.formularioCrear.id_categoria.value > 11) {
                        error_cat = true;
                        alert('La categoría seleccionada no existe.');
                        document.formularioCrear.id_categoria.focus();
                        return;
                    }

                    if (error_nomb === false &&
                            error_tel === false &&
                            error_cel === false &&
                            error_dir === false &&
                            error_mail === false &&
                            error_desc === false &&
                            error_reg === false &&
                            error_cat === false) {
                              $.ajax({
                                type:"POST",
                                url:"../WebServices/crearPerfil.php",
                                data:{
                                  'tkn':"<?php echo $_SESSION['token']?>",
                                  'lat_rec':document.formularioCrear.lat_rec.value,
                                  'longitud_rec':document.formularioCrear.longitud_rec.value,
                                  'nomborg_rec':document.formularioCrear.nomborg_rec.value,
                                  'email_rec':document.formularioCrear.email_rec.value,
                                  'numtel_rec':document.formularioCrear.numtel_rec.value,
                                  'numcel_rec':document.formularioCrear.numcel_rec.value,
                                  'direccion_rec':document.formularioCrear.direccion_rec.value,
                                  'desc_rec':document.formularioCrear.desc_rec.value,
                                  'id_region':document.formularioCrear.id_region.value,
                                  'id_categoria':document.formularioCrear.id_categoria.value,
                                  'id_usuario':document.formularioCrear.id_usuario.value
                                }

                              }).done(function(data){
                                 var resp = JSON.parse(data);
                                 if(resp == "El token recibido NO existe en la base de datos." || resp == "El Token ya expiró."){
                                    document.getElementById("colorIniciosecion").click();
                                 }else {
                                   $("#Modal1").modal('show');
                                 }


                              });


                        return;
                    }
                }
//-->
        </script>

        <?php
        include_once 'documento-cierre.inc.php';
    } else {
        header('Location: /webaeo');
    }
} else {
    header('Location: /webaeo');
}
?>
