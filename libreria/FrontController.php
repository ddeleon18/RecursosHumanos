<?php
class FrontController
{
	static function main()
	{
		//Incluimos algunas clases:
		require 'libreria/Config.php'; //de configuracion
		require 'libreria/SPDO.php'; //PDO con singleton
		require 'libreria/ControllerBase.php'; //Clase controlador base
		require 'libreria/ModelBase.php'; //Clase modelo base
		require 'libreria/View.php'; //Mini motor de plantillas
		require 'config.php'; //Archivo con configuraciones.

		//Con el objetivo de no repetir nombre de clases, nuestros controladores
		//terminaran todos en Controller. Por ej, la clase controladora Items, sería ItemsController

		//Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
		if(! empty($_POST['controlador']))
		      $controllerName = $_POST['controlador'] . 'Controller';
		else
		      $controllerName = "IndexController";
		//Lo mismo sucede con las acciones, si no hay accion, tomamos index como accion
		if(! empty($_POST['accion']))
		      $actionName = $_POST['accion'];
		else
		      $actionName = "index";

		$controllerPath = $config->get('controllersFolder') . $controllerName . '.php';
		//Incluimos el fichero que contiene nuestra clase controladora solicitada
		
		if(is_file($controllerPath))
		      require $controllerPath;
		else
		      die('El controlador no existe - 404 not found');
		//Si no existe la clase que buscamos y su accion, tiramos un error 404
		
		if (is_callable(array($controllerName, $actionName)) == false)
		{
			trigger_error ($controllerName . '->' . $actionName . '` no existe en el controlador ' . $controllerName, E_USER_NOTICE);
			return false;
		}
		//Si todo esta bien, creamos una instancia del controlador y llamamos a la accion
		$controller = new $controllerName();
		$controller->$actionName();
	}
}
?>
