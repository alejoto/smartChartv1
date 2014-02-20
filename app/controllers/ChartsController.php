<?php

class ChartsController extends BaseController {


	/*
	* Controller for creating, editing and deleting datasets
	*/
	public function getDS () 
	{
		if (!isset($_GET['user'])) {
			return Redirect::to('/temp');
		}
		else {
			$title='Datasets';
			$userlink='';
			$user=$_GET['user'];
			return View::make('charts.datasets',
				compact(
					'title'
					,'userlink'
					,'user'
					)
				);
		}
	}
	/*
	|
	| URL: charts/chapters
	| Content: Chapters with corresponding charts names
	*/
	public function getChp () {
		$title='View chapters';
		if (!isset($_GET['user'])) {
			return Redirect::to('/temp');
		}
		else {
			$user=$_GET['user'];
			return View::make('charts.chp',compact('title','user'));
		}
		
	}

	/*  DEPRECATED: pending to remove
	public function getChapters() {
		$pages=array();
		foreach (Page::all() as  $v) {
			$pages[$v->pagename]=$v->pagedescription;
		}

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

		->with('pages',$pages)
		->with('chapter',$chapter)
		->with('user',$user)
		->with('userlink',$userlink)
		->with('title','Chapters');
	}
	*/
	/*
	|
	| URL: charts/data
	| Content: Table with whole data
	*/

	/*  DEPRECATED: pending to remove
	public function getData() {
		$pages=array();
		foreach (Page::all() as  $v) {
			$pages[$v->pagename]=$v->pagedescription;
		}
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
		->with('pages',$pages)
		->with('column',$column)
		->with('previous',$previous)
		->with('next',$next)
		->with('page',$page)
		->with('data',$data)
		->with('title','Manage data');
	}
	*/
	public function getTable () {
		if (!isset($_GET['user'])) {
			return Redirect::to('/temp');
		}
		else {
			$title='Data table';

			//previous-next page
			$dslink='';
			if (isset($_GET['ds'])) {
				$dslink='&ds='.$_GET['ds'];
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

			$previous='charts/table?user='.$_GET['user'].$dslink.'&page='.$prevpage;
			$previous=URL::to($previous);

			$next='charts/table?user='.$_GET['user'].$dslink.'&page='.$nextpag;
			$next=URL::to($next);

			$user=$_GET['user'];
			return View::make('charts.table',compact('title','user','previous','next','page'));
		}
		
	}

	public function getCharts () {
		if (!isset($_GET['user'])) {
			return Redirect::to('temp');
		}
		else {
			$user=$_GET['user'];
			$title='Charts';
			return View::make('charts.mycharts3',compact('title','user'));
		}
	}

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
		->with('title','Charts')
		->with('fields',$fields)
		->with('data',$data)
		->with('chart',$chart);
	}

	/* DEPRECATED: pending to remove
	public function getMycharts2() {
		$pages=array();
		foreach (Page::all() as  $v) {
			$pages[$v->pagename]=$v->pagedescription;
		}


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

		$setofdata=array(
		1=>array('ZT','ZRVS','ZOM')
		,2=>array('ZT','ZRVS','OAT')
		,3=>array('MAT','OADPS','OAF','OAT','RAT')
		,4=>array('OAT','OADPS','OAF')
		,5=>array('OAT','RAT','OADPS')
		,6=>array('OAT','OADPS')
		,7=>array('CCV','DATSP','OADPS','OAT')
		,8=>array('CCV','OADPS','OAT')
		,9=>array('CCV','OADPS')
		,10=>array('DAT','MAT','OAT','RAT')
		,11=>array('CCV','HCVS','OAT')
		,12=>array('ChWST','OAT')
		,13=>array('ChWST','CCV','OAT')
		,14=>array('ChWRT','ChWST','OAT')
		,15=>array('ChWRT','CCV')
		,16=>array('HWST','OAT')
		,17=>array('HWRT','HWST','OAT')
		,18=>array('HWLDP','HCVS')
		,19=>array('OAT','OADPS','OAF','OM')
		,20=>array('OAT','OADPS','OM')
		,21=>array('DSP','DSPSP')
		,22=>array('DSP')
		,23=>array('VAVDPSP')
		,24=>array('DAT','DATSP')
		,25=>array('DAT','DATSP','OAT')
		,26=>array('ZRVS')
		,27=>array('DSP')
		,28=>array('SFS')
		);

		$chartsparamhead1=array('mscol','axislocation','descriptcol','charttype');

		if (isset($_GET['chart'])) {$chooser=$_GET['chart'];} else {$chooser='';}

		if (isset($_GET['user'])) {
			$user=$_GET['user'];
			$userlink='?user='.$user;
		}
		else {
			$user='unregistered user';
			$userlink='';
		}
		
		 //Giving Measurement data to $data variable
		
		$data=Measurement::orderBy('DATE_READING')
		->orderBy('TIME_READING');
		$chart=Chart::orderBy('chartname')->get();
		return View::make('charts.mycharts2')
		->with('user',$user)
		->with('userlink',$userlink)
		->with('pages',$pages)
		->with('title','Charts')
		->with('fields',$fields)
		->with('chooser',$chooser)
		->with('setofdata',$setofdata)
		->with('chartsparamhead1',$chartsparamhead1)
		->with('data',$data)
		->with('chart',$chart);
	}*/

