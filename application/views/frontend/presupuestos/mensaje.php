<?php
if(isset($id)){
	if($id!=0){?>
		<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Bien hecho!</strong> 
		  <?php foreach ($funcion as $funcion){ ?>
				<?php echo $funcion->mensaje_ok;?>
		  <?php }?>
		</div>
	<?php }else{ ?>
		<div class="alert alert-warning alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Atención!</strong> <?php foreach ($funcion as $funcion){ ?>
				<?php echo $funcion->mensaje_error;?>
		  <?php }?>
		</div>
	<?php }
}
?>