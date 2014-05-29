<?php class Usuarios_model extends CI_Model {

	function addUsuario($usuario, $telefono, $direccion, $email){
    $this->db->insert('usuarios', $usuario);
		$id=$this->db->insert_id();
		$telefono['id_usuario'] = $id;
		$direccion['id_usuario'] = $id;
		$email['id_usuario'] = $id;
		$this->db->insert('telefono', $telefono);
		$this->db->insert('direccion', $direccion);
		$this->db->insert('email', $email);
		
		return $id;
	}
	
	function getUsuario($id){
		if(isset($id)){	
			 	$query = $this->db->query("SELECT * FROM usuarios WHERE id_usuario='$id'");
		}
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	
	public function verifica_username($usuario) {
		$this->db->where('usuario',$usuario);
		$consulta = $this->db->get('usuarios');
		if($consulta->num_rows() == 1){
			$row = $consulta->row();
			return $row->usuario;
		}
	}
 
	public function verifica_email($email) {
		$this->db->where('email',$email);
		$consulta = $this->db->get('email');
		if($consulta->num_rows() == 1){
			$row = $consulta->row();
			return $row->email;
		}
	}
	
	function getDirecciones(){
		$query = $this->db->query("SELECT * FROM direccion");
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	
	function login($username, $password)
	{
		$this -> db -> select('id_usuario, usuario, password');
		$this -> db -> from('usuarios');
		$this -> db -> where('usuario = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . $password . "'"); 
		//$this -> db -> where('password = ' . "'" . MD5($password) . "'"); 
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}

	}
	
	function logout(){
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('inicio', 'refresh');
  	}
	
	
	function carga_usuario(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$db['id_usuario']=$session_data['id'];
			$db['usuario']=$session_data['username'];
			return $db;
		}
	}
	
	
}
?>

