<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
	<head>
		<?php include '/includes/header.php'; ?>
	</head>

    <body>
		<center>
<?php
        require_once("libreria/Session.php");
        $sesion=new sesion();
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

		if($_SESSION['usuario'] != null)
		{
?>
                <?php include 'includes/headermenuadmon.php'; ?>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
<?php
                switch($_SESSION['TipoUsuario'])
                {
                    case'Administrador':

                    include '/includes/aviso.php';

?>
                <div class="space hidden-lg hidden-xs"></div>
                <div class="space">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1>Bienvenido <?php echo $_SESSION['NombreCompleto'] ?></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="space hidden-xs hidden-sm"></div>
                        <div class="col-sm-6 col-md-3">
                             <form action="index.php" method="POST">
                                <input type="hidden" name="accion" id="accion" value="empleadospage"/>
                                <input type="hidden" name="condicion" id="condicion" value="menuprincipal"/>
                                <input type="hidden" name="controlador" id="controller" value="administrador"/>
                                <center>
                                    <input type="image" name="logo" src=".\img\iconos\empleados.png" width=100%/>
                                </center>
                            </form>
                        </div>
                        <div class="col-sm-6 col-md-3">
                             <form action="index.php" method="POST">
                                <input type="hidden" name="accion" id="accion" value="horariospage"/>
                                <input type="hidden" name="controlador" id="controller" value="administrador"/>
                                <center>
                                    <input type="image" name="logo" src=".\img\iconos\horarios.png" width=100%/>
                                </center>
                            </form>
                        </div>
                        <div class="col-sm-6 col-md-3">
                             <form action="index.php" method="POST">
                                <input type="hidden" name="accion" id="accion" value="reportespage"/>
                                <input type="hidden" name="controlador" id="controller" value="administrador"/>
                                <center>
                                    <input type="image" name="logo" src=".\img\iconos\reporte.png" width=100%/>
                                </center>
                            </form>                            
                        </div>
                        <div class="col-sm-6 col-md-3">
                             <form action="index.php" method="POST">
                                <input type="hidden" name="accion" id="accion" value="usuariospage"/>
                                <input type="hidden" name="controlador" id="controller" value="administrador"/>
                                <center>
                                    <input type="image" name="logo" src=".\img\iconos\usuarios.png" width=95%/>
                                </center>
                            </form>                            
                        </div>
                    </div>
                </div>

<?php                   
                    break;
                }
        }
	    else
            include '/includes/iniciosesion.php';
?>
        </center>

        <?php include '/includes/javascript.php'; ?>
    </body>
</html>