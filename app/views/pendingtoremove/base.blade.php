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
		<div class="span12">
			<ul class="unstyled">
				<li><a href="#title_chart1">Single temperature register</a></li>
				<li><a href="#title_chart2">Single temp with limit line</a></li>
				<li><a href="#title_chart3">Two different temperatures in same graph</a></li>
			</ul>
		</div>
	</div>
	<div class="row" >
		<div class="span12">
			<h3 id='title_chart1'>Single Temperature register</h3>
		</div>
	</div>
	<div class="row ">
		<div class="span12">
			<div class="row">
				<button class="btn btn-inverse offset2 span7" id='contain_chart1'>
					<div class=" ">
						<div class='center' id="chartContainer" style="height:400px;width:640px;background-color:#161616"></div>
					</div>
				</button>
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="offset2 span8"><a href="#">Back to top</a></div>
	</div>
	<hr>
	<div class="row">
		<div class="span12">
			<h3 id='title_chart2'>Temperature data with limit or warning line</h3>
		</div>
	</div>
	<div class="row ">
		<div class="span12">
			<div class="row">
				<button class="btn btn-inverse offset2 span7" id='contain_chart2'>
					<div class=" ">
						<div class='center' id="chartContainer2" style="height:400px;width:640px;background-color:#161616"></div>
					</div>
				</button>
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="offset2 span8"><a href="#">Back to top</a></div>
	</div>
	<hr>
	<div class="row">
		<div class="span12">
			<h3 id='title_chart3'>Multipe temperature data with limit or warning line</h3>
		</div>
	</div>
	<div class="row ">
		<div class="span12">
			<div class="row">
				<button class="btn btn-inverse offset2 span7" id='contain_chart3'>
					<div class=" ">
						<div class='center' id="chartContainer3" style="height:400px;width:640px;background-color:#161616"></div>
					</div>
				</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="offset2 span8"><a href="#">Back to top</a></div>
	</div>
	<div>
		@include('charts.data')
	</div>
	<div>Database properly accesed</div>
@stop	
