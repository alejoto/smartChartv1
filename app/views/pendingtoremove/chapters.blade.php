@extends('layouts.base')
@section('content')	
<div class="row">
	<div class="offset2 span8">
		<h2>Welcome {{$user}}</h2>
	</div>
</div>
<div class="row">
	<div class="offset2 span8">
		@foreach($chapter as $v)
			<div class='row pnnlchapt' id='pnnlchapt{{$v->id}}'>
				<div class='span8'>
					<h4>
						<a href="#">
							<spam id="chapt_hidden{{$v->id}}"><i class="icon-chevron-right" ></i></spam>
							<spam class='hide' id="chapt_active{{$v->id}}"><i class="icon-chevron-down" id=''></i></spam>
							Chapter {{$v->id.'. '.$v->chaptdescrip}}</a>
					</h4>
				</div>
			</div>
			<div class="charthidden hide" id='charthidden{{$v->id}}' chapter='0'>
				<div class="row">
					<div class="offset1 span7">
						<ul class='nav nav-pills nav-stacked'>
							@foreach($v->chart as $v2)
								<?php 
								$chart_url='charts/mycharts'.$userlink.'&chart='.$v2->id;
								$chart_url=URL::to($chart_url); 
								?>
								<li><a href="{{$chart_url}}">{{$v2->chartname}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>	
		@endforeach
	</div>
</div>
@stop