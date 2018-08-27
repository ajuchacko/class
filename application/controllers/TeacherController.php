<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
		$this->load->helper(['url', 'MY_diedump_helper']);
        $this->admin();
        $this->load->model('Teacher');
        $this->load->view('includes/navbar');
	}

	public function index()
	{
        $this->load->library(array('session'));
        $this->load->model('Subject');
		$data['teachers'] = $this->Teacher->index();
		$data['subjects'] = array_values($this->Subject->index());

		return $this->load->view('teachers/index', $data);
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->model('Subject');
		$data['subjects'] = $this->Subject->index();
		$this->load->view('teachers/create', $data);
	}

	public function show($id = NULL)
	{
		if(!is_null($id)) {
			$data['teacher'] = $this->teacher($id);

			return $this->load->view('teacher/show', $data);
        }

	  	return redirect('teachers');
	}

	public function store()
	{
		$this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'session'));

		$this->validate();
		
			if($this->form_validation->run() === true) {
		    	$this->Teacher->store();
		    	$this->session->set_userdata('success', 'Teacher successfully registered!');

			  	return redirect('teachers');
		    }

		$this->load->view('teachers/create');
	}

	public function edit($id = NULL)
	{
		if(!is_null($id)) {
		    $this->load->library(array('form_validation', 'session'));

			$data['teacher'] = $this->teacher($id);
	        $this->load->model('Subject');

			$data['subjects'] = $this->Subject->index();

			return $this->load->view('teachers/edit', $data);
        }

	  	return redirect('teachers');
	}

	public function update($id = NULL)
	{
		if(!is_null($id)) {
		    $this->load->library(array('form_validation'));

			$this->validate();

			if($this->form_validation->run() === true) {

		    	$this->Teacher->update($id);

			  	return redirect('teachers');
		    }

		}

		$data['teacher'] = $this->teacher($id);
	  	return $this->load->view("teachers/edit", $data);
	}

	public function destroy($id = NULL)
    {
        if(!is_null($id)) {

			$this->Teacher->destroy($id);
        }

	  	return redirect('teachers');
    }






/* private methods */

    private function validate() {
    	$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[12]',
    	['required'      => 'You have not provided us the %s.']);
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	    $this->form_validation->set_rules('address', 'Address', 'required');
	    $this->form_validation->set_rules('degree', 'Degree', 'required');
	    $this->form_validation->set_rules('salary', 'Salary', 'required');
	    $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[5]|numeric', 
	    ['numeric'      => 'Please provide a valid %s.']);
    }

    private function teacher($id)
    {
		return $this->Teacher->find($id);
    }

    private function admin() 
    {
		if(!$this->session->has_userdata('admin')) {
			return redirect('login');
		}
    }

}
