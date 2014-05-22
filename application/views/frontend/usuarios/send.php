<!--------------------------------------------------------------------
----------------------------------------------------------------------
												Interfaz de usuario
----------------------------------------------------------------------
--------------------------------------------------------------------->	 
<? foreach($usuarios as $usuario){?>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
    	 <div class="well profile">
            <div class="col-sm-12">
								<!-- datos -->
                <div class="col-xs-12 col-sm-8">
                    <h2><?= $usuario->usuario;?></h2>
                    <p><strong>Apellido: </strong><?= $usuario->apellido;?></p> 
										<p><strong>Nombre: </strong><?= $usuario->nombre;?></p>
                    <p><strong>Cuil: </strong><?= $usuario->cuil;?></p>
                    <p><strong>Datos: </strong></p>
										<p>
                        <a href="" class="btn btn-primary">
													<i class="fa fa-phone"></i> teléfonos
												</a> 
                        <a href="" class="btn btn-success">
													<i class="fa fa-envelope-o"></i> correos
												</a>
                        <a href="<?= base_url().'index.php/direcciones/addDireccion'?>" class="btn btn-info">
													<i class="fa fa-map-marker"></i> direcciones
												</a>
                    </p>
                </div>             
								<!-- fotos y clasificación -->
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-circle img-responsive">
                        <figcaption class="ratings">
                            <p>Ratings
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                 <span class="fa fa-star-o"></span>
                            </a> 
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>    
						<!-- opciones -->
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> 0 </strong></h2>                    
										<p><small>Cantidad de pedidos</small></p>
                    <a href="http://localhost/gestion_tms/index.php/presupuestos" class="btn btn-default btn-block"><span class="fa fa-plus-circle"></span> Pedidos</a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>$ 0</strong></h2>  
										<p><small>Total</small></p>					
                    <a href="" class="btn btn-default btn-block disabled"><span class="fa fa-user"></span> Saldo</a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>0</strong></h2>                    
                    <p><small>Notificaciones</small></p>
										
										<div class="btn-group dropdown btn-block">
											<center>
										  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										  
											<span class="fa fa-gear"></span> Opciones <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu" role="menu">								  
												<li><a href="#"data-toggle="modal" data-target=".modal-consulta">
														<span class="fa fa-envelope" ></span> Enviar consulta</a>
												</li>
                        <li><a href="<?= base_url().'index.php/usuarios/edit/'.$usuario->id_usuario?>">
														<span class="fa fa-list"></span> Editar datos</a>
												</li>
                        <li class="divider"></li>
                        <li><a href="#"data-toggle="modal" data-target=".modal-reporte">
														<span class="fa fa-warning"></span> Reportar</a>
												</li>
										  </ul>
										  </center>
										</div>
                </div>
            </div>
    	 </div>                 
		</div>
	</div>
</div>
<? } ?>


<!--------------------------------------------------------------------
----------------------------------------------------------------------
												Modal reporte y consulta
----------------------------------------------------------------------
--------------------------------------------------------------------->	 


<div class="modal fade modal-consulta">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><h3 class="omb_authTitle"><span class="fa fa-envelope"></span> Consulta</h4>
      </div>
		  <div class="modal-body">
			<p>
			<div class="omb_login">
				<div class="row omb_row-sm-offset-3">
					<div class="col-xs-12 col-sm-6">	
						<form class="omb_loginForm" action="" autocomplete="off" method="POST">
							<div class="form-group">
								<textarea type="text" rows="6" class="form-control" id="consulta" placeholder="Escriba su consulta"></textarea>
						  </div>
							<br>	
							<button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
						</form>
					</div>
				</div>
			</div>
			</p>
		  </div>
		</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade modal-reporte">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><h3 class="omb_authTitle"><span class="fa fa-warning"> Reportar</h4>
      </div>
		  <div class="modal-body">
			<p>
			<div class="omb_login">
				<div class="row omb_row-sm-offset-3">
					<div class="col-xs-12 col-sm-6">	
						<form class="omb_loginForm" action="" autocomplete="off" method="POST">
							<div class="form-group">
								<textarea type="text" rows="6" class="form-control" id="consulta" placeholder="Escriba su reporte"></textarea>
						  </div>
							<br>	
							<button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
						</form>
					</div>
				</div>
			</div>
			</p>
		  </div>
		</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->