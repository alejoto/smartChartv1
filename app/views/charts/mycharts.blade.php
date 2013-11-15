@extends('layouts.base')
@section('content')
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>

<div id="availabledatafields" class='hide'>
<?php  
if (isset($_GET['user'])) {
	$user=$_GET['user'];
	
	$verifier='';
	$data=$data->where('user_id','=',$user);
	echo '[';
	$preffix=''; //comma container
	foreach ($data->get() as $v) {
		if ($verifier	!=	$v->DATE_READING.' '.$v->TIME_READING) {
			echo $preffix.'{"time":"'.$v->DATE_READING.' '.$v->TIME_READING;
			
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
}
?>
</div>

<div id="dparameters" class='hide'>
	@if(isset($_GET['chart']))
		{{$_GET['chart']}}
	@endif
</div>
<div class="row">
	<div class="offset2 span8">
		
	</div>
</div>


<div class="row">
	<div class="span4">
		<ol class="">
			@foreach($chart as $ch)
				<li class=''>
					<?php 
					$link='charts/mycharts'.$userlink.'&chart='.$ch->id;
					$link=URL::to($link);
					 ?>
					<a href="{{$link}}" class="">
						{{$ch->chartname}}
					</a>
					<br>
				</li>
			@endforeach
		</ul>
	</div>
	<div class="offset4 span7 affix">

		<button class="btn ">
			<h2>
				@if(isset($_GET['chart']))
					{{Chart::find($_GET['chart'])->chartname}}
				@else
				 ...Choose chart type (left)
				@endif
			</h2>
			<div class='center' id="mychartContainer" style="height:400px;width:640px;background-color:#fff"></div>
		</button>
	</div>
</div>

@stop

@section('scripts')
<script src="{{URL::to('assets/js/mycharts.js')}}" type="text/javascript"></script>
@stop
