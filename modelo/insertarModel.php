<?php
class insertarModel extends ModelBase
	{
		/*Todas las Funciones para insertar registros son básicamente similares solo difieren en la consulta y en los parametros que reciben para hacer la consulta.
                 * Se crea una nueva consulta.
                 * Luego se ejecuta la consulta y se verifica con el if si regresó un resultado.
                 * Si es así la variable respuesta que sirve para saber si se ejecutó con exito la consulta cambia a valor 1
                 * Si respuesta es 1 se ejecutó con éxito, si respuesta es 0 hubo un error.
                 * Si no contiene nada la consulta se retorna respuesta con su valor por defecto que es 0.
                 */
            public function Empleado($CodEmpleado, $Nombres, $Apellidos, $Direccion, $TelefonoCelular, $TelefonoResidencial, $Genero, $CUI, $NIT, $Estado, $FechaNacimiento, $FechaIngreso, $Puesto, $Nacionalidad, $NoLicencia, $NoPasaporte, $Email, $IdDepartamento, $IdCatalogoHorario, $Salario)
			{
				
                $consulta=$this->db->prepare('INSERT INTO Empleado(CodEmpleado, Nombres, Apellidos, Direccion, TelefonoCelular, TelefonoResidencial, Genero, CUI, NIT, Estado, FechaNacimiento, FechaIngreso, FechaBaja, Puesto, Nacionalidad, NoLicencia, NoPasaporte, Email, VacacionesAcumuladas, IdDepartamento, IdCatalogoHorario, Salario) 
                                                VALUES(\''.$CodEmpleado.'\',\''. $Nombres.'\',\''.$Apellidos.'\',\''.$Direccion.'\',\''.$TelefonoCelular.'\',\''.$TelefonoResidencial.'\',\''.$Genero.'\',\''.$CUI.'\',\''.$NIT.'\',\''.$Estado.'\',\''.$FechaNacimiento.'\',\''.$FechaIngreso.'\', NULL ,\''.$Puesto.'\',\''.$Nacionalidad.'\',\''.$NoLicencia.'\',\''.$NoPasaporte.'\',\''.$Email.'\', 0 ,'.$IdDepartamento.','.$IdCatalogoHorario.','.$Salario.')');
				                
                if($consulta->execute())
                    $_POST['respuesta']=1;
                else
                    $_POST['respuesta']=0;
			}

		    public function Permiso($FechaAprobacion, $FechaInicio, $FechaFin, $DiasPermiso, $IdEmpleado, $IdTipoPermiso, $MotivoPermiso, $SalarioPermiso)
            {
                $consulta=$this->db->prepare('INSERT INTO Permiso(FechaAprobacion, FechaInicio, FechaFin, DiasPermiso, IdEmpleado, IdTipoPermiso, MotivoPermiso, SalarioPermiso) 
                                                VALUES(\''.$FechaAprobacion.'\', CONVERT(datetime,\''. $FechaInicio.'\', 120), CONVERT(datetime,\''.$FechaFin.'\',120),\''.$DiasPermiso.'\',\''.$IdEmpleado.'\',\''.$IdTipoPermiso.'\',\''.$MotivoPermiso.'\',\''.$SalarioPermiso.'\')');
                if($consulta->execute())
                    $_POST['respuesta']=1;
                else
                    $_POST['respuesta']=0;
            }

            public function Suspension($Fecha, $Dias, $Salario, $Motivo, $IdEmpleado)
            {
                $consulta=$this->db->prepare('INSERT INTO Suspension(Fecha, Dias, Monto, Motivo, IdEmpleado) 
                                                VALUES(CONVERT(datetime,\''. $Fecha.'\', 120),\''.$Dias.'\',\''.$Salario.'\',\''.$Motivo.'\',\''.$IdEmpleado.'\')');
                if($consulta->execute())
                    $_POST['respuesta']=1;
                else
                    $_POST['respuesta']=0;
            }
            
            
	}
?>
