<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new gestion\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "StageController@index");
$router->get('/delete', "StageController@showDelete");

$router->post("/insert", "StageController@insert");

$router->run();