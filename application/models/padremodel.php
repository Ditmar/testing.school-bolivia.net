<?php
    class padremodel extends CI_Model{
        var $nombre;
        var $apellido;
        function padremodel()
        {
            parent::__construct();
        }
        function escogerhijo($id)
        {
            $information=$this->db->query("SELECT al.*,cur.nombre_curso FROM rel_padres_alumno AS rel, alumno AS al, curso AS cur WHERE rel.idAl=al.alumno_id AND rel.idPa='".$id."' AND cur.curso_id=al.curso_id");
            return $information->result_array();
        }
        function obtener($id)
        {
		  $query = $this->db->get_where('padres', array('id' => $id));
          return current($query->result("padremodel"));
        }
        function nombre_completo()
        {
            $name=$this->nombre . " " . $this->apellido;
            return $name;
        }
        function getpadres($idCol)
        {
            $query=$this->db->get_where("padres",array('colegio_id'=>$idCol));
            return $query->result_array();
        }
        function registrar($padres)
        {
            
        }
    }
?>