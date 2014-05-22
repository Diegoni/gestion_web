<div class="row">
<div class=" shop-tracking-status">
	<div class="col-md-12">
							<div class="order-status">

                <div class="order-status-timeline">
                    <!-- Estado del pedido, posibles clases: c0 c1 c2 c3 and c4 -->
                    <div class="order-status-timeline-completion c<?php echo $estado;?>"></div>
                </div>
					
								
                <div class="image-order-status image-order-status-new img-circle
								<?php if ($estado>=0){
									echo "active";
								}?>">
                    <span class="status">Selección</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-active img-circle
								<?php if ($estado>=1){
									echo "active";
								}?>">
                    <span class="status">Proceso</span>
                    <div class="icon	
																<?php if ($estado<1){
																echo "engris";
																}?>"></div>
                </div>
                <div class="image-order-status image-order-status-intransit img-circle
								<?php if ($estado>=2){
									echo "active";
								}?>">
                    <span class="status">Traslado</span>
                     <div class="icon	
																<?php if ($estado<2){
																echo "engris";
																}?>"></div>
                </div>
                <div class="image-order-status image-order-status-delivered img-circle
								<?php if ($estado>=3){
									echo "active";
								}?>">
                    <span class="status">Liberado</span>
                     <div class="icon	
																<?php if ($estado<3){
																echo "engris";
																}?>"></div>
                </div>
                <div class="image-order-status image-order-status-completed img-circle
								<?php if ($estado>=4){
									echo "active";
								}?>">
                    <span class="status">Completo</span>
                     <div class="icon	
																<?php if ($estado<4){
																echo "engris";
																}?>"></div>
                </div>

            </div>
    </div>
</div>
</div>

<hr> 