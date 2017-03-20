<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'auth'], function () {
  
  //Modulos exclusivos para Administradores
  Route::group(['middleware' => 'Admin'], function () {

    Route::resource('users', 'userController');
    
  });
});

// Login
Route::get('/', [
    'uses'  => 'Auth\AuthController@getLogin',
    'as'    => 'auth.login'
]);
Route::post('/', [
  'uses'  => 'Auth\AuthController@postLogin',
   'as'    => 'auth.login'
]);
Route::get('/logout', [
  'uses'  => 'Auth\AuthController@getLogout',
   'as'    => 'auth.logout'
]);

Route::resource('personas', 'personaController');

Route::resource('empresas', 'empresaController');

Route::resource('clausulas', 'clausulaController');

Route::resource('pagos', 'pagoController');

Route::resource('planes', 'planesController');

Route::resource('modificacions', 'modificacionController');

Route::resource('contratos', 'contratoController');