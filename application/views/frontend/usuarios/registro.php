<div class="row">
<div class="col-sm-offset-2 col-sm-8">
<div class="panel panel-primary">
  <div class="panel-heading">Formulario de registro</div>
		<div class="panel-body">
				<?=validation_errors('<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>')?></br>
       <!-- <form method="post"  class="form-horizontal">
				<form method="post" accept-charset="utf-8" action="http://localhost/gestion_tms/index.php/usuarios/send/" id="registro" />-->
<?php echo form_open('usuarios/create'); ?>				
				<div class="form-group">
					<label for="usuario" class="col-sm-2 control-label">Usuario</label>
					<div class="input-group">
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese Usuario" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				
					<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="input-group">
						<input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="apellido" class="col-sm-2 control-label">Apellido</label>
					<div class="input-group">
						<input type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="input-group">
						<input type="password" class="form-control" name="password" id="password" placeholder="Ingrese Password" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="password2" class="col-sm-2 control-label"></label>
					<div class="input-group">
						<input type="password" class="form-control" name="password2" id="password2" placeholder="Ingrese Password nuevamente" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="input-group"  data-validate="email">
						<input type="text" class="form-control" name="email" placeholder="usuario@dominio.com" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
								
				<div class="col-md-12 center">
				<center>  
				<button  class="btn btn-primary btn-icon confirm">
					<i class="fa fa-check"></i>
				</button>
				</center>
				</div>
<?php echo form_close(); ?>		
				<!--</form>-->
		</div>
	</div>
</div>
</div>
</div>









<!--

			
				
				<div class="form-group">
					<label for="cuil" class="col-sm-2 control-label">Cuil</label>
					<div class="input-group"  data-validate="cuil">
						<input type="text" class="form-control" name="cuil" placeholder="00-00000000-0" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Teléfono</label>
					<div class="input-group"  data-validate="telefono">
						<input type="text" class="form-control" name="telefono" placeholder="261-000000" required>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				
				
				
				<div class="form-group">
					<label for="provincia" class="col-sm-2 control-label">Provincia</label>
					<div class="input-group">
						<select class="form-control" name="provincia" id="provincia"  placeholder="Seleccione provincia" required>
						<option value=""></option>
						<? foreach($provincias as $provincia){?> 
							<option value="<?= $provincia->id_provincia?>"><?= $provincia->provincia?></option>
						<?}?>
            </select>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>	

				<div class="form-group">
					<label for="departamento" class="col-sm-2 control-label">Departamento</label>
					<div class="input-group">
						<select class="form-control" name="departamento"  id="departamento" placeholder="Seleccione departamento"  required>
		
            </select>
						<span class="input-group-addon danger">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>					
				
				<div class="form-group">
					<label for="calle" class="col-sm-2 control-label">Calle</label>
					<div class="input-group"  data-validate="calle">
						<input type="text" class="form-control" name="calle" placeholder="ingrese calle de su dirección">
						<span class="input-group-addon info">
							<i class="fa fa-asterisk"></i>
						</span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="nro" class="col-sm-2 control-label">Número</label>
					<div class="input-group"  data-validate="nro">
						<input type="text" class="form-control" name="nro" placeholder="ingrese número de su dirección">
						<span class="input-group-addon info">
							<i class="fa fa-asterisk"></i>
						</span>
					</div>
				</div>
				


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
