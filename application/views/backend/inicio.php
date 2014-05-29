<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>
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
      <a class="navbar-brand"href='<?php echo site_url('admin')?>'>Administración</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Presupuestos<b class="caret"></b></a>
				<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
				<li class="dropdown-submenu">
                <a tabindex="-1" href="#">Parametros</a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('admin/inicio/condiciones_abm')?>">Condiciones de pagos</a></li>
                  <li><a href="<?php echo site_url('admin/inicio/horas_abm')?>">Horas de entrega</a></li>
                  <li><a href="<?php echo site_url('admin/inicio/transportes_abm')?>">Transporte</a></li>
                </ul>
              </li>
            </ul>
        	</li>
				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Página de inicio<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a  href='<?php echo site_url('admin/inicio/galeria_abm')?>'>Galería de fotos</a></li>
						<li><a  href='<?php echo site_url('admin/inicio/noticia_abm')?>'>Noticia</a></li>
          </ul>
        </li>
				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Artículos<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a  href='<?php echo site_url('admin/inicio/articulos_abm')?>'>Artículos</a></li>
            <li><a  href='<?php echo site_url('admin/inicio/categoria_abm')?>'>Categoria</a></li>
            <li><a  href='<?php echo site_url('admin/inicio/grupo_abm')?>'>Grupo</a></li>
          </ul>
        </li>
				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Usuarios<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a  href='<?php echo site_url('admin/inicio/usuarios_abm')?>'>Usuarios</a></li>
            <li><a  href='<?php echo site_url('admin/inicio/telefonos_abm')?>'>Teléfonos</a></li>
            <li><a  href='<?php echo site_url('admin/inicio/direcciones_abm')?>'>Direcciones</a></li>
            <li><a  href='<?php echo site_url('admin/inicio/emails_abm')?>'>Emails</a></li>
          </ul>
        </li>	
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href='<?php echo site_url('inicio/inicio')?>' target="_blank">Sitio</a> </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



		<?php echo $output; ?>
    </div>
</body>
</html>
