<?php

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/tasks', 'TaskController@index')->name('tasks.index');

    Route::get('/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    Route::post('/tasks/create', 'TaskController@create');

    Route::get('/tasks/{id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    Route::post('/tasks/{id}/edit', 'TaskController@edit');

});

Auth::routes();