@extends('layouts.base')
@section('content')
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>
<div id='zone_heating_data' class='hide'>
	<?php 
	if (isset($_GET['user'])) //if no logged user, no chart
	{
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
<div class="row">
	<button class="btn btn-inverse offset2 span7" id='contain_chart1'>
		<div class=" ">
			<div class='center' id="chartContainer" style="height:400px;width:640px;background-color:#161616"></div>
		</div>
	</button>
</div>
	
<hr>
<div id='zone_heating_data2' class='hide'>
	<?php 
	if (isset($_GET['user'])) //if no logged user, no chart
	{
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
				',"Outdoortemperature":'.round($v->OAT).
				',"ReheatValveSignal":'.round($v->ZRVS*100).
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
	<div class="offset2 span7"><h1>Reheat Valve Signal vs outdoor temperature</h1></div>
</div>
<div class="row">
	<button class="btn btn-inverse offset2 span7" id='contain_chart2'>
		<div class=" ">
			<div class='center' id="chartContainer2" style="height:400px;width:640px;background-color:#161616"></div>
		</div>
	</button>
</div>
<hr>

<div id='zone_heating_data3' class='hide'>
	<?php 
	if (isset($_GET['user'])) //if no logged user, no chart
	{
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
				'","mixedairtemperature":'.round($v->MAT).
				',"Outdoordamperpositionsignal":'.round($v->OADPS*100).
				',"outdoorairfraction":'.($v->OAF).
				',"oat":'.round($v->OAT).
				',"rat":'.round($v->RAT).
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
	<div class="offset2 span7"><h1>Mixed-air temperature economizer option</h1></div>
</div>
<div class="row">
	<button class="btn btn-inverse offset2 span7" id='contain_chart3'>
		<div class=" ">
			<div class='center' id="chartContainer3" style="height:400px;width:640px;background-color:#161616"></div>
		</div>
	</button>
</div>
<hr>

<div id='zone_heating_data4' class='hide'>
	<?php 
	if (isset($_GET['user'])) //if no logged user, no chart
	{
		$user=$_GET['user'];
		$preffix=''; 
		$verifier='';
		$data=$data->where('user_id','=',$user);
		?>
		[
		{{-- "$data" variable comes from controller "Charts" action "getChart" --}}

		@foreach($data->get() as $v)
			<?php 
			//
			 ?>
			@if($verifier	!=	$v->DATE_READING.' '.$v->TIME_READING)
				{{$preffix.'{ "time":"'.$v->DATE_READING.' '.$v->TIME_READING.
				'","Outdoordamperpositionsignal":'.round($v->OADPS*100).
				',"outdoorairfraction":'.($v->OAF).
				',"oat":'.round($v->OAT).
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
	<div class="offset2 span7"><h1>Mixed-air temperature economizer option</h1></div>
</div>
<div class="row">
	<button class="btn btn-inverse offset2 span7" id='contain_chart4'>
		<div class=" ">
			<div class='center' id="chartContainer4" style="height:400px;width:640px;background-color:#161616"></div>
		</div>
	</button>
</div>
<hr>

<div id='zone_heating_data5' class='hide'>
	<?php 
	if (isset($_GET['user'])) //if no logged user, no chart
	{
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
				'","mixedairtemperature":'.round($v->MAT).
				',"Outdoordamperpositionsignal":'.round($v->OADPS*100).
				',"outdoorairfraction":'.($v->OAF).
				',"oat":'.round($v->OAT).
				',"rat":'.round($v->RAT).
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
	<div class="offset2 span7"><h1>Mixed-air temperature economizer option</h1></div>
</div>
<div class="row">
	<button class="btn btn-inverse offset2 span7" id='contain_chart5'>
		<div class=" ">
			<div class='center' id="chartContainer5" style="height:400px;width:640px;background-color:#161616"></div>
		</div>
	</button>
</div>
<hr>

<div id='zone_heating_data6' class='hide'>
	<?php 
	if (isset($_GET['user'])) //if no logged user, no chart
	{
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
				'","mixedairtemperature":'.round($v->MAT).
				',"Outdoordamperpositionsignal":'.round($v->OADPS*100).
				',"outdoorairfraction":'.($v->OAF).
				',"oat":'.round($v->OAT).
				',"rat":'.round($v->RAT).
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
	<div class="offset2 span7"><h1>Mixed-air temperature economizer option</h1></div>
</div>
<div class="row">
	<button class="btn btn-inverse offset2 span7" id='contain_chart6'>
		<div class=" ">
			<div class='center' id="chartContainer6" style="height:400px;width:640px;background-color:#161616"></div>
		</div>
	</button>
</div>
<hr>


@stop

@section('scripts')

<script src="{{URL::to('assets/js/zoneheatingdata.js')}}" type="text/javascript"></script>
@stop