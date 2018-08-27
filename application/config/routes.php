<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// Students Routes
	$route['students'] = 'StudentController/index'; // all
	$route['students/store'] = 'StudentController/store';	
	$route['students/create'] = 'StudentController/create';
	$route['students/(:num)'] = 'StudentController/show/$1'; // all
	$route['students/edit/(:num)'] = 'StudentController/edit/$1';
	$route['students/update/(:num)'] = 'StudentController/update/$1';
	$route['students/delete/(:num)'] = 'StudentController/destroy/$1';



// Teachers Routes
	$route['teachers'] = 'TeacherController/index';
	$route['teachers/store'] = 'TeacherController/store';	
	$route['teachers/create'] = 'TeacherController/create';
	$route['teachers/(:num)'] = 'TeacherController/show/$1';
	$route['teachers/edit/(:num)'] = 'TeacherController/edit/$1';
	$route['teachers/update/(:num)'] = 'TeacherController/update/$1';
	$route['teachers/delete/(:num)'] = 'TeacherController/destroy/$1';



// Subjects Routes
	$route['subjects'] = 'SubjectController/index';
	$route['subjects/store'] = 'SubjectController/store';	
	$route['subjects/create'] = 'SubjectController/create';
	$route['subjects/(:num)'] = 'SubjectController/show/$1';
	$route['subjects/edit/(:num)'] = 'SubjectController/edit/$1';
	$route['subjects/update/(:num)'] = 'SubjectController/update/$1';
	$route['subjects/delete/(:num)'] = 'SubjectController/destroy/$1';



$route['home'] = 'HomeController/home';
$route['upload'] = 'HomeController/upload';
$route['details'] = 'HomeController/detail';

// Authentication Routes
$route['login'] = 'AuthController/login';
$route['trylogin'] = 'AuthController/trylogin';
$route['logout'] = 'AuthController/logout';


// Generate Attendance csv file. parameter as a number of the month to get only workdays of that month.
$route['generate/(:num)'] = 'GenerateController/generate/$1';


$route['default_controller'] = 'HomeController/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
