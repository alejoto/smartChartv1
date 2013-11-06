@extends('layouts.base')
@section('sidebar')	
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>

@stop	
@section('content')	
	<h1>Charts</h1>
	<br>
	<p><a href="{{URL::to('/')}}">GO BACK HOME</a></p>
	<div class="row">
		<div class="offset2 span10">
			<div class='center' id="chartContainer" style="height:400px;width:640px;background-color:#161616"></div>
		</div>
	</div>
		

	
	<div>
		@include('charts.data')
	</div>
	<div>check data loading</div>
@stop	
