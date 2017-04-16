<?php echo $header;?>

	<!--=== Page Header ===-->
	<div class="page-header">
		<div class="page-title">
			<h3><?php echo implode(" &raquo; ", $this->breadcrumbs);?></h3>
			<span>Los administradores son los usuarios con permiso de acceso al panel de administración.</span>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">	
			<div class="widget box">
				<div class="widget-content">
					<form id="formEdit" class="form-horizontal row-border" method="post" action="<?php echo $route;?>/save" enctype="multipart/form-data" onsubmit="return validar();">
						
							<?php $this->admin->showErrors(); ?>
							
							<?php echo $this->admin->input('nombre', 'Nombre', '', $row, $required=true);?>
							<?php echo $this->admin->input('email', 'E-Mail', '', $row, $required=true);?>
							<?php echo $this->admin->input('usuario', 'Usuario', '', $row, $required=true);?>
							<?php echo $this->admin->password('password', 'Contraseña', 'required', isset($row->password)?$row->password:"");?>
							<?php echo $this->admin->checkbox('activo', 'Activo', '', $row, $required=true);?>
							<?php echo $this->admin->checkbox('cambio_password', 'Requerir cambio de contraseña', '', $row, $required=true);?>				
							

							<div class="form-actions">
								<input type="hidden" name="id" id="id" value="<?php if (isset($row->id)) echo $row->id;?>" />  
								<input type="submit" id="btnSubmit" value="Grabar" class="btn btn-primary">
								<a class="btn btn-default" href="<?=$route;?>">Cancelar</a>
							</div>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
	function validar(){
		var pass = document.getElementById('password').value;
		var pass2 = document.getElementById('password2').value;
		var error = "Por favor chequee su contraseña.";
		
		if(pass != pass2){
			alert(error);
			return false;
		}
		else{
			$("#formEdit").submit();
		}
		return false;
	}
</script>
		
<?php echo $footer;	?>