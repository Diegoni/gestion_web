<!--------------------------------------------------------------------
----------------------------------------------------------------------
										Acordeon Grupo y Categoria

<div class="col-sm-3 col-md-3">
				<div class="panel-group" id="accordion">
				<? foreach ($grupos as $grupo){ ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $grupo->id_grupo; ?>"><span class="glyphicon glyphicon-folder-close">
								</span> <?= $grupo->grupo; ?></a>
							</h4>
						</div>
						<div id="collapse<?= $grupo->id_grupo; ?>" class="panel-collapse collapse">
							<div class="panel-body">
								<table class="table">
								<? foreach ($categorias as $categoria){ ?>
								<? if($grupo->id_grupo==$categoria->id_grupo){ ?>
									<tr>
										<td>
											<span class="glyphicon glyphicon-pencil text-primary"></span>								
											<a href="<?= base_url().'index.php/presupuestos/funcion/'.$categoria->id_categoria.'/0/0';?>"> 
											<?= $categoria->categoria; ?>
											</a>																																								
										</td>
									</tr>
								<? } ?>
								<? } ?>
								</table>
							</div>
						</div>
					</div>
					<? } ?>
				</div>
</div>
----------------------------------------------------------------------
--------------------------------------------------------------------->