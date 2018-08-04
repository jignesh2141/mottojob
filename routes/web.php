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


/*Route::get('jobs/{locale}', 'JobController@index' ,function($locale) {
   	app()->setLocale($locale);
	echo $locale;exit;
})->name('mottojobs');*/

Auth::routes();
/* Front End */
Route::group(['middleware' => ['LanguageLocale']], function () {
	Route::post('/manage-locale', "HomeController@manage_locale")->name('manageLang');
	Route::get('/', 'HomeController@index');
    Route::get('/jobs', 'JobController@index')->name('mottojobs');
    Route::post('jobs/loaddata','JobController@loadDataAjax')->name('loadDataAjax');
	Route::get('/job/{id}', 'JobController@get_job')->name('jobDetails');
	Route::get('/apply-form/{id}', 'JobController@apply_form')->name('applyForm');
	Route::post('/apply-job', 'JobController@apply_job')->name('applyJob');
	Route::get('/apply-completed', 'JobController@apply_completed')->name('applyCompleted');
	
});
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

/* Admin */
Route::group(['prefix' => 'admin-panel'], function () {
	Route::get('/', "Admin\AdminUserController@login");
	Route::get('/admin-login', "Admin\AdminUserController@login")->name('adminLoginForm');
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
	    Route::get('/applied-job', "Admin\JobController@applied_job")->name('appliedJob');

	    /* Manage Session */
	    Route::post('/manage-session', "Admin\JobController@manage_session")->name('manageSession');

	    /* Settings */
	    Route::get('/setting', "Admin\SettingController@index")->name('setting');
	    Route::post('/save-setting', "Admin\SettingController@store")->name('saveSetting');
	});
});
