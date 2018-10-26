<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../vendor/autoload.php';
require_once '../modelo/modelo_usuarios.php';
use Slim\Views\PhpRenderer;
// Instantiate the app

$app = new \Slim\App();
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./vistas");

$app -> get('/', function (Request $request, Response $response){
    return $this->renderer->render($response, "/inicio.php");

});
$app -> get('/login', function (Request $request, Response $response){
    return $this->renderer->render($response, "/login.php");

});

$app -> get('/{usuario}', function (Request $request, Response $response, $args){
    $modelo = new ModeloUsuarios();
    if(!$modelo ->usuarioExiste($args['usuario'])){
        echo "Usuario existe";
    }else{
        echo "NO existe";
    }

});

// Run app
$app->run();
