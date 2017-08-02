<?php
$config = Config::singleton();

$config->set('controllersFolder', 'controlador/');
$config->set('modelsFolder', 'modelo/');
$config->set('viewsFolder', 'vista/');
$config->set('servername', 'JASONDIAZGPC\JASON');
$config->set('dbname', 'RRHH_Data');
$config->set('dbuser', 'sa');
$config->set('dbpass', 'root');
$connectionInfo = array( "Database"=>"RRHH_Data2", "UID"=>"sa", "PWD"=>"root");
$config->set("connectionInfo", $connectionInfo);
?>