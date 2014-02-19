@extends('layouts.base')
@section('content')
<?php $ds=7; 
$comma='';
$verifier='';
?>
PENDING TO ADD IF ISSET $DS
	{{Buildingregister::activeds($ds)->count()}}
<div id="data_as_json" class='hide'>[
	@foreach(Buildingregister::activeds($ds)->get() as $br)
		@if($verifier	!=	$br->datereading.' '.$br->timereading)
			<?php //Fixing date to default amCharts format YYYY/MM/DD
			$date=str_replace('-','/',$br->datereading); 

			?>
			{{$comma}}{"time":"{{$date.' '.$br->timereading}}"
			@foreach(Bfield::display()->get() as $d)

				<?php $bcolumn=$d->name; ?>
				,"{{$bcolumn}}":"{{$br->$bcolumn}}"
			@endforeach
		@endif
		}
		<?php $comma=','; ?>
	@endforeach
]</div>

<div id=""></div>


<div class="row-fluid">
	<div class="offset1 span1">
		<div>chart</div>
		<div id="chartdiv" style="width: 840px; height: 400px;"></div>
	</div>
</div>

@stop

@section('scripts')

<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>
<script type="text/javascript">

		

	AmCharts.ready(function() {
		var chartData=$('#data_as_json').html().trim();
		chartData=eval(chartData);

		/*var chartData = [{
			"country": "USA",
			"visits": 4252
		}, {
			"country": "China",
			"visits": 1882
		}, {
			"country": "Japan",
			"visits": 1809
		}, {
			"country": "Germany",
			"visits": 1322
		}, {
			"country": "UK",
			"visits": 1122
		}, {
			"country": "France",
			"visits": 1114
		}, {
			"country": "India",
			"visits": 984
		}, {
			"country": "Spain",
			"visits": 711
		}, {
			"country": "Netherlands",
			"visits": 665
		}, {
			"country": "Russia",
			"visits": 580
		}, {
			"country": "South Korea",
			"visits": 443
		}, {
			"country": "Canada",
			"visits": 441
		}, {
			"country": "Brazil",
			"visits": 395
		}, {
			"country": "Italy",
			"visits": 386
		}, {
			"country": "Australia",
			"visits": 384
		}, {
			"country": "Taiwan",
			"visits": 338
		}, {
			"country": "Poland",
			"visits": 328
		}];*/
		var chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData;
		chart.categoryField = "time";

		var graph = new AmCharts.AmGraph();
		graph.valueField = "d06CCV";
		graph.type = "column";
		chart.addGraph(graph);

		chart.write('chartdiv');
	});

</script>
@stop


