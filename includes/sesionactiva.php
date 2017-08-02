<?php
	require_once("libreria/Session.php");
	if(isset($_SESSION['usuario']))
  	{ 
        session_start();
  	?>
			<br/>
			<br/>
			<br/>
			<br/>
			<center>
                <h3>¡Cuidado! Usted ya ha iniciado una sesion en este navegador. Verifique y vuelva a intentarlo.</h3>
                <form action="index.php" method="POST">
					<input type="hidden" name="accion" id="accion" value="cerrarsesion"/>
					<input type="hidden" name="controlador" id="controller" value="Index"/>
                	<center><input type="submit" name="entrar" value="Cerrar Sesion Abierta"/></center>
				</form>
			</center>

<?php }
?>