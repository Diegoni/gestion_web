<?php class Usuarios extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('provincias_model');
		$this->load->model('departamentos_model');
		$this->load->model('usuarios_model');
		$this->load->model('user');
		$this->load->helper(array('form', 'url'));
		/*$this->load->helper('url');*/
	}

	function registro(){
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu');
		$db['provincias'] = $this->provincias_model->getProvincias();
		$db['departamentos'] = $this->departamentos_model->getDepartamentos();
		$this->load->view('frontend/usuarios/registro', $db);
		$this->load->view('frontend/footer');			
	}
	
	function edit($id_usuario=0){
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu');
		$db['provincias'] = $this->provincias_model->getProvincias();
		$db['departamentos'] = $this->departamentos_model->getDepartamentos();
		$db['usuarios'] = $this->usuarios_model->getUsuario($id_usuario);
		$this->load->view('frontend/usuarios/edit', $db);
		$this->load->view('frontend/footer');			
	}
	
	function interfaz($id_usuario=0){
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu');
		$db['provincias'] = $this->provincias_model->getProvincias();
		$db['departamentos'] = $this->departamentos_model->getDepartamentos();
		$db['usuarios'] = $this->usuarios_model->getUsuario($id_usuario);
		$this->load->view('frontend/usuarios/send', $db);
		$this->load->view('frontend/footer');			
	}
	
	function create(){
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[100]|xss_clean');
		$this->form_validation->set_rules('apellido', 'Apellidos', 'required|min_length[3]|max_length[100]|xss_clean');
		//aquí llamamos al callback comprobar_email_ajax 
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|max_length[100]|valid_email|callback_comprobar_email_ajax|xss_clean');
		//aquí llamamos al callback comprobar_username_ajax 
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|min_length[2]|max_length[100]|callback_comprobar_usuario_ajax|xss_clean');
		// $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|max_length[100]|xss_clean');
 
		//lanzamos mensajes de error si es que los hay
		$this->form_validation->set_message('required', '%s: es requerido');
		$this->form_validation->set_message('min_length', '%s: debe tener al menos %s carácteres');
		$this->form_validation->set_message('max_length', '%s: debe tener al menos %s carácteres');
		$this->form_validation->set_message('valid_email', '%s: debe escribir un email válido');
 
		if ($this->form_validation->run() == FALSE) {
			$this->registro();
		} else {
			$this->load->view('frontend/head');
			$this->load->view('frontend/menu');
			$fecha_alta = date("Y-m-d H:i:s");
			$usuario = array(	'usuario' => $this->input->post('usuario'),
												'nombre' => $this->input->post('nombre'),
												'apellido' => $this->input->post('apellido'),
												'password' => md5($this->input->post('password')),
												'fecha_alta' => $fecha_alta);
			$telefono = array('telefono' => $this->input->post('telefono'),
												'fecha_alta' => $fecha_alta);
			$direccion = array('id_provincia' => $this->input->post('provincia'),
												'id_departamento' => $this->input->post('departamento'),
												'calle' => $this->input->post('calle'),
												'nro' => $this->input->post('nro'),
												'fecha_alta' => $fecha_alta);
			$email=array('email' => $this->input->post('email'),
												 'fecha_alta' => $fecha_alta);
			$id=$this->usuarios_model->addUsuario($usuario, $telefono, $direccion, $email);
			if($id){
				$db['usuarios'] = $this->usuarios_model->getUsuario($id);
				$this->load->view('frontend/usuarios/send', $db);
			}
			$this->load->view('frontend/footer');	
		}	
	}
	
	//validamos el username con ajax
	public function comprobar_usuario_ajax() {
		$usuario = $this->input->post('usuario');
		$comprobar_username = $this->usuarios_model->verifica_username($usuario);
		if ($comprobar_username == $usuario) {
			$this->form_validation->set_message('comprobar_usuario_ajax', '%s: ya existe en la base de datos');
			return FALSE;
		} else {
			echo '<div style="display:none">1</div>';
		return TRUE;
		}
	}
 
    //validamos el email con ajax
	public function comprobar_email_ajax() {
		$email = $this->input->post('email');
		$comprobar_email = $this->usuarios_model->verifica_email($email);
		if ($comprobar_email) {
			$this->form_validation->set_message('comprobar_email_ajax', '%s: ya existe en la base de datos');
			return FALSE;
		} else {
			echo '<div style="display:none">1</div>';
			return TRUE;
		}
	}
	
	function getDepartametos($id_provincia = 0){
		$db['departamentos'] = $this->departamentos_model->getDepartamentos($id_provincia);
		$this->load->view('frontend/usuarios/getDepartamento', $db);
	}
	
/*********************************************************************************************	
**********************************************************************************************
										Login de usuarios
**********************************************************************************************	
*********************************************************************************************/	

  function verificar_login(){
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	
		if($this->form_validation->run() == FALSE){
      //En caso de error carga de nuevo el formulario
      redirect('inicio/error', 'refresh');
		}else{
      //Refresh pagina con el usuario
			$url = $_SERVER['HTTP_REFERER'];
      redirect($url, 'refresh');
		}
    
  }
 
	function check_database($password){
    //Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
    
		//query the database
		$result = $this->user->login($username, $password);
    
		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id' => $row->id_usuario,
					'username' => $row->usuario
				);
				$this->session->set_userdata('logged_in', $sess_array);
				$_SESSION['username']=$row->usuario;
			}
			return TRUE;
		}else{
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
		}
  }
	
	function login(){
   $this->load->helper(array('form'));
   $this->load->view('login_view');
	}
	
  function logout(){
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('inicio', 'refresh');
  }

	
	

	
	

	
} ?>