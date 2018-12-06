/**********************************************************************************************
    *            MODAL QU MUESTRAR EL ERROR DE LA BASE
    **********************************************************************************************/
    function mostrarError(componente, error) {

      $("#modarerror").append('<div class="modal fade" id="Modal3" tabindex="-1" role="dialog">' +
      '<div class="modal-dialog" role="document">' +
      '<div class="modal-content">' +
      '<div class="modal-header">' +
      '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span>' +
      '</button>' +
      '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al Cargar.</h5>' +
      '</div>' +
      ' <div class="modal-body">' +
      '<p>' + error + '</p>' +
      '</div>' +
      '<div class="modal-footer">' +
      '<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="cerrarSessionModal()">Aceptar</button>' +
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

  function mostrarErrorToken() {

    $("form").append('<div class="modal fade" id="Modalto" tabindex="-1" role="dialog">' +
    '<div class="modal-dialog" role="document">' +
    '<div class="modal-content">' +
    '<div class="modal-header">' +
    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al Cargar.</h5>' +
    '</div>' +
    ' <div class="modal-body">' +
    '<p>' + ERROR39 + '</p>' +
    '</div>' +
    '<div class="modal-footer">' +
    '<button id="btn" type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>'+
    '</div>' +
    '</div>' +
    '</div>' +
    '</div>');
      document.getElementById("btn").onclick = function () {
        document.getElementById("botoncierreSession").click();

  //  $("#botoncierreSession").trigger("click");
  };


  /*  document.getElementById("guardar").onclick = function () {
      $("botoncierreSession").trigger("onclick");
    };*/
      //document.getElementById("botoncierreSession").click();

    $("#Modalto").modal("show");
    $('#Modalto').on('hidden.bs.modal', function () {
      $("#Modalto").detach();
    });

  }
