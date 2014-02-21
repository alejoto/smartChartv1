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
								<a href="">
									{{$ch->chartname}}
								</a>
							</li>
						@endforeach
					</ul>
					<br>
					<a href="" class='chart_type' id='chart_type1' param='a01OM|right|occupancy mode|column~a02OAT|left|Outer temperature|line'>type 1</a>
					<br>
					<a href="" class='chart_type' id='chart_type2' param='a03ZT|left|zone temperature|line~a01OM|right|occupancy mode|column'>type 2</a>
				</div>
				<div class="offset4 span8 affix">
					<h1>some title</h1>
					<div id="chartdiv" style="width: 640px; height: 400px;background-color:#fff"></div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="offset1 span1">
				<div>chart</div>
				
			</div>
		</div>
		@if(isset($_GET['ct']))
		<?php $gnu=''; ?>
		<div id="parameters2">
		@foreach(Chart::find($_GET['ct'])->bfield as $cf)
			{{$gnu.$cf->name}}|{{$cf->axis}}|{{$cf->tooltip}}|{{$cf->charttype}}
			<?php $gnu='~'; ?>
		@endforeach
		</div>
			<div id="parameters">
										<?php $r=Bfield::find(4); ?>
										{{$r->name}}|{{$r->axis}}|{{$r->tooltip}}|{{$r->charttype}}~a02OAT|left|Outer temperature|line
									</div>
		@endif
			
	@else 
		Please select a dataset first

	@endif
@stop

@section('scripts')

	<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/chartbuilderV1.js')}}" type="text/javascript"></script>

	<script type="text/javascript">

	$('.chart_type').each(function(){
		var id=$(this).attr('id');
		id=id.replace('chart_type','');
		charttype(id);
	});
	
	function charttype(id){
		$('#chart_type'+id).click(function(e){
			e.preventDefault();
			var param=$(this).attr('param');
			param=param.split('~');
			param[0]=param[0].split('|');
			param[1]=param[1].split('|');
			createnewchart2('data_as_json','time',{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"},param,'chartdiv');
		});
	}
	$(window).on('load', function() {
		var param=$('#parameters2').html().trim();
		param=param.split('~');
		for (var i = 0; i < param.length; i++) {
			param[i]=param[i].trim();//important! this trim removes an unnecesary space after the gnu that messes the chart
			param[i]=param[i].split('|');
		}
		createnewchart2('data_as_json','time',{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"},param,'chartdiv');
	});
	
	</script>
@stop


