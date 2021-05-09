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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'jwt.auth'], function() {

    Route::get('me', 'AuthController@me');
});


// Login
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::get('me', 'AuthController@me');
Route::get('/listUser', 'ListeUserController@index');

/*Gestion Employe */
Route::resource('Employes', 'EmployeController');
Route::get('/Employes', 'EmployeController@index');
Route::post('/EmployeAdd', 'EmployeController@store');
Route::post('/EmployeUpdate', 'EmployeController@update');
Route::get('/EmployeEdit/{id}', 'EmployeController@edit');
Route::get('/EmployeDelete/{id}', 'EmployeController@destroy');

/*Gestion Societe */
Route::resource('Societes', 'SocieteController');
Route::get('/Societes', 'SocieteController@index');
Route::post('/SocieteAdd', 'SocieteController@store');
Route::post('/SocieteUpdate', 'SocieteController@update');
Route::get('/SocieteEdit/{id}', 'SocieteController@edit');
Route::get('/SocieteDelete/{id}', 'SocieteController@destroy');


/*Gestion Societe Employe */
Route::resource('SEmploye', 'SocieteEmployeController');
Route::get('/SEmploye', 'SocieteEmployeController@index');
Route::post('/SEmployeAdd', 'SocieteEmployeController@store');
Route::post('/SEmployeUpdate', 'SocieteEmployeController@update');
Route::get('/SEmployeEdit/{id}', 'SocieteEmployeController@edit');
Route::get('/SEmployeDelete/{id}', 'SocieteEmployeController@destroy');
