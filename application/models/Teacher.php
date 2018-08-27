<?php

class Teacher extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function index()
	{
		$query = $this->db->get('teachers');
		return $query->result_array();
	}

	public function store()
	{
		$data = $this->data();
	    return $this->db->insert('teachers', $data);
	}

	public function update($id)
	{
		$data = $this->data();

		$this->db->where('id', $id);
		if($this->db->update('teachers', $data)) {
			$this->load->library(array('session'));
			$this->session->set_userdata('success', 'Teacher successfully updated!');
			return redirect('teachers');
		}
		show_404();
	}

	public function find($id)
	{
		$query = $this->db->get_where('teachers', ['id' => $id]);
		return $query->row_array();
	}

	public function destroy($id)
	{

		if ($this->db->delete('teachers', array('id' => $id))) {
		        $this->load->library(array('session'));
				$this->session->set_userdata('success', 'Teacher successfully removed!');
			  	return redirect('teachers');
		}
		show_404();
	}




	/* Private methods */

	private function data()
	{
		return array(
	        'name' => ucwords($this->input->post('name')),
	        'email' => $this->input->post('email'),
	        'address' => $this->input->post('address'),
	        'degree' => $this->input->post('degree'),
	        'salary' => $this->input->post('salary'),
	        'mobile' => $this->input->post('mobile'),
	        'subject_id' => $this->input->post('subject'),
	    );
	}

}