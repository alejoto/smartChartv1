@extends('layouts.base')
@section('content')
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>
<div id='zone_heating_data' class='hide'>
	[
	<?php $preffix=''; $verifier='';?>
	@foreach($data as $v)
		@if($verifier	!=	$v->DATE_READING.' '.$v->TIME_READING)
			{{$preffix.'{ "time":"'.$v->DATE_READING.' '.$v->TIME_READING.'","Zonetemperature":'.round($v->ZT).'}'}}

		@endif
		<?php $preffix=','; $verifier=$v->DATE_READING.' '.$v->TIME_READING;?> 
	@endforeach
	]
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