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
$app -> get('/inicio', 'controladorVistas:index');
$app -> get('/', 'controladorVistas:index');

$app -> get('/acercade', 'controladorVistas:acercade');
$app -> get('/resultados', 'controladorVistas:resultados');
$app -> get('/perfiles', 'controladorVistas:perfiles');
$app -> get('/perfil', 'controladorVistas:perfil');
$app -> get('/mapa','controladorVistas:mapa' );
$app -> get('/registro', 'controladorVistas:registro');


        /**
         * **************************************************************************************
         *           RUTAS PARA LAS VISTAS QUE SI NECESITAN LOGUEO                              *
         * **************************************************************************************
         **/

$app -> get('/login', 'controladorVistas:login');
$app -> get('/usuarios', 'controladorVistas:usuarios');
$app -> get('/nuevoUsuario', 'controladorVistas:nuevoUsuario');
$app -> get('/editarUsuario','controladorVistas:editarUsuario');
$app -> get('/administrarPerfiles','controladorVistas:administrarPerfiles');
$app -> get('/nuevoPerfilAdmin','controladorVistas:nuevoPerfilAdmin');
$app -> get('/editarPerfilAdmin','controladorVistas:editarPerfilAdmin');
$app -> get('/solicitudesNuevas','controladorVistas:solicitudesNuevas');
$app -> get('/solicitudesRechazadas','controladorVistas:solicitudesRechazadas');
$app -> get('/perfilesEliminados','controladorVistas:perfilesEliminados');
$app -> get('/panelControlCliente','controladorVistas:panelControlCliente');
$app -> get('/contactosAprobadosCliente','controladorVistas:contactosAprobadosCliente');
$app -> get('/contactosEliminadosCliente','controladorVistas:contactosEliminadosCliente');
$app -> get('/contactosPendientesCliente','controladorVistas:contactosPendientesCliente');
$app -> get('/editarUsuarioCliente','controladorVistas:editarUsuarioCliente');
$app -> get('/editarPerfilCliente','controladorVistas:editarPerfilCliente');
$app -> get('/nuevoPerfilCliente','controladorVistas:nuevoPerfilCliente');



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
$app -> get('/prueba', 'controladorUsuarios:pruebas');

//Perfiles
$app -> get('/listarPerfiles', 'controladorPerfiles:listarPerfiles');
$app -> get('/obtenerPerfil', 'controladorPerfiles:obtenerPerfil');
$app -> get('/buscar', 'controladorPerfiles:buscar');
//Regiones
$app -> get('/regiones', 'controladorRegiones:todasRegiones');

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



//Perfiles
$app -> post('/crearPerfil', 'controladorPerfiles:crearPerfil');
$app -> post('/eliminarPerfil', 'controladorPerfiles:eliminarPerfil');
$app -> post('/actualizarPerfil', 'controladorPerfiles:actualizarPerfil');
$app -> post('/gestionarSolicitud', 'controladorPerfiles:gestionarSolicitud');
$app -> post('/obtenerPerfilesCliente', 'controladorPerfiles:obtenerPerfilesCliente');






