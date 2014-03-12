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


	
	public function getTable () {
		if (!isset($_GET['user'])) {
			return Redirect::to('/temp');
		}
		
		else {
			$title='Data table';

			//previous-next page
			$dslink='';
			if (isset($_GET['ds'])) {
				if (Dataset::whereId($_GET['ds'])->count()<1) {
					return Redirect::to('charts/ds?user='.$_GET['user']);
				}
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

	/*POST requests*/

	/*Add a new data set*/
	public function postDatasetnew () {
		$ds=$_POST['ds'];
		$user=$_POST['user'];
		if (Dataset::repeated($user,$ds)->count()>0) {
			return 0;
		}
		else {
			$dsr=new Dataset;
			$dsr->name=$ds;
			$dsr->user_id=$user;
			$dsr->save();
			return 1;
		}
			
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
		$ds=$_POST['id'];
		Buildingregister::activeds($ds)->delete();
		Dataset::find($ds)->delete();
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

				$r=1;
				while (($data=fgetcsv($handle, 1000, ","))!==false) //Iteration for each row
				{
					if ($r>1) //Skipping first (header) row
					{
						//Columns to be added: 35
						//Columns from csv file: all except dataset_id (32)
						$i=1;
						$import=array();
						foreach ($data as $d) //Iteration for each column
						{
							if ($i<36) {
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
										if ($column[1]!='Date') {
											$import[$column[$i]]=$d; //adding value to array for creating or updating
										}
										
									}
								}
								$i++;
							}	
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
				$r++;//Iteration for skipping first row
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

	public function postUploadcsvusage (){
		$ds=$_POST['ds'];//dataset id
		$user=$_POST['user'];
		if (isset($_POST['submit'])){
			if (is_uploaded_file($_FILES['filename']['tmp_name'])){
				$handle = fopen($_FILES['filename']['tmp_name'], "r");//opening file
				$r=1;
				while (($data=fgetcsv($handle, 1000, ","))!==false) //Iteration for each row
				{
					if ($r!=0) {//Skipping first (header) row
						$i=0;
						$day='';
						foreach ($data as $d) {
							if ($i!=0||$i!=1||$i!=3||$i!=100||$i!=101) {
								if ($i==2) {
									$day=$day.$d;
								}
								$time=date('H:i:s',($i-3)*900);

								$updatable=Buildingregister::existent($day,$time,$ds)->count();//checking if data already exist

								//saving if no exist
								if ($updatable==0&&$i>3) {
									$bur=new Buildingregister;
									$bur->dataset_id=$ds;
									$bur->datereading=$day;
									$bur->timereading=$time;
									$bur->a07kWusage=$d;
									$bur->save();
								}
									
							}
							
							$i++;
						}
					}
					$r++;//incrementing in order to skip first (header) row
				}
				return $day;
			}
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
