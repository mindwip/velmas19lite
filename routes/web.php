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

/*Route::get('/', function () {
    return view('home');
}); */

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('formulario/{slug}', 'HomeController@formulario')->name('formulario');
Route::get('contratar/{slug}', 'HomeController@addCarrito')->name('contratar');
Route::get('carrito', 'HomeController@carrito')->name('carrito');
Route::get('checkout', 'HomeController@checkout')->name('checkout');
Route::get('delete-contract/{id}', 'HomeController@deleteContract')->name('delete-contract');
Route::get('condiciones-uso', 'HomeController@condicionesUso')->name('condiciones-uso');
Route::get('politicas-privacidad', 'HomeController@politicasPrivacidad')->name('politicas-privacidad');
Route::get('politicas-cookies', 'HomeController@politicasCookies')->name('politicas-cookies');
Route::get('contacta', 'HomeController@contacta')->name('contacta');
Route::get('cliente', 'HomeController@cliente')->name('cliente');

// LOGOUT:
Route::get('logout', 'Auth\LoginController@logout', function (){
    return abort(404);
});

// FRONTEND:


// BACKEND:  middleware(['auth', 'admin'])->
Route::prefix('admin')->namespace('Admin')->group(function(){
	//Admin / Dashboard:
	Route::get('dashboard', 'AdminController@index')->name('admin');

	//Contracts:
	Route::get('contracts', 'ContractController@index')->name('contracts.index');
	Route::get('contracts/create', 'ContractController@create')->name('contracts.create');
	Route::post('contracts/store', 'ContractController@store')->name('contracts.store');
	Route::get('contracts/{contract}/edit', 'ContractController@edit')->name('contracts.edit');
	Route::post('contracts/update', 'ContractController@update')->name('contracts.update');
	Route::get('contracts/{contract}/delete', 'ContractController@destroy')->name('contracts.delete');

	//Customers:
	Route::get('users/create-customer', 'UserController@createCustomer')->name('users.create-customer');

	//UserContracts:
	Route::get('revision-contratos', 'UserContractsController@index')->name('user_contracts.index');
	Route::get('payments', 'UserContractsController@payments')->name('payments.index');
	Route::get('user_contracts/{id}/edit', 'UserContractsController@edit')->name('user_contracts.edit');
	Route::get('user_contracts/{user_contracts}/delete', 'UserContractsController@destroy')->name('user_contracts.delete');

	//Users:
	Route::get('users', 'UserController@index')->name('users.index');
	Route::get('clientes', 'UserController@customers')->name('users.customers');
	Route::get('users/create', 'UserController@create')->name('users.create');
	Route::post('users/store', 'UserController@store')->name('users.store');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
	Route::post('users/update', 'UserController@update')->name('users.update');
	Route::post('users/update-password', 'UserController@updatePassword')->name('users.update-password');
	//Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
	Route::get('users/{user}/delete', 'UserController@destroy')->name('users.delete');
});