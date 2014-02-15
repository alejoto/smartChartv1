@extends('layouts.base')

@section('content')
<h1>Chapters</h1>
@if(isset($_GET['ds']))
<h3 class="text-info">See charts for dataset <b>{{Dataset::find($_GET['ds'])->name}}</b>
	<a href="{{URL::to('charts/chp?user='.$user)}}">(Choose another data set)</a>
</h3>

@foreach(Chapter::all() as $v)
<div class='row-fluid pnnlchapt' id='pnnlchapt{{$v->id}}'>
	<div class="offset2 span8">
		<h4><a href="">
				<spam id="chapt_hidden{{$v->id}}"><i class="icon-chevron-right" ></i></spam>
				<spam class='hide' id="chapt_active{{$v->id}}"><i class="icon-chevron-down" id=''></i></spam>
				Chapter {{$v->id.'. '.$v->chaptdescrip}}
			</a>
		</h4>
	</div>
</div>
<div class="charthidden hide" id='charthidden{{$v->id}}' chapter='0'>
	<div class="row-fluid">
		<div class="offset3 span7">
			<ul class='nav nav-pills nav-stacked'>
				@foreach($v->chart as $v2)
					<?php 
					$chart_url='charts/mycharts/pending&chart='.$v2->id;
					$chart_url=URL::to($chart_url); 
					?>
					<li><a href="{{$chart_url}}">{{$v2->chartname}}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
	
</div>
@endforeach

@else 
Please choose a dataset first 
<div class="dropdown">
	<button class="btn dropdown-toggle" data-toggle="dropdown">Select data set <b class="caret"></b></button>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		@foreach(Dataset::logged($user)->get() as $dl)
			<?php $lk='ds='.$dl->id; 
			$lk=URL::to('/charts/chp?user='.$user.'&'.$lk);?>
			<li><a href="{{$lk}}">{{$dl->name}}</a>
			</li>
		@endforeach
	</ul>
</div>

@endif

@stop