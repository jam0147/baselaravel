<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Config::get('admin.prefix')

Route::group(['prefix' => 'admin'], function() {
	//Route::get('/', 'EscritorioController@index')->name('admin.escritorio');
	Route::get('/', function () {
        dd('This is the prueba module index page. Build something great!');
    }); 
	/**
	 * Login
	 */
	
	Route::get('login', 			'LoginController@index')->name('admin.login');
	Route::get('cambiar_password', 	'LoginController@cambiarPassword')->name('admin.cambiar_password');
	Route::get('login/salir', 		'LoginController@salir');
	Route::post('login/validar', 	'LoginController@validar')->name('admin.login.validar');
	Route::get('bloquear', 			'LoginController@bloquear');

	/**
	 * Perfiles
	 */

	Route::group(['prefix' => 'perfiles'], function() {
		Route::get('/', 				'PerfilesController@index');
		Route::get('buscar/{id}', 		'PerfilesController@buscar');
		Route::post('guardar', 			'PerfilesController@guardar');
		Route::put('guardar/{id}', 		'PerfilesController@guardar');
		Route::delete('eliminar/{id}', 	'PerfilesController@eliminar');
		Route::post('restaurar/{id}', 	'PerfilesController@restaurar');
		Route::delete('destruir/{id}', 	'PerfilesController@destruir');
		Route::get('arbol', 			'PerfilesController@arbol');
		Route::get('datatable', 		'PerfilesController@datatable');
	});

	/**
	 * Perfil
	 */

	Route::group(['prefix' => 'perfil'], function() {
		Route::get('/', 			'PerfilController@index');
		Route::put('actualizar', 	'PerfilController@actualizar');
		Route::put('clave', 		'PerfilController@clave');
		Route::post('cambio', 		'PerfilController@cambio');
	});

	/**
	 * Usuarios
	 */

	Route::group(['prefix' => 'usuarios'], function() {
		Route::get('/', 				'UsuariosController@index');
		Route::get('buscar/{id}', 		'UsuariosController@buscar');

		Route::post('guardar',			'UsuariosController@guardar');
		Route::put('guardar/{id}', 		'UsuariosController@guardar');

		Route::delete('eliminar/{id}', 	'UsuariosController@eliminar');
		Route::post('restaurar/{id}', 	'UsuariosController@restaurar');
		Route::get('estado/{id}', 	'UsuariosController@estado');
		Route::delete('destruir/{id}', 	'UsuariosController@destruir');

		Route::post('cambio', 			'UsuariosController@cambio');
		Route::get('arbol', 			'UsuariosController@arbol');
		Route::get('datatable', 		'UsuariosController@datatable');
	});
	Route::group(['prefix' => 'configuracion'], function() {
		Route::get('/', 				'AppController@index');
	});

	Route::group(['prefix' => 'bloquear'], function() {
		Route::get('/', 				'BloqueosController@index');
		Route::get('buscar/{id}', 		'BloqueosController@buscar');
		Route::post('guardar', 			'BloqueosController@guardar');
		Route::put('guardar/{id}', 		'BloqueosController@guardar');
		Route::delete('eliminar/{id}', 	'BloqueosController@eliminar');
		Route::post('restaurar/{id}', 	'BloqueosController@restaurar');
		Route::delete('destruir/{id}', 	'BloqueosController@destruir');
		Route::get('datatable', 		'BloqueosController@datatable');

		Route::get('prueba/{parametro}/{fecha}/{nomina}','BloqueosController@bloquear');
	});

	

});


