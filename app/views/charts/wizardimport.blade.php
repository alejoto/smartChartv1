@extends('layouts.base')

@section('content')
<div class="row-fluid">
	<div class="offset3 span6">
		<h1>CSV Import module</h1>
	</div>
</div>
<!-- <div class="row-fluid">
	<div class="span12 hide">Date and time format: before uploading data please choose the date format as it appears in your csv file</div>
</div> -->
<div class="row-fluid ">
	<div id='proper_date_format_reminder' class="offset2 span7 lead text-error ">
		<strong>Date values from the csv file must match format 'm/d/y'. If no, the csv file will not be properly parsed.</strong></div>
	<input type="hidden" id='dateformat_import' value='m,d,y'>
	<!-- <div class="span2"> 
		<select name="" id="dateformat_import" class="span8"> 
			<option value="m,d,y">mm dd yyyy (example 01-31-2011)</option>
			<option value="d,m,y">dd mm yyyy (example 31-01-2011)</option> 
			<option value="y,m,d">yyyy mm dd (example 2011-01-31)</option>
			<option value="y,d,m">yyyy dd mm (example 2011-31-01)</option>
		</select> 
	</div> -->
	<div class=" hide text-right">Time format</div>
	<div class=" hide"> 
		<select name="" id="timeformat_import" class="span8"> 
			<option value="ampm">HH:mm 24h</option>
			<option value="militar">hh:mm am/pm</option>
		</select>
	</div>
</div>

<div class="hide" id="user_fromwizard">{{$user}}</div>
<div class="hide" id="datasetfromwizard">{{$ds}}</div>

<?php $counter2=$linecount = count(file($_FILES['filename']['tmp_name']));
$handle = fopen($_FILES['filename']['tmp_name'], "r");

$data=($data=fgetcsv($handle, 2000, ","));
$i=0;
$count=count($data);


foreach ($data as $d) {
	$checker[$i]=$data[$i];
	$i++;
}

