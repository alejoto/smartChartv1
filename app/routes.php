<?php



Route::get('/', function()
{
	return View::make('index')
	->with('title','Data-analizer home page');
});

Route::controller('charts','ChartsController');
