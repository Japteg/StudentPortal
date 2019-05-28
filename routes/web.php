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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('portal');
});

Route::get('/verifyOTP','HomeController@verifyOTP')->name('verifyOTP');
// Route::get('/verifyOTP', function(){
//     return view('auth.verifyOTP');
// });

Auth::routes();

Route::get('/home1', 'HomeController@index1')->name('home1');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/checkOTP','HomeController@checkOTP')->name('checkOTP');

// Route::get('/stuPortal','HomeController@index1')->name('StuPortal');
