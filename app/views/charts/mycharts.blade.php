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
				$f.'":"'.$v->$f;
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
<div class='center' id="mychartContainer" style="height:400px;width:640px;background-color:#161616"></div>
@stop

@section('scripts')

<script src="{{URL::to('assets/js/zoneheatingdata.js')}}" type="text/javascript"></script>
{{--<script src="{{URL::to('assets/js/mycharts.js')}}" type="text/javascript"></script>--}}
@stop
