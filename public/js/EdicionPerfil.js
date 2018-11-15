
        $(document).on("ready", function () { loadData(); });


        /*****************************************************************************************
  *
  * FUNCIONES AJAX PARA LLENAR LOS SELECT DE REGION Y CATEGORIA
  ******************************************************************************************/
  var loadData = function () {
  $.ajax({
  type: "GET",
  url: "regiones",
  statusCode:{
    200:function (data) {
      var regiones = data.content;
      for (var i in regiones) {
        $("#region").append('<option class="form-control" value="' + regiones[i].id_region + '">' + regiones[i].nombre_region + '</option>');
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
        $("#categoria").append('<option class="form-control" value="' + categorias[i].id_categoria + '">' + categorias[i].nombre_categoria + '</option>');
      }
    },
    500: function(){
      mostrarError(document.formulario, ERROR40);

    }
  }
  });

              $.ajax({
                  type: "get",
                  url: "obtenerPerfil",
                  data: {'cto': cto},
                  statusCode:{
                    200:function (data) {
                      var perfiles  = data.content;

                  var imagen;
                  //  document.getElementById("colorIniciosecion").click();

                    for (var i in perfiles["perfiles"]) {
                        if (perfiles["perfiles"][i].imagen !== "") {
                            imagen = perfiles["perfiles"][i].imagen;
                        } else {
                            imagen = "imagenes/iconocontactowhite.png";
                        };

                        $("#imganenOrg").attr("src", imagen);
                        $("#nombreOrg").attr("value", perfiles["perfiles"][i].nombre_organizacion);
                        $("#numtelOrg").attr("value", perfiles["perfiles"][i].numero_fijo);
                        $("#numcelOrg").attr("value", perfiles["perfiles"][i].numero_movil);
                        $("#dirOrg").attr("value", perfiles["perfiles"][i].direccion);
                        $("#emailOrg").attr("value", perfiles["perfiles"][i].e_mail);
                        $("#descOrg").attr("value", perfiles["perfiles"][i].descripcion_organizacion);
                        $("#latOrg").attr("value", perfiles["perfiles"][i].latitud);
                        $("#longOrg").attr("value", perfiles["perfiles"][i].longitud);
                        $("#region option[value=" + perfiles["perfiles"][i].id_region + "]").attr("selected", true);
                        $("#categoria option[value=" + perfiles["perfiles"][i].id_categoria + "]").attr("selected", true);
                    }//for
                  },
                  500: function(data){
                    mostrarError(document.formulario, ERROR40);
                  },
                  400:function () {
                    mostrarError(document.formulario, ERROR35);
                  }
                }
              });
        };




        $("#eliminar").click(function () {
            $.ajax({
                type: "POST",
                url: "eliminarPerfil",
                data: {'cto': cto},
            }).done(function(data){

                var resp = JSON.parse(data);

                   document.getElementById("colorIniciosecion").click();

                  window.location.href = 'administracion-de-perfiles.php';



            });


        });


        document.getElementById("guardar").onclick = function () {
        validarFormulario();
        };


        function mostrarError(componente, error) {

        $("#formularioEditar").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title">Error al actualizar el perfil</h5>' +
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


        if (document.formularioEditar.nomborg_rec.value === "") {
            error_nomb = true;
            mostrarError(document.formularioEditar.nomborg_rec, "Debe ingresar un nombre de organización.");
            return;
        }

        if (document.formularioEditar.email_rec.value === "") {

        } else {
            if (!document.formularioEditar.email_rec.value.includes("@") || !document.formularioEditar.email_rec.value.includes(".")) {
                error_mail = true;

                mostrarError(document.formularioEditar.email_rec, "Ingrese un e-mail válido.");
                return;
            }
        }


        if (document.formularioEditar.numtel_rec.value === "") {
            if (document.formularioEditar.numcel_rec.value === "") {
                error_tel = true;

                mostrarError(document.formularioEditar.numtel_rec, "Debe ingresar al menos un número telefónico.");
                return;
            }
        } else {
            if (document.formularioEditar.numtel_rec.value.length < 8 || !document.formularioEditar.numtel_rec.value.startsWith("2") || document.formularioEditar.numtel_rec.value.length > 8) {
                error_tel = true;

                mostrarError(document.formularioEditar.numtel_rec, "El número telefónico ingresado no es válido.");
                return;
            }
        }

        if (document.formularioEditar.numcel_rec.value === "") {
            if (document.formularioEditar.numtel_rec.value === "") {
                error_cel = true;

                mostrarError(document.formularioEditar.numcel_rec, "Debe ingresar al menos un número telefónico.");
                return;
            }
        } else {
            if (document.formularioEditar.numcel_rec.value.length < 8 || document.formularioEditar.numcel_rec.value.length > 8) {
                error_cel = true;
                $("#Modal3").modal("show");
                mostrarError(document.formularioEditar.numcel_rec, "El número telefónico ingresado no es válido.");
                return;
            }
        }

        if (document.formularioEditar.direccion_rec.value === "") {
            error_dir = true;

            mostrarError(document.formularioEditar.direccion_rec, "Debe ingresar la dirección de la organización.");
            return;
        }
        if (document.formularioEditar.desc_rec.value === "") {
            error_desc = true;

            mostrarError(document.formularioEditar.desc_rec, "Debe escribir una descripción de la organización.");
            return;
        }
        if (document.formularioEditar.id_region.value < 3 && document.formularioEditar.id_region.value > 4) {
            error_reg = true;
            alert('La región seleccionada no existe.');
            document.formularioEditar.id_region.focus();
            return;
        }
        if (document.formularioEditar.id_categoria.value < 1 && document.formularioEditar.id_categoria.value > 11) {
            error_cat = true;
            alert('La categoría seleccionada no existe.');
            document.formularioEditar.id_categoria.focus();
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
                        url:"../WebServices/actualizarPerfil.php",
                        data:{
                          'tkn':"<?php echo $_SESSION['token']?>",
                          'lat_rec':document.formularioEditar.lat_rec.value,
                          'longitud_rec':document.formularioEditar.longitud_rec.value,
                          'nomborg_rec':document.formularioEditar.nomborg_rec.value,
                          'email_rec':document.formularioEditar.email_rec.value,
                          'numtel_rec':document.formularioEditar.numtel_rec.value,
                          'numcel_rec':document.formularioEditar.numcel_rec.value,
                          'direccion_rec':document.formularioEditar.direccion_rec.value,
                          'desc_rec':document.formularioEditar.desc_rec.value,
                          'id_region':document.formularioEditar.id_region.value,
                          'id_categoria':document.formularioEditar.id_categoria.value,
                          'cto':document.formularioEditar.cto.value
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
      };
