<?php

class ChartsController extends BaseController {
	/*
	|
	| URL: charts/
	| Content: basic index
	*/
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
	/*
	|
	| URL: charts/chapters
	| Content: Chapters with corresponding charts names
	*/
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
	/*
	|
	| URL: charts/data
	| Content: Table with whole data
	*/
	public function getData() {
		$data='';
		$column=array(
			'ChWLDP' ,'ChWLDSP' ,'ChWRT' ,'ChWST'
			,'ChWSTSP' ,'CCV' ,'ConskWH' ,'DAT'
			,'DATSP' ,'DSP' ,'DSPSP' ,'HCVS'
			,'HWLDP' ,'HWLDPSP' ,'HWRT' ,'HWST'
			,'HWSTSP' ,'MAT' ,'OM' ,'OADPS'
			,'OAF' ,'OAT' ,'RAT' ,'SFSpd'
			,'SFS' ,'VAVDPSP' ,'ZDPS' ,'ZOM'
			,'ZRVS' ,'ZT' ,'ZONE' ,'DAMPER'
			);
		if (isset($_GET['user'])) {
			$user=$_GET['user'];
			$userlink='?user='.$user;
			$data=Measurement::where('user_id','=',$user)
			->orderBy('DATE_READING')
			->orderBy('TIME_READING');
		}
		else {
			$user='unregistered user';
			$userlink='';
		}
		$page=0;
		$previous='';
		$prevpage=0;
		$nextpag=0;

		if (isset($_GET['page'])) {
			$page=$_GET['page'];
			$nextpag=$page+10;
			if ($page>0) {
				$prevpage=$page-10;
				if ($prevpage<0) {
					$prevpage=0;
				}
			}
			else $prevpage=0;
		}
		$previous='charts/data'.$userlink.'&page='.$prevpage;
		$previous=URL::to($previous);

		$next='charts/data'.$userlink.'&page='.$nextpag;
		$next=URL::to($next);
		
			
		return View::make('charts.data')
		->with('user',$user)
		->with('userlink',$userlink)
		->with('column',$column)
		->with('previous',$previous)
		->with('next',$next)
		->with('page',$page)
		->with('data',$data)
		->with('title','Manage data');
	}
	/*
	|
	| URL: charts/chart  ->deprecated
	| Content: 6 charts
	| As building charts cosume many hardware resources 
	| this page has been declared as deprecated.
	| Replaced by page shown at charts/mycharts
	*/
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
	/*
	|
	| URL: charts/mycharts
	| Content: charts.  One chart at any given time.  Can be easily changed
	| from left menu or chapters page 
	*/
	public function getMycharts() {
		$fields=array(
			array('ChWLDP',1),array('ChWLDSP',1),array('ChWRT',1),array('ChWST',1)
			,array('ChWSTSP',1),array('CCV',100),array('ConskWH',1),array('DAT',1)
			,array('DATSP',1),array('DSP',1),array('DSPSP',1),array('HCVS',100)
			,array('HWLDP',1),array('HWLDPSP',1),array('HWRT',1),array('HWST',1)
			,array('HWSTSP',1),array('MAT',1),array('OM',100),array('OADPS',100)
			,array('OAF',1),array('OAT',1),array('RAT',1),array('SFSpd',1)
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
	
}
