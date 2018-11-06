 /**********************************************************************************************
     *            FUNCIÓN PARA BUSCAR ENTRE LOS PERFILES
     **********************************************************************************************/

var search = document.getElementById("search"),
    food = document.getElementsByClassName("enlaces_de_listas_contactos"),
    forEach = Array.prototype.forEach;

search.addEventListener("keyup", function(e){
    var choice = this.value;

    forEach.call(food, function(f){
        if (f.innerHTML.toLowerCase().search(choice.toLowerCase()) == -1)
            f.style.display = "none";
        else
            f.style.display = "block";
    });
}, false);

$(document).on("ready", function () {
    loadData();
});

 /**********************************************************************************************
     *            FUNCIÓN AJAX PARA MOSTRAR LOS PERFILES ACTIVOS
     **********************************************************************************************/
var loadData = function () {
    $.ajax({
        type: "GET",
        url: "listarPerfiles"
    }).done(function (data) {

        var perfiles = data.content;
        var imagen;


        for (var i in perfiles) {
            if (perfiles[i].imagen !== "") {
                imagen = perfiles[i].imagen;
            } else {
                imagen = "imagenes/iconocontactowhite.png";
            }
            ;

            $("#fila").append(
                    '<a class="enlaces_de_listas_contactos" href="editar-perfil.php?cto=' + perfiles[i].id_contacto + '"><div class = "col-md-4 col-sm-6">' +
                        '<div class="media">' +
                            '<div class="media-left">' +
                            '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                            '</div>' +
                            '<div class="media-body">' +
                            '<h4 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h4>' +
                            '<p>Usuario Propietario:</p>' +
                            '<p>' + perfiles[i].nombre_usuario + '</p>' +
                            '</div>' +
                        '</div>' +
                        '<hr style="margin-left:140px"/>' +
                        '</div>'+
                    '</a>'
                    );
        }
    });
};
