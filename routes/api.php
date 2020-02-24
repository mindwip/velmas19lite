<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::prefix('admin')->namespace('Admin')->group(function(){
	//Contracts:
	Route::get('contracts', 'ContractController@contractsApiData');

	//Users:
	Route::get('users/{isAdmin}', 'UserController@usersApiData');

	//UserContracts:
	Route::get('revisiones', 'UserContractsController@revisionesApiData');
	Route::get('payments', 'UserContractsController@paymentsApiData');
});