	/*POST requests*/

	/*Add a new data set*/
	public function postDatasetnew () {
		$ds=$_POST['ds'];
		$user=$_POST['user'];
		$dsr=new Dataset;
		$dsr->name=$ds;
		$dsr->user_id=$user;
		$dsr->save();
		return 1;
	}

	/*Rename dataset*/
	public function postDatasetrename () {
		$name=$_POST['name'];
		Dataset::find($_POST['id'])->update(
			//array('name'=>$name)
			compact('name')
			);
		return 1;
	}

	/*Delet a dataset*/
	public function postDatasetdelete () {
		Dataset::find($_POST['id'])->delete();
		return 1;
	}


	/*Delete measurements register*/

	public function postDeleterow () {
		Buildingregister::find($_POST['id'])->delete();
		return 1;
	}

	public function postCelledition () {
		$editdata=$_POST['editdata'];
		$id=$_POST['dataid'];
		$datacolumn=$_POST['datacolumn'];
		$upd=array(
			$datacolumn=>$editdata
			);
		Buildingregister::find($id)->update($upd);
		return 1;
	}

	

	public function postUploadcsv () {
		$ds=$_POST['ds'];//dataset id
		$user=$_POST['user'];
		if (isset($_POST['submit'])) {
			if (is_uploaded_file($_FILES['filename']['tmp_name'])) //verifying not empty uploading
			{
				$handle = fopen($_FILES['filename']['tmp_name'], "r");//opening file

				$column='';
				foreach (Bfield::get() as  $v) {
					$column[$v->id]=$v->name;
				}//All column names added to $column array except dataset_id

				
				while (($data=fgetcsv($handle, 1000, ","))!==false) //Iteration for each row
				{
					//Columns to be added: 33
					//Columns from csv file: all except dataset_id (32)
					$i=1;
					$import=array();
					foreach ($data as $d) //Iteration for each column
					{

						$currentcol=$column[$i];
						if ($column[$i]=='dataset_id') //skipping dataset_id field
						{
							$i++;
						}

						

						//Retrieving date and time of reading for each row
						//If existent on the DB table plus same dataset 
						//update will be performed
						if ($currentcol=='datereading') {
							$date=$d;//setting $date variable for checking if register exists 
							if ($date!='') {
								$import[$column[$i]]=$date;//Adding date to array 
							}
						}
						if ($currentcol=='timereading') {
							$time=$d;//setting $time variable for checking if register exists 
							if ($time!='') {
								$import[$column[$i]]=$time;//Adding time to array 
							}
						}
						if ($i>2&&($date==''||$time==''))//cleaning $import array if date and or time have no value
						{
							unset($import);//cleaning import array
							$import=array();//cleaning import array
							$date='';//resetting variable as empty
							$time='';//resetting variable as empty
						}

						if ($i>2&&$date!=''&&$time!='') //skipping row with no date and or time
						{
							if ($d!='') //skipping empty fields
							{
								$import[$column[$i]]=$d; //adding value to array for creating or updating
							}
						}
						

						$i++;
					}
					if (count($import)>0)//skipping empty rows (for data with no date or time).
					{
						//Columns to check for update instead of new register:
						// * timereading
						// * datereading
						// * dataset_id
						$updatable=Buildingregister::existent($date,$time,$ds);
						if ($updatable->count()>0) //action to be done= update
						{
							//$import[colum]=data;
							$updatable->first()->update($import);
						}
						else //action to be done= new register
						{
							$row=new Buildingregister;
							$row->dataset_id=$ds;
							foreach ($import as $k => $v) {
								$row->$k=$v;
							}
							$row->save();
						}
					}	
						
				}

				$import_result= 0;//succesful uploading 
			}
			else {
				$import_result=1;//No file was selected
			}
			$title='Data table';
			return View::make('charts.table',compact('title','user','ds','import_result'));
		}

		
	}

