<?php

/******************************************************************************************
 *                              CONFIGURACIÓN DE LA API                                   *
 ******************************************************************************************/
session_start();
require __DIR__ . '/../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Database;
use Slim\Views\PhpRenderer;
require __DIR__ . '/credenciales_bd.php';

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
$container['renderer'] = new PhpRenderer(__DIR__ . "/../src/vistas");
/******************************************************************************************
 *                              DEFINICIÓN DE LOS CONTROLADORES                           *
 ******************************************************************************************/
$container['controladorVistas']= function ($container){
    return new App\controladores\controladorVistas($container);
};
$container['controladorCategorias']= function ($container){
    return new App\controladores\controladorCategorias;
};
$container['upload_directory'] = __DIR__ .'/../public/imagenes';

$container['controladorPerfiles']= function ($container){
    return new App\controladores\controladorPerfiles($container['upload_directory']);
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





/******************************************************************************************
 *                  CONFIGURACIÓN DE ELOQUENT PARA LA BASE DE DATOS                       *
 ******************************************************************************************/
$database = new Database;
$database ->addConnection($container['settings']['db']);

$database->setAsGlobal();
$database->bootEloquent();
require __DIR__ . '/../src/routes.php';