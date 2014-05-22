<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
		$this->load->library('image_CRUD');
	}

	public function _example_output($output = null)
	{
			$this->load->view('backend/inicio.php',$output);
	}
	
	public function _example_output2($output = null)
	{
			$this->load->view('backend/head.php',$output);
			$this->load->view('backend/inicio.php',$output);
			$this->load->view('backend/bienvenida.php',$output);
	}

	public function index()
	{
		$this->_example_output2((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	
	}


	public function articulos_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('articulo');
			$crud->columns('id_articulo','articulo','descripcion','id_categoria','stock','precio','imagen','id_estado');
			$crud->display_as('id_articulo','Articulo')
					 ->display_as('articulo','Articulo')
					 ->display_as('id_categoria','Categoria')
					 ->display_as('id_estado','Estado');
			$crud->set_subject('artículo');
			$crud->set_relation('id_categoria','categoria','categoria');
			$crud->set_relation('id_estado','estado','estado');
			
			$crud->set_field_upload('imagen','assets/uploads/files');
			
			$crud->required_fields('articulo','id_grupo','id_categoria');
			
			$output = $crud->render();

			$this->_example_output($output);
	}

	public function grupo_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('grupo');
			$crud->columns('id_grupo','grupo','id_estado');
			$crud->display_as('id_grupo','Grupo')					 
					 ->display_as('id_estado','Estado');
			$crud->set_relation('id_estado','estado','estado');
			$crud->set_subject('grupo');
			
			$crud->required_fields('grupo');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	
	public function categoria_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('categoria');
			$crud->columns('id_categoria','categoria','id_grupo', 'id_estado');
			$crud->display_as('id_categoria','Categoria')
					 ->display_as('id_grupo','Grupo')
					 ->display_as('id_estado','Estado');
			$crud->set_relation('id_grupo','grupo','grupo');
			$crud->set_relation('id_estado','estado','estado');
			$crud->set_subject('categoria');
			
			$crud->required_fields('categoria','id_grupo');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	
	public function noticia_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('noticia');
			$crud->columns('id_noticia','titulo','copete', 'noticia', 'fecha', 'imagen', 'id_tiponoticia', 'id_estado');
			$crud->display_as('id_noticia','ID')
					 ->display_as('id_tiponoticia','Tipo')
					 ->display_as('id_estado','Estado');
			$crud->set_relation('id_estado','estado','estado');
			$crud->set_relation('id_tiponoticia','tiponoticia','tiponoticia');
			$crud->set_subject('noticia');
			
			$crud->set_field_upload('imagen','assets/uploads/files');
			
			$crud->required_fields('titulo','noticia', 'id_tiponoticia');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	function galeria_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('galeria');
			$crud->columns('id_galeria','titulo','imagen', 'prioridad');
			$crud->display_as('id_galeria','ID');
			$crud->set_subject('galeria');
			
			$crud->set_field_upload('imagen','assets/uploads/files');
			
			$crud->required_fields('titulo','prioridad');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	function usuarios_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('usuarios');
			$crud->columns('id_usuario','usuario','nombre', 'apellido', 'cuil');
			$crud->display_as('id_usuario','ID');
			$crud->set_subject('usuario');
			
			$crud->required_fields('usuario','nombre', 'apellido', 'cuil');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	function telefonos_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('telefono');
			$crud->columns('id_telefono','id_usuario','telefono', 'id_tipotelefono');
			$crud->display_as('id_telefono','ID')
					 ->display_as('id_usuario','Usuario')
					 ->display_as('id_tipotelefono','Tipo');
			$crud->set_relation('id_usuario','usuarios','usuario');
			$crud->set_relation('id_tipotelefono','tipotelefono','tipotelefono');
			$crud->set_subject('teléfono');
			
			$crud->required_fields('id_usuario','telefono');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	function direcciones_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('direccion');
			$crud->columns('id_direccion', 'id_usuario', 'calle','nro', 'piso', 'id_departamento', 'id_tipodireccion');
			$crud->display_as('id_direccion','ID')
					 ->display_as('id_usuario','Usuario')
					 ->display_as('id_departamento','Dto')
					 ->display_as('id_provincia','Provincia')
					 ->display_as('id_tipodireccion','Tipo');
			$crud->set_relation('id_usuario','usuarios','usuario');
			$crud->set_relation('id_departamento','departamentos','departamento');
			$crud->set_relation('id_provincia','provincias','provincia');
			$crud->set_relation('id_tipodireccion','tipodireccion','tipodireccion');
			$crud->set_subject('dirección');
			
			$crud->required_fields('id_usuario','calle', 'nro');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	function emails_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('email');
			$crud->columns('id_email', 'id_usuario', 'email');
			$crud->display_as('id_email','ID')
					 ->display_as('id_usuario','Usuario');
			$crud->set_relation('id_usuario','usuarios','usuario');
			$crud->set_subject('emails');
			
			$crud->required_fields('id_usuario','email');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	function condiciones_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('condicion_pago');
			$crud->columns('id_condicion_pago', 'condicion_pago');
			$crud->display_as('id_condicion_pago','ID')
					 ->display_as('condicion_pago','Condición pago');			
			$crud->set_subject('Condiciones');
			
			$crud->required_fields('condicion_pago');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
		function horas_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('horas_entrega');
			$crud->columns('id_horas_entrega', 'horas_entrega');
			$crud->display_as('id_horas_entrega','ID')
					 ->display_as('horas_entrega','Horas entraga');			
			$crud->set_subject('Horas');
			
			$crud->required_fields('horas_entrega');

			$output = $crud->render();

			$this->_example_output($output);
	}


}