	public function postUpload () {
		$user=$_GET['user'];
		$column=array(
			'id','data_id','user_id','entered_at','changed_at','DATE_READING','TIME_READING','ChWLDP' ,'ChWLDSP' ,'ChWRT' ,'ChWST','ChWSTSP' ,'CCV' ,'ConskWH' ,'DAT','DATSP' ,'DSP' ,'DSPSP' ,'HCVS','HWLDP' ,'HWLDPSP' ,'HWRT' ,'HWST','HWSTSP' ,'MAT' ,'OM' ,'OADPS','OAF' ,'OAT' ,'RAT' ,'SFSpd','SFS' ,'VAVDPSP' ,'ZDPS' ,'ZOM','ZRVS' ,'ZT' ,'ZONE' ,'DAMPER','created_at','updated_at');
		if (isset($_POST['submit'])) {

			if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
			}
			$handle = fopen($_FILES['filename']['tmp_name'], "r");
			
			while (($data=fgetcsv($handle, 1000, ","))!==false) {
				$savingdata=array();
				$longdata='';
				$i=0;
				$maxdata_id=Measurement::where('user_id','=',$user)->max('data_id')+1;
				$addrow=new Measurement();
				foreach ($data as $k => $v) {
					if ($column[$i]=='user_id') {
						$addrow->$column[$i]=$user;
					}
					else if($column[$i]=='data_id') {
						$addrow->$column[$i]=$maxdata_id;
					}
					else if ($column[$i]=='id') {
						$addrow->$column[$i]='';
					}
					else if ($column[$i]=='created_at') {
						$addrow->$column[$i]='';
					}
					else if ($column[$i]=='updated_at') {
						$addrow->$column[$i]='';
					}
					else {
						$addrow->$column[$i]=$v;
					}
					$longdata=$longdata.'$newobject->'.$column[$i].'='.$v.';';
					$i++;
				}
				$addrow->save();
			}
			fclose($handle);
			$back='charts/data?user='.$user;
			return Redirect::to($back);
		}
	}

	public function postAnewrow() {
		$dataset=$_POST['dataset'];
		$datereading=$_POST['datereading'];
		$timereading=$_POST['timereading'];
		$data=$_POST['datatobesent'];
		$datakeys=$_POST['datakeys'];
		$modelkey=array();
		$modelval=array();
		//Data cannot be repeated -same date, time & dataset-. If exists new register will not be created.
		if (Buildingregister::existent($datereading,$timereading,$dataset)->count()>0) {
			return 0;
		}
		else {
			$newr=new Buildingregister;
			$newr->datereading=$datereading;
			$newr->timereading=$timereading;
			$newr->dataset_id=$dataset;
			$i=0;
			foreach ($data as $v) {
				$newr->$datakeys[$i]=$v;
				$i++;
			}
			$newr->save();
			return 1;
		}
	}
	
	/*
	|
	| URL: charts/mycharts
	| Content: charts.  One chart at any given time.  Can be easily changed
	| from left menu or chapters page 
	*/
	

	/*
	| Deprecated 
	*/
	public function getIndex() 	{ return Redirect::to('/temp'); }//deprecated
	public function getLog ()  { return Redirect::to('/temp'); }//deprecated
}
