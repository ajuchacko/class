<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenerateController extends CI_Controller {


	public function generate($num)
	{
	$workdays = array();
	$type = CAL_GREGORIAN;
	$month = date($num); // Month ID, 1 through to 12.
	$monthName = date('F', mktime(0, 0, 0, $month, 10)); 
	$year = date('Y'); // Year in 4 digit 2009 format.
	$day_count = cal_days_in_month($type, $month, $year); // Get the amount of days

	//loop through all days
	for ($i = 1; $i <= $day_count; $i++) {

	        $date = $year.'/'.$month.'/'.$i; //format date
	        $get_name = date('l', strtotime($date)); //get week day
	        $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars

	        //if not a weekend add day to array
	        if($day_name != 'Sun' && $day_name != 'Sat'){
	            $workdays[] = $i.'/'.$month.'/'.$year;

	            $timestamps[] = date('d-m-Y', strtotime("$i $monthName 2018"));
	        }

	}
	$size = count($workdays); 

		$i = 0;
		while ($i <= 6) {
			$days[] = $timestamps;
			$i++;
		}

	// Add student name and id rows
		$students = ['ann', 'arun', 'aswin', 'jayaprakash', 'joy', 'mariya', 'vishal'];
		$student_id = range(100, 106);

		foreach ($students as $key => $value) {
			array_unshift($days[$key], $value );
		}

		foreach ($student_id as $key => $value) {
			array_unshift($days[$key], $value );
		}

	// Random Absent days to Null
		// foreach ($days as $key => &$value) {
		// 	$rand = rand(1, 22);

		// 	if($rand && ($rand !== 0 )&& $rand !== 1) {
		// 		$value[$rand] = 'NULL';
		// 		if($rand % 2) {
		// 			$value[rand(1, 22)] = 'NULL';
		// 		}
		// 	}
		// }


	// Write csv file
	$filename = "~/Desktop/attendance_{$monthName}_{$year}_{$size}.csv";

	$fh = fopen('php://output', 'w') or die("Can't open php:://output");

	header('Content-Type: application/csv');
	header("Content-Disposition: attachment; filename=\"attendance_{$monthName}_{$year}_{$size}.csv\"");

			array_unshift($workdays, 'student_name');
			array_unshift($workdays, 'student_id');

	fputcsv($fh, $workdays); // fields

	foreach ($days as $key => $value) {
	  fputcsv($fh, $value);
	}

	fclose($fh) or die('Can\'t close php://output'); die();

	}
}