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

Route::middleware('auth')->get('/', function () {
    return view('chill-pill-android');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/signup', 'UsersController@signup')->name('signup');
Route::get('/dashboard', 'UsersController@dashboard')->name('dashboard');
Route::post('/custom-login', 'UsersController@login')->name('custom-login');
Route::post('/doctor-signup', 'UsersController@doctorSignUp')->name('doctorSignUp');
Route::post('/patient-signup', 'UsersController@patientSignUp')->name('patientSignUp');

Route::middleware('auth')->get('/patient-dashboard', 'PatientsController@dashboard')->name('patient-dashboard');
Route::middleware('auth')->get('/update-patient-info', 'PatientsController@showUpdateForm')->name('show-patient-update-page');
Route::middleware('auth')->post('/update-patient-info', 'PatientsController@edit')->name('update-patient');

Route::middleware('auth')->get('/doctor-dashboard', 'DoctorsController@dashboard')->name('doctor-dashboard');
Route::middleware('auth')->get('/update-doctor-info', 'DoctorsController@showUpdateForm')->name('show-doctor-update-page');
Route::middleware('auth')->get('/search-patient', 'DoctorsController@searchByBox')->name('doctor.search-by-box');
Route::middleware('auth')->post('/search-patient', 'DoctorsController@searchByBox')->name('doctor.search-by-box');


Route::get('/test-pusher', 'HomeController@viewControls')->name('viewControls');
Route::get('/test-dose', 'HomeController@testDose')->name('testDose');
Route::post('/setup-test-pins', 'HomeController@setupTestPins')->name('setupTestPins');
Route::get('/trigger-pusher/{cell}', 'HomeController@triggerPusher')->name('triggerPusher');
