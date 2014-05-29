<!--------------------------------------------------------------------
----------------------------------------------------------------------
												Pedido 
----------------------------------------------------------------------
--------------------------------------------------------------------->
		  
<?php echo form_open('presupuestos/pago'); ?>	
<div class="row">	   
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4 class="text-center">
				Dirección y transporte
			</h4>
		</div>
		<ul class="list-group list-group-flush text-center">
			<li class="list-group-item">
				<div class="row">
					<div class="col-xs-12">
						<label class="control-label"><i class="fa fa-calendar"></i> 	Fecha de entrega: </label>
					</div>
					<div class="col-xs-6">
						<div class="input-group">
							<input type="text" class="form-control" id="datepicker" autocomplete="off" required>
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
								<?php if($horas_entrega){
								foreach($horas_entrega as $hora){?>
								<option value="<?= $hora->horas_entrega?>">
									<?php echo date('H:i', strtotime($hora->horas_entrega));?>
								</option>
								<?php }
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
						<label class="control-label"><i class="fa fa-map-marker"></i> Dirección: </label>
					</div>
					<div class="col-xs-9">
						<div class="input-group">
							<select name="direccion" class="form-control"  required>
								<option value=""></option>
								<?php if($direcciones){
								foreach($direcciones as $direccion){?>
								<option value="<?= $direccion->id_direccion?>">
									<?php echo $direccion->calle?>
									<?php echo $direccion->nro?>
								</option>
								<?php }
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
				<br>
				<div class="row">
					<div class="col-xs-12">
						<label class="control-label"><i class="fa fa-truck"></i> Transporte: </label>
					</div>
					<div class="col-xs-12">
						<div class="input-group">
							<select name="direccion" class="form-control"  required>
								<option value=""></option>
								<?php if($transportes){
								foreach($transportes as $transporte){?>
								<option value="<?= $transporte->id_transporte?>">
									<?php echo $transporte->transporte?>
								</option>
								<?php }
								}?>
							</select>
							<span class="input-group-addon danger">
									<i class="fa fa-times"></i>
							</span>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="panel-body text-center">
			<center>
				<a href="<?= base_url().'index.php/presupuestos/presupuesto/'.$id_presupuesto?>" class="btn btn-success btn-icon" data-toggle="modal" >
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