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

$route['admin/contents/evacuation-centers'] = 'contents/evacuation_centers';
$route['admin/contents/evacuation-centers/datatable'] = 'contents/evacuation_centers_dataTable';
$route['admin/contents/evacuation-centers/data/action'] = 'contents/evacuation_centers_do_action';
$route['admin/contents/evacuation-centers/data/get'] = 'contents/evacuation_centers_data_get';

$route['admin/contents/vehicles-and-drivers'] = 'contents/vehicles_and_drivers';
$route['admin/contents/vehicles-and-drivers/datatable'] = 'contents/vehicles_and_drivers_dataTable';
$route['admin/contents/vehicles-and-drivers/data/action'] = 'contents/vehicles_and_drivers_do_action';
$route['admin/contents/vehicles-and-drivers/data/get'] = 'contents/vehicles_and_drivers_data_get';

$route['admin/contents/affected-population'] = 'contents/affected_population';
$route['admin/contents/affected-population/datatable'] = 'contents/affected_population_dataTable';
$route['admin/contents/affected-population/data/action'] = 'contents/affected_population_do_action';
$route['admin/flood/affected-population/data/get'] = 'contents/affected_population_data_get';

$route['admin/contents/flood'] = 'contents/flood';
$route['admin/contents/flood/data/action'] = 'contents/flood_do_action';
$route['admin/flood/datatable'] = 'contents/flood_dataTable';
$route['admin/flood/data/get'] = 'contents/flood_data_get';

$route['admin/announcement'] = 'announcement'; 
$route['admin/announcement/datatable'] = 'announcement/datatable';
$route['admin/announcement/action'] = 'announcement/do_action'; 
$route['admin/announcement/all'] = 'announcement/all';
$route['admin/announcement/show/(:num)'] = 'announcement/show_post/$1';
$route['admin/announcement/edit/(:num)'] = 'announcement/edit_post/$1';

$route['admin/users'] = 'user';
$route['admin/users/datatable'] = 'user/datatable';
$route['admin/users/action']['POST'] = 'user/do_action';
$route['admin/users/get']['GET'] = 'user/get_user';

$route['admin'] = 'admin';

$route['default_controller'] = 'welcome';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;
