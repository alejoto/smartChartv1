<?php

Route::get('/', function()
{
	return Redirect::to('/temp');//deprecated
});

Route::controller('charts','ChartsController');
Route::controller('temp','TemporaluserController');

