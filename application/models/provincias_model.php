<?php class Provincias_model extends CI_Model {
	
	function getProvincias($id_provincia=NULL){
		if(isset($id_provincia)){	
			 	$query = $this->db->query("SELECT * FROM provincias WHERE id_provincia='$id_provincia'");
		}else{	
			$query = $this->db->query("SELECT * FROM provincias ORDER BY provincia");
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
	

	
} 
?>
