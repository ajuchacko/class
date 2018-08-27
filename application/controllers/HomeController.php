<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	    $this->load->library(array('session'));
		$this->load->helper(['url', 'MY_diedump_helper']);
		$this->load->view('includes/navbar');
	}

	public function home()
	{
		$this->load->helper(['form']);
		return $this->load->view('home');
	}


	public function detail()
	{
		$this->load->model('Home');
		$data['details'] = $this->Home->detail();
		$this->load->view('details', $data);
	}

	public function upload()
	{
		$this->admin();
		$file = false;

		if($_POST && $_FILES) {
			
			if($_POST['item'] === 'details') {
				$this->session->set_userdata('success', 'Details successfully added!');

				return $this->details();				
			}

			$file = $this->do_upload();
		}

		if($file) {
			$this->load->dbforge();
			$this->load->model('Home');

			$db_name = substr($file, 0, -4);

			$database = $this->file_to_database($file, $db_name);

				if($_POST['item'] === 'attendance' && $database) {
					$this->Home->attendance($db_name);
					$this->session->set_userdata('success', 'Attendance successfully added!');
					redirect( '/home' ); 
				} elseif($_POST['item'] === 'marklist' && $database) {
					$this->Home->marklist($db_name);				
					$this->session->set_userdata('success', 'Marklist successfully added!');
					redirect( '/home' );
 
				} 
				


							// $rows = file("./uploads/{$file}");
							// $first_row = array_shift($rows);
							// $data = str_getcsv($first_row);
							// $heading = explode(',', $first_row);


							// foreach ($rows as $key => $value) {
							// 	$some[] = array_combine( $data, explode(',', $value) ) ; // heading used instead of DATA
							// }

							// $fields= [];

						 //    for ($i = 0, $j = count($data); $i < $j; $i++) {


						 //        $fields[$data[$i]] = [
							// 			                'type' => 'VARCHAR',
							// 			                'constraint' => 20,
							// 				         ];
						 //    }


							// 		$this->dbforge->add_field($fields);
							// 		$this->dbforge->create_table($db_name);
							// 		$this->db->insert_batch($db_name, $some);
							// 		unlink("./uploads/{$file}");
			
		}
	}

	private function file_to_database($file, $db_name)
	{
		$rows = file("./uploads/{$file}");
		$first_row = array_shift($rows);
		$data = str_getcsv($first_row);
		$fields= [];
		// $heading = explode(',', $first_row);


		foreach ($rows as $key => $value) {
			$some[] = array_combine( $data, explode(',', $value) ) ; // heading used instead of DATA
		}


	    for ($i = 0, $j = count($data); $i < $j; $i++) {

	        $fields[$data[$i]] = [
					                'type' => 'VARCHAR',
					                'constraint' => 20,
						         ];
	    }


				$this->dbforge->add_field($fields);
				$this->dbforge->create_table($db_name);
				if($this->db->insert_batch($db_name, $some)) {
					unlink("./uploads/{$file}");
					return true;
				} else {
					return false;
				}
	}






	/* Private methods */

	private function details()
	{
		$file = false;

		if($_POST && $_FILES) {		
			$file = $this->do_upload();
		}
		if($file) {
			$this->load->model('Home');

			$this->Home->details($file);
			redirect( '/home' );
		}

	}

	private function do_upload()
	{
		$config['upload_path']	= './uploads/';
		$config['allowed_types'] = 'csv|docx|pdf|xls';
		$this->load->library('upload', $config);
		$this->upload->do_upload('csv_file');
		$data = $this->upload->data();
		return $data['file_name'];
	}

	private function admin() 
    {
		if(!$this->session->has_userdata('admin')) {
			return redirect('login');
		}
    }
}