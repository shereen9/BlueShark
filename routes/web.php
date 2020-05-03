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

Route::get("/logout" , function () {
    Auth::logout() ;
    return redirect('login');
});

Route::get("/main" , function(){
    return view('layouts.main');
});

// Route::get('/user', 'Admin\UserController@index');
// Route::get('/edituser/{id}', 'Admin\UserController@edit');
// Route::post('/updateuser/{id}', 'Admin\UserController@update');
// Route::get('/deleteuser/{id}', 'Admin\UserController@destroy');


Route::resource('user', 'dashb\userController');
Route::resource('sport', 'dashb\sportController');
Route::resource('branch', 'dashb\branchController');
Route::resource('lead', 'dashb\leadController');
Route::resource('contact', 'dashb\contactController');
Route::resource('group', 'dashb\groupController');
Route::resource('trainer', 'dashb\trainerController');
Route::resource('message', 'dashb\messageController');
Route::resource('management', 'dashb\managementController');
Route::resource('payment', 'dashb\paymentController');
Route::resource('marketing', 'dashb\marketingController');
Route::post('getFees','dashb\paymentController@getFees');
Route::get('/transmit/{id}', 'dashb\leadController@transmit');
Route::resource('schedule', 'dashb\scheduleController');
Route::resource('tAttendance', 'dashb\trainerAttendance');
Route::get('trainerAttendance/createA/{id}/{branch_id}/{sport_id}','dashb\trainerAttendance@createA');
Route::post('gettsports', 'dashb\trainerAttendance@gettsports');
Route::post('gettrainers', 'dashb\trainerAttendance@gettrainers');
Route::resource('mAttendance', 'dashb\managementAttendance');
Route::get('managementAttendance/createA/{id}/{branch_id}','dashb\managementAttendance@createA');
Route::post('getmanagers', 'dashb\managementAttendance@getmanagers');
Route::resource('cAttendance', 'dashb\contactAttendance');
Route::post('getsports', 'dashb\contactAttendance@getsports');
Route::post('getcontacts', 'dashb\contactAttendance@getcontacts');
Route::get('contactAttendance/createA/{id}/{sport_id}/{branch_id}','dashb\contactAttendance@createA');
Route::resource('marketerAttendance', 'dashb\marketingAttendance');
Route::get('marketerAttendance/createA/{id}','dashb\marketingAttendance@createA');
Route::post('getmarketers', 'dashb\marketingAttendance@getmarketers');
Route::resource('revenue', 'dashb\revenueController');
Route::resource('expense', 'dashb\expenseController');
Route::get('trainerReports', 'dashb\trainerReports@index');
Route::post('getdata', 'dashb\trainerReports@getdata');
Route::get('accountingReports', 'dashb\accountingReports@index');
Route::post('getpayments', 'dashb\accountingReports@getpayments');
Route::get('managementReports', 'dashb\managementReports@index');
Route::post('getManagementData', 'dashb\managementReports@getManagementData');
Route::get('marketerReports', 'dashb\marketerReports@index');
Route::post('getMarketerData', 'dashb\marketerReports@getMarketerData');
Route::get('contactReports', 'dashb\contactReports@index');
Route::post('getContactData', 'dashb\contactReports@getContactData');
// Route::post('gettsportss', 'dashb\trainerReports@gettsportss');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
