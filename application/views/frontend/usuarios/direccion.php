

<div class="row">
<div class="panel panel-primary">
<div class="panel-heading">Formulario de registro</div>
<div class="panel-body">

<?php echo form_open('direcciones/adddireccion'); ?>		
<div class="col-md-6">
	<div class="form-group">
		<label for="usuario" class="control-label">Calle</label>
		<div class="input-group">
			<input type="text" class="form-control" name="calle" id="calle" placeholder="Ingrese Calle" required>
				<span class="input-group-addon danger">
					<i class="fa fa-times"></i>
				</span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="validate-number"  class="control-label">Número</label>
		<div class="input-group" data-validate="number">
			<input type="text" class="form-control" name="nro" id="nro" placeholder="Ingres Número" required>
				<span class="input-group-addon danger">
					<i class="fa fa-times"></i>
				</span>
		</div>
	</div>

	<div class="form-group">
		<label for="provincia" class="control-label">Provincia</label>
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
		<label for="departamento" class="control-label">Departamento</label>
		<div class="input-group">
			<select class="form-control" name="departamento"  id="departamento" placeholder="Seleccione departamento"  required>
			</select>
			<span class="input-group-addon danger">
				<i class="fa fa-times"></i>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label for="tipodireccion" class="control-label">Tipo de dirección</label>
		<div class="input-group">
			<select class="form-control" name="tipodireccion" id="tipodireccion"  placeholder="Seleccione tipo dirección" required>
				<option value=""></option>
					<? foreach($tipodirecciones as $tipodireccion){?> 
				<option value="<?= $tipodireccion->id_tipodireccion?>"><?= $tipodireccion->tipodireccion?></option>
					<?}?>
			</select>
			<span class="input-group-addon danger">
				<i class="fa fa-times"></i>
			</span>
		</div>
	</div>		
	
	<div class="form-group">
		<div class="input-group">
			<div class="col-xs-4">
				<a href="javascript:history.back(1)" class="btn btn-danger"><i class="fa fa-caret-square-o-left"></i> Cancelar</a>
			</div>
			<div class="col-xs-4">
				<button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Agregar</button>
			</div>
			<div class="col-xs-4">
				<a  class="btn btn-success disabled" id="mapa" onclick="armardireccion();"><i class="fa fa-map-marker"></i>  Ver Mapa</a>
			</div>
		</div>
	</div>	
</div>	

<?php echo form_close(); ?>	

<div class="col-md-6">
	<div id="map" style="width: 540px; height: 360px"></div>
	<p id="demo"></p>
</div>

</div>
</div>
</div>
</div>
