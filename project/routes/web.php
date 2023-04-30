<?php
use Illuminate\Support\Facades\Input;

Route::group(array('prefix' => LaravelLocalization::setLocale() . '/'), function () {
	Route::get('/', 'Auth\LoginController@showLoginForm');
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm'); 
});

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::group(array('prefix' => LaravelLocalization::setLocale() . '/admin', 'namespace' => 'Admin'), function () {

	Route::get('/dashboard', 'HomeController@index')->name('home');

	/*
	 |--------------------------------------------------------------------------
	 | MODUL Profile
	 |--------------------------------------------------------------------------
	*/
	Route::get('/profile','ProfileController@index');
	Route::put('/profile','ProfileController@update');

	/*
	|--------------------------------------------------------------------------
	| Module User Access
	|--------------------------------------------------------------------------
	*/
	Route::get('/user_access/user','UsersController@index');
	Route::get('/user_access/users','UsersController@get_data');
	Route::get('/user_access/users/{id}','UsersController@detail');
	Route::post('/user_access/users','UsersController@create');
	Route::put('/user_access/users/{id}','UsersController@update');
	Route::delete('/user_access/users/{id}','UsersController@delete');
	Route::post('/user_access/users/delete/batch','UsersController@delete_batch');
	
	/*
	|--------------------------------------------------------------------------
	| Module User Roles
	|--------------------------------------------------------------------------
	*/
	Route::get('/user_access/role',[
		'as'=>'user_access.role.index',
		'uses'=>'RoleController@index'
	]);
	Route::get('/user_access/role/create',[
		'as'=>'user_access.role.create',
		'uses'=>'RoleController@create'
	]);
	Route::get('/user_access/role/{id}',[
		'as'=>'user_access.role.edit',
		'uses'=>'RoleController@edit'
	]);
	Route::post('/user_access/role/store',[
		'as'=>'user_access.role.store',
		'uses'=>'RoleController@store'
	]);
	Route::put('/user_access/role/{id}',[
		'as'=>'user_access.role.update',
		'uses'=>'RoleController@update'
	]);
	Route::get('/user_access/roles','RoleController@get_data');
	Route::delete('/user_access/roles/{id}','RoleController@delete');
	Route::post('/user_access/roles/delete/batch','RoleController@delete_batch');
	Route::get('/user_access/roles/{id}','RoleController@detail');

	/*
	 |--------------------------------------------------------------------------
	 | Module SAMPLE
	 |--------------------------------------------------------------------------
	*/	
	Route::get('/sample','SampleController@index');
	Route::get('/samples','SampleController@get_data');
	Route::get('/samples/{id}','SampleController@detail');
	Route::post('/samples','SampleController@create');
	Route::put('/samples/{id}','SampleController@update');
	Route::delete('/samples/{id}','SampleController@delete');
	Route::post('/samples/delete/batch','SampleController@delete_batch');

});


