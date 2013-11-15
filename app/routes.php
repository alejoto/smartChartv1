<?php



Route::get('/', function()
{
	if (isset($_GET['user'])) {
		$user=$_GET['user'];
		$userlink='?user='.$user;
	}
	else {
		$user='unregistered user';
		$userlink='';
	}
	return View::make('index')
	->with('user',$user)
	->with('userlink',$userlink)
	->with('title','Home');
});

Route::controller('charts','ChartsController');
