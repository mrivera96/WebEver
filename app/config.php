<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Database;
use Slim\Views\PhpRenderer;
require __DIR__ . '/credenciales_bd.php';


// Instantiate the app

$app = new \Slim\App([
    'settings'=>['displayErrorDetails' => true,
        'db'=>[
            'driver' => 'mysql',
            'host' => HOST,
            'database' => DATABASE,
            'username' => USER,
            'password' => PASSWORD,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''

        ]
    ]

]);

$container = $app->getContainer();
$container['controladorCategorias']= function ($container){
    return new App\controladores\controladorCategorias;
};
$container['controladorPerfiles']= function ($container){
    return new App\controladores\controladorPerfiles;
};
$container['controladorUsuarios']= function ($container){
    return new App\controladores\controladorUsuarios;
};
$container['controladorRoles']= function ($container){
    return new App\controladores\controladorRoles;
};
$container['controladorRegiones']= function ($container){
    return new App\controladores\controladorRegiones;
};

$container['renderer'] = new PhpRenderer(__DIR__ . "/../src/vistas");

$database = new Database;
$database ->addConnection($container['settings']['db']);

$database->setAsGlobal();
$database->bootEloquent();
require __DIR__ . '/../src/routes.php';