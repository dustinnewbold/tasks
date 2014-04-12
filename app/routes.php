<?php

Route::group(array('prefix' => 'api'), function() {
	Route::resource('projects', 'APIProjectController');
	Route::resource('projects.tasks', 'APITaskController');
});

Route::get('/', function() {
	return View::make('global.home');
});
Route::resource('projects', 'ProjectController');
Route::resource('projects.tasks', 'TaskController');