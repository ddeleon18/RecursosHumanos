<?php
class actualizarModel extends ModelBase
	{
		public function modificarEmpleado($CodEmpleadoNuevo,$Nombres,$Apellidos,$Direccion,$TelefonoCelular,$TelefonoResidencial,$Genero,$CUI,$NIT,$Estado,$FechaNacimiento,$FechaIngreso,$Puesto,$Nacionalidad,$NoLicencia,$NoPasaporte,$Email,$IdDepartamento,$IdCatalogoHorario,$Salario,$CodEmpleadoAnterior)
		{
			$consulta=$this->db->prepare('UPDATE Empleado SET CodEmpleado = \''.$CodEmpleadoNuevo.'\', Nombres = \''.$Nombres.'\', Apellidos = \''.$Apellidos.'\', Direccion  = \''.$Direccion.'\', TelefonoCelular = \''.$TelefonoCelular.'\', TelefonoResidencial = \''.$TelefonoResidencial.'\', Genero  = \''.$Genero.'\', CUI = \''.$CUI.'\', NIT = \''.$NIT.'\', Estado = \''.$Estado.'\', FechaNacimiento  = \''.$FechaNacimiento.'\', FechaIngreso  = \''.$FechaIngreso.'\', Puesto  = \''.$Puesto.'\', Nacionalidad  = \''.$Nacionalidad.'\', NoLicencia  = \''.$NoLicencia.'\', NoPasaporte  = \''.$NoPasaporte.'\', Email  = \''.$Email.'\', IdDepartamento  = \''.$IdDepartamento.'\', IdCatalogoHorario  = \''.$IdCatalogoHorario.'\', Salario  = \''.$Salario.'\' WHERE CodEmpleado = \''.$CodEmpleadoAnterior.'\'');
			
			if($consulta->execute())
                $_POST['respuesta']=1;
            else
                $_POST['respuesta']=0;
            return ($_POST['respuesta']);
		}

		public function modificarPermiso($FechaAprobacion,$FechaInicio,$FechaFin,$DiasPermiso,$IdTipoPermiso,$MotivoPermiso,$SalarioPermiso,$IdPermiso)
		{
			$consulta=$this->db->prepare('UPDATE Permiso SET FechaAprobacion = \''.$FechaAprobacion.'\', FechaInicio = CONVERT(datetime,\''. $FechaInicio.'\', 120), FechaFin = CONVERT(datetime,\''.$FechaFin.'\',120), DiasPermiso = \''.$DiasPermiso.'\', IdTipoPermiso = '.$IdTipoPermiso.', MotivoPermiso = \''.$MotivoPermiso.'\', SalarioPermiso = \''.$SalarioPermiso.'\' WHERE IdPermiso = \''.$IdPermiso.'\'');

			if($consulta->execute())
                $_POST['respuesta']=1;
            else
                $_POST['respuesta']=0;
            return ($_POST['respuesta']);
		}

		public function modificarSuspension($Fecha,$Dias,$Monto,$Motivo,$IdSuspension)
		{
			$consulta=$this->db->prepare('UPDATE Suspension SET Fecha = \''.$Fecha.'\', Dias = \''.$Dias.'\', Monto = \''.$Monto.'\', Motivo = \''.$Motivo.'\' WHERE IdSuspension = \''.$IdSuspension.'\'');
			
			if($consulta->execute())
                $_POST['respuesta']=1;
            else
                $_POST['respuesta']=0;
            return ($_POST['respuesta']);
		}
    }
?>
