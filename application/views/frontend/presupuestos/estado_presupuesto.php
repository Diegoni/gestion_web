<div class="row">
<div class=" shop-tracking-status">
	<div class="col-md-8 col-md-offset-2">
	<div class="wizard">
		<?php if ($estado==0){ ?>
			<a class="current"><span class="badge badge-inverse">1</span> Selección</a>
			<a><span class="badge">2</span> Resumen</a>
			<a><span class="badge">3</span> Dirección y transporte</a>
			<a><span class="badge">4</span> Pago</a>
			<a><span class="badge">5</span> Envió</a>				   	
    	<?php }else if ($estado==1){ ?>
    		<a href="<?php echo base_url().'index.php/presupuestos/getPresupuesto/'.$id_presupuesto?>" class="current"><span class="badge badge-inverse">1</span> Selección</a>
    		<a class="current"><span class="badge badge-inverse">2</span> Resumen</a>
    		<a><span class="badge">3</span> Dirección y transporte</a>
    		<a><span class="badge">4</span> Pago</a>
    		<a><span class="badge">5</span> Envió</a>
   		<?php }else if ($estado==2){ ?>
			<a href="<?php echo base_url().'index.php/presupuestos/getPresupuesto/'.$id_presupuesto?>" class="current"><span class="badge badge-inverse">1</span> Selección</a>
    		<a href="<?php echo base_url().'index.php/presupuestos/presupuesto/'.$id_presupuesto?>" class="current"><span class="badge badge-inverse">2</span> Resumen</a>   		
			<a class="current"><span class="badge badge-inverse">3</span> Dirección y transporte</a>
			<a><span class="badge">4</span> Pago</a>
			<a><span class="badge">5</span> Envió</a>		    	
    	<?php }else if ($estado==3){ ?>
    		<a href="<?php echo base_url().'index.php/presupuestos/getPresupuesto/'.$id_presupuesto?>" class="current"><span class="badge badge-inverse">1</span> Selección</a>
    		<a href="<?php echo base_url().'index.php/presupuestos/presupuesto/'.$id_presupuesto?>" class="current"><span class="badge badge-inverse">2</span> Resumen</a>   		
			<a href="<?php echo base_url().'index.php/presupuestos/transporte/'.$id_presupuesto?>" class="current"><span class="badge badge-inverse">3</span> Dirección y transporte</a>
			<a class="current"><span class="badge badge-inverse">4</span> Pago</a>
			<a><span class="badge">5</span> Envió</a>
    	<?php }else{ ?>
    		<a href="<?php echo base_url().'index.php/presupuestos/getPresupuesto/'.$id_presupuesto?>" class="current"><span class="badge badge-inverse">1</span> Selección</a>
    		<a class="current"><span class="badge badge-inverse">2</span> Resumen</a>   		
			<a class="current"><span class="badge badge-inverse">3</span> Dirección y transporte</a>
			<a class="current"><span class="badge badge-inverse">4</span> Pago</a>
			<a class="current"><span class="badge badge-inverse">5</span> Envió</a>
    	<?php } ?>    		
    	
    	 
	</div>
	</div>
</div>
</div>

<hr> 