<?php class Departamentos_model extends CI_Model {
	
	function getDepartamentos($id=NULL){
		if(isset($id)){	
			 	$query = $this->db->query("SELECT * FROM departamentos WHERE id_provincia='$id'");
		}else{	
			$query = $this->db->query("SELECT * FROM departamentos ORDER BY departamento");
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
