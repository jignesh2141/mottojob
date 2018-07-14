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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'AuthUsersController@index')->name('home');
});

Route::group(['prefix' => 'admin-panel'], function () {
	
	Route::get('/', "Admin\AdminUserController@login");
	Route::get('/login', "Admin\AdminUserController@login");
	Route::post('/admin-login', "Admin\AdminUserController@validateLogin")->name('adminLoginValidate');
	Route::group(['middleware' => ['AdminAcl']], function () {
		Route::get('/dashboard', "Admin\AdminUserController@adminDashboard")->name('adminDashboard');
		/* Page */
		Route::get('/pages', "Admin\PageController@index")->name('pages');
		Route::get('/add-page/{id?}', "Admin\PageController@add_page")->name('addPage');
		Route::post('/save-page', "Admin\PageController@store")->name('savePage');
	    Route::post('/update-page/{id}', "Admin\PageController@update")->name('updatePage');
	    Route::get('/delete-page/{id}', "Admin\PageController@destroy")->name('deletePage');

	    /* Job */
		Route::get('/jobs', "Admin\JobController@index")->name('jobs');
		Route::get('/add-job/{id?}', "Admin\JobController@add_job")->name('addJob');
		Route::post('/save-job', "Admin\JobController@store")->name('saveJob');
	    Route::post('/update-job/{id}', "Admin\JobController@update")->name('updateJob');
	    Route::get('/delete-job/{id}', "Admin\JobController@destroy")->name('deleteJob');

	    /* Manage Session */
	    Route::post('/manage-session', "Admin\JobController@manage_session")->name('manageSession');
	});
});