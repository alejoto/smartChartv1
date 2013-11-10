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

	public function getMycharts() {
		$fields=array(
			array('ChWLDP',1),array('ChWLDSP',1),array('ChWRT',1),array('ChWST',1)
			,array('ChWSTSP',1),array('CCV',100),array('ConskWH',1),array('DAT',1)
			,array('DATSP',1),array('DSP',1),array('DSPSP',1),array('HCVS',100)
			,array('HWLDP',1),array('HWLDPSP',1),array('HWRT',1),array('HWST',1)
			,array('HWSTSP',1),array('MAT',1),array('OM',100),array('OADPS',100)
			,array('OAF',100),array('OAT',1),array('RAT',1),array('SFSpd',1)
			,array('SFS',1),array('VAVDPSP',100),array('ZDPS',100),array('ZOM',100)
			,array('ZRVS',100),array('ZT',1),array('ZONE',1),array('DAMPER',1)
		);


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
		return View::make('charts.mycharts')
		->with('user',$user)
		->with('userlink',$userlink)
		->with('title','Charts from XML')
		->with('fields',$fields)
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
