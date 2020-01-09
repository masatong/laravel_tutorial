<?php

// 選択されたフォルダに紐づいたタスクの表示
Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
// フォルダ作成ページ表示
Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
// フォルダ作成処理の実行
Route::post('/folders/create', 'FolderController@create');
