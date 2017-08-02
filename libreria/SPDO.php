<?php
class SPDO extends PDO 
{
	private static $instance = null;

	public function __construct() 
	{
		$config = Config::singleton();
		parent::__construct('sqlsrv:Server=' . $config->get('servername') . ';Database='.$config->get('dbname'), $config->get('dbuser'), $config->get('dbpass'), null);
	}

	public static function singleton() 
	{
		if( self::$instance == null ) 
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
}
?>