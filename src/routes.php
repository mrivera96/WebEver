<?php


/**
 * **************************************************************************************
 *                                  RUTAS PARA LAS VISTAS                               *
 * **************************************************************************************
 **/

        /**
         * **************************************************************************************
         *           RUTAS PARA LAS VISTAS QUE NO NECESITAN LOGUEO                              *
         * **************************************************************************************
         **/
$app -> get('/inicio', function ( $request,  $response){
    return $this->renderer->render($response, "/inicio.php");
});

$app -> get('/acercade', function ( $request,  $response){
    return $this->renderer->render($response, "/acercadeweb.php");
});
$app -> get('/resultados', function ( $request,  $response){
    return $this->renderer->render($response, "/resultado_busqueda.php");
});
$app -> get('/perfiles', function ( $request,  $response){
    return $this->renderer->render($response, "/listaDeContactos.php");
});
$app -> get('/perfil', function ( $request,  $response){
    return $this->renderer->render($response, "/PerfilOrganizacion.php");
});
$app -> get('/mapa', function ( $request,  $response){
    return $this->renderer->render($response, "/mapa.php");
});
$app -> get('/registro', function ( $request,  $response){
    return $this->renderer->render($response, "/registrarCuentaUsuario.php");
});



        /**
         * **************************************************************************************
         *           RUTAS PARA LAS VISTAS QUE SI NECESITAN LOGUEO                              *
         * **************************************************************************************
         **/

$app -> get('/login', function ($request, $response){
    switch(redirectionLogin()){
        case 0:
            return $this->renderer->render($response, "/login.php");
            break;
        case 1:
            return $response->withHeader('Location','usuarios');
            break;
        case 2:
            return $response->withHeader('Location','panelControlCliente');
            break;

    };
});




$app -> get('/usuarios', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $this->renderer->render($response, "/mostrar_usuarios.php");
            break;
        case 2:
            return $response ->withHeader('Location','inicio');
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});
$app -> get('/nuevoUsuario', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $this->renderer->render($response, "/formulario_registro.php");
            break;
        case 2:
            return $response ->withHeader('Location','inicio');
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});

$app -> get('/editarUsuario', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $this->renderer->render($response, "/editar_usuarios.php");
            break;
        case 2:
            return $response ->withHeader('Location','inicio');
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});

$app -> get('/administrarPerfiles', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $this->renderer->render($response, "/administracion-de-perfiles.php");
            break;
        case 2:
            return $response ->withHeader('Location','inicio');
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});
$app -> get('/solicitudesNuevas', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $this->renderer->render($response, "/nuevas-solicitudes.php");
            break;
        case 2:
            return $response ->withHeader('Location','inicio');
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});
$app -> get('/solicitudesRechazadas', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $this->renderer->render($response, "/solicitudes-rechazadas.php");
            break;
        case 2:
            return $response ->withHeader('Location','inicio');
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});
$app -> get('/perfilesEliminados', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $this->renderer->render($response, "/perfiles-eliminados.php");
            break;
        case 2:
            return $response ->withHeader('Location','inicio');
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});
$app -> get('/panelControlCliente', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $response ->withHeader('Location','inicio');
            break;
        case 2:
            return $this->renderer->render($response, "/contactosUsuario.php");
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});
$app -> get('/contactosAprobadosCliente', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $response ->withHeader('Location','inicio');
            break;
        case 2:
            return $this->renderer->render($response, "/contactosUsuarioAprobado.php");
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});
$app -> get('/contactosEliminadosCliente', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $response ->withHeader('Location','inicio');
            break;
        case 2:
            return $this->renderer->render($response, "/contactosUsuarioEliminado.php");
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});
$app -> get('/contactosPendientesCliente', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $response ->withHeader('Location','inicio');
            break;
        case 2:
            return $this->renderer->render($response, "/contactosUsuariosPendientes.php");
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});
$app -> get('/editarUsuarioCliente', function ( $request,  $response){

    switch (verificarLogin()){
        case 1:
            return $response ->withHeader('Location','inicio');
            break;
        case 2:
            return $this->renderer->render($response, "/editarUsuarioNormal.php");
            break;
        case 0:
            return $response ->withHeader('Location','inicio');
            break;
    }

});



/**
 * **************************************************************************************
 *                                  RUTAS PARA LOS SERVICIOS                            *
 * **************************************************************************************
 **/

        /**
         * **************************************************************************************
         *              RUTAS PARA SERVICIOS QUE NO NECESITAN AUTENTICACIÓN                     *
         * **************************************************************************************
         **/
//Categorias
$app -> get('/categorias', 'controladorCategorias:obtenerCategorias');

//Perfiles
$app -> get('/listarPerfiles', 'controladorPerfiles:listarPerfiles');
$app -> get('/obtenerPerfil', 'controladorPerfiles:obtenerPerfil');
$app -> get('/buscar', 'controladorPerfiles:buscar');


        /**
         * **************************************************************************************
         *              RUTAS PARA SERVICIOS QUE SI NECESITAN AUTENTICACIÓN                     *
         * **************************************************************************************
         **/

//Usuarios
$app -> post('/crearUsuario', 'controladorUsuarios:crearUsuario');
$app -> post('/eliminarUsuario', 'controladorUsuarios:eliminarUsuario');
$app -> post('/actualizarUsuario', 'controladorUsuarios:actualizarUsuario');
$app -> post('/loginUsuario', 'controladorUsuarios:loginUsuario');
$app -> post('/existeUsuario', 'controladorUsuarios:existeUsuario');
$app -> post('/existeEmail', 'controladorUsuarios:existeEmail');

$app -> post('/obtenerUsuario', 'controladorUsuarios:obtenerUsuario');
$app -> post('/todosUsuarios', 'controladorUsuarios:todos');
$app -> get('/cerrarSession', 'controladorUsuarios:cerrarSesion');
//Roles
$app -> post('/roles', 'controladorRoles:todosRoles');
//Regiones
$app -> get('/regiones', 'controladorRegiones:todasRegiones');
//Perfiles
$app -> post('/crearPerfil', 'controladorPerfiles:crearPerfil');
$app -> post('/eliminarPerfil', 'controladorPerfiles:eliminarPerfil');
$app -> post('/actualizarPerfil', 'controladorPerfiles:actualizarPerfil');

/**
 * **************************************************************************************
 *              función de redirección del login                                        *
 * **************************************************************************************
 **/
function redirectionLogin(){
    if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {

        if (($_SESSION['rol'] == 2)) {
            return 2;
        } else if (($_SESSION['rol'] == 1)) {
            return 1;
        }
    }else{
        return 0;
    }

}
/**
 * **************************************************************************************
 *                            FUNCIÓN QUE VERIFICA SI ESTÁ LOGUEADO                     *
 * **************************************************************************************
 **/
function verificarLogin(){
    if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
        if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
            return 1;
        }else if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
            return 2;
        }
    }else{
        return 0;
    }
}




