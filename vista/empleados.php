<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
	<head>
		<?php include '/includes/header.php'; ?>
	</head>

    <body>        
<?php
        require_once("libreria/Session.php");
        $sesion=new sesion();
?>
        <?php include '/includes/headermenuadmon.php'; ?>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space hidden-xs hidden-lg"></div>
        <br class=""/>

<?php   include '/includes/aviso.php'; ?>
        

<?php
    switch($_POST['condicion'])
    {
        case'menuprincipal':
?>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a data-toggle="modal" data-target="#agregarEmpleado"><img id="agregarEmpleado" src=".\img\iconos\addemp.png"></a>
                </div>
                <div class="col-md-3">
                    <a data-toggle="modal" data-target="#modificarEmpleado"><img id="modificarEmpleado" src=".\img\iconos\modemp.png"></a>
                </div>
                <div class="col-md-3">
                    <a data-toggle="modal" data-target="#eliminarEmpleado"><img id="eliminarEmpleado" src=".\img\iconos\delemp.png"></a>
                </div>
                <div class="col-md-3">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="accion" id="accion" value="consultarEmpleados"/>
                        <input type="hidden" name="controlador" id="controller" value="administrador"/>
                        <center>
                            <input type="image" name="logo" src=".\img\iconos\conemp.png" width=100%/>
                        </center>
                    </form>
                </div>
            </div>
            <div class="space hidden-xs"></div>
            <div class="row">
                <div class="col-md-3">
                    <a data-toggle="modal" data-target="#permisosEmpleado"><img id="permisosEmpleado" src=".\img\iconos\permiso.png"></a>
                </div>
                 <div class="col-md-3">
                    <a data-toggle="modal" data-target="#suspensionesEmpleado"><img id="suspensionesEmpleado" src=".\img\iconos\suspension.jpg"></a>
                </div>
                <div class="col-md-3">
                    <a data-toggle="modal" data-target="#vacacionesEmpleado"><img id="vacacionesEmpleado" src=".\img\iconos\vacaciones.png"></a>
                </div>
                <div class="col-md-3">
                    <a data-toggle="modal" data-target="#horariosEmpleado"><img id="horariosEmpleado" src=".\img\iconos\chorarios.png"></a>
                </div>
            </div>
        </div>
<?php
        break;

        case 'verempleado':
            foreach($Empleado as $emp)
            {
?>
            <div class="space hidden-lg hidden-xs"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <center><h1>Modificar Empleado <?php echo $emp['Nombres']." ".$emp['Apellidos'] ?></h1></center>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <form action="index.php" method="POST">                
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">                     
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Codigo Empleado" id="codigo" name="codigo" value="<?php echo $emp['CodEmpleado']; ?>" required autofocus>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">                        
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="DPI" id="cui" name="cui" value="<?php echo $emp['CUI']; ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">  
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="NIT" id="nit" name="nit" value="<?php echo $emp['NIT']; ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Nombres" id="nombres" name="nombres" value="<?php echo $emp['Nombres']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Apellidos" id="apellidos" name="apellidos" value="<?php echo $emp['Apellidos']; ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Direccion" id="direccion" name="direccion" value="<?php echo $emp['Direccion']; ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Telefono Celular" id="celular" name="celular" value="<?php echo $emp['TelefonoCelular']; ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Telefono Residencial" id="telefono" name="telefono" value="<?php echo $emp['TelefonoResidencial']; ?>" required>
                        </div>
                    </div>      
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha de Nacimiento" id="nacimiento" name="nacimiento" value="<?php echo $emp['FechaNacimiento']; ?>" required>
                            <span>Fecha Nacimiento</span>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Email" id="email" name="email" value="<?php echo $emp['Email']; ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="No. de Licencia" id="licencia" name="licencia" value="<?php echo $emp['NoLicencia']; ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Pasaporte" id="pasaporte" name="pasaporte" value="<?php echo $emp['NoPasaporte']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha de Ingreso" id="fechaingreso" value="<?php echo $emp['FechaIngreso']; ?>"  name="fechaingreso" required/>
                            <span>Fecha Ingreso</span>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Puesto" id="puesto" name="puesto" value="<?php echo $emp['Puesto']; ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Nacionalidad" id="nacionalidad" name="nacionalidad" value="<?php echo $emp['Nacionalidad']; ?>" required>
                        </div>       
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Salario (Q.)" id="salario" name="salario" value="<?php echo $emp['Salario']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <select name="genero" id="genero">
                                <option>Masculino</option>
                                <option>Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <select name="status" id="status">
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <select name="horario" id="horario">
                                <?php
                                foreach($horarios as $hor)
                                {
?>                                  <option><?php echo $hor['Nombre']; ?></option>
<?php
                                }
                                ?>
                            </select>
                        </div>           
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <select name="departamento" id="departamento">
                                <?php
                                foreach($departamentos as $dep)
                                {
?>                                  <option><?php echo $dep['Nombre']; ?></option>
<?php
                                }
?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="accion" id="accion" value="modificarEmpleado"/>
            <input type="hidden" name="controlador" id="controller" value="administrador"/>
            <input type="hidden" name="codEmpAnterior" id="codEmpAnterior" value="<?php echo $emp['CodEmpleado']; ?>"/>
            <div class="space"></div>
            <div class="container">
                <div class="col-xs-6 col-sm-3"></div>
                <div class="col-xs-6 col-sm-3"></div>
                <div class="col-xs-6 col-sm-3">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="accion" id="accion" value="empleadospage"/>
                        <input type="hidden" name="controlador" id="controller" value="administrador"/>
                        <input type="hidden" name="condicion" id="condicion" value="menuprincipal"/>
                        <button type="sumit" class="btn btn-default" action="index.php">Cancelar</button>
                    </form>
                </div>
                <div class="col-xs-6 col-sm-3"><button type="submit" class="btn btn-primary" action="index.php">Modificar Empleado</button></div>
            </div>            
            </form>
<?php
            }
        break;

        case 'consultarempleados':             
?>
            <center>
                <div class="space">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1>Lista de Empleados:</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Codigo Empleado</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Direccion</th>
                                <th>Celular</th>
                                <th>Tel. Residencial</th>
                                <th>Email</th>
                                <th>Genero</th>
                                <th>NIT</th>
                                <th>DPI</th>
                                <th>Fecha Nacimiento</th>
                                <th>No. Licencia</th>
                                <th>No. Pasaporte</th>
                                <th>Fecha de Ingreso</th>
                                <th>Nacionalidad</th>
                                <th>Puesto</th>
                                <th>Salario</th>
                                <th>Departamento</th>
                                <th>Tipo de Horario</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
                                foreach($Empleados as $emp)
                                {
?>
                            <tr>
                                    <td><?php echo $emp['CodEmpleado']; ?></td>
                                    <td><?php echo $emp['Nombres']; ?></td>
                                    <td><?php echo $emp['Apellidos']; ?></td>
                                    <td><?php echo $emp['Direccion']; ?></td>
                                    <td><?php echo $emp['TelefonoCelular']; ?></td>
                                    <td><?php echo $emp['TelefonoResidencial']; ?></td>
                                    <td><?php echo $emp['Email']; ?></td>
                                    <td><?php echo $emp['Genero']; ?></td>
                                    <td><?php echo $emp['NIT']; ?></td>
                                    <td><?php echo $emp['CUI']; ?></td>
                                    <td><?php echo $emp['FechaNacimiento']; ?></td>
                                    <td><?php echo $emp['NoLicencia']; ?></td>
                                    <td><?php echo $emp['NoPasaporte']; ?></td>
                                    <td><?php echo $emp['FechaIngreso']; ?></td>
                                    <td><?php echo $emp['Nacionalidad']; ?></td>
                                    <td><?php echo $emp['Puesto']; ?></td>
                                    <td><?php echo $emp['Salario']; ?></td>
                                    <td><?php echo $emp['IdDepartamento']; ?></td>
                                    <td><?php echo $emp['IdCatalogoHorario']; ?></td>
                                    <td><?php echo $emp['Estado']; ?></td>
                            </tr>
<?php
                                }
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<?php
        break;

    }
