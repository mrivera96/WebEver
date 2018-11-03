<?php
$busquedas = null;
?>




<script src="../js/jquery-2.2.4.min.js"></script>
<link href="../css/estilos_alan.css" rel="stylesheet">


<div class="container" style="padding-top: 3px;padding-bottom: 3px; " >
  <div class="form-group" >
    <form role="form" method="get" action="../Vistas/resultado_busqueda.php" >
      <div class="row"    >

        <div id="diseñobuscarusuario" class="panel-heading" >


      <div class="col-md-6 col-xs-6 col-sm-6 inner-addon right-addon">
            <div class="input-group">
              <span class="input-group-btn">
                <button   type="submit"   class="btn btn-default form-control" style="width: 100%; line-height: 50px; padding-left: 8px; background-color:#F2F2F2; color:black;"><strong><span class="glyphicon glyphicon-search"></span></strong></button>
              </span>
              <input class="form-control" id="busqueda" type="text"  name="busqueda"  placeholder="Contacto a buscar"
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
