<?php

Route::get('/', function()
{
	return Redirect::to('/temp');//deprecated
});

Route::controller('charts','ChartsController');
Route::controller('temp','TemporaluserController');

Route::any('tempsetdate', function()
{
	return View::make('temporaltest');//deprecated
});