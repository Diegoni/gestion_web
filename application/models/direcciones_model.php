<?php class Direcciones_model extends CI_Model {

	function addDireccion($direccion){
		$this->db->insert('direccion', $direccion);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return FALSE;
		}			
	}
	
	
} 
?>
