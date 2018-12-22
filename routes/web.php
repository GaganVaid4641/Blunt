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

Auth::routes();

/*
 * Frontend Routes
 */
Route::get('/home', 'HomeController@index')->name('home');


/*
 * Admin Routes
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	Route::get('dashboard','AdminController@index');
	Route::get('/','Auth\LoginController@showLoginForm')->name('admin.login');
	Route::get('/login','Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/','Auth\LoginController@login');
	Route::post('admin-password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('admin-password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('admin-password/reset','Auth\ResetPasswordController@reset');
	Route::get('admin-password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
});