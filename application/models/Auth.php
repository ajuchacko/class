<?php

class Auth extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function validate($email, $password)
	{
		$query = $this->db->get_where('users', ['email' => $email]);
		$user = ($query->row_array());
		if( password_verify($password, $user['password']) ) {
	    	$this->session->set_userdata('admin', 'true');
			return true;
		}
	}
}