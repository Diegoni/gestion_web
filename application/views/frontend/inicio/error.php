<!---------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------
					Modal login
-----------------------------------------------------------------------------------------------	
---------------------------------------------------------------------------------------------->	
<?php echo validation_errors(); ?>

<div class="panel panel-success">
<div class="panel-heading">Login o <a href="http://localhost/gestion_tms/index.php/usuarios/registro/">Registrarse</a></div>
<div class="panel-body">

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
					<?php echo validation_errors(); ?>
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

</div>
</div>
</div>


