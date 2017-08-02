<?php    
        if (isset($_POST['respuesta']))
        {
            if ($_POST['respuesta'] == 1)
            {
?>            	
            	<div class="default-bg green">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h1 class="text-center"><?php echo $mensaje_exito; ?></h1>
							</div>
						</div>
					</div>
				</div>
<?php
            }             
            else
            {
?>
            	<div class="default-bg red">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h1 class="text-center"><?php echo $mensaje_error; ?></h1>
							</div>
						</div>
					</div>
				</div>
<?php
            }             
        }
?>