if(
$checker[0]=='Date'
&&$checker[1]=='Time'
&&$checker[2]=='Occupancy'
&&$checker[3]=='Outer temp'
&&$checker[4]=='Zone temp'
&&$checker[5]=='zone name'
&&$checker[6]=='energy consumption'
&&$checker[7]=='Kw demand'
&&$checker[8]=='Kw usage'
&&$checker[9]=='Zone reheat valve signal'
&&$checker[10]=='Discharch air temp'
&&$checker[11]=='Disch a. t. set point'
&&$checker[12]=='Duct static pressure'
&&$checker[13]=='Duct sp set point'
&&$checker[14]=='Mixed air temp'
&&$checker[15]=='Outdoor-air damper position signal'
&&$checker[16]=='Outdor-air fraction'
&&$checker[17]=='Return-air temp'
&&$checker[18]=='Fan speed'
&&$checker[19]=='Fan status'
&&$checker[20]=='Damper set point'
&&$checker[21]=='Damper position'
&&$checker[22]=='Heating-coil valve signal'
&&$checker[23]=='Hot water loop diferential pressure'
&&$checker[24]=='HWLDP set point'
&&$checker[25]=='Hot water return temp'
&&$checker[26]=='Hot water supply temp'
&&$checker[27]=='Hot water supply temp set point'
&&$checker[28]=='Chilled water loop differential pressure'
&&$checker[29]=='ChWLDP set point'
&&$checker[30]=='Chilled water return temp'
&&$checker[31]=='Chilled water supply temp'
&&$checker[32]=='ChWST set point'
&&$checker[33]=='Cooling-coil valve signal'
) { ?>
<div class="content-fluid">
	<div class="row-fluid" id='no_choose_as_it_comes_from_template'>
		<div class="offset3 span6 whitebox whitetext">
			Data structure matches with Excel template
			<br>
			@if($counter2<5000)
			<button class="btn span11" id='upload_to_db1'>Start uploading data to the database</button>
			<div id="uploading_csv_wizard_template" class="hide">
				<img src="{{URL::to('assets/img/progressBar.gif')}}" alt="">
				Wait while file is being processed
				<div class="lead text-error">Please wait while file is being processed - it may take several minutes</div>
			</div>
			<div id="generaltemplate_data" class="hide">
				<?php 
				$k=0;
				$column=array();//array with fields for importing data
				foreach (Bfield::all() as $f) {
				 	if ($f->name!='dataset_id') {
				 		$column[$k]=$f->name;
				 		$k++;
				 	}
				}
				$gnu='';//character for identifying new rows when exploding with php
				while (($data=fgetcsv($handle, 2000, ","))!==false) {
					$sum=0;
					foreach ($data as $d) {
						$sum=$sum+$d;
					}
					?>
					@if($sum!=0)
					{{$gnu}} 
					<?php $comma=''; ?>
					@foreach($data as $d)
						{{$comma.$d}}
						<?php $comma=','; ?>
					@endforeach
					@endif
					
					
						
					<?php
					$gnu='~';
				} ?>
			</div>
			@endif
			<a href="{{URL::to('charts/ds?user='.$user)}}" class="btn btn-danger canceluploading span11 " >
					<i class="icon-remove icon-white"></i>
					Cancel uploading data</a>
			<br><br>
			<button class="btn span11 hide" id='skip_template_choose_fields'>I want to select columns where each field will be saved</button>
			<br>
			<br>
		</div>
	</div>
	<div class="hide" id='choose_fields'>

		<div id="order_of_columns" class='hide'> {{-- Sequence of columns in order to properly save data from csv file --}}
		<?php $comma=''; ?>
		@foreach($checker as $d)
		<?php $d=str_replace(' ', '_', $d); ?>
			{{$comma}}<spam id="sortable{{$d}}"></spam>
			<?php $comma=','; ?>
		@endforeach
		</div>
		<hr>
		<button class="btn" id="cancel_choosing_each_target_column">Cancel</button>
		<br> <br>
		<?php $i=0; ?>
		<div class="row-fluid whitebox whitetext">
		@foreach(Bfield::all() as $b)
			@if($i==0)
				<div class="span4">
			@endif
			<div class="row">
				<div class="span6 text-right">{{$b->tooltip}}</div>
				<div class="span6">
					<select name="" id="" class='span12'>
						<option value=" ">Skip</option>
						@foreach($checker as $v)
							<option value="">{{$v}}</option>
						@endforeach
					</select>
				</div>
			</div>
				 <br>
			@if($i==11)
				</div>
			@endif
			<?php  $i++;  if ($i==12) {$i=0;} ?>
		@endforeach
		<?php 
		if ($i!=0) {
		 	echo '</div>';
		 } ?>
		
		<button class="btn span11">Start uploading</button>
		<div class="span12"></div>
		</div>
		<br><br>
	</div>
</div>
{{-- 
	|-----------------------------------------------------------------------------------------------------|
	|                                                                                                     |
	|    THIS SECTION CONTAINS THE IMPORT METHOD WHEN DETECTING DATA STRUCTURE AS ENERGY CONSUMPTION      |
	|                                                                                                     |
	|-----------------------------------------------------------------------------------------------------|
 --}}
<?php } else if(
$checker[0]=='Channel Id'
&&$checker[1]=='SERVICE AGREEMENT ID'
&&$checker[2]=='DATE OF THIS OBSERVATION'
&&$checker[3]=='UOM'
&&$checker[4]=='00:01-00:15 kW'
) {
?>
@if($counter2<35)
<div class="content-fluid">
	<div class="row-fluid">
		<div class="offset2">
			<div class="span8 whitebox whitetext">
				Uploaded file matches with kw consumption data.  You can insert data into the database as KW usage or demand.
				<br>

				<button class="btn span6" id='upload_as_kw_usage'>Insert as KW usage</button>
				<br>
				<br>
				<button class="btn span6" id='upload_as_kw_demand'>Insert as KW demand</button>
				<br>
				<div id="uploading_csv_wizard_template" class="hide">
					<img src="{{URL::to('assets/img/progressBar.gif')}}" alt="">
					<spam class="lead ">Please wait while file is being processed - it may take several minutes</spam>
					<br>
					<a href="{{URL::to('/charts/ds?user='.$user)}}">Go to datasets</a>
				</div>
				<br>
				<a href="{{URL::to('charts/ds?user='.$user)}}" class="btn btn-danger canceluploading span6 " >
					<i class="icon-remove icon-white"></i>
					Cancel uploading data</a>

				<div id="kw_template_data" class='hide'>
				<?php  
				$k=0;
				$column=array();//array with fields for importing data
				foreach (Bfield::all() as $f) {
				 	if ($f->name!='dataset_id') {
				 		$column[$k]=$f->name;
				 		$k++;
				 	}
				}
				$gnu='';
				$rows=0;
				while (($data=fgetcsv($handle, 2000, ","))!==false) {
					$i=0;
					$checker='';
					$rows++;
					
					foreach ($data as $d){
						if ($i>3&&$i<100&&$data[3]=='KW') {
							$time=date('H:i:s',($i-4)*900);
							?>
							@if(trim($d)!='')
								{{$gnu.$data[2]}},{{$time}},,,,, <spam class="hide kw_previous_commas">,</spam>{{$d}},,,,,,,,,,,,,,,,,,,,,,,,,,
							@endif
							
							<?php 
							$gnu='~';
						}
						$i++;
					}
				}
				?>
				</div>
				<div id="kw_usage_template_data" class='hide'>
				<?php  
				$k=0;
				$column=array();//array with fields for importing data
				foreach (Bfield::all() as $f) {
				 	if ($f->name!='dataset_id') {
				 		$column[$k]=$f->name;
				 		$k++;
				 	}
				}
				$gnu='';
				while (($data=fgetcsv($handle, 2000, ","))!==false) {
					$i=0;
					$checker='';
					
					foreach ($data as $d){
						if ($i>3&&$i<100&&$data[3]=='KW') {
							$time=date('H:i:s',($i-4)*900);
							?>
							@if(trim($d)!='')
								{{$gnu.$data[2]}},{{$time}}, , , , , ,<spam class="hide kw_previous_commas">,</spam>{{$d}} , , , , , , , , , , , , , , , , , , , , , , , , , ,
							@endif
							
							<?php 
							$gnu='~';
						}
						$i++;
						
					}
					
				}
				?>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>
@else
<div class="row-fluid">
	<div id="morethan31daysdata" class="offset2 span8 lead text-error">Sorry, file contains more than 31 days data. You can only import data corresponding to one month. Split your file into two or more files, each one containing one month data. Then import them one by one.</div>
</div>
<div class="row-fluid">
	<div class="offset2 span8">
		<a href="{{URL::to('charts/ds?user='.$user)}}" class="btn btn-danger span12">Go back to datasets</a>
	</div>
</div>

@endif
<?php
}
else //UNSPECIFIC "NO TEMPLATE-RELATED" CSV FILE
{?>
	{{-------------------------------------------------------------------
	|
	|
	|  Wizard import data: file not created from predefined template
	|
	|
	 --------------------------------------------------------------------}}
	@if($counter2<5000)
	<h4>
	Columns found in csv file : 
	<?php $comma=''; $i_data=0;?>

	@foreach($data as $d) {{-- Displaying available headers to be uploaded --}}
		{{$comma.str_replace(' ','_',$d)}}
		<?php 
		$comma=','; 
		$data[$i_data]=str_replace(' ','_',$data[$i_data]);
		$i_data++;
		?>
	@endforeach
	</h4>
	
	
	<div id="order_of_columns" class='hide'> {{-- Sequence of columns in order to properly save data from csv file --}}
	<?php $comma=''; ?>
	@foreach($data as $d)
		{{$comma}}<spam id="sortable{{$d}}"></spam>
		<?php $comma=','; ?>
	@endforeach
	</div>
	
	<div id='generaltemplate_data' class="hide" >
	<?php 
	$gnu='';
	while (($data1=fgetcsv($handle, 2000, ","))!==false) {
		?>
			{{$gnu}}
			<?php $comma=''; ?>
			@foreach($data1 as $d)
				{{$comma.$d}}
				<?php $comma=','; ?>
			@endforeach
			<?php $gnu='~'; ?>
		<?php
	}
	?>
	</div>
	<div class="" id='choose_fields'>
		<br> 
		<?php $i=0; ?>
		<div class="row-fluid whitebox whitetext">
		@foreach(Bfield::all() as $b)
			@if($i==0)
				<div class="span4">
			@endif
			<?php 
			if ($b->name=='datereading'||$b->name=='timereading')  { 
				$mssg='required';
				$hide=''; }
			else {
				$mssg='skip';
				$hide='hide';}
			?>
			@if($b->name!='dataset_id')
				<div class="row {{$hide}} selectable{{$mssg}}">
					<div class="span6 text-right">{{$b->tooltip}}</div>
					<div class="span6">
						<select name="" id="selectable{{$b->id}}" class='span12 selectable' position='{{$b->name}}' columnto>
							<option value="">{{$mssg}}</option>
							@foreach($checker as $v)
								<option value="{{$v}}">{{$v}}</option>
							@endforeach
						</select>
					</div>
				</div>
			@endif
				
				 
			@if($i==11)
				</div>
			@endif
			<?php  $i++;  if ($i==12) {$i=0;} ?>
		@endforeach
		<?php 
		if ($i!=0) {
		 	echo '</div>';
		 } ?>
		<div class="row-fluid">
			<div class="offset2 span8 ">
				<button id='send_to_db_from_notemplatecsv' class="btn span12 hide selectableskip">Start uploading</button>
				<div id="uploading_csv_notemplate" class="hide">
					<img src="{{URL::to('assets/img/progressBar.gif')}}" alt="">
					Wait while file is being processed
					<div class="lead text-error">Please wait while file is being processed - it may take several minutes</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row-fluid">
			<div class="offset2 span8">
				<a href="{{URL::to('charts/ds?user='.$user)}}" class="btn btn-danger canceluploading span12 " >
					<i class="icon-remove icon-white"></i>
					Cancel uploading data</a>
			</div>
		</div>
		
		
		</div>
		<br><br>
	</div>
	@else
	<div class="lead text-error">Sorry, you can not import more than 5000 rows in one dataset.  Datasets should contain data from one month.</div>
	

	<div class="row-fluid">
			<div class=" span12">
				<a href="{{URL::to('charts/ds?user='.$user)}}" class="btn btn-danger canceluploading span12 " >
					<i class="icon-remove icon-white"></i>
					Cancel uploading data</a>
			</div>
		</div>
	@endif
	<?php
	
}
?>

@stop
