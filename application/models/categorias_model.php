<?php class Categorias_model extends CI_Model {

	function getCategorias(){
		$query = $this->db->query('SELECT * FROM categoria WHERE id_estado=1');
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}

} 
?>
