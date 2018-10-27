<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../vendor/autoload.php';
require_once '../modelo/modelo_usuarios.php';
require_once '../controladores/controlador_categorias.php';
require_once '../controladores/controlador_perfiles.php';
require_once '../controladores/controlador_usuarios.php';
use Slim\Views\PhpRenderer;
// Instantiate the app

$app = new \Slim\App(['settings'=>['displayErrorDetails'=>true]]);
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./vistas");

$app -> get('/', function (Request $request, Response $response){
    return $this->renderer->render($response, "/inicio.php");
});

$app -> get('/categorias', \controladorCategorias::class . ':obtenerCategorias');
$app -> get('/listarPerfiles', \controladorPerfiles::class . ':listarPerfiles');
$app -> get('/obtenerPerfil', \controladorPerfiles::class . ':obtenerPerfil');
$app -> get('/buscar', \controladorPerfiles::class . ':buscar');
$app -> post('/crearUsuario', \controladorUsuarios::class . ':crearUsuario');
$app -> post('/eliminarUsuario', \controladorUsuarios::class . ':eliminarUsuario');
$app -> post('/actualizarUsuario', \controladorUsuarios::class . ':actualizarUsuario');
$app -> post('/loginUsuario', \controladorUsuarios::class . ':loginUsuario');





// Run app
$app->run();
