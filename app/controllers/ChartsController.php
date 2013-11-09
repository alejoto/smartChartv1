<?php

class ChartsController extends BaseController {
	public function getIndex() {
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
		->with('title','Home page');
	}

	public function getChapters() {
		if (isset($_GET['user'])) {
			$user=$_GET['user'];
			$userlink='?user='.$user;
		}
		else {
			$user='unregistered user';
			$userlink='';
		}
		$chapter=Chapter::orderBy('id')->get();
		return View::make('charts.chapters')
		->with('chapter',$chapter)
		->with('user',$user)
		->with('userlink',$userlink)
		->with('title','Chapters');
	}

	public function getData() {
		if (isset($_GET['user'])) {
			$user=$_GET['user'];
			$userlink='?user='.$user;
		}
		else {
			$user='unregistered user';
			$userlink='';
		}
		return View::make('charts.data')
		->with('user',$user)
		->with('userlink',$userlink)
		->with('title','Manage data');
	}

	public function getChart() {
		if (isset($_GET['user'])) {
			$user=$_GET['user'];
			$userlink='?user='.$user;
		}
		else {
			$user='unregistered user';
			$userlink='';
		}
		/*
		|
		| Giving Measurement data to $data variable
		*/
		$data=Measurement::orderBy('DATE_READING')
		->orderBy('TIME_READING');
		$chart=Chart::orderBy('chartname')->get();
		return View::make('charts.charting')
		->with('user',$user)
		->with('userlink',$userlink)
		->with('title','Charts from XML')
		->with('data',$data)
		->with('chart',$chart);
	}

	public function getLog () {
		return View::make('temporaryloguser')
		->with('user','')
		->with('userlink','')
		->with('title','Log in');
		
	}




	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('charts.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('charts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('charts.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('charts.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
