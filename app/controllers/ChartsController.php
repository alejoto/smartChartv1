<?php
class dateformatfix{
	//public $fixeddate;
	public function fixdate($date,$format){
		$date=trim($date);
		$fixeddate=str_replace('/','-',$date);//unify data syntax separator as '-'.
		$dateclean=explode('-',$fixeddate);//separating each date component
		$preformatdate=array();
		$i=0;
		foreach ($format as $f) {
			$preformatdate[$f]=trim($dateclean[$i]);
			$i++;
		}
		// Adding "20" if date year digits = 2
		if (strlen($preformatdate['y'])==2) {
			$preformatdate['y']='20'.$preformatdate['y'];
		}
		$conversion1=strtotime($preformatdate['y'].'-'.$preformatdate['m'].'-'.$preformatdate['d']);
		$conversion2=date('Y-m-d',$conversion1);

		return $conversion2;
	}
}

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
			$ds='';
			if (isset($_GET['ds'])) {
				if (Dataset::whereId($_GET['ds'])->count()<1) {
					return Redirect::to('charts/ds?user='.$_GET['user']);
				}
				$dslink='&ds='.$_GET['ds'];
				$ds=$_GET['ds'];
			}


			$page=0;
			$previous='';
			$prevpage=0;
			$nextpag=10;
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
			return View::make('charts.table',compact('title','user','previous','next','page','ds'));
		}
		
	}

	public function getCharts () {
		if (!isset($_GET['user'])) {
			return Redirect::to('temp');
		}
		else {
			$ds='';
			$user=$_GET['user'];
			$title='Charts';
			if (isset($_GET['ds'])) {
				$ds=$_GET['ds'];
				if (Dataset::active($_GET['ds'])->first()->buildingregister->count()==0) 
				{
					return Redirect::to(URL::to('charts/table?user='.$_GET['user'].'&ds='.$_GET['ds'].'&mssg=2'));
				}
				else
				{
					
					return View::make('charts.mycharts3',compact('title','user','ds'));
				}
			} 
			else {
				return View::make('charts.mycharts3',compact('title','user','ds'));
			}
					
		}
	}

	public function getWz () {
		if (!isset($_GET['user'])) {
			return Redirect::to('temp');
		}else {
			$user=$_GET['user'];
			return Redirect::to('charts/ds?user='.$user);
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
		//$id=$_POST['id'];
		$editdata=$_POST['editdata'];
		$id=$_POST['dataid'];
		$datacolumn=$_POST['datacolumn'];
		$upd=array(
			$datacolumn=>$editdata
			);
		Buildingregister::find($id)->update($upd);
		return 1;
	}

	public function postWz () {
		$user=$_POST['user'];
		$ds=$_POST['dataset'];
		$title='Import wizard';
		if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
			return View::make('charts.wizardimport',compact('user','ds','title'));
		}
		else {
			return Redirect::to('charts/ds?user='.$user.'&mssg=1');
		} 
	}

	/*
	| Function:		postWizard1()
	| Description: 	Data coming from 
	|
	|
	*/
	public function postWizard3 () {
		$ds=$_POST['ds'];
		$data=$_POST['data'];


		//columns adjustment
		$k=0;
		$column=array();
		foreach (Bfield::all() as $f) {
		 	if ($f->name!='dataset_id') {
		 		$column[$k]=$f->name;
		 		$k++;
		 	}
		}
		$savingdata_limit=5000-Buildingregister::whereDataset_id($ds)->count();
		$data=explode('~',$data);//First array conversion
		$i=0;
		$newregister=array();//setting new array that will contain whole bunch of data
		//that will be added as new records at once
		foreach ($data as $d) {
			$data[$i]=explode(',', $d);//Second array conversion
			//
			$j=0;
			if (isset($_POST['usage'])) {
				$data[$i][8]=$data[$i][7];
				$data[$i][7]='';
			}

			//Checking if dataset id, date and time already exist.
			//If yes data will be updated, otherwise a new register will be created


			$date=date('Y/m/d',strtotime($data[$i][0]));//Date conversion 
			$date=date_format(date_create($date),'Y/m/d');

			
			$time=date('H:i:s',strtotime($data[$i][1]));//Time conversion as h:m:s 24hrs format
			$updatable=Buildingregister::existent($date,$time,$ds);

			$emptyblocker1=date('Y/m/d',strtotime(''));

			if (trim($data[$i][0])!=''&&$date!=$emptyblocker1&&$date!='0000/00/00'&&$date!='1970-01-01'&&$date!='0000-00-00') {
				if ($updatable->count()==0) //Saving as new register if data does not exist
				{
					if ($savingdata_limit>0) {
						$inner_register=array();
						$inner_register['dataset_id']=$ds;
						$inner_register['datereading']=$date;
						foreach ($column as $c) {
							if ($c=='timereading') {
								$data[$i][$j]=date('H:i:s',strtotime($data[$i][$j])) //Time conversion as h:m:s 24hrs format
								;
							}
							$inner_register[$c]=trim($data[$i][$j]);
							
							$j++;
						}
						$savingdata_limit=$savingdata_limit-1;
					}
					
						

				}
				else {//update as register already exist
					$id=$updatable->first()->id;
					$update=array();
					foreach ($column as $c) {

						if (trim($data[$i][$j])!='') {//updating only values with no empty data
							$update[$c]=trim($data[$i][$j]);
						}
						
						$j++;
					}
					Buildingregister::find($id)->update($update);
					unset($update);//cleaning import array for new data update
				}
			}
				
			$i++;
			
			if(isset($inner_register)) {
				array_push($newregister,$inner_register);
				unset($inner_register);
			}
		}
		if (count($newregister)>0) {
			Buildingregister::insert($newregister);
		}
		if ($savingdata_limit==0) {
			return 2;
		}
		else {
			return //var_dump($newregister)
			1
			;
		}
		
		
	}

	/*
	| Function:		postWizard1()
	| Description: 	Saves data from Kw csv file
	|
	*/
	public function postWizard1 () {
		$ds=$_POST['ds'];
		$data=$_POST['data'];

		//columns adjustment
		$k=0;
		$column=array();
		foreach (Bfield::all() as $f) {
		 	if ($f->name!='dataset_id') {
		 		$column[$k]=$f->name;
		 		$k++;
		 	}
		}

		$savingdata_limit=5000-Buildingregister::whereDataset_id($ds)->count();
		$data=explode('~',$data);//First array conversion
		$i=0;
		$newregister=array();//setting new array that will contain whole bunch of data
		//that will be added as new records at once
		foreach ($data as $d) {
			$data[$i]=explode(',', $d);//Second array conversion
			//
			$j=0;
			if (isset($_POST['usage'])) {
				$data[$i][8]=$data[$i][7];
				$data[$i][7]='';
			}

			//Checking if dataset id, date and time already exist.
			//If yes data will be updated, otherwise a new register will be created


			$date=date('m/d/Y',strtotime($data[$i][0]));//Date conversion 
			$date=date_format(date_create($date),'Y/m/d');

			
			$time=date('H:i:s',strtotime($data[$i][1]));//Time conversion as h:m:s 24hrs format
			$updatable=Buildingregister::existent($date,$time,$ds);
		
			if ($updatable->count()==0) //Saving as new register if data does not exist
			{
				if ($savingdata_limit>0) {
					$inner_register=array();
					$inner_register['dataset_id']=$ds;
					$inner_register['datereading']=$date;
					foreach ($column as $c) {
						if ($c=='timereading') {
							$data[$i][$j]=date('H:i:s',strtotime($data[$i][$j])) //Time conversion as h:m:s 24hrs format
							;
						}
						if ($c=='timereading'||$c=='a07kWusage'||$c=='a06kWdemand') {
							$inner_register[$c]=trim($data[$i][$j]);
						}
						
						$j++;
					}
					$savingdata_limit=$savingdata_limit-1;
					
				}
				//else {return 2;}
					

			}
			else {//update as register already exist
				$id=$updatable->first()->id;
				$update=array();
				foreach ($column as $c) {

					if ($c=='a07kWusage'||$c=='a06kWdemand'){
						if (trim($data[$i][$j])!='') {//updating only values with no empty data
							$update[$c]=trim($data[$i][$j]);
						}
					}
					
					$j++;
				}
				Buildingregister::find($id)->update($update);
				unset($update);//cleaning import array for new data update
			}
			$i++;
			
			if(isset($inner_register)) {
				array_push($newregister,$inner_register);
				unset($inner_register);
			}
		}
		if (count($newregister)>0) {
			Buildingregister::insert($newregister);
		}

		if ($savingdata_limit==0) {
		 	return 2;
		} else {return //var_dump($newregister)
			1
			;
		}
		
		
	}


	/*
	| Name: 		postWizard2
	| Description: 	Data imported from no-template source
	| Triggered? 	Yes: #send_to_db_from_notemplatecsv
	*/
	public function postWizard2 () {
		$header=$_POST['header'];//csv data header names
		$header=explode(',', $header);

		$values=$_POST['values'];//csv data values
		$values=explode('~', $values);

		$ds=$_POST['ds'];//building dataset which values belong to

		$df=trim($_POST['df']);//date column format
		$df=explode(',',$df);

		$tf=$_POST['tf'];//time format

		$savingdata_limit=5000-Buildingregister::whereDataset_id($ds)->count();

		$newregister=array();//setting new array that will contain whole bunch of data

		$idt=0;//idt= iterator for date and time
		foreach ($header as $h) {
			if (trim($h)=='datereading') {
				$dp=$idt;//$dp = date position inside array
			}
			else if (trim($h)=='timereading') {
				$tp=$idt;//$tp = time position inside array
			}
			$idt++;
		}
		$i=0;
		foreach ($values as $v) {
			$values[$i]=explode(',', $v);
			$j=0;
			//update if exists
			$date=trim($values[$i][$dp]);
			$convert=new dateformatfix;
			$date=$convert->fixdate($date,$df);
			$time=trim($values[$i][$tp]);
			$time=strtotime($time);//string to time as decimal number
			$time=date('H:i:s',$time);//Time conversion as h:m:s 24hrs format
			$updatable=Buildingregister::existent($date,$time,$ds);
			if ($updatable->count()==0) {
				if ($savingdata_limit>0) {
					$inner_register=array();
					$inner_register['dataset_id']=$ds;
					/*$register=new Buildingregister;
					$register->dataset_id=$ds;*/
					foreach ($header as $h) {
						$h=trim($h);
						if ($h!='') {
							if ($h=='datereading') {
								$inner_register[$h]=$date;
							}
							else if ($h=='timereading') {
								$inner_register[$h]=date('H:i:s',strtotime(trim($values[$i][$j]))); //Time conversion as h:m:s 24hrs format
							}
							else {
								$inner_register[$h]=trim($values[$i][$j]);
							}
							
						}
						$j++;
					}
					//$register->save();
					$savingdata_limit=$savingdata_limit-1;
				}
					
			}
			else {
				$update=array();
				$iu=0;//iu=iterator for update
				foreach ($header as $h) {
					$h=trim($h);
					if ($h!='') {
						if ($h=='datereading') {
							$update[$h]=$date;
						} else {
							$update[$h]=trim($values[$i][$iu]);
						}
					}
					$iu++;
				}
				$updatable->first()->update($update);
			}
			$i++;
			if(isset($inner_register)) {
				array_push($newregister,$inner_register);
				unset($inner_register);
			}
		}
		if (count($newregister)>0) {
			Buildingregister::insert($newregister);
		}
		if($savingdata_limit==0){return 2;} else {return 1;}
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
