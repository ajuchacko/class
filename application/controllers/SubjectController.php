<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->model('Subject');
        $this->admin();
        $this->load->view('includes/navbar');
	}

	public function index()
	{
        $this->load->library(array('session'));
		$data['subjects'] = $this->Subject->index();
		return $this->load->view('subjects/index', $data);
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->view('subjects/create');
	}

	public function show($id = NULL)
	{
		if(!is_null($id)) {
			$data['subject'] = $this->subject($id);

			return $this->load->view('subjects/show', $data);
        }

	  	return redirect('subjects');
	}

	public function store()
	{
		$this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'session'));

		$this->validate();
		
			if($this->form_validation->run() === true) {
		    	$this->Subject->store();
		    	$this->session->set_userdata('success', 'Subject successfully registered!');

			  	return redirect('subjects');
		    }

		$this->load->view('subjects/create');
	}

	public function edit($id = NULL)
	{
		if(!is_null($id)) {
		    $this->load->library(array('form_validation', 'session'));

			$data['subject'] = $this->subject($id);

			return $this->load->view('subjects/edit', $data);
        }

	  	return redirect('subjects');
	}

	public function update($id = NULL)
	{
		if(!is_null($id)) {
		    $this->load->library(array('form_validation'));

			$this->validate();

			if($this->form_validation->run() === true) {

		    	$this->Subject->update($id);

			  	return redirect('subjects');
		    }

		}

		$data['subject'] = $this->subject($id);
	  	return $this->load->view("subjects/edit", $data);
	}

	public function destroy($id = NULL)
    {
        if(!is_null($id)) {

			$this->Subject->destroy($id);
        }

	  	return redirect('subjects');
    }






/* private methods */

    private function validate() {
    	$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[20]',
    	['required'      => 'You have not provided us the %s.']);
    }

    private function subject($id)
    {
		return $this->Subject->find($id);
    }

    private function admin() 
    {
		if(!$this->session->has_userdata('admin')) {
			return redirect('login');
		}
    }

}
