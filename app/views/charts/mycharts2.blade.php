@extends('layouts.base')
@section('content')
<?php 

$l='';
?>
<div id="param1" class='hide'>
	<?php 
	//
	if (isset($_GET['chart'])&&isset($setofdata[$chooser])) {
		foreach ($setofdata[$chooser] as $v) {
			$chartsparam=Setchart::where('mscol','=',$v)->first();
			echo $l;
			$i='';
			foreach ($chartsparamhead1 as $c) {
				echo $i.$chartsparam->$c;
				$i=',';
			}
			$l='|';
		}
	}
	 ?>
</div>



@include('charts.datafeeder') {{--data retrieval--}}

<?php 
//min date
	$mindate=Measurement::where('user_id','=',$user)->min('DATE_READING');
	$mindateslash=str_replace('-','/',$mindate);

	//Max date
	$maxdate=Measurement::where('user_id','=',$user)->max('DATE_READING');
	$maxdateslash=str_replace('-','/',$maxdate);
 ?>
<div id="mindate" class='hide'>{{$mindate}}</div>
<div id="maxdate" class='hide'>{{$maxdate}}</div>
<div id="dparameters" class='hide'>
	{{--Number of chart--}}
	@if(isset($_GET['chart']))
		{{$_GET['chart']}}
	@else 
		0
	@endif
</div>
<div class="row">
	<div class="span4">
		<div class="row">
			<div class="offset1 span3 text-right">
			CHOOSE DATE RANGE <br>
				From <input type="text" class='span2' id='datepicker_from' value='{{$mindateslash}}'>
				<br>
				To <input type="text" class='span2' id='datepicker_to' value='{{$maxdateslash}}'>
				<br>
				<a href="#" class='btn' id="updatechart">Update chart</a>
			</div>
		</div>
		
		<hr>
		{{--LEFT MENU WITH ALL TYPES OF AVAILABLE CHARTS--}}
		<ul class="nav nav-pills nav-stacked">
			@foreach($chart as $ch)
				<li>
					<?php 
					$link='charts/mycharts2'.$userlink.'&chart='.$ch->id;
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
<script src="{{URL::to('assets/js/chartbuilder2.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/mycharts2.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/otherfunctions_charts.js')}}" type="text/javascript"></script>
@stop
