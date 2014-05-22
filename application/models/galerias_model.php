<?php class Galerias_model extends CI_Model {

	function getFotos(){
		$query = $this->db->query('SELECT * FROM galeria ORDER BY prioridad');
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
