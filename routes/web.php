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
Route::get('/doctor-signup', 'UsersController@doctorSignUp')->name('doctorSignUp');
Route::get('/patient-signup', 'UsersController@patientSignUp')->name('patientSignUp');



Route::get('/test-pusher', 'HomeController@viewControls')->name('viewControls');
Route::get('/test-dose', 'HomeController@testDose')->name('testDose');
Route::post('/setup-test-pins', 'HomeController@setupTestPins')->name('setupTestPins');
Route::get('/trigger-pusher/{cell}', 'HomeController@triggerPusher')->name('triggerPusher');
