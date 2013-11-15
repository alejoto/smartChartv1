@extends('layouts.base')	
@section('sidebar')	
<?php 

$linktopreffix='/charts/';
$pages=array(
	'chapters'	=>'View course chapters'
	,'data'		=>'Manage building data'
	//,'chart'	=>'Go to data charts'
	,'mycharts'	=>'Charts'
	);
//$linktochapters['chapters']=URL::to($linktopreffix.'chapters'.$userlink);

?>
@stop	
@section('content')	

<div class="row">
	<div class="offset3 span6">
		<div class="row">
			<div class="span6">
				<h1>Wellcome, <spam id="wellcome_user">{{$user}}</spam></h1>
			</div>
		</div>
		<div class="row">
			<div class="span6">
				<h2 class='muted'>What would you like to do?</h2>
			</div>
		</div>
		{{--Constructing links with iterations--}}
		<div class="row">
			<div class="offset1 span5">
				<ul class='nav nav-pills nav-stacked'>
				@foreach($pages as $k=>$v)
					<?php $url_address=URL::to($linktopreffix.$k.$userlink) ?>
					<li class="">
						<a href="{{$url_address}}" class="  ">
							<h3>{{$v}}</h3>
						</a>
					</li>
				@endforeach
				</ul>
			</div>
		</div>
				
	</div>
</div>
@stop	
