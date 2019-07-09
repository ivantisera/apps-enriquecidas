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

Route::get('', [
    'as' => 'app.home',
    'uses' => 'HomeController@index',
]);

Route::get('home', [
    'as' => 'app.home',
    'uses' => 'HomeController@index',
]);

Route::get('listasillas', [
    'as' => 'listaSillas',
    'uses' => 'SillasController@index',
]);

Route::get('sillas/{id}', [
    'as' => 'sillas.detalle',
    'uses' => 'SillasController@detalle',
]);

Route::get('/login', [
    'as' => 'login',
    'uses' => 'AuthController@verFormLogin',
]);

Route::post('/login', [
    'as' => 'auth.doLogin',
    'uses' => 'AuthController@doLogin',
]);

Route::get('logout', [
    'as' => 'auth.logout',
    'uses' => 'AuthController@doLogout',
]);

Route::get('/registro', [
    'as' => 'registro',
    'uses' => 'AuthController@verRegistro',
]);

Route::post('/registro', [
    'as' => 'auth.doRegistro',
    'uses' => 'AuthController@doRegistro',
]);

Route::post('agregarcomentario',[
    'as' => 'agregarcomentario',
    'uses' => 'SillasController@agregarcomentario'
]);

// Route::namespace ('Admin')->group(function () {
//     Route::get('panel', [
//         'as' => 'panel',
//         'uses' => 'PanelController@index',
//     ]);
// });

Route::group(
    [
        'namespace' => 'admin',
        'middleware' => 'admin',
    ], function () {
        Route::get('panel', [
            'as' => 'panel',
            'uses' => 'PanelController@index',
        ]);

        Route::get('nuevasilla', [
            'as' => 'nuevasilla',
            'uses' => 'PanelController@nuevasilla',
        ]);

        Route::post('nuevasilla', [
            'as' => 'nuevasilla',
            'uses' => 'PanelController@crearNuevaSilla',
        ]);

         Route::get('editar/{id}', [
             'as' => 'editarsilla',
             'uses' => 'PanelController@editarsilla',
         ]);
         Route::put('editar/{id}', [
             'as' => 'editarsilla',
             'uses' => 'PanelController@guardaredicionsilla',
         ]);

        Route::delete('{id}', [
            'as' => 'eliminarsilla',
            'uses' => 'PanelController@deletesilla'
        ]);

        Route::patch('{id}', [
            'as' => 'restablecersilla',
            'uses' => 'PanelController@restablecersilla'
        ]);

        Route::get('panelcomentarios', [
            'as' => 'panelcomentarios',
            'uses' => 'PanelComentariosController@index',
        ]);

        Route::delete('eliminarcomentario/{id}', [
            'as' => 'eliminarcomentario',
            'uses' => 'PanelComentariosController@eliminarcomentario'
        ]);
        

        

        //  Route::get('users', [
        //     'as' => 'users',
        //     'uses' => 'PanelController@usersindex',
        // ]);
    });
