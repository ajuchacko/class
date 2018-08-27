<?php

class Home extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function attendance($db_name)
	{
	    return $this->db->insert('attendances', ['name' => $db_name]);
	}

	public function marklist($db_name)
	{
	    return $this->db->insert('marklists', ['name' => $db_name]);
	}

	public function details($file)
	{
	    return $this->db->insert('details', ['name' => $file]);
	}

	public function detail()
	{
		$query = $this->db->get('details');
		return $query->result_array();
	}


}