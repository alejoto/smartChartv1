@extends('layouts.base')
@section('content')
{{--div tag containing all data to be charted--}}
<div id="availabledatafields" class='hide'>
<?php  
if (isset($_GET['user'])) {
	$user=$_GET['user'];
	
	$verifier='';

	//Retrieving all data from DB table
	$data=$data->where('user_id','=',$user);

	//Constructing JSON object
	echo '[';  
	$preffix=''; //comma container, empty for first row of data
	foreach ($data->get() as $v) {
		if ($verifier	!=	$v->DATE_READING.' '.$v->TIME_READING) {

			//Fixing date to default amCharts format YYYY/MM/DD
			$date=str_replace('-','/',$v->DATE_READING);

			//Setting "time" as horizontal axis value
			echo $preffix.'{"time":"'.$date.' '.$v->TIME_READING;

			//Adding rest of values to the JSON object
			foreach ($fields as $f) {
				echo '","'.
				$f[0].'":"'.round(($v->$f[0])*$f[1]*100)/100;
				$preffix2=','; 
			}
			echo '"}';
			$preffix=','; 
			$verifier=$v->DATE_READING.' '.$v->TIME_READING;
		}
	}
	echo ']';
	//End of JSON object construction
}
?>
</div>
{{--End of JSON object construction--}}

<div id="dparameters" class='hide'>
	{{--Number of chart--}}
	@if(isset($_GET['chart']))
		{{$_GET['chart']}}
	@endif
</div>
<div class="row">
	<div class="span4">
		{{--LEFT MENU WITH ALL TYPES OF AVAILABLE CHARTS--}}
		<ul class="nav nav-pills nav-stacked">
			@foreach($chart as $ch)
				<li>
					<?php 
					$link='charts/mycharts'.$userlink.'&chart='.$ch->id;
					$link=URL::to($link);
					 ?>
					<a href="{{$link}}" class="">
						{{$ch->chartname}}
					</a>
				</li>
			@endforeach
		</ul>
		{{-- END OF LEFT MENU SECTION --}}
	</div>

	{{--CHART SECTION--}}
	<div class="offset4 span7 affix">
		<h2>
			@if(isset($_GET['chart']))
				{{Chart::find($_GET['chart'])->chartname}}
			@else
			 ...Choose chart type (left)
			@endif
		</h2>

		{{--div tag containing chart--}}
		<div class='center' id="mychartContainer" style="height:400px;width:640px;background-color:#fff"></div>
	</div>
	{{--END OF CHART SECTION--}}
</div>
@stop

@section('scripts')
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/chartbuilderV1.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/mycharts.js')}}" type="text/javascript"></script>
@stop
