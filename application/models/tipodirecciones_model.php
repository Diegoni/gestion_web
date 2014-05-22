<?php class Tipodirecciones_model extends CI_Model {

	function getTipodirecciones(){
		$query = $this->db->query('SELECT * FROM tipodireccion ORDER BY tipodireccion');
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
