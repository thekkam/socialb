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

Route::get('/{slug}/page', 'HomeController@pages');

//Routes
Route::middleware('auth')->group(function(){
	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
	Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
	Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
	Route::put('roles/{role}/update', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles.show');
	Route::get('roles/{id}/destroy', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');
	//Pages
	Route::post('pages/store', 'PageController@store')->name('pages.store')->middleware('permission:pages.create');
	Route::get('pages', 'PageController@index')->name('pages.index')->middleware('permission:pages.index');
	Route::get('pages/create', 'PageController@create')->name('pages.create')->middleware('permission:pages.create');
	Route::put('pages/{page}/update', 'PageController@update')->name('pages.update')->middleware('permission:pages.edit');
	Route::get('pages/{page}', 'PageController@show')->name('pages.show')->middleware('permission:pages.show');
	Route::get('pages/{page}/destroy', 'PageController@destroy')->name('pages.destroy')->middleware('permission:pages.destroy');
	Route::get('pages/{page}/edit', 'PageController@edit')->name('pages.edit')->middleware('permission:pages.edit');
	//Menus
	Route::post('menus/store', 'Layout\MenuController@store')->name('menus.store')->middleware('permission:menus.create');
	Route::get('menus', 'Layout\MenuController@index')->name('menus.index')->middleware('permission:menus.index');
	Route::get('menus/create', 'Layout\MenuController@create')->name('menus.create')->middleware('permission:menus.create');
	Route::put('menus/{id}/update', 'Layout\MenuController@update')->name('menus.update')->middleware('permission:menus.update');
	Route::get('menus/{id}/destroy', 'Layout\MenuController@destroy')->name('menus.destroy')->middleware('permission:menus.destroy');
	Route::get('menus/{menu}/edit', 'Layout\MenuController@edit')->name('menus.edit')->middleware('permission:menus.edit');
	//Users
	Route::get('users/create', 'Layout\UserController@create')->name('users.create')->middleware('permission:users.create');
	Route::post('users/store', 'Layout\UserController@store')->name('users.store')->middleware('permission:users.create');
	Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
	Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');
	Route::get('users/{user}', 'UserController@show')->name('users.show')->middleware('permission:users.show');
	Route::get('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');
});