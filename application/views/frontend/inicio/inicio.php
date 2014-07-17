<!--------------------------------------------------------------------
----------------------------------------------------------------------
												Carrusel 
----------------------------------------------------------------------
--------------------------------------------------------------------->
	<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
			<?php foreach($fotos as $foto){?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $foto->prioridad-1;?>" class="active"></li>
			<?php }?>
      </ol>
      <div class="carousel-inner">
	  
				<?php 
				$primero=0;
				foreach($fotos as $foto){
				?>
        	<div class="item <?php if($primero==0){
														echo "active";
														$primero=1;
														}?>">
          	<img  alt="slide" src="<?php echo base_url().'assets/uploads/files/'.$foto->imagen;?>">
					<div class="carousel-caption">
					<p><?php echo $foto->titulo;?></p>
					</div>
        </div>
        <?php } ?>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
	</div>
	<div class="col-md-1">
	</div>	
	</div>


	
	
	
	
<!--------------------------------------------------------------------
----------------------------------------------------------------------
											Noticias Secundarias 
----------------------------------------------------------------------
--------------------------------------------------------------------->	
	
	
	
	<div class="row destacados">
		<?php foreach($noticias_secundarias as $noticia_secundaria){?>
		<div class="col-md-4">
    		<div>
				<img  src="<?php echo base_url().'assets/uploads/files/'.$noticia_secundaria->imagen?>" alt="Texto Alternativo" class="img-not-sec">
				<h2<?php echo $noticia_secundaria->titulo?></h2>
				<p><?php echo $noticia_secundaria->copete;?></p>
				<div class="notisec-infos <?= $noticia_secundaria->id_noticia;?>">
					<p><?php echo $noticia_secundaria->noticia;?></p>
				</div>
				<div class="dropdown-notisec" data-for=".<?php echo $noticia_secundaria->id_noticia;?>">
					<p class="btn btn-primary"><i class="glyphicon glyphicon-chevron-down"></i> Ver noticia</p>
				</div>
			</div>
		</div>
		<?php } ?>       
	</div>


<!--------------------------------------------------------------------
----------------------------------------------------------------------
												Noticias Principales 
----------------------------------------------------------------------
--------------------------------------------------------------------->	  
	<?php 
	$i=0;
	foreach($noticias_principales as $noticia_principal){
	?>
	<hr class="featurette-divider">
	<div class="row featurette"> 
	
	<?php if($i%2){	?>
     	  
        <div class="col-md-7">
          <h2 class="featurette-heading"><?php echo $noticia_principal->titulo ?></h2>
					<span class="text-muted"><?php echo $noticia_principal->copete ?></span>
					<?php if( strlen($noticia_principal->noticia)>1024){?>
          <?php echo substr($noticia_principal->noticia, 0, 1021).'...';?>			
					<?php } else{?>
					<p><?php echo $noticia_principal->noticia;?></p>
					<?php } ?>
					<a href="#" class="btn btn-primary" >Ver detalle</a>
					<p>
					<span class="label label-success">Publicado: <?php echo date("d-m-Y", strtotime($noticia_principal->fecha)); ?></span>
					<span class="label label-default">Autor: <?php echo $noticia_principal->autor ?></span>
					</p>
					
				</div>
		
        <div class="col-md-5">
					<div class="thumbnail">
						<img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="500x500" src="<?php echo base_url().'assets/uploads/files/'.$noticia_principal->imagen?>">
					</div>
        </div>
	  
	<?php }else{ ?>	
				
				<div class="col-md-5">
					<div class="thumbnail">
						<img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="500x500" src="<?= base_url().'assets/uploads/files/'.$noticia_principal->imagen?>">
					</div>
        </div>
	
     	  
        <div class="col-md-7">
          <h2 class="featurette-heading"><?php echo $noticia_principal->titulo ?></h2>
					<span class="text-muted"><?php echo $noticia_principal->copete ?></span>
					<?php if( strlen($noticia_principal->noticia)>1024){?>
          <p class="lead"><?php echo substr($noticia_principal->noticia, 0, 1021).'...';?></p>
					<?php } else{?>
					<p><?php echo $noticia_principal->noticia;?></p>
					<?php } ?>
					<a href="#" class="btn btn-primary" >Ver detalle</a>
					<p>
					<span class="label label-success">Publicado: <?php echo date("d-m-Y", strtotime($noticia_principal->fecha)); ?></span>
					<span class="label label-default">Autor: <?php echo $noticia_principal->autor ?></span>
					</p>
				</div>
	
	  <?php }?>
	</div>
	<?php $i+=1;
	  }   ?>

   

      <hr class="featurette-divider">

     <div class="row">
        <h2>
            Blockquote Box</h2>
        <div class="col-md-6">
            <div class="blockquote-box clearfix">
                <a class="btn btn-default btn-icon pull-left" href="<?php echo base_url().'index.php/presupuestos'?>">
									<i class="fa fa-plus"></i>
								</a>
                <h4>
                    Nuevo presupuesto</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                    ante.
                </p>
            </div>
            <div class="blockquote-box blockquote-primary clearfix">
								<button class="btn btn-primary btn-icon pull-left" data-toggle="modal" data-target=".bs-example-modal-lg">
									<i class="fa fa-sign-in"></i>
								</button>
                <h4>Registrate</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                    ante. <a href="http://www.jquery2dotnet.com/search/label/jquery">jquery2dotnet</a>
                </p>
            </div>
            <div class="blockquote-box blockquote-success clearfix">
                <button class="btn btn-success btn-icon pull-left" data-toggle="modal" data-target=".bs-example-modal-lg">
									<i class="fa fa-truck"></i>
								</button>
                <h4>
                    Transporte</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                    ante.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="blockquote-box blockquote-info clearfix">
								<button class="btn btn-info btn-icon pull-left" data-toggle="modal" data-target=".bs-example-modal-lg">
									<i class="fa fa-info-circle"></i>
								</button>
                <h4>
                    Información</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                    ante.
                </p>
            </div>
            <div class="blockquote-box blockquote-warning clearfix">
                <button class="btn btn-icon btn-warning pull-left" data-toggle="modal" data-target=".bs-example-modal-lg">
									<i class="fa fa-exclamation-triangle"></i>
								</button>
                <h4>
                    Advertencia</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                    ante.
                </p>
            </div>
            <div class="blockquote-box blockquote-danger clearfix">
                <button class="btn btn-icon btn-danger pull-left" data-toggle="modal" data-target=".bs-example-modal-lg">
										<i class="fa fa-dot-circle-o"></i>
								</button>
                <h4>
                    Denegado</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                    ante.
                </p>
            </div>
        </div>
    </div>

   <hr class="featurette-divider">	
	
