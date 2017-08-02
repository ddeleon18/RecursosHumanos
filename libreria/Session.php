<?php

class Sesion
{
	function Sesion()
	{

	
	}

public function set($nombre,$valor)
	{
		$_SESSION[$nombre] = $valor;
	}
	

public function get($nombre)
	{
		if (isset($_SESSION[$nombre])) {
			return $_SESSION[$nombre];
		} 
	
		else {
			return false;
		}
	}
	
public function borrar_variable($nombre)
	{
		session_start(); 
		unset ($_SESSION[$nombre]);
	}
	
public function borrar_sesion()
	{
		$_SESSION = array();
		session_destroy();
	}
}
?>