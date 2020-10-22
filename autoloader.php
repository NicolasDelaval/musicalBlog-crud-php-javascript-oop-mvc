<?php

function autoload($class)
{
	$path_array= explode("\\", $class);
	$file= array_pop($path_array);
	$path= array_reduce($path_array, function($carry, $item){
		return $carry . strtolower($item) . '/';
	});
	
	include($path . $file . '.php');
}