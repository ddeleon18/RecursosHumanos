	<!-- header start -->
	<!-- ================ --> 
	<header class="header fixed clearfix navbar navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<!-- header-left start -->
					<!-- ================ -->
					<div class="header-left clearfix">
						<!-- logo -->
						<div class="logo smooth-scroll">
							<form action="index.php" method="POST">
								<input type="hidden" name="accion" id="accion" value="home"/>
                                <input type="hidden" name="controlador" id="controller" value="administrador"/>
                            	<input type="image" name="logo" id="logo" src="images/logo.png" alt="SmartWork">
                            </form>
						</div>
						<!-- nombre y slogan de la empresa  -->
						<div class="site-name-and-slogan smooth-scroll">
							<div class="site-name">SmartWork</div>
							<div class="site-slogan">Sistema de Recursos Humanos</div>
						</div>
					</div>
					<!-- header-left end -->
				</div>
			<div class="col-md-8">
			<!-- header-right start -->
			<!-- ================ -->
			<div class="header-right clearfix">
				<!-- main-navigation start -->
				<!-- ================ -->
				<div class="main-navigation animated">
					<!-- navbar start -->
					<!-- ================ -->
					<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">
						<!-- Toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right">
									<li>
										<form action="index.php" method="POST">
											<input type="hidden" name="accion" id="accion" value="empleadospage"/>
                                			<input type="hidden" name="controlador" id="controller" value="administrador"/>
                                			<input type="hidden" name="condicion" id="condicion" value="menuprincipal"/>
                                			<input type="submit" class="btn btn-primary mybtn" name="Empleados" value="Empleados"/>
                                		</form>
									</li>
									<li>
										<form action="index.php" method="POST">
											<input type="hidden" name="accion" id="accion" value="horarios"/>
                                			<input type="hidden" name="controlador" id="controller" value="administrador"/>
                                			<input type="submit" class="btn btn-primary mybtn" name="Control Horarios" value="Control Horarios"/>
                                		</form>
									</li>
									<li>
										<form action="index.php" method="POST">
											<input type="hidden" name="accion" id="accion" value="reporteria"/>
                                			<input type="hidden" name="controlador" id="controller" value="administrador"/>
                                			<input type="submit" class="btn btn-primary mybtn" name="Reportería" value="Reporteria"/>
                                		</form>
									</li>
									<li>
										<form action="index.php" method="POST">
											<input type="hidden" name="accion" id="accion" value="cerrarsesion"/>
                                			<input type="hidden" name="controlador" id="controller" value="administrador"/>
                                			<input type="submit" class="btn btn-primary mybtn" name="CerrarSesion" value="Cerrar Sesion"/>
                                		</form>
                                	</li>
								</ul>
							</div>
						</div>
					</nav>
					<!-- navbar end -->
				</div>
				<!-- main-navigation end -->
				</div>
				<!-- header-right end -->
				</div>
			</div>
		</div>
	</header>
	<!-- header end -->
