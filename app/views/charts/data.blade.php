@extends('layouts.base')

@section('content')
<?php 
if (isset($_GET['user'])) {
 	$user=$_GET['user'];
 } else {
 	$user='unregistered user';
 }
 ?>


@if(isset($_GET['user']))
<?php 
$action='charts/upload?user='.$user;
$action=URL::to($action);
 ?>
<form enctype='multipart/form-data' action="{{$action}}" method='post'>
	<h3>
		wellcome 
		<spam id="user">{{$user}}</spam>, 
		please Upload cvs file 
		<input class="uploadfile" type='file' name='filename'>
		<input type="hidden" value='{{$user}}'>
		<input class='btn' type='submit' name='submit' value='Upload'>

	</h3>
	 
	
		
</form>
<a href="#" id='add_new_row_of_data'>ADD ROW</a>
<a href="#" id='cancel_add_new_row_of_data' class='hide'>cancel adding new row</a>
<br>
@endif


<a href="{{$previous}}"> &lt;&lt; Previous </a> ||
<a href="{{$next}}">Next &gt;&gt;</a>
@if($data!='')
<table class="table table-bordered table-hover table-condensed maureenhome" id='alldata'>
	<tr>
		<th>Timestamp</th>
		<th>Chilled-Water Loop Differential Pressure</th>
		<th>Chilled-Water Loop Differential Pressure Set Point</th>
		<th>Chilled-Water Return Temp</th>
		<th>Chilled-Water Supply Temp</th>
		<th>Chilled-Water Supply Temp</th>
		<th>Cooling-Coil Valve Signal (%)</th>
		<th>Consumption kWH</th>
		<th>Discharge-Air Temp</th>
		<th>Discharge-Air Temp Set Point</th>
		<th>Duct Static Pressure</th>
		<th>Duct Static Pressure Set Point</th>
		<th>Heating-Coil Valve Signal (%)</th>
		<th>Hot-Water Loop Differential Pressure</th>
		<th>Hot-Water Loop Differential Pressure Set Point</th>
		<th>Hot-Water Return Temp</th>
		<th>Hot-Water Supply Temp</th>
		<th>Hot-Water Supply Temp Set Point</th>
		<th>Mixed-Air Temp</th>
		<th>Occupancy Mode</th>
		<th>Outdoor-Air Damper Position Signal (%)</th>
		<th>Outdoor-Air Fraction temp</th>
		<th>Outdoor-Air Temp (temp)</th>
		<th>Return-Air Temp</th>
		<th>Supply-Fan Speed</th>
		<th>Supply Fan Status (on/off)</th>
		<th>VAV Damper Position Set Point (%)</th>
		<th>Zone Damper Position Signal (%)</th>
		<th>Zone Occupancy Mode (Occupied/Unoccupied)</th>
		<th>Zone Reheat Valve Signal (%)</th>
		<th>Zone Temperature</th>
		<th>Zone</th>
		<th>Damper</th>
		<th>Delete</th>
	</tr>
	<tr class="hide" id="add_data">
		<td>
			<input type="text" class="input-mini" placeholder='date' id='datadate'>
			<input type="text" class="input-mini" placeholder='time' id='datatime'>
		</td>
		@foreach($column as $i)
			<td>
				<input type="text" class="input-mini" id='newinput{{$i}}'>
			</td>
		@endforeach
		<td>
			<a href="#" id='savenewrow'>SAVE</a>
		</td>
	</tr>
	@foreach($data->take(10)->skip($page)->get() as $v)
		<tr id='datarow{{$v->data_id}}' class='datarow'>
			<td>
				{{$v->DATE_READING.' '.$v->TIME_READING}}
			</td>
			
			@foreach($column as $c)
				<td class=''>
					<div class="text-right">
						<a href="#" 
						class='catcheditable'
						id='edit{{$c.$v->data_id}}'>{{round($v->$c,2)}}</a>
					</div>
					<div id="editable{{$c.$v->data_id}}" class='hide'>
						<input type="text" 
						id='editdata{{$c.$v->data_id}}'
						class='input-mini text-right'
						dataid='{{$v->data_id}}' 
						datacolumn='{{$c}}'
						value="{{round($v->$c,2)}}">
					</div>
				</td>
			@endforeach
			<td>
				<a href="#" id='delete{{$v->data_id}}'>Delete</a>
				<div class="hide" id='confirmdelete{{$v->data_id}}'>
					Confirm 
					<a href="#" id='yesdelete{{$v->data_id}}'>yes</a>
					<a href="#" id='nodelete{{$v->data_id}}'>no</a>
				</div>
			</td>
		</tr>
	@endforeach
</table>
	
@else
	Login please
@endif


@stop