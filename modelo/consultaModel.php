<?php
class consultaModel extends ModelBase
	{
		/*Todas las Funciones para ver registros son básicamente similares solo difieren en la consulta.
                 * Se crea una nueva consulta.
                 * Luego se ejecuta la consulta.
                 * Posteriormente se retorna el resultado.
                 */ 
            public function verusuarios()
			{
				$consulta=$this->db->prepare('SELECT * FROM Usuario');
				$consulta->execute();
				return $consulta;
			}

			public function verdepartamentos()
			{
				$consulta=$this->db->prepare('SELECT * FROM Departamento');
				$consulta->execute();
				return $consulta;
			}

			public function verhorarios()
			{
				$consulta=$this->db->prepare('SELECT * FROM CatalogoHorario');
				$consulta->execute();
				return $consulta;
			}
			
			public function IdDepartamento($departamento)
			{
				$consulta=$this->db->prepare('SELECT IdDepartamento FROM Departamento WHERE Nombre = \''.$departamento.'\'');
				$IdDep = $consulta->execute();
				return $IdDep;
			}
			
			public function IdCatalogoHorario($horario)
			{
				$consulta=$this->db->prepare('SELECT IdCatalogoHorario FROM CatalogoHorario WHERE Nombre = \''.$horario.'\'');
				$IdCat = $consulta->execute();
				return $IdCat;
			}
			
			public function verEmpleado($codEmpleado)
			{
				$consulta=$this->db->prepare('SELECT * FROM Empleado WHERE CodEmpleado = \''.$codEmpleado.'\'');
				$consulta->execute();
				return $consulta;
			}
			
			public function consultarEmpleados()
			{
				$consulta=$this->db->prepare('SELECT * FROM Empleado');
				$consulta->execute();
				return $consulta;
			}
			
			public function verPermisos($CodEmpleado)
			{
				$consulta=$this->db->prepare('SELECT PMS.*, EMP.IdEmpleado, TP.Nombre AS NombrePermiso FROM Permiso PMS INNER JOIN Empleado EMP ON PMS.IdEmpleado = EMP.IdEmpleado AND  EMP.CodEmpleado = \''.$CodEmpleado.'\' INNER JOIN TipoPermiso TP ON TP.IdTipoPermiso = PMS.IdTipoPermiso');
				$consulta->execute();
				return $consulta;
			}
			
			public function verPermisosId($IdEmpleado)
			{
				$consulta=$this->db->prepare('SELECT PMS.*, EMP.IdEmpleado, TP.Nombre AS NombrePermiso FROM Permiso PMS INNER JOIN Empleado EMP ON PMS.IdEmpleado = EMP.IdEmpleado AND  EMP.IdEmpleado = \''.$IdEmpleado.'\' INNER JOIN TipoPermiso TP ON TP.IdTipoPermiso = PMS.IdTipoPermiso');
				$consulta->execute();
				return $consulta;
			}
			
			public function verTipoPermisos()
			{
				$consulta=$this->db->prepare('SELECT * FROM TipoPermiso');
				$consulta->execute();
				return $consulta;
			}

			public function verSuspensiones($CodEmpleado)
			{
				$consulta=$this->db->prepare('SELECT SPN.*, EMP.IdEmpleado FROM Suspension SPN INNER JOIN Empleado EMP ON SPN.IdEmpleado = EMP.IdEmpleado AND  EMP.CodEmpleado = \''.$CodEmpleado.'\'');
				$consulta->execute();
				return $consulta;
			}

			public function verSuspension($IdSuspension)
			{
				$consulta=$this->db->prepare('SELECT * FROM Suspension WHERE IdSuspension = \''.$IdSuspension.'\'');
				$consulta->execute();
				return $consulta;
			}


			public function verSuspensionesID($IdEmpleado)
			{
				$consulta=$this->db->prepare('SELECT SPN.*, EMP.IdEmpleado FROM Suspension SPN INNER JOIN Empleado EMP ON SPN.IdEmpleado = EMP.IdEmpleado AND  EMP.IdEmpleado = \''.$IdEmpleado.'\'');
				$consulta->execute();
				return $consulta;
			}
			
			public function IdTipoPermiso($TipoPermiso)
			{
				$consulta=$this->db->prepare('SELECT IdTipoPermiso FROM TipoPermiso WHERE Nombre = \''.$TipoPermiso.'\'');
				$IdTipoP = $consulta->execute();
				return $IdTipoP;
			}
			
			public function verPermiso($IdPermiso)
			{
				$consulta=$this->db->prepare('SELECT SUBSTRING(CONVERT(nvarchar, FechaInicio, 120), 0, 11) AS FechaInicioD, SUBSTRING(CONVERT(nvarchar, FechaInicio, 120), 12, 23) as HoraInicioD, SUBSTRING(CONVERT(nvarchar, FechaFin, 120), 0, 11) AS FechaFinD, SUBSTRING(CONVERT(nvarchar, FechaFin, 120), 12, 23) as HoraFinD, * FROM Permiso WHERE IdPermiso = \''.$IdPermiso.'\'');
				$consulta->execute();
				return $consulta;
			}
	}
  
?>
