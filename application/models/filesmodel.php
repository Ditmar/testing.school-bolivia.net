<?php 
	class filesmodel extends CI_Model
	{
		function __construct()
		{
			
			parent::__construct();
		}
		function checkhash($hash)
		{
			$r=$this->db->get_where("files",array("hashtag"=>$hash));
			return ($r->num_rows()>0);
		}
		function getInfo($hash)
		{
			$this->db->select("colegio.*");
			$this->db->where(array("hashtag"=>$hash));
			$this->db->join("colegio","colegio.colegio_id=files.idCol");
			$r=$this->db->get("files");
			return $r->result_array();
		}
		function insert($information)
		{
			$this->db->insert("files",$information);
			return $this->db->insert_id();
		}
	}