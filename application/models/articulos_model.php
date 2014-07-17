<?php 
class Articulos_model extends CI_Model {
	
	function getArticulos($id_categoria=NULL){
		if(isset($id_categoria)){	
			 	$query = $this->db->query("SELECT * FROM articulo WHERE id_categoria='$id_categoria'");
		}else{	
			$query = $this->db->query("SELECT * FROM articulo WHERE id_estado=1 ORDER BY id_articulo LIMIT 0,5");
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
