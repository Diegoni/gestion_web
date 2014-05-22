<div class="row">
<div class="panel panel-primary">
<div class="panel-heading">Formulario de registro</div>
		<div class="panel-body">
		<div class="col-sm-offset-2 col-sm-8">
				<?=validation_errors('<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>')?></br>
       <!-- <form method="post"  class="form-horizontal">
				<form method="post" accept-charset="utf-8" action="http://localhost/gestion_tms/index.php/usuarios/send/" id="registro" />-->

<?php 
foreach($usuarios as $usuario){
echo form_open('usuarios/edit'); ?>				
				<div class="form-group">
					<label for="usuario" class="col-sm-2 control-label">Usuario</label>
					<div class="input-group">
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese Usuario" value="<?= $usuario->usuario?>" disabled>
					</div>
				</div>
				
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="input-group">
						<input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" value="<?= $usuario->nombre?>" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="apellido" class="col-sm-2 control-label">Apellido</label>
					<div class="input-group">
						<input type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido" value="<?= $usuario->apellido?>" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cuil" class="col-sm-2 control-label">Cuil</label>
					<div class="input-group"  data-validate="cuil">
						<input type="text" class="form-control" name="cuil" placeholder="00-00000000-0" value="<?= $usuario->cuil?>" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
										
				<div class="col-md-12 center">
				<center> 
				<a href="<?= base_url().'index.php/usuarios/interfaz/'.$usuario->id_usuario?>" class="btn btn-success btn-icon" data-toggle="modal">
					<i class="fa fa-chevron-left"></i> 
				</a>
				<button  class="btn btn-primary btn-icon confirm"  data-toggle="modal" >
					<i class="fa fa-check"></i>
				</button>
				</center>
				</div>
<?php echo form_close(); ?>		
<?php }?>
				<!--</form>-->
		</div>
		</div>
</div>
</div>
</div>









<!--
<div class="form-group">
        			<label for="validate-length">Minimum Length</label>
					<div class="input-group" data-validate="length" data-length="5">
						<textarea type="text" class="form-control" name="validate-length" id="validate-length" placeholder="Validate Length" required></textarea>
						<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
					</div>
				</div>
      
					
            	<div class="form-group">
        			<label for="validate-number">Validate Number</label>
					<div class="input-group" data-validate="number">
						<input type="text" class="form-control" name="validate-number" id="validate-number" placeholder="Validate Number" required>
						<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
					</div>
				</div>
-->				
