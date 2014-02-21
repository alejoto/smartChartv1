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
		@if(isset($_GET['ds']))
		Current data set <b>{{Dataset::find($_GET['ds'])->name}}</b>
		@endif
	</spam>
</div>
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
		<div class="container">
			<div id="mindate" class='hide'>{{Buildingregister::mindate($ds)}}</div>
			<div id="maxdate" class='hide'>{{Buildingregister::maxdate($ds)}}</div>	
			<div class="row">
				<div class="span3">
					<div class='text-right'>
						
						CHOOSE DATE RANGE <br>
						From <input type="text" class='span2' id='datepicker_from'>
						<br>
						To <input type="text" class='span2' id='datepicker_to'>
					</div>
					<hr>
					type of charts
					<ul class="nav nav-pills nav-stacked">
						@foreach(Chart::orderBy('id')->get() as $ch)
							<li>
								<?php
								$param='';
								$gnu='';
								foreach (Chart::find($ch->id)->bfield as $cf) {
									$param=$param.$gnu.$cf->name.'|'.$cf->axis.'|'.$cf->tooltip.'|'.$cf->charttype;
									$gnu='~';
								}
								?>
								<a href="" class='chart_type' id='chart_type{{$ch->id}}' param='{{$param}}'>
									{{$ch->chartname}}
								</a>
							</li>
						@endforeach
					</ul>
				</div>
				<div class="offset4 span8 affix">
					<h1 id='chart_title'>
					@if(isset($_GET['ct']))
						{{Chart::find($_GET['ct'])->chartname}}
					@else
						Select a chart type (left menu)
					@endif
					</h1>
					<div id="chartdiv" style="width: 640px; height: 400px;background-color:#fff"></div>
				</div>
			</div>
		</div>
		
		@if(isset($_GET['ct']))
		<?php $gnu=''; ?>
		<div id="parameters">
		@foreach(Chart::find($_GET['ct'])->bfield as $cf)
			{{$gnu.$cf->name}}|{{$cf->axis}}|{{$cf->tooltip}}|{{$cf->charttype}}
			<?php $gnu='~'; ?>
		@endforeach
		</div>
		@endif
			
	@else 
	<div class="container">
		<div class="row">
			<div class="span12">
				Please select a dataset first
			</div>
		</div>
	</div>
		

	@endif
@stop

@section('scripts')

	<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/chartbuilderV1.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/otherfunctions_charts.js')}}" type="text/javascript"></script>

	<script type="text/javascript">

	$('.chart_type').each(function(){
		var id=$(this).attr('id');
		id=id.replace('chart_type','');
		charttype(id);
	});
	
	function charttype(id){
		$('#chart_type'+id).click(function(e){
			e.preventDefault();
			$('#chart_title').html($(this).html().trim());

			var param=$(this).attr('param');
			param=param.split('~');
			for (var i = 0; i < param.length; i++){
				param[i]=param[i].trim();
				param[i]=param[i].split('|');
			}
			createnewchart2('data_as_json','time',{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"},param,'chartdiv');
		});
	}
	$(window).on('load', function() {
		var param=$('#parameters').html().trim();
		param=param.split('~');
		for (var i = 0; i < param.length; i++) {
			param[i]=param[i].trim();//important! this trim removes an unnecesary space after the gnu that messes the chart
			param[i]=param[i].split('|');
		}
		createnewchart2('data_as_json','time',{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"},param,'chartdiv');
	});
	
	</script>
@stop


