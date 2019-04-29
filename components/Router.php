<?php

/**
 * 
 */
class Router
{
	
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT . '/config/routes.php';
		$this->routes = include($routesPath);
	}

	/**
	 * Returns request string
	 * @return string
	 */
	private function getURI()
	{
		if(!empty($_SERVER['REQUEST_URI']))
		{
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{

		$uri = $this->getURI();
		

		// check 
		foreach ($this->routes as $uriPattern => $path)
		{
			if(preg_match("~$uriPattern~", $uri))
			{
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				// define Controller, action and parameters
				$segments = explode('/', $internalRoute);
				$controllerName = ucfirst(array_shift($segments)) . 'Controller';
				$actionName = 'action' . ucfirst(array_shift($segments));

				$parameters = $segments;


				// include file Controller
				$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

				if(file_exists($controllerFile))
				{
					include_once($controllerFile);
				}

				//create object and call action
				$controllerObject = new $controllerName;
				$result = call_user_func_array([$controllerObject, $actionName], $parameters);
				if ($result != null)
				{
					break;
				}
			}
		}
	}
}






