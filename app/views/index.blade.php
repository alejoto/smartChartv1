@extends('layouts.base')	
@section('sidebar')	
@stop	
@section('content')	

<div class="row">
	<div class="offset3 span6">
		<div class="row">
			<div class="span6">
				<h1>Wellcome, (user name)</h1>
			</div>
		</div>
		<div class="row">
			<div class="span6">
				<h2 class='muted'>What would you like to do?</h2>
			</div>
		</div>
		<div class="row">
			<a class='btn btn-info span6' href="{{URL::to('/charts/chapters')}}">
				<h4 class="">View course chapters</h4>
			</a>
		</div>
		<div class="row">
			<a class='btn btn-info span6' href="{{URL::to('/charts/data')}}">
				<h4 class="">Manage building data</h4>
			</a>
		</div>
		<div class="row">
			<a class='btn btn-info span6' href="{{URL::to('/charts/chart')}}">
				<h4 class="">Go to data charts</h4>
			</a>
		</div>
	</div>
</div>
@stop	
