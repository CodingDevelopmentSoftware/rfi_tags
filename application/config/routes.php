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
$route['default_controller'] = 'LoginController';
$route['404_override'] = 'ErrorPage';
$route['translate_uri_dashes'] = FALSE;


// Login Controller
$route['login']['get'] = 'LoginController/index';
$route['check']['post'] = 'LoginController/check';

//DashboardController
$route['dashboard']['get'] = 'DashboardController/index';

//ProfileController
$route['my_profile']['get'] = 'ProfileController/index';
$route['update_profile']['get'] = 'ProfileController/updateProfile';
$route['saveprofile']['post'] = 'ProfileController/saveProfile';
$route['change_password']['get'] = 'ProfileController/changePassword';
$route['save_password']['post'] = 'ProfileController/savePassword';
$route['logout']['get'] = 'ProfileController/logout';


//UserManagementController
$route['add_user']['get'] = 'UserManagmentController/index';
$route['save_user']['post'] = 'UserManagmentController/saveUser';
$route['view_users']['get'] = 'UserManagmentController/viewUsers';
$route['view_user_profile/(:any)']['get'] = 'UserManagmentController/viewUserProfile/$1';
$route['reset_password/(:any)']['get'] = 'UserManagmentController/resetPassword/$1';
$route['change_status/(:any)/(:any)']['get'] = 'UserManagmentController/changeStatus/$1/$2';
$route['edit_user_profile/(:any)']['get'] = 'UserManagmentController/editUserProfile/$1';
$route['save_update_user']['post'] = 'UserManagmentController/saveUpdateUser';
$route['login_activities/(:any)']['get'] = 'UserManagmentController/loginActivities/$1';

// Company Management
$route['add_company']['get'] = 'CompanyManagementController/index';
$route['save_company']['post'] = 'CompanyManagementController/saveCompany';
$route['view_companies']['get'] = 'CompanyManagementController/viewCompanies';
$route['change_status_company/(:any)/(:any)']['get'] = 'CompanyManagementController/changeStatus/$1/$2';
$route['view_company_profile/(:any)']['get'] = 'CompanyManagementController/viewCompanyProfile/$1';
$route['edit_company_profile/(:any)']['get'] = 'CompanyManagementController/editCompanyProfile/$1';
$route['save_update_company']['post'] = 'CompanyManagementController/saveUpdateCompany';


// Project Management
$route['add_project']['get'] = 'ProjectManagmentController/index';
$route['save_project']['post'] = 'ProjectManagmentController/saveProject';
$route['view_projects']['get'] = 'ProjectManagmentController/viewProjects';
$route['change_status_project/(:any)/(:any)']['get'] = 'ProjectManagmentController/changeStatus/$1/$2';
$route['view_project_profile/(:any)']['get'] = 'ProjectManagmentController/viewProjectProfile/$1';
$route['edit_project_profile/(:any)']['get'] = 'ProjectManagmentController/editProjectProfile/$1';
$route['save_update_project']['post'] = 'ProjectManagmentController/saveUpdateProject';
