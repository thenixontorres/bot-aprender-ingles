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
    Route::group(['middleware' => 'admin'], function () {
    //solo para master
        Route::get('/personas/user/index', [
                'uses'  => 'personaController@userIndex',
                'as'    => 'personas.userindex',
            ]); 
        
        Route::get('/personas/user/create', [
                'uses'  => 'personaController@userCreate',
                'as'    => 'personas.usercreate',
            ]); 
        
        Route::post('/personas/user/store', [
                'uses'  => 'personaController@userStore',
                'as'    => 'personas.userstore',
            ]); 
        
        Route::get('/personas/user/edit/{id}', [
                'uses'  => 'personaController@userEdit',
                'as'    => 'personas.useredit',
            ]); 
        
        Route::patch('/personas/user/update/{id}', [
                'uses'  => 'personaController@userUpdate',
                'as'    => 'personas.userupdate',
            ]);

        Route::delete('/personas/user/destroy/{id}', [
                'uses'  => 'personaController@userDestroy',
                'as'    => 'personas.userdestroy',
            ]);     
    });      

        Route::get('/home', [
            'uses'  => 'homeController@index',
            'as'    => 'home',
        ]);

        Route::resource('users', 'userController');
        Route::resource('personas', 'personaController');
        Route::resource('empresas', 'empresaController');
        Route::resource('clausulas', 'clausulaController');

        Route::post('/clausulas/store', [
            'uses'  => 'clausulaController@store',
            'as'    => 'clausulas.store',
        ]);

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

        
        Route::resource('estados', 'estadoController');

        Route::resource('municipios', 'municipioController');

        Route::resource('componentes', 'componenteController');

        Route::resource('rutas', 'rutaController');

        Route::get('/giros', [
                'uses'  =>  'contratoController@giros',
                'as'    =>  'contratos.giros',
        ]);

        Route::post('/buscar_giros', [
                'uses'  =>  'contratoController@buscar_giros',
                'as'    =>  'contratos.buscar_giros',
        ]);

        Route::get('/dropdown', [
                'uses'  =>  'municipioController@dropdown',
                'as'    =>  'dropdown',
        ]);

        Route::resource('empleados', 'empleadoController');
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


