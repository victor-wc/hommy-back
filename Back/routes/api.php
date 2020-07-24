<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//ROTAS DA REPUBLICA

Route::post('createRepublic', 'RepublicController@createRepublic');
Route::get('showRepublic/{republic_id}', 'RepublicController@showRepublic');
Route::get('listRepublic', 'RepublicController@listRepublic');
Route::put('updateRepublic/{republic_id}', 'RepublicController@updateRepublic');
Route::delete('deleteRepublic/{republic_id}', 'RepublicController@deleteRepublic');
Route::put('addRepublic/{user_id}/{republic_id}', 'RepublicController@addRepublic');
Route::put('removeRepublic/{user_id}/{republic_id}', 'RepublicController@removeRepublic');

//ROTAS DO USUÁRIO

Route::post('createUser','UserController@createUser');
Route::get('showUser/{user_id}', 'UserController@showUser');
Route::get('listUser', 'UserController@listUser');
Route::put('updateUser/{user_id}', 'UserController@updateUser');
Route::delete('deleteUser/{user_id}', 'UserController@deleteUser');


