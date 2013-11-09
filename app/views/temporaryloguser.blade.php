@extends('layouts.base')
@section('content')
<div class="row">
	<div class="offset2 span8">
		<h2>Temporary log in page</h2>
	</div>
</div>
<div class="row">
	<div class="offset2 span8">
		<p class='lead'>
			This is a temporal login page.  A user must be logged in
			in order to properly retrieve data and charts.
		</p>
	</div>
</div>
<div class="row">
	<div class="offset2 span8">
		<form action="{{URL::to('/')}}" method="get" >
		USER ID (active on fake data: 1000000, maureen, alex)
		<br>
		<input type="text" name='user' placeholder='Enter id, eg: maureen'>
		<br>
		<input class='btn' type="submit" value='log in'>
	</div>
</div>
@stop