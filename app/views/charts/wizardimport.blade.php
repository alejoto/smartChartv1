@extends('layouts.base')

@section('content')
<div class="row-fluid">
	<div class="offset3 span6">
		<h1>CSV Import module</h1>
		<div class="hide" id="user_fromwizard">{{$user}}</div>
		<div class="hide" id="datasetfromwizard">{{$ds}}</div>
	</div>
</div>

<?php 
$handle = fopen($_FILES['filename']['tmp_name'], "r");
$data=($data=fgetcsv($handle, 2000, ","));
$i=0;

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

			<br>
			<button class="btn span11" id='upload_to_db1'>Start uploading data to the database</button>
			<div id="uploading_csv_wizard_template" class="hide">
				<img src="{{URL::to('assets/img/progressBar.gif')}}" alt="">
				Wait while file is being processed
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
			<br><br>
			<button class="btn span11" id='skip_template_choose_fields'>I want to select columns where each field will be saved</button>
			<br>
			<br>
		</div>
	</div>
	<div class="hide" id='choose_fields'>
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

<?php } else if(
$checker[0]=='Channel Id'
&&$checker[1]=='SERVICE AGREEMENT ID'
&&$checker[2]=='DATE OF THIS OBSERVATION'
&&$checker[3]=='UOM'
&&$checker[4]=='00:01-00:15 kW'
) {
?>
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
					Wait while file is being processed
					<br>
					<a href="{{URL::to('/charts/ds/'.$user)}}">Go to datasets</a>
				</div>
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
				while (($data=fgetcsv($handle, 2000, ","))!==false) {
					$i=0;
					$checker='';
					
					foreach ($data as $d){
						if ($i>3&&$i<100&&$data[3]=='KW') {
							$time=date('H:i:s',($i-4)*900);
							?>
							@if(trim($d)!='')
								{{$gnu.$data[2]}},{{$time}},,,,, <spam class="hide kw_previous_commas">,</spam>{{$d}},,,,,,,,, ,, ,, ,,, ,,, ,,,, ,,,
							@endif
							
							<?php 
							$gnu='~';
						}
						$i++;
						
					}
					
				}
				?>
				</div>
				<div id="kw_usage_template_data" class='hider'>
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
								{{$gnu.$data[2]}},{{$time}},,,,, ,<spam class="hide kw_previous_commas">,</spam>{{$d}},,,,,,,,, ,, ,, ,,, ,,, ,,,, ,,,
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

<?php
}
else //UNSPECIFIC "NO TEMPLATE-RELATED" CSV FILE
{?>
	Columns found on csv file : 
	<?php $comma=''; ?>
	@foreach($data as $d) {{-- Displaying available headers to be uploaded --}}
		{{$comma.str_replace(' ','_',$d)}}
		<?php $comma=','; ?>
	@endforeach
	
	<div id="order_of_columns" class='hide'> {{-- Sequence of columns in order to properly save data from csv file --}}
	<?php $comma=''; ?>
	@foreach($data as $d)
		{{$comma}}<spam id="sortable{{$d}}"></spam>
		<?php $comma=','; ?>
	@endforeach
	</div>
	
	<div id='sortable_data' class="hide" >
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
				</div>
			</div>
		</div>
		
		
		</div>
		<br><br>
	</div>
	<?php
	
}
?>

@stop
