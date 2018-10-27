/**********************************************************************************************
 *            Método para acceder a los parametros en $_GET
 **********************************************************************************************/
function $_GET(param) {
    var vars = {};
    window.location.href.replace(location.hash, '').replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function (m, key, value) { // callback
                vars[key] = value !== undefined ? value : '';
            }
    );

    if (param) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}
var cty = $_GET('cty');

$(document).on("ready", function () {
    loadData();
});

//Carga los perfiles de cierta categoria
var loadData = function () {
    $.ajax({
        type: "get",
        url: "../listarPerfiles",
        data: {'ctg': cty},
        
        statusCode:{
          200: function(data){
            var array = data.content;


        var perfiles = data.content;
        var imagen;
        var telefono;

        for (var i in perfiles) {
            if (perfiles[i].imagen != "") {
                imagen = perfiles[i].imagen;
            } else {
                imagen = "../imagenes/iconocontactowhite.png";
            }
            ;
            if (perfiles[i].numero_fijo != "") {
                telefono = perfiles[i].numero_fijo;
            } else {
                telefono = perfiles[i].numero_movil;
            }
            ;
            $("#fila").append('<a class="enlaces_de_listas_contactos" href="PerfilOrganizacion.php?cto=' + perfiles[i].id_contacto + '"><div class = "col-md-4 col-sm-6">' +
                    '<div class="media-list">' +
                    '<div class="media-left">' +
                    '<img  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<h4 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h4>' +
                    '<p>' + telefono + '</p>' +
                    '<p>' + perfiles[i].nombre_region + '</p>' +
                    '</div>' +
                    '</div>' +
                    '<hr/>' +
                    '</div></a>'
                    );
        }
      },
      500: function(data){
        alert(data.message);
      }


    }

    });
};
