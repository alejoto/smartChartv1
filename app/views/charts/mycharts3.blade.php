@extends('layouts.base')
@section('content')
<div class="container">
	<spam class="dropdown">
		<button class="btn dropdown-toggle" data-toggle="dropdown">Select data set <b class="caret"></b></button>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			@foreach(Dataset::logged($user)->get() as $dl)
				<?php $lk='ds='.$dl->id; 
				$lk=URL::to('/charts/charts?user='.$user.'&'.$lk);?>
				<li><a href="{{$lk}}">{{$dl->name}}</a>
				</li>
			@endforeach
		</ul>
	</spam>
</div>
	
	<br><br><br>

	@if(isset($_GET['ds']))
		<?php 
		$ds=$_GET['ds'];
		$comma='';
		$verifier='';
		?>
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
		<div class="row-fluid">
			<div class="offset1 span1">
				<div>chart</div>
				<div id="chartdiv" style="width: 840px; height: 400px;background-color:#fff"></div>
			</div>
		</div>
	@else 
		Please select a dataset first

	@endif
@stop

@section('scripts')

	<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/chartbuilder2.js')}}" type="text/javascript"></script>

	<script type="text/javascript">
	
	createnewchart3('data_as_json','time',{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"},[['a01OM','right','occupancy mode','column']],'chartdiv');

	</script>
@stop


