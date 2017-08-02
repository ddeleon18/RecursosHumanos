<?php

// Show all information, defaults to INFO_ALL
//phpinfo();

?>

<?php

$usuario= 'sa';
$pass = 'root';
$servidor = 'JASONDIAZGPC\JASON'; 
$basedatos = 'RRHH_Data';

$info = array('Database'=>$basedatos, 'UID'=>$usuario, 'PWD'=>$pass); 
$conexion = sqlsrv_connect($servidor, $info);  


if(!$conexion){

 die( print_r( sqlsrv_errors(), true));

 }

echo 'Conectado';

/*



$query = 'consulta a realizar';
$registros = sqlsrv_query($conexion, $query);





while($row = sqlsrv_fetch_object($registros)){
     
echo "
<br>
$row->nombre
<br>
$row->apellido
<br>
$row->direccion
<br>";
	
}

*/
?>

