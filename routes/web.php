<?php

use App\Http\Controllers\GruposController;
use App\Http\Controllers\EstudiantesController;

Route::get('/{contador?}', 'FrontController@index')->name('index');

Route::group(['prefix' => 'estudiantes'], function() {
    Route::get('/estudiantes', 'EstudiantesController@index')->name('estudiantes');
    Route::get('/estudiante_nuevo', 'EstudiantesController@create')->name('estudiante_nuevo');
    Route::post('/estudiante', 'EstudiantesController@store')->name('estudiante_post');
    Route::get('/estudiante/{id}', 'EstudiantesController@show')->name('estudiante');
    Route::get('/estudiante_edit/{id}', 'EstudiantesController@edit')->name('estudiante_edit');
    Route::put('/estudiante_update/{id}', 'EstudiantesController@update')->name('estudiante_update');
    Route::delete('/estudiante_eliminar/{id}', 'EstudiantesController@destroy')->name('estudiante_eliminar');
});


Route::group(['prefix' => 'grupos'], function() {
    Route::get('/grupos', 'GruposController@index')->name('grupos');
    Route::get('/grupo_nuevo', 'GruposController@create')->name('grupo_nuevo');
    Route::post('/grupo', 'GruposController@store')->name('grupo_post');
    Route::get('/grupo/{id}', 'GruposController@show')->name('grupo');
    Route::get('/grupo_edit/{id}', 'GruposController@edit')->name('grupo_edit');
    Route::put('/grupo_update/{id}', 'GruposController@update')->name('grupo_update');
    Route::delete('/grupo_eliminar/{id}', 'GruposController@destroy')->name('grupo_eliminar');
});




