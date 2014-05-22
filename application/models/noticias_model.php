<?php class Noticias_model extends CI_Model {

	function getNoticiasSecundarias(){
		$query = $this->db->query('SELECT * FROM noticia WHERE id_tiponoticia=2 AND id_estado=1 ORDER BY fecha DESC LIMIT 0,3');
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	
		function getNoticiasPrincipales(){
		$query = $this->db->query('SELECT * FROM noticia WHERE id_tiponoticia=1 AND id_estado=1 ORDER BY fecha DESC LIMIT 0,3');
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
