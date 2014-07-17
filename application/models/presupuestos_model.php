<?php class Presupuestos_model extends CI_Model {

/**************************************************************************
***************************************************************************
					Detalle del presupuesto
***************************************************************************
**************************************************************************/

	function truncatePresupuesto(){
		$this->db->truncate('presupuesto_detalle'); 
		$this->db->truncate('nota'); 
		if($this->db->affected_rows()>0){
			return 1;
		}else{
			return FALSE;
		}
	}
	
	function updateDetalle($articulo){
		$this->db->where('id_articulo', $articulo['id_articulo'])->update('presupuesto_detalle', $articulo);
    if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function addArticulo($articulo){
		$id_articulo=$articulo['id_articulo'];
		$id_presupuesto=$articulo['id_presupuesto'];
		if($id_articulo!=0){
			$query = $this->db->query("SELECT *	FROM presupuesto_detalle WHERE id_articulo='$id_articulo' AND id_presupuesto='$id_presupuesto'");
			if($query->num_rows()==0){			
				$this->db->insert('presupuesto_detalle', $articulo);
				if($this->db->affected_rows()>0){
					return $id_articulo;
				}else{
					return FALSE;
				}
			}else{
				return 0;
			}
		}else{
				return FALSE;
		}
	}
	
	function deleteArticulo($id_articulo=0, $id_presupuesto=0){
		if($id_articulo!=0 && $id_presupuesto!=0){
			$query = $this->db->query("SELECT *	FROM presupuesto_detalle WHERE id_articulo='$id_articulo' AND id_presupuesto='$id_presupuesto'");
			if($query->num_rows()>0){
				$data= array(            
					'id_articulo'=>$id_articulo,
				);
				$this->db->where('id_articulo', $id_articulo);
				$this->db->where('id_presupuesto', $id_presupuesto);
				$this->db->delete('presupuesto_detalle');

				if($this->db->affected_rows()>0){
					return $id_articulo;
				}else{
					return FALSE;
				}
			}else{
				return 0;
			}
		}else{
				return FALSE;
		}
	}
	
	function getArticulos($id_presupuestos){
		if(is_array($id_presupuestos)){
			//crear un nuevo presupuesto
		}else{
			$query = $this->db->query("SELECT 
		    articulo.id_articulo as id,
			articulo.articulo,
			articulo.descripcion,
			articulo.precio,
			articulo.stock,
			articulo.stock_min,
			articulo.stock_max,
			articulo.imagen,
			articulo.id_categoria,
			presupuesto_detalle.id_articulo, 
			presupuesto_detalle.id_presupuesto, 
			presupuesto_detalle.cantidad
			FROM presupuesto_detalle 
			INNER JOIN articulo 
			ON(presupuesto_detalle.id_articulo=articulo.id_articulo) 
			WHERE id_presupuesto='$id_presupuestos' 
			ORDER BY articulo.articulo");
			
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

/**************************************************************************
***************************************************************************
					Presupuesto
***************************************************************************
**************************************************************************/
	
	function addPresupuesto($presupuesto){
		if($presupuesto!=0){
			$this->db->insert('presupuesto', $presupuesto);
			$id=$this->db->insert_id();
			return $id;
		}else{
			return FALSE;
		}
	}
	
	function getPresupuesto($id){
		if(isset($id)){	
			 	$query = $this->db->query("SELECT * FROM presupuesto WHERE id_presupuesto='$id'");
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
	
	function getPresupuestos($id_usuario=0){
		if(is_array($id_usuario)){
			foreach ($id_usuario as $key => $value) {
				if(is_numeric($value)){
					$id=$value;
					$query= $this->db->query("SELECT * FROM presupuesto WHERE id_usuario='$id'");
				}
			}
			
		}else if($id_usuario!=0){
			$query= $this->db->query("SELECT * FROM presupuesto WHERE id_usuario='$id_usuario'");
		}
		
		if($query->num_rows()>0){
			foreach ($query->result() as $fila) {
				$data[]=$fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}



/**************************************************************************
***************************************************************************
					Otros mover
***************************************************************************
**************************************************************************/
	
	function getFuncion($id_funcion=NULL){
		$query = $this->db->query("SELECT * FROM funcion WHERE id_funcion='$id_funcion'");
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
			$data[] = $fila;
		}
			return $data;
		}else{
				return FALSE;
		}	
	}
	
	function addNota($nota){
		if($nota!=0){
		$this->db->insert('nota', $nota);
			$id=$this->db->insert_id();
			return $id;
		}else{
			return FALSE;
		}
	}
	
	
	function deleteNota($nota){
		if($nota!=0){
			$this->db->delete('nota', $nota);
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function getNotas(){
   	$query = $this->db->query("SELECT * FROM nota");
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
			$data[] = $fila;
		}
			return $data;
		}else{
			return FALSE;
		}	
	}
	
	function getCondicionespago(){
   	$query = $this->db->query("SELECT * FROM condicion_pago");
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
			$data[] = $fila;
		}
			return $data;
		}else{
			return FALSE;
		}	
	}
		
	function getHoras(){
   	$query = $this->db->query("SELECT * FROM horas_entrega ORDER BY horas_entrega");
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
