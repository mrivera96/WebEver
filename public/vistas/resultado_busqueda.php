<?php
    include_once '../../config/ConexionABaseDeDatos.php';
    include_once '../plantillas/documento-inicio.inc.php';
    include_once '../plantillas/barra-de-navegacion-navbar.inc.php';
?>
<script
    src="../js/jquery-2.2.4.min.js"
 ></script>
     <link href="../css/estilos_alan.css" rel="stylesheet">


     <div class="container" style="padding-top: 3px;padding-bottom: 3px; " >
         <div class="form-group" >
         <form role="form" method="get" action="../Vistas/resultado_busqueda.php" >
       <div class="row"    >

                 <div id="diseñobuscarusuario" class="panel-heading" >
                     <div class="col-md-6 col-xs-6 col-sm-6 inner-addon right-addon">
                       <div class="input-group">
                         <span class="input-group-btn">
                           <button   type="submit"  style=" color: black; background:#F2F2F2"  class="btn btn-light form-control "><strong><span style="padding: 1px ; width: 2px"
                             class="glyphicon glyphicon-search" aria-hidden="true"></span></strong></button>
                         </span>
                           <input id="busqueda" type="text" class="form-control" name="busqueda"  placeholder="Contacto a buscar"
                           required oninvalid="setCustomValidity('Ingrese la busqueda.')" oninput="setCustomValidity('')">
                       </div>
                     </div>
                     <div class="col-md-3 col-xs-3 col-sm-3 inner-addon right-addon">
                       <select class="form-control" name="categoria">
                           <option value="0">Todas las Categorías</option>
                           <option value="1" >Emergencia</option>
                           <option value="2" >Educación</option>
                           <option value="3">Centros Asistenciales</option>
                           <option value="4">Bancos</option>
                           <option value="5" >Hostelería y turismo</option>
                           <option value="6" >Instituciones Públicas</option>
                           <option value="7">Comercio de Bienes</option>
                           <option value="8" >Comercio de Servicios</option>
                           <option value="9">Bienes y Raíces</option>
                           <option value="10">Asesoría Legal</option>
                           <option value="11">Funeraria</option>
                       </select>
                         </div>

                         <div class="col-md-3 col-xs-3 col-sm-3 inner-addon right-addon">
                           <select class="form-control" name="region">
                               <option value="0" >Todas las Regiones</option>
                               <option value="4" >El Paraíso</option>
                               <option value="3">Danlí</option>
                           </select>
                       </div>

                 </div>

           </div>
         </form>
       </div>
     </div>







 <div id="estilo-contenedor-textocategoria"class="container">
    <div class="row"  id="fila"  >
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 40px; border-radius: 8px">
                <div class="coll">
                    <h3 class="panel-title">
                        <center><strong>Resultado de búsqueda</strong></center>
                    </h3>
                </div>
  <br/>

  <div class="container responsive" id="contenedor_resultado">
      <div class="row" style="margin-top: 10px;" id="fila">
         <script>
            $(document).on("ready", function(){ loadData(); });
                var loadData = function(){
                          $.ajax({
                              type:"GET",
                              url:"../buscar",
                              data: {'busqueda':'<?php echo $_GET['busqueda']?>','region':"<?php echo $_GET['region']?>",'categoria':"<?php echo $_GET['categoria']?>"},

                              statusCode:{
                                200: function(data){
                                  var array = data.content;


                              var perfiles = data.content;
                                var imagen;
                                var telefono;

                                for (var i in perfiles){
                                    if(perfiles[i].imagen!=""){
                                        imagen=perfiles[i].imagen;
                                    }else{
                                        imagen="https://cdn.icon-icons.com/icons2/37/PNG/512/contacts_3695.png";
                                    };
                                    if(perfiles[i].numero_fijo!=""){
                                        telefono=perfiles[i].numero_fijo;
                                    }else{
                                        telefono=perfiles[i].numero_movil;
                                    };
                                    $("#fila").append('<a href="PerfilOrganizacion.php?cto='+perfiles[i].id_contacto+'"><div class = "col-md-12">' +
                                              '<div class="media">' +
                                              '<div class="media-left">' +
                                              '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle" src='+ imagen+'> ' +
                                              '</div>' +
                                              '<div class="media-body">' +
                                              '<h3 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h3>' +
                                             '<p>' + telefono + '</p>' +
                                              '<p>' + perfiles[i].nombre_region + '</p>' +
                                                  '</div>' +
                                                  '</div>' +
                                                  '<hr/>'+
                                                  '</div></a>'
                                      );
                                }
                              },
                              500: function(data){
                                alert(data.message);
                              }


                            }
                            });
                }

          </script>
      </div>
      </div>
  </div>
  </div>
    </div>
  </div>
<?php
    include_once '../plantillas/documento-cierre.inc.php';
?>
