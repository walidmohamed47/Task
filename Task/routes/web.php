<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home'	,'HomeController@index');
/////////////////////////////////////////////////////////

//Start User
Route::get('login'  				,'UserController@login');
Route::post('login' 				,'UserController@login');
Route::get('logout'  				,'UserController@logout');
Route::get('myProfile'  			,'UserController@myProfile');
Route::get('changePassword'			,'UserController@changePassword');
Route::post('changedPassword' 		,'UserController@changedPassword');
Route::get('Admin/home'  			,'UserController@adminHome');
Route::get('CustomerServices/home'  ,'UserController@customerServicesHome');
Route::get('Employee/home'  		,'UserController@employeeHome');
//End User

/////////////////////////////////////////////////////////////////////////////////

//Start Employee
Route::get('displayEmployees'		,'EmployeeController@index');
Route::get('createEmployee'  		,'EmployeeController@create');
Route::post('storeEmployee'  		,'EmployeeController@store');
Route::get('showEmployee/{id}'  	,'EmployeeController@show');
Route::get('editEmployee/{id}'  	,'EmployeeController@edit');
Route::post('updateEmployee/{id}'	,'EmployeeController@update');
Route::get('changeRole/{id}'  		,'EmployeeController@changeRole');
Route::post('changeRole/{id}'		,'EmployeeController@changeRole');
Route::get('destroyEmployee/{id}'	,'EmployeeController@destroy');
//End Employee

//Start Issue
Route::get('viewIsses'				,'IssueController@index');
Route::get('createIssue'  			,'IssueController@create');
Route::post('storeIssue'  			,'IssueController@store');
Route::post('searchIssue'  			,'IssueController@searchIssue');
Route::get('done/{id}'  			,'IssueController@done');
Route::get('searchCustomerService'  ,'IssueController@searchCustomerService');
Route::post('searchCustomerService' ,'IssueController@searchCustomerService');
Route::get('editIssue/{id}'  		,'IssueController@edit');
Route::post('updateIssue/{id}'		,'IssueController@update');
Route::get('destroyIssue/{id}'	,'IssueController@destroy');
//End Issue
