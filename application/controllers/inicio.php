<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
			parent::__construct();
      $this->load->model('inicio_model');
			$this->load->model('galerias_model');
			$this->load->model('noticias_model');
			$this->load->model('usuarios_model');
			$this->load->helper('url');
	}

	function carga_usuario(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$db['id_usuario']=$session_data['id'];
			$db['usuario']=$session_data['username'];
			return $db;
		}
	}	

	
	public function index(){
		$db=$this->carga_usuario();
	
		$db['fotos'] = $this->galerias_model->getFotos();
		$db['noticias_secundarias'] = $this->noticias_model->getNoticiasSecundarias();
		$db['noticias_principales'] = $this->noticias_model->getNoticiasPrincipales();

		$this->load->view('frontend/head');
		$this->load->view('frontend/menu', $db);
		$this->load->view('frontend/inicio/inicio', $db);
		$this->load->view('frontend/footer');
	}
	
	public function error()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$_SESSION['username'] = $session_data['username'];
			$_SESSION['id_user'] = $session_data['id'];
		}else{
			//If no session, redirect to login page
			//redirect('login', 'refresh');
		}
	
	
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu');
		$this->load->view('frontend/inicio/error');
		$this->load->view('frontend/footer');
	}

}

