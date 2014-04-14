<?php

Route::group(array('prefix' => 'api'), function() {
	Route::resource('projects', 'APIProjectController');
	Route::resource('tasks', 'APITaskController');
});

Route::get('/', 'HomeController@index');
Route::resource('projects', 'ProjectController');
Route::resource('projects.tasks', 'TaskController');

View::share('projects', Project::all());