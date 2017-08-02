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
        <div class="space hidden-lg"></div>
        <div class="space hidden-xs hidden-lg"></div>
        <br class=""/>

<?php include '/includes/aviso.php'; ?>
        

<?php
    switch($_POST['condicion'])
    {

        case'vertodaslasvacaciones':
?>
            <div class="space hidden-lg hidden-xs"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <center><h1> Vacaciones </h1></center>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-xs-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingresarVacaciones">Agregar Permiso</button>
                    </div>
                    <div class="space"></div>
                    <div class="space"></div>
                    <div class="col-xs-6 col-sm-4 col-md-3"></div>
                    <div class="hidden-xs col-sm-4 col-md-3"></div>
                    <div class="hidden-xs hidden-sm col-md-3"></div>
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Número Vacaciones</th>
                                <th>Año Vacaciones</th>
                                <th>Dias Gozados</th>
                                <th>Dias Pendientes</th>
                                <th>Total Días</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
                                foreach($Vacaciones as $vac)
                                {
?>
                            <tr>
                                    <td><?php echo $vac['IdVacaciones']; ?></td>
                                    <td><?php echo $vac['Anio']; ?></td>
                                    <td><?php echo $vac['DiasGozados']; ?></td>
                                    <td><?php echo $vac['DiasPendientes']; ?></td>
                                    <td><?php echo $vac['TotalDias']; ?></td>
                                    <?php $IdEmpleado = $vac['IdEmpleado']; ?>
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="IdVacaciones" id="IdVacaciones" value="<?php echo $vac['IdVacaciones']; ?>"/>
                                            <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
                                            <input type="hidden" name="accion" id="accion" value="verVacaciones"/>
                                            <input type="hidden" name="controlador" id="controller" value="administrador"/>
                                            <input type="submit" class="btn btn-primary" name="Modificar" value="Modificar"/>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="IdVacaciones" id="IdVacaciones" value="<?php echo $vac['IdVacaciones']; ?>"/>
                                            <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
                                            <input type="hidden" name="accion" id="accion" value="eliminarVacaciones"/>
                                            <input type="hidden" name="controlador" id="controller" value="administrador"/>
                                            <input type="submit" class="btn btn-primary" name="Eliminar" value="Eliminar"/>
                                        </form>
                                    </td>
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

        case 'verpermiso':
            foreach($Permiso as $per)
            {
?>
            <div class="space hidden-lg hidden-xs"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <center><h1>Modificar Permiso #<?php echo $per['IdPermiso']; ?></h1></center>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <form action="index.php" method="POST" id="modpermiso">                
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-4">       
                        <span>Fecha de Aprobación</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha de Aprobación" id="fechaaprobacion" name="fechaaprobacion" value="<?php echo $per['FechaAprobacion']; ?>" required>                            
                        </div>              
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <span>Fecha/Hora de Inicio</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha de Inicio" id="fechainicio" name="fechainicio" value="<?php echo $per['FechaInicioD']; ?>" required>
                            <input class="form-control" type="time" placeholder="Hora de Inicio" id="horainicio" name="horainicio" value="<?php echo $per['HoraInicioD']; ?>">                            
                        </div>        
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <span>Fecha/Hora Fin</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha Fin" id="fechafin" name="fechafin" value="<?php echo $per['FechaFinD']; ?>" required>
                            <input class="form-control" type="time" placeholder="Hora Fin" id="horafin" name="horafin" value="<?php echo $per['HoraFinD']; ?>">                            
                        </div>      
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-4">
                    <span>Pago en Días de Vacaciones</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Pago en Días" id="diaspermiso" name="diaspermiso" value="<?php echo $per['DiasPermiso']; ?>">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                    <span>Pago en Salario (Q.)</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Pago en Salario" id="salariopermiso" name="salariopermiso" value="<?php echo $per['SalarioPermiso']; ?>">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                    <span>Tipo de Permiso</span>
                        <div class="input-group margin-bottom-sm">
                            <select name="tipopermiso" id="tipopermiso">
                                <?php
                                foreach($TipoPermiso as $tp)
                                {
?>                                  <option><?php echo $tp['Nombre']; ?></option>
<?php
                                }
                                ?>
                            </select>
                        </div>
                    </div> 
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <span>Descripción del permiso</span>
                        <textarea class="form-control" cols="3" name="motivopermiso" id="motivopermiso" form="modpermiso" placeholder="<?php echo $per['MotivoPermiso']; ?>"></textarea>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <div class="container">
                <div class="row">
                <div class="col-xs-6 col-sm-3"></div>
                <div class="col-xs-6 col-sm-3"></div>
                <input type="hidden" name="accion" id="accion" value="modificarPermiso"/>
                <input type="hidden" name="controlador" id="controller" value="administrador"/>
                <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>  
                <input type="hidden" name="IdPermiso" id="IdPermiso" value="<?php echo $per['IdPermiso']; ?>"/> 
                <div class="col-xs-6 col-sm-3"><button type="submit" class="btn btn-primary" action="index.php">Modificar Permiso</button></div>
            </form>
                <div class="col-xs-6 col-sm-3">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="accion" id="accion" value="verPermisos"/>
                        <input type="hidden" name="controlador" id="controller" value="administrador"/>
                        <input type="hidden" name="condicion" id="condicion" value="verpermisos"/>
                        <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
                        <button type="sumit" class="btn btn-default" action="index.php">Cancelar</button>
                    </form>
                </div>
                </div>
            </div>
<?php
            }
        break;
?>


        <?php include '/includes/javascript.php'; ?>
    </body>
</html>