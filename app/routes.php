<?php



Route::get('/', function()
{
	//
	$linktopreffix='/charts/';
	$pages=array(
	'chapters'	=>'View course chapters'
	,'data'		=>'Manage building data'
	,'mycharts'	=>'Charts'
	);

	if (isset($_GET['user'])) {
		$user=$_GET['user'];
		$userlink='?user='.$user;
	}
	else {
		$user='unregistered user';
		$userlink='';
	}
	return View::make('index')
	->with('linktopreffix',$linktopreffix)
	->with('pages',$pages)
	->with('user',$user)
	->with('userlink',$userlink)
	->with('title','Home');
});

Route::controller('charts','ChartsController');
