<?php

namespace app\components;

class Router{

	private $routes;

	public function __construct()
	{

        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
	}

	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		    return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run(){
		$uri = $this->getURI();

		foreach ($this->routes as $uriPattern => $path) {

			if(preg_match("~$uriPattern~", $uri)) {

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				$segments = explode('/', $internalRoute);
				$controllerName = array_shift($segments).'Controller';

                $controllerName = ucfirst($controllerName);
                $segments = explode('?', $segments[0]);
				$actionName = 'action'.ucfirst(array_shift($segments));

				$parameters = $this->getParams($segments);

				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}

                $result = null;
                $c = 'app\\controllers\\' . $controllerName;

                $controllerObject = new $c;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

				if ($result != null) {
					break;
				}
			}

		}
	}

	private function getParams($data){
        $params = [];
        if (empty($data[0]))
            return $params;

        $data = $data[0];
        $data = explode('&', $data);

	    foreach ($data as $item) {
            $segments = explode('=', $item);
            $params[$segments[0]] = $segments[1];
        }
        return $params;
    }
}
