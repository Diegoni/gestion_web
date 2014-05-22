<div class="row">
<!--------------------------------------------------------------------
----------------------------------------------------------------------
												Menu 
----------------------------------------------------------------------
--------------------------------------------------------------------->
<div class="col-sm-12 col-md-12">
		<ul class="sf-menu" id="example">
			<li class="current">		
				<a href="#">Productos</a>
				<ul>
					<?php foreach ($grupos as $grupo){ ?>
					<li class="current">
						<a href="~#"><?php echo $grupo->grupo; ?></a>
						<ul>
							<?php foreach ($categorias as $categoria){ ?>
							<?php if($grupo->id_grupo==$categoria->id_grupo){ ?>
							<li><a href="<?php echo base_url().'index.php/presupuestos/funcion/'.$categoria->id_categoria.'/0/0';?>"> 
									<?php echo $categoria->categoria; ?></a>
							</li>
							<?php } ?>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
				</ul>
			</li>		
			<?php if($usuario['id_usuario']){ ?>
			<li class="current">		
				<a href="#">Presupuestos</a>
				<ul>
					<li class="current">					
					<?php 
					echo form_open('presupuestos/addPresupuesto');?>	
					<li class="current">
						<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']?>" >
						<button type="submit" class="btn btn-default nuevo_presupuesto" >
							<i class="fa fa-file-o"></i> Nuevo
						</button>	
					</li>
					<?php echo form_close()?>
					</li>
					<li class="current">
						<a href="followed.html"><i class="fa fa-folder-open-o"></i> Abrir</a>						
					</li>
					<li class="current">
						<a href="followed.html"><i class="fa fa-floppy-o"></i> Guardar</a>						
					</li>
				</ul>
			</li>		
			<?php } ?>
		</ul>
</div>

<!--------------------------------------------------------------------
----------------------------------------------------------------------
												Articulos 
----------------------------------------------------------------------
--------------------------------------------------------------------->

<div class="well col-sm-9 col-md-9">
<?php 
if($articulos){
foreach ($articulos as $articulo){?>
<!-- Panel inicial -->
				<div class="row user-row">
            <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
						<a href="#" class="pull-left pull-left-away" data-toggle="modal" data-target=".articulo-modal<?php echo $articulo->id_articulo;?>">
                <img class="img-circle-sm" src="<?php echo base_url().'assets/uploads/files/'.$articulo->imagen?>"  alt="User Pic">
						</a>
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                <strong><?php echo $articulo->articulo;?></strong><br>
                <span class="text-muted"><?php echo $articulo->descripcion;?></span><br>	
						</div>
						<div>
						</div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".<?php echo $articulo->id_articulo;?>">
                <button class="btn btn-default"><i class="glyphicon glyphicon-chevron-down text-muted"></i></button>
            </div>
        </div>
		
<!-- Detalle Panel cabecera -->	
				<div class="row user-infos <?php echo $articulo->id_articulo;?>">
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Información del producto.</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="fancybox col-md-3 col-lg-3 hidden-xs hidden-sm" href="<?php echo base_url().'assets/uploads/files/'.$articulo->imagen?>">
										<img class="img-big" src="<?php echo base_url().'assets/uploads/files/'.$articulo->imagen?>" alt="User Pic">
									</div>
									<div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
										<img class="img-circle"  src="<?php echo base_url().'assets/uploads/files/'.$articulo->imagen?>" alt="User Pic">
									</div>
									<div class="col-md-9 col-lg-9 hidden-xs hidden-sm">
										<strong><?php echo $articulo->articulo;?><br>
										<table class="table table-user-information">
											<tbody>
												<tr>
													<td>Stock:</td>
													<td><?php echo $articulo->stock;?></td>
												</tr>
												<tr>
													<td>Precio:</td>
													<td>$ <?php echo $articulo->precio;?></td>
												</tr>
												<tr>
													<td>Descripción</td>
													<td><?php echo $articulo->descripcion;?></td>
												</tr>
												<tr>
													<td colspan="2">
														<center>
															<?php echo form_open('presupuestos/addArticulo'); ?>	
															<label class="cantidad-label">Cant.</label>
															<input type="number" name="cantidad" value="1" min="<?php echo $articulo->stock_min?>" max="<?php echo $articulo->stock_max?>" class="cantidad">
															<input type="hidden" name="id_articulo" value="<?php echo $articulo->id_articulo; ?>">
															<input type="hidden" name="precio" value="<?php echo $articulo->precio; ?>">
															<input type="hidden" name="id_categoria" value="<?php echo $articulo->id_categoria; ?>">															
															<input type="hidden" name="id_presupuesto" value="<?php echo $id_presupuesto; ?>">	
															<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
															<button class="cantidad-btn btn btn-success">
																<i class="fa fa-plus"></i> Agregar
															</button>
															<?php echo form_close(); ?>		
														</center>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
					
					
					
<!-- Detalle Panel grupo de botones -->						
							<div class="panel-footer">
								<button class="btn btn-info" type="button" title="Consulta">
									<i class="fa fa-comment"></i>
								</button>
								<button class="btn btn-info" type="button" title="Enviar por correo">
									<i class="fa fa-envelope"></i></button>
								<button class="btn btn-info" type="button" title="Imprimir">
									<i class="fa fa-print"></i>
								</button>											
												
								<div class="btn-group">
								  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" title="Compartir">
									<i class="fa fa-share-square"></i><span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></li>
									<li><a href="#"><i class="fa fa-twitter-square"></i> Twitter</a></li>
									<li><a href="#"><i class="fa fa-google-plus-square"></i> Google++</a></li>
								</div>	
                        
								<span class="pull-right">	
									<a class="btn btn-danger delete"   href="<?php echo base_url().'index.php/presupuestos/funcion/'.$articulo->id_categoria.'/'.$articulo->id_articulo.'/3';?>">
										<i class="fa fa-trash-o"></i>
									</a>								
								</span>
							</div>
						</div>
					</div>
        </div>  
	<?php }
	}else{?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Atención!</strong> No hay artículos con esta categoría.
	</div>
	<?php }?>
</div>


<!--------------------------------------------------------------------
----------------------------------------------------------------------
										Carro de compras
----------------------------------------------------------------------
--------------------------------------------------------------------->	



<div class="col-sm-3 col-md-3">
	<div class="titulo-carrito">
	<a href="<?php echo base_url().'index.php/presupuestos/presupuesto'?>" class="micarrito">
	<i class="fa fa-shopping-cart"></i> 
	Mi carro de compras  
	</a>
		<div class="pull-right dropdown-carrito" data-for=".carrito">
			<i class="glyphicon-chevron-up text-muted glyphicon"></i>
		</div>
	</div>
<?php if($detalles){ ?>
<div class="carrito-infos carrito">
<?php $total=0; ?>
<?php foreach ($detalles as $detalle){?>
	<div class="clearfix info">
    <div class="unidades">
			<span><?php echo $detalle->cantidad;?></span><br>Unid..
		</div>
		<div class="producto">
			<strong><?php echo $detalle->articulo;?></strong><br>
			<span class="brandDesc"><?php echo $detalle->descripcion?></span>
		</div>
		<div class="precio">
			<?php
				$subtotal=$detalle->cantidad*$detalle->precio;
				$total=$total+$subtotal;
			?>
			$<?php echo $subtotal;?>
		</div>
		<div class="eliminar">
		<a class="btn btn-danger delete" title="sacar del pedido"   href="<?php echo base_url().'index.php/presupuestos/funcion/'.$detalle->id_categoria.'/'.$detalle->id_articulo.'/3';?>">
			<i class="fa fa-trash-o"></i>
		</a>	
		<a class="btn btn-primary"  title="agregar nota" data-toggle="modal" data-target=".modal-nota">
			<i class="fa fa-pencil"></i>
		</a>	
		</div>
	</div>
	
<?php } ?>
<?php
if($notas){
foreach($notas as $nota){?>
<div class="clearfix info">
    <div class="unidades">
			<span>Nota</span><br>
		</div>
		<div class="producto">
			<strong><?php echo $nota->nota;?></strong><br>
			<span class="brandDesc"></span>
		</div>
		<div class="precio">
		</div>
		<div class="eliminar">
		<?php echo form_open('presupuestos/deleteNota'); ?>	
		<input type="hidden" name="id_nota" value="<?php echo $nota->id_nota?>">
		<button class="btn btn-danger delete" title="sacar del pedido"  >
			<i class="fa fa-trash-o"></i>
		</button>
		<?php echo form_close(); ?>	
		</div>
	</div>
	
<?php
}
}
?>
	<div class="vaciar">
	<div data-toggle="modal" data-target=".bs-example-modal-sm">
			<i class="fa fa-trash-o"></i> Vaciar el presupuesto
	</div>
	</div>
</div>
	
	<div class="valor-total">$ <?php echo $total;?></div>
	<div class="sub-texto">Valor total del presupuesto</div>
	<br>
<?php }else{ ?>
	<div class="carrito">
	<center>
	<div class="btn-icon center-icon">
		<i class="fa fa-shopping-cart"></i>
	</div>
	</center>
	<div class="sub-texto">No hay elementos agregados</div>
	</div>
<?php } ?>

	<center>
<?php if(empty($detalles)){?>
<?php }else if(isset($p_estado)){?>
	<a  class="btn btn-warning btn-icon"  href="<?php echo base_url().'index.php/presupuestos/presupuesto'?>" data-toggle="modal" title="valorar cambios" >
		<i class="fa fa-question"></i>
	</a>
	<div class="sub-texto">Se deben valorar las notas</div>
<?php }else{?>
	<a  class="btn btn-primary btn-icon"  href="<?php echo base_url().'index.php/presupuestos/presupuesto/'.$id_presupuesto?>" data-toggle="modal" title="confirmar pedido" >
		<i class="fa fa-check"></i>
	</a>
<?php } ?>
	</center>



</div>
</div> 


<!--------------------------------------------------------------------
----------------------------------------------------------------------
										Modal confirmar borrar
----------------------------------------------------------------------
--------------------------------------------------------------------->	

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Limpiar datos del pedido</h4>
      </div>
      <div class="modal-body">
        Todos los artículos que usted ha marcado se borraran, está seguro de realizar esta acción.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a  class="btn btn-primary truncate"  href="<?php echo base_url().'index.php/presupuestos/funcion/1/1/4'?>">Limpiar pedido</a>
      </div>
    </div>
  </div>
</div>


<!--------------------------------------------------------------------
----------------------------------------------------------------------
										Modal nota
----------------------------------------------------------------------
--------------------------------------------------------------------->	

<div class="modal fade modal-nota">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><h3 class="omb_authTitle"><i class="fa fa-pencil"></i> Nota</h4>
      </div>
		  <div class="modal-body">
			<p>
			<div class="omb_login">
				<div class="row omb_row-sm-offset-3">
					<div class="col-xs-12 col-sm-6">	
							<?php echo form_open('presupuestos/addNota'); ?>		
							<div class="form-group">
								<textarea type="text" name="nota" rows="6" class="form-control" id="consulta" placeholder="Escriba su consulta"></textarea>
						  </div>
							<br>	
							<button class="btn btn-lg btn-primary btn-block" type="submit">Guardar nota</button>
							<?php echo form_close(); ?>	
					</div>
				</div>
			</div>
			</p>
		  </div>
		</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->