?>
<!-- Agregar Empleado -->
<div class="modal fade" id="agregarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modalstyle">
      <form action="index.php" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Empleado</h4>
        </div>
        <div class="modal-body">
            <div class="containter">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">                        
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Codigo Empleado" id="codigo" name="codigo" required autofocus>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">                        
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="DPI" id="cui" name="cui" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">  
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="NIT" id="nit" name="nit" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Nombres" id="nombres" name="nombres" required>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Apellidos" id="apellidos" name="apellidos" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Direccion" id="direccion" name="direccion" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Telefono Celular" id="celular" name="celular" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Telefono Residencial" id="telefono" name="telefono" required>
                        </div>
                    </div>      
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha de Nacimiento" id="nacimiento" name="nacimiento" required>
                            <span>Fecha Nacimiento</span>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="No. de Licencia" id="licencia" name="licencia" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Pasaporte" id="pasaporte" name="pasaporte" required>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha de Ingreso" id="fechaingreso" name="fechaingreso" required/>
                            <span>Fecha Ingreso</span>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Puesto" id="puesto" name="puesto" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Nacionalidad" id="nacionalidad" name="nacionalidad" required>
                        </div>       
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Salario (Q.)" id="salario" name="salario" required>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <select name="genero" id="genero">
                                <option>Masculino</option>
                                <option>Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <select name="status" id="status">
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <select name="horario" id="horario">
                                <?php
                                foreach($horarios as $hor)
                                {
?>                                  <option><?php echo $hor['Nombre']; ?></option>
<?php
                                }
                                ?>
                            </select>
                        </div>           
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="input-group margin-bottom-sm">
                            <select name="departamento" id="departamento">
                                <?php
                                foreach($departamentos as $dep)
                                {
?>                                  <option><?php echo $dep['Nombre']; ?></option>
<?php
                                }
