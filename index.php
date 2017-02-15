<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
	//автозагрузка
	function loadFromClasses($class) {
		if ( file_exists(__DIR__ . '/application/' . $class . '.php') ) {
			require_once __DIR__ . '/application/' . $class . '.php';
		}
		elseif ( file_exists(__DIR__ . '/application/core/' . $class . '.php') ) {
			require_once __DIR__ . '/application/core/' . $class . '.php' ;
		}
		elseif ( file_exists(__DIR__ . '/application/controllers/' . $class . '.php') ) {
			require_once __DIR__ . '/application/controllers/' . $class . '.php';
		}
		elseif ( file_exists(__DIR__ . '/application/models/' . $class . '.php') ) {
			require_once __DIR__ . '/application/models/' . $class . '.php' ;
		}
		elseif ( file_exists(__DIR__ . '/application/views/' . $class . '.php') ) {
			require_once __DIR__ . '/application/views/' . $class . '.php' ;
		}
		
	}
	
	spl_autoload_register('loadFromClasses');

	Route::start(); // запускаем маршрутизатор

?>