<?php class Inicio_model extends CI_Model {

    function getNoticia($noticiaId)
    {
        $resultado = $this->db->select('*')
        ->from('noticias')
        ->where('noticia_id', $noticiaId)
        ->get();
        if ($resultado->num_rows() > 0)
        {
            $arreglo=$resultado->result_array();
            return $arreglo[0];
        }
        else
            return FALSE;
    }

    function getNoticias($archivada=0, $num=FALSE, $offset=FALSE)
    {
        $resultado = $this->db->select('*')
        ->from('noticias')
        ->where('fecha_baja', "1111-11-11")
        //->where('archivada', $archivada)
        ->order_by('noticias.fecha', 'DESC')
        ->limit($num,$offset)
        ->get();
        if ($resultado->num_rows() > 0)
            return $resultado->result_array();
        else
            return FALSE;
    }

    function insertNoticia($fecha, $titulo, $categoriaId, $copete, $texto, $imagenDescripcion, $areaId, $ultimaNoticia)
    {
        $data= array(
            "fecha"=>date("Y-m-d",strtotime($fecha)),
            'titulo'=>$titulo,
            'categoria_id'=>$categoriaId,
            'copete'=>$copete,
            'texto'=>$texto,
            'imagen_descripcion'=>$imagenDescripcion,
            'noticias_area_id'=>$areaId,
            'ultima_noticia'=>$ultimaNoticia
        );
        $this->db->set($data);
        $this->db->insert('noticias');

        if($this->db->affected_rows()>0)
        {
            $noticia_id = $this->db->insert_id();
            $this->load->library('registro');
            $this->registro->insertRegistro("Creación", "Noticias", $noticia_id, "Creada Correctamente");
            return $noticia_id;
        }
        else
            return FALSE;
    }

    function updateNoticia($noticiaId, $fecha, $titulo, $categoriaId, $copete, $texto, $imagenDescripcion, $areaId, $ultimaNoticia)
    {
        $data= array(
            "fecha"=>date("Y-m-d",strtotime($fecha)),
            'titulo'=>$titulo,
            'categoria_id'=>$categoriaId,
            'copete'=>$copete,
            'texto'=>$texto,
            'imagen_descripcion'=>$imagenDescripcion,
            'noticias_area_id'=>$areaId,
            'ultima_noticia'=>$ultimaNoticia,
            'update'=>$this->registro->upRand()
            );

        $this->db->where('noticia_id', $noticiaId)->update('noticias', $data);

        if($this->db->affected_rows()>0)
        {
            $this->load->library('registro');
            $this->registro->insertRegistro("Actualización", "Noticias", $noticiaId, "Modificado correctamente");
            return TRUE;
        }
        else
            return FALSE;
    }

    function deleteNoticia($noticiaId)
    {
        $data = array
        (
            'fecha_baja'=>date('Y-m-d')
        );

        $this->db->where('noticia_id', $noticiaId)->update('noticias', $data);

        if($this->db->affected_rows()>0)
        {
            $this->load->library('registro');
            $this->registro->insertRegistro("Borrado", "Noticias", $noticiaId, "Borrada Correctamente");
            $this->papelera->insertPapelera("Noticias", $noticiaId);
            return TRUE;
        }
        else
            return FALSE;
    }

    function undeleteNoticia($noticiaId)
    {
        $data= array(
            'fecha_baja'=>'1111-11-11'
            );

        $this->db->where('noticia_id', $noticiaId)->update('noticias', $data);

        if($this->db->affected_rows()>0)
        {
            $this->load->library('registro');
            $this->registro->insertRegistro("Restauración", "Noticias", $noticiaId, "Restaurada Correctamente");
            $this->papelera->removePapelera("Noticias", $noticiaId);
            return TRUE;
        }
        else
            return FALSE;
    }

    function removeNoticia($noticiaId)
    {
        $this->db->where('noticia_id', $noticiaId);
        $this->db->delete('noticias');
        if($this->db->affected_rows()>0)
        {
            $this->load->library('registro');
            $this->registro->insertRegistro("Eliminar", "Noticias", $noticiaId, "Eliminada de la base de datos correctamente");
            $this->papelera->removePapelera("Noticias", $noticiaId);
            return TRUE;
        }
        else
            return FALSE;
    }
    
    function archiveNoticia($noticiaId, $valor,$num=NULL,$offset=NULL)
    {
        $data= array('archivada'=>$valor);

        $this->db->where('noticia_id', $noticiaId)->update('noticias', $data);

        if($this->db->affected_rows()>0)
        {
            $this->load->library('registro');
            if($valor==1)
                $this->registro->insertRegistro("Archivación", "Noticias", $noticiaId, "Archivada Correctamente");
            else
                $this->registro->insertRegistro("Desarchivación", "Noticias", $noticiaId, "Restaurada Correctamente");

            return TRUE;
        }
        else
            return FALSE;
    }
} ?>