?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="accion" id="accion" value="agregarEmpleado"/>
        <input type="hidden" name="controlador" id="controller" value="administrador"/>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" action="index.php">Guardar Empleado</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Modificar Empleado -->
<div class="modal fade" id="modificarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modalstyle">
      <form action="index.php" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modificar Empleado</h4>
        </div>
        <div class="modal-body">
            <div class="containter">
                <div class="row">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="Ingresa el Codigo del Empleado" id="codempleado" value="" name="codempleado" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="accion" id="accion" value="verEmpleado"/>
        <input type="hidden" name="controlador" id="controller" value="administrador"/>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" action="index.php">Ver Empleado</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Modal Eliminar Empleado -->
<div class="modal fade" id="eliminarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modalstyle">
      <form action="index.php" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Eliminar Empleado</h4>
        </div>
        <div class="modal-body">
            <div class="containter">
                <div class="row">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="Ingresa el Codigo del Empleado" id="codempleado" value="" name="codempleado" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="accion" id="accion" value="eliminarEmpleado"/>
        <input type="hidden" name="controlador" id="controller" value="administrador"/>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" action="index.php">Eliminar Empleado</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Permisos -->
<div class="modal fade" id="permisosEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modalstyle">
      <form action="index.php" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ver Permisos</h4>
        </div>
        <div class="modal-body">
            <div class="containter">
                <div class="row">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="Ingresa el Codigo del Empleado" id="codempleado" value="" name="codempleado" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="accion" id="accion" value="verPermisos"/>
        <input type="hidden" name="controlador" id="controller" value="administrador"/>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" action="index.php">Ver Permisos del Empleado</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Suspensiones -->
<div class="modal fade" id="suspensionesEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modalstyle">
      <form action="index.php" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ver Suspensiones</h4>
        </div>
        <div class="modal-body">
            <div class="containter">
                <div class="row">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="Ingresa el Codigo del Empleado" id="codempleado" value="" name="codempleado" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="accion" id="accion" value="verSuspensiones"/>
        <input type="hidden" name="controlador" id="controller" value="administrador"/>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" action="index.php">Ver Suspensiones del Empleado</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Vacaciones -->
<div class="modal fade" id="vacacionesEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modalstyle">
      <form action="index.php" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ver Vacaciones</h4>
        </div>
        <div class="modal-body">
            <div class="containter">
                <div class="row">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="Ingresa el Codigo del Empleado" id="codempleado" value="" name="codempleado" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="accion" id="accion" value="verVacaciones"/>
        <input type="hidden" name="controlador" id="controller" value="administrador"/>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" action="index.php">Ver Vacaciones del Empleado</button>
        </div>
      </form>
    </div>
  </div>
</div>

        <?php include '/includes/javascript.php'; ?>
    </body>
</html>