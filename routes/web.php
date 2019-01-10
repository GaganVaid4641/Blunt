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
	Route::get('dashboard','AdminController@index')->name('admin.dashboard');
	Route::get('/','Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/','Auth\LoginController@login');

	Route::post('/logout','AdminController@logout')->name('admin.logout');
	


	Route::post('admin-password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('admin-password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('admin-password/reset','Auth\ResetPasswordController@reset');
	Route::get('admin-password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
});

/*
 * Super Admin Routes
 */
Route::group(['namespace' => 'Superadmin', 'prefix' => 'superadmin'], function () {
	Route::get('dashboard','SuperadminController@index')->name('superadmin.dashboard');
	Route::get('/','Auth\LoginController@showLoginForm')->name('superadmin.login');
	Route::post('/','Auth\LoginController@login');

	Route::post('/logout','SuperadminController@logout')->name('superadmin.logout');


	Route::post('superadmin-password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('superadmin.password.email');
	Route::get('superadmin-password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('superadmin.password.request');
	Route::post('superadmin-password/reset','Auth\ResetPasswordController@reset');
	Route::get('superadmin-password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('superadmin.password.reset');
});