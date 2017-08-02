<?php
class IndexController extends ControllerBase
{
    //Accion index
    public function index()
    {
	   $this->view->show("inicio.php", NULL);
    }
    
    public function login()
    {
	   $this->view->show("start_session.php", NULL);
    }
    
    public function entrar()
    {
	   switch ($_POST['usuario'])
	   {
		    case 'Administrador':           
                                require 'administradorController.php';
                                $nw = new administradorController();
                                $nw->verificar();
                                break;

            case 'Consultor':               
                                require 'consultorController.php';
						        $nw = new consultorController();
						        $nw->verificar();
                                break;
                                            
            default:                        echo '<script type="text/javascript">javascript:window.location="index.php"</script>';
	   }
    }
    
    public function cerrarsesion()
    {
       require 'libreria/Session.php';
       $sesion = new Sesion();
       $sesion->borrar_sesion();
    }

    public function ayuda()
    {
        $this->view->show("ayuda.php", NULL);
    }
    
}
?>