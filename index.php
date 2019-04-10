<?php


define('ROOT', dirname(__FILE__));

require 'vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);


$router = new \app\components\Router();
$router->run();