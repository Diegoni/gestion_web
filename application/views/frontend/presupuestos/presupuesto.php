<div class="row">
	<div class="col-sm-12 col-md-10 col-md-offset-1">
		<?php echo form_open('presupuestos/updateDetalle'); ?>	
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th class="text-center">Precio</th>
					<th class="text-center">Total</th>
					<th> </th>
				</tr>
			</thead>
			<tbody>
			<? 
			$gastos_adicionales=6.5;
			$sub_total=0;
			if($articulos){
			foreach($articulos as $articulo){?>				
				<tr>
				
					<td class="col-md-6">
						<div class="media">
							<a href="#" class="pull-left pull-left-away" data-toggle="modal" data-target=".articulo-modal<?= $articulo->id_articulo;?>">
								<img class="img-circle-sm" src="<?= base_url().'assets/uploads/files/'.$articulo->imagen?>" alt="User Pic"> 
							</a>
							<div class="media-body">
								<h4 class="media-heading">
									<a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $articulo->articulo?></a>						</a>
								</h4>						
								<h5 class="media-heading"><?= $articulo->descripcion?></h5>
								<span>Estado: </span><span class="label label-success">En stock</span>
							</div>
						</div>
					</td>
					
					
					<td class="col-sm-2 col-md-2" style="text-align: center">
						<div class="input-group">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant<?= $articulo->id_articulo;?>">
									<i class="fa fa-minus"></i>
								</button>
							</span>
							<input type="text" name="quant<?= $articulo->id_articulo;?>" class="form-control input-number" value="<?= $articulo->cantidad;?>" min="<?= $articulo->stock_min?>" max="<?= $articulo->stock_max?>">
							<input type="hidden" name="id<?= $articulo->id_articulo;?>" value="<?= $articulo->id_articulo;?>">
							<input type="hidden" name="precio<?= $articulo->id_articulo;?>" value="<?= $articulo->precio;?>">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant<?= $articulo->id_articulo;?>">
									<i class="fa fa-plus"></i>
								</button>
							</span>
						</div>
					</td>
					
					
					<td class="col-sm-1 col-md-1 text-center">
						<strong>
							<p  name="precio[1]">
								$ <?= number_format($articulo->precio, 2 , ',' ,  '.' );?>
							</p>
						</strong>
					</td>
					<?
						$sub_producto=$articulo->precio*$articulo->cantidad;
						$sub_total=$sub_total+$sub_producto;
					?>
          <td class="col-sm-1 col-md-1 text-center">
						<strong>
							<p  name="subtotal[1]">
								$ <?= number_format($sub_producto, 2 , ',' ,  '.' );?>
							</p>
						</strong>
					</td>
					
					<td class="col-sm-1 col-md-1">
					<? echo form_open('presupuestos/deleteArticulo');?>
						<input type="hidden" name="id_articulo" value="<? echo $articulo->id_articulo; ?>">
						<input type="hidden" name="id_presupuesto" value="<? echo $id_presupuesto; ?>">
						<button class="btn btn-danger delete" title="Sacar del pedido">
							<i class="fa fa-trash-o"></i>
						</button>
					<? echo form_close();?>
					</td>
					
				</tr>
				<? 	}
				if($notas){
				foreach($notas as $nota){?>				
				<tr>
				
					<td class="col-md-6">
						<div class="media">
							<div class="media-body">
								<h4 class="media-heading">Nota</h4>		
								<h5 class="media-heading"><?= $nota->nota?></h5>
								<span>Estado: </span><span class="label label-warning">Evaluación</span>
							</div>
						</div>
					</td>
					
					<td class="col-sm-2 col-md-2"></td>
					<td class="col-sm-1 col-md-1"></td>
          <td class="col-sm-1 col-md-1"></td>
					
					<td class="col-sm-1 col-md-1">
						<a href="<?= base_url().'index.php/presupuestos/presupuesto/'.$articulo->id_articulo.'/3'; ?>" class="btn btn-danger delete" data-toggle="modal" >
							<i class="fa fa-trash-o"></i>
						</a>
					</td>
					
				</tr>	
				<?	}
						}
						}else{	?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>
							Error!
						</strong>
							No hay artículos marcados en el pedido.
				</div>
				<?	} ?>
        <tr>
					<td colspan="3"></td>
					<td><h5>Subtotal</h5></td>
					<td class="text-right"><h5><strong>$ <?= number_format($sub_total, 2 , ',' ,  '.' );?></strong></h5></td>
				</tr>
				<tr>
					<td colspan="3"></td>
          <td><h5>Gastos adicionales</h5></td>
          <td class="text-right"><h5><strong>$ <?= number_format($gastos_adicionales, 2 , ',' ,  '.' );?></strong></h5></td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td><h3>Total</h3></td>
					<? $total=$sub_total+$gastos_adicionales;	?>
					<td class="text-right"><h3><strong>$ <?= number_format($total, 2 , ',' ,  '.' );?></strong></h3></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td>
						<a href="<?= base_url().'index.php/presupuestos'?>" class="btn btn-success btn-icon" data-toggle="modal" >
							<i class="fa fa-chevron-left"></i> 
						</a>
					</td>
					<td>
						<button class="btn btn-success btn-icon refresh disabled" type="submit">
							<i class="fa fa-refresh btn-refresh"></i>
						</button>
					</td>
					<td>
						<? if(isset($p_estado)){?>
						<a  class="btn btn-warning btn-icon"  href="#" title="valorar cambios" data-toggle="modal" data-target=".valoracion">
							<i class="fa fa-question"></i>
						</a>
						<div class="sub-texto">Se deben valorar las notas</div>
						<? }else{?>
						<a href="<?= base_url().'index.php/presupuestos/transporte'.$id_presupuesto?>" class="btn btn-primary btn-icon confirm">
							<i class="fa fa-check"></i>
						</a>
						<? } ?>		
					</td>
				</tr>
			</tbody>
		</table>
		<?php echo form_close(); ?>	
	</div>
</div>
	


<div class="modal fade valoracion" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="pull-right btn btn-danger" data-dismiss="modal">
					<i class="fa fa-times"></i>
				</button>
				<h4 class="modal-title">Valoración</h4>
			</div>
			<div class="modal-body">
				<p>La administración debe evaluar sus notas antes de continuar con el presupuesto, muchas gracias.</p>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

