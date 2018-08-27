<?php

class Subject extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function index()
	{
		$query = $this->db->get('subjects');
		return $query->result_array();
	}

	public function store()
	{
		$data = $this->data();
	    return $this->db->insert('subjects', $data);
	}

	public function update($id)
	{
		$data = $this->data();

		$this->db->where('id', $id);
		if($this->db->update('subjects', $data)) {
			$this->load->library(array('session'));
			$this->session->set_userdata('success', 'Subject successfully updated!');
			return redirect('subjects');
		}
		show_404();
	}

	public function find($id)
	{
		$query = $this->db->get_where('subjects', ['id' => $id]);
		return $query->row_array();
	}

	public function destroy($id)
	{

		if ($this->db->delete('subjects', array('id' => $id))) {
		        $this->load->library(array('session'));
				$this->session->set_userdata('success', 'Subject successfully removed!');
			  	return redirect('subjects');
		}
		show_404();
	}




	/* Private methods */

	private function data()
	{
		return array(
	        'name' => ucwords($this->input->post('name')),
	    );
	}

}