<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->model('Student');
		$this->load->helper('MY_diedump');
		$this->load->view('includes/navbar');
	}

	public function index()
	{
        $this->load->library(array('session'));
		$data['students'] = $this->Student->index();
		return $this->load->view('students/index', $data);
	}

	public function create()
	{
		$this->admin();
		$this->load->helper('form');
		$this->load->view('students/create');
	}

	public function show($id = NULL)
	{
		if(!is_null($id)) {
			$attendances = $this->Student->attendances();
			$months = $this->during($attendances);
			$days = $this->days($id, $attendances);
// Compose charting data
			$fill = [];
			foreach ($months as $key => $value) {
				$fill[] = $value;
				$fill[] = $days[$key];
				$new[] = $fill;
				unset($fill);
			}
	// Chart data 		
			$data['arrChartData'] = $new;
									unset($new);
			$marklists = $this->Student->marklists();
			$years = $this->during($marklists);
			$marks = $this->Student->marks($id, $marklists);
			$total_marks = array_map(function($item) {
				return (int)$item['class_test1'] + (int)$item['class_test2'] + (int)$item['assignment'];
			}, $marks);
// Compose printing total marks and year data
			$fill = [];
			foreach ($years as $key => $value) {
				$fill[] = $value;
				$fill[] = $total_marks[$key];
				$new[] = $fill;
				unset($fill);
			}

	// Total marks 
			$data['total_marks'] = $new;
			$data['marks'] = $marks;
			$data['student'] = $this->student($id);

			return $this->load->view('students/show', $data);
        }

	  	return redirect('students');
	}

	public function store()
	{	
		$this->admin();
		$this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'session'));

		$this->validate();
		
			if($this->form_validation->run() === true) {
		    	$this->Student->store();
		    	$this->session->set_userdata('success', 'Student successfully registered!');

			  	return redirect('students');
		    }

		$this->load->view('students/create');
	}

	public function edit($id = NULL)
	{	
		$this->admin();
		if(!is_null($id)) {
		    $this->load->library(array('form_validation', 'session'));

			$data['student'] = $this->student($id);

			return $this->load->view('students/edit', $data);
        }

	  	return redirect('students');
	}

	public function update($id = NULL)
	{	
		$this->admin();
		if(!is_null($id)) {
		    $this->load->library(array('form_validation'));

			$this->validate();

			if($this->form_validation->run() === true) {

		    	$this->Student->update($id);

			  	return redirect('students');
		    }

		}

		$data['student'] = $this->student($id);
	  	return $this->load->view("students/edit", $data);
	}

	public function destroy($id = NULL)
    {	
    	$this->admin();
        if(!is_null($id)) {

			$this->Student->destroy($id);
        }

	  	return redirect('students');
    }






/* private methods */

    private function validate() {
    	$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[12]',
    	['required'      => 'You have not provided us the %s.']);
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	    $this->form_validation->set_rules('address', 'Address', 'required');
	    $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[5]|numeric', 
	    ['numeric'      => 'Please provide a valid %s.']);
    }

    private function student($id)
    {
		return $this->Student->find($id);
    }

//     private function months($attendances)
//     {    	
// 			$d = array_map(function($item) {
// 				return $item['name'];
// 			}, $attendances);

// 			$e = array_map(function($item){
// 				return explode('_', $item);
// 			}, $d);
// // Student presence in months
// 			$months = array_map(function($item){
// 				return $item[1];
// 			}, $e);
// 		return $months;
//     }

    private function days($id, $attendances)
    {
    	
			$absent = $this->Student->absents($id, $attendances);
			$absent = call_user_func_array('array_merge', $absent); // Flatten array

			foreach ($absent as $key => $value) {
			    $ab[] = array_filter($value, function($val){
							return $val == 'NULL';						
					});
			}
// Student absense in days of presenced months
			$days = array_map(function($item) {
					return count($item);
			}, $ab);

			return $days;
    }

    private function during($array)
    {
    	return array_map(function($item) {
				return explode('_', $item['name'])[1];
			}, $array);
    }

    private function admin() 
    {
		if(!$this->session->has_userdata('admin')) {
			return redirect('login');
		}
    }

}
