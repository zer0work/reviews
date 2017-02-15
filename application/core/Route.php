<?php

class Route {

	static function start() {
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// добавляем префиксы
		$model_name = 'Model_'. ucfirst($controller_name);
		$controller_name = 'Controller_'. ucfirst($controller_name);
		$action_name = 'action_'. ucfirst($action_name);

		// подцепляем файл с классом модели

		$model_file = $model_name.'.php';
		$model_path = __DIR__ . '/application/models/'.$model_file;

		// подцепляем файл с классом контроллера
		$controller_file = $controller_name.'.php';
		$controller_path = __DIR__ . '/application/controllers/'.$controller_file;
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action)) {
			// вызываем действие контроллера
			$controller->$action();
		}

	}

}
?>