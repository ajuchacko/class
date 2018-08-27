<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('MY_diedump');
		$this->load->library('session');
	}

	public function login()
	{
		
		$this->load->helper('form');
		$this->load->view('auth/login');
	}

	public function trylogin()
	{
		$this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'session'));

		$this->validate();
		
			if($this->form_validation->run() === true) {
				$this->load->model('Auth');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
		    	if($this->Auth->validate($email, $password)) {
			    	$this->session->set_userdata('success', 'Authenticated');
				  	return redirect('home');
		    	}

		    }

		$this->load->view('auth/login');
	}

	public function logout()
	{
		session_destroy();
		$this->session->set_flashdata('success', 'You have successfully loggedout.');
		return redirect('home');
	}







	private function validate() {
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	    $this->form_validation->set_rules('password', 'Password', 'required');
    }

}