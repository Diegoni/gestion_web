<?php class Presupuestos extends CI_Controller{

    function __construct(){
			parent::__construct();
      $this->load->model('presupuestos_model');
      $this->load->model('grupos_model');
      $this->load->model('categorias_model');
      $this->load->model('articulos_model');
      $this->load->model('usuarios_model');
      $this->load->model('departamentos_model');
      $this->load->model('provincias_model');
      $this->load->model('tipodirecciones_model');
			$this->load->helper('url');
	  }


/************************************************************************************
*************************************************************************************
								Carga de articulos
*************************************************************************************
************************************************************************************/	  
	
	function vistaCarga($db){
		$data = array('estado' => 0);
		$db['usuario']=$this->usuarios_model->carga_usuario();
		
		$db['grupos'] = $this->grupos_model->getGrupos();
		$db['notas'] = $this->presupuestos_model->getNotas();
		$db['categorias'] = $this->categorias_model->getCategorias();
		$db['detalles'] = $this->presupuestos_model->getArticulos($db['id_presupuesto']);
		if(isset($db['id_categoria'])){
			$db['articulos'] = $this->articulos_model->getArticulos($db['id_categoria']);
		}else{
			$db['articulos'] = $this->articulos_model->getArticulos();
		}

		if($db['notas']){
			$db['p_estado'] = 'Pendiente de resolver';
		}
		
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu', $db);
		$this->load->view('frontend/presupuestos/estado_presupuesto', $data);
		$this->load->view('frontend/presupuestos/mensaje', $db);
		$this->load->view('frontend/presupuestos/inicio', $db);
		$this->load->view('frontend/presupuestos/modal-articulo', $db['articulos']);
		$this->load->view('frontend/footer');		
	}

	function index($id_presupuesto=0){
		$db['id_presupuesto']=$this->presupuestos_model->getPresupuesto(1);
		$this->vistaCarga($db);
	}
	
	
	function getPresupuesto($id_presupuesto=0){
		if($id_presupuesto!=0){
			$db['id_presupuesto']=$id_presupuesto;	
		}	
		
		$this->vistaCarga($db);
	}
	
	function addPresupuesto(){
		//$this->presupuestos_model->truncatePresupuesto();
		$presupuesto=array('id_usuario'=>$this->input->post('id_usuario'),
							'fecha_creacion'=>date("Y/m/d"));
		if(isset($presupuesto) || $presupuesto!=0){
			$db['id_presupuesto']=$this->presupuestos_model->addPresupuesto($presupuesto);
		}
		
		$this->vistaCarga($db);
	}
	
	
	public function funcion($id_categoria = 0, $id_articulo = 0, $id_funcion =0){
		if($id_articulo!=0){
			if($id_funcion==4){
				$db['id'] = 1;
				$this->presupuestos_model->truncatePresupuesto();
				$db['funcion'] = $this->presupuestos_model->getFuncion(4);
			}
		}

		$db=array('id_categoria' => $id_categoria);
		$db['id_presupuesto']=$this->input->post('id_presupuesto');
		
		$this->vistaCarga($db);
	}
	
	function addArticulo(){
		if($this->input->post('id_presupuesto')){
			$id_presupuesto=$this->input->post('id_presupuesto');
		}else{
			$presupuesto=array(
											'id_usuario'=>$this->input->post('id_usuario'),
											'fecha_creacion'=>date("Y/m/d"));
			$id_presupuesto=$this->presupuestos_model->addPresupuesto($presupuesto);
		}
		$articulo=array('id_articulo' => $this->input->post('id_articulo'),
										'cantidad' => $this->input->post('cantidad'),
										'precio' => $this->input->post('precio'),
										'id_presupuesto'=> $id_presupuesto);
		$db=array('id_categoria' => $this->input->post('id_categoria'));
		$db['id']=$this->presupuestos_model->addArticulo($articulo);	
		$db['funcion'] = $this->presupuestos_model->getFuncion(2);			

		$db['id_presupuesto']=$id_presupuesto;
	
		$this->vistaCarga($db);
	}
	
	public function deleteArticulo(){
		$db['id_articulo']=$this->input->post('id_articulo');
		$db['id_presupuesto']=$this->input->post('id_presupuesto');
		$vista=$this->input->post('vista');
		$db['funcion'] = $this->presupuestos_model->getFuncion(3);

		$db['id']=$this->presupuestos_model->deleteArticulo($db['id_articulo'], $db['id_presupuesto']);
		
		if($vista=='vistaCarga'){
			$this->vistaCarga($db);	
		}else if($vista=='vistaDetalle'){
			$this->vistaDetalle($db);
		}
		
	}
		
	function addNota(){
		$nota=array('nota' => $this->input->post('nota'));
		if(isset($nota) || $nota!=0){
			$db['nota'] = $this->presupuestos_model->addNota($nota);
		}
		
		$this->index($db);
	}
		
	function deleteNota(){
		$nota=array('id_nota' => $this->input->post('id_nota'));
		if(isset($nota) || $nota!=0){
			$db['nota'] = $this->presupuestos_model->deleteNota($nota);
			$db['p_estado'] = 'Pendiente de resolver';
		}
		
		$this->index();
	}
		

/************************************************************************************
*************************************************************************************
								Detalle de presupuesto
*************************************************************************************
************************************************************************************/	  
		
	public function vistaDetalle($db){
		$data = array('estado' => 1);
		$db['usuario']=$this->usuarios_model->carga_usuario();
		
		$db['notas'] = $this->presupuestos_model->getNotas();
		if($db['notas']){
			$db['p_estado'] = 'Pendiente de resolver';
		}

		$db['articulos'] = $this->presupuestos_model->getArticulos($db['id_presupuesto']);
			
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu', $db);
		$this->load->view('frontend/presupuestos/estado_presupuesto', $data);
		$this->load->view('frontend/presupuestos/mensaje', $db);
		$this->load->view('frontend/presupuestos/presupuesto', $db);
		$this->load->view('frontend/presupuestos/modal-articulo', $db['articulos']);
		$this->load->view('frontend/footer');
	
	}
	
	
	public function presupuesto($id_presupuesto = 0){
		if($id_presupuesto!=0){
			$db['id_presupuesto'] = $id_presupuesto;
		}
		$this->vistaDetalle($db);
	}
	

	public function updateDetalle(){
		$db['id_presupuesto']=$this->input->post('id_presupuesto');
		$articulos = $this->presupuestos_model->getArticulos($this->input->post('id_presupuesto'));
		foreach($articulos as $articulo){
			$detalle=array('id_articulo'=>$this->input->post('id'.$articulo->id_articulo),
							'cantidad'=>$this->input->post('quant'.$articulo->id_articulo),
							'precio'=>$this->input->post('precio'.$articulo->id_articulo));
			$this->presupuestos_model->updateDetalle($detalle);
		}

		$this->vistaDetalle($db);
	}
	
/************************************************************************************
*************************************************************************************
								Transporte
*************************************************************************************
************************************************************************************/	 
	
	public function transporte($id_presupuesto = 30){
		$data = array('estado' => 2);
		
		$db['usuario']=$this->usuarios_model->carga_usuario();
		$db['direcciones'] = $this->usuarios_model->getDireccion($db['usuario']);
		$db['condiciones_pago'] = $this->presupuestos_model->getCondicionespago();
		$db['horas_entrega'] = $this->presupuestos_model->getHoras();
		$db['transportes'] = $this->usuarios_model->getTransportes();
		$db['articulos'] = $this->presupuestos_model->getArticulos($id_presupuesto);
		$db['id_presupuesto']=$id_presupuesto;
			
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu', $db);
		$this->load->view('frontend/presupuestos/estado_presupuesto', $data);			
		$this->load->view('frontend/presupuestos/transporte', $db);
		$this->load->view('frontend/footer');
  }


/************************************************************************************
*************************************************************************************
								Pago
*************************************************************************************
************************************************************************************/	 
	
	public function pago($id_presupuesto = 30){
		$data = array('estado' => 3);
		
		$db['usuario']=$this->usuarios_model->carga_usuario();
		$db['direcciones'] = $this->usuarios_model->getDireccion($db['usuario']);
		$db['condiciones_pago'] = $this->presupuestos_model->getCondicionespago();
		$db['horas_entrega'] = $this->presupuestos_model->getHoras();
		$db['transportes'] = $this->usuarios_model->getTransportes();
		$db['articulos'] = $this->presupuestos_model->getArticulos($id_presupuesto);
		$db['id_presupuesto']=$id_presupuesto;
			
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu', $db);
		$this->load->view('frontend/presupuestos/estado_presupuesto', $data);			
		$this->load->view('frontend/presupuestos/pago', $db);
		$this->load->view('frontend/footer');
  }
	
	
/************************************************************************************
*************************************************************************************
								Abrir presupuesto
*************************************************************************************
************************************************************************************/	 
	
	public function abrirPresupuesto($id_presupuesto = 30){
		
		
		$db['usuario']=$this->usuarios_model->carga_usuario();
		$db['presupuestos'] = $this->presupuestos_model->getPresupuestos($db['usuario']);
			
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu', $db);	
		$this->load->view('frontend/presupuestos/abrirPedido', $db);
		$this->load->view('frontend/footer');
  }	
	
	
  

} ?>