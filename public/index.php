<?php 
session_start();

require_once '../Router.php';
require_once '../Database.php';
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';
// exit;
$route = new Router();

$result = $route->dbData();

$route->get('/');
$route->get('/add');
$route->get('/update');

$view = __DIR__.'/../views/'.$route->resolve();
// echo '<pre>';
// var_dump($view);
// echo '</pre>';
// exit;
include_once $view;



?>
