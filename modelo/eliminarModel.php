<?php
class eliminarModel extends ModelBase
	{
		public function eliminarEmpleado($codEmpleado)
		{
			$consulta=$this->db->prepare('DELETE FROM Empleado WHERE CodEmpleado = \''.$codEmpleado.'\'');
            if($consulta->execute())
                $_POST['respuesta']=1;
            else
                $_POST['respuesta']=0;
		}

		public function eliminarPermiso($IdPermiso)
		{
			$consulta=$this->db->prepare('DELETE FROM Permiso WHERE IdPermiso = \''.$IdPermiso.'\'');
            if($consulta->execute())
                $_POST['respuesta']=1;
            else
                $_POST['respuesta']=0;
		}

		public function eliminarSuspension($IdSuspension)
		{
			$consulta=$this->db->prepare('DELETE FROM Suspension WHERE IdSuspension = \''.$IdSuspension.'\'');
            if($consulta->execute())
                $_POST['respuesta']=1;
            else
                $_POST['respuesta']=0;
		}
	}
?>
