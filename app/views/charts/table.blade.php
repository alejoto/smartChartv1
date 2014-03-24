@extends('layouts.base')

@section('content')

Choose / change building 

<spam class="dropdown">
	<button class="btn dropdown-toggle" data-toggle="dropdown">Select building <b class="caret"></b></button>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		@foreach(Dataset::logged($user)->get() as $dl)
			<?php $lk='ds='.$dl->id; 
			$lk=URL::to('/charts/table?user='.$user.'&'.$lk);?>
			<li><a href="{{$lk}}">{{$dl->name}}</a>
			</li>
		@endforeach
	</ul>
</spam>
@include('charts.datasetsinclude1')

@if(isset($import_result))
	@if($import_result==0)
		<h1>Data was succesfully imported</h1>
	@elseif ($import_result==1) 
		<h1>No import was done, be sure to choose a properly formatted csv file</h1>
	@endif
@endif

@if (isset($_GET['ds'])) 
@include('charts.modal_import2')
<?php   $dataset=Dataset::find($_GET['ds']); ?>
<h3>Current building <b>{{$dataset->name}}</b></h3>
@if(isset($_GET['mssg']))
	@if($_GET['mssg']==2)
		<div class="row-fluid">
			<div class="alert alert-error span6">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>
					Sorry, no charts available as choosen building has no data.  
					<br>
					Please add / import data or choose a different building.
				</h4>
			</div>
		</div>
	@endif
@endif
		
	

<div class="row">
	<div class="span3">
		<a href="#" id='add_new_row_of_data'><h4><i class="icon-arrow-right"></i> Add data as single row</h4></a>
		<a href="#" id='cancel_add_new_row_of_data' class='hide'><h4><i class="icon-remove"></i> cancel adding new row</h4></a>
		<div class="hide" id="dataset">{{$_GET['ds']}}</div>
		<div id="newbuildingreg_result" class='text-error'></div>
	</div>
	<div class="span4">
		<a href='#' id='openmodal_modal_import'><h4><i class="icon-folder-open"></i> Add data from a CSV file</h4></a>
	</div>
	<div class="span4"></div>
</div>
		

@include('charts.tableinclude1'){{--Buttons for navigating through data--}}



<table class="table table-hover table-condensed" id='alldata'>
	<tr>
		<th>Date&time</th>
	@foreach(Bfield::display()->get() as $f)

		<th ><a class='datakeys' data-toggle="tooltip" title="{{$f->tooltip}}" id='{{$f->name}}'>{{$f->header}}</a>
		</th>
	@endforeach
	<th>Delete</th>
	</tr>
	<tr class="hide" id="add_data">
		<td>
			<input type="text" class="input-mini datepicker" placeholder='date' id='datadate'>
			<input type="text" class="input-mini timepicker" placeholder='time' id='datatime'>
		</td>
		@foreach(Bfield::display()->get() as $f)
			<td>
				<input type="text" class="input-mini {{$f->fieldclass}}" id='newinput{{$f->name}}' placeholder='{{$f->placeholder}}'>
			</td>
		@endforeach
		<td>
			<a href="#" id='savenewrow'>SAVE</a>
		</td>
	</tr>
	@foreach(buildingregister::activeds($_GET['ds'])->take(10)->skip($page)->get() as $dbl )
		<tr id='datarow{{$dbl->id}}' class='datarow'>
			<td>{{buildingregister::find($dbl->id)->datereading.' '.buildingregister::find($dbl->id)->timereading}}</td>
			@foreach(Bfield::display()->get() as $f)
			<?php $field=$f->name; ?>
				{{--$dbl->$field--}}
				<td class=''>
					<div class="text-right">
						<a href="#" 
						class='catcheditable'
						id='edit{{$field.$dbl->id}}'>
						@if($dbl->$field=='')
						__
						@else 
						{{$dbl->$field}}
						@endif
						</a>
					</div>
					<div id="editable{{$field.$dbl->id}}" class='hide'>
						<input type="text" 
						id='editdata{{$field.$dbl->id}}'
						class='input-mini text-right {{$f->fieldclass}}'
						dataid='{{$dbl->id}}' 
						datacolumn='{{$field}}'
						value="{{$dbl->$field}}"
						placeholder='{{$f->placeholder}}'
						>
					</div>
				</td>
			@endforeach
			<td>
				<a href="#" id='delete{{$dbl->id}}'>Delete</a>
				<div class="hide" id='confirmdelete{{$dbl->id}}'>
					Confirm 
					<a href="#" id='yesdelete{{$dbl->id}}'>yes</a>
					<a href="#" id='nodelete{{$dbl->id}}'>no</a>
				</div>
			</td>
		</tr>
	@endforeach
</table>
@include('charts.tableinclude1')

@endif

<br>
<br>

@stop

@section('scripts')
{{HTML::script('assets/js/table.js');}}
<script type="text/javascript">
	
	
</script>

@stop
