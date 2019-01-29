<?php


$route->get('/', 'Frontend\ApplicationController@index');
$route->get('about', 'Frontend\ApplicationController@about');

//==================login route====================

$route->get('@admin/login', 'Backend\LoginController@index');
$route->post('@admin/login', 'Backend\LoginController@login');
$route->get('@admin/logout', 'Backend\LoginController@logout', ['AuthMiddleware']);
//===============Route for Backend ==============
//===============================================

$route->get('admin', "Backend\DashboardController@index", ['AuthMiddleware']);

//==============manage privilege=====================================
$route->get('admin/manage-privilege', 'Backend\PrivilegeController@index', ['AuthMiddleware']);
$route->post('admin/manage-privilege', 'Backend\PrivilegeController@createPrivilege', ['AuthMiddleware']);
$route->get('admin/delete-privilege', 'Backend\PrivilegeController@deletePrivilege', ['AuthMiddleware']);
$route->get('admin/edit-privilege', 'Backend\PrivilegeController@editPrivilege', ['AuthMiddleware']);
$route->post('admin/edit-privilege', 'Backend\PrivilegeController@editPrivilegeAction', ['AuthMiddleware']);
$route->get('admin/update-privilege-status', 'Backend\PrivilegeController@updatePrivilegeStatus', ['AuthMiddleware']);
$route->post('admin/update-privilege-status', 'Backend\PrivilegeController@updatePrivilegeStatus', ['AuthMiddleware']);
$route->get('admin/delete-all-privilege', 'Backend\PrivilegeController@deleteAllPrivilege', ['AuthMiddleware']);
$route->post('admin/delete-all-privilege', 'Backend\PrivilegeController@deleteAllPrivilege', ['AuthMiddleware']);


//==============route end manage privilege=====================================

//==================route for users ===================

$route->get('admin/users', 'Backend\UserController@index', ['AuthMiddleware']);
$route->get('admin/add-user', 'Backend\UserController@addUser', ['AuthMiddleware']);
$route->post('admin/add-user', 'Backend\UserController@addUserAction', ['AuthMiddleware']);
$route->get('admin/update-user-status', 'Backend\UserController@updateUserStatus', ['AuthMiddleware']);
$route->post('admin/update-user-status', 'Backend\UserController@updateUsersStatus', ['AuthMiddleware']);
$route->get('admin/delete-user', 'Backend\UserController@deleteUser', ['AuthMiddleware']);
$route->get('admin/edit-user', 'Backend\UserController@editUser', ['AuthMiddleware']);
$route->post('admin/edit-user', 'Backend\UserController@editUserAction', ['AuthMiddleware']);
$route->get('admin/update-user-password', 'Backend\UserController@updatePassword', ['AuthMiddleware']);
$route->post('admin/update-user-password', 'Backend\UserController@updatePassword', ['AuthMiddleware']);


//================sliders section=======================


$route->get('admin/sliders', 'Backend\SliderController@index', ['AuthMiddleware']);
$route->get('admin/add-slider', 'Backend\SliderController@addSlider', ['AuthMiddleware']);
$route->post('admin/add-slider', 'Backend\SliderController@addSliderAction', ['AuthMiddleware']);

