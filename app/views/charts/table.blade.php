@extends('layouts.base')

@section('content')

Choose / change dataset to view its data &nbsp;&nbsp;

<spam class="dropdown">
	<button class="btn dropdown-toggle" data-toggle="dropdown">Select dataset <b class="caret"></b></button>
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
<h3>Current dataset <b>{{$dataset->name}}</b></h3>
@if(isset($_GET['mssg']))
	@if($_GET['mssg']==2)
		<div class="row-fluid">
			<div class="alert alert-error span6">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>
					Sorry, no charts available as choosen dataset has no data.  
					<br>
					Please add / import data or choose a different dataset.
				</h4>
			</div>
		</div>
	@endif
@endif
		
	
@if(Buildingregister::whereDataset_id($ds)->count()<5000)
<div class="row">
	<div class="span3">
		<h4><a href="#" id='add_new_row_of_data'><i class="icon-arrow-right"></i> Add data as single row</a></h4>
		<h4><a href="#" id='cancel_add_new_row_of_data' class='hide'><i class="icon-remove"></i> cancel adding new row</a></h4>
		<div class="hide" id="dataset">{{$_GET['ds']}}</div>
		<div id="newbuildingreg_result" class='text-error'></div>
	</div>
	<div class="span4">
		<h4><a href='#' id='openmodal_modal_import'><i class="icon-folder-open"></i> Add data from a CSV file</a></h4>
	</div>
</div>
@endif
<div class="row">
	<div class="span12">
		<small><a href="{{URL::to('/legend.html')}}" class='muted' target="_blank">view legends for the column headers</a></small>
	</div>
</div>
		

@include('charts.tableinclude1'){{--Buttons for navigating through data--}}



<table class="table table-hover table-condensed" id='alldata'>
	<tr>
	@foreach(Bfield::display()->get() as $f)

		<th ><a class='datakeys'  title="{{$f->tooltip}}" id='{{$f->name}}'>{{$f->header}}</a>
		</th>
	@endforeach
	<th>Delete</th>
	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	@foreach(buildingregister::activeds($_GET['ds'])->take(10)->skip($page)->get() as $dbl )
		<tr id='datarow{{$dbl->id}}' class='datarow'>
			<?php $dateconversion=strtotime(buildingregister::find($dbl->id)->datereading); ?>
			{{--<td>date('m-d-Y',$dateconversion).' '.buildingregister::find($dbl->id)->timereading</td>--}}
			@foreach(Bfield::display()->get() as $f)
			<?php $field=$f->name;
			$validator='';
			if ($field=='datereading') {
				$validator='datepicker';
			}
			else if ($field=='timereading') {
				$validator='timepicker';
			}
			 ?>
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
						class='input-mini text-right {{$f->fieldclass}} {{$validator}}'
						dataid='{{$dbl->id}}' 
						datacolumn='{{$field}}'
						value="{{$dbl->$field}}"
						placeholder='{{$f->placeholder}}'
						> 
						<button class="btn"><i class="icon-ok"></i></button>
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
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
