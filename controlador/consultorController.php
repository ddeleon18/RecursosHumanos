<?php
        /* Controlador del Administrador.
         * Contiene todas las funciones o módulos habilitados para un administrador.
         */

class consultorController extends ControllerBase
	{
		/*Función que sirve para logear a un Administrador.
                 * Crea un nuevo modelo para consultar.
                 * Luego guarda la consulta de administradores en listado.
                 * Posteriormente llama a sesionadmon que valida al usuario y provee el menú de acciones.
                 */ 
                public function verificar2() 
			{
				require 'modelo/consultaModel.php';
				$nuevo = new consultaModel();
				$resultado['listado']=$nuevo->verconsultores($_POST['username'], $_POST['pass']);
                                $resultado['productos']=$nuevo->verproductos();
                                $this->view->show("sesionconsultor.php", $resultado);
			}
                /* Función que sirve para cerrar sesion de un Administrador.
                 * Lee los datos de la sesion actual con session_start();
                 * Borra las variables usuario e idadmon residentes en $_SESSION.
                 * Posteriormente llama a la vista inicio.html.
                 */ 
                public function cerrarsesion() 
			{
                                session_start();
                                unset($_SESSION['usuario']);
                                unset($_SESSION['idadmon']);
                                $this->view->show("inicio.html");
			}
		public function ayuda()
			{
				$this->view->show("ManualDeUsuario.pdf");
			}
		/*Todas las Funciones para ver registros son básicamente similares solo difieren en las funciones a donde van a terminar las tablas con la información obtenida de la consulta.
                 * Se crea un nuevo modelo para consultar.
                 * Luego ejecuta la consulta y se almacena en el arreglo $resultado.
                 * Cambiar la acción que se va a ejecutar a 'veradmon' que es la función dentro de administrador_ver para visualizar un administrador.
                 * Posteriormente llama a administrador_ver para desplegar la información del ingreso.
                 */ 
                public function verinventario(){
				require 'modelo/consultaModel.php';
				$nuevo = new consultaModel();
				$resultado['productos']=$nuevo->verproductos();
                                $this->view->show("consultor.php", $resultado);
			}
        }

?>
