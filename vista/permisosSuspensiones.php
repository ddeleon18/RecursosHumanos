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

        case'verpermisos':
?>
            <div class="space hidden-lg hidden-xs"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <center><h1> Permisos </h1></center>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-xs-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarPermiso">Agregar Permiso</button>
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
                                <th>Número Permiso</th>
                                <th>Fecha Aprobación</th>
                                <th>Fecha/Hora Inicio</th>
                                <th>Fecha/Hora Fin</th>
                                <th>Pago en Dias</th>
                                <th>Pago en Salario</th>
                                <th>Tipo Permiso</th>
                                <th>Motivo del Permiso</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
                                foreach($Permisos as $per)
                                {
?>
                            <tr>
                                    <td><?php echo $per['IdPermiso']; ?></td>
                                    <td><?php echo $per['FechaAprobacion']; ?></td>
                                    <td><?php echo $per['FechaInicio']; ?></td>
                                    <td><?php echo $per['FechaFin']; ?></td>
                                    <td><?php if($per['DiasPermiso'] == 0.00) echo '--'; else echo $per['DiasPermiso']; ?></td>
                                    <td><?php if($per['SalarioPermiso'] == 0.00) echo '--'; else echo $per['SalarioPermiso']; ?></td>
                                    <td><?php echo $per['NombrePermiso']; ?></td>
                                    <td><?php echo $per['MotivoPermiso']; ?></td>
                                    <?php $IdEmpleado = $per['IdEmpleado']; ?>
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="IdPermiso" id="IdPermiso" value="<?php echo $per['IdPermiso']; ?>"/>
                                            <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
                                            <input type="hidden" name="accion" id="accion" value="verPermiso"/>
                                            <input type="hidden" name="controlador" id="controller" value="administrador"/>
                                            <input type="submit" class="btn btn-primary" name="Modificar" value="Modificar"/>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="IdPermiso" id="IdPermiso" value="<?php echo $per['IdPermiso']; ?>"/>
                                            <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
                                            <input type="hidden" name="accion" id="accion" value="eliminarPermiso"/>
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


        case'versuspensiones':
?>
            <div class="space hidden-lg hidden-xs"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <center><h1> Suspensiones </h1></center>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-xs-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarSuspension">Agregar Suspension</button>
                    </div>
                    <div class="space"></div>
                    <div class="space"></div>
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Número Suspension</th>
                                <th>Fecha de Suspension</th>
                                <th>Motivo</th>
                                <th>Pago en Salario</th>
                                <th>Pago en Dias</th>
                                <th>Moidificar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
                                foreach($Suspensiones  as $susp)
                                {
?>
                            <tr>
                                    <td><?php echo $susp['IdSuspension']; ?></td>
                                    <td><?php echo $susp['Fecha']; ?></td>
                                    <td><?php echo $susp['Motivo']; ?></td>
                                    <td><?php echo $susp['Monto']; ?></td>
                                    <td><?php echo $susp['Dias']; ?></td>
                                    <?php $IdEmpleado = $susp['IdEmpleado']; ?>
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="IdSuspension" id="IdSuspension" value="<?php echo $susp['IdSuspension']; ?>"/>
                                            <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
                                            <input type="hidden" name="accion" id="accion" value="verSuspension"/>
                                            <input type="hidden" name="controlador" id="controller" value="administrador"/>
                                            <input type="submit" class="btn btn-primary" name="Modificar" value="Modificar"/>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="IdSuspension" id="IdSuspension" value="<?php echo $susp['IdSuspension']; ?>"/>
                                            <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
                                            <input type="hidden" name="accion" id="accion" value="eliminarSuspension"/>
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

        case 'versuspension':
            foreach($Suspension as $susp)
            {
?>
            <div class="space hidden-lg hidden-xs"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <center><h1>Modificar Suspension #<?php echo $susp['IdSuspension']; ?></h1></center>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <form action="index.php" method="POST" id="modsuspension">                
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <span>Fecha</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha" id="fecha" name="fecha" value="<?php echo $susp['Fecha']; ?>" required>                            
                        </div>                        
                    </div>
                    <div class="col-xs-4">
                    <span>Días de Suspensión</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Dias de suspension" id="diassuspension" name="diassuspension" value="<?php echo $susp['Dias']; ?>" required>
                        </div>   
                    </div>
                    <div class="col-xs-4">
                    <span>Pago en Salario (Q.)</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Pago en Salario" id="salariosuspension" name="salariosuspension" value="<?php echo $susp['Monto']; ?>" required>
                        </div> 
                    </div>
                </div>                
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <span>Motivo de la suspensión</span>
                        <textarea class="form-control" cols="3" name="motivo" id="motivo" placeholder="<?php echo $susp['Motivo']; ?>" form="modsuspension"></textarea>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <div class="container">
                <div class="row">
                <div class="col-xs-6 col-sm-3"></div>
                <div class="col-xs-6 col-sm-3"></div>
                <div class="col-xs-6 col-sm-3">
                    <input type="hidden" name="accion" id="accion" value="modificarSuspension"/>
                    <input type="hidden" name="controlador" id="controller" value="administrador"/>  
                    <input type="hidden" name="IdSuspension" id="IdSuspension" value="<?php echo $susp['IdSuspension']; ?>"/> 
                    <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
                    <button type="submit" class="btn btn-primary" action="index.php">Modificar Suspension</button>
                </div>      
            </form>
                <div class="col-xs-6 col-sm-3">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="accion" id="accion" value="verSuspensiones"/>
                        <input type="hidden" name="controlador" id="controller" value="administrador"/>
                        <input type="hidden" name="condicion" id="condicion" value="versuspensiones"/>
                        <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
                        <button type="sumit" class="btn btn-default" action="index.php">Cancelar</button>
                    </form>
                </div>
                </div>
            </div>
<?php
            }
        break;
    }
?>


<!-- Agregar Permisos -->
<div class="modal fade" id="agregarPermiso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modalstyle">
      <form action="index.php" method="POST" id="addpermiso">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Permisos</h4>
        </div>
        <div class="modal-body">
            <div class="containter">
                <div class="row">
                    <div class="col-xs-6 col-sm-4">
                        <span>Fecha de Aprobación</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha de Aprobación" id="fechaaprobacion" name="fechaaprobacion" required>                            
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <span>Fecha/Hora de Inicio</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha de Inicio" id="fechainicio" name="fechainicio" required>
                            <input class="form-control" type="time" placeholder="Fecha de Inicio" id="horainicio" name="horainicio">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <span>Fecha/Hora Fin Permiso</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha Final" id="fechafin" name="fechafin" required>
                            <input class="form-control" type="time" placeholder="Hora Final" id="horafin" name="horafin">
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-6 col-sm-4">
                    <span>Pago en Días de Vacaciones</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Pago en Días" id="diaspermiso" name="diaspermiso" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                    <span>Pago en Salario (Q.)</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Pago en Salario" id="salariopermiso" name="salariopermiso" required>
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
                        <textarea class="form-control" cols="3" name="motivopermiso" id="motivopermiso" form="addpermiso"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="accion" id="accion" value="agregarPermiso"/>
        <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
        <input type="hidden" name="controlador" id="controller" value="administrador"/>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" action="index.php">Agregar Permiso</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Agregar Suspensiones -->
<div class="modal fade" id="agregarSuspension" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modalstyle">
      <form action="index.php" method="POST" id="addsuspension">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Suspension</h4>
        </div>
        <div class="modal-body">
            <div class="containter">
                <div class="row">
                    <div class="col-xs-4">
                        <span>Fecha</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="date" placeholder="Fecha" id="fecha" name="fecha" required>                            
                        </div>                        
                    </div>
                    <div class="col-xs-4">
                    <span>Días de Suspensión</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Dias de suspension" id="diassuspension" name="diassuspension" required>
                        </div>   
                    </div>
                    <div class="col-xs-4">
                    <span>Pago en Salario (Q.)</span>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" placeholder="Pago en Salario" id="salariosuspension" name="salariosuspension" required>
                        </div> 
                    </div>
                </div>                
                <div class="space"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <span>Motivo de la suspensión</span>
                        <textarea class="form-control" cols="3" name="motivo" id="motivo" form="addsuspension"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="accion" id="accion" value="agregarSuspension"/>
        <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleado; ?>"/>
        <input type="hidden" name="controlador" id="controller" value="administrador"/>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" action="index.php">Agregar Suspensión</button>
        </div>
      </form>
    </div>
  </div>
</div>

        <?php include '/includes/javascript.php'; ?>
    </body>
</html>