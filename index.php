<?php
require('autoloader.php');
spl_autoload_register('autoload');
define('ROOT_URL', 'http://www.bearcreation.net/p5/');
session_start();

try{
	$action=$_GET['action'];
	$actionArray = explode('-', $action);
	if (count($actionArray) < 2 ){
		throw new Exception("Error Processing Request", 1);	
	}
	$controllerStr= '\\Controller\\' . $actionArray[0];
	$controller = new $controllerStr();
	if(!is_object($controller)){
		throw new Exception("Error Processing Request", 1);	
	}
	$method= $actionArray[1];
	$controller->$method();
	
}catch(Exception $e){
	$controller = new Controller\MainController();
	$controller->displayHomePage();
}
