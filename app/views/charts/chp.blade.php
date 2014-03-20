@extends('layouts.base')

@section('content')
<h1>Chapters</h1>
@if(isset($_GET['ds']))
<div class="row-fluid">
	<div class="offset2 span8">
		<h3>Chart chapters for building <b class="text-info">{{Dataset::find($_GET['ds'])->name}}</b>
			<a href="{{URL::to('charts/chp?user='.$user)}}">(Choose another building)</a>
		</h3>
	</div>
</div>
		
<div class="row-fluid">
	<div class="offset2 span8 whitebox">
		@foreach(Chapter::all() as $v)
		<div class='row-fluid pnnlchapt' id='pnnlchapt{{$v->id}}'>
			<div class=" span12 ">
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
				<div class="offset1 span11">
					<ul class='nav nav-pills nav-stacked'>
						@foreach($v->chart as $v2)
							<?php 
							$chart_url='charts/charts?user='.$user.'&ds='.$_GET['ds'].'&ct='.$v2->id;
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
<br>
<br>
<br>

	

@else 
Please choose a building first 
<div class="dropdown">
	<button class="btn dropdown-toggle" data-toggle="dropdown">Select building <b class="caret"></b></button>
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