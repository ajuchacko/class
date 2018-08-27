<?php

class Student extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function index()
	{
		$query = $this->db->get('students');
		return $query->result_array();
	}

	public function store()
	{
		$data = $this->data();
	    return $this->db->insert('students', $data);
	}

	public function update($id)
	{
		$data = $this->data();

		$this->db->where('id', $id);
		if($this->db->update('students', $data)) {
			$this->load->library(array('session'));
			$this->session->set_userdata('success', 'Student successfully updated!');
			return redirect('students');
		}
		show_404();
	}

	public function find($id)
	{
		$query = $this->db->get_where('students', ['id' => $id]);
		return $query->row_array();
	}

	public function destroy($id)
	{

		if ($this->db->delete('students', array('id' => $id))) {
		        $this->load->library(array('session'));
				$this->session->set_userdata('success', 'Student successfully removed!');
			  	return redirect('students');
		}
		show_404();
	}

	public function attendances()
	{
		$query = $this->db->get('attendances');
		return $query->result_array();
	}

	public function absents($id, $attendances)
	{
		foreach ($attendances as $key => $db) {
			$query = $this->db->get_where($db['name'], ['student_id' => $id]);
			$result[] = $query->result_array();
		}
		return $result;
	}

	public function marklists()
	{
		$query = $this->db->get('marklists');
		return $query->result_array();
	}

	public function marks($id, $marklists)
	{
		foreach ($marklists as $key => $db) {
			$query = $this->db->get_where($db['name'], ['student_id' => $id]);
			$result[] = $query->result_array();
		}
		return call_user_func_array('array_merge', $result);
	}




	/* Private methods */

	private function data()
	{
		return array(
	        'name' => ucwords($this->input->post('name')),
	        'email' => $this->input->post('email'),
	        'address' => $this->input->post('address'),
	        'note' => $this->input->post('note'),
	        'mobile' => $this->input->post('mobile'),
	    );
	}

}