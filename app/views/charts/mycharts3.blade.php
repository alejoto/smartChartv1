@extends('layouts.base')
@section('content')
<div class="container-fluid">
	<div class="row-fluid">
		@if(isset($_GET['ds']))
			@include('charts.json')
		@endif
		{{--
		|-----------|---------------------------|----------|
		|           |                           |          |
		|  left     |                           |          |
		|  side     |                           |          |
		|           |                           |          |
		|           |                           |          |
		|-----------|---------------------------|----------|
		--}}
		<div class="span3">
			@if(isset($_GET['ds']))
				Dataset <b>{{Dataset::find($_GET['ds'])->name}}</b>
			@endif
			<div class="noprint">
				<div class="dropdown">
					<a href='' class=" dropdown-toggle" data-toggle="dropdown">Choose different dataset <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						@foreach(Dataset::logged($user)->get() as $dl)
							<?php $lk='ds='.$dl->id; 
							$lk=URL::to('/charts/charts?user='.$user.'&'.$lk);?>
							<li><a href="{{$lk}}">{{$dl->name}}</a>
							</li>
						@endforeach
					</ul>
				</div>
				@if(isset($_GET['ds']))
				<hr>
				<h4>type of charts</h4>
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
								
								<ul class='unstyled text-right hide chartgroup' id='chartgroup{{$ch->id}}'>
									@foreach(Chart::find($ch->id)->bfield as $change)
									<?php
									$linetype='';
									$columntype='';
									if ($change->charttype=='column') {
										$columntype='selected';
									}
									else {
										$linetype='selected';
									}
									$params=$change->name.'|'.$change->axis.'|'.$change->tooltip.'|';
									?>
										<li>
											<a class='chartchange{{$ch->id}}' id='chart{{$change->id}}' >
												{{$change->tooltip}} 
												<select name="" id="chartoption{{$ch->id}}_{{$change->id}}" class='span4 selecttypechart{{$ch->id}}'>
													<option value="{{$params}}column" {{$columntype}}>column</option>
													<option value="{{$params}}line" {{$linetype}}>line</option>
													<option value="{{$params}}dots">points</option>
												</select>
											</a>
										</li>
									@endforeach
								</ul>
							</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
		{{--End of left side--}}

		{{--
		|-----------|---------------------------|----------|
		|           |                           |          |
		|           |    center                 |          |
		|           |    frame                  |          |
		|           |                           |          |
		|           |                           |          |
		|-----------|---------------------------|----------|
		--}}
		<div class="offset3 span7 affix">
			<h1 id='chart_title'>
			@if(isset($_GET['ct']))
				{{Chart::find($_GET['ct'])->chartname}}
				<div class="hide" id="chartidfromchapter">{{$_GET['ct']}}</div>
			@else
				Select a chart type (left menu)
			@endif
			</h1>
			<div id="chartdiv" style="width: 640px; height: 400px;background-color:#fff"></div>
		</div>
		{{--End of center frame--}}

		{{--
		|-----------|---------------------------|----------|
		|           |                           |          |
		|           |                           |  right   |
		|           |                           |  frame   |
		|           |                           |          |
		|           |                           |          |
		|-----------|---------------------------|----------|
		--}}
		<div class="offset10 span2 affix noprint">
			@if(isset($_GET['ds']))
				<div id="mindate" class='hide'>{{Buildingregister::mindate($ds)}}</div>
				<div id="maxdate" class='hide'>{{Buildingregister::maxdate($ds)}}</div>
				<div class='noprint'>
					DATE RANGE 
				</div>
				<div class='noprint'>
					From <br><input type="text" class='span6' id='datepicker_from' value='{{Buildingregister::mindate($ds)}}'>
				</div>
				<div class='noprint'>
					To 
					<br>
					<input type="text" class='span6' id='datepicker_to' value='{{Buildingregister::maxdate($ds)}}'>
				</div>
				
				
				<br>
				
				<a class="btn btn-large noprint" id='printchart'>
				<i class="icon-print"></i>
				Print</a>
			@endif
		</div>
		{{--End of right frame--}}
	</div>
</div>


	{{--Charts parameters--}}
	@if(isset($_GET['ds']))
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
				Please choose a dataset
			</div>
		</div>
	</div>
	@endif
@stop

@section('scripts')

	<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/amcharts.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/amcharts_3.1.1/amcharts/serial.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/chartbuilderV3.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('assets/js/datechooserv1.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
	$('#printchart').click(function(e){
		e.preventDefault();
		window.print();
	});
	</script>
@stop


