<!--------------------------------------------------------------------
----------------------------------------------------------------------
				Presupuestos
----------------------------------------------------------------------
--------------------------------------------------------------------->
		  

		
<div class="container">
  	<div class="row">
   <div class="col-md-8 col-md-offset-2">
  		<div class="panel panel-primary">
		<div class="panel-heading">Presupuestos</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<td>ID</td>
						<td>Fecha</td>
						<td>Monto</td>
						<td>Pago</td>
						<td>Estado</td>
						<td>Factura</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
					if($presupuestos){
					foreach($presupuestos as $presupuesto){
					?>
					<tr>
						<td><?php echo $presupuesto->id_presupuesto; ?></td>
						<td><?php echo $presupuesto->fecha; ?></td>
						<td><?php echo $presupuesto->monto; ?></td>
						<td><?php echo $presupuesto->id_condicion_pago; ?></td>
						<td><?php echo $presupuesto->id_estado_presu; ?></td>
					</tr>
					<?php
					}
					}					
					?>
				</tbody>
			</table>
		</div>
		</div>
  	</div>
	</div>
</div>
