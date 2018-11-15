/**********************************************************************************************
    *            MODAL QU MUESTRAR EL ERROR DE LA BASE
    **********************************************************************************************/
    function mostrarError(componente, error) {

      $("#formulario").append('<div class="modal fade" id="Modal3" tabindex="-1" role="dialog">' +
      '<div class="modal-dialog" role="document">' +
      '<div class="modal-content">' +
      '<div class="modal-header">' +
      '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al Cargar.</h5>' +
      '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span>' +
      '</button>' +
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
