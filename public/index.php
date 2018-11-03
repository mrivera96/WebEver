<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once '../vendor/autoload.php';
require_once '../config/config.php';
require_once '../config/ApiResponse.php';
require_once '../controladores/controlador_categorias.php';
require_once '../controladores/controlador_perfiles.php';
require_once '../controladores/controlador_usuarios.php';



use Slim\Views\PhpRenderer;


// Instantiate the app

$app = new \Slim\App(['settings'=>['displayErrorDetails' => true,]]);

$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./vistas");

//VISTAS
$app -> get('/', function (Request $request, Response $response){
    return $this->renderer->render($response, "/inicio.php");
});
$app -> get('/login', function (Request $request, Response $response){
    return $this->renderer->render($response, "/login.php");
});
$app -> get('/perfiles', function (Request $request, Response $response){
    return $this->renderer->render($response, "/listaDeContactos.php");
});




$app -> get('/categorias', \controladorCategorias::class . ':obtenerCategorias');

//Perfiles
$app -> get('/listarPerfiles', \controladorPerfiles::class . ':listarPerfiles');
$app -> get('/obtenerPerfil', \controladorPerfiles::class . ':obtenerPerfil');
$app -> get('/buscar', \controladorPerfiles::class . ':buscar');
//Usuarios
$app -> post('/crearUsuario', \controladorUsuarios::class . ':crearUsuario');
$app -> post('/eliminarUsuario', \controladorUsuarios::class . ':eliminarUsuario');
$app -> post('/actualizarUsuario', \controladorUsuarios::class . ':actualizarUsuario');
$app -> post('/loginUsuario', \controladorUsuarios::class . ':loginUsuario');
$app -> post('/existeUsuario', \controladorUsuarios::class . ':existeUsuario');
$app -> post('/existeEmail', \controladorUsuarios::class . ':existeEmail');
$app -> post('/pruebas', \controladorUsuarios::class . ':pruebas');
$app -> get('/todosUsuarios', \controladorUsuarios::class . ':todos');





// Run app
$app->run();