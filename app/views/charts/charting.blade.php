@extends('layouts.base')
@section('content')
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>
<div id='zone_heating_data' class='hider'>
	
	<?php 
	if (isset($_GET['user'])) {
		$user=$_GET['user'];
		$preffix=''; 
		$verifier='';
		$data=$data->where('user_id','=',$user);
		?>
		[
		{{-- "$data" variable comes from controller "Charts" action "getChart" --}}

		@foreach($data->get() as $v)
			@if($verifier	!=	$v->DATE_READING.' '.$v->TIME_READING)
				{{$preffix.'{ "time":"'.$v->DATE_READING.' '.$v->TIME_READING.
				'","Zonetemperature":'.round($v->ZT).
				',"ReheatValveSignal":'.round($v->ZRVS*100).
				',"Occupancy":'.($v->ZOM*100).
				'}'}}

			@endif
			<?php $preffix=','; $verifier=$v->DATE_READING.' '.$v->TIME_READING;?> 
		@endforeach
		]
		<?php
	}
		
	?>
		
</div>
<div class="row">
	<div class="offset2 span7"><h1>Reheat Valve Signal vs Occupancy</h1></div>
</div>

<button class="btn btn-inverse offset2 span7" id='contain_chart1'>
	<div class=" ">
		<div class='center' id="chartContainer" style="height:400px;width:640px;background-color:#161616"></div>
	</div>
</button>


@stop

@section('scripts')

<script src="{{URL::to('assets/js/zoneheatingdata.js')}}" type="text/javascript"></script>
@stop