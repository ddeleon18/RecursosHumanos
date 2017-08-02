<?php
        /* Controlador del Administrador.
         * Contiene todas las funciones o módulos habilitados para un administrador.
         */

class administradorController extends ControllerBase
	{
//<------------------------- Función de Verificación Ingreso usuarios ------------------------->
            public function verificar() 
			{
				if(!isset($_SESSION)) 
    			{ 
        			session_start(); 
    			} 
				require 'modelo/consultaModel.php';
				$nuevo = new consultaModel();
				$usuarios = $nuevo->verusuarios();
				$coincidencia = 0;
				foreach($usuarios as $usuario) 
				{
					if($_POST['username']==$usuario['NombreUsuario'] && $_POST['pass']==$usuario['Contrasenia'])
					{						
						$coincidencia = 1;
                		$_SESSION['TipoUsuario'] = $_POST['usuario'];                		
                		$_SESSION['idUsuario'] = $usuario['IdUsuario'];
                		$_SESSION['NombreCompleto'] = $usuario['NombreCompleto'];
						break;
					}
				}
                
                if ($coincidencia > 0) 
                	$_SESSION['usuario'] = $_POST['username']; 
                else 
                	$_SESSION['usuario'] = null;
                $this->view->show("home.php", null);              
			}

//<------------------------- Lanza el menú de inicio para un Administrador ------------------------->
			public function home()
			{
                $this->view->show("home.php", null);              				
			}

//<------------------------- Cierra una sesión de administrador ------------------------->
            public function cerrarsesion() 
			{
                session_start();
                unset($_SESSION['usuario']);
                unset($_SESSION['idUsuario']);
                $this->view->show("inicio.php");
			}

//<------------------------- Sección para funciones de consultar registros ------------------------->
			public function empleadospage() 
			{
				require 'modelo/consultaModel.php';
				$nuevo = new consultaModel();
				$resultado['departamentos']=$nuevo->verdepartamentos();
				$resultado['horarios']=$nuevo->verhorarios();
               	$this->view->show("empleados.php", $resultado);
			}

			public function verEmpleado()
			{
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$resultado['Empleado']=$consultar->verEmpleado($_POST['codempleado']);
				$resultado['departamentos']=$consultar->verdepartamentos();
				$resultado['horarios']=$consultar->verhorarios();
				$_POST['condicion']='verempleado';
				$this->view->show("empleados.php", $resultado);
			}

			public function consultarEmpleados()
			{
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$resultado['Empleados']=$consultar->consultarEmpleados();
				$_POST['condicion']='consultarempleados';
				$this->view->show("empleados.php", $resultado);
			}

			public function verPermisos()
			{
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				if (isset($_POST['codempleado']))
					$resultado['Permisos'] = $consultar->verPermisos($_POST['codempleado']);
				else
					$resultado['Permisos'] = $consultar->verPermisosId($_POST['IdEmpleado']);
				$resultado['TipoPermiso'] = $consultar->verTipoPermisos();
				$_POST['condicion']='verpermisos';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}

			public function verSuspensiones()
			{
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				if (isset($_POST['codempleado']))
					$resultado['Suspensiones'] = $consultar->verSuspensiones($_POST['codempleado']);
				else 
					$resultado['Suspensiones'] = $consultar->verSuspensionesID($_POST['IdEmpleado']);
				unset($_POST['respuesta']);
				$_POST['condicion']='versuspensiones';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}

			public function verSuspension()
			{
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$resultado['Suspension'] = $consultar->verSuspension($_POST['IdSuspension']);
				$resultado['IdEmpleado'] = $_POST['IdEmpleado'];
				$_POST['condicion']='versuspension';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}

			public function verPermiso()
			{
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$resultado['Permiso']=$consultar->verPermiso($_POST['IdPermiso']);
				$resultado['IdEmpleado'] = $_POST['IdEmpleado'];
				$resultado['TipoPermiso'] = $consultar->verTipoPermisos();
				$_POST['condicion']='verpermiso';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}

			public function verVacaciones()
			{
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$resultado['Vacaciones']=$consultar->verVacaciones($_POST['codempleado']);
				$_POST['condicion']='vertodaslasvacaciones';
				$this->view->show("vacacionesPermisos.php", $resultado);
			}

//<------------------------- Sección para funciones de agregar registros ------------------------->
			public function agregarEmpleado()
			{
				require 'modelo/insertarModel.php';
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$IdDepartamento = (string) $consultar->IdDepartamento($_POST['departamento']);
				$IdCatalogoHorario = (string) $consultar->IdCatalogoHorario($_POST['horario']);
				$insertar = new insertarModel();
				if ($_POST['status'] == 'Activo')
					$status = 1;
				else
					$status = 0;

				$insertar->empleado($_POST['codigo'], $_POST['nombres'], $_POST['apellidos'], $_POST['direccion'], $_POST['celular'], $_POST['telefono'], $_POST['genero'], $_POST['cui'], $_POST['nit'], $status, $_POST['nacimiento'], $_POST['fechaingreso'], $_POST['puesto'], $_POST['nacionalidad'], $_POST['licencia'], $_POST['pasaporte'], $_POST['email'], $IdDepartamento, $IdCatalogoHorario, $_POST['salario']);
				$resultado['mensaje_exito'] = "Empleado agregado con éxito.";
				$resultado['mensaje_error'] = "Error al agregar el Empleado intentalo de nuevo.";
				$resultado['departamentos']=$consultar->verdepartamentos();
				$resultado['horarios']=$consultar->verhorarios();
				$_POST['condicion']='menuprincipal';
				$this->view->show("empleados.php", $resultado);
			}

			public function agregarPermiso()
			{
				require 'modelo/insertarModel.php';
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$IdTipoPermiso = (string) $consultar->IdTipoPermiso($_POST['tipopermiso']);
				$insertar = new insertarModel();
				$insertar->permiso($_POST['fechaaprobacion'], $_POST['fechainicio']." ".$_POST['horainicio'], $_POST['fechafin']." ".$_POST['horafin'], $_POST['diaspermiso'], $_POST['IdEmpleado'], $IdTipoPermiso, $_POST['motivopermiso'], $_POST['salariopermiso']);
				$resultado['mensaje_exito'] = "Permiso agregado con éxito.";
				$resultado['mensaje_error'] = "Error al agregar el Permiso intentalo de nuevo.";
				$resultado['Permisos'] = $consultar->verPermisosId($_POST['IdEmpleado']);
				$resultado['TipoPermiso'] = $consultar->verTipoPermisos();
				$_POST['condicion']='verpermisos';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}

			public function agregarSuspension()
			{
				require 'modelo/insertarModel.php';
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$insertar = new insertarModel();
				$insertar->suspension($_POST['fecha'], $_POST['diassuspension'],$_POST['salariosuspension'], $_POST['motivo'],$_POST['IdEmpleado']);
				$resultado['mensaje_exito'] = "Suspension agregado con éxito.";
				$resultado['mensaje_error'] = "Error al agregar la suspension intentalo de nuevo.";
				$resultado['Suspensiones'] = $consultar->verSuspensionesID($_POST['IdEmpleado']);
				$_POST['condicion']='versuspensiones';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}

//<------------------------- Sección para funciones de Modificar Registros ------------------------->
			public function modificarEmpleado()
			{
				require 'modelo/actualizarModel.php';
				$actualizar = new actualizarModel();
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$IdDepartamento = (string) $consultar->IdDepartamento($_POST['departamento']);
				$IdCatalogoHorario = (string) $consultar->IdCatalogoHorario($_POST['horario']);
				if ($_POST['status'] == 'Activo')
					$status = 1;
				else
					$status = 0;

				$actualizar->modificarEmpleado($_POST['codigo'], $_POST['nombres'], $_POST['apellidos'], $_POST['direccion'], $_POST['celular'], $_POST['telefono'], $_POST['genero'], $_POST['cui'], $_POST['nit'], $status, $_POST['nacimiento'], $_POST['fechaingreso'], $_POST['puesto'], $_POST['nacionalidad'], $_POST['licencia'], $_POST['pasaporte'], $_POST['email'], $IdDepartamento, $IdCatalogoHorario, $_POST['salario'], $_POST['codEmpAnterior']);
				$resultado['mensaje_exito'] = "Empleado modificado con éxito.";
				$resultado['mensaje_error'] = "Error al modificar el Empleado intentalo de nuevo.";
				$resultado['departamentos']=$consultar->verdepartamentos();
				$resultado['horarios']=$consultar->verhorarios();
				$_POST['condicion']='menuprincipal';
				$this->view->show("empleados.php", $resultado);
			}

			public function modificarPermiso()
			{
				require 'modelo/actualizarModel.php';
				$actualizar = new actualizarModel();
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();

				$IdTipoPermiso = (string) $consultar->IdTipoPermiso($_POST['tipopermiso']);
				$actualizar->modificarPermiso($_POST['fechaaprobacion'], $_POST['fechainicio']." ".$_POST['horainicio'], $_POST['fechafin']." ".$_POST['horafin'], $_POST['diaspermiso'], $IdTipoPermiso, $_POST['motivopermiso'], $_POST['salariopermiso'], $_POST['IdPermiso']);
				$resultado['mensaje_exito'] = "Permiso modificado con éxito.";
				$resultado['mensaje_error'] = "Error al modificar el Permiso intentalo de nuevo.";
				$resultado['Permisos'] = $consultar->verPermisosId($_POST['IdEmpleado']);
				$resultado['TipoPermiso'] = $consultar->verTipoPermisos();
				$_POST['condicion']='verpermisos';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}

			public function modificarSuspension()
			{
				require 'modelo/actualizarModel.php';
				$actualizar = new actualizarModel();
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();

				$actualizar->modificarSuspension($_POST['fecha'], $_POST['diassuspension'], $_POST['salariosuspension'], $_POST['motivo'], $_POST['IdSuspension']);
				$resultado['mensaje_exito'] = "Suspension modificada con éxito.";
				$resultado['mensaje_error'] = "Error al modificar la suspension intentalo de nuevo.";
				$resultado['Suspensiones'] = $consultar->verSuspensionesID($_POST['IdEmpleado']);
				$_POST['condicion']='versuspensiones';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}

//<------------------------- Sección para funciones de Eliminar Registros ------------------------->
			public function eliminarEmpleado()
			{
				require 'modelo/eliminarModel.php';
				$eliminar = new eliminarModel();
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$eliminar->eliminarEmpleado($_POST['codempleado']);
				$resultado['mensaje_exito'] = "Empleado eliminado con éxito.";
				$resultado['mensaje_error'] = "Error al eliminar el Empleado intentalo de nuevo.";
				$resultado['departamentos']=$consultar->verdepartamentos();
				$resultado['horarios']=$consultar->verhorarios();
				$_POST['condicion']='menuprincipal';
				$this->view->show("empleados.php", $resultado);
			}

			public function eliminarPermiso()
			{
				require 'modelo/eliminarModel.php';
				$eliminar = new eliminarModel();
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$eliminar->eliminarPermiso($_POST['IdPermiso']);
				$resultado['mensaje_exito'] = "Permiso eliminado con éxito.";
				$resultado['mensaje_error'] = "Error al eliminar el Permiso intentalo de nuevo.";
				$resultado['Permisos'] = $consultar->verPermisosId($_POST['IdEmpleado']);
				$resultado['TipoPermiso'] = $consultar->verTipoPermisos();
				$_POST['condicion']='verpermisos';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}
			public function eliminarSuspension()
			{
				require 'modelo/eliminarModel.php';
				$eliminar = new eliminarModel();
				require 'modelo/consultaModel.php';
				$consultar = new consultaModel();
				$eliminar->eliminarSuspension($_POST['IdSuspension']);
				$resultado['mensaje_exito'] = "Suspension eliminada con éxito.";
				$resultado['mensaje_error'] = "Error al eliminar la suspension intentalo de nuevo.";
				$resultado['Suspensiones'] = $consultar->verSuspensionesID($_POST['IdEmpleado']);
				$_POST['condicion']='versuspensiones';
				$this->view->show("permisosSuspensiones.php", $resultado);
			}

//<------------------------- Función que descarga Manual de Usuario ------------------------->
			public function ayuda()
			{
				$this->view->show("ManualDeUsuario.pdf");
			}

//<------------------------- Función para desplegar Manuales ------------------------->
                public function totalcontragradual(){
                	require_once('tcpdf/config/lang/eng.php');
                        require_once('tcpdf/tcpdf.php');
                        require 'modelo/consultaModel.php';
	
                        $objConsulta = new consultaModel();
                        $perfil="";
                        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-6', false);

                        // set información del documento
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('Tobacco Plant');
                        $pdf->SetTitle('Reporte Presupuesto General Contra Gradual');
                        $pdf->SetSubject('Reporte Presupuesto General Contra Gradual');
                        $pdf->SetKeywords('Reporte, usuario, php, mysql');

                        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                        //set margenes
                        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                        //set auto page breaks
                        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                        //set image scale factor
                        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                        //set some language-dependent strings
                        $pdf->setLanguageArray($l);

                        // set default font subsetting mode
                        $pdf->setFontSubsetting(true);

                        $pdf->SetFont('helvetica', '', 9, '', true);
                        //set tipo de letra, tamaño

                        $pdf->setPrintHeader(false); //no imprime la cabecera ni la linea 
                        $pdf->setPrintFooter(true); // imprime el pie y la linea 
                        $pdf->AddPage(); // Add a page 

                        ob_end_clean();//rompimiento de pagina


                        $html = $objConsulta->reportePdfPresupuestos();
                        $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

                        $pdf->Output('Reporte Presupuesto General Contra Gradual.pdf', 'I');
                }
        }

?>
