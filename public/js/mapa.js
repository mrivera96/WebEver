$(document).on("ready", function () {
    loadData();
});
var loadData = function ()
{
    $.ajax({
        type: "get",
        url: "obtenerPerfil",
        data: {'cto':numct}
}).done(function (data)
{
    var coordenadas = data.content;
    var latitud;
    var longitud;


    for (var i in coordenadas)
    {


        $("#titulo").append(
            '<h3' + coordenadas[i].nombre_organizacion + '</h3>'


        );

        if (coordenadas[i].latitud && coordenadas[i].longitud !== "") {
            var myLatlng = new google.maps.LatLng(latitud = coordenadas[i].latitud, longitud = coordenadas[i].longitud);

            var myOptions = {
                zoom: 15,
                center: myLatlng,
                mapTypeId:google.maps.MapTypeId.ROADMAP,
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            marker = new google.maps.Marker({
                position: myLatlng,
                title: coordenadas[i].nombre_organizacion,

            });

            marker.setMap(map);

        } else {
            latitud = "No disponible";
            longitud = "No disponible";
        }

        $("#map_canvas").append(
            '<h5>ubicación:' + latitud + '</h5>'

        );
    }
});
}