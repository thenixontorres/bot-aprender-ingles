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
  
    Route::get('/home', [
        'uses'  => 'homeController@index',
        'as'    => 'home',
    ]);

    Route::resource('users', 'userController');
    Route::resource('personas', 'personaController');
    Route::resource('empresas', 'empresaController');
    Route::resource('clausulas', 'clausulaController');
    Route::resource('pagos', 'pagoController');
    Route::resource('planes', 'planesController');
    Route::resource('modificacions', 'modificacionController');
    Route::resource('contratos', 'contratoController');
    Route::get('/individuales', [
            'uses'  =>  'contratoController@individuales',
            'as'    =>  'contratos.individuales',
    ]);
    Route::get('/individuales_create', [
            'uses'  =>  'contratoController@individuales_create',
            'as'    =>  'contratos.individuales_create',
    ]);
    Route::get('/colectivos', [
            'uses'  =>  'contratoController@colectivos',
            'as'    =>  'contratos.colectivos',
    ]);

    Route::get('/colectivos_create', [
            'uses'  =>  'contratoController@colectivos_create',
            'as'    =>  'contratos.colectivos_create',
    ]);
    
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



Route::resource('estados', 'estadoController');

Route::resource('municipios', 'municipioController');

Route::resource('componentes', 'componenteController');