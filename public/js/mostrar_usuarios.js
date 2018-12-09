$(document).on("ready", function () {
  loadData();
});
var search = document.getElementById("busqueda"),
food = document.getElementsByClassName("enlase_usuarios"),
forEach = Array.prototype.forEach;

search.addEventListener("keyup", function (e) {
  var choice = this.value;

  forEach.call(food, function (f) {
    if (f.innerHTML.toLowerCase().search(choice.toLowerCase()) == -1)
    f.style.display = "none";
    else
    f.style.display = "block";
  });
}, false);




var loadData = function () {
  $.ajax({
    type: "POST",
    url: "todosUsuarios",
    statusCode:{
      200: function(data){
        var usuarios = data.content;
        for (var i in usuarios) {

          var imagen;
          if (usuarios[i].descripcion_rol==='Administrador') {
            imagen = "imagenes/admin.png";
          } else if(usuarios[i].descripcion_rol==='Cliente') {
            imagen = "imagenes/cliente.png";
          }
          $("#fila").append('</div>' +
          '<a class="enlase_usuarios" href="editarUsuario?usuario=' + usuarios[i].id_usuario + '"><div class = "col-md-6 col-sm-6">'+
          '<div class="media">' +
          '<div class="media-left">' +
          '<img style=" width:60px; height:60px; bottom:60px; right:40px;" class="media-object img-circle circle-img" src="' +imagen+ '"> ' +
          '</div>' +
          '<div class="media-body">' +
          '<h4  id="colorUsuarios" ><strong>' + usuarios[i].nombre_usuario + '</strong></h4>' +
          '<p href="../Vistas/editar_usuarios.php?usuario=' + usuarios[i].id_usuario + '"></p>'+
          '<h4 id="colortipUsuario"><strong>' + usuarios[i].descripcion_rol + '</strong></h4>' +
          '<hr id="disUsusarios">' +
          '</div>'+
          '</div>' +
          '</div>' +
          '</a>'

        );
      }
    },
    401:function (data) {
      mostrarError(document.formulario,ERROR39 );
      document.getElementById("botoncierreSession").click();
    },
    500: function(){
      mostrarError(document.formulario, ERROR40);

    }

  }

});

};
