<?php


namespace app\components;


use ReflectionClass;

abstract class Controller
{

    protected function render($view, $params = []){
        $views = ROOT . '/views';

        $controller = $this->getControllerName();

        $content = $views . '/' . $controller . '/' . $view . '.php';
        require_once($views . '/layout/main.php');
        return true;
    }

    protected function goToIndex(){
        $controller = $this->getControllerName();

        $uri = $_SERVER['HTTP_ORIGIN']."/" . $controller;

        header("Location: $uri");

        exit;
    }


    private function getControllerName(){
        $reflect = new ReflectionClass(get_called_class());
        $className = $reflect->getShortName();

        $controller = lcfirst(str_replace('Controller', '', $className));

        return $controller;
    }
}