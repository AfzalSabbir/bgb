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

/**
 * Redirect after auth of user
 */
Route::get('/home', 'Frontend\HomeController@index')->name('home');





/**
 * Admin Section Routes
 */
Route::group(['prefix' => 'admin'], function(){
	/**
	 * Admin authentication routes
	*/
	Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\Admin\LoginController@login');
	Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');
	Route::post('password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/reset','Auth\Admin\ResetPasswordController@reset');
	Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	Route::get('/change-password', 'Backend\HomeController@chnagePasswordForm')->name('admin.password.form');
  	Route::post('/change-password', 'Backend\HomeController@chnagePassword')->name('admin.password.change');

	/**
	 * Admin Dashboard
	*/
	Route::get('/', 'Backend\HomeController@index')->name('admin.home');
	Route::get('/chart', 'Backend\HomeController@chart')->name('admin.chart');
	Route::get('/form', 'Backend\HomeController@form')->name('admin.form');
	Route::get('/table', 'Backend\HomeController@table')->name('admin.table');


	/**
	 * Menu routes
	*/
	Route::group(['prefix' => 'menu'], function(){
		Route::get('/', 'Backend\MenuController@index')->name('admin.menu.index');
		Route::get('/add', 'Backend\MenuController@create')->name('admin.menu.create');
		Route::post('/add', 'Backend\MenuController@store')->name('admin.menu.store');
		Route::get('/edit/{id}', 'Backend\MenuController@edit')->name('admin.menu.edit');
		Route::post('/edit/{id}', 'Backend\MenuController@update')->name('admin.menu.update');
		Route::get('/delete/{id}', 'Backend\MenuController@delete')->name('admin.menu.delete');
	});


	/**
	 * Role routes
	*/
	Route::group(['prefix' => 'role'], function(){
		Route::get('/', 'Backend\RoleController@index')->name('admin.role.index');
		Route::get('/assign/{role}', 'Backend\RoleController@create')->name('admin.role.assign');
		Route::post('/assign', 'Backend\RoleController@store')->name('admin.role.store');
	});


	// Admin Access Information
	Route::get('/access-info', 'Backend\AdminAccessInfoController@index')->name('admin.access.index');


	/**
	 * Student routes
	*/
	Route::group(['prefix' => 'student'], function(){
		Route::get('/', 'Backend\StudentController@index')->name('admin.student.index');
		Route::get('/view/{id}', 'Backend\StudentController@show')->name('admin.student.show');
		Route::get('/add', 'Backend\StudentController@create')->name('admin.student.create');
		Route::post('/add', 'Backend\StudentController@store')->name('admin.student.store');
		Route::get('/edit/{id}', 'Backend\StudentController@edit')->name('admin.student.edit');
		Route::post('/edit/{id}', 'Backend\StudentController@update')->name('admin.student.update');
		Route::post('/delete', 'Backend\StudentController@delete')->name('admin.student.delete');
	});


	/**
	 * Teacher routes
	*/
	Route::group(['prefix' => 'teacher'], function(){
		Route::get('/', 'Backend\TeacherController@index')->name('admin.teacher.index');
		Route::get('/view/{id}', 'Backend\TeacherController@show')->name('admin.teacher.show');
		Route::get('/add', 'Backend\TeacherController@create')->name('admin.teacher.create');
		Route::post('/add', 'Backend\TeacherController@store')->name('admin.teacher.store');
		Route::get('/edit/{id}', 'Backend\TeacherController@edit')->name('admin.teacher.edit');
		Route::post('/edit/{id}', 'Backend\TeacherController@update')->name('admin.teacher.update');
		Route::post('/delete', 'Backend\TeacherController@delete')->name('admin.teacher.delete');
	});


	/**
	 * Designation routes
	*/
	Route::group(['prefix' => 'designation'], function(){
		Route::get('/', 'Backend\DesignationController@index')->name('admin.designation.index');
		Route::get('/view/{id}', 'Backend\DesignationController@show')->name('admin.designation.show');
		Route::post('/add', 'Backend\DesignationController@store')->name('admin.designation.store');
		Route::post('/edit/{slug}', 'Backend\DesignationController@update')->name('admin.designation.update');
		Route::get('/delete/{slug}', 'Backend\DesignationController@delete')->name('admin.designation.delete');

	});

	/**
	 * Session routes
	*/
	Route::group(['prefix' => 'session'], function(){
		Route::get('/', 'Backend\SessionController@index')->name('admin.session.index');
		Route::get('/view/{id}', 'Backend\SessionController@show')->name('admin.session.show');
		Route::post('/add', 'Backend\SessionController@store')->name('admin.session.store');
		Route::post('/edit/{id}', 'Backend\SessionController@update')->name('admin.session.update');
		Route::get('/delete/{id}', 'Backend\SessionController@delete')->name('admin.session.delete');
		//Route::post('/', 'Backend\SessionController@search')->name('admin.session.search');

	});

	/**
	 * Section routes
	*/
	Route::group(['prefix' => 'section'], function(){
		Route::get('/', 'Backend\SectionController@index')->name('admin.section.index');
		Route::get('/view/{id}', 'Backend\SectionController@show')->name('admin.section.show');
		Route::post('/add', 'Backend\SectionController@store')->name('admin.section.store');
		Route::post('/edit/{id}', 'Backend\SectionController@update')->name('admin.section.update');
		Route::get('/delete/{id}', 'Backend\SectionController@delete')->name('admin.section.delete');
		Route::post('/', 'Backend\SectionController@search')->name('admin.section.search');

	});

	/**
	 * Class routes
	*/
	Route::group(['prefix' => 'class'], function(){
		Route::get('/', 'Backend\ClassController@index')->name('admin.class.index');
		Route::get('/view/{id}', 'Backend\ClassController@show')->name('admin.class.show');
		Route::post('/add', 'Backend\ClassController@store')->name('admin.class.store');
		Route::post('/edit/{id}', 'Backend\ClassController@update')->name('admin.class.update');
		Route::post('/delete', 'Backend\ClassController@delete')->name('admin.class.delete');
	});

	/**
	 * Group routes
	*/
	Route::group(['prefix' => 'group'], function(){
		Route::get('/', 'Backend\GroupController@index')->name('admin.group.index');
		Route::get('/view/{id}', 'Backend\GroupController@show')->name('admin.group.show');
		Route::post('/add', 'Backend\GroupController@store')->name('admin.group.store');
		Route::post('/edit/{id}', 'Backend\GroupController@update')->name('admin.group.update');
		Route::post('/delete', 'Backend\GroupController@delete')->name('admin.group.delete');
	});
});


Route::get('language/{locale}', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->back();
})->name('language');
