<?php
if($articulos){
foreach($articulos as $articulo){ ?>	
<div class="modal fade articulo-modal<?php echo $articulo->id_articulo;?>" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="pull-right btn btn-danger" data-dismiss="modal">
					<i class="fa fa-times"></i>
				</button>
				<h4 class="modal-title"><?php echo $articulo->articulo;?></h4>
			</div>
			<div class="modal-body">
				<center><img src="<?php echo base_url().'assets/uploads/files/'.$articulo->imagen?>"></center>
				<div class="pull-right"><?= $articulo->descripcion?></div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-info pull-left" type="button" title="Consulta">
					<i class="fa fa-comment"></i>
				</button>
				<button class="btn btn-info pull-left" type="button" title="Enviar por correo">
					<i class="fa fa-envelope"></i></button>
				<button class="btn btn-info pull-left" type="button" title="Imprimir">
					<i class="fa fa-print"></i>
				</button>											
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<?php } 
	}
?>

<!--
<div class="modal-footer">
				<button class="btn btn-info pull-left" type="button" title="Consulta">
					<i class="fa fa-comment"></i>
				</button>
				<button class="btn btn-info pull-left" type="button" title="Enviar por correo">
					<i class="fa fa-envelope"></i></button>
				<button class="btn btn-info pull-left" type="button" title="Imprimir">
					<i class="fa fa-print"></i>
				</button>											
												
				<span class="pull-right">	
					<a class="btn btn-danger delete"   href="<?= base_url().'index.php/presupuestos/funcion/'.$articulo->id_categoria.'/'.$articulo->id_articulo.'/3';?>">
						<i class="fa fa-trash-o"></i>
					</a>								
				</span>
			</div>
-->