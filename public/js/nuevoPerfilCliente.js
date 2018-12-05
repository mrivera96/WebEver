var tieneFoto=false;
$(document).on("ready", function () {
  loadData();
});

var loadData = function () {
  $.ajax({
    type: "GET",
    url: "regiones",
    statusCode:{
      200:function (data) {
        var regiones = data.content;
        for (var i in regiones) {
          $("#region").append('<option value="' + regiones[i].id_region + '">' + regiones[i].nombre_region + '</option>');
        }
      },
      500: function(){
        mostrarError(document.formulario, ERROR40);

      },
      401:function () {
        mostrarError(document.formulario, ERROR39);
        //  document.getElementById("colorIniciosecion").click();


      }
    }
  });

  $.ajax({
    type: "GET",
    url: "categorias",
    statusCode:{
      200:function (data) {
        var categorias = data.content;

        for (var i in categorias) {
          $("#categoria").append('<option value="' + categorias[i].id_categoria + ' "> ' + categorias[i].nombre_categoria + '</option>');
        }
      },
      500: function(){
        mostrarError(document.formulario, ERROR40);

      },
      401:function () {
        mostrarError(document.formulario, ERROR39);
          document.getElementById("colorIniciosecion").click();


      }
    }
  });



};


function mostrarError(componente, error) {

  $("#formularioCrear").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
  '<div class="modal-dialog" role="document">' +
  '<div class="modal-content">' +
  '<div class="modal-header">' +
  '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
  '<span aria-hidden="true">&times;</span>' +
  '</button>' +
  '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span>Error al crear el perfil</h5>' +
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

};



document.getElementById("guardar").onclick = function () {
    validarFormulario();
};


function validarFormulario() {
  var error_nomb = false;
  var error_tel = false;
  var error_cel = false;
  var error_mail = false;
  var error_desc = false;
  var error_dir = false;
  var error_reg = false;
  var error_cat = false;



  if (document.formularioCrear.nomborg_rec.value === "" || document.formularioCrear.nomborg_rec.value.trim()=="") {
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
      $("#Modal3").modal("show");
      mostrarError(document.formularioCrear.numcel_rec, "El número telefónico ingresado no es válido.");
      return;
    }
  }

  if (document.formularioCrear.direccion_rec.value === "" || document.formularioCrear.direccion_rec.value.trim()=="" ) {
    error_dir = true;

    mostrarError(document.formularioCrear.direccion_rec, "Debe ingresar la dirección de la organización.");
    return;
  }
  if (document.formularioCrear.desc_rec.value === "" || document.formularioCrear.desc_rec.value.trim()=="") {
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
    error_cat === false

) {
      var  lat_rec =document.formularioCrear.lat_rec.value;
      var  longitud_rec =document.formularioCrear.longitud_rec.value;
      var  nomborg_rec =document.formularioCrear.nomborg_rec.value;
      var  email_rec =document.formularioCrear.email_rec.value;
      var  numtel_rec =document.formularioCrear.numtel_rec.value;
      var  numcel_rec = document.formularioCrear.numcel_rec.value;
      var  direccion_rec= document.formularioCrear.direccion_rec.value;
      var  desc_rec= document.formularioCrear.desc_rec.value;
      var  id_region= document.formularioCrear.id_region.value;
      var  id_categoria= document.formularioCrear.id_categoria.value;
      var inputFileImage = document.getElementById("imagen");

      var imagen = inputFileImage.files[0];

      var data = new FormData();

      data.append('imagen',imagen);
      data.append('lat_rec',lat_rec);
      data.append('longitud_rec',longitud_rec);
      data.append('nomborg_rec',nomborg_rec);
      data.append('email_rec',email_rec);
      data.append('numtel_rec',numtel_rec);
      data.append('numcel_rec',numcel_rec);
      data.append('direccion_rec',direccion_rec);
      data.append('desc_rec',desc_rec);
      data.append('id_region',id_region);
      data.append('id_categoria',id_categoria);
      data.append('id_usuario',id_usuario);
      data.append('id_estado',1);


      $.ajax({
        type:"POST",
          contentType:false,
        url:"crearPerfil",
        data:data,
          processData:false,
      statusCode:{
          200:function (data) {
          //  document.getElementById("colorIniciosecion").click();
            $("#Modal1").modal('show');
            document.getElementById("formularioCrear").reset();


          },
          500: function(data){
            mostrarError(document.formularioCrear.desc_rec,ERROR40 );


          },
          401:function () {
            $("#Modal3").modal("show");
            mostrarError(document.formulario, ERROR39);
            document.getElementById("botoncierreSession").click();


          },
          400: function(){
            $("#Modal3").modal("show");
            mostrarError(document.formularioCrear.desc_rec,ERROR41 );


          }


        }
      });


      }
    };

    function encodeImagetoBase64(element) {

      var file = element.files[0];

      var reader = new FileReader();

      reader.onload = function(e) {

        $("#imgContc").attr("src",e.target.result);
        tieneFoto=true;

      }

      reader.readAsDataURL(file);



    }
