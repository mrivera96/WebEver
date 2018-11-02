<?php
use Illuminate\Database\Capsule\Manager as Database;
require_once 'credenciales_bd.php';
$database = new Database;
$database ->addConnection([
    'driver' => 'mysql',
    'host' => HOST,
    'database' => DATABASE,
    'username' => USER,
    'password' => PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$database->setAsGlobal();
$database->bootEloquent();
