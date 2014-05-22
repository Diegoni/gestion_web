<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Gestión</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url().'index.php'?>"><i class="fa fa-home"></i> Inicio</a></li>
				<li><a href="<?php echo base_url().'index.php/presupuestos'?>"><i class="fa fa-suitcase"></i> Presupuestos</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Opciones<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'index.php/presupuestos'?>"><i class="fa fa-plus"></i> Nuevo</a></li>
						<li><a href="#"><i class="fa fa-book"></i> Mis	 presupuestos</a></li>
						<li class="divider"></li>
						<li><a href="#">Presupuestos pendientes</a></li>
						<li class="divider"></li>
						<li><a href="#">Presupuestos aprobados</a></li>
					</ul>
				</li>

			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Buscar">
				</div>
				<button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<?php 
					if(isset($usuario['id_usuario'])){
				?>
				<li>
					<a href="<?php echo base_url().'index.php/usuarios/interfaz/'.$usuario['id_usuario']?>">
						<i class="fa fa-user"></i> <?php echo	$usuario['usuario']; ?><span class="badge pull-right">0</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url().'index.php/home/logout'?>"><i class="fa fa-sign-out"></i> Salir</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>
				<?php }else{?>
				<li>
					<a  href="" data-toggle="modal" data-target=".bs-example-modal-lg">
						<i class="fa fa-sign-in"></i> Login
					</a>
				</li>
				<?php }?>				
			</ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>











<!---------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------
					Modal login
-----------------------------------------------------------------------------------------------	
---------------------------------------------------------------------------------------------->	
	
	
	
<div class="modal fade bs-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><h3 class="omb_authTitle">Login or <a href="http://localhost/gestion_tms/index.php/usuarios/registro/">Registrarse</a></h3></h4>
      </div>
      <div class="modal-body">
        <p>
    <div class="omb_login">
    	
		<div class="row omb_row-sm-offset-3 omb_socialButtons">
    	    <div class="col-xs-4 col-sm-2">
		        <a href="#" class="btn btn-icon btn-block omb_btn-facebook">
			        <i class="fa fa-facebook visible-xs"></i>
			        <span class="hidden-xs"><i class="fa fa-facebook"></i></span>
		        </a>
	        </div>
        	<div class="col-xs-4 col-sm-2">
		        <a href="#" class="btn btn-icon btn-block omb_btn-twitter">
			        <i class="fa fa-twitter visible-xs"></i>
			        <span class="hidden-xs"><i class="fa fa-twitter"></i></span>
		        </a>
	        </div>	
        	<div class="col-xs-4 col-sm-2">
		        <a href="#" class="btn btn-icon btn-block omb_btn-google">
			        <i class="fa fa-google-plus visible-xs"></i>
			        <span class="hidden-xs"><i class="fa fa-google-plus"></i></span>
		        </a>
	        </div>	
		</div>

		<div class="row omb_row-sm-offset-3 omb_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="omb_hrOr">
				<span class="omb_spanOr">o</span>
			</div>
		</div>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">	
					<?php echo form_open('verifylogin'); ?>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Usuario">
					</div>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<br>	
                    <!--<span class="help-block">Password error</span>-->

					<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				</form>
			</div>
    	</div>
		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-3">
				<label class="checkbox">
					<input type="checkbox" value="remember-me">Recordar
				</label>
			</div>
			<div class="col-xs-12 col-sm-3">
				<p class="omb_forgotPwd">
					<a href="#">olvidaste el password?</a>
				</p>
			</div>
		</div>	    	
	</div>
</p>
      </div>
	  
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container">