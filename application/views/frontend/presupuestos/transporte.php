<!--------------------------------------------------------------------
----------------------------------------------------------------------
												Pedido 
----------------------------------------------------------------------
--------------------------------------------------------------------->
		  
<?php echo form_open('presupuesto/create'); ?>	
<div class="row">	   
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4 class="text-center">
				Total pedido
			</h4>
		</div>
		<div class="panel-body text-center">
			<p class="lead">
				<strong>$1000,00</strong>
			</p>
		</div>
		<ul class="list-group list-group-flush text-center">
			<li class="list-group-item">
				<label class="control-label"><i class="fa fa-money"></i> Condicion de pago: </label>
				<div class="input-group">
					<select name="condicion_pago"  class="form-control" required>
						<option value=""></option>
						<?if($condiciones_pago){
						foreach($condiciones_pago as $condicion_pago){?>
						<option value="<?= $condicion_pago->id_condicion_pago?>">
							<?= $condicion_pago->condicion_pago?>
						</option>
						<?}
						}?>
					</select>
					<span class="input-group-addon danger">
						<i class="fa fa-times"></i>
					</span>
					</div>
			</li>
			<li class="list-group-item">
				<div class="row">
					<div class="col-xs-12">
						<label class="control-label"><i class="fa fa-calendar"></i> 	Fecha de entrega: </label>
					</div>
					<div class="col-xs-6">
						<div class="input-group">
							<input type="text" class="form-control" id="datepicker" required>
							<span class="input-group-addon danger">
								<i class="fa fa-times"></i>
							</span>
						</div>
					</div>
					<div class="col-xs-6">
						<input type="text" class="form-control" id="alternate" size="30" disabled >
					</div>
			</li>
			<li class="list-group-item">
				<div class="row">
					<div class="col-xs-12">
						<label  class="control-label"><i class="fa fa-clock-o"></i> Hora: </label>
					</div>
					<div class="col-xs-3">
					</div>
					<div class="col-xs-6">
						<div class="input-group">
							<select name="hora" class="form-control" required>
								<option value=""></option>
								<?if($horas_entrega){
								foreach($horas_entrega as $hora){?>
								<option value="<?= $hora->horas_entrega?>">
									<?= date('H:i', strtotime($hora->horas_entrega));?>
								</option>
								<?}
								}?>
							</select>
							<span class="input-group-addon danger">
									<i class="fa fa-times"></i>
							</span>
						</div>
					</div>
				</div>
			</li>
			<li class="list-group-item">
				<div class="row">
					<div class="col-xs-12">
						<label class="control-label"><i class="fa fa-truck"></i> Dirección: </label>
					</div>
					<div class="col-xs-9">
						<div class="input-group">
							<select name="direccion" class="form-control"  required>
								<option value=""></option>
								<?if($direcciones){
								foreach($direcciones as $direccion){?>
								<option value="<?= $direccion->id_direccion?>">
									<?= $direccion->calle?>
									<?= $direccion->nro?>
								</option>
								<?}
								}?>
							</select>
							<span class="input-group-addon danger">
									<i class="fa fa-times"></i>
							</span>
						</div>
					</div>
					<div class="col-xs-3">
						<a href="<?= base_url().'index.php/direcciones/addDireccion'?>" class="form-control btn btn-primary" name="agregar" class="btn btn-primary">
							<i class="fa fa-plus-square"></i> Agregar
						</a>
					</div>
				</div>
			</li>
		</ul>
		<div class="panel-body text-center">
			<center>
				<a href="<?= base_url().'index.php/presupuestos/presupuesto'?>" class="btn btn-success btn-icon" data-toggle="modal" >
					<i class="fa fa-chevron-left"></i> 
				</a>
				<button class="btn btn-primary btn-icon" type="submit" >
					<i class="fa fa-check"></i>
				</button>
			</center>
		</div>				
</div>
</div>
<?php echo form_close(); ?>	
