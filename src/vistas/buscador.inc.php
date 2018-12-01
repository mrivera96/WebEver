
<?php
$busquedas = null;
?>

<div class="container" style="padding-top: 3px;padding-bottom: 3px;">
  <div class="form-group">
    <form role="form" method="get" action="resultados">
      <div class="row">
        <div id="diseñobuscarusuario" class="panel-heading">
          <div class="col-md-6 col-xs-6 col-sm-6 inner-addon right-addon">
            <div class="input-group">
              <span class="input-group-btn">
                <button id="separador"  type="submit"  style=" color: black; background:#F2F2F2" class="btn btn-light form-control"><strong><span class="glyphicon glyphicon-search" style="padding: 1px ; width: 2px"></span></strong></button>
              </span>
              <input id="busqueda" type="text" class="form-control" name="busqueda"  placeholder="Contacto a buscar"
              required oninvalid="setCustomValidity('Ingrese la busqueda.')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="col-md-3 col-xs-3 col-sm-3 inner-addon right-addon">
           <select class="form-control" id="categoria" name="categoria">
             <option value="" >Todas La Categorias</option>

           </select>
          </div>
          <div class="col-md-3 col-xs-3 col-sm-3 inner-addon right-addon">
             <select class="form-control" id="region" name="region">
               <option value="" >Todas Las Regiones</option>
                </select>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
