@extends('layouts.base')

@section('content')
@if(!isset($_GET['ds']))
Please choose a dataset

<div class="dropdown">
	<button class="btn dropdown-toggle" data-toggle="dropdown">Select data set <b class="caret"></b></button>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		@foreach(Dataset::logged($user)->get() as $dl)
			<?php $lk='ds='.$dl->id; 
			$lk=URL::to('/charts/table?user='.$user.'&'.$lk);?>
			<li><a href="{{$lk}}">{{$dl->name}}</a>
			</li>
		@endforeach
	</ul>
</div>

@else 
<?php   $dataset=Dataset::find($_GET['ds']); ?>
Displaying data table for data set <b>{{$dataset->name}}</b>

(<a href="{{URL::to('/charts/table?user='.$user)}}">Choose another data set</a>)
<br> <br>
<a href="#" id='add_new_row_of_data'>+ ADD ROW</a>
<a href="#" id='cancel_add_new_row_of_data' class='hide'>cancel adding new row</a>
<div class="hide" id="dataset">{{$_GET['ds']}}</div>
<div id="newbuildingreg_result" class='text-error'></div>
<?php  
$first_row='/charts/table?user='.$user.'&ds='.$_GET['ds'].'&page=0';
$first_row=URL::to($first_row);
//$first
?>
<a  class='btn' href="{{$first_row}}">
	<i class="icon-backward"></i>
	first</a>
<spam class="btn-group">

	<a class='btn' href="{{$previous}}"> <i class="icon-chevron-left"></i> Previous </a> 
	<a class='btn' href="{{$next}}">Next <i class="icon-chevron-right"></i></a>
</spam> 
<?php  
$last_rowcount=Buildingregister::activeds($_GET['ds'])->count();
$last_row=floor($last_rowcount/10);
if($last_rowcount%10==0) {$last_row=$last_row-1;}
$last_row=$last_row*10;
$last_row='/charts/table?user='.$user.'&ds='.$_GET['ds'].'&page='.$last_row;
$last_row=URL::to($last_row);
?>
<a class='btn' href="{{$last_row}}">
	<i class="icon-forward"></i>
	last
</a>
Displaying from row {{$page+1}} to {{$page+10}} (total registers {{Buildingregister::activeds($_GET['ds'])->count()}})


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
<a  class='btn' href="{{$first_row}}">
	<i class="icon-backward"></i>
	first</a>
<spam class="btn-group">
	<a class='btn' href="{{$previous}}"> <i class="icon-chevron-left"></i> Previous </a> 
	<a class='btn' href="{{$next}}">Next <i class="icon-chevron-right"></i></a>
</spam>
<a class='btn' href="{{$last_row}}">
	<i class="icon-forward"></i>
	last
</a>
Displaying from row {{$page+1}} to {{$page+10}} (total registers {{Buildingregister::activeds($_GET['ds'])->count()}})
<br>
<br>
	



@endif

@stop

@section('scripts')
{{HTML::script('assets/js/table.js');}}
<script type="text/javascript">
	
	
</script>

@stop