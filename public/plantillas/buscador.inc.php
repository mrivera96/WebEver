<?php
$busquedas = null;
?>
<script
    src="../js/jquery-2.2.4.min.js"
></script>


<div  class="container" style="background-color: #005662; border-radius: 8px; padding-top: 3px;padding-bottom: 3px;; margin-bottom: 20px">


    <div class="form-group" >
        <form role="form" method="get" action="../Vistas/resultado_busqueda.php" >


            <div id="separador" class="col-md-3 col-ms-3 ">

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

            <div id="separador"class=" col-md-3 col-ms-3 ">
                <select class="form-control" name="region">
                    <option value="0" >Todas las Regiones</option>
                    <option value="4" >El Paraíso</option>
                    <option value="3">Danlí</option>
                </select>              
            </div>
            <div  id="separador"class="col-md-5 col-ms-5  ">

                    <input id="busqueda" type="text" class="form-control" name="busqueda"  placeholder="Contacto a buscar"
                           required oninvalid="setCustomValidity('Ingrese la busqueda.')" oninput="setCustomValidity('')">
                    
               
               
            </div>
            <div class="col-md-1 col-ms-1">

                <button id="separador"  type="submit" style="background-color:white; color: black" class="form-control btn btn-primary btn-buscar"><strong><span class="glyphicon glyphicon-search"></span></strong></button>

                    </div>

        </form>
    </div>
</div>
