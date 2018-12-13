<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin/login'] = 'admin/login';

// Frontend 
$route['post/show/(:num)'] = 'frontend/show_post/$1';
$route['contact-us'] = 'frontend/contactus';
$route['contact-us/send'] = 'frontend/contactus_send'; 
$route['hazard-map'] = 'frontend/hazard_map';
$route['evacuation'] = 'frontend/evacuation';
$route['without-disaster'] = 'frontend/without_disaster';
$route['early-warning-risk'] = 'frontend/early_warning_risk';
$route['history'] = 'frontend/history';
$route['drmm'] = 'frontend/drmm';
$route['organizational-chart'] = 'frontend/organizational_chart';

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

$route['admin/messages'] = 'contents/contact_message';
$route['admin/messages/datatable'] = 'contents/contact_message_dataTable';
$route['admin/message/show/(:num)'] = 'contents/show_message/$1';

$route['admin/users'] = 'user';
$route['admin/users/datatable'] = 'user/datatable';
$route['admin/users/action']['POST'] = 'user/do_action';
$route['admin/users/get']['GET'] = 'user/get_user';

$route['admin'] = 'admin';
$route['logout'] = 'admin/logout';

$route['default_controller'] = 'frontend';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE; 
