<?php class Direcciones extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('departamentos_model');
		$this->load->model('provincias_model');
		$this->load->model('tipodirecciones_model');
		$this->load->model('direcciones_model');
		$this->load->helper(array('form', 'url'));
	}

	function addDireccion(){
		$direccion=array('calle' => $this->input->post('calle'),
										'nro' => $this->input->post('nro'),
										'id_departamento' => $this->input->post('departamento'),
										'id_provincia' => $this->input->post('provincia'),
										'id_tipodireccion' => $this->input->post('tipodireccion'),
										'fecha_alta'=>date("Y-m-d"));
		if($this->direcciones_model->addDireccion($direccion)){
			//cartel ok
		}else{
			//cartel no ok
		}
			$this->load->view('frontend/head');
			$this->load->view('frontend/menu');
			
			$db['provincias'] = $this->provincias_model->getProvincias();
			$db['departamentos'] = $this->departamentos_model->getDepartamentos();
			$db['tipodirecciones'] = $this->tipodirecciones_model->getTipodirecciones();
			
			$this->load->view('frontend/usuarios/direccion', $db);
			$this->load->view('frontend/footer');
		
	}

	
} ?>