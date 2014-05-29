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
				Pago
			</h4>
		</div>
		<div class="panel-body text-center">
			<p class="lead">
				<?php
				if($articulos){
					$sub_total=0;
					$gastos_adicionales=6.5;
					foreach($articulos as $articulo){	
					$sub_producto=$articulo->precio*$articulo->cantidad;
					$sub_total=$sub_total+$sub_producto;
					}
					$sub_total=$sub_total+$gastos_adicionales;
					
				}					
				?>
				<strong>$<?php echo number_format($sub_total, 2 , ',' ,  '.' );?></strong>
			</p>
		</div>
		<ul class="list-group list-group-flush text-center">
			<li class="list-group-item">
				<label class="control-label"><i class="fa fa-money"></i> Condicion de pago: </label>
				<div class="input-group">
					<select name="condicion_pago"  class="form-control" required>
						<option value=""></option>
						<?php if($condiciones_pago){
						foreach($condiciones_pago as $condicion_pago){?>
						<option value="<?php echo $condicion_pago->id_condicion_pago?>">
							<?= $condicion_pago->condicion_pago?>
						</option>
						<?php }
						}?>
					</select>
					<span class="input-group-addon danger">
						<i class="fa fa-times"></i>
					</span>
					</div>
			</li>
		</ul>
		<div class="panel-body text-center">
			<center>
				<a href="<?= base_url().'index.php/presupuestos/transporte/'.$id_presupuesto?>" class="btn btn-success btn-icon" data-toggle="modal" >